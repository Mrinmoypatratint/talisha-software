<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Setting;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'contact')->first();

        return view('pages.contact', compact('settings', 'seo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:4000',
        ]);

        ContactSubmission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Thank you for reaching out! Our executive team has received your message and will respond within 24 hours.');
    }
}
