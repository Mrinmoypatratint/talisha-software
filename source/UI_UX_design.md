# 🎨 UI/UX Design Document

## Talisha Software — World-Class Visual Identity & Interaction Design

| Field | Detail |
|---|---|
| **Document Version** | 1.0 |
| **Date** | 2026-10-11 |
| **Design Benchmark** | Apple · NVIDIA · Stripe |
| **Status** | Draft |

---

## 1. Design Philosophy

> *"Every pixel must justify its existence. Every animation must serve the narrative. Every interaction must feel intentional and premium."*

### Core Principles

| Principle | Description |
|---|---|
| **Cinematic Storytelling** | The website should feel like watching a tech product reveal — each scroll should unveil the next chapter |
| **Dark-First Luxury** | Deep blacks with strategic pops of amber/gold create a premium, high-tech aesthetic |
| **Motion with Purpose** | Every animation guides the eye, reveals content, or reinforces brand identity — never gratuitous |
| **Spatial Depth** | 3D elements, glassmorphism, and layered parallax create real dimensionality |
| **Breathable Layout** | Generous whitespace (dark-space) lets premium content shine |

---

## 2. Design System

### 2.1 Color Palette

#### Primary Colors (Dark Theme)

| Token | Hex | HSL | Usage |
|---|---|---|---|
| `--bg-primary` | `#000000` | `0, 0%, 0%` | Main background |
| `--bg-secondary` | `#0a0a0a` | `0, 0%, 4%` | Section alternate |
| `--bg-elevated` | `#111111` | `0, 0%, 7%` | Cards, elevated surfaces |
| `--bg-surface` | `#1a1a1a` | `0, 0%, 10%` | Hover states, menu |
| `--bg-overlay` | `rgba(0,0,0,0.6)` | — | Modal/menu overlays |

#### Accent Colors

| Token | Hex | HSL | Usage |
|---|---|---|---|
| `--accent-gold` | `#f5a623` | `37, 91%, 55%` | Primary accent, borders, highlights |
| `--accent-red` | `#ff3b30` | `4, 100%, 59%` | CTA buttons, urgent actions |
| `--accent-orange` | `#ff7a1a` | `23, 100%, 55%` | Hover glows, interactive elements |
| `--accent-amber` | `#fe9d00` | `37, 100%, 50%` | Gradient strips, warm accents |

#### Text Colors

| Token | Hex | Usage |
|---|---|---|
| `--text-primary` | `#ffffff` | Headings, primary text |
| `--text-secondary` | `#e0e0e0` | Body copy |
| `--text-muted` | `#bdbdbd` | Subtitles, labels |
| `--text-dim` | `#888888` | Meta info, timestamps |
| `--text-dark` | `#222222` | Text on light backgrounds |

#### Gradient Definitions

```css
/* Hero gradient overlay */
--gradient-hero: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);

/* Gold accent gradient */
--gradient-gold: linear-gradient(135deg, #f5a623, #fe9d00);

/* CTA button gradient */
--gradient-cta: linear-gradient(135deg, #ff3b30, #ff7a1a);

/* Glass surface */
--gradient-glass: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02));

/* Bottom strip (Impact section) */
--gradient-strip: linear-gradient(to top, #fe9d00 0%, rgba(230,150,22,0.85) 40%, transparent 100%);

/* Text shimmer */
--gradient-text: linear-gradient(135deg, #fff, #aaa);
```

### 2.2 Typography

#### Font Stack

| Role | Font | Weight | Source |
|---|---|---|---|
| **Primary** | Inter | 300, 400, 500, 600, 700 | Google Fonts |
| **Fallback** | Poppins | 300, 400, 500, 600, 700 | Google Fonts (existing brand) |
| **Mono** | JetBrains Mono | 400, 500 | Google Fonts (code snippets) |

#### Type Scale (Desktop)

