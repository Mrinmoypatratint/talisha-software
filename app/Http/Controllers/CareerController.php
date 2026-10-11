<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\Setting;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('is_active', true)
            ->orderBy('is_featured', 'desc')
            ->orderBy('sort_order')
            ->get();

        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'career')->first();

        return view('pages.career', compact('careers', 'settings', 'seo'));
    }

    public function apply(Request $request, Career $career)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'portfolio_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'cover_letter' => 'nullable|string|max:3000',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        CareerApplication::create([
            'career_id' => $career->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'portfolio_url' => $validated['portfolio_url'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'status' => 'received',
        ]);

        return back()->with('success', 'Your application has been received successfully! Our talent acquisition team will review your profile.');
    }
}
