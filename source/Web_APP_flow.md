# 🔄 Web Application Flow Document

## Talisha Software — User Journeys & System Flows

| Field | Detail |
|---|---|
| **Document Version** | 1.0 |
| **Date** | 2026-10-11 |
| **Status** | Draft |

---

## 1. High-Level Application Flow

```mermaid
graph TB
    subgraph "Public Users"
        V[Visitor] --> HP[Home Page]
        V --> AP[About Page]
        V --> SP[Solutions Page]
        V --> ARP[Articles Page]
        V --> CP[Career Page]
        V --> CNT[Contact Page]
        V --> GIT[Get in Touch Form]
    end
    
    subgraph "Interactions"
        HP --> |CTA Click| GIT
        HP --> |Menu Nav| AP
        SP --> |Interested| GIT
        ARP --> |Read| ART_DETAIL[Article Detail]
        CP --> |Apply| JOB_APPLY[Job Application]
        CNT --> |Submit| CNT_FORM[Contact Form]
    end
    
    subgraph "Backend Processing"
        GIT --> |POST| LEAD_DB[(Leads Table)]
        CNT_FORM --> |POST| CONTACT_DB[(Contacts Table)]
        JOB_APPLY --> |POST| APP_DB[(Applications Table)]
        LEAD_DB --> |Notify| EMAIL[Email Service]
        CONTACT_DB --> |Notify| EMAIL
        APP_DB --> |Notify| EMAIL
    end
    
    subgraph "Admin Panel"
        ADMIN[Admin Login] --> DASH[Dashboard]
        DASH --> MANAGE_LEADS[Manage Leads]
        DASH --> MANAGE_ARTICLES[Manage Articles]
        DASH --> MANAGE_CAREERS[Manage Careers]
        DASH --> MANAGE_CONTACTS[View Contacts]
        DASH --> SETTINGS[Site Settings]
    end
```

---

## 2. Page-by-Page User Flow

### 2.1 🏠 Home Page Flow

```mermaid
graph TD
    ENTRY[User Lands on Home] --> HERO[Hero Section - 3D Animation Loads]
    HERO --> |Auto-scroll or Manual| PARTNERS[Partner Logo Ticker]
    PARTNERS --> INTRO[Introduction Section]
    INTRO --> AI_SOL[AI Solutions Showcase]
    AI_SOL --> |Hover/Click Tab| TAB_SWITCH{Which Tab?}
    TAB_SWITCH --> |AI Product Dev| VID1[Video 1 Plays]
    TAB_SWITCH --> |Web3/Blockchain| VID2[Video 2 Plays]
    TAB_SWITCH --> |Enterprise DT| VID3[Video 3 Plays]
    AI_SOL --> SERVICES[Services Grid - 3 Cards]
    SERVICES --> |Click Card| SOL_PAGE[→ Solutions Page]
    SERVICES --> EMERGING[Emerging Tech Grid]
    EMERGING --> WHY[Why Choose Us Section]
    WHY --> IMPACT[Industry Impact Cards]
    IMPACT --> FOOTER_CTA[Get in Touch Footer]
    FOOTER_CTA --> |Click Contact Info| ACTION{User Action}
    ACTION --> |Call| PHONE[Dial Phone Number]
    ACTION --> |Email| MAILTO[Open Email Client]
    ACTION --> |CTA Button| GIT_PAGE[→ Get in Touch Page]
    
    HERO --> |Menu Icon Click| SIDE_MENU[Side Menu Opens]
    SIDE_MENU --> |Select Page| NAV{Navigation}
    NAV --> |Home| ENTRY
    NAV --> |About| ABOUT_PAGE[→ About Page]
    NAV --> |Articles| ARTICLES_PAGE[→ Articles Page]
    NAV --> |Solutions| SOL_PAGE
    NAV --> |Career| CAREER_PAGE[→ Career Page]
    NAV --> |Contact| CONTACT_PAGE[→ Contact Page]
    NAV --> |Stay Informed| GIT_PAGE
    NAV --> |Login| LOGIN_PAGE[→ Admin Login]
    
    HERO --> |Search Bar| SEARCH{Search Input}
    SEARCH --> |Type Query| RESULTS[Search Results / Redirect]
    SEARCH --> |Voice Icon| VOICE[Voice Input Capture]
```

### 2.2 📝 Get in Touch (Lead Capture) Flow

