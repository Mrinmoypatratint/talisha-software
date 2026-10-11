<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Setting;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = ArticleCategory::withCount('articles')->orderBy('sort_order')->get();
        
        $query = Article::with(['category', 'author'])->published();

        if ($request->has('category') && $request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        $articles = $query->latest('published_at')->paginate(9);
        $settings = Setting::all()->pluck('value', 'key');
        $seo = SeoMeta::where('page_slug', 'articles')->first();

        return view('pages.articles.index', compact('articles', 'categories', 'settings', 'seo'));
    }

    public function show($slug)
    {
        $article = Article::with(['category', 'author', 'tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment view count
        $article->increment('view_count');

        $related = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->published()
            ->take(3)
            ->get();

        $settings = Setting::all()->pluck('value', 'key');

        return view('pages.articles.show', compact('article', 'related', 'settings'));
    }
}
