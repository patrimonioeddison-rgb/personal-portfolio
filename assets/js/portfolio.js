/**
 * Portfolio JavaScript - OOP Architecture
 * Works for both PHP and static (Vercel) versions
 */
class PortfolioApp {
    constructor() {
        this.currentProject = null;
        this.config = (window.PORTFOLIO_CONFIG) ? window.PORTFOLIO_CONFIG : this.getDefaultConfig();
    }

    getDefaultConfig() {
        return {
            personal: { name: "Marcus Rivera", email: "hello@marcusrivera.dev" },
            images: { hero: "https://picsum.photos/id/1015/1200/1400", profile: "https://picsum.photos/id/1005/800/800" },
            projects: [], experience: [], skills: []
        };
    }

    init() {
        // Auto-render projects if grid exists (for projects page)
        if (document.getElementById('projects-grid') && !document.querySelector('.project-card')) {
            // Only render if not already server-rendered (static pages have cards)
            this.renderProjects();
        }

        // Render experience if needed
        if (document.getElementById('experience-timeline') && !document.querySelector('.timeline-item')) {
            this.renderExperience();
        }

        // Setup image editor on php page
        if (document.getElementById('hero-img-input')) {
            this.setupImageEditor();
        }

        console.log('%c[Portfolio] Static-ready OOP JS initialized', 'color:#64748b');
    }

    renderProjects(filter = 'all') {
        const grid = document.getElementById('projects-grid');
        if (!grid) return;
        grid.innerHTML = '';

        let projects = this.config.projects || [];
        if (filter !== 'all') projects = projects.filter(p => p.category === filter);

        projects.forEach(project => {
            const card = document.createElement('div');
            card.className = `project-card bg-zinc-900 border border-zinc-700 rounded-3xl overflow-hidden cursor-pointer group`;
            card.dataset.projectId = project.id;
            card.dataset.category = project.category;

            card.innerHTML = `
                <div class="image-placeholder h-[170px] w-full" style="background-image: url('${project.img}'); background-size: cover; background-position: center;">
                    <div class="h-full w-full bg-gradient-to-b from-transparent via-transparent to-black/50 flex items-end p-4">
                        <div class="px-3 py-[1px] bg-white/90 text-black text-xs font-bold rounded-2xl"><span>${project.year}</span></div>
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-extrabold text-xl tracking-tight group-hover:text-blue-300 transition-colors">${project.title}</h4>
                    <p class="text-xs text-zinc-400 mt-0.5">${project.subtitle}</p>
                    <div class="mt-4 flex items-center justify-between text-xs">
                        <div class="text-blue-300 font-medium">View details →</div>
                    </div>
                </div>
            `;

            card.addEventListener('click', () => this.openProjectModal(project));
            grid.appendChild(card);
        });
    }

    openProjectModal(project) {
        this.currentProject = project;

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

        const modal = document.getElementById('project-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    renderExperience() {
        const container = document.getElementById('experience-timeline');
        if (!container) return;
        container.innerHTML = '';

        (this.config.experience || []).forEach((exp, index) => {
            const div = document.createElement('div');
            div.className = 'timeline-item flex gap-5';
            div.innerHTML = `
                <div class="flex-shrink-0 w-8 pt-1">
                    <div class="w-8 h-8 bg-zinc-800 border border-zinc-700 flex items-center justify-center rounded-2xl text-xs font-extrabold text-blue-300">${index + 1}</div>
                </div>
                <div class="flex-1 pb-4">
                    <div class="flex items-baseline justify-between">
                        <div>
                            <h4 class="font-extrabold text-xl tracking-tight">${exp.role}</h4>
                            <div class="font-medium">${exp.company} — ${exp.location}</div>
                        </div>
                        <div class="text-xs font-semibold px-3 py-1 bg-zinc-900 border border-zinc-700 text-zinc-300 rounded-3xl">${exp.period}</div>
                    </div>
                    <div class="mt-3 text-sm text-zinc-300">${exp.description}</div>
                    <div class="mt-3 flex flex-wrap gap-2">${exp.highlights.map(h => `<span class="text-xs px-3 py-1 bg-zinc-800 border border-zinc-700 rounded-[2.1rem]">${h}</span>`).join('')}</div>
                </div>
            `;
            container.appendChild(div);
        });
    }

    setupImageEditor() {
        const heroInput = document.getElementById('hero-img-input');
        const profileInput = document.getElementById('profile-img-input');
        if (heroInput && this.config.images) heroInput.value = this.config.images.hero || '';
        if (profileInput && this.config.images) profileInput.value = this.config.images.profile || '';
    }

    closeModal() {
        const modal = document.getElementById('project-modal');
        if (modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    }
}

// Globals
let portfolioApp;

function closeModal() { if (portfolioApp) portfolioApp.closeModal(); }
function visitProject() { 
    if (portfolioApp && portfolioApp.currentProject) {
        window.open(portfolioApp.currentProject.liveUrl || 'https://github.com', '_blank');
    }
}
function viewSource() { 
    if (portfolioApp && portfolioApp.currentProject) {
        window.open(portfolioApp.currentProject.githubUrl || 'https://github.com', '_blank');
    }
}

function downloadResume() {
    const config = window.PORTFOLIO_CONFIG || {};
    const name = config.personal?.name || "Marcus Rivera";
    const content = `${name.toUpperCase()}\n${config.personal?.role || ''}\n\n` + 
        (config.experience || []).map(e => `${e.role} - ${e.company} (${e.period})\n`).join('\n') +
        "\n\n--- Static portfolio resume (generated client-side)";

    const blob = new Blob([content], {type: 'text/plain'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url; a.download = name.replace(' ', '_') + '_Resume.txt';
    document.body.appendChild(a); a.click(); document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

// Auto init
document.addEventListener('DOMContentLoaded', () => {
    portfolioApp = new PortfolioApp();
    window.portfolioApp = portfolioApp;
});
