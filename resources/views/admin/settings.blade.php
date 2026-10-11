@extends('layouts.admin')

@section('title', 'System Settings')

@section('admin_content')
<div style="margin-bottom: 30px;">
    <h1 style="font-size: 2.2rem; margin-bottom: 6px;">System Settings</h1>
    <p style="color: var(--text-dim);">Configure corporate contact details, statistics, and brand parameters</p>
</div>

<div class="glass-card" style="padding: 40px; max-width: 900px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        @foreach($settings as $group => $items)
            <div style="margin-bottom: 36px; border-bottom: 1px solid var(--border-subtle); padding-bottom: 24px;">
                <h3 style="font-size: 1.3rem; margin-bottom: 20px; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 0.05em;">
                    {{ ucfirst($group) }} Configuration
                </h3>

                <div class="grid-2">
                    @foreach($items as $s)
                        <div class="form-group">
                            <label class="form-label">{{ ucwords(str_replace('_', ' ', $s->key)) }}</label>
                            <input type="text" name="{{ $s->key }}" value="{{ old($s->key, $s->value) }}" class="form-control">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary" style="padding: 14px 32px; font-size: 1rem;">
            Save All Settings
        </button>
    </form>
</div>
@endsection