```mermaid
graph TD
    ENTRY[User Opens Get in Touch Page] --> STEP1[Step 1: Basic Info]
    STEP1 --> |Fill Name, Email, Phone| VALIDATE1{Validation}
    VALIDATE1 --> |Invalid| ERROR1[Show Inline Errors]
    ERROR1 --> STEP1
    VALIDATE1 --> |Valid| STEP2[Step 2: Project Details]
    STEP2 --> |Select Service Interest| SERVICES_SELECT[Dropdown/Checkboxes]
    STEP2 --> |Select Budget Range| BUDGET[Budget Selector]
    STEP2 --> |Select Timeline| TIMELINE[Timeline Dropdown]
    STEP2 --> |Write Message| MESSAGE[Project Description Textarea]
    STEP2 --> VALIDATE2{Validation}
    VALIDATE2 --> |Invalid| ERROR2[Show Errors]
    ERROR2 --> STEP2
    VALIDATE2 --> |Valid| REVIEW[Step 3: Review & Submit]
    REVIEW --> |Edit| STEP1
    REVIEW --> |Submit| SUBMIT[POST /get-in-touch]
    SUBMIT --> |CSRF Check| CSRF{CSRF Valid?}
    CSRF --> |No| REJECT[403 Error]
    CSRF --> |Yes| THROTTLE{Rate Limit OK?}
    THROTTLE --> |No| RATE_ERR[429 Too Many Requests]
    THROTTLE --> |Yes| VALIDATE_SERVER{Server Validation}
    VALIDATE_SERVER --> |Fail| REDIRECT_BACK[Redirect with Errors]
    REDIRECT_BACK --> STEP1
    VALIDATE_SERVER --> |Pass| STORE[Store Lead in DB]
    STORE --> QUEUE_EMAIL[Queue Email Notifications]
    QUEUE_EMAIL --> ADMIN_EMAIL[Email to Admin]
    QUEUE_EMAIL --> USER_EMAIL[Confirmation to User]
    STORE --> SUCCESS[Success Page with Thank You]
```

### 2.3 📞 Contact Form Flow

```mermaid
graph TD
    ENTRY[User Opens Contact Page] --> MAP[View Google Map + Office Locations]
    ENTRY --> FORM[Fill Contact Form]
    FORM --> |Name| F1[Text Input]
    FORM --> |Email| F2[Email Input]
    FORM --> |Phone| F3[Phone Input - Optional]
    FORM --> |Subject| F4[Subject Dropdown]
    FORM --> |Message| F5[Textarea]
    FORM --> SUBMIT[Click Submit]
    SUBMIT --> JS_VALIDATE{Client-side Validation}
    JS_VALIDATE --> |Invalid| INLINE_ERR[Show Inline Errors]
    INLINE_ERR --> FORM
    JS_VALIDATE --> |Valid| POST[POST /contact]
    POST --> SERVER_VALIDATE{Server Validation}
    SERVER_VALIDATE --> |Fail| FLASH_ERR[Redirect with Flash Errors]
    FLASH_ERR --> FORM
    SERVER_VALIDATE --> |Pass| SAVE[Save to contact_submissions]
    SAVE --> NOTIFY[Queue Email to Admin]
    SAVE --> CONFIRM[Queue Confirmation to User]
    SAVE --> RESPONSE[Show Success Toast/Message]
```

### 2.4 📰 Articles/Blog Flow

```mermaid
graph TD
    ENTRY[User Opens Articles Page] --> LISTING[Article Cards Grid]
    LISTING --> FILTER{Filter/Search?}
    FILTER --> |Category Click| CATEGORY[Filter by Category]
    FILTER --> |Search Input| SEARCH[Search Articles]
    FILTER --> |None| ALL[Show All - Paginated]
    CATEGORY --> FILTERED[Filtered Results]
    SEARCH --> FILTERED
    ALL --> CLICK[Click Article Card]
    FILTERED --> CLICK
    CLICK --> DETAIL[Article Detail Page]
    DETAIL --> |Shows| CONTENT[Title, Author, Date, Body, Featured Image]
    DETAIL --> |Shows| READING_TIME[Estimated Reading Time]
    DETAIL --> |Shows| SHARE[Social Share Buttons]
    DETAIL --> |Shows| RELATED[Related Articles - Same Category]
    RELATED --> |Click| DETAIL
    DETAIL --> |Back| LISTING
    
    LISTING --> PAGINATION{More Articles?}
    PAGINATION --> |Click Page 2| NEXT_PAGE[Load Page 2]
    NEXT_PAGE --> LISTING
```

### 2.5 💼 Career Application Flow