| Level | Size | Weight | Line Height | Letter Spacing | Usage |
|---|---|---|---|---|---|
| **Display XL** | 150px | 700 | 1.0 | -0.02em | "Get in Touch" hero text |
| **Display L** | 72px | 700 | 1.05 | -0.02em | Section hero headings |
| **Display M** | 60px | 700 | 1.1 | -0.01em | Service section titles |
| **H1** | 54px | 500 | 1.2 | -0.01em | Main page heading |
| **H2** | 40px | 700 | 1.15 | 0 | Section headings |
| **H3** | 26px | 600 | 1.3 | 0 | Card titles |
| **H4** | 22px | 600 | 1.3 | 0 | Sub-section labels |
| **Body L** | 20px | 400 | 1.6 | 0 | Contact info, featured text |
| **Body** | 18px | 400 | 1.6 | 0 | Main body text |
| **Body S** | 16px | 400 | 1.5 | 0 | Card descriptions |
| **Caption** | 14px | 400/600 | 1.4 | 0.02em | Labels, meta, taglines |
| **Overline** | 12px | 600 | 1.2 | 0.1em | Category tags, uppercase labels |

#### Type Scale (Mobile — ≤600px)

| Level | Desktop | Mobile | Reduction |
|---|---|---|---|
| Display XL | 150px | 48px | ~68% |
| Display L | 72px | 32px | ~56% |
| Display M | 60px | 32px | ~47% |
| H1 | 54px | 28px | ~48% |
| H2 | 40px | 28px | ~30% |
| H3 | 26px | 20px | ~23% |
| Body | 18px | 16px | ~11% |

### 2.3 Spacing System

| Token | Value | Usage |
|---|---|---|
| `--space-xs` | 8px | Tight inner padding |
| `--space-sm` | 16px | Small gaps |
| `--space-md` | 24px | Default component spacing |
| `--space-lg` | 40px | Section inner padding |
| `--space-xl` | 60px | Between major sections |
| `--space-2xl` | 80px | Hero/section padding |
| `--space-3xl` | 120px | Major section vertical spacing |

### 2.4 Border Radius

| Token | Value | Usage |
|---|---|---|
| `--radius-sm` | 8px | Small elements, tags |
| `--radius-md` | 12px | Buttons, inputs |
| `--radius-lg` | 20px | Cards |
| `--radius-xl` | 30px | Large cards, containers |
| `--radius-2xl` | 40px | Feature boxes |
| `--radius-full` | 50px/50% | Pills, circular buttons |

### 2.5 Shadows & Glows

```css
/* Elevation shadows */
--shadow-sm: 0 2px 8px rgba(0,0,0,0.3);
--shadow-md: 0 8px 24px rgba(0,0,0,0.4);
--shadow-lg: 0 15px 40px rgba(0,0,0,0.4);

/* Accent glows */
--glow-gold: 0 0 20px rgba(245,166,35,0.5);
--glow-gold-strong: 0 0 30px rgba(245,166,35,0.8);
--glow-orange: 0 0 25px rgba(255,122,26,0.5);
--glow-orange-strong: 0 0 30px rgba(255,122,26,0.7);
--glow-red: 0 0 20px rgba(255,59,48,0.5);

/* Glass effect */
--glass-bg: rgba(255,255,255,0.05);
--glass-border: rgba(255,255,255,0.1);
--glass-blur: blur(12px);
```

---

## 3. Component Library

### 3.1 Buttons

| Variant | Background | Border | Text | Hover Effect |
|---|---|---|---|---|
| **Primary (CTA)** | `#ff3b30` solid | None | White, 600 weight | Darken + translateY(-3px) + glow |
| **Outline** | Transparent | 2px `rgba(255,255,255,0.6)` | White | Border brightens + slight lift |
| **Store/Accent** | Transparent | 2px `#ff7a1a` | White | Orange glow `box-shadow` + lift + ripple effect on click |
| **Ghost** | Transparent | None | White with opacity | Full opacity + underline |
| **Admin Primary** | `--accent-gold` | None | Black | Darken 10% |

#### Button Specifications
- **Padding:** 16px 32px (standard) / 12px 20px (mobile)
- **Border Radius:** 12px (standard) / 30px (pill for "Stay informed")
- **Font Size:** 16px / 14px (mobile)
- **Transition:** `all 0.3s ease`
- **Active State:** Scale(0.95) with ripple animation

### 3.2 Cards

#### Service Card (Dark)
```
┌─────────────────────────────────────┐
│                                     │
│  AI & Intelligent              │
│  Automation                    │
│                                     │
│  Build systems that think,          │
│  learn, and adapt.                  │
│                                     │
│                              ↗      │
│                              arrow  │
└─────────────────────────────────────┘

Background: #000
Padding: 40px
Border-radius: 22px
Min-height: 230px
Hover: translateY(-10px) + shadow-lg
Arrow: rotate(-45deg) border trick, animates on hover
```

