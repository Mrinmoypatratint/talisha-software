<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SeoMeta;
use App\Models\Testimonial;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'about')->first();
        $testimonials = Testimonial::where('is_featured', true)->get();
        $teamMembers = TeamMember::active()->get();

        return view('pages.about', compact('settings', 'seo', 'testimonials', 'teamMembers'));
    }
}
