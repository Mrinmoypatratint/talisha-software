@extends('layouts.app')

@section('title', 'Enterprise Solutions & Architecture — Talisha Software')
@section('description', 'Explore our comprehensive technology solutions in Agentic AI, Web3 Smart Contracts, Industrial IoT telemetry, and Cloud Infrastructure.')

@section('content')
<section class="section" style="padding-top: 160px;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto 80px; text-align: center;">
            <span class="badge">Enterprise Technology Suites</span>
            <h1 style="font-size: clamp(2.8rem, 5vw, 4.2rem); margin-top: 20px; margin-bottom: 24px;">
                Engineered for <span class="text-gradient-gold">Mathematical Certainty</span>.
            </h1>
            <p style="font-size: 1.2rem; color: var(--text-muted); line-height: 1.7;">
                High-performance architectures built to process high-throughput workloads, preserve data sovereignty, and operate with zero unplanned downtime.
            </p>
        </div>

        <!-- 1. Agentic AI -->
        <div id="agentic-ai" class="glass-card" style="margin-bottom: 50px; padding: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
                <div>
                    <span class="badge" style="margin-bottom: 12px;">Autonomous Intelligence</span>
                    <h2 style="font-size: 2.2rem;">Agentic AI & Multi-Agent Orchestration</h2>
                </div>
                <a href="{{ route('lead.create') }}?service=agentic-ai" class="btn btn-primary">Scope AI Architecture</a>
            </div>
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7; margin-bottom: 30px;">
                We build goal-directed multi-agent networks that execute complex multistep cognitive workflows. Our systems feature tool-calling engines, deterministic state graphs, short/long-term memory vectors, and real-time self-correcting validation loops.
            </p>
            <div class="grid-3">
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-gold); margin-bottom: 8px;">State Graph Pipelines</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Cyclic reasoning graphs that handle edge cases and recover from external API disruptions.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-gold); margin-bottom: 8px;">Private Inference Clusters</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Deploy open-source weights (vLLM, TensorRT-LLM) inside your firewall with zero corporate data exposure.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-gold); margin-bottom: 8px;">Deterministic Guardrails</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Pydantic validation schemas, semantic safety layers, and audit logging on every action.</p>
                </div>
            </div>
        </div>

        <!-- 2. Web3 & Blockchain -->
        <div id="web3" class="glass-card" style="margin-bottom: 50px; padding: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
                <div>
                    <span class="badge" style="margin-bottom: 12px; color: var(--accent-red); border-color: rgba(255,59,48,0.3);">Decentralized Trust</span>
                    <h2 style="font-size: 2.2rem;">Web3 Protocols, Smart Contracts & ZK</h2>
                </div>
                <a href="{{ route('lead.create') }}?service=web3" class="btn btn-primary">Scope Web3 Project</a>
            </div>
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7; margin-bottom: 30px;">
                Formally audited EVM smart contracts, cross-chain bridge integrations, and zero-knowledge rollup infrastructure engineered for industrial and financial settlement.
            </p>
            <div class="grid-3">
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-red); margin-bottom: 8px;">Gas-Optimized EVM</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Hand-tuned Yul assembly, reentrancy guards, and stress-tested multi-sig security.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-red); margin-bottom: 8px;">Supply Chain Provenance</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Cryptographic asset tagging and immutable custody tracking across global transit points.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-red); margin-bottom: 8px;">Zero-Knowledge Proofs</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Verify commercial transactions without exposing confidential pricing or counterparty identities.</p>
                </div>
            </div>
        </div>

        <!-- 3. Industrial IoT -->
        <div id="iot" class="glass-card" style="margin-bottom: 50px; padding: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
                <div>
                    <span class="badge" style="margin-bottom: 12px; color: var(--accent-orange); border-color: rgba(255,122,26,0.3);">Hardware Intelligence</span>
                    <h2 style="font-size: 2.2rem;">Industrial IoT, SCADA & Digital Twins</h2>
                </div>
                <a href="{{ route('lead.create') }}?service=iot" class="btn btn-primary">Scope IoT Solution</a>
            </div>
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7; margin-bottom: 30px;">
                Connecting physical industrial assets to intelligent analytics streams with sub-millisecond edge ML processing and hardened communication channels.
            </p>
            <div class="grid-3">
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-orange); margin-bottom: 8px;">Edge Computing Gateways</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Embedded Linux / RTOS micro-nodes performing on-device ML anomaly detection.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-orange); margin-bottom: 8px;">Predictive Maintenance</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Detect mechanical vibration anomalies days before catastrophic plant equipment failure.</p>
                </div>
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); padding: 24px; border-radius: var(--radius-md);">
                    <h4 style="font-size: 1.1rem; color: var(--accent-orange); margin-bottom: 8px;">3D WebGL Digital Twins</h4>
                    <p style="font-size: 0.92rem; color: var(--text-muted);">Real-time visual telemetry dashboards showing physical machine state in 3D in the browser.</p>
                </div>
            </div>
        </div>

        <!-- 4. Cloud & DevOps -->
        <div id="cloud" class="glass-card" style="padding: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
                <div>
                    <span class="badge" style="margin-bottom: 12px; color: #60a5fa; border-color: rgba(96,165,250,0.3);">Cloud & DevOps</span>
                    <h2 style="font-size: 2.2rem;">Planetary Cloud Infrastructure</h2>
                </div>
                <a href="{{ route('lead.create') }}?service=cloud" class="btn btn-primary">Scope Cloud Setup</a>
            </div>
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.7; margin-bottom: 30px;">
                Kubernetes orchestration, automated CI/CD pipelines, multi-cloud redundancy, and zero-trust security postures that scale smoothly without operational headaches.
            </p>
        </div>
    </div>
</section>
@endsection
