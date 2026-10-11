@extends('layouts.admin')

@section('title', 'Manage Careers')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Career Openings</h1>
        <p style="color: var(--text-dim);">Manage public job postings and recruit talent</p>
    </div>
    <div style="display: flex; gap: 12px;">
        <a href="{{ route('admin.applications') }}" class="btn btn-outline">
            📄 Candidate Applications
        </a>
        <a href="{{ route('admin.careers.create') }}" class="btn btn-primary">
            + Post Job Opening
        </a>
    </div>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Department & Location</th>
                <th>Type</th>
                <th>Applications</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($careers as $job)
                <tr>
                    <td>
                        <strong style="color: #fff;">{{ $job->title }}</strong><br>
                        <span style="font-size: 0.8rem; color: var(--accent-gold);">{{ $job->salary_range ?? 'Compensation confidential' }}</span>
                    </td>
                    <td>
                        <span style="color: #fff;">{{ $job->department }}</span><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">📍 {{ $job->location }}</span>
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.75rem;">{{ ucwords(str_replace('_', ' ', $job->employment_type)) }}</span>
                    </td>
                    <td>
                        <strong style="color: #fff; font-size: 1.1rem;">{{ $job->applications_count }}</strong>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">applicants</span>
                    </td>
                    <td>
                        <span style="color: {{ $job->is_active ? '#34d399' : '#f87171' }}; font-weight: 600; font-size: 0.85rem;">
                            {{ $job->is_active ? 'Active' : 'Archived' }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.careers.edit', $job->id) }}" class="btn btn-gold" style="padding: 6px 12px; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('admin.careers.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Remove this job opening?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="padding: 6px 10px; font-size: 0.8rem; background: #ef4444;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No job postings active. Click "+ Post Job Opening" to create one.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 30px;">
    {{ $careers->links() }}
</div>
@endsection
