@extends('layouts.admin')

@section('title', 'Post New Career Opening')

@section('admin_content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('admin.careers.index') }}" style="color: var(--accent-gold); font-size: 0.9rem;">&larr; Back to careers</a>
    <h1 style="font-size: 2.2rem; margin-top: 10px;">Post New Career Opening</h1>
</div>

<div class="glass-card" style="padding: 40px; max-width: 900px;">
    <form action="{{ route('admin.careers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Position Title *</label>
            <input type="text" name="title" required value="{{ old('title') }}" class="form-control" placeholder="e.g. Senior Agentic AI Research Engineer">
        </div>

        <div class="grid-3">
            <div class="form-group">
                <label class="form-label">Department *</label>
                <input type="text" name="department" required value="{{ old('department') }}" class="form-control" placeholder="e.g. AI & Research">
            </div>

            <div class="form-group">
                <label class="form-label">Location *</label>
                <input type="text" name="location" required value="{{ old('location', 'Bangalore / Hybrid') }}" class="form-control">
            </div>

            <div class="form-group">
                <label class="form-label">Employment Type *</label>
                <select name="employment_type" class="form-control" style="background-color: var(--bg-elevated);">
                    <option value="full_time" selected>Full Time</option>
                    <option value="part_time">Part Time</option>
                    <option value="contract">Contract</option>
                    <option value="remote">Remote</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Compensation / Salary Range (Optional)</label>
                <input type="text" name="salary_range" value="{{ old('salary_range') }}" class="form-control" placeholder="e.g. ₹28,00,000 - ₹45,00,000 PA">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 24px; padding-top: 30px;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #fff;">
                    <input type="checkbox" name="is_active" value="1" checked style="accent-color: var(--accent-gold);">
                    Active Posting
                </label>
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #fff;">
                    <input type="checkbox" name="is_featured" value="1" style="accent-color: var(--accent-gold);">
                    Featured Opening
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Summary (Displayed on listing) *</label>
            <textarea name="short_description" required rows="2" class="form-control" placeholder="1-2 sentences summarizing the role...">{{ old('short_description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Full Position Scope & Mission *</label>
            <textarea name="full_description" required rows="5" class="form-control" placeholder="Detailed scope of responsibility...">{{ old('full_description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Requirements & Experience *</label>
            <textarea name="requirements" required rows="5" class="form-control" placeholder="Bullet points of required background, tech stack, and experience...">{{ old('requirements') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Benefits & Perks</label>
            <textarea name="benefits" rows="3" class="form-control" placeholder="Health insurance, equity grants, learning budgets...">{{ old('benefits') }}</textarea>
        </div>

        <div style="display: flex; gap: 16px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary" style="padding: 14px 28px;">Publish Job Opening</button>
            <a href="{{ route('admin.careers.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
