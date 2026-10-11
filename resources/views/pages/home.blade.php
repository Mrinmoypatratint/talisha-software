@extends('layouts.app')

@section('title', 'Talisha Software — Agentic AI & Enterprise Engineering')

@section('content')
<!-- ==========================================
     HERO SECTION WITH 3D WEBGL NEXUS
     ========================================== -->
<section class="hero-section">
    <div id="three-canvas-container"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div class="hero-content">
            <span class="badge">Next-Generation Engineering</span>
            <h1 class="hero-title">
                Architecting <span class="text-gradient-gold">Agentic AI</span> & Enterprise Scalability.
            </h1>
            <p class="hero-subtitle">
                We empower forward-thinking enterprises with autonomous multi-agent intelligence, immutable Web3 ecosystems, and resilient Industrial IoT architectures.
            </p>

            <!-- Enterprise Solutions Search Bar -->
            <div class="hero-search-bar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                <input type="text" id="hero-search-input" placeholder="Search enterprise software, Web3, IoT & solutions...">
                <button type="button" id="voice-search-btn" title="Voice Search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2M12 19v4M8 23h8"/></svg>
                </button>
                <a href="{{ route('solutions') }}" class="btn btn-gold hero-search-btn">Explore</a>
            </div>

            <div class="hero-actions">
                <a href="{{ route('lead.create') }}" class="btn btn-primary">
                    Initiate Project
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('solutions') }}" class="btn btn-outline">
                    View Solutions
                </a>
                <a href="{{ route('contact') }}" class="btn btn-glow">
                    Direct CTO Line
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     PARTNER LOGO MARQUEE TICKER
     ========================================== -->
<section class="partner-section">
    <div class="container" style="margin-bottom: 24px; text-align: center;">
        <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.12em; color: var(--text-dim); font-weight: 600; display: inline-flex; align-items: center; gap: 10px;">
            <span style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: var(--accent-gold); box-shadow: 0 0 8px var(--accent-gold);"></span>
            Trusted by Visionary Organizations Across 2+ Continents
            <span style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: var(--accent-gold); box-shadow: 0 0 8px var(--accent-gold);"></span>
        </span>
    </div>
    <div class="partner-marquee">
        <div class="partner-track">
            @foreach($partners as $partner)
                <a href="{{ $partner->website_url ?: '#' }}" class="partner-item" title="{{ $partner->name }}" @if($partner->website_url && $partner->website_url !== '#') target="_blank" rel="noopener noreferrer" @endif>
                    @if($partner->logo_path)
                        <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name }}" class="partner-logo-img">
                    @else
                        <span style="display: inline-block; width: 8px; height: 8px; background: var(--accent-gold); border-radius: 50%;"></span>
                        <span class="partner-name">{{ $partner->name }}</span>
                    @endif
                </a>
            @endforeach
            <!-- Clones for seamless infinite scroll -->
            @foreach($partners as $partner)
                <a href="{{ $partner->website_url ?: '#' }}" class="partner-item" title="{{ $partner->name }}" @if($partner->website_url && $partner->website_url !== '#') target="_blank" rel="noopener noreferrer" @endif>
                    @if($partner->logo_path)
                        <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name }}" class="partner-logo-img">
                    @else
                        <span style="display: inline-block; width: 8px; height: 8px; background: var(--accent-gold); border-radius: 50%;"></span>
                        <span class="partner-name">{{ $partner->name }}</span>
                    @endif
                </a>
            @endforeach
        </div>
        <div class="partner-track">
            @foreach($partners as $partner)
                <a href="{{ $partner->website_url ?: '#' }}" class="partner-item" title="{{ $partner->name }}" @if($partner->website_url && $partner->website_url !== '#') target="_blank" rel="noopener noreferrer" @endif>
                    @if($partner->logo_path)
                        <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name }}" class="partner-logo-img">
                    @else
                        <span style="display: inline-block; width: 8px; height: 8px; background: var(--accent-gold); border-radius: 50%;"></span>
                        <span class="partner-name">{{ $partner->name }}</span>
                    @endif
                </a>
            @endforeach
            @foreach($partners as $partner)
                <a href="{{ $partner->website_url ?: '#' }}" class="partner-item" title="{{ $partner->name }}" @if($partner->website_url && $partner->website_url !== '#') target="_blank" rel="noopener noreferrer" @endif>
                    @if($partner->logo_path)
                        <img src="{{ asset($partner->logo_path) }}" alt="{{ $partner->name }}" class="partner-logo-img">
                    @else
                        <span style="display: inline-block; width: 8px; height: 8px; background: var(--accent-gold); border-radius: 50%;"></span>
                        <span class="partner-name">{{ $partner->name }}</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================
     EDITORIAL STATEMENT SECTION
     ========================================== -->
