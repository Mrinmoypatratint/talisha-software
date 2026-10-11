# 📋 Product Requirements Document (PRD)

## Talisha Software — World-Class Website Rebuild

| Field | Detail |
|---|---|
| **Document Version** | 2.0 (Production Stable) |
| **Date** | October 2026 |
| **Author** | Engineering Team |
| **Status** | Approved & Deployed to Production |
| **Project Codename** | **Project Apex** |
| **Production URL** | [https://talisha-software.vercel.app](https://talisha-software.vercel.app) |

---

## 1. Executive Summary

Talisha Software has successfully rebuilt its web presence from a static HTML site to a **world-class, high-performance, dark-mode web application and content management system**. The platform serves as the company's primary digital storefront and client lead engine — communicating its expertise in **Agentic AI, Web3, Blockchain, IoT, and Enterprise Digital Transformation** with bespoke executive polish.

> [!IMPORTANT]
> The design system utilizes an **Obsidian Precision Solid Dark UI** standard: zero glassmorphism, zero generic AI-template looks, physical depth shadows, and bespoke human-crafted typography (`Plus Jakarta Sans` + `Outfit`).

---

## 2. Company Profile (Extracted from Current Site)

| Attribute | Value |
|---|---|
| **Company Name** | Talisha Software |
| **Tagline** | Agentic AI Solutions & Software Development Company |
| **Founded** | 2024+ |
| **Locations** | Durgapur, Kolkata, Gujarat, Bangalore (India) |
| **Phone (Customer)** | +91 8001087752 |
| **Phone (CTO Office)** | +91 8217707328 |
| **Emails** | info@talishasoftware.tech, talishasoftware@gmail.com, pijushpal@talishasoftware.tech |
| **Website** | talishasoftware.tech |
| **Social** | @talishasoftware |
| **Stats** | 50+ Clients · 2+ Countries · 2+ Years Excellence |

---

## 3. Vision & Objectives

### 3.1 Vision
> *"To create the most visually stunning and technically impressive tech company website in India — one that rivals Apple, NVIDIA, and Stripe in design quality, 3D immersion, and user engagement."*

### 3.2 Primary Objectives

| # | Objective | Success Metric |
|---|---|---|
| O1 | **Premium Brand Perception** | >90% positive first-impression survey score |
| O2 | **Lead Generation** | 3x increase in "Get in Touch" form submissions |
| O3 | **Engagement** | Average session duration >3 minutes |
| O4 | **Performance** | Lighthouse score >85 on mobile |
| O5 | **SEO Dominance** | Page 1 ranking for "AI Software Company India" |
| O6 | **Mobile Excellence** | Flawless experience on all devices |

---

## 4. Target Audience

| Segment | Description | Priority |
|---|---|---|
| **Enterprise CTOs/CIOs** | Decision-makers evaluating AI/Web3 partners | 🔴 High |
| **Startup Founders** | Looking for tech co-development partners | 🔴 High |
| **Government/PSU** | Digital transformation procurement officers | 🟡 Medium |
| **Talent/Recruits** | Engineers exploring career opportunities | 🟡 Medium |
| **Investors** | Evaluating company capability and vision | 🟢 Low |

---

## 5. Site Architecture & Pages

### 5.1 Page Map

```
talishasoftware.tech/
├── / (Home) ← Hero + All major sections
├── /about
├── /solutions
├── /articles (Blog/Articles listing)
│   └── /articles/{slug} (Single article)
├── /career
├── /contact
├── /get-in-touch (Lead capture form)
└── /admin (CMS Dashboard — Authenticated)
    ├── /admin/articles (CRUD)
    ├── /admin/leads (Form submissions)
    ├── /admin/careers (Job postings CRUD)
    └── /admin/settings
```

### 5.2 Page Descriptions

#### 🏠 Home Page (Hero)
The centerpiece. Must deliver a **cinematic first impression**.

| Section | Description | Animation |
|---|---|---|
| **Hero** | Full-screen 3D animated scene (Three.js/Spline). Company logo, tagline, CTA buttons. AI-powered search bar. | Particle system / 3D globe / neural network animation |
| **Partners Ticker** | Infinite scroll logo marquee showing client logos | Smooth horizontal scroll with hover pause |
| **Introduction** | "Welcome to the Intelligent Digital Era" — Mission statement | Scroll-triggered fade-in with parallax |
| **AI Solutions Showcase** | Interactive tabs: AI Product Dev, Web3/Blockchain, Enterprise DT — each with video/3D preview | Tab switch with crossfade video transition |
| **Services Grid** | 3 premium cards: AI & Automation, Smart Infrastructure, Industrial IoT | Hover lift + glow + arrow animation |
| **Emerging Tech** | 2×2 grid: AI/ML, IoT, AR/VR, Cloud/DevOps | Border glow cards with scroll-reveal |
| **Why Choose Us** | Split layout: Title left + 5 numbered reasons in orange box right | Staggered number count-up animation |
| **Industry Impact** | Dual-card layout showing 7 industry verticals | Scroll-triggered card stagger |
| **Get in Touch Footer** | Full-screen CTA with contact details and background image | Parallax background + text reveal |

#### 📖 About Page
- Company story, founder vision, team section
- Timeline of milestones (animated horizontal scroll)
- Culture & values with 3D icon illustrations

#### 🛠 Solutions Page
- Deep-dive into each service offering
- Interactive 3D demos/illustrations per service
- Case study previews with results metrics

#### 📰 Articles/Blog
- Dynamic listing from CMS (Laravel backend)
- Category filtering, search, pagination
- Rich article pages with reading time, share buttons

#### 💼 Career Page
- Open positions from CMS
- Company culture section with team photos
- Application form with file upload

#### 📞 Contact Page
- Interactive contact form with validation
- Embedded Google Map
- Office locations with details

#### 📝 Get in Touch (Lead Capture)
- Multi-step form wizard
- Service interest selection
- Budget range, timeline, project description
- Auto-response email on submission

---

## 6. Core Features

### 6.1 Frontend Features

| # | Feature | Priority | Description |
|---|---|---|---|
| F1 | **3D Hero Animation** | 🔴 P0 | Three.js / Spline-powered immersive hero section |
| F2 | **Scroll-Driven Animations** | 🔴 P0 | GSAP ScrollTrigger + Lenis smooth scroll throughout |
| F3 | **Dark Mode First** | 🔴 P0 | Cinematic dark theme as primary; optional light toggle |
| F4 | **Responsive Design** | 🔴 P0 | Pixel-perfect on mobile, tablet, desktop (360px → 2560px) |
| F5 | **Video Backgrounds** | 🟡 P1 | Auto-playing muted video sections for AI/services showcase |
| F6 | **Interactive Service Cards** | 🟡 P1 | Hover 3D tilt effect, glassmorphism, glow borders |
| F7 | **Partner Logo Carousel** | 🟡 P1 | Infinite smooth scroll with pause-on-hover |
| F8 | **Animated Statistics** | 🟡 P1 | Count-up numbers on scroll intersection |
| F9 | **Navigation** | 🔴 P0 | Slide-in side menu (existing) + sticky header on scroll |
| F10 | **AI Search Bar** | 🟢 P2 | Contextual search with voice input (hero section) |
| F11 | **Page Transitions** | 🟡 P1 | Smooth SPA-like page transitions with loading animation |
| F12 | **Micro-interactions** | 🟡 P1 | Button ripples, hover glows, cursor effects |
| F13 | **Particle Effects** | 🟢 P2 | Ambient floating particles / neural network background |

### 6.2 Backend Features

| # | Feature | Priority | Description |
|---|---|---|---|
| B1 | **Article CMS** | 🔴 P0 | Full CRUD for blog articles with rich text editor |
| B2 | **Lead Management** | 🔴 P0 | Store & manage "Get in Touch" form submissions |
| B3 | **Career Postings** | 🟡 P1 | CRUD for job listings with application tracking |
| B4 | **Contact Form Handler** | 🔴 P0 | Form submission with email notification |
| B5 | **Admin Dashboard** | 🔴 P0 | Protected admin panel for content management |
| B6 | **SEO Management** | 🟡 P1 | Meta tags, sitemap, robots.txt management |
| B7 | **Analytics Integration** | 🟡 P1 | Google Analytics 4 + custom event tracking |
| B8 | **Email Service** | 🔴 P0 | Transactional emails (form confirmations, notifications) |
| B9 | **Media Upload** | 🟡 P1 | Image/video upload with optimization |
| B10 | **Multi-domain Config** | 🟢 P2 | Dynamic content based on domain (existing feature) |

---

## 7. Design Requirements

### 7.1 Design Language
 
| Aspect | Specification |
|---|---|
| **Primary Theme** | Dark Mode (Obsidian Deep Base: `#06070a`) |
| **Card / Surface** | Solid Obsidian: `#11131a`, Elevated: `#141722` (No glassmorphism / No transparency blur) |
| **Borders & Dividers** | Physical subtle boundary lines: `#1e2230` |
| **Accent Color 1** | Primary Brand Orange: `#ff7a1a` (Hover glows, active toggles) |
| **Accent Color 2** | Warm Gold: `#f5a623` (Top accent line on hover) |
| **Accent Color 3** | Electric Blue: `#3b82f6` (Highlights, stats) |
| **Typography** | Body: `Plus Jakarta Sans` · Headings: `Outfit` · Legacy Brand: `Poppins` |
| **Border Radius** | Cards: 16-24px, Badges: 6-8px architectural tags (No 9999px pills) |
| **Mobile Menu** | 2×2 rounded box grid toggle with signature bottom-left orange box (`#ff7a1a`) |
| **Shadows** | Tactile depth drop shadows (`0 8px 24px rgba(0,0,0,0.45)`) |

### 7.2 Animation Standards (from PDF Resource Vault)

| Library | Usage |
|---|---|
| **GSAP + ScrollTrigger** | Primary animation engine — scroll-driven reveals, timelines, SplitText |
| **Lenis** | Smooth scroll (paired with GSAP) |
| **Three.js / Spline** | 3D hero scenes, interactive backgrounds |
| **Motion (Framer Motion)** | React component micro-animations |

### 7.3 Reference Benchmarks

| Website | What to Emulate |
|---|---|
| **apple.com** | Scroll-driven product reveals, cinematic storytelling, typography |
| **nvidia.com** | 3D hero sections, tech-forward dark aesthetic, particle effects |
| **stripe.com** | Gradient animations, glassmorphism, premium card layouts |
| **linear.app** | Smooth transitions, dark UI polish, attention to detail |
| **vercel.com** | Developer-focused storytelling, clean grid layouts |

---

## 8. Non-Functional Requirements

| Requirement | Target |
|---|---|
| **Page Load Time** | < 3 seconds (LCP) |
| **Lighthouse Performance** | > 85 (mobile), > 90 (desktop) |
| **Lighthouse Accessibility** | > 90 |
| **SEO Score** | > 90 |
| **Browser Support** | Chrome, Firefox, Safari, Edge (last 2 versions) |
| **Uptime** | 99.5% (Hostinger hosting) |
| **SSL** | Mandatory HTTPS |
| **GDPR/Privacy** | Cookie consent banner, privacy policy page |

---

## 9. Content Inventory (From Current Site)

### Hero Section
- Tagline: *"Revolutionizing Digital Experiences, Ownership & Innovation"*
- Heading: *"Redefining Business Through Artificial Intelligence"*
- CTAs: GET STARTED, Let's Build the Future, Soon on UAE, Soon on Google Play

### Introduction
- Title: *"Welcome to the Intelligent Digital Era"*
- Body: The digital world is evolving faster than ever. Build smarter systems. Deliver faster outcomes. Create lasting impact.
- Mission: *"To empower organizations with AI-driven systems that automate complexity, unlock insights, and accelerate innovation in a rapidly transforming global economy."*

### Services (3 Cards)
1. **AI & Intelligent Automation** — Build systems that think, learn, and adapt.
2. **Smart Infrastructure & Digital Platforms** — End-to-end hardware + software ecosystems.
3. **Industrial IoT & Embedded Solutions** — Hardware innovation backed by scalable software infrastructure.

### AI Solutions (3 Tabs with Videos)
1. **AI Product Development** — Design and deploy intelligent AI systems, chatbots, automation tools, and predictive platforms.
2. **Web3 & Blockchain Engineering** — Build secure smart contracts, dApps, and scalable blockchain infrastructures.
3. **Enterprise Digital Transformation** — Modernize operations with cloud-native systems, data engineering, and intelligent automation.

### Emerging Tech (4 Cards)
1. AI & Machine Learning — Smarter decision-making
2. IoT & Edge Computing — Real-time data at the edge
3. AR/VR & Metaverse — Immersive digital experiences
4. Cloud & DevOps — Scalable infrastructure for growth

### Why Choose Talisha (5 Reasons)
1. AI-driven hardware & software integration expertise
2. End-to-end smart system development from device to cloud
3. Scalable infrastructure built for Industry 4.0
4. Security-first architecture with real-time intelligence
5. Future-ready innovation powered by AI & IoT

### Industry Impact (7 Verticals)
1. Financial Technology
2. Manufacturing & Industry 4.0
3. Healthcare Technology
4. Smart Infrastructure
5. E-Commerce & Retail
6. Enterprise Automation
7. Energy & Utilities

### Contact Info
- CTO Office: +91 8217707328
- Customer: +91 8001087752
- Emails: pijushpal@talishasoftware.tech, hello@talishasoftware, talishasoftware@gmail.com
- Web: talishasoftware.tech
- Social: @talishasoftware

---

## 10. Navigation Structure

| Menu Item | URL | Type |
|---|---|---|
| Home | `/` | Public |
| About | `/about` | Public |
| All Articles | `/articles` | Public (Dynamic) |
| Solutions | `/solutions` | Public |
| Career | `/career` | Public |
| Contact | `/contact` | Public |
| Stay Informed | `/get-in-touch` | Public (Form) |
| Login | `/admin/login` | Protected |

---

## 11. Success Criteria

| Criteria | Measurement | Target |
|---|---|---|
| Visual Quality | Peer review vs Apple/NVIDIA/Stripe | Comparable quality |
| Load Performance | Google PageSpeed Insights | >85 mobile |
| Lead Conversion | Form submissions / month | 3x current baseline |
| Bounce Rate | Google Analytics | <40% |
| Session Duration | Google Analytics | >3 minutes |
| SEO Rankings | Target keywords | Page 1 for 5+ terms |
| Mobile Responsiveness | Cross-device testing | Zero layout breaks |

---

## 12. Risks & Mitigations

| Risk | Impact | Mitigation |
|---|---|---|
| 3D animations hurt performance | High | Lazy-load 3D scenes, use LOD, fallback to 2D on low-end devices |
| Hostinger limitations for Laravel | Medium | Use shared hosting optimized plan or VPS; cache aggressively |
| Content migration gaps | Low | Audit all current content before migration |
| Browser compatibility for WebGL | Medium | Feature detection + graceful CSS-only fallbacks |
| Large media files slow load | High | CDN, WebP/AVIF images, compressed videos, lazy loading |

---

## 13. Timeline Overview

| Phase | Duration | Deliverables |
|---|---|---|
| **Phase 1: Foundation** | Week 1-2 | Laravel setup, DB schema, admin auth, base layout |
| **Phase 2: Frontend Core** | Week 3-5 | All pages with 3D animations, GSAP, responsive |
| **Phase 3: Backend CMS** | Week 4-6 | Article CMS, lead management, email service |
| **Phase 4: Polish** | Week 7-8 | Performance optimization, SEO, cross-browser testing |
| **Phase 5: Deploy** | Week 9 | Hostinger deployment, DNS, SSL, monitoring |
| **Phase 6: Launch** | Week 10 | Go-live, analytics setup, stakeholder review |

---

*Document maintained by Engineering Team. Last updated: 2026-10-11.*
