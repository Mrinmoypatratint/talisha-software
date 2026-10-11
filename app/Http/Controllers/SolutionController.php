<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'solutions')->first();

        return view('pages.solutions', compact('settings', 'seo'));
    }
}
