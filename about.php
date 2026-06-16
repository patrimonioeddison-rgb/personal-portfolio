<?php
// about.php
$config = include 'includes/config.php';
$personal = $config['personal'];
$skills = $config['skills'];
?>
<?php include 'includes/header.php'; ?>

<!-- ABOUT PAGE -->
<div class="page px-8 pt-10 pb-16 max-w-4xl">
    <div class="flex flex-col lg:flex-row gap-10">
        <!-- Profile Image -->
        <div class="lg:w-5/12">
            <div class="sticky top-8">
                <div id="profile-image" 
                     class="image-placeholder w-full aspect-square max-w-[320px] rounded-[3.5rem] border border-zinc-800 shadow-xl overflow-hidden mx-auto lg:mx-0"
                     style="background-image: url('<?= htmlspecialchars($config['images']['profile']) ?>');">
                </div>
                
                <div class="mt-6 max-w-[320px] mx-auto lg:mx-0">
                    <div class="flex items-center justify-between text-sm">
                        <div>
                            <span class="block text-xs text-zinc-400">Currently at</span>
                            <span class="font-semibold">Stripe • Engineering</span>
                        </div>
                        <div class="text-right">
                            <span class="block text-xs text-zinc-400">Since</span>
                            <span class="font-semibold">2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- About Content -->
        <div class="lg:w-7/12">
            <div>
                <span class="px-3 py-1 text-xs font-semibold tracking-wider bg-zinc-900 border border-zinc-700 text-blue-300 rounded-2xl">ABOUT ME</span>
                
                <h2 class="mt-3 section-header">Crafting digital experiences<br>with clean code &amp; intention.</h2>
                
                <div class="prose prose-invert mt-6 max-w-none text-zinc-300">
                    <p class="text-[15.2px]">I'm a passionate full-stack developer with over 8 years of experience building scalable web applications. My expertise spans modern PHP (Laravel, Symfony), JavaScript ecosystems, and clean architecture patterns.</p>
                    
                    <p class="mt-4 text-[15.2px]">I believe in writing code that is maintainable, testable, and enjoyable to work with. My approach combines strong object-oriented design with pragmatic development practices.</p>
                </div>
                
                <div class="mt-8 grid grid-cols-3 gap-4">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-4">
                        <div class="font-extrabold text-3xl">8+</div>
                        <div class="text-xs font-medium text-zinc-400 mt-1">YEARS EXP</div>
                    </div>
                    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-4">
                        <div class="font-extrabold text-3xl">120+</div>
                        <div class="text-xs font-medium text-zinc-400 mt-1">PROJECTS</div>
                    </div>
                    <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-4">
                        <div class="font-extrabold text-3xl">32</div>
                        <div class="text-xs font-medium text-zinc-400 mt-1">COUNTRIES</div>
                    </div>
                </div>
                
                <div class="mt-7 flex flex-wrap gap-2">
                    <div class="text-xs px-3 py-1 rounded-2xl bg-zinc-900 border border-zinc-700 flex items-center gap-1.5">
                        <i class="fa-brands fa-php text-blue-400"></i> 
                        <span class="font-semibold text-xs">PHP 8.3</span>
                    </div>
                    <div class="text-xs px-3 py-1 rounded-2xl bg-zinc-900 border border-zinc-700">Laravel</div>
                    <div class="text-xs px-3 py-1 rounded-2xl bg-zinc-900 border border-zinc-700">Symfony</div>
                    <div class="text-xs px-3 py-1 rounded-2xl bg-zinc-900 border border-zinc-700">MySQL</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Section (PHP rendered) -->
    <div class="mt-9 skills-section">
        <div class="px-1">
            <div class="flex items-center justify-between mb-3">
                <span class="font-semibold text-sm">Core Skills &amp; Expertise</span>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                <?php foreach ($skills as $skill): ?>
                <div>
                    <div class="flex items-center justify-between text-xs mb-1.5">
                        <span class="font-medium"><?= htmlspecialchars($skill['name']) ?></span>
                        <span class="font-bold text-blue-300"><?= $skill['level'] ?>%</span>
                    </div>
                    <div class="h-2 bg-zinc-800 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full" style="width: <?= $skill['level'] ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>