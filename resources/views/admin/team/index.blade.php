@extends('layouts.admin')

@section('title', 'Manage Team Members')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Our Team</h1>
        <p style="color: var(--text-dim);">Manage team members, executive leadership, and official ID badges</p>
    </div>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        + Add Team Member
    </a>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Member</th>
                <th>Designation</th>
                <th>Employee ID</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teamMembers as $member)
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 14px;">
                            @if($member->photo)
                                <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" style="width: 46px; height: 56px; object-fit: cover; border-radius: 12px; border: 1.5px solid var(--accent-gold); box-shadow: 0 4px 12px rgba(245, 166, 35, 0.2);">
                            @else
                                <div style="width: 46px; height: 56px; border-radius: 12px; background: rgba(255,255,255,0.08); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--accent-gold);">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <strong style="color: #fff; font-size: 1.05rem;">{{ $member->name }}</strong>
                                @if($member->description)
                                    <p style="font-size: 0.8rem; color: var(--text-dim); margin-top: 3px; max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $member->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.8rem; letter-spacing: 0.05em; text-transform: uppercase;">
                            {{ $member->designation }}
                        </span>
                    </td>
                    <td style="font-family: monospace; font-size: 0.9rem; color: var(--text-muted);">
                        {{ $member->employee_id ?: '—' }}
                    </td>
                    <td style="font-size: 0.9rem; color: var(--text-dim);">
                        {{ $member->display_order }}
                    </td>
                    <td>
                        <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.85rem; color: {{ $member->is_active ? '#34d399' : '#f59e0b' }};">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background: {{ $member->is_active ? '#34d399' : '#f59e0b' }};"></span>
                            {{ $member->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-gold" style="padding: 6px 14px; font-size: 0.8rem;">Edit</a>
                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Delete team member {{ $member->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="padding: 6px 14px; font-size: 0.8rem; background: #ef4444;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No team members registered yet. Click "+ Add Team Member" to create one.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 24px;">
    {{ $teamMembers->links() }}
</div>
@endsection
