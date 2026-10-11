@extends('layouts.admin')

@section('title', 'Edit Career: ' . $career->title)

@section('admin_content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('admin.careers.index') }}" style="color: var(--accent-gold); font-size: 0.9rem;">&larr; Back to careers</a>
    <h1 style="font-size: 2.2rem; margin-top: 10px;">Edit Career: {{ $career->title }}</h1>
</div>

<div class="glass-card" style="padding: 40px; max-width: 900px;">
    <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Position Title *</label>
            <input type="text" name="title" required value="{{ old('title', $career->title) }}" class="form-control">
        </div>

        <div class="grid-3">
            <div class="form-group">
                <label class="form-label">Department *</label>
                <input type="text" name="department" required value="{{ old('department', $career->department) }}" class="form-control">
            </div>

            <div class="form-group">
                <label class="form-label">Location *</label>
                <input type="text" name="location" required value="{{ old('location', $career->location) }}" class="form-control">
            </div>

            <div class="form-group">
                <label class="form-label">Employment Type *</label>
                <select name="employment_type" class="form-control" style="background-color: var(--bg-elevated);">
                    <option value="full_time" {{ $career->employment_type === 'full_time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part_time" {{ $career->employment_type === 'part_time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ $career->employment_type === 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="remote" {{ $career->employment_type === 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="internship" {{ $career->employment_type === 'internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Compensation / Salary Range</label>
                <input type="text" name="salary_range" value="{{ old('salary_range', $career->salary_range) }}" class="form-control">
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 24px; padding-top: 30px;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #fff;">
                    <input type="checkbox" name="is_active" value="1" {{ $career->is_active ? 'checked' : '' }} style="accent-color: var(--accent-gold);">
                    Active Posting
                </label>
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #fff;">
                    <input type="checkbox" name="is_featured" value="1" {{ $career->is_featured ? 'checked' : '' }} style="accent-color: var(--accent-gold);">
                    Featured Opening
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Summary *</label>
            <textarea name="short_description" required rows="2" class="form-control">{{ old('short_description', $career->short_description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Full Position Scope & Mission *</label>
            <textarea name="full_description" required rows="5" class="form-control">{{ old('full_description', $career->full_description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Requirements & Experience *</label>
            <textarea name="requirements" required rows="5" class="form-control">{{ old('requirements', $career->requirements) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Benefits & Perks</label>
            <textarea name="benefits" rows="3" class="form-control">{{ old('benefits', $career->benefits) }}</textarea>
        </div>

        <div style="display: flex; gap: 16px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary" style="padding: 14px 28px;">Update Job Opening</button>
            <a href="{{ route('admin.careers.index') }}" class="btn btn-outline">Cancel</a>
        </div>
    </form>
</div>
@endsection
