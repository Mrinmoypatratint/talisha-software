<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Setting;
use App\Models\SeoMeta;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::where('is_active', true)->orderBy('display_order')->get();
        $articles = Article::with(['category', 'author'])->published()->latest('published_at')->take(3)->get();
        $testimonials = Testimonial::where('is_featured', true)->orderBy('sort_order')->get();
        $teamMembers = TeamMember::active()->get();
        
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'home')->first();

        return view('pages.home', compact('partners', 'articles', 'testimonials', 'teamMembers', 'settings', 'seo'));
    }
}
