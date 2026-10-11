@extends('layouts.admin')

@section('title', 'Dashboard')

@section('admin_content')
<div style="margin-bottom: 36px;">
    <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Executive Dashboard</h1>
    <p style="color: var(--text-dim);">Live pipeline telemetry and site performance overview</p>
</div>

<!-- Stats Metric Row -->
<div class="grid-4" style="margin-bottom: 40px;">
    <div class="glass-card" style="padding: 24px;">
        <span style="font-size: 0.85rem; color: var(--text-dim); text-transform: uppercase;">Total Leads</span>
        <div style="font-size: 2.4rem; font-weight: 800; color: #fff; margin: 8px 0;">{{ $stats['total_leads'] }}</div>
        <span style="font-size: 0.85rem; color: var(--accent-gold);">{{ $stats['new_leads'] }} awaiting review</span>
    </div>

    <div class="glass-card" style="padding: 24px;">
        <span style="font-size: 0.85rem; color: var(--text-dim); text-transform: uppercase;">Inbound Messages</span>
        <div style="font-size: 2.4rem; font-weight: 800; color: #fff; margin: 8px 0;">{{ $stats['unread_contacts'] }}</div>
        <span style="font-size: 0.85rem; color: var(--accent-red);">Unread inquiries</span>
    </div>

    <div class="glass-card" style="padding: 24px;">
        <span style="font-size: 0.85rem; color: var(--text-dim); text-transform: uppercase;">Articles Published</span>
        <div style="font-size: 2.4rem; font-weight: 800; color: #fff; margin: 8px 0;">{{ $stats['total_articles'] }}</div>
        <span style="font-size: 0.85rem; color: #34d399;">Active in Knowledge Hub</span>
    </div>

    <div class="glass-card" style="padding: 24px;">
        <span style="font-size: 0.85rem; color: var(--text-dim); text-transform: uppercase;">Active Job Openings</span>
        <div style="font-size: 2.4rem; font-weight: 800; color: #fff; margin: 8px 0;">{{ $stats['active_careers'] }}</div>
        <span style="font-size: 0.85rem; color: #60a5fa;">{{ $stats['total_applications'] }} applications total</span>
    </div>
</div>

<!-- Recent Leads & Recent Inquiries -->
<div class="grid-2">
    <!-- Recent Leads -->
    <div class="glass-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 1.3rem;">Recent Project Leads</h3>
            <a href="{{ route('admin.leads.index') }}" style="color: var(--accent-gold); font-size: 0.85rem;">View all &rarr;</a>
        </div>

        @if($recentLeads->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Focus</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentLeads as $lead)
                        <tr>
                            <td>
                                <strong style="color: #fff;">{{ $lead->name }}</strong><br>
                                <span style="font-size: 0.8rem; color: var(--text-dim);">{{ $lead->email }}</span>
                            </td>
                            <td>{{ $lead->service_interest }}</td>
                            <td>
                                <span class="badge" style="font-size: 0.75rem;">{{ ucfirst($lead->status) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: var(--text-muted); font-size: 0.95rem; padding: 20px 0;">No leads captured yet.</p>
        @endif
    </div>

    <!-- Recent Contacts -->
    <div class="glass-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 1.3rem;">Recent Messages</h3>
            <a href="{{ route('admin.contacts.index') }}" style="color: var(--accent-gold); font-size: 0.85rem;">View all &rarr;</a>
        </div>

        @if($recentContacts->count() > 0)
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentContacts as $cnt)
                        <tr>
                            <td>
                                <strong style="color: #fff;">{{ $cnt->name }}</strong><br>
                                <span style="font-size: 0.8rem; color: var(--text-dim);">{{ $cnt->email }}</span>
                            </td>
                            <td>{{ Str::limit($cnt->subject, 24) }}</td>
                            <td style="font-size: 0.8rem; color: var(--text-dim);">{{ $cnt->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: var(--text-muted); font-size: 0.95rem; padding: 20px 0;">No messages received yet.</p>
        @endif
    </div>
</div>
@endsection
