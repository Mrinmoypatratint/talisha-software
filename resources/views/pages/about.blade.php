@extends('layouts.app')

@section('title', 'About Us — Talisha Software')
@section('description', 'Learn about Talisha Software, our multi-hub innovation presence in Durgapur, Kolkata, Gujarat, and Bangalore, and our engineering philosophy.')

@section('content')
<section class="section" style="padding-top: 160px;">
    <div class="container">
        <div style="max-width: 840px; margin: 0 auto 80px; text-align: center;">
            <span class="badge">About Talisha Software</span>
            <h1 style="font-size: clamp(2.8rem, 5vw, 4.2rem); margin-top: 20px; margin-bottom: 24px;">
                Where Mathematical Rigor Meets <span class="text-gradient-gold">Cinematic Craft</span>.
            </h1>
            <p style="font-size: 1.25rem; color: var(--text-muted); line-height: 1.7;">
                Founded with a mission to build world-class sovereign technology from India, Talisha Software pioneers Agentic AI pipelines, zero-knowledge decentralized systems, and industrial telemetry.
            </p>
        </div>

        <!-- Vision & Mission Grid -->
        <div class="grid-2" style="margin-bottom: 100px;">
            <div class="glass-card">
                <span class="badge" style="margin-bottom: 16px;">Our Vision</span>
                <h3 style="font-size: 1.8rem; margin-bottom: 16px;">Democratizing Autonomous Intelligence</h3>
                <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7;">
                    To lead the planetary transition from passive software tools to self-reflective, goal-driven agentic architectures that automate multi-system complexity safely, ethically, and without friction.
                </p>
            </div>

            <div class="glass-card">
                <span class="badge" style="margin-bottom: 16px; color: var(--accent-red); border-color: rgba(255,59,48,0.3);">Our Philosophy</span>
                <h3 style="font-size: 1.8rem; margin-bottom: 16px;">Zero Technical Debt. Uncompromising Polish.</h3>
                <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7;">
                    Every line of code is treated as mission-critical infrastructure. We combine strict type safety, verified algorithms, and 60fps micro-interaction design inspired by the world's finest digital brands.
                </p>
            </div>
        </div>

        <!-- Multi-Hub Locations -->
        <div style="margin-bottom: 100px;">
            <div class="section-header">
                <span class="badge">Planetary Footprint</span>
                <h2 class="section-title">Innovation Hubs Across India</h2>
                <p class="section-desc">Operating distributed engineering centers across India's vibrant technological corridors.</p>
            </div>

            <div class="grid-4">
                <div class="glass-card" style="padding: 30px;">
                    <div style="font-size: 2rem; margin-bottom: 14px;">📍</div>
                    <h4 style="font-size: 1.25rem; margin-bottom: 8px;">Durgapur</h4>
                    <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 12px;">West Bengal, India</p>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Aerospace & Heavy Telemetry R&D Hub.</p>
                </div>

                <div class="glass-card" style="padding: 30px;">
                    <div style="font-size: 2rem; margin-bottom: 14px;">📍</div>
                    <h4 style="font-size: 1.25rem; margin-bottom: 8px;">Kolkata</h4>
                    <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 12px;">Salt Lake Sector V, India</p>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Web3 Protocols & Smart Contract Auditing Lab.</p>
                </div>

                <div class="glass-card" style="padding: 30px;">
                    <div style="font-size: 2rem; margin-bottom: 14px;">📍</div>
                    <h4 style="font-size: 1.25rem; margin-bottom: 8px;">Gujarat</h4>
                    <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 12px;">GIFT City / Ahmedabad, India</p>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">FinTech & Enterprise Automation Center.</p>
                </div>

                <div class="glass-card" style="padding: 30px;">
                    <div style="font-size: 2rem; margin-bottom: 14px;">📍</div>
                    <h4 style="font-size: 1.25rem; margin-bottom: 8px;">Bangalore</h4>
                    <p style="color: var(--text-dim); font-size: 0.85rem; margin-bottom: 12px;">Silicon Valley of India</p>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Agentic AI Research & Multi-Agent Intelligence Pod.</p>
                </div>
            </div>
        </div>

        <!-- ==========================================
             OFFICIAL TEAM ID CARDS SECTION
             ========================================== -->
        <div style="margin-bottom: 110px;">
            <div class="section-header">
                <span class="badge">Talisha Software Team</span>
                <h2 class="section-title">Core Visionaries & Engineering Leaders</h2>
                <p class="section-desc">The architects, researchers, and developers engineering the sovereign intelligent future.</p>
            </div>

            <div class="team-id-grid">
                @foreach($teamMembers as $member)
                    <div class="team-id-card">
                        <!-- Brand Logo -->
                        <div class="id-card-brand">
                            <img src="{{ asset('img/team/id_card_logo.png') }}" alt="Talisha Software" class="id-card-brand-logo">
                        </div>

                        <!-- Central Capsule Portrait Frame -->
                        <div class="id-card-photo-wrapper">
                            <div class="id-card-photo-frame">
                                @if($member->photo)
                                    <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" class="id-card-photo-img">
                                @else
                                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; font-weight: 700; color: #3b82f6; background: #f8fafc;">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Designation Badge -->
                        <div class="id-card-desig">
                            DESIG : {{ strtoupper($member->designation) }}
                        </div>

                        <!-- Name & Gradient Accent -->
                        <div class="id-card-body">
                            <div class="id-card-name">
                                @php
                                    $nameParts = explode(' ', $member->name, 2);
                                @endphp
                                <div>{{ $nameParts[0] }}</div>
                                @if(isset($nameParts[1]))
                                    <div>{{ $nameParts[1] }}</div>
                                @endif
                            </div>
                            <div class="id-card-accent-line"></div>

                            <!-- Description / Bio below photo and name -->
                            @if($member->description)
                                <p class="id-card-desc">
                                    {{ $member->description }}
                                </p>
                            @endif
                        </div>

                        <!-- Footer & Multi-Color Ribbon -->
                        <div class="id-card-footer">
                            Enterprise Software · AI · Cloud Solutions
                        </div>
                        <div class="id-card-ribbon"></div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Leadership & CTO Office -->
        <div class="glass-card" style="padding: 60px; text-align: center; max-width: 900px; margin: 0 auto 60px;">
            <span class="badge" style="margin-bottom: 16px;">Executive Leadership</span>
            <h3 style="font-size: 2.2rem; margin-bottom: 16px;">Office of the Chief Technology Officer</h3>
            <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.7; max-width: 720px; margin: 0 auto 30px;">
                Direct oversight on all architectural blueprints, security audits, and agent deployment topologies. We believe engineering leadership must write code and remain intimately connected to technical execution.
            </p>
            <div style="display: flex; justify-content: center; gap: 24px; flex-wrap: wrap;">
                <a href="mailto:pijushpal@talishasoftware.tech" class="btn btn-gold">Email CTO Office</a>
                <a href="tel:+918217707328" class="btn btn-outline">Call CTO Direct (+91 8217707328)</a>
            </div>
        </div>
    </div>
</section>
@endsection
