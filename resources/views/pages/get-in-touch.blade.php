@extends('layouts.app')

@section('title', 'Initiate Project Discovery — Talisha Software')
@section('description', 'Provide project parameters, estimated budget, and timeline to begin architectural collaboration with Talisha Software.')

@section('content')
<section class="section" style="padding-top: 160px; min-height: 100vh;">
    <div class="container" style="max-width: 860px;">
        <div style="text-align: center; margin-bottom: 60px;">
            <span class="badge">Project Discovery Engine</span>
            <h1 style="font-size: clamp(2.6rem, 5vw, 4rem); margin-top: 20px; margin-bottom: 20px;">
                Initiate Your <span class="text-gradient-gold">Architecture Session</span>.
            </h1>
            <p style="font-size: 1.15rem; color: var(--text-muted); max-width: 680px; margin: 0 auto; line-height: 1.65;">
                Tell us about your technical objectives. An Engineering Director will prepare architectural recommendations tailored to your stack.
            </p>
        </div>

        <div class="glass-card" style="padding: 50px;">
            <form action="{{ route('lead.store') }}" method="POST">
                @csrf

                <!-- 1. Service Selection -->
                <div class="form-group" style="margin-bottom: 36px;">
                    <label class="form-label" style="font-size: 1.05rem; margin-bottom: 14px;">1. Select Primary Technological Focus *</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px;">
                        <label style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 16px; border-radius: var(--radius-md); cursor: pointer; display: flex; align-items: center; gap: 10px;">
                            <input type="radio" name="service_interest" value="Agentic AI & LLMs" checked style="accent-color: var(--accent-gold);">
                            <span style="font-size: 0.95rem; font-weight: 500;">Agentic AI & Multi-Agent</span>
                        </label>
                        <label style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 16px; border-radius: var(--radius-md); cursor: pointer; display: flex; align-items: center; gap: 10px;">
                            <input type="radio" name="service_interest" value="Web3 & Blockchain" style="accent-color: var(--accent-gold);">
                            <span style="font-size: 0.95rem; font-weight: 500;">Web3 & Smart Contracts</span>
                        </label>
                        <label style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 16px; border-radius: var(--radius-md); cursor: pointer; display: flex; align-items: center; gap: 10px;">
                            <input type="radio" name="service_interest" value="Industrial IoT & SCADA" style="accent-color: var(--accent-gold);">
                            <span style="font-size: 0.95rem; font-weight: 500;">Industrial IoT & SCADA</span>
                        </label>
                        <label style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 16px; border-radius: var(--radius-md); cursor: pointer; display: flex; align-items: center; gap: 10px;">
                            <input type="radio" name="service_interest" value="Cloud & Digital Transformation" style="accent-color: var(--accent-gold);">
                            <span style="font-size: 0.95rem; font-weight: 500;">Cloud & Transformation</span>
                        </label>
                    </div>
                </div>

                <!-- 2. Budget & Timeline -->
                <div class="grid-2" style="margin-bottom: 30px;">
                    <div class="form-group">
                        <label class="form-label">Estimated Budget Tier</label>
                        <select name="budget_range" class="form-control" style="background-color: var(--bg-elevated);">
                            <option value="₹10L - ₹25L ($15K - $30K)">₹10L - ₹25L ($15K - $30K)</option>
                            <option value="₹25L - ₹50L ($30K - $65K)" selected>₹25L - ₹50L ($30K - $65K)</option>
                            <option value="₹50L - ₹1Cr ($65K - $125K)">₹50L - ₹1Cr ($65K - $125K)</option>
                            <option value="₹1Cr+ ($125K+)">₹1Cr+ ($125K+ Enterprise)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Target Delivery Timeline</label>
                        <select name="timeline" class="form-control" style="background-color: var(--bg-elevated);">
                            <option value="Immediate (< 1 month)">Immediate (&lt; 1 month)</option>
                            <option value="1 - 3 months" selected>1 - 3 months</option>
                            <option value="3 - 6 months">3 - 6 months</option>
                            <option value="Strategic Partnership / Ongoing">Strategic Partnership / Ongoing</option>
                        </select>
                    </div>
                </div>

                <!-- 3. Contact Coordinates -->
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Your Name *</label>
                        <input type="text" name="name" required class="form-control" placeholder="Jane Doe">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Corporate Email Address *</label>
                        <input type="email" name="email" required class="form-control" placeholder="jane@company.com">
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Phone / WhatsApp</label>
                        <input type="text" name="phone" class="form-control" placeholder="+91 ...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Organization / Company Name</label>
                        <input type="text" name="company" class="form-control" placeholder="Acme Technologies Inc.">
                    </div>
                </div>

                <!-- 4. Project Vision -->
                <div class="form-group">
                    <label class="form-label">Project Scope & Technical Objectives *</label>
                    <textarea name="message" required class="form-control" rows="5" placeholder="Describe the problem, target scale, key integrations (ERP, sensor protocols, LLM models), and expected outcomes..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 18px; font-size: 1.05rem; margin-top: 10px;">
                    Submit Inquiry & Request NDA
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