```mermaid
graph TD
    ENTRY[User Opens Career Page] --> CULTURE[Company Culture Section]
    ENTRY --> LISTINGS[Active Job Listings]
    LISTINGS --> CLICK[Click Job Title]
    CLICK --> DETAIL[Job Detail View]
    DETAIL --> |Shows| JD[Title, Department, Location, Type]
    DETAIL --> |Shows| DESC[Full Description]
    DETAIL --> |Shows| REQ[Requirements List]
    DETAIL --> APPLY_BTN[Click Apply Now]
    APPLY_BTN --> APP_FORM[Application Form]
    APP_FORM --> |Name| F1[Text Input]
    APP_FORM --> |Email| F2[Email Input]
    APP_FORM --> |Phone| F3[Phone Input]
    APP_FORM --> |Resume| F4[File Upload - PDF/DOC, max 5MB]
    APP_FORM --> |Cover Letter| F5[Textarea - Optional]
    APP_FORM --> SUBMIT[Submit Application]
    SUBMIT --> VALIDATE{Validation}
    VALIDATE --> |Invalid| ERRORS[Show Errors]
    ERRORS --> APP_FORM
    VALIDATE --> |Valid| STORE[Save Application + Upload Resume]
    STORE --> EMAIL_ADMIN[Notify Admin via Email]
    STORE --> EMAIL_CANDIDATE[Confirmation to Candidate]
    STORE --> SUCCESS[Thank You Message]
```

---

## 3. Admin Panel Flows

### 3.1 🔐 Admin Authentication Flow

```mermaid
graph TD
    ENTRY[Visit /admin] --> CHECK{Authenticated?}
    CHECK --> |No| LOGIN[Login Page]
    LOGIN --> |Enter Credentials| SUBMIT[POST /admin/login]
    SUBMIT --> VALIDATE{Valid Credentials?}
    VALIDATE --> |No| ERROR[Show Error + Redirect to Login]
    ERROR --> LOGIN
    VALIDATE --> |Yes| ROLE{Is Admin Role?}
    ROLE --> |No| DENIED[403 Unauthorized]
    ROLE --> |Yes| SESSION[Create Auth Session]
    SESSION --> DASHBOARD[→ Admin Dashboard]
    CHECK --> |Yes| DASHBOARD
```

### 3.2 📊 Admin Dashboard Flow

```mermaid
graph TD
    DASH[Dashboard] --> STATS[Overview Stats]
    STATS --> |Shows| S1[Total Leads This Month]
    STATS --> |Shows| S2[Total Articles Published]
    STATS --> |Shows| S3[Active Job Listings]
    STATS --> |Shows| S4[Unread Contact Messages]
    STATS --> |Shows| S5[Pending Applications]
    
    DASH --> NAV{Admin Navigation}
    NAV --> LEADS[Manage Leads]
    NAV --> ARTICLES[Manage Articles]
    NAV --> CAREERS[Manage Careers]
    NAV --> CONTACTS[View Contacts]
    NAV --> SETTINGS[Site Settings]
    NAV --> MEDIA[Media Library]
    
    LEADS --> LEAD_LIST[Lead List - Sortable, Filterable]
    LEAD_LIST --> |Click Lead| LEAD_DETAIL[Lead Detail View]
    LEAD_DETAIL --> |Update Status| STATUS_UPDATE[New → Contacted → Qualified → Converted → Closed]
    LEAD_LIST --> |Export| CSV[Download CSV]
    
    ARTICLES --> ART_LIST[Article List]
    ART_LIST --> |Create| ART_CREATE[Create Article Form]
    ART_LIST --> |Edit| ART_EDIT[Edit Article Form]
    ART_LIST --> |Delete| ART_DELETE[Confirm + Delete]
    ART_CREATE --> |Rich Text Editor| EDITOR[WYSIWYG Editor]
    ART_CREATE --> |Upload Image| MEDIA_UPLOAD[Media Upload]
    ART_CREATE --> |Set SEO| SEO_FORM[SEO Meta Fields]
    ART_CREATE --> |Publish/Draft| SAVE[Save Article]
```

### 3.3 ✍️ Article CRUD Flow

