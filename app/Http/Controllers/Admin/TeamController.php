<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index()
    {
        $teamMembers = TeamMember::orderBy('display_order')->orderBy('id')->paginate(15);
        return view('admin.team.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new team member.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created team member in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string|max:1000',
            'employee_id' => 'nullable|string|max:50',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destination = public_path('img/team');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $photoPath = 'img/team/' . $filename;
        }

        TeamMember::create([
            'name' => $validated['name'],
            'designation' => $validated['designation'],
            'photo' => $photoPath,
            'description' => $validated['description'] ?? null,
            'employee_id' => $validated['employee_id'] ?? ('TS-EMP-' . str_pad(TeamMember::max('id') + 1, 4, '0', STR_PAD_LEFT)),
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
    }

    /**
     * Show the form for editing the specified team member.
     */
    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified team member in storage.
     */
    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string|max:1000',
            'employee_id' => 'nullable|string|max:50',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $photoPath = $team->photo;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destination = public_path('img/team');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);

            // Clean up old file if it was uploaded to img/team and not a default asset
            if ($team->photo && File::exists(public_path($team->photo)) && str_contains($team->photo, 'img/team/' . time())) {
                File::delete(public_path($team->photo));
            }

            $photoPath = 'img/team/' . $filename;
        }

        $team->update([
            'name' => $validated['name'],
            'designation' => $validated['designation'],
            'photo' => $photoPath,
            'description' => $validated['description'] ?? null,
            'employee_id' => $validated['employee_id'] ?? $team->employee_id,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully!');
    }

    /**
     * Remove the specified team member from storage.
     */
    public function destroy(TeamMember $team)
    {
        if ($team->photo && File::exists(public_path($team->photo)) && str_contains($team->photo, 'img/team/')) {
            // Delete if not a core seeded asset
            if (!in_array(basename($team->photo), ['krishiv_dutta.png', 'abir_ghosh.png', 'pijush_pal.png', 'shreya_sarkar.png', 'mantar_singh.png'])) {
                File::delete(public_path($team->photo));
            }
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member removed successfully!');
    }
}