<section class="section" style="background: radial-gradient(circle at 50% 50%, rgba(245, 166, 35, 0.04) 0%, transparent 70%);">
    <div class="container">
        <div style="max-width: 960px; margin: 0 auto; text-align: center;">
            <span class="badge">The Intelligent Digital Era</span>
            <h2 style="font-size: clamp(2.2rem, 4.5vw, 3.6rem); margin-top: 24px; margin-bottom: 28px; line-height: 1.15;">
                We replace static software with <span class="text-gradient-gold">autonomous cognitive systems</span> that evolve in real time.
            </h2>
            <p style="font-size: 1.2rem; color: var(--text-muted); line-height: 1.7;">
                From high-precision aerospace telemetry in Durgapur to financial cryptography in Bangalore, Talisha Software operates at the intersection of mathematical rigor and cinematic user experiences.
            </p>
        </div>
    </div>
</section>

<!-- ==========================================
     INTERACTIVE AI SOLUTIONS SHOWCASE
     ========================================== -->
<section class="section" id="solutions-showcase">
    <div class="container">
        <div class="section-header">
            <span class="capabilities-badge">OUR CORE CAPABILITIES</span>
            <h2 class="section-title">Engineered for Exponential Scale</h2>
            <p class="section-desc">A complete ecosystem to design, deploy and scale autonomous AI systems.</p>
        </div>

        <div class="tabs-nav">
            <button class="tab-btn active" data-tab="tab-ai">🤖 Agentic AI Product Dev</button>
            <button class="tab-btn" data-tab="tab-web3">⛓️ Web3 & Smart Contracts</button>
            <button class="tab-btn" data-tab="tab-iot">📡 Industrial IoT & Telemetry</button>
        </div>

        <!-- Tab 1: Agentic AI — Featured Capability Showcase -->
        <div id="tab-ai" class="tab-content active">
            <div class="featured-solution-card">
                <!-- Left Column: Details & Checklist -->
                <div>
                    <span class="featured-solution-tag">FEATURED SOLUTION</span>
                    <h3 class="featured-solution-title">Multi-Agent Orchestration & Reasoning Graphs</h3>
                    <p class="featured-solution-desc">
                        Build, orchestrate and monitor multiple AI agents that collaborate, reason and take action — designed for complex enterprise workflows.
                    </p>

                    <ul class="featured-solution-checklist">
                        <li class="featured-solution-item">
                            <span class="featured-check-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="3.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            Agent planning and tool use
                        </li>
                        <li class="featured-solution-item">
                            <span class="featured-check-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="3.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            Multi-agent collaboration graphs
                        </li>
                        <li class="featured-solution-item">
                            <span class="featured-check-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="3.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            Real-time monitoring and guardrails
                        </li>
                    </ul>

                    <a href="{{ route('solutions') }}" class="btn-explore-solutions">
                        Explore Our AI Solutions <span style="font-size: 1.1rem; line-height: 1;">&rarr;</span>
                    </a>
                </div>

                <!-- Right Column: Code Window + 3 Agent Nodes Diagram -->
                <div class="orchestration-preview">
                    <!-- Python Code Window -->
                    <div class="code-editor-box">
                        <div class="code-editor-titlebar">
                            <span class="code-dot" style="background: #ff5f56;"></span>
                            <span class="code-dot" style="background: #ffbd2e;"></span>
                            <span class="code-dot" style="background: #27c93f;"></span>
                            <span class="code-title">Agent Workflow</span>
                        </div>
                        <div style="color: #06b6d4; margin-bottom: 8px;"># Orchestrate multiple agents for a business task</div>
                        <div><span style="color: #e2e8f0;">workflow</span> <span style="color: #94a3b8;">=</span> <span style="color: #38bdf8;">AgentGraph</span>()</div>
                        <div><span style="color: #e2e8f0;">researcher</span> <span style="color: #94a3b8;">=</span> <span style="color: #38bdf8;">Agent</span>(<span style="color: #cbd5e1;">role</span>=<span style="color: #ff5500;">"research"</span>)</div>
                        <div><span style="color: #e2e8f0;">analyst</span> <span style="color: #94a3b8;">=</span> <span style="color: #38bdf8;">Agent</span>(<span style="color: #cbd5e1;">role</span>=<span style="color: #ff5500;">"analysis"</span>)</div>
                        <div><span style="color: #e2e8f0;">executor</span> <span style="color: #94a3b8;">=</span> <span style="color: #38bdf8;">Agent</span>(<span style="color: #cbd5e1;">role</span>=<span style="color: #ff5500;">"execution"</span>)</div>
                        <div style="margin-top: 10px;"><span style="color: #e2e8f0;">workflow</span>.<span style="color: #f5a623;">add</span>(<span style="color: #cbd5e1;">researcher</span> <span style="color: #f5a623;">&gt;&gt;</span> <span style="color: #cbd5e1;">analyst</span> <span style="color: #f5a623;">&gt;&gt;</span> <span style="color: #cbd5e1;">executor</span>)</div>
                        <div><span style="color: #e2e8f0;">result</span> <span style="color: #94a3b8;">=</span> <span style="color: #e2e8f0;">workflow</span>.<span style="color: #f5a623;">run</span>(<span style="color: #34d399;">"Market expansion analysis"</span>)</div>
                        <div><span style="color: #f5a623;">print</span>(<span style="color: #e2e8f0;">result</span>)</div>
                    </div>

                    <!-- Branch Connector -->
                    <div class="workflow-tree-connector">
                        <svg width="28" height="190" viewBox="0 0 28 190" fill="none">
                            <path d="M 0 95 H 12 V 24 H 28" stroke="#334155" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M 12 95 H 28" stroke="#334155" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M 12 95 V 166 H 28" stroke="#334155" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <!-- 3 Agent Nodes Column -->
                    <div class="workflow-diagram-col">
                        <!-- Node 1: Research Agent -->
                        <div class="workflow-agent-node">
                            <div class="node-icon-wrapper" style="background: rgba(16, 185, 129, 0.12); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.25);">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                            </div>
                            <div class="node-text-content">
                                Research
                                <span>Agent</span>
                            </div>
                        </div>

                        <!-- Connector Arrow 1 -->
                        <div class="workflow-arrow-down">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        </div>

                        <!-- Node 2: Analysis Agent -->
                        <div class="workflow-agent-node">
                            <div class="node-icon-wrapper" style="background: rgba(6, 182, 212, 0.12); color: #06b6d4; border: 1px solid rgba(6, 182, 212, 0.25);">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                            </div>
                            <div class="node-text-content">
                                Analysis
                                <span>Agent</span>
                            </div>
                        </div>

                        <!-- Connector Arrow 2 -->
                        <div class="workflow-arrow-down">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="2"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        </div>

                        <!-- Node 3: Execution Agent -->
                        <div class="workflow-agent-node">
                            <div class="node-icon-wrapper" style="background: rgba(168, 85, 247, 0.12); color: #a855f7; border: 1px solid rgba(168, 85, 247, 0.25);">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                            </div>
                            <div class="node-text-content">
                                Execution
                                <span>Agent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab 2: Web3 -->
        <div id="tab-web3" class="tab-content">
            <div class="glass-card tab-showcase-card">
                <div>
                    <span class="badge" style="margin-bottom: 16px; color: var(--accent-red); border-color: rgba(255,59,48,0.3);">Cryptographic Trust</span>
                    <h3 style="font-size: 2rem; margin-bottom: 16px;">Immutable Smart Contracts & Zero-Knowledge Rollups</h3>
                    <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 24px;">
                        Enterprise-grade smart contract design audited for mathematical security. We build decentralized custody, tokenized real-world assets (RWA), and high-frequency automated escrow channels.
                    </p>
                    <ul style="list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px;">
                        <li style="display: flex; align-items: center; gap: 10px; color: var(--text-secondary);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-red)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Formal verification and gas-optimized EVM bytecode
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; color: var(--text-secondary);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-red)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Privacy-preserving zero-knowledge proofs
                        </li>
                    </ul>
                    <a href="{{ route('solutions') }}#web3" class="btn btn-primary">Explore Web3 Systems</a>
                </div>
                <div class="terminal-code-box">
                    <div style="color: var(--text-dim); margin-bottom: 12px;">// Smart Contract Verification</div>
                    <div style="color: #fbbf24;">contract IndustrialEscrow is ReentrancyGuard {</div>
                    <div style="padding-left: 16px; color: #f472b6;">event EscrowFinalized(bytes32 indexed custodyHash);</div>
                    <div style="padding-left: 16px; color: #4ade80;">function releaseUponTelemetry(bytes calldata proof) external {</div>
                    <div style="padding-left: 32px; color: #94a3b8;">require(ZKVerifier.verify(proof), "Invalid proof");</div>
                    <div style="padding-left: 32px; color: #60a5fa;">emit EscrowFinalized(keccak256(proof));</div>
                    <div style="padding-left: 16px; color: #4ade80;">}</div>
                    <div style="color: #fbbf24;">}</div>
                </div>
            </div>
        </div>

        <!-- Tab 3: Industrial IoT -->
        <div id="tab-iot" class="tab-content">
            <div class="glass-card tab-showcase-card">
                <div>
                    <span class="badge" style="margin-bottom: 16px; color: var(--accent-orange); border-color: rgba(255,122,26,0.3);">Physical Computing</span>
                    <h3 style="font-size: 2rem; margin-bottom: 16px;">Edge Telemetry & SCADA Modernization</h3>
                    <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 24px;">
                        Bridging heavy manufacturing and hardware telemetry with cloud analytics. Real-time predictive maintenance, sensor stream anomaly detection, and sub-millisecond edge processing.
                    </p>
                    <ul style="list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 30px;">
                        <li style="display: flex; align-items: center; gap: 10px; color: var(--text-secondary);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-orange)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            MQTT / OPC-UA legacy protocol adapters
                        </li>
                        <li style="display: flex; align-items: center; gap: 10px; color: var(--text-secondary);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--accent-orange)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Real-time 3D Digital Twin visualization
                        </li>
                    </ul>
                    <a href="{{ route('solutions') }}#iot" class="btn btn-primary">Explore Industrial IoT</a>
                </div>
                <div class="terminal-code-box">
                    <div style="color: var(--text-dim); margin-bottom: 12px;">// Telemetry Telemetry Stream</div>
                    <div style="color: #34d399;">NODE_ID: TR-8041 (Durgapur Plant Turbine #3)</div>
                    <div style="color: #60a5fa;">Sampling Rate: 1,000 Hz &bull; Vibration: 0.014g (Normal)</div>
                    <div style="color: #a78bfa;">Temperature: 64.2&deg;C &bull; Thermal Drift: +0.02%</div>
                    <div style="color: #f87171;">Edge Neural Model: Anomaly Probability &lt; 0.001%</div>
                    <div style="color: #38bdf8; margin-top: 10px;">MQTT Broker: CONNECTED (TLS 1.3 AES-GCM)</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     PREMIUM SERVICE CARDS (3D TILT)
     ========================================== -->
<section class="section" style="background: rgba(8, 8, 12, 0.4);">
    <div class="container">
        <div class="section-header">
            <span class="badge">Comprehensive Offerings</span>
            <h2 class="section-title">End-to-End Technology Stack</h2>
            <p class="section-desc">From initial mathematical modeling to resilient planetary deployments.</p>
        </div>

        <div class="grid-3">
            <div class="glass-card tilt-card">
                <div class="service-icon">⚡</div>
                <h3 class="card-title">AI & Intelligent Automation</h3>
                <p class="card-desc">
                    Custom autonomous agent workflows, computer vision classification, predictive analytics, and natural language understanding built directly into your operations.
                </p>
                <a href="{{ route('solutions') }}#ai" class="card-link">
                    Explore AI Systems
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="glass-card tilt-card">
                <div class="service-icon" style="color: var(--accent-orange); border-color: rgba(255,122,26,0.3); background: rgba(255,122,26,0.1);">🌐</div>
                <h3 class="card-title">Smart Infrastructure & Cloud</h3>
                <p class="card-desc">
                    Cloud-native architectures, container orchestration, automated continuous deployment pipelines, and zero-trust security postures for zero downtime.
                </p>
                <a href="{{ route('solutions') }}#cloud" class="card-link">
                    Explore Cloud DevOps
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="glass-card tilt-card">
                <div class="service-icon" style="color: var(--accent-red); border-color: rgba(255,59,48,0.3); background: rgba(255,59,48,0.1);">⚙️</div>
                <h3 class="card-title">Industrial IoT & Modernization</h3>
                <p class="card-desc">
                    Hardened sensor gateways, real-time edge processing, SCADA integrations, and digital twins that elevate physical industrial assets to peak efficiency.
                </p>
                <a href="{{ route('solutions') }}#iot" class="card-link">
                    Explore Industrial IoT
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     STATS COUNTER SECTION
     ========================================== -->
<section class="section" style="border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle); background: linear-gradient(180deg, #030305, #08080c);">
    <div class="container">
        <div class="grid-4">
            <div class="stat-item">
                <div class="stat-number" data-target="50" data-suffix="+">0</div>
                <div class="stat-label">Enterprise Clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="2" data-suffix="+">0</div>
                <div class="stat-label">Global Continents</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="80" data-suffix="+">0</div>
                <div class="stat-label">Production Deployments</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="99" data-suffix=".9%">0</div>
                <div class="stat-label">System Reliability SLA</div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     WHY CHOOSE US (SPLIT ACCENT SECTION)
     ========================================== -->
<section class="section">
    <div class="container">
        <div class="grid-2" style="align-items: center;">
            <div>
                <span class="badge">The Talisha Advantage</span>
                <h2 style="font-size: clamp(2.2rem, 4vw, 3.2rem); margin-top: 20px; margin-bottom: 24px;">
                    Why Fortune 500 & Hypergrowth Leaders Choose Us
                </h2>
                <p style="color: var(--text-muted); font-size: 1.1rem; line-height: 1.7; margin-bottom: 30px;">
                    We are not an off-the-shelf agency. We are an elite software research and development pod that embeds alongside your leadership to solve high-stakes technological bottlenecks.
                </p>
                <div class="why-choose-btns" style="display: flex; gap: 16px;">
                    <a href="{{ route('about') }}" class="btn btn-outline">Our Culture & Story</a>
                    <a href="{{ route('lead.create') }}" class="btn btn-primary">Schedule Discovery</a>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="glass-card" style="padding: 24px 30px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <span style="font-size: 1.8rem; font-weight: 800; color: var(--accent-gold);">01</span>
                        <div>
                            <h4 style="font-size: 1.2rem; margin-bottom: 4px;">Precision-First Architecture</h4>
                            <p style="color: var(--text-muted); font-size: 0.95rem;">Zero technical debt. Clean, documented, strictly typed systems built for long-term maintainability.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card" style="padding: 24px 30px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <span style="font-size: 1.8rem; font-weight: 800; color: var(--accent-gold);">02</span>
                        <div>
                            <h4 style="font-size: 1.2rem; margin-bottom: 4px;">Dedicated Engineering Pods</h4>
                            <p style="color: var(--text-muted); font-size: 0.95rem;">You work directly with senior architects, AI researchers, and systems leads—never junior middlemen.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-card" style="padding: 24px 30px;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <span style="font-size: 1.8rem; font-weight: 800; color: var(--accent-gold);">03</span>
                        <div>
                            <h4 style="font-size: 1.2rem; margin-bottom: 4px;">Sub-Second Latency & High Concurrency</h4>
                            <p style="color: var(--text-muted); font-size: 0.95rem;">Stress-tested under planetary loads to guarantee buttery smoothness and uninterrupted uptime.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     OFFICIAL TEAM ID CARDS SECTION
     ========================================== -->
<section class="section" id="team" style="background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.04) 0%, transparent 70%);">
    <div class="container">
        <div class="section-header">
            <span class="badge">Engineering Leaders & Creators</span>
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-desc">The senior architects, researchers, and specialists driving sovereign agentic technologies.</p>
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
</section>

<!-- ==========================================
     LATEST ARTICLES & INSIGHTS
     ========================================== -->
<section class="section" style="background: rgba(8, 8, 12, 0.4);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 60px; flex-wrap: wrap; gap: 20px;">
            <div>
                <span class="badge">Engineering Knowledge Hub</span>
                <h2 class="section-title" style="margin-bottom: 8px;">Recent Articles & Research</h2>
                <p class="section-desc">Deep-dive technical perspectives from our engineering directors.</p>
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-outline">
                View All Articles
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid-3">
            @foreach($articles as $art)
                <div class="glass-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <span class="badge" style="font-size: 0.75rem;">{{ $art->category->name ?? 'Research' }}</span>
                            <span style="font-size: 0.85rem; color: var(--text-dim);">{{ $art->reading_time }} min read</span>
                        </div>
                        <h3 style="font-size: 1.3rem; margin-bottom: 14px; line-height: 1.35;">
                            <a href="{{ route('articles.show', $art->slug) }}" style="color: #fff;">{{ $art->title }}</a>
                        </h3>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px;">
                            {{ $art->excerpt }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('articles.show', $art->slug) }}" class="card-link">
                            Read Full Article
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================
     CINEMATIC CTA BANNER
     ========================================== -->
<section class="section" style="position: relative; overflow: hidden; padding: 140px 0; background: radial-gradient(ellipse 80% 50% at 50% 50%, rgba(255, 59, 48, 0.12), transparent 70%);">
    <div class="container" style="text-align: center; position: relative; z-index: 2;">
        <span class="badge" style="margin-bottom: 20px;">Ready for World-Class Execution?</span>
        <h2 style="font-size: clamp(2.5rem, 5.5vw, 4.4rem); max-width: 880px; margin: 0 auto 24px; line-height: 1.1;">
            Transform Your Vision Into High-Velocity Reality.
        </h2>
        <p style="color: var(--text-secondary); font-size: 1.25rem; max-width: 660px; margin: 0 auto 40px; line-height: 1.65;">
            Speak directly with our technology leaders to scope timelines, evaluate architectures, and accelerate your time-to-market.
        </p>
        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <a href="{{ route('lead.create') }}" class="btn btn-primary" style="padding: 16px 36px; font-size: 1.05rem;">
                Initiate Project Discovery
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="tel:+918001087752" class="btn btn-outline" style="padding: 16px 32px; font-size: 1.05rem;">
                Call +91 8001087752
            </a>
        </div>
    </div>
</section>
@endsection
