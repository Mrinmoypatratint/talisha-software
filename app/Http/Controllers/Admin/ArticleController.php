<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'author'])->latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = ArticleCategory::orderBy('sort_order')->get();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            'reading_time' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'featured_image' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
        ]);

        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-" . $counter++;
        }

        Article::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'author_id' => Auth::id(),
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'reading_time' => $validated['reading_time'] ?? 5,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? now() : null,
            'featured_image' => $validated['featured_image'] ?? null,
            'seo_title' => $validated['seo_title'] ?? $validated['title'],
            'seo_description' => $validated['seo_description'] ?? $validated['excerpt'],
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Article published successfully!');
    }

    public function edit(Article $article)
    {
        $categories = ArticleCategory::orderBy('sort_order')->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'required|string',
            'reading_time' => 'nullable|integer|min:1',
            'status' => 'required|in:draft,published,archived',
            'featured_image' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
        ]);

        $article->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'reading_time' => $validated['reading_time'] ?? $article->reading_time,
            'status' => $validated['status'],
            'published_at' => ($validated['status'] === 'published' && !$article->published_at) ? now() : $article->published_at,
            'featured_image' => $validated['featured_image'] ?? $article->featured_image,
            'seo_title' => $validated['seo_title'] ?? $article->seo_title,
            'seo_description' => $validated['seo_description'] ?? $article->seo_description,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}
