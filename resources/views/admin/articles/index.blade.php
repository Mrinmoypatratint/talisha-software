@extends('layouts.admin')

@section('title', 'Manage Articles')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Articles & Blog</h1>
        <p style="color: var(--text-dim);">Create, update, and publish engineering articles</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        + Write Article
    </a>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $art)
                <tr>
                    <td>
                        <strong style="color: #fff;">{{ $art->title }}</strong><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">Slug: /articles/{{ $art->slug }}</span>
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.75rem;">{{ $art->category->name ?? 'General' }}</span>
                    </td>
                    <td>
                        <span style="font-size: 0.85rem; color: {{ $art->status === 'published' ? '#34d399' : '#f59e0b' }};">
                            {{ ucfirst($art->status) }}
                        </span>
                    </td>
                    <td style="font-size: 0.85rem; color: var(--text-dim);">
                        {{ $art->published_at ? $art->published_at->format('M d, Y') : 'Draft' }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="btn btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">View</a>
                            <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn btn-gold" style="padding: 6px 12px; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Permanently remove this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 0.8rem; background: #ef4444;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No articles found. Click "+ Write Article" to create your first article.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 30px;">
    {{ $articles->links() }}
</div>
@endsection
