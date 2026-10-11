@extends('layouts.app')

@section('title', 'Engineering Articles & Research — Talisha Software')
@section('description', 'Technical articles, architectural breakdowns, and research publications on Agentic AI, Web3, and Industrial IoT.')

@section('content')
<section class="section" style="padding-top: 160px;">
    <div class="container">
        <div style="max-width: 820px; margin: 0 auto 60px; text-align: center;">
            <span class="badge">Engineering Hub</span>
            <h1 style="font-size: clamp(2.6rem, 5vw, 4rem); margin-top: 20px; margin-bottom: 20px;">
                Articles & <span class="text-gradient-gold">Research Insights</span>
            </h1>
            <p style="font-size: 1.15rem; color: var(--text-muted);">
                In-depth perspectives from our engineering directors, AI researchers, and systems architects.
            </p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="article-filter-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px; flex-wrap: wrap; gap: 20px;">
            <div class="article-category-chips" style="display: flex; gap: 10px; flex-wrap: wrap;">
                <a href="{{ route('articles.index') }}" class="tab-btn {{ !request('category') ? 'active' : '' }}">All Topics</a>
                @foreach($categories as $cat)
                    <a href="{{ route('articles.index', ['category' => $cat->slug]) }}" class="tab-btn {{ request('category') === $cat->slug ? 'active' : '' }}">
                        {{ $cat->name }} ({{ $cat->articles_count }})
                    </a>
                @endforeach
            </div>

            <form action="{{ route('articles.index') }}" method="GET" class="article-search-form" style="display: flex; gap: 10px; max-width: 320px; width: 100%;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles..." class="form-control" style="padding: 10px 16px;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Search</button>
            </form>
        </div>

        <!-- Articles Grid -->
        <div class="grid-3" style="margin-bottom: 60px;">
            @forelse($articles as $art)
                <div class="glass-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <span class="badge" style="font-size: 0.75rem;">{{ $art->category->name ?? 'Article' }}</span>
                            <span style="font-size: 0.85rem; color: var(--text-dim);">{{ $art->reading_time }} min read</span>
                        </div>
                        <h3 style="font-size: 1.35rem; margin-bottom: 14px; line-height: 1.35;">
                            <a href="{{ route('articles.show', $art->slug) }}" style="color: #fff;">{{ $art->title }}</a>
                        </h3>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px;">
                            {{ $art->excerpt }}
                        </p>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-subtle); padding-top: 16px;">
                        <span style="font-size: 0.85rem; color: var(--text-dim);">{{ $art->published_at ? $art->published_at->format('M d, Y') : 'Recent' }}</span>
                        <a href="{{ route('articles.show', $art->slug) }}" class="card-link">
                            Read
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px; color: var(--text-muted);">
                    <p style="font-size: 1.2rem;">No articles found matching your criteria.</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline" style="margin-top: 16px;">Reset Filter</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div style="display: flex; justify-content: center;">
            {{ $articles->links() }}
        </div>
    </div>
</section>
@endsection