```mermaid
graph TD
    CREATE[Create New Article] --> FORM[Article Form]
    FORM --> |Title| AUTO_SLUG[Auto-generate Slug]
    FORM --> |Body| WYSIWYG[Rich Text Editor with Image Upload]
    FORM --> |Excerpt| EXCERPT[Short Description]
    FORM --> |Category| CAT_SELECT[Select/Create Category]
    FORM --> |Featured Image| IMG_UPLOAD[Upload Image]
    FORM --> |SEO Title| SEO1[Custom SEO Title]
    FORM --> |SEO Description| SEO2[Custom Meta Description]
    FORM --> |Status| STATUS{Draft or Publish?}
    STATUS --> |Draft| SAVE_DRAFT[Save as Draft]
    STATUS --> |Publish| SET_DATE[Set Published Date]
    SET_DATE --> SAVE_PUB[Save + Publish]
    SAVE_DRAFT --> LIST[Back to Article List]
    SAVE_PUB --> |Generate| SITEMAP[Update Sitemap]
    SAVE_PUB --> LIST
```

---

## 4. 3D Animation & Interaction Flow

### 4.1 Hero Section 3D Scene Lifecycle

```mermaid
graph TD
    PAGE_LOAD[Page Load] --> DETECT{Device Capability?}
    DETECT --> |High-end GPU| FULL_3D[Load Full Three.js Scene]
    DETECT --> |Mid-range| REDUCED_3D[Load Simplified 3D Scene]
    DETECT --> |Low-end / Mobile| FALLBACK[CSS Gradient + Particle CSS]
    
    FULL_3D --> INIT[Initialize WebGL Renderer]
    INIT --> LOAD_MODEL[Load 3D Model - GLB]
    LOAD_MODEL --> SETUP_LIGHTS[Setup Lights + Environment]
    SETUP_LIGHTS --> ANIMATE[Start Animation Loop]
    ANIMATE --> |Mouse Move| TRACK[Camera follows cursor]
    ANIMATE --> |Scroll| PARALLAX[Depth parallax on scroll]
    ANIMATE --> |Resize| RESPONSIVE[Resize renderer]
    
    REDUCED_3D --> SPLINE[Load Spline Scene - Lighter]
    SPLINE --> EMBED[Embed Spline Viewer]
    
    FALLBACK --> CSS_ANIM[Pure CSS Animations]
    CSS_ANIM --> DOTS[Floating Dot Pattern]
    CSS_ANIM --> GRADIENT[Animated Gradient Background]
```

### 4.2 Scroll Animation Pipeline

```mermaid
graph TD
    INIT[Page Ready] --> LENIS[Initialize Lenis Smooth Scroll]
    LENIS --> GSAP_INIT[Initialize GSAP ScrollTrigger]
    GSAP_INIT --> REGISTER[Register All Animation Sections]
    
    REGISTER --> SEC1[Hero: Parallax + Logo Fade]
    REGISTER --> SEC2[Partners: Start Ticker Animation]
    REGISTER --> SEC3[Intro: Fade-up Text Reveal]
    REGISTER --> SEC4[AI Solutions: Stagger Card Entry]
    REGISTER --> SEC5[Services: 3D Card Lift on Enter]
    REGISTER --> SEC6[Emerging Tech: Border Glow Sequence]
    REGISTER --> SEC7[Why Choose: Counter Animation]
    REGISTER --> SEC8[Impact: Card Stagger + Slide]
    REGISTER --> SEC9[Footer: Text Reveal + Parallax BG]
    
    SEC7 --> |IntersectionObserver| COUNTER[Count-up: 01→50+, 01→2+, 01→2+]
```

---

## 5. Email Notification Flow

```mermaid
graph TD
    TRIGGER{Form Submitted} --> |Lead Form| LEAD_MAIL
    TRIGGER --> |Contact Form| CONTACT_MAIL
    TRIGGER --> |Job Application| APP_MAIL
    
    subgraph "Lead Form Emails"
        LEAD_MAIL --> ADMIN_LEAD[To Admin: New Lead Alert]
        LEAD_MAIL --> USER_LEAD[To User: Thank You + Next Steps]
    end
    
    subgraph "Contact Form Emails"
        CONTACT_MAIL --> ADMIN_CONTACT[To Admin: New Message]
        CONTACT_MAIL --> USER_CONTACT[To User: We Received Your Message]
    end
    
    subgraph "Application Emails"
        APP_MAIL --> ADMIN_APP[To Admin: New Application for Role]
        APP_MAIL --> USER_APP[To User: Application Confirmation]
    end
    
    ADMIN_LEAD --> QUEUE[Laravel Queue - Database Driver]
    ADMIN_CONTACT --> QUEUE
    ADMIN_APP --> QUEUE
    USER_LEAD --> QUEUE
    USER_CONTACT --> QUEUE
    USER_APP --> QUEUE
    
    QUEUE --> SMTP[Hostinger SMTP]
    SMTP --> DELIVERED[Email Delivered]
```

