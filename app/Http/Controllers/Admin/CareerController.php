<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::withCount('applications')->latest()->paginate(15);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship,remote',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Career::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $counter++;
        }

        Career::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'department' => $validated['department'],
            'location' => $validated['location'],
            'employment_type' => $validated['employment_type'],
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'] ?? null,
            'salary_range' => $validated['salary_range'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening published successfully!');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full_time,part_time,contract,internship,remote',
            'short_description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'requirements' => 'required|string',
            'benefits' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $career->update([
            'title' => $validated['title'],
            'department' => $validated['department'],
            'location' => $validated['location'],
            'employment_type' => $validated['employment_type'],
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'],
            'requirements' => $validated['requirements'],
            'benefits' => $validated['benefits'] ?? null,
            'salary_range' => $validated['salary_range'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening updated successfully!');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career opening removed.');
    }

    public function applications()
    {
        $applications = CareerApplication::with('career')->latest()->paginate(20);
        return view('admin.careers.applications', compact('applications'));
    }

    public function updateApplicationStatus(Request $request, CareerApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:received,under_review,shortlisted,interview_scheduled,rejected,hired',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update($validated);

        return back()->with('success', 'Application status updated.');
    }
}
