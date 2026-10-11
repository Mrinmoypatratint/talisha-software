@extends('layouts.app')

@section('title', 'About Us — Talisha Software')
@section('description', 'Talisha Software is an innovation-driven technology company specializing in AI, Web3, intelligent automation, enterprise systems, and digital transformation solutions.')

@section('content')

<!-- ==========================================
     HERO SHOWCASE: WHO WE ARE (MATCHING DESIGN)
     ========================================== -->
<div class="about-hero-wrapper">
    <div class="about-hero-container">
        <!-- Logo Image -->
        <img src="{{ asset('img/about/talisha_software_logo.png') }}" class="about-hero-logo" alt="Talisha Software" onerror="this.src='{{ asset('img/team/id_card_logo.png') }}'">

        <!-- Left Column -->
        <div class="about-hero-left">
            <h1 class="about-hero-title">
                WHO WE<br>ARE
            </h1>

            <p class="about-hero-sub">
                Talisha Software is an innovation-driven technology company specializing in AI, Web3, intelligent automation, enterprise systems, and digital transformation solutions for global businesses.
            </p>

            <div class="about-action-group">
                <button type="button" class="about-action-btn" onclick="openAboutModal('vision')">
                    <div class="about-action-circle">→</div>
                    <span>OUR VISION</span>
                </button>

                <button type="button" class="about-action-btn" onclick="openAboutModal('approach')">
                    <div class="about-action-circle">→</div>
                    <span>OUR APPROACH</span>
                </button>
            </div>
        </div>

        <!-- Right Column -->
        <div class="about-hero-right">
            <div class="about-hero-tagline">
                A TEAM OF CREATIVES TURNING YOUR IDEAS INTO IMPACTFUL EXPERIENCES
            </div>

            <img src="{{ asset('img/about/poster_about.png') }}" class="about-hero-poster" alt="Build The Future — Talisha Software">
        </div>
    </div>
</div>

<!-- ==========================================
     PREMIUM MODAL (OUR VISION / OUR APPROACH)
     ========================================== -->
<div class="about-modal" id="aboutModal" onclick="handleAboutBackdropClick(event)">
    <div class="about-modal-box">
        <button type="button" class="about-modal-close" onclick="closeAboutModal()" aria-label="Close modal">✕</button>
        <h2 class="about-modal-title" id="aboutModalTitle">Our Vision</h2>
        <p class="about-modal-text" id="aboutModalText">
            To become a global leader in AI-powered digital transformation, delivering intelligent, secure, and scalable solutions that redefine how businesses innovate and grow.
        </p>
        <div style="margin-top: 32px; display: flex; gap: 14px;">
            <a href="{{ route('lead.create') }}" class="btn btn-primary">Schedule Discovery</a>
            <button type="button" class="btn btn-outline" onclick="closeAboutModal()">Back</button>
        </div>
    </div>
</div>

<!-- ==========================================
     INTELLIGENT SOLUTIONS & IMPACT STATS
     ========================================== -->
