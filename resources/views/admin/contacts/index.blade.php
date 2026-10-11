@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('admin_content')
<div style="margin-bottom: 30px;">
    <h1 style="font-size: 2.2rem; margin-bottom: 6px;">Contact Inquiries</h1>
    <p style="color: var(--text-dim);">Messages submitted through the public contact channel</p>
</div>

<div class="glass-card" style="padding: 0; overflow: hidden;">
    <table class="admin-table" style="margin-top: 0;">
        <thead>
            <tr>
                <th>Sender</th>
                <th>Subject & Message</th>
                <th>Status</th>
                <th>Received</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $cnt)
                <tr style="{{ !$cnt->is_read ? 'background: rgba(245, 166, 35, 0.04);' : '' }}">
                    <td>
                        <strong style="color: #fff;">{{ $cnt->name }}</strong><br>
                        <a href="mailto:{{ $cnt->email }}" style="color: var(--accent-gold); font-size: 0.85rem;">{{ $cnt->email }}</a><br>
                        <span style="font-size: 0.8rem; color: var(--text-dim);">{{ $cnt->phone ?? 'No phone' }}</span>
                    </td>
                    <td style="max-width: 420px;">
                        <strong style="color: #fff; font-size: 0.95rem;">{{ $cnt->subject }}</strong>
                        <p style="color: var(--text-secondary); font-size: 0.88rem; line-height: 1.5; margin-top: 6px;">
                            {{ $cnt->message }}
                        </p>
                    </td>
                    <td>
                        <span class="badge" style="font-size: 0.75rem; {{ $cnt->is_read ? 'color: var(--text-dim); border-color: transparent;' : '' }}">
                            {{ $cnt->is_read ? 'Read' : 'New' }}
                        </span>
                    </td>
                    <td style="font-size: 0.85rem; color: var(--text-dim);">
                        {{ $cnt->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            @if(!$cnt->is_read)
                                <form action="{{ route('admin.contacts.read', $cnt->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-outline" style="padding: 6px 12px; font-size: 0.8rem;">Mark Read</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.contacts.destroy', $cnt->id) }}" method="POST" onsubmit="return confirm('Delete message permanently?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" style="padding: 6px 10px; font-size: 0.8rem; background: #ef4444;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">
                        No contact messages received.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top: 30px;">
    {{ $contacts->links() }}
</div>
@endsection
