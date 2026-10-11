<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Career;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\SeoMeta;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@talishasoftware.tech'],
            [
                'name' => 'Talisha Administrator',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
                'avatar' => null,
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Talisha Software', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Agentic AI Solutions & Enterprise Digital Transformation', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'info@talishasoftware.tech', 'group' => 'contact'],
            ['key' => 'alt_email', 'value' => 'talishasoftware@gmail.com', 'group' => 'contact'],
            ['key' => 'cto_email', 'value' => 'pijushpal@talishasoftware.tech', 'group' => 'contact'],
            ['key' => 'phone_customer', 'value' => '+91 8001087752', 'group' => 'contact'],
            ['key' => 'phone_cto', 'value' => '+91 8217707328', 'group' => 'contact'],
            ['key' => 'location_durgapur', 'value' => 'City Center, Durgapur, West Bengal, India', 'group' => 'locations'],
            ['key' => 'location_kolkata', 'value' => 'Salt Lake Sector V, Kolkata, India', 'group' => 'locations'],
            ['key' => 'location_gujarat', 'value' => 'GIFT City / Ahmedabad, Gujarat, India', 'group' => 'locations'],
            ['key' => 'location_bangalore', 'value' => 'Indiranagar / Outer Ring Road, Bangalore, India', 'group' => 'locations'],
            ['key' => 'stats_clients', 'value' => '50+', 'group' => 'stats'],
            ['key' => 'stats_countries', 'value' => '2+', 'group' => 'stats'],
            ['key' => 'stats_years', 'value' => '2+', 'group' => 'stats'],
            ['key' => 'stats_projects', 'value' => '80+', 'group' => 'stats'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Article Categories
        $categories = [
            [
                'name' => 'Agentic AI & LLMs',
                'slug' => 'agentic-ai-llms',
                'description' => 'Autonomous agents, multi-agent frameworks, enterprise workflows',
                'color' => '#f5a623',
                'sort_order' => 1
            ],
            [
                'name' => 'Web3 & Blockchain',
                'slug' => 'web3-blockchain',
                'description' => 'Decentralized protocols, smart contracts, tokenomics',
                'color' => '#ff3b30',
                'sort_order' => 2
            ],
            [
                'name' => 'Industrial IoT',
                'slug' => 'industrial-iot',
                'description' => 'Hardware telemetry, digital twins, SCADA modernization',
                'color' => '#ff7a1a',
                'sort_order' => 3
            ],
            [
                'name' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'description' => 'Kubernetes, serverless, automated CI/CD pipelines',
                'color' => '#3b82f6',
                'sort_order' => 4
            ],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[$cat['slug']] = ArticleCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 4. Tags
        $tags = ['Agentic AI', 'Machine Learning', 'Next-Gen UI', 'Smart Contracts', 'Telemetry', 'Scalability'];
        $tagModels = [];
        foreach ($tags as $tagName) {
            $tagModels[] = Tag::updateOrCreate(['slug' => Str::slug($tagName)], ['name' => $tagName, 'slug' => Str::slug($tagName)]);
        }

        // 5. Articles
        $articles = [
            [
                'title' => 'The Rise of Agentic AI: Why Workflows Are Replacing Prompts in 2026',
                'slug' => 'rise-of-agentic-ai-workflows-replacing-prompts-2026',
                'category_id' => $categoryModels['agentic-ai-llms']->id,
                'author_id' => $admin->id,
                'excerpt' => 'How autonomous multi-agent systems coordinate complex decision trees without constant human intervention.',
                'body' => "## Beyond Chatbots: The Autonomous Era\n\nThe previous wave of generative AI focused on conversational interfaces where human prompts guided single-turn outputs. In 2026, enterprise software is entering the **Agentic Architecture** phase.\n\nAgentic AI systems possess goals, memory, tool-execution engines, and self-reflection loops. Instead of asking a model to draft an invoice, an autonomous agentic network queries ERP endpoints, reconciles purchase orders, validates tax compliance across jurisdictions, and commits cryptographic records to the ledger.\n\n### Core Pillars of Agentic Infrastructure\n1. **Dynamic Tool Calling:** Integration with REST, gRPC, and SQL environments.\n2. **State Graph Resilience:** Recovering gracefully from partial network degradations.\n3. **Deterministic Guardrails:** Hard regulatory constraints wrapped around probabilistic outputs.\n\nAt Talisha Software, our proprietary agent orchestration layer enables Fortune 500 enterprises and hypergrowth startups to deploy high-velocity automation safely.",
                'reading_time' => 6,
                'view_count' => 1420,
                'status' => 'published',
                'published_at' => now()->subDays(3),
                'seo_title' => 'The Rise of Agentic AI: Autonomous Workflows in 2026 | Talisha Software',
                'seo_description' => 'Discover how autonomous multi-agent systems are reshaping enterprise software and replacing static prompts.',
            ],
            [
                'title' => 'Architecting High-Throughput Smart Contracts for Industrial Supply Chains',
                'slug' => 'architecting-smart-contracts-industrial-supply-chains',
                'category_id' => $categoryModels['web3-blockchain']->id,
                'author_id' => $admin->id,
                'excerpt' => 'Eliminating counterfeit vulnerabilities and inventory reconciliation lag with EVM and zero-knowledge proofs.',
                'body' => "## Trustless Verification at Scale\n\nModern global manufacturing supply chains traverse dozens of intermediaries, customs checkpoints, and financial settlement rails. Traditional database replication suffers from latency, access disputes, and tamper vulnerability.\n\nBy uniting **Industrial IoT telemetry** with **zero-knowledge rollups**, Talisha Software empowers manufacturers to verify custody, temperature conformity, and shipping compliance in real time.\n\n### Technical Milestones Achieved:\n- Sub-second transaction confirmation on L2 rollups.\n- Privacy-preserving cryptographic proofs for commercial confidentiality.\n- Automated escrow release tied to GPS geofencing triggers.",
                'reading_time' => 8,
                'view_count' => 890,
                'status' => 'published',
                'published_at' => now()->subDays(7),
                'seo_title' => 'High-Throughput Smart Contracts for Industrial Supply Chains | Talisha Software',
                'seo_description' => 'Technical architecture for deploying immutable supply chain custody with zero-knowledge smart contracts.',
            ],
            [
                'title' => 'Edge Computing & SCADA Modernization: Industrial IoT in Action',
                'slug' => 'edge-computing-scada-modernization-industrial-iot',
                'category_id' => $categoryModels['industrial-iot']->id,
                'author_id' => $admin->id,
                'excerpt' => 'Transforming legacy factory hardware into intelligent edge nodes streaming anomaly predictions.',
                'body' => "## The Factory Floor Revolution\n\nLegacy SCADA systems run isolated protocols that rarely integrate with modern cloud analytics without severe security overhead. Talisha Software bridges this divide with hardened micro-edge gateways capable of real-time machine learning inference directly on device hardware.\n\n### Key Outcomes:\n- Predictive maintenance alerting 14 hours ahead of bearing failure.\n- 99.999% uptime with offline-first mesh communications.\n- TLS 1.3 encrypted cloud synchronization.",
                'reading_time' => 5,
                'view_count' => 640,
                'status' => 'published',
                'published_at' => now()->subDays(12),
                'seo_title' => 'SCADA Modernization & Industrial IoT at the Edge | Talisha Software',
                'seo_description' => 'Modernize legacy manufacturing with hardened edge computing and ML anomaly detection.',
            ],
        ];

        foreach ($articles as $art) {
            $created = Article::updateOrCreate(['slug' => $art['slug']], $art);
            $created->tags()->sync([$tagModels[0]->id, $tagModels[1]->id]);
        }

        // 6. Careers
        $careers = [
            [
                'title' => 'Lead Agentic AI Systems Architect',
                'slug' => 'lead-agentic-ai-systems-architect',
                'department' => 'Artificial Intelligence & Research',
                'location' => 'Bangalore / Hybrid',
                'employment_type' => 'full_time',
                'short_description' => 'Lead the design of autonomous multi-agent reasoning graphs, tool orchestration pipelines, and LLM evaluation benchmarks.',
                'full_description' => 'You will architect mission-critical agentic intelligence layers that operate across enterprise clusters. You will mentor senior engineers, coordinate with CTO office, and push the boundaries of cognitive automation.',
                'requirements' => "• 5+ years experience building production AI/ML software.\n• Deep familiarity with LangGraph, AutoGen, vLLM, and vector retrieval pipelines.\n• Mastery of Python, Rust, or C++ for high-performance inference.\n• Track record of shipping reliable distributed backend architectures.",
                'benefits' => "• Industry-leading compensation + equity grants.\n• Comprehensive premium health insurance for family.\n• Flexible hybrid working model and modern hardware allowance.",
                'salary_range' => '₹32,00,000 - ₹50,00,000 PA',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Senior Web3 & Smart Contract Engineer',
                'slug' => 'senior-web3-smart-contract-engineer',
                'department' => 'Blockchain Engineering',
                'location' => 'Remote / Kolkata',
                'employment_type' => 'full_time',
                'short_description' => 'Build high-throughput smart contracts, EVM integrations, and audited cryptographic protocols.',
                'full_description' => 'You will write, test, and audit smart contracts handling significant transactional volume across industrial and enterprise decentralized systems.',
                'requirements' => "• 4+ years of Solidity / Rust development.\n• In-depth understanding of EVM internals, gas optimization, and formal verification.\n• Hands-on experience with Hardhat, Foundry, and zero-knowledge toolkits.",
                'benefits' => "• Top compensation package with token options.\n• Annual global conference sponsorship.\n• Remote-first culture with co-working access.",
                'salary_range' => '₹24,00,000 - ₹38,00,000 PA',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Creative Frontend Engineer (3D & WebGL / GSAP)',
                'slug' => 'creative-frontend-engineer-3d-webgl',
                'department' => 'Creative Technology',
                'location' => 'Durgapur / Remote',
                'employment_type' => 'full_time',
                'short_description' => 'Design cinematic 60fps web experiences rivaling Apple, NVIDIA, and Stripe using Three.js, GSAP, and modern shaders.',
                'full_description' => 'You will be responsible for creating the most visually arresting web applications in the industry. You understand micro-interactions, motion curves, GLTF optimization, and layout craft.',
                'requirements' => "• 3+ years experience building award-winning creative web applications.\n• Fluency in Three.js, GLSL shaders, GSAP ScrollTrigger, and modern CSS.\n• Relentless obsession with typography, performance, and buttery smooth 60fps frame rates.",
                'benefits' => "• Competitive salary + performance bonuses.\n• High-end workstation equipment (M-series / RTX).\n• Creative freedom and leadership opportunities.",
                'salary_range' => '₹18,00,000 - ₹28,00,000 PA',
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($careers as $job) {
            Career::updateOrCreate(['slug' => $job['slug']], $job);
        }

        // 7. Partners from https://talishasoftware.tech/home.html
        $partners = [
            [
                'name' => 'Rotary International',
                'logo_path' => 'img/partners/rotary.png',
                'website_url' => 'https://rotary.org',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Talisha Aerospace',
                'logo_path' => 'img/partners/talisha_aerospace_logo_dark.png',
                'website_url' => '#',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'SKC Infrastructure',
                'logo_path' => 'img/partners/skc_logo_dark.png',
                'website_url' => '#',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Printdoro Global',
                'logo_path' => 'img/partners/printdoro_logo_dark.png',
                'website_url' => '#',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Talisha Systems',
                'logo_path' => 'img/partners/talisha_software_logo.png',
                'website_url' => '#',
                'display_order' => 5,
                'is_active' => true,
            ],
        ];

        // Clean out any old mock partners and re-seed
        Partner::whereNotIn('name', array_column($partners, 'name'))->delete();
        foreach ($partners as $p) {
            Partner::updateOrCreate(['name' => $p['name']], $p);
        }

        // 8. Team Members (Styled as Official ID Badge cards)
        $teamMembers = [
            [
                'name' => 'Abir Ghosh',
                'designation' => 'Founder & CEO',
                'photo' => 'img/team/abir_ghosh.png',
                'description' => 'Guiding product strategy, enterprise AI architectures, and international client partnerships.',
                'employee_id' => 'TS-EMP-0001',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Pijush Pal',
                'designation' => 'Co-Founder & CTO',
                'photo' => 'img/team/pijush_pal.png',
                'description' => 'Architecting distributed systems, Web3 protocols, and resilient cloud infrastructure.',
                'employee_id' => 'TS-EMP-0002',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mrinmoy Patra',
                'designation' => 'Head of Technology',
                'photo' => 'img/team/mrinmoy_patra.png',
                'description' => 'Mrinmoy is a visionary Head of Technology who architects scalable infrastructure and drives digital transformation by aligning tech roadmaps with business goals.',
                'employee_id' => 'TS-EMP-0005',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Shreya Sarkar',
                'designation' => 'Head of Design & UX',
                'photo' => 'img/team/shreya_sarkar.png',
                'description' => 'Pioneering world-class human-computer interaction, motion design, and brand identity systems.',
                'employee_id' => 'TS-EMP-0003',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Mantaar Singh',
                'designation' => 'Lead AI Systems Architect',
                'photo' => 'img/team/mantar_singh.png',
                'description' => 'Engineering autonomous LLM reasoning agents, neural pipelines, and edge compute models.',
                'employee_id' => 'TS-EMP-0004',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Krishiv Dutta',
                'designation' => 'HR Co-ordinator',
                'photo' => 'img/team/krishiv_dutta.png',
                'description' => 'Directing talent operations, team culture, and engineering team scaling across all tech hubs.',
                'employee_id' => 'TS-EMP-0006',
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($teamMembers as $tm) {
            \App\Models\TeamMember::updateOrCreate(['name' => $tm['name']], $tm);
        }

        // 9. Testimonials
        $testimonials = [
            [
                'client_name' => 'Dr. R. Banerjee',
                'company' => 'SKC Systems',
                'designation' => 'Managing Director',
                'quote' => 'Talisha Software transformed our industrial telemetry infrastructure into an intelligent, autonomous pipeline. The performance gains and visual polish were exceptional.',
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'client_name' => 'P. Mehta',
                'company' => 'Printdoro Global',
                'designation' => 'Chief Technology Officer',
                'quote' => 'Their capability in Agentic AI and precision engineering sets them apart from typical agencies. They delivered a world-class platform ahead of schedule.',
                'rating' => 5,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }

        // 9. SEO Metas
        $seoList = [
            [
                'page_slug' => 'home',
                'title' => 'Talisha Software — Agentic AI & Enterprise Engineering',
                'description' => 'World-class Agentic AI solutions, Web3 blockchain development, and Industrial IoT transformations. Powering forward-thinking enterprises with cinematic precision.',
                'keywords' => 'Agentic AI, Software Development, Web3, IoT, Blockchain, Enterprise Technology India',
            ],
            [
                'page_slug' => 'about',
                'title' => 'About Us | Talisha Software',
                'description' => 'Discover our mission, leadership, and multi-hub innovation centers across Durgapur, Kolkata, Gujarat, and Bangalore.',
                'keywords' => 'About Talisha Software, Tech Leadership, AI Engineering Team',
            ],
            [
                'page_slug' => 'solutions',
                'title' => 'Enterprise Solutions | Talisha Software',
                'description' => 'High-impact technology suites: Intelligent Automation, Smart Infrastructure, Industrial IoT, and Web3 Smart Contracts.',
                'keywords' => 'AI Solutions, Smart Infrastructure, Industrial Automation',
            ],
            [
                'page_slug' => 'articles',
                'title' => 'Insights & Engineering Articles | Talisha Software',
                'description' => 'Deep-dive technical articles, research papers, and architectural insights from our engineering teams.',
                'keywords' => 'AI Blog, Web3 Articles, Tech Insights India',
            ],
            [
                'page_slug' => 'career',
                'title' => 'Careers & Culture | Talisha Software',
                'description' => 'Join the elite engineering team engineering the intelligent future. View open roles in AI, Web3, and Creative Engineering.',
                'keywords' => 'Tech Careers, AI Jobs India, Remote Software Developer Jobs',
            ],
            [
                'page_slug' => 'contact',
                'title' => 'Contact Us | Talisha Software',
                'description' => 'Get in touch with our engineering directors and regional innovation centers in Durgapur, Kolkata, Gujarat, and Bangalore.',
                'keywords' => 'Contact Talisha Software, AI Development Inquiries',
            ],
            [
                'page_slug' => 'get-in-touch',
                'title' => 'Initiate Your Project | Talisha Software',
                'description' => 'Discuss your technological vision, timeline, and architectural requirements with our lead engineers.',
                'keywords' => 'Project Inquiry, Hire AI Engineers, Software Development Quote',
            ],
        ];

        foreach ($seoList as $seo) {
            SeoMeta::updateOrCreate(['page_slug' => $seo['page_slug']], $seo);
        }
    }
}
