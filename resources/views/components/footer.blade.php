<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="logo-brand" style="display: inline-block; margin-bottom: 16px;">
                    <img src="{{ asset('img/logo.png') }}" alt="Talisha Software Logo" class="footer-logo-img">
                </a>
                <p>Architecting next-generation Agentic AI solutions, Web3 ecosystems, and Industrial IoT transformations. Delivering world-class software that scales with mathematical certainty.</p>
                <div style="margin-top: 20px; display: flex; gap: 14px;">
                    <span class="badge">50+ Global Clients</span>
                    <span class="badge" style="color: var(--accent-orange); border-color: rgba(255,122,26,0.3); background: rgba(255,122,26,0.1);">2+ Countries</span>
                </div>
            </div>

            <div class="footer-col">
                <h4>Navigation</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Company</a></li>
                    <li><a href="{{ route('solutions') }}">Solutions & Tech</a></li>
                    <li><a href="{{ route('articles.index') }}">Engineering Articles</a></li>
                    <li><a href="{{ route('career') }}">Join Our Team</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Capabilities</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('solutions') }}#agentic-ai">Agentic AI & LLMs</a></li>
                    <li><a href="{{ route('solutions') }}#web3">Web3 & Smart Contracts</a></li>
                    <li><a href="{{ route('solutions') }}#iot">Industrial IoT & SCADA</a></li>
                    <li><a href="{{ route('solutions') }}#cloud">Cloud Infrastructure</a></li>
                    <li><a href="{{ route('solutions') }}#digital-transformation">Digital Transformation</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Innovation Hubs</h4>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 12px;">
                    <strong style="color: #fff;">Hubs:</strong> Durgapur · Kolkata · Gujarat · Bangalore
                </p>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 6px;">
                    <strong style="color: #fff;">Inquiries:</strong> <a href="mailto:info@talishasoftware.tech" style="color: var(--accent-gold);">info@talishasoftware.tech</a>
                </p>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 6px;">
                    <strong style="color: #fff;">CTO Office:</strong> <a href="mailto:pijushpal@talishasoftware.tech" style="color: var(--accent-gold);">pijushpal@talishasoftware.tech</a>
                </p>
                <p style="color: var(--text-muted); font-size: 0.95rem;">
                    <strong style="color: #fff;">Direct Line:</strong> +91 8001087752 / +91 8217707328
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Talisha Software. All rights reserved. Built to world-class standards.</p>
            <div style="display: flex; gap: 20px;">
                <a href="{{ route('admin.login') }}" style="color: var(--text-dim); font-size: 0.85rem;">Admin Access</a>
                <a href="{{ route('sitemap') }}" target="_blank" style="color: var(--text-dim); font-size: 0.85rem;">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