<section class="section" style="padding-top: 20px;">
    <div class="container">
        <div class="grid-2" style="align-items: stretch; margin-bottom: 60px;">
            <div class="glass-card" style="padding: 50px 40px; display: flex; flex-direction: column; justify-content: center; position: relative;">
                <span class="badge" style="width: fit-content; margin-bottom: 20px;">Mission & Capability</span>
                <h2 style="font-size: clamp(2rem, 3.8vw, 3rem); line-height: 1.15; margin-bottom: 20px; color: #ffffff;">
                    Build Intelligent<br>Digital Solutions
                </h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.7; margin-bottom: 30px;">
                    Talisha Software delivers cutting-edge AI, web, and enterprise solutions that empower businesses to innovate, scale, and lead in the digital era. We transform complex ideas into powerful, future-ready technology platforms.
                </p>
                <div style="font-size: 2.5rem; color: #ff6a00; font-weight: 800;">↘</div>
            </div>

            <div class="glass-card" style="padding: 50px 40px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span class="badge" style="width: fit-content; margin-bottom: 20px; color: var(--accent-gold); border-color: rgba(245, 166, 35, 0.3);">Strategic Execution</span>
                    <h3 style="font-size: 1.8rem; margin-bottom: 16px;">Precision Engineering Pods</h3>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 24px;">
                        From architectural ideation to high-concurrency production deployments, we operate dedicated squads of senior researchers, systems architects, and UI/UX pioneers.
                    </p>
                </div>
                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <span class="badge" style="color: #60a5fa; border-color: rgba(96, 165, 250, 0.3);">Autonomous AI</span>
                    <span class="badge" style="color: #34d399; border-color: rgba(52, 211, 153, 0.3);">Web3 & Smart Contracts</span>
                    <span class="badge" style="color: #f472b6; border-color: rgba(244, 114, 182, 0.3);">Enterprise Cloud</span>
                </div>
            </div>
        </div>

        <!-- 3 Stats from about.html -->
        <div class="grid-3" style="margin-bottom: 100px;">
            <div class="glass-card" style="padding: 35px 30px; text-align: center;">
                <div class="stat-number" style="font-size: 3.2rem; font-weight: 800; color: #ff6a00; line-height: 1; margin-bottom: 10px;">22+</div>
                <p style="font-size: 1.05rem; font-weight: 600; color: #ffffff; margin-bottom: 4px;">Completed Projects</p>
                <p style="font-size: 0.88rem; color: var(--text-muted);">Enterprise platforms & AI systems</p>
            </div>

            <div class="glass-card" style="padding: 35px 30px; text-align: center;">
                <div class="stat-number" style="font-size: 3.2rem; font-weight: 800; color: var(--accent-gold); line-height: 1; margin-bottom: 10px;">18+</div>
                <p style="font-size: 1.05rem; font-weight: 600; color: #ffffff; margin-bottom: 4px;">Happy Clients</p>
                <p style="font-size: 0.88rem; color: var(--text-muted);">Visionary leaders across 2+ continents</p>
            </div>

            <div class="glass-card" style="padding: 35px 30px; text-align: center;">
                <div class="stat-number" style="font-size: 3.2rem; font-weight: 800; color: #3b82f6; line-height: 1; margin-bottom: 10px;">2+</div>
                <p style="font-size: 1.05rem; font-weight: 600; color: #ffffff; margin-bottom: 4px;">Industries Served</p>
                <p style="font-size: 0.88rem; color: var(--text-muted);">HealthTech, FinTech, & Intelligent Automation</p>
            </div>
        </div>

        <!-- ==========================================
             OUR EXPERTISE (PILLARS)
             ========================================== -->
        <div style="margin-bottom: 110px;">
            <div class="section-header">
                <span class="badge">Core Pillars</span>
                <h2 class="section-title">Our Expertise</h2>
                <p class="section-desc">Comprehensive technology and design capabilities built for high-stakes enterprise transformations.</p>
            </div>

            <div class="grid-4">
                <div class="glass-card" style="padding: 32px 26px;">
                    <span style="font-size: 1.6rem; font-weight: 800; color: #ff6a00; display: block; margin-bottom: 14px;">01.</span>
                    <h4 style="font-size: 1.2rem; margin-bottom: 10px; color: #ffffff;">Visual Branding & Identity</h4>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        High-precision design systems, custom iconography, cinematic brand aesthetics, and human-computer interactions that leave unforgettable impressions.
                    </p>
                </div>

                <div class="glass-card" style="padding: 32px 26px;">
                    <span style="font-size: 1.6rem; font-weight: 800; color: #3b82f6; display: block; margin-bottom: 14px;">02.</span>
                    <h4 style="font-size: 1.2rem; margin-bottom: 10px; color: #ffffff;">Website & E-Commerce Design</h4>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        Sub-second latency web applications, responsive architectures, conversion-optimized checkout funnels, and enterprise content management systems.
                    </p>
                </div>

                <div class="glass-card" style="padding: 32px 26px;">
                    <span style="font-size: 1.6rem; font-weight: 800; color: var(--accent-gold); display: block; margin-bottom: 14px;">03.</span>
                    <h4 style="font-size: 1.2rem; margin-bottom: 10px; color: #ffffff;">Brand Collateral & Packaging</h4>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        Tactile marketing collateral, pitch decks, investor documentation, technical whitepapers, and physical-digital hybrid experiences.
                    </p>
                </div>

                <div class="glass-card" style="padding: 32px 26px;">
                    <span style="font-size: 1.6rem; font-weight: 800; color: #a855f7; display: block; margin-bottom: 14px;">04.</span>
                    <h4 style="font-size: 1.2rem; margin-bottom: 10px; color: #ffffff;">Creative Strategy & Direction</h4>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        Holistic product roadmapping, multi-agent AI workflow discovery, market positioning, and full-spectrum digital transformation consulting.
                    </p>
                </div>
            </div>
        </div>

        <!-- ==========================================
             MULTI-HUB LOCATIONS ACROSS INDIA
             ========================================== -->
        <div style="margin-bottom: 110px;">
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
        <div style="margin-bottom: 120px;" id="team">
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

        <!-- ==========================================
             AUTHENTIC CLIENT TESTIMONIALS (FROM ABOUT.HTML)
             ========================================== -->
        <div style="margin-bottom: 120px;">
            <div class="section-header">
                <span class="badge" style="color: #ff6a00; border-color: rgba(255, 106, 0, 0.3);">Client Testimonials</span>
                <h2 class="section-title">What Visionary Leaders Say</h2>
                <p class="section-desc">Real stories from entrepreneurs and organizations that scaled with Talisha Software.</p>
            </div>

            <div class="about-marquee-wrapper">
                <div class="about-marquee-track">
                    <!-- 1. Ravi Singh -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "Talisha Software helped MetaOcean streamline automation and improve operational efficiency. The AI integration has significantly enhanced our workflow and reporting systems."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #ff6a00; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">RS</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Ravi Singh</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">Founder, MetaOcean</span>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Coach Utsav -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "The automation system built for my coaching business improved lead tracking and student engagement. Professional execution with strategic thinking."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #2563eb; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">CU</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Coach Utsav</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">Business Coach & Strategist</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Rtn Mantaar Singh -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "Talisha Software transformed our operations with AI automation. Highly professional, innovative, and truly collaborative throughout the journey."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #7c3aed; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">MS</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Rtn Mantaar Singh</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">Rotary Community Leader</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Chhagan Patel -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "Outstanding web development and product strategy. Our enterprise platform is now scalable, ultra-fast, and future-ready. Seamless communication throughout."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #f59e0b; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">CP</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Chhagan Patel</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">Enterprise Director</span>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Mohammed Rafi -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "Talisha Software’s AI and system architecture support helped modernize our NLP training programs. Reliable, visionary, and deeply committed to excellence."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #10b981; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">MR</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Mohammed Rafi</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">NLP Pioneer – India</span>
                            </div>
                        </div>
                    </div>

                    <!-- 6. Dr. Tapas Ghosh -->
                    <div class="about-testi-card">
                        <div>
                            <div style="color: #ff6a00; font-size: 1.2rem; letter-spacing: 2px; margin-bottom: 16px;">★★★★★</div>
                            <p style="color: #cbd5e1; font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                                "The digital solutions implemented for veterinary management and consulting operations were structured, efficient, and future-ready. Highly recommended."
                            </p>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px; border-top: 1px solid rgba(255, 106, 0, 0.15); padding-top: 16px;">
                            <div style="width: 44px; height: 44px; border-radius: 50%; background: #ec4899; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700;">TG</div>
                            <div>
                                <h5 style="font-size: 1rem; color: #ffffff; margin-bottom: 2px;">Dr. Tapas Ghosh</h5>
                                <span style="font-size: 0.8rem; color: #94a3b8;">Veterinary Officer & Consultant</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ==========================================
             FAQ ACCORDION SECTION (FROM ABOUT.HTML)
             ========================================== -->
        <div style="max-width: 880px; margin: 0 auto 120px;">
            <div class="section-header">
                <span class="badge">FAQ Sheet</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-desc">Clear answers on how we collaborate, deliver, and protect intellectual property.</p>
            </div>

            <!-- FAQ 1 -->
            <div class="about-faq-item">
                <button type="button" class="about-faq-question" onclick="toggleAboutFaq(this)">
                    <span>What services does Talisha Software provide?</span>
                    <span class="about-faq-q-icon">▼</span>
                </button>
                <div class="about-faq-answer">
                    We provide Agentic AI Development, Web & Mobile App Engineering, Intelligent Automation Solutions, Cloud & Data Architecture, Web3 / Decentralized Protocols, and Technical SEO Optimization. All solutions are architected to scale under mission-critical enterprise loads.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="about-faq-item">
                <button type="button" class="about-faq-question" onclick="toggleAboutFaq(this)">
                    <span>What is your typical project workflow?</span>
                    <span class="about-faq-q-icon">▼</span>
                </button>
                <div class="about-faq-answer">
                    Our workflow follows a structured agile cycle: Discovery & Bottleneck Analysis → Architectural Strategy → Wireframing & UI/UX Craft → High-Performance Development → Automated Testing & Security Audits → Staging & Production Deployment → Dedicated Post-Launch SLA Support. Typical enterprise delivery timelines range from 2 to 8 weeks.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="about-faq-item">
                <button type="button" class="about-faq-question" onclick="toggleAboutFaq(this)">
                    <span>Do you offer flexible pricing and engagement models?</span>
                    <span class="about-faq-q-icon">▼</span>
                </button>
                <div class="about-faq-answer">
                    Yes. We provide flexible engagement structures tailored to your organization: fixed milestone-based pricing, dedicated monthly engineering pods (retainer), and dedicated R&D partnerships. Standard billing begins with a 50% milestone advance and remaining tranches upon verified deliveries.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="about-faq-item">
                <button type="button" class="about-faq-question" onclick="toggleAboutFaq(this)">
                    <span>How do you guarantee client data security and IP ownership?</span>
                    <span class="about-faq-q-icon">▼</span>
                </button>
                <div class="about-faq-answer">
                    We execute comprehensive non-disclosure agreements (NDAs) prior to any architectural review. 100% of intellectual property, source repositories, trained models, and infrastructure belong strictly to the client upon project completion. All deployments comply with industry-standard encryption, zero-knowledge isolation, and SOC2/ISO guidelines.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     INTERACTIVE SCRIPT FOR ABOUT PAGE
     ========================================== -->
<script>
function openAboutModal(type) {
    const modal = document.getElementById("aboutModal");
    const title = document.getElementById("aboutModalTitle");
    const text = document.getElementById("aboutModalText");

    if (type === "vision") {
        title.innerText = "Our Vision";
        text.innerText = "To become a global leader in AI-powered digital transformation, delivering intelligent, secure, and scalable solutions that redefine how businesses innovate, automate, and grow.";
    }

    if (type === "approach") {
        title.innerText = "Our Approach";
        text.innerText = "We combine strategic thinking, advanced systems engineering, and cinematic craft to build secure, scalable, and future-ready digital ecosystems tailored to every client's unique mission.";
    }

    modal.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeAboutModal() {
    const modal = document.getElementById("aboutModal");
    modal.classList.remove("active");
    document.body.style.overflow = "";
}

function handleAboutBackdropClick(event) {
    if (event.target.id === "aboutModal") {
        closeAboutModal();
    }
}

function toggleAboutFaq(btn) {
    const item = btn.parentElement;
    const allItems = document.querySelectorAll('.about-faq-item');
    allItems.forEach(i => {
        if (i !== item) {
            i.classList.remove('active');
        }
    });
    item.classList.toggle('active');
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAboutModal();
    }
});
</script>

@endsection