#### Tech Card (Bordered)
```
┌─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─┐
│                                      │
│  AI & Machine Learning               │
│  Smarter decision-making             │
│                                      │
└─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─ ─┘

Background: transparent
Border: 2px solid #f5a623
Border-radius: 20px
Padding: 30px 35px
Hover: bg #111 + translateY(-5px)
```

#### Impact Card (Light Theme)
```
┌─────────────────────────────────────┐
│                                     │
│  Financial Technology               │
│  AI-driven analytics, secure        │
│  transaction systems...             │
│                                     │
│  Manufacturing & Industry 4.0       │
│  IoT-enabled automation...          │
│                                     │
│  Healthcare Technology              │
│  Secure data systems...             │
│                                     │
│  Smart Infrastructure               │
│  Integrated hardware-software...    │
│                                     │
└─────────────────────────────────────┘

Background: #ffffff
Border: 2px solid #2a2a2a
Padding: 45px 35px
Width: 330px
```

### 3.3 Navigation

#### Side Menu
- **Width:** 420px (desktop) / 85% (mobile)
- **Background:** `#0d0d0d`
- **Entry Animation:** Slide from right, 0.4s ease
- **Overlay:** `rgba(0,0,0,0.6)` with fade-in
- **Menu Items:** 22px font, 22px padding, top border `rgba(255,255,255,0.08)`
- **Active State:** Background `#3a3a3a`
- **Hover State:** Background `#1a1a1a`, text color `#ff6a00`

#### Menu Icon (2×2 Grid)
- **Size:** 50px × 50px
- **Grid:** 2 columns, 6px gap
- **Dots:** `#e0e0e0` with one `#ff7a1a` (active-box)
- **Hover:** All dots get orange glow
- **Position:** Fixed, top-right, z-index 1000

### 3.4 Search Bar

- **Width:** 460px (desktop) / 100% (mobile)
- **Height:** 70px
- **Border Radius:** 60px (pill)
- **Border:** 2px solid `rgba(255,255,255,0.6)`
- **Background:** `rgba(0,0,0,0.35)` + `backdrop-filter: blur(12px)`
- **Hover:** Border → `#ff7a1a`, glow shadow
- **Focus:** Border → `#ff7a1a`, stronger glow, scale(1.02)

### 3.5 Forms

| Element | Style |
|---|---|
| **Input** | Dark bg (`#111`), white text, gold bottom-border on focus, 16px font |
| **Textarea** | Same as input, min-height 120px |
| **Select** | Custom styled dropdown, dark theme |
| **File Upload** | Drag-and-drop zone with dashed border, gold on hover |
| **Error State** | Red border + red text below field |
| **Success State** | Green checkmark icon |

---

## 4. Page Layouts

### 4.1 Home Page Layout (Desktop — 1440px)

