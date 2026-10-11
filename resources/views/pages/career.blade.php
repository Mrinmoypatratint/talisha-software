@extends('layouts.app')

@section('title', 'Careers & Engineering Culture — Talisha Software')
@section('description', 'Join our elite engineering team. View open positions in Agentic AI, Web3, and Creative Frontend Engineering.')

@section('content')
<section class="section" style="padding-top: 160px;">
    <div class="container">
        <div style="max-width: 820px; margin: 0 auto 70px; text-align: center;">
            <span class="badge">Join the Vanguard</span>
            <h1 style="font-size: clamp(2.8rem, 5vw, 4.2rem); margin-top: 20px; margin-bottom: 24px;">
                Engineer the <span class="text-gradient-gold">Intelligent Future</span>.
            </h1>
            <p style="font-size: 1.2rem; color: var(--text-muted); line-height: 1.7;">
                We are building the sovereign technologies that will define the next decade of computing. If you obsess over performance, mathematical elegance, and craftsmanship, your home is here.
            </p>
        </div>

        <!-- Open Roles -->
        <div style="margin-bottom: 80px;">
            <div class="section-header" style="text-align: left; margin-bottom: 40px;">
                <span class="badge">Open Openings</span>
                <h2 style="font-size: 2.4rem; margin-top: 12px;">Current Opportunities</h2>
            </div>

            <div style="display: flex; flex-direction: column; gap: 30px;">
                @forelse($careers as $job)
                    <div class="glass-card" style="padding: 40px;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
                            <div>
                                <div style="display: flex; gap: 12px; align-items: center; margin-bottom: 12px; flex-wrap: wrap;">
                                    <span class="badge" style="font-size: 0.75rem;">{{ $job->department }}</span>
                                    <span style="font-size: 0.85rem; color: var(--text-muted);">📍 {{ $job->location }}</span>
                                    <span style="font-size: 0.85rem; color: var(--accent-gold);">💼 {{ ucwords(str_replace('_', ' ', $job->employment_type)) }}</span>
                                </div>
                                <h3 style="font-size: 1.8rem; margin-bottom: 8px;">{{ $job->title }}</h3>
                                @if($job->salary_range)
                                    <p style="color: var(--accent-gold); font-weight: 600; font-size: 1rem; margin-bottom: 14px;">Compensation: {{ $job->salary_range }}</p>
                                @endif
                            </div>
                            <a href="#apply-{{ $job->id }}" class="btn btn-primary" onclick="document.getElementById('apply-modal-{{ $job->id }}').style.display = 'block';">
                                Apply for Role
                            </a>
                        </div>

                        <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.65; margin-bottom: 24px;">
                            {{ $job->short_description }}
                        </p>

                        <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 24px; margin-bottom: 24px;">
                            <h4 style="font-size: 1.05rem; margin-bottom: 10px; color: var(--text-primary);">Role Requirements:</h4>
                            <div style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.7; white-space: pre-line;">{{ $job->requirements }}</div>
                        </div>

                        <!-- Apply Modal / Form Container -->
                        <div id="apply-modal-{{ $job->id }}" style="display: none; background: rgba(0,0,0,0.85); border: 1px solid var(--accent-gold); border-radius: var(--radius-lg); padding: 36px; margin-top: 30px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                                <h4 style="font-size: 1.4rem;">Apply for {{ $job->title }}</h4>
                                <button type="button" onclick="document.getElementById('apply-modal-{{ $job->id }}').style.display = 'none';" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;">&times;</button>
                            </div>

                            <form action="{{ route('career.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="name" required class="form-control" placeholder="Dr. Jane Doe">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" required class="form-control" placeholder="jane@example.com">
                                    </div>
                                </div>
                                <div class="grid-2">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="text" name="phone" required class="form-control" placeholder="+91 9876543210">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">LinkedIn / GitHub URL</label>
                                        <input type="url" name="linkedin_url" class="form-control" placeholder="https://linkedin.com/in/...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upload Resume / CV (PDF, DOCX max 10MB)</label>
                                    <input type="file" name="resume" accept=".pdf,.doc,.docx" class="form-control" style="padding: 10px;">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Cover Note / Why Talisha Software?</label>
                                    <textarea name="cover_letter" class="form-control" placeholder="Briefly share what you have built and why you are excited to join..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-gold" style="width: 100%;">Submit Application</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="glass-card" style="text-align: center; padding: 60px;">
                        <p style="color: var(--text-muted); font-size: 1.15rem;">No open roles at this moment. You can send your speculative portfolio to talent@talishasoftware.tech.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
