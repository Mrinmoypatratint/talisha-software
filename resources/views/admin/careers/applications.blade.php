@extends('layouts.admin')

@section('title', 'Candidate Applications')

@section('admin_content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('admin.careers.index') }}" style="color: var(--accent-gold); font-size: 0.9rem;">&larr; Back to job openings</a>
    <h1 style="font-size: 2.2rem; margin-top: 10px;">Candidate Job Applications</h1>
    <p style="color: var(--text-dim);">Review inbound engineering resumes and recruiting pipeline statuses</p>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>Target Position</th>
                <th>Contact Coordinates</th>
                <th>Portfolio / Links</th>
                <th>Resume</th>
                <th>Recruiting Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
                <tr>
                    <td>
                        <strong style="color: #fff;">{{ $app->name }}</strong><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">Applied {{ $app->created_at->format('M d, Y') }}</span>
                    </td>
                    <td>
                        <span style="color: #fff; font-weight: 500;">{{ $app->career->title ?? 'General Speculative' }}</span>
                    </td>
                    <td>
                        <a href="mailto:{{ $app->email }}" style="color: var(--accent-gold);">{{ $app->email }}</a><br>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">{{ $app->phone }}</span>
                    </td>
                    <td>
                        @if($app->linkedin_url)
                            <a href="{{ $app->linkedin_url }}" target="_blank" style="color: #60a5fa; font-size: 0.85rem;">LinkedIn</a>
                        @endif
                        @if($app->portfolio_url)
                            &bull; <a href="{{ $app->portfolio_url }}" target="_blank" style="color: var(--accent-gold); font-size: 0.85rem;">Portfolio</a>
                        @endif
                    </td>
                    <td>
                        @if($app->resume_path)
                            <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="btn btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">
                                Download CV
                            </a>
                        @else
                            <span style="color: var(--text-dim); font-size: 0.8rem;">No file uploaded</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.applications.status', $app->id) }}" method="POST" style="display: flex; gap: 8px;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control" style="background: var(--bg-elevated); padding: 6px 10px; font-size: 0.8rem; width: auto;" onchange="this.form.submit()">
                                <option value="received" {{ $app->status === 'received' ? 'selected' : '' }}>Received</option>
                                <option value="under_review" {{ $app->status === 'under_review' ? 'selected' : '' }}>Under Review</option>
                                <option value="shortlisted" {{ $app->status === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="hired" {{ $app->status === 'hired' ? 'selected' : '' }}>Hired</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No candidate applications submitted yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 30px;">
    {{ $applications->links() }}
</div>
@endsection