```
╔══════════════════════════════════════════════════════════════╗
║  [Logo]                                        [□□ Menu]    ║
║                                                             ║
║  Revolutionizing Digital Experiences...                      ║
║                                                             ║
║  [TALISHA SOFTWARE LOGO - 420px]        ╭─────────────────╮ ║
║                                         │  🔍 _____ 🎤   │ ║
║  Redefining Business Through            ╰─────────────────╯ ║
║  Artificial Intelligence                                    ║
║                                                             ║
║  [GET STARTED →] [Let's Build...→] [UAE→] [Play→]          ║
╠══════════════════════════════════════════════════════════════╣
║                  OUR PARTNERS                               ║
║  ← [logo] [logo] [logo] [logo] [logo] [logo] →             ║
║     50+ Clients    2+ Countries    2+ Years                 ║
╠══════════════════════════════════════════════════════════════╣
║  Introduction          │  Our mission                       ║
║                        │                                    ║
║  Welcome to            │  To empower organizations          ║
║  the Intelligent       │  with AI-driven systems            ║
║  Digital Era           │  that automate complexity...        ║
║                        │                                    ║
║  The digital world     │                                    ║
║  is evolving...        │                                    ║
╠══════════════════════════════════════════════════════════════╣
║  AI Product Dev     │  ┌───────────────────────────────┐    ║
║  ─────────────      │  │                               │    ║
║  Web3 & Blockchain  │  │      [VIDEO PLAYER]           │    ║
║  ─────────────      │  │                               │    ║
║  Enterprise DT      │  └───────────────────────────────┘    ║
╠══════════════════════════════════════════════════════════════╣
║  Our Services — End-to-End Blockchain & Web3                ║
║  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐        ║
║  │ AI &         │ │ Smart        │ │ Industrial   │        ║
║  │ Intelligent  │ │ Infra &      │ │ IoT &        │        ║
║  │ Automation   │ │ Digital      │ │ Embedded     │        ║
║  │           ↗  │ │           ↗  │ │           ↗  │        ║
║  └──────────────┘ └──────────────┘ └──────────────┘        ║
╠══════════════════════════════════════════════════════════════╣
║  Emerging Tech We Integrate                                 ║
║  ┌──────────────────┐ ┌──────────────────┐                 ║
║  │ AI & ML          │ │ IoT & Edge       │                 ║
║  └──────────────────┘ └──────────────────┘                 ║
║  ┌──────────────────┐ ┌──────────────────┐                 ║
║  │ AR/VR & Meta     │ │ Cloud & DevOps   │                 ║
║  └──────────────────┘ └──────────────────┘                 ║
╠══════════════════════════════════════════════════════════════╣
║  ┌─────────────────────┐ ┌──────────────────────────────┐  ║
║  │ Why Choose           │ │  01  AI-driven hardware...   │  ║
║  │ Talisha Software     │ │  02  End-to-end smart...     │  ║
║  │                      │ │  03  Scalable infra...       │  ║
║  │ Your Intelligent     │ │  04  Security-first...       │  ║
║  │ Technology           │ │  05  Future-ready...         │  ║
║  │ Partner              │ │      [ORANGE BOX]            │  ║
║  └─────────────────────┘ └──────────────────────────────┘  ║
╠══════════════════════════════════════════════════════════════╣
║  Industry Applications                                      ║
║  ┌──────────────┐ ┌──────────────┐                         ║
║  │ FinTech      │ │ E-Commerce   │                         ║
║  │ Mfg 4.0     │ │ Enterprise   │                         ║
║  │ Healthcare   │ │ Energy       │                         ║
║  │ Smart Infra  │ │              │                         ║
║  └──────────────┘ └──────────────┘                         ║
║  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓ GRADIENT STRIP ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓  ║
╠══════════════════════════════════════════════════════════════╣
║  [HERO BACKGROUND IMAGE]                                    ║
║                                                             ║
║  Revolutionizing...                              2026       ║
║                                                             ║
║        GET IN TOUCH                                         ║
║                                                             ║
║  Mobile: +91 8217707328     Web: talishasoftware.tech       ║
║  Email: pijush@...          Email: hello@...                ║
║  Mobile: +91 8001087752     Email: gmail@...                ║
║  Social: @talishasoftware                                   ║
║                                          by Talisha Software║
╚══════════════════════════════════════════════════════════════╝
```

### 4.2 Responsive Breakpoints

| Breakpoint | Width | Layout Changes |
|---|---|---|
| **Desktop XL** | ≥1440px | Max-width containers at 1300-1400px |
| **Desktop** | 993px–1439px | Slightly reduced padding, search bar 380px |
| **Tablet Landscape** | 769px–992px | Stacked layouts, single-column cards |
| **Tablet Portrait** | 601px–768px | Reduced headings, full-width search |
| **Mobile** | 361px–600px | All single-column, minimal padding |
| **Small Mobile** | ≤360px | Smallest font sizes, compact spacing |

---

## 5. Animation Specifications

### 5.1 Animation Toolkit (from PDF Resource Vault)

| Tool | Version | Purpose |
|---|---|---|
| **GSAP** | 3.12+ | Primary animation engine — ScrollTrigger, SplitText, timelines |
| **Lenis** | 1.1+ | Buttery smooth scroll — paired with GSAP |
| **Three.js** | 0.170+ | WebGL 3D hero scene |
| **Spline Runtime** | 1.9+ | Alternative 3D scenes (embed-ready) |

### 5.2 Scroll Animation Catalog

