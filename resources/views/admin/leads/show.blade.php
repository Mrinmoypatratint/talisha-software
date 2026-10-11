@extends('layouts.admin')

@section('title', 'Review Lead: ' . $lead->name)

@section('admin_content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('admin.leads.index') }}" style="color: var(--accent-gold); font-size: 0.9rem;">&larr; Back to all leads</a>
    <h1 style="font-size: 2.2rem; margin-top: 10px;">Lead Inquiry Details</h1>
</div>

<div class="grid-2" style="align-items: flex-start; gap: 40px;">
    <!-- Lead Attributes -->
    <div class="glass-card" style="padding: 40px;">
        <span class="badge" style="margin-bottom: 16px;">{{ $lead->service_interest }}</span>
        <h2 style="font-size: 1.8rem; margin-bottom: 8px;">{{ $lead->name }}</h2>
        <p style="color: var(--text-dim); margin-bottom: 24px;">Captured on {{ $lead->created_at->format('F d, Y \a\t h:i A') }}</p>

        <div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 30px;">
            <div>
                <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase;">Corporate Email:</strong>
                <p style="color: #fff; font-size: 1.05rem;"><a href="mailto:{{ $lead->email }}" style="color: var(--accent-gold);">{{ $lead->email }}</a></p>
            </div>

            <div>
                <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase;">Phone / WhatsApp:</strong>
                <p style="color: #fff; font-size: 1.05rem;">{{ $lead->phone ?? 'Not provided' }}</p>
            </div>

            <div>
                <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase;">Company / Organization:</strong>
                <p style="color: #fff; font-size: 1.05rem;">{{ $lead->company ?? 'Independent / Startup' }}</p>
            </div>

            <div class="grid-2">
                <div>
                    <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase;">Budget Tier:</strong>
                    <p style="color: var(--accent-gold); font-size: 1.05rem; font-weight: 600;">{{ $lead->budget_range ?? 'Unspecified' }}</p>
                </div>
                <div>
                    <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase;">Timeline:</strong>
                    <p style="color: #fff; font-size: 1.05rem;">{{ $lead->timeline ?? 'Standard' }}</p>
                </div>
            </div>
        </div>

        <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
            <strong style="color: var(--text-dim); font-size: 0.85rem; text-transform: uppercase; display: block; margin-bottom: 8px;">Project Scope / Message:</strong>
            <p style="color: var(--text-secondary); line-height: 1.7; white-space: pre-wrap;">{{ $lead->message }}</p>
        </div>
    </div>

    <!-- Status & CRM Management -->
    <div class="glass-card" style="padding: 40px;">
        <h3 style="font-size: 1.4rem; margin-bottom: 20px;">Pipeline Management</h3>

        <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label class="form-label">Current Stage Status</label>
                <select name="status" class="form-control" style="background-color: var(--bg-elevated);">
                    <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="qualified" {{ $lead->status === 'qualified' ? 'selected' : '' }}>Qualified</option>
                    <option value="proposal_sent" {{ $lead->status === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                    <option value="closed_won" {{ $lead->status === 'closed_won' ? 'selected' : '' }}>Closed Won</option>
                    <option value="closed_lost" {{ $lead->status === 'closed_lost' ? 'selected' : '' }}>Closed Lost</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Internal Executive Notes</label>
                <textarea name="admin_notes" rows="6" class="form-control" placeholder="Log meeting notes, agreed scope, NDA status, or proposal milestones...">{{ old('admin_notes', $lead->admin_notes) }}</textarea>
            </div>

            <button type="submit" class="btn btn-gold" style="width: 100%; padding: 14px;">Update Pipeline Status</button>
        </form>

        <div style="margin-top: 30px; border-top: 1px solid var(--border-subtle); padding-top: 20px; font-size: 0.85rem; color: var(--text-dim);">
            <p>IP Address: {{ $lead->ip_address ?? 'Unknown' }}</p>
            <p>Source URL: {{ $lead->source ?? 'Direct' }}</p>
        </div>
    </div>
</div>
@endsection
