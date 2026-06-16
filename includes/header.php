<?php
// includes/header.php
$config = include __DIR__ . '/config.php';
$personal = $config['personal'];
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($personal['name']) ?> • <?= htmlspecialchars($personal['role']) ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- PHP Data injected as JavaScript config for OOP JS layer -->
    <script>
        window.PORTFOLIO_CONFIG = <?= json_encode($config, JSON_UNESCAPED_SLASHES) ?>;
    </script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&amp;family=Playfair+Display:wght@700&amp;display=swap');
        
        body {
            font-family: 'Inter', system_ui, sans-serif;
        }
        
        .heading-font {
            font-family: 'Playfair Display', Georgia, serif;
            font-weight: 700;
        }

        .page {
            animation: fadeInPage 0.35s ease forwards;
        }

        @keyframes fadeInPage {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }
        
        .nav-link.active:after,
        .nav-link:hover:after {
            width: 100%;
        }

        .project-card {
            transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
        }
        
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .skill-bar {
            transition: width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .section-header {
            font-size: 2.25rem;
            line-height: 1.1;
            font-weight: 700;
            letter-spacing: -.025em;
        }

        .image-placeholder {
            background-size: cover;
            background-position: center;
            transition: transform 0.4s ease;
        }

        .project-card:hover .image-placeholder {
            transform: scale(1.05);
        }

        .php-badge {
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            color: white;
            font-size: 0.65rem;
            padding: 1px 8px;
            border-radius: 20px;
            font-weight: 600;
        }

        .custom-btn {
            transition: all 0.3s ease;
        }
        
        .custom-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgb(59 130 246 / 0.3);
        }

        .filter-btn {
            transition: all .2s ease;
        }

        .filter-btn.active {
            background-color: #1e40af;
            color: white;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        .timeline-item {
            position: relative;
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, #3b82f6, transparent);
        }

        .modal {
            animation: modalPop 0.3s ease forwards;
        }

        @keyframes modalPop {
            from { transform: scale(0.9) translateY(30px); opacity: 0; }
            to { transform: scale(1) translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-zinc-950 text-zinc-200">
    <!-- NAVIGATION -->
    <nav class="bg-zinc-900 border-b border-zinc-800 sticky top-0 z-50">
        <div class="max-w-screen-2xl mx-auto">
            <div class="px-8 py-5 flex items-center justify-between">
                <!-- Logo -->
                <a href="index.php" class="flex items-center gap-x-3">
                    <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center shadow-inner">
                        <span class="text-white font-bold text-3xl tracking-tighter">MR</span>
                    </div>
                    <div>
                        <span class="font-bold text-2xl tracking-tighter"><?= htmlspecialchars($personal['name']) ?></span>
                        <div class="flex items-center gap-x-1.5">
                            <span class="text-xs text-zinc-400">Full Stack Developer</span>
                            <span class="php-badge text-[10px] px-1.5 py-px">PHP 8</span>
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-x-1">
                    <a href="index.php" class="nav-link px-4 py-2 text-sm font-medium <?= $currentPage === 'index' ? 'active text-blue-400' : '' ?>">Home</a>
                    <a href="about.php" class="nav-link px-4 py-2 text-sm font-medium <?= $currentPage === 'about' ? 'active text-blue-400' : '' ?>">About</a>
                    <a href="projects.php" class="nav-link px-4 py-2 text-sm font-medium <?= $currentPage === 'projects' ? 'active text-blue-400' : '' ?>">Projects</a>
                    <a href="experience.php" class="nav-link px-4 py-2 text-sm font-medium <?= $currentPage === 'experience' ? 'active text-blue-400' : '' ?>">Experience</a>
                    <a href="contact.php" class="nav-link px-4 py-2 text-sm font-medium <?= $currentPage === 'contact' ? 'active text-blue-400' : '' ?>">Contact</a>
                    <a href="php-architecture.php" class="nav-link px-4 py-2 text-sm font-medium text-emerald-300 <?= $currentPage === 'php-architecture' ? 'active text-emerald-400' : '' ?>">PHP OOP</a>
                </div>

                <div class="flex items-center gap-x-3">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" class="w-9 h-9 flex items-center justify-center text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors rounded-2xl border border-zinc-800">
                        <i class="fa-solid fa-moon text-lg"></i>
                    </button>
                    
                    <!-- Download Resume -->
                    <button onclick="downloadResume()" class="hidden md:flex items-center gap-x-2 px-5 py-2.5 text-sm font-semibold bg-white text-zinc-900 hover:bg-amber-100 transition-colors rounded-3xl">
                        <i class="fa-solid fa-download text-xs"></i>
                        <span>Resume</span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden w-9 h-9 flex items-center justify-center text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors rounded-2xl border border-zinc-800">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-zinc-900 border-t border-zinc-800 px-5 py-3">
            <div class="flex flex-col">
                <a href="index.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2">Home</a>
                <a href="about.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2">About</a>
                <a href="projects.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2">Projects</a>
                <a href="experience.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2">Experience</a>
                <a href="contact.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2">Contact</a>
                <a href="php-architecture.php" class="mobile-nav-item px-4 py-3 text-sm font-medium flex items-center gap-x-2 text-emerald-300">PHP OOP</a>
                
                <div class="px-4 py-3 border-t border-zinc-800 mt-1">
                    <button onclick="downloadResume(); closeMobileMenu();" class="w-full flex items-center justify-center gap-x-2 px-4 py-3 bg-white text-zinc-900 text-sm font-semibold rounded-3xl">
                        <i class="fa-solid fa-download"></i>
                        <span>Download Resume</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-screen-2xl mx-auto">