| Section | Animation Type | Trigger | Duration | Ease |
|---|---|---|---|---|
| **Hero Logo** | Fade-in + Scale | Page load | 1.2s | `power2.out` |
| **Hero Heading** | SplitText char reveal | Page load, staggered | 0.8s per char group | `power3.out` |
| **Hero Search Bar** | Slide-in from right | After heading | 0.6s | `power2.inOut` |
| **Hero CTAs** | Stagger fade-up | After search | 0.4s each, 0.1s stagger | `power2.out` |
| **Partner Ticker** | Infinite translateX | Always running | 30s linear loop | `linear` |
| **Intro Title** | Fade-up + slight parallax | Scroll enter viewport | 1.0s | `power2.out` |
| **Intro Body** | Stagger fade-up | After title | 0.6s each, 0.2s stagger | `power2.out` |
| **AI Solution Tabs** | Opacity + slide | Click/hover | 0.4s | `power2.inOut` |
| **AI Videos** | Crossfade (opacity 0→1) | Tab switch | 0.6s | `ease` |
| **Service Cards** | Stagger slide-up from bottom | Scroll enter | 0.8s each, 0.15s stagger | `power3.out` |
| **Service Card Hover** | translateY(-10px) + shadow | Mouse enter | 0.35s | `ease` |
| **Service Arrow Hover** | translate(6px, 6px) diagonal | Mouse enter | 0.3s | `ease` |
| **Tech Cards** | Stagger fade-in + border glow | Scroll enter | 0.6s each, 0.1s stagger | `power2.out` |
| **Why Choose Numbers** | Count-up (01→05) | Scroll enter | 1.5s | `power1.inOut` |
| **Why Choose Items** | Stagger fade-right | Scroll enter | 0.5s each, 0.15s stagger | `power2.out` |
| **Impact Cards** | Slide-up stagger | Scroll enter | 0.8s each, 0.2s stagger | `power3.out` |
| **Footer Heading** | SplitText word reveal | Scroll enter | 1.2s | `power3.out` |
| **Stats Counter** | Count-up animation | IntersectionObserver | 2.0s | `power1.out` |

### 5.3 3D Hero Scene Spec

```
Type: Three.js WebGL scene OR Spline embed
Content Options (pick one):
  1. Neural Network — Interconnected floating nodes with pulsing connections
  2. 3D Globe — Earth with glowing data points at office locations
  3. Abstract Geometry — Floating platonic solids with glass material
  4. Particle Field — 10,000+ particles forming the Talisha logo shape

Interactivity:
  - Mouse parallax: Scene rotates subtly following cursor
  - Scroll parallax: Scene moves with depth on scroll
  - Mobile: Gyroscope-based subtle movement OR static with CSS fallback

Performance Budget:
  - Max triangles: 50,000
  - Max texture size: 1024×1024
  - Target FPS: 60 (desktop), 30 (mobile)
  - Lazy load: Initialize only when hero visible
  - Fallback: CSS gradient + dot pattern for <4GB RAM devices
```

### 5.4 Micro-interaction Details

| Element | Interaction | Animation |
|---|---|---|
| **All Buttons** | Click | Ripple effect (expanding circle from click point) |
| **CTA Buttons** | Hover | translateY(-3px) + colored glow shadow |
| **Menu Icon** | Hover | All 4 dots get orange glow |
| **Menu Icon** | Click | Scale(0.92) press effect |
| **Search Bar** | Focus | Scale(1.02) + brighter border + stronger glow |
| **Mic Icon** | Hover | Scale(1.15) + full opacity |
| **Card Links** | Hover | Underline slide-in from left |
| **Circle Button** | Hover | Scale(1.08) + gold glow |
| **Circle Button** | Click | Scale(0.92) bounce |
| **Images** | Lazy Load | Fade-in from 0 opacity |
| **Page Load** | Entry | Full-screen loader → dissolve reveal |

---

## 6. Accessibility (a11y)

