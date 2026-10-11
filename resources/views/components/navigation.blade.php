<header class="site-header">
    <div class="container nav-container">
        <a href="{{ route('home') }}" class="logo-brand">
            <img src="{{ asset('img/logo.png') }}" alt="Talisha Software Logo" class="site-logo-img">
        </a>

        <div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>

        <ul class="nav-menu" id="primaryNavMenu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('home') }}#team" class="nav-link">Team</a></li>
            <li><a href="{{ route('solutions') }}" class="nav-link {{ request()->routeIs('solutions') ? 'active' : '' }}">Solutions</a></li>
            <li><a href="{{ route('articles.index') }}" class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">Articles</a></li>
            <li><a href="{{ route('career') }}" class="nav-link {{ request()->routeIs('career') ? 'active' : '' }}">Careers</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li class="nav-mobile-cta">
                <a href="{{ route('lead.create') }}" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    Initiate Project
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </li>
        </ul>

        <div class="nav-actions">
            <a href="{{ route('lead.create') }}" class="btn btn-primary nav-header-cta">
                Get in Touch
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <button class="menu-toggle" id="menuToggleBtn" aria-label="Toggle navigation" aria-expanded="false" aria-controls="primaryNavMenu">
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </button>
        </div>
    </div>
</header>
