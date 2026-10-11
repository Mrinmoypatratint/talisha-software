<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Setting;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function create()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'get-in-touch')->first();

        return view('pages.get-in-touch', compact('settings', 'seo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'service_interest' => 'required|string|max:255',
            'budget_range' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service_interest' => $validated['service_interest'],
            'budget_range' => $validated['budget_range'] ?? null,
            'timeline' => $validated['timeline'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
            'source' => $request->header('referer', 'website'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('lead.create')->with('success', 'Your project inquiry has been prioritized! An Engineering Director from Talisha Software will reach out to schedule an architecture session.');
    }
}
