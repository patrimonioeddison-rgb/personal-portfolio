<?php
// index.php - Home Page
$config = include 'includes/config.php';
$personal = $config['personal'];
?>
<?php include 'includes/header.php'; ?>

<!-- HOME PAGE -->
<div class="page">
    <div class="grid grid-cols-1 lg:grid-cols-12 min-h-[92vh]">
        <!-- Hero Content -->
        <div class="lg:col-span-7 px-8 pt-16 pb-12 lg:pt-20 lg:pb-16 flex flex-col justify-center">
            <div class="max-w-lg">
                <div class="inline-flex items-center gap-x-2 px-4 py-2 rounded-3xl bg-zinc-900 border border-zinc-800 mb-6">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                    <span class="text-emerald-300 text-sm font-medium">Available for freelance projects</span>
                </div>
                
                <h1 class="text-6xl lg:text-7xl leading-[1.05] tracking-tighter font-bold heading-font">
                    <?= htmlspecialchars(explode(' ', $personal['name'])[0]) ?><br>
                    <?= htmlspecialchars(explode(' ', $personal['name'])[1] ?? '') ?>
                </h1>
                
                <p class="mt-4 text-2xl text-zinc-400 font-light"><?= htmlspecialchars($personal['role']) ?></p>
                
                <div class="mt-3 flex items-center gap-x-2 text-sm">
                    <div class="flex items-center text-emerald-300">
                        <i class="fa-solid fa-map-marker-alt mr-1.5"></i>
                        <span><?= htmlspecialchars($personal['location']) ?></span>
                    </div>
                    <div class="w-1.5 h-1.5 bg-zinc-700 rounded-full"></div>
                    <span class="text-zinc-400">Open to relocation</span>
                </div>
                
                <div class="mt-8 flex items-center gap-x-3">
                    <a href="projects.php" 
                       class="custom-btn flex items-center justify-center gap-x-3 px-7 py-[14px] bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold rounded-3xl text-sm shadow-lg shadow-blue-900/30">
                        <span>View Projects</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    
                    <a href="contact.php" 
                       class="custom-btn flex items-center justify-center gap-x-2 px-6 py-[14px] border border-zinc-700 hover:bg-zinc-900 transition-colors text-white font-semibold rounded-3xl text-sm">
                        <span>Get in touch</span>
                    </a>
                </div>
                
                <div class="mt-10 flex items-center gap-x-5">
                    <div>
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 bg-zinc-700 border border-zinc-600 rounded-full overflow-hidden ring-1 ring-zinc-800">
                                <img src="https://picsum.photos/id/1009/24/24" class="w-full h-full object-cover">
                            </div>
                            <div class="w-6 h-6 bg-zinc-700 border border-zinc-600 rounded-full overflow-hidden ring-1 ring-zinc-800">
                                <img src="https://picsum.photos/id/1012/24/24" class="w-full h-full object-cover">
                            </div>
                            <div class="w-6 h-6 bg-zinc-700 border border-zinc-600 rounded-full overflow-hidden ring-1 ring-zinc-800">
                                <img src="https://picsum.photos/id/201/24/24" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="text-xs text-zinc-400">
                        <span class="font-semibold text-white">50+</span> clients worldwide
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Hero Image -->
        <div class="lg:col-span-5 relative">
            <div class="h-full bg-zinc-900 lg:rounded-bl-[5rem] flex items-center justify-center p-6 lg:p-0">
                <div class="w-full max-w-md lg:max-w-none px-5 lg:px-0">
                    <div class="relative">
                        <div id="hero-image" 
                             class="image-placeholder w-full aspect-[4/3] lg:aspect-auto lg:h-[620px] rounded-3xl border border-zinc-800 shadow-2xl overflow-hidden"
                             style="background-image: url('<?= htmlspecialchars($config['images']['hero']) ?>');">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-zinc-950/70"></div>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-7">
                                <div class="flex items-center gap-x-3">
                                    <div class="px-3 py-1 bg-white/90 backdrop-blur-sm text-zinc-900 text-xs font-bold tracking-wider rounded-2xl flex items-center gap-x-1.5">
                                        <i class="fa-solid fa-globe text-xs"></i>
                                        <span class="font-extrabold text-[10px]">2025</span>
                                    </div>
                                    <div>
                                        <span class="text-white font-semibold text-sm">Featured in</span><br>
                                        <span class="text-white/90 text-xs tracking-wider">Awwwards SOTY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>