| Requirement | Implementation |
|---|---|
| **Keyboard Navigation** | All interactive elements focusable with visible focus rings |
| **Screen Reader** | Semantic HTML, ARIA labels, `alt` text on all images |
| **Color Contrast** | WCAG AA minimum (4.5:1 for body text, 3:1 for large text) |
| **Reduced Motion** | `prefers-reduced-motion` media query disables all animations |
| **Touch Targets** | Minimum 44×44px on mobile (already implemented) |
| **Skip Navigation** | Skip-to-content link for screen readers |
| **Form Labels** | All inputs have associated `<label>` elements |
| **Focus Management** | Trap focus in modals/side-menu when open |
| **Font Scaling** | Uses `rem`/`em` units, respects browser font-size settings |
| **iOS Zoom Prevention** | `font-size: 16px` minimum on inputs |

---

## 7. Design Tokens (CSS Custom Properties)

```css
:root {
  /* Colors */
  --bg-primary: #000000;
  --bg-secondary: #0a0a0a;
  --bg-elevated: #111111;
  --bg-surface: #1a1a1a;
  --bg-overlay: rgba(0,0,0,0.6);
  
  --accent-gold: #f5a623;
  --accent-red: #ff3b30;
  --accent-orange: #ff7a1a;
  --accent-amber: #fe9d00;
  
  --text-primary: #ffffff;
  --text-secondary: #e0e0e0;
  --text-muted: #bdbdbd;
  --text-dim: #888888;
  --text-dark: #222222;
  
  /* Typography */
  --font-primary: 'Inter', 'Poppins', -apple-system, sans-serif;
  --font-mono: 'JetBrains Mono', monospace;
  
  /* Spacing */
  --space-xs: 8px;
  --space-sm: 16px;
  --space-md: 24px;
  --space-lg: 40px;
  --space-xl: 60px;
  --space-2xl: 80px;
  --space-3xl: 120px;
  
  /* Radius */
  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 20px;
  --radius-xl: 30px;
  --radius-2xl: 40px;
  --radius-full: 50px;
  
  /* Shadows */
  --shadow-sm: 0 2px 8px rgba(0,0,0,0.3);
  --shadow-md: 0 8px 24px rgba(0,0,0,0.4);
  --shadow-lg: 0 15px 40px rgba(0,0,0,0.4);
  --glow-gold: 0 0 20px rgba(245,166,35,0.5);
  --glow-orange: 0 0 25px rgba(255,122,26,0.5);
  
  /* Transitions */
  --transition-fast: 0.2s ease;
  --transition-normal: 0.3s ease;
  --transition-slow: 0.4s ease;
  --transition-smooth: 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  
  /* Layout */
  --max-width: 1300px;
  --max-width-wide: 1400px;
  --container-padding: 5%;
}
```

---

## 8. Icon System

| Type | Source | Usage |
|---|---|---|
| **SVG Inline** | Custom hand-coded | Search icon, mic icon, menu arrows |
| **CSS Shapes** | Border tricks | Diagonal arrows on cards, circle buttons |
| **Dot Patterns** | `radial-gradient` | Decorative backgrounds (emerging tech, why choose) |
| **3D Icons** | Spline / Three.js | Optional: Service section floating icons |

---

## 9. Image & Media Guidelines

| Asset Type | Format | Max Size | Notes |
|---|---|---|---|
| **Hero Background** | WebP + AVIF (PNG fallback) | 300KB | 1920×1080, compressed |
| **Partner Logos** | SVG preferred, PNG fallback | 20KB each | Mono-tone (white filter applied) |
| **Article Featured Image** | WebP | 150KB | 1200×630 (OG-compatible) |
| **Video Backgrounds** | MP4 (H.264) | 5MB each | 1280×720, 24fps, no audio |
| **3D Models** | GLB (compressed) | 2MB | Draco compression, max 50K triangles |
| **Favicon** | ICO + PNG + SVG | 50KB | Multi-size (16, 32, 180, 512) |

---

## 10. Light Theme (Optional — Phase 2)

| Token | Dark Value | Light Value |
|---|---|---|
| `--bg-primary` | `#000000` | `#ffffff` |
| `--bg-secondary` | `#0a0a0a` | `#f5f5f5` |
| `--bg-elevated` | `#111111` | `#ffffff` |
| `--text-primary` | `#ffffff` | `#111111` |
| `--text-secondary` | `#e0e0e0` | `#333333` |
| `--accent-gold` | `#f5a623` | `#d4890a` |

> [!NOTE]
> Light theme is a Phase 2 enhancement. The dark theme is the primary brand identity and should be the default experience.

---

*Document maintained by Design Team. Last updated: 2026-10-11.*
