@extends('layouts.app')

@section('title', $article->seo_title ?? $article->title . ' — Talisha Software')
@section('description', $article->seo_description ?? $article->excerpt)

@section('content')
<article class="section" style="padding-top: 160px;">
    <div class="container" style="max-width: 900px;">
        <div style="margin-bottom: 40px;">
            <a href="{{ route('articles.index') }}" style="display: inline-flex; align-items: center; gap: 8px; color: var(--accent-gold); font-size: 0.95rem; margin-bottom: 24px; font-weight: 500;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back to all articles
            </a>

            <div style="display: flex; gap: 14px; align-items: center; margin-bottom: 16px;">
                <span class="badge">{{ $article->category->name ?? 'Technology' }}</span>
                <span style="color: var(--text-dim); font-size: 0.9rem;">&bull;</span>
                <span style="color: var(--text-dim); font-size: 0.9rem;">{{ $article->reading_time }} min read</span>
                <span style="color: var(--text-dim); font-size: 0.9rem;">&bull;</span>
                <span style="color: var(--text-dim); font-size: 0.9rem;">{{ $article->published_at ? $article->published_at->format('F d, Y') : 'Recent' }}</span>
            </div>

            <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.8rem); line-height: 1.15; margin-bottom: 24px;">
                {{ $article->title }}
            </h1>

            <p style="font-size: 1.25rem; color: var(--text-muted); line-height: 1.6; border-left: 3px solid var(--accent-gold); padding-left: 20px; margin-bottom: 40px;">
                {{ $article->excerpt }}
            </p>
        </div>

        <!-- Article Body -->
        <div class="glass-card" style="padding: 50px; font-size: 1.12rem; line-height: 1.8; color: var(--text-secondary); margin-bottom: 60px;">
            {!! nl2br(e($article->body)) !!}
        </div>

        <!-- Related Articles -->
        @if($related->count() > 0)
            <div style="margin-top: 80px; border-top: 1px solid var(--border-subtle); padding-top: 60px;">
                <h3 style="font-size: 1.8rem; margin-bottom: 30px;">Related Insights</h3>
                <div class="grid-3">
                    @foreach($related as $rel)
                        <div class="glass-card" style="padding: 24px;">
                            <span class="badge" style="font-size: 0.75rem; margin-bottom: 12px;">{{ $rel->category->name ?? 'Article' }}</span>
                            <h4 style="font-size: 1.15rem; margin-bottom: 12px; line-height: 1.35;">
                                <a href="{{ route('articles.show', $rel->slug) }}" style="color: #fff;">{{ $rel->title }}</a>
                            </h4>
                            <a href="{{ route('articles.show', $rel->slug) }}" class="card-link" style="font-size: 0.85rem;">
                                Read
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection
