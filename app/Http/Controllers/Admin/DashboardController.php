<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\ContactSubmission;
use App\Models\Article;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_leads' => Lead::count(),
            'new_leads' => Lead::where('status', 'new')->count(),
            'unread_contacts' => ContactSubmission::where('is_read', false)->count(),
            'total_articles' => Article::count(),
            'active_careers' => Career::where('is_active', true)->count(),
            'total_applications' => CareerApplication::count(),
        ];

        $recentLeads = Lead::latest()->take(5)->get();
        $recentContacts = ContactSubmission::latest()->take(5)->get();
        $recentArticles = Article::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentLeads', 'recentContacts', 'recentArticles'));
    }
}