---

## 6. SEO & Analytics Flow

```mermaid
graph TD
    REQUEST[Incoming Request] --> MIDDLEWARE[SEO Middleware]
    MIDDLEWARE --> |Check| SEO_DB{Custom SEO for this page?}
    SEO_DB --> |Yes| CUSTOM[Use Custom Title, Description, OG Tags]
    SEO_DB --> |No| DEFAULT[Use Default SEO from config]
    CUSTOM --> RENDER[Render Page with SEO <head>]
    DEFAULT --> RENDER
    
    RENDER --> |Include| GA[Google Analytics 4 Script]
    RENDER --> |Include| SCHEMA[JSON-LD Schema Markup]
    RENDER --> |Include| OG[Open Graph Meta Tags]
    RENDER --> |Include| TWITTER[Twitter Card Meta Tags]
    RENDER --> |Include| CANONICAL[Canonical URL]
    
    GA --> |Track| PAGEVIEW[Page View Event]
    GA --> |Track| CTA_CLICK[CTA Button Click Events]
    GA --> |Track| FORM_SUBMIT[Form Submission Events]
    GA --> |Track| SCROLL_DEPTH[Scroll Depth Events]
    GA --> |Track| VIDEO_PLAY[Video Interaction Events]
```

---

## 7. Multi-Domain Configuration Flow

```mermaid
graph TD
    REQUEST[Incoming Request] --> DETECT[Detect Domain from HTTP_HOST]
    DETECT --> LOOKUP{Domain in domain_configs table?}
    LOOKUP --> |Yes| CUSTOM[Load Custom Config]
    LOOKUP --> |No| DEFAULT[Load Default Config]
    
    CUSTOM --> |Sets| HEADING[Partner Section Heading]
    CUSTOM --> |Sets| LOGOS[Partner Logo Paths]
    CUSTOM --> |Sets| STATS[Statistics Numbers & Labels]
    
    DEFAULT --> HEADING
    DEFAULT --> LOGOS
    DEFAULT --> STATS
    
    HEADING --> RENDER[Render Partner Section with Config]
    LOGOS --> RENDER
    STATS --> RENDER
```

---

## 8. Error Handling Flow

```mermaid
graph TD
    ERROR{Error Occurs} --> TYPE{Error Type?}
    TYPE --> |404| PAGE_404[Custom 404 Page - Premium Design]
    TYPE --> |403| PAGE_403[Custom 403 Page - Access Denied]
    TYPE --> |419| PAGE_419[Session Expired - Redirect to Login]
    TYPE --> |429| PAGE_429[Rate Limited - Retry After Message]
    TYPE --> |500| PAGE_500[Custom 500 Page - We're Working On It]
    TYPE --> |503| PAGE_503[Maintenance Mode Page]
    
    PAGE_500 --> LOG[Log Error to storage/logs/]
    PAGE_500 --> ALERT[Email Alert to Admin - Optional]
    
    PAGE_404 --> SUGGEST[Suggest Similar Pages / Search]
    PAGE_404 --> HOME_LINK[Link Back to Home]
```

---

## 9. Performance & Caching Flow

```mermaid
graph TD
    REQUEST[Page Request] --> CACHE_CHECK{Response Cached?}
    CACHE_CHECK --> |Yes| SERVE_CACHE[Serve Cached Response - Fast]
    CACHE_CHECK --> |No| PROCESS[Process Laravel Request]
    PROCESS --> DB_QUERY[Database Queries]
    DB_QUERY --> QUERY_CACHE{Query Cached?}
    QUERY_CACHE --> |Yes| CACHED_RESULT[Use Cached Query Result]
    QUERY_CACHE --> |No| FRESH_QUERY[Execute Query + Cache Result]
    CACHED_RESULT --> RENDER[Render Blade View]
    FRESH_QUERY --> RENDER
    RENDER --> VIEW_CACHE[Compiled View Cache]
    VIEW_CACHE --> RESPONSE[Send Response]
    RESPONSE --> STORE_CACHE[Store in Response Cache - Optional]
    
    RESPONSE --> |Static Assets| CDN{Cloudflare CDN?}
    CDN --> |Yes| CDN_SERVE[Serve from Edge]
    CDN --> |No| ORIGIN[Serve from Hostinger]
```

---

*Document maintained by Engineering Team. Last updated: 2026-10-11.*
