    </div> <!-- close container from header -->

    <footer class="border-t border-zinc-800 py-6 px-8">
        <?php 
        // Load config for footer (ensures $personal is always available)
        if (!isset($personal)) {
            $footerConfig = include __DIR__ . '/config.php';
            $personal = $footerConfig['personal'];
        }
        ?>
        <div class="max-w-screen-2xl mx-auto flex flex-col md:flex-row items-center justify-between text-xs gap-y-2 text-zinc-400">
            <div>© <?= date('Y') ?> <?= htmlspecialchars($personal['name']) ?>. All rights reserved. Built with <span class="font-medium text-blue-300">PHP 8 + OOP</span> + jQuery.</div>
            <div class="flex gap-x-4">
                <a href="#" class="hover:text-white transition-colors">Privacy</a>
                <a href="#" class="hover:text-white transition-colors">Legal</a>
                <a href="php-architecture.php" class="hover:text-white transition-colors">PHP Architecture</a>
            </div>
        </div>
    </footer>

    <!-- Project Modal -->
    <div id="project-modal" onclick="if (event.target.id === 'project-modal') closeModal()" class="hidden fixed inset-0 bg-black bg-opacity-70 z-[100] flex items-center justify-center p-5">
        <div onclick="event.stopImmediatePropagation()" class="modal bg-zinc-900 border border-zinc-700 w-full max-w-2xl rounded-3xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-700">
                <div id="modal-category" class="px-3 py-1 text-xs font-semibold rounded-[2rem] bg-zinc-800"></div>
                <button onclick="closeModal()" class="w-9 h-9 flex items-center justify-center hover:bg-zinc-800 text-zinc-400 hover:text-white transition-colors rounded-2xl">
                    <i class="fa-solid fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="p-6">
                <div id="modal-image" class="image-placeholder w-full h-64 rounded-2xl border border-zinc-700 mb-6" style="background-size: cover; background-position: center;"></div>
                
                <div class="flex items-center justify-between">
                    <div>
                        <h3 id="modal-title" class="font-extrabold text-3xl tracking-tighter"></h3>
                        <p id="modal-subtitle" class="text-zinc-400"></p>
                    </div>
                    <div id="modal-year" class="px-4 text-xs font-bold text-center py-1.5 bg-zinc-800 border border-zinc-700 rounded-[2rem]"></div>
                </div>
                
                <div class="mt-6">
                    <div class="text-xs uppercase tracking-wider text-zinc-400 mb-1.5 font-semibold">Project Overview</div>
                    <p id="modal-description" class="text-[15px] leading-relaxed text-zinc-300"></p>
                </div>
                
                <div class="mt-5">
                    <div class="text-xs uppercase tracking-wider text-zinc-400 mb-2 font-semibold">TECHNOLOGIES</div>
                    <div id="modal-tech" class="flex flex-wrap gap-2"></div>
                </div>
                
                <div class="flex items-center gap-x-3 mt-7">
                    <button onclick="visitProject()" class="flex-1 flex justify-center items-center px-6 py-[13px] text-sm bg-white text-zinc-900 hover:bg-amber-50 transition-colors font-bold rounded-3xl">
                        <span>Visit Live Site</span>
                    </button>
                    <button onclick="viewSource()" class="flex-1 flex justify-center items-center px-6 py-[13px] text-sm border border-zinc-700 hover:bg-zinc-800 transition-colors font-semibold rounded-3xl">
                        <i class="fa-brands fa-github mr-2"></i>
                        <span>View Source</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Shared JavaScript -->
    <script src="assets/js/portfolio.js"></script>
    
    <script>
        // Initialize shared functionality on every page
        $(document).ready(function() {
            // Theme toggle
            $('#theme-toggle').on('click', function() {
                const $icon = $(this).find('i');
                if ($icon.hasClass('fa-moon')) {
                    $('body').addClass('bg-white text-zinc-800').removeClass('bg-zinc-950 text-zinc-200');
                    $icon.removeClass('fa-moon').addClass('fa-sun');
                } else {
                    $('body').removeClass('bg-white text-zinc-800').addClass('bg-zinc-950 text-zinc-200');
                    $icon.removeClass('fa-sun').addClass('fa-moon');
                }
            });

            // Mobile menu
            $('#mobile-menu-btn').on('click', function() {
                const $menu = $('#mobile-menu');
                $menu.slideToggle(180);
                const $icon = $(this).find('i');
                $icon.toggleClass('fa-bars fa-times');
            });
        });

        function closeMobileMenu() {
            $('#mobile-menu').slideUp(180);
            $('#mobile-menu-btn i').removeClass('fa-times').addClass('fa-bars');
        }
    </script>
</body>
</html>