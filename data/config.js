/**
 * data/config.js
 * Shared configuration for the STATIC version (Vercel / GitHub Pages)
 * This mirrors includes/config.php
 * 
 * Easy to modify images, projects, etc. here.
 */
window.PORTFOLIO_CONFIG = {
    "personal": {
        "name": "Marcus Rivera",
        "role": "Full Stack Developer & PHP Specialist",
        "location": "San Francisco, CA",
        "email": "hello@marcusrivera.dev",
        "phone": "+1 (415) 555-0123",
        "bio": "Passionate full-stack developer specializing in scalable PHP applications and modern JavaScript. I build elegant, maintainable solutions using clean OOP principles.",
        "profileImg": "images/profile.jpg",
        "heroImg": "images/hero-bg.jpg",
        "github": "https://github.com/marcusrivera",
        "linkedin": "https://linkedin.com/in/marcusrivera"
    },
    "images": {
        "hero": "images/hero-bg.jpg",
        "profile": "images/profile.jpg"
    },
    "projects": [
        {
            "id": 1,
            "title": "Finora",
            "subtitle": "Enterprise Banking Platform",
            "category": "php",
            "year": "2024",
            "img": "images/project-1.jpg",
            "description": "A modern banking platform built with Laravel and PHP 8.3. Features real-time transaction processing, advanced reporting, and a custom admin dashboard.",
            "longDescription": "Finora is a complete digital banking solution that I architected from scratch using strict OOP principles and clean architecture. Built with Laravel 11, MySQL, Redis, and a React frontend.",
            "tech": ["PHP 8.3", "Laravel 11", "MySQL", "Redis", "Docker", "Tailwind"],
            "liveUrl": "https://example.com/finora",
            "githubUrl": "https://github.com/marcusrivera/finora"
        },
        {
            "id": 2,
            "title": "Vesper",
            "subtitle": "Design System & Component Library",
            "category": "design",
            "year": "2024",
            "img": "images/project-2.jpg",
            "description": "A comprehensive design system and component library used by 12+ internal teams at Stripe.",
            "longDescription": "Vesper is a scalable, token-driven design system with over 180 components. Built with Tailwind, TypeScript and Storybook.",
            "tech": ["Tailwind", "TypeScript", "Storybook", "Figma", "React"],
            "liveUrl": "https://example.com/vesper",
            "githubUrl": "https://github.com/marcusrivera/vesper"
        },
        {
            "id": 3,
            "title": "Pulse Analytics",
            "subtitle": "Real-time SaaS Dashboard",
            "category": "web",
            "year": "2023",
            "img": "images/project-3.jpg",
            "description": "Real-time analytics platform for SaaS companies. Features live metrics, cohort analysis, and custom dashboards.",
            "longDescription": "Pulse was built using Laravel as the API backend, combined with Vue.js and a powerful real-time data pipeline using Pusher.",
            "tech": ["Laravel", "Vue.js", "Pusher", "PostgreSQL", "AWS"],
            "liveUrl": "https://example.com/pulse",
            "githubUrl": "https://github.com/marcusrivera/pulse"
        },
        {
            "id": 4,
            "title": "Helix CMS",
            "subtitle": "Headless CMS for Content Teams",
            "category": "php",
            "year": "2023",
            "img": "images/project-4.jpg",
            "description": "A highly customizable headless CMS for media companies. Built from the ground up in Symfony with full GraphQL support.",
            "longDescription": "Helix CMS is a multi-tenant headless CMS built with Symfony 6, Doctrine ORM and GraphQL. It powers several large digital media outlets.",
            "tech": ["Symfony", "PHP 8", "GraphQL", "PostgreSQL", "Docker"],
            "liveUrl": "https://example.com/helix",
            "githubUrl": "https://github.com/marcusrivera/helix"
        },
        {
            "id": 5,
            "title": "Atlas Travel",
            "subtitle": "Modern Travel Booking Platform",
            "category": "web",
            "year": "2022",
            "img": "images/project-5.jpg",
            "description": "Full-featured booking platform with dynamic pricing, real-time availability and personalized travel recommendations.",
            "longDescription": "A complete travel booking experience with integrated payment processing, itinerary management, and a robust recommendation engine.",
            "tech": ["Laravel", "Alpine.js", "Stripe", "MySQL", "Redis"],
            "liveUrl": "https://example.com/atlas",
            "githubUrl": "https://github.com/marcusrivera/atlas"
        },
        {
            "id": 6,
            "title": "Lumina UI Kit",
            "subtitle": "Enterprise UI Component Library",
            "category": "design",
            "year": "2024",
            "img": "images/project-6.jpg",
            "description": "Beautiful, accessible component library used across multiple Fortune 500 companies.",
            "longDescription": "Lumina is a premium UI kit featuring 200+ components, 10 design themes, and full dark mode support. Built using Tailwind CSS and TypeScript.",
            "tech": ["Tailwind CSS", "TypeScript", "Storybook", "Figma"],
            "liveUrl": "https://example.com/lumina",
            "githubUrl": "https://github.com/marcusrivera/lumina"
        }
    ],
    "experience": [
        {
            "role": "Senior Software Engineer",
            "company": "Stripe",
            "period": "2023 — Present",
            "location": "San Francisco, CA",
            "description": "Lead development of the core payments infrastructure. Architected and maintained PHP microservices serving millions of requests daily. Mentored 4 junior engineers.",
            "highlights": ["PHP 8.3", "Laravel", "Kubernetes", "Event-Driven Architecture"]
        },
        {
            "role": "Full Stack Developer",
            "company": "Vercel",
            "period": "2021 — 2023",
            "location": "Remote",
            "description": "Built and maintained high-performance developer tooling platforms. Led the migration of legacy PHP monolith to a modular Laravel architecture.",
            "highlights": ["Laravel", "Next.js", "TypeScript", "PostgreSQL"]
        },
        {
            "role": "Software Engineer",
            "company": "Shopify",
            "period": "2019 — 2021",
            "location": "Toronto, ON",
            "description": "Developed merchant-facing tools for the Shopify ecosystem. Focused heavily on backend services and API development using Symfony and custom OOP patterns.",
            "highlights": ["Symfony", "PHP", "MySQL", "GraphQL"]
        }
    ],
    "skills": [
        {"name": "PHP & Laravel", "level": 95},
        {"name": "JavaScript / TypeScript", "level": 90},
        {"name": "Symfony", "level": 85},
        {"name": "MySQL & PostgreSQL", "level": 88},
        {"name": "Tailwind CSS", "level": 92},
        {"name": "Docker & Kubernetes", "level": 78},
        {"name": "System Design", "level": 82}
    ]
};
