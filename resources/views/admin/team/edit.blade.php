@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Edit Team Member</h1>
        <p style="color: var(--text-dim);">Update profile details for {{ $team->name }}</p>
    </div>
    <a href="{{ route('admin.team.index') }}" class="btn btn-outline">
        ← Back to Team
    </a>
</div>

<div class="glass-card" style="max-width: 800px;">
    @if ($errors->any())
        <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; border-radius: 12px; padding: 16px; margin-bottom: 24px; color: #fca5a5;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
            <!-- Name -->
            <div class="form-group">
                <label class="form-label" for="name">Full Name *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
            </div>

            <!-- Designation -->
            <div class="form-group">
                <label class="form-label" for="designation">Designation *</label>
                <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation', $team->designation) }}" required>
            </div>
        </div>

        <!-- Photo Upload & Current Preview -->
        <div class="form-group" style="margin-top: 16px;">
            <label class="form-label" for="photo">Photo</label>
            
            <div style="display: flex; gap: 24px; align-items: center; margin-bottom: 12px;">
                @if($team->photo)
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-dim); margin-bottom: 6px;">Current Photo:</p>
                        <img src="{{ asset($team->photo) }}" alt="{{ $team->name }}" style="width: 100px; height: 130px; object-fit: cover; border-radius: 16px; border: 2px solid var(--accent-gold);">
                    </div>
                @endif
                <div style="flex: 1;">
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*" onchange="previewImage(this)">
                    <p style="font-size: 0.8rem; color: var(--text-dim); margin-top: 6px;">
                        Leave blank to keep existing photo, or select a new file to replace it.
                    </p>
                </div>
            </div>

            <div id="imagePreviewContainer" style="display: none; margin-top: 14px;">
                <p style="font-size: 0.8rem; color: var(--accent-gold); margin-bottom: 6px;">New Photo Preview:</p>
                <img id="imagePreview" src="#" alt="Preview" style="width: 100px; height: 130px; object-fit: cover; border-radius: 16px; border: 2px solid var(--accent-gold); box-shadow: 0 8px 24px rgba(0,0,0,0.4);">
            </div>
        </div>

        <!-- Description -->
        <div class="form-group" style="margin-top: 16px;">
            <label class="form-label" for="description">Short Bio / Role Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $team->description) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 16px;">
            <!-- Employee ID -->
            <div class="form-group">
                <label class="form-label" for="employee_id">Employee ID</label>
                <input type="text" id="employee_id" name="employee_id" class="form-control" value="{{ old('employee_id', $team->employee_id) }}">
            </div>

            <!-- Display Order -->
            <div class="form-group">
                <label class="form-label" for="display_order">Display Order</label>
                <input type="number" id="display_order" name="display_order" class="form-control" value="{{ old('display_order', $team->display_order) }}">
            </div>
        </div>

        <!-- Active Toggle -->
        <div style="margin-top: 20px; display: flex; align-items: center; gap: 10px;">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $team->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--accent-gold);">
            <label for="is_active" style="color: #fff; font-size: 0.95rem; cursor: pointer;">
                Show on public website
            </label>
        </div>

        <div style="margin-top: 32px; display: flex; gap: 14px;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 28px;">
                Update Team Member
            </button>
            <a href="{{ route('admin.team.index') }}" class="btn btn-outline" style="padding: 12px 24px;">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imagePreviewContainer');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        container.style.display = 'none';
    }
}
</script>
@endsection
