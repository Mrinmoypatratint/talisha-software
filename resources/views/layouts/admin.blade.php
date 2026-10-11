<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin CMS') — Talisha Software</title>
    
    <!-- Favicon & Touch Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Fonts — Human-Crafted Modern Tech Typography (Plus Jakarta Sans & Outfit) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Outfit:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .admin-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }
        .admin-sidebar {
            background: #06070a;
            border-right: 1px solid var(--border-subtle);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .admin-nav {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 30px;
        }
        .admin-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition-fast);
        }
        .admin-nav a:hover, .admin-nav a.active {
            background: rgba(245, 166, 35, 0.12);
            color: #fff;
            border-left: 3px solid var(--accent-gold);
        }
        .admin-main {
            padding: 40px;
            overflow-y: auto;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .admin-table th {
            text-align: left;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid var(--border-subtle);
            color: var(--text-dim);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .admin-table td {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--text-secondary);
            font-size: 0.95rem;
        }
        .admin-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }
        @media (max-width: 900px) {
            .admin-layout { grid-template-columns: 1fr; }
            .admin-sidebar { display: none; }
        }
    </style>
</head>
<body style="background: #030305;">

    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="logo-brand" style="display: flex; align-items: center; gap: 12px; margin-bottom: 24px;">
                    <img src="{{ asset('img/logo.png') }}" alt="Talisha Software Admin" style="height: 54px; width: auto; max-width: 220px; object-fit: contain;">
                </a>

                <ul class="admin-nav">
                    <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">📊 Dashboard</a></li>
                    <li><a href="{{ route('admin.team.index') }}" class="{{ request()->routeIs('admin.team.*') ? 'active' : '' }}">👥 Our Team</a></li>
                    <li><a href="{{ route('admin.leads.index') }}" class="{{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">💼 Leads & Inquiries</a></li>
                    <li><a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">📰 Articles & Blog</a></li>
                    <li><a href="{{ route('admin.careers.index') }}" class="{{ request()->routeIs('admin.careers.index', 'admin.careers.create', 'admin.careers.edit') ? 'active' : '' }}">💼 Career Postings</a></li>
                    <li><a href="{{ route('admin.applications') }}" class="{{ request()->routeIs('admin.applications') ? 'active' : '' }}">📄 Job Applications</a></li>
                    <li><a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">✉️ Contact Messages</a></li>
                    <li><a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">⚙️ System Settings</a></li>
                </ul>
            </div>

            <div>
                <div style="padding: 14px; background: rgba(255,255,255,0.02); border-radius: var(--radius-md); border: 1px solid var(--border-subtle); margin-bottom: 16px;">
                    <p style="font-size: 0.85rem; color: #fff; font-weight: 600;">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p style="font-size: 0.75rem; color: var(--accent-gold); text-transform: uppercase;">{{ Auth::user()->role ?? 'Admin' }}</p>
                </div>
                
                <div style="display: flex; gap: 10px;">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline" style="padding: 8px 14px; font-size: 0.85rem; width: 100%;">View Site</a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="width: 100%;">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="padding: 8px 14px; font-size: 0.85rem; width: 100%;">Logout</button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="admin-main">
            <!-- Flash Message Banner -->
            @if(session('success'))
                <div style="background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.4); color: #34d399; padding: 14px 20px; border-radius: var(--radius-md); margin-bottom: 24px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.4); color: #f87171; padding: 14px 20px; border-radius: var(--radius-md); margin-bottom: 24px;">
                    {{ $errors->first() }}
                </div>
            @endif

            @yield('admin_content')
        </main>
    </div>

</body>
</html>
