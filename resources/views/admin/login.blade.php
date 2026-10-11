<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Talisha Software</title>
    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: radial-gradient(circle at 50% 50%, rgba(245, 166, 35, 0.08), #030305 70%);">

    <div class="glass-card" style="width: 100%; max-width: 440px; padding: 48px; margin: 20px;">
        <div style="text-align: center; margin-bottom: 32px;">
            <img src="{{ asset('img/logo.png') }}" alt="Talisha Software Logo" style="height: 64px; width: auto; max-width: 260px; object-fit: contain; margin-bottom: 16px; filter: drop-shadow(0 2px 14px rgba(255, 255, 255, 0.1));">
            <p style="color: var(--text-dim); font-size: 0.9rem;">Administrative Portal Authentication</p>
        </div>

        @if($errors->any())
            <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; padding: 12px; border-radius: var(--radius-md); font-size: 0.9rem; margin-bottom: 20px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@talishasoftware.tech') }}" required class="form-control" placeholder="admin@talishasoftware.tech">
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" required class="form-control" placeholder="••••••••••••">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <label style="display: flex; align-items: center; gap: 8px; color: var(--text-muted); font-size: 0.85rem; cursor: pointer;">
                    <input type="checkbox" name="remember" checked style="accent-color: var(--accent-gold);">
                    Remember session
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;">
                Authenticate & Enter
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('home') }}" style="color: var(--text-dim); font-size: 0.85rem;">&larr; Return to public site</a>
        </div>
    </div>

</body>
</html>
