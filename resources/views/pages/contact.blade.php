@extends('layouts.app')

@section('title', 'Contact Us — Talisha Software')
@section('description', 'Connect with our leadership and engineering centers across Durgapur, Kolkata, Gujarat, and Bangalore.')

@section('content')
<section class="section" style="padding-top: 160px;">
    <div class="container">
        <div style="max-width: 820px; margin: 0 auto 70px; text-align: center;">
            <span class="badge">Direct Channels</span>
            <h1 style="font-size: clamp(2.8rem, 5vw, 4.2rem); margin-top: 20px; margin-bottom: 24px;">
                Connect with <span class="text-gradient-gold">Engineering Leadership</span>.
            </h1>
            <p style="font-size: 1.2rem; color: var(--text-muted); line-height: 1.7;">
                Reach out to schedule an executive architectural review or contact our regional offices.
            </p>
        </div>

        <div class="grid-2" style="gap: 50px; align-items: flex-start; margin-bottom: 80px;">
            <!-- Contact Details & Offices -->
            <div>
                <div class="glass-card" style="margin-bottom: 30px;">
                    <h3 style="font-size: 1.6rem; margin-bottom: 20px;">Corporate Touchpoints</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <span style="font-size: 1.4rem;">📞</span>
                            <div>
                                <h4 style="font-size: 1.05rem; margin-bottom: 4px;">Customer & Business Inquiries</h4>
                                <a href="tel:+918001087752" style="color: var(--accent-gold); font-size: 1.1rem; font-weight: 600;">+91 8001087752</a>
                            </div>
                        </div>

                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <span style="font-size: 1.4rem;">⚡</span>
                            <div>
                                <h4 style="font-size: 1.05rem; margin-bottom: 4px;">CTO Office Hotline</h4>
                                <a href="tel:+918217707328" style="color: var(--accent-orange); font-size: 1.1rem; font-weight: 600;">+91 8217707328</a>
                            </div>
                        </div>

                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <span style="font-size: 1.4rem;">✉️</span>
                            <div>
                                <h4 style="font-size: 1.05rem; margin-bottom: 4px;">Official Email Addresses</h4>
                                <p style="color: var(--text-muted); font-size: 0.95rem;">
                                    General: <a href="mailto:info@talishasoftware.tech" style="color: #fff;">info@talishasoftware.tech</a><br>
                                    Support: <a href="mailto:talishasoftware@gmail.com" style="color: #fff;">talishasoftware@gmail.com</a><br>
                                    Direct CTO: <a href="mailto:pijushpal@talishasoftware.tech" style="color: var(--accent-gold);">pijushpal@talishasoftware.tech</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Locations Grid -->
                <div class="glass-card">
                    <h3 style="font-size: 1.4rem; margin-bottom: 16px;">Regional Engineering Centers</h3>
                    <ul style="list-style: none; display: flex; flex-direction: column; gap: 14px; font-size: 0.95rem; color: var(--text-muted);">
                        <li><strong style="color: #fff;">Durgapur:</strong> City Center, West Bengal, India</li>
                        <li><strong style="color: #fff;">Kolkata:</strong> Salt Lake Sector V, Kolkata, India</li>
                        <li><strong style="color: #fff;">Gujarat:</strong> GIFT City / Ahmedabad, Gujarat, India</li>
                        <li><strong style="color: #fff;">Bangalore:</strong> Outer Ring Road / Indiranagar, Karnataka, India</li>
                    </ul>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="glass-card" style="padding: 44px;">
                <h3 style="font-size: 1.8rem; margin-bottom: 8px;">Transmit a Message</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 28px;">Messages are encrypted and routed directly to executive on-call leads.</p>

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" required class="form-control" placeholder="Pijush Pal">
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" required class="form-control" placeholder="name@company.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Contact Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="+91 ...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Subject *</label>
                        <input type="text" name="subject" required class="form-control" placeholder="Enterprise AI Deployment Inquiry">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Your Message *</label>
                        <textarea name="message" required class="form-control" rows="5" placeholder="Share your technological requirements, timeline, or consultation topics..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 16px;">
                        Transmit Inquiry
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
