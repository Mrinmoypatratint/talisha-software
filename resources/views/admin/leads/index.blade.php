@extends('layouts.admin')

@section('title', 'Manage Leads')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
    <div>
        <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Project Leads & Inquiries</h1>
        <p style="color: var(--text-dim);">Track client project discovery forms and pipeline statuses</p>
    </div>

    <form action="{{ route('admin.leads.index') }}" method="GET" style="display: flex; gap: 10px;">
        <select name="status" class="form-control" style="background: var(--bg-elevated); padding: 8px 14px; font-size: 0.9rem;" onchange="this.form.submit()">
            <option value="">All Statuses</option>
            <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
            <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
            <option value="qualified" {{ request('status') === 'qualified' ? 'selected' : '' }}>Qualified</option>
            <option value="proposal_sent" {{ request('status') === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
            <option value="closed_won" {{ request('status') === 'closed_won' ? 'selected' : '' }}>Closed Won</option>
            <option value="closed_lost" {{ request('status') === 'closed_lost' ? 'selected' : '' }}>Closed Lost</option>
        </select>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search client/email..." class="form-control" style="padding: 8px 14px; font-size: 0.9rem;">
        <button type="submit" class="btn btn-outline" style="padding: 8px 16px;">Filter</button>
    </form>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Focus & Scope</th>
                <th>Budget / Timeline</th>
                <th>Status</th>
                <th>Captured Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leads as $lead)
                <tr>
                    <td>
                        <strong style="color: #fff;">{{ $lead->name }}</strong><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">{{ $lead->email }}</span><br>
                        @if($lead->company)
                            <span style="font-size: 0.75rem; color: var(--accent-gold);">🏢 {{ $lead->company }}</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.75rem;">{{ $lead->service_interest }}</span><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">{{ Str::limit($lead->message, 40) }}</span>
                    </td>
                    <td>
                        <span style="font-size: 0.85rem; color: #fff;">{{ $lead->budget_range ?? 'Not specified' }}</span><br>
                        <span style="font-size: 0.75rem; color: var(--text-dim);">⏱️ {{ $lead->timeline ?? 'Flexible' }}</span>
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.75rem; 
                            @if($lead->status === 'new') color: var(--accent-red); border-color: rgba(255,59,48,0.4);
                            @elseif($lead->status === 'closed_won') color: #34d399; border-color: rgba(52,211,153,0.4);
                            @else color: var(--accent-gold); @endif">
                            {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                        </span>
                    </td>
                    <td style="font-size: 0.85rem; color: var(--text-dim);">
                        {{ $lead->created_at->format('M d, Y') }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="btn btn-gold" style="padding: 6px 14px; font-size: 0.8rem;">Review</a>
                            <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="padding: 6px 10px; font-size: 0.8rem; background: #ef4444;">&times;</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No lead inquiries matching current criteria.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 30px;">
    {{ $leads->links() }}
</div>
@endsection
