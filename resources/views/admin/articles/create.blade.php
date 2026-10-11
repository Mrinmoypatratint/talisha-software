@extends('layouts.admin')

@section('title', 'Write New Article')

@section('admin_content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('admin.articles.index') }}" style="color: var(--accent-gold); font-size: 0.9rem;">&larr; Back to articles</a>
    <h1 style="font-size: 2.2rem; margin-top: 10px;">Write New Article</h1>
</div>

<div class="glass-card" style="padding: 40px; max-width: 900px;">
    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Article Title *</label>
            <input type="text" name="title" required value="{{ old('title') }}" class="form-control" placeholder="e.g. Multi-Agent Systems in Autonomous Industrial Robotics">
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Category *</label>
                <select name="category_id" required class="form-control" style="background-color: var(--bg-elevated);">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Publication Status</label>
                <select name="status" class="form-control" style="background-color: var(--bg-elevated);">
                    <option value="published" selected>Published</option>
                    <option value="draft">Draft</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Reading Time (Minutes)</label>
                <input type="number" name="reading_time" value="{{ old('reading_time', 5) }}" min="1" class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">Featured Image URL (Optional)</label>
                <input type="text" name="featured_image" value="{{ old('featured_image') }}" class="form-control" placeholder="https://...">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Brief Excerpt *</label>
            <textarea name="excerpt" required rows="2" class="form-control" placeholder="One or two sentences summarizing the key takeaway...">{{ old('excerpt') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Full Article Body (Markdown supported) *</label>
            <textarea name="body" required rows="14" class="form-control" placeholder="Write full technical article here...">{{ old('body') }}</textarea>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">SEO Title (Optional)</label>
                <input type="text" name="seo_title" value="{{ old('seo_title') }}" class="form-control" placeholder="Defaults to title">
            </div>
            <div class="form-group">
                <label class="form-label">SEO Description (Optional)</label>
                <input type="text" name="seo_description" value="{{ old('seo_description') }}" class="form-control" placeholder="Defaults to excerpt">
            </div>
        </div>

        <div style="display: flex; gap: 16px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary" style="padding: 14px 28px;">Save & Publish Article</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
