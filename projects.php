<?php
// projects.php
$config = include 'includes/config.php';
$projects = $config['projects'];
?>
<?php include 'includes/header.php'; ?>

<!-- PROJECTS PAGE -->
<div class="page px-8 pt-8 pb-12">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-8">
        <div>
            <span class="px-3 py-1 text-xs font-semibold tracking-wider bg-zinc-900 border border-zinc-700 text-blue-300 rounded-2xl">PORTFOLIO</span>
            <h2 class="section-header mt-1.5">Selected Work</h2>
        </div>
        
        <!-- Project Filters -->
        <div class="flex flex-wrap items-center gap-2 mt-5 md:mt-0">
            <button onclick="filterProjects('all')" class="filter-btn active px-5 py-[6px] text-sm font-medium bg-zinc-800 hover:bg-zinc-700 border border-transparent text-white rounded-3xl px-4" data-filter="all">All</button>
            <button onclick="filterProjects('web')" class="filter-btn px-5 py-[6px] text-sm font-medium bg-zinc-900 hover:bg-zinc-700 border border-zinc-700 text-white rounded-3xl px-4" data-filter="web">Web Apps</button>
            <button onclick="filterProjects('php')" class="filter-btn px-5 py-[6px] text-sm font-medium bg-zinc-900 hover:bg-zinc-700 border border-zinc-700 text-white rounded-3xl px-4" data-filter="php">PHP / Laravel</button>
            <button onclick="filterProjects('design')" class="filter-btn px-5 py-[6px] text-sm font-medium bg-zinc-900 hover:bg-zinc-700 border border-zinc-700 text-white rounded-3xl px-4" data-filter="design">Design Systems</button>
        </div>
    </div>
    
    <!-- Projects Grid -->
    <div id="projects-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($projects as $project): ?>
        <div class="project-card bg-zinc-900 border border-zinc-700 rounded-3xl overflow-hidden cursor-pointer group" 
             data-project-id="<?= $project['id'] ?>" 
             data-category="<?= $project['category'] ?>">
            
            <div class="image-placeholder h-[170px] w-full" 
                 style="background-image: url('<?= htmlspecialchars($project['img']) ?>'); background-size: cover; background-position: center;">
                <div class="h-full w-full bg-gradient-to-b from-transparent via-transparent to-black/50 flex items-end p-4">
                    <div class="px-3 py-[1px] bg-white/90 text-black text-xs font-bold rounded-2xl flex items-center">
                        <span><?= htmlspecialchars($project['year']) ?></span>
                    </div>
                </div>
            </div>
            
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="font-extrabold text-xl tracking-tight group-hover:text-blue-300 transition-colors"><?= htmlspecialchars($project['title']) ?></h4>
                        <p class="text-xs text-zinc-400 mt-0.5"><?= htmlspecialchars($project['subtitle']) ?></p>
                    </div>
                </div>
                
                <div class="flex items-center gap-x-1.5 mt-4">
                    <span class="px-2.5 py-1 text-[10px] font-semibold bg-zinc-800 border border-zinc-700 rounded-2xl">
                        <?= $project['category'] === 'php' ? 'PHP / Laravel' : ($project['category'] === 'web' ? 'Web App' : 'Design System') ?>
                    </span>
                </div>
                
                <div class="mt-3 text-xs text-zinc-300 line-clamp-2"><?= htmlspecialchars($project['description']) ?></div>
                
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex -space-x-1">
                        <?php foreach (array_slice($project['tech'], 0, 3) as $tech): ?>
                            <div class="w-[19px] h-[19px] text-[9.5px] flex items-center justify-center bg-zinc-800 text-zinc-300 border border-zinc-700 rounded-full text-center font-semibold" title="<?= htmlspecialchars($tech) ?>">
                                <?= substr($tech, 0, 1) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="text-xs text-blue-300 flex items-center font-medium">
                        View details <i class="fa-solid fa-arrow-right-long ml-1.5 text-[10px]"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="mt-8 text-center">
        <button onclick="window.location.href='php-architecture.php'" 
                class="text-sm px-5 py-2.5 rounded-3xl border border-zinc-700 hover:bg-zinc-900 transition-colors flex items-center mx-auto gap-x-2 text-zinc-300">
            <span>View PHP Architecture &amp; Source</span> 
            <i class="fa-solid fa-external-link-alt text-xs"></i>
        </button>
    </div>
</div>

<script>
// Project filtering (client-side)
function filterProjects(filter) {
    const cards = document.querySelectorAll('.project-card');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Update button states
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-blue-600', 'text-white', 'border-transparent');
        btn.classList.add('bg-zinc-900', 'border-zinc-700');
        
        if (btn.dataset.filter === filter) {
            btn.classList.add('active', 'bg-blue-600', 'text-white', 'border-transparent');
            btn.classList.remove('bg-zinc-900', 'border-zinc-700');
        }
    });
    
    cards.forEach(card => {
        if (filter === 'all') {
            card.style.display = '';
        } else {
            if (card.dataset.category === filter) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        }
    });
}

// Open project modal (uses global portfolioApp from assets/js/portfolio.js)
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.project-card');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const projectId = parseInt(this.dataset.projectId);
            
            // Find project from PHP config injected into JS
            const config = window.PORTFOLIO_CONFIG || { projects: [] };
            const project = config.projects.find(p => p.id == projectId);
            
            if (project && window.portfolioApp) {
                window.portfolioApp.openProjectModal(project);
            } else if (project) {
                // Fallback if app not initialized
                const modal = document.getElementById('project-modal');
                document.getElementById('modal-title').textContent = project.title;
                document.getElementById('modal-subtitle').textContent = project.subtitle;
                document.getElementById('modal-description').textContent = project.longDescription || project.description;
                document.getElementById('modal-year').textContent = project.year;
                document.getElementById('modal-category').textContent = project.category === 'php' ? 'PHP / Laravel' : project.category;
                document.getElementById('modal-image').style.backgroundImage = `url('${project.img}')`;
                
                const techContainer = document.getElementById('modal-tech');
                techContainer.innerHTML = '';
                (project.tech || []).forEach(tech => {
                    const span = document.createElement('span');
                    span.className = 'px-3 py-1 text-xs font-medium bg-zinc-800 border border-zinc-700 text-white rounded-[2rem]';
                    span.textContent = tech;
                    techContainer.appendChild(span);
                });
                
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>