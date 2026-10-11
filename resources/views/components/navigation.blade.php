<header class="site-header">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="logo-brand" style="display: flex; align-items: center; gap: 12px;">
            <img src="{{ asset('img/logo.png') }}" alt="Talisha Software Logo" class="site-logo-img">
        </a>

        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('home') }}#team" class="nav-link">Team</a></li>
            <li><a href="{{ route('solutions') }}" class="nav-link {{ request()->routeIs('solutions') ? 'active' : '' }}">Solutions</a></li>
            <li><a href="{{ route('articles.index') }}" class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">Articles</a></li>
            <li><a href="{{ route('career') }}" class="nav-link {{ request()->routeIs('career') ? 'active' : '' }}">Careers</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>

        <div class="nav-actions">
            <a href="{{ route('lead.create') }}" class="btn btn-primary">
                Get in Touch
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="menu-toggle" aria-label="Toggle navigation">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</header>
