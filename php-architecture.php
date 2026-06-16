<?php
// php-architecture.php - PHP OOP Architecture Demo + Live Image Editor
$config = include 'includes/config.php';
$personal = $config['personal'];
?>
<?php include 'includes/header.php'; ?>

<!-- PHP ARCHITECTURE PAGE -->
<div class="page px-8 pt-9 pb-14 max-w-5xl">
    <div class="mb-6">
        <span class="px-3 py-1 text-xs font-semibold tracking-wider bg-zinc-900 border border-zinc-700 text-blue-300 rounded-2xl">PHP OOP BACKEND</span>
        <h2 class="section-header mt-1.5">Production-Ready PHP Architecture</h2>
        <p class="text-zinc-400 mt-2 max-w-md">This portfolio is built with real separated PHP files + OOP. The JavaScript is only for interactivity.</p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- PHP Contact Handler Class -->
        <div class="bg-zinc-900 border border-zinc-700 rounded-3xl p-6">
            <div class="flex items-center mb-4">
                <i class="fa-brands fa-php text-blue-400 mr-2"></i>
                <span class="font-bold">ContactFormHandler.php</span>
            </div>
            <pre class="bg-zinc-950 p-4 rounded-2xl text-xs overflow-auto text-emerald-300 font-mono leading-relaxed" style="max-height: 260px;"><code>class ContactFormHandler {
    private $db;
    private $mailer;

    public function __construct($db = null, $mailer = null) {
        $this->db = $db;
        $this->mailer = $mailer ?: new SimpleMailer();
    }

    public function processSubmission(array $data): array {
        $data = $this->sanitizeData($data);
        $this->validate($data);
        
        $id = $this->saveToDatabase($data);
        $this->mailer->sendAdminNotification($data);
        
        return ['success' => true, 'inquiry_id' => $id];
    }
}</code></pre>
            <div class="mt-3 text-xs text-zinc-400">
                Full source: <code class="text-emerald-300">includes/ContactFormHandler.php</code>
            </div>
        </div>
        
        <div class="space-y-6">
            <!-- Project Model -->
            <div class="bg-zinc-900 border border-zinc-700 rounded-3xl p-6">
                <div class="flex items-center mb-4">
                    <i class="fa-solid fa-file-code text-blue-400 mr-2"></i>
                    <span class="font-bold">Project.php (Model Example)</span>
                </div>
                <pre class="bg-zinc-950 p-4 rounded-2xl text-xs overflow-auto text-emerald-300 font-mono leading-relaxed" style="max-height: 170px;"><code>class Project {
    public int $id;
    public string $title;
    public string $category;
    public array $technologies;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->category = $data['category'];
        $this->technologies = $data['tech'] ?? [];
    }

    public function getFormattedTech(): string {
        return implode(', ', $this->technologies);
    }
}</code></pre>
            </div>
            
            <div class="bg-zinc-900 border border-zinc-700 rounded-3xl p-6 text-sm">
                <div class="font-semibold mb-3">Real PHP File Structure:</div>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• index.php (Home)</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• about.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• projects.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• contact.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• includes/header.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• includes/config.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• includes/ContactFormHandler.php</div>
                    <div class="bg-zinc-950 px-3 py-2 rounded-2xl">• assets/js/portfolio.js</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-7 p-5 border border-zinc-800 bg-zinc-900 rounded-3xl text-sm">
        <strong class="block mb-1">How the PHP + JS separation works:</strong> 
        PHP renders the pages and injects <code class="text-emerald-300">window.PORTFOLIO_CONFIG</code>. 
        The shared OOP JavaScript in <code class="text-emerald-300">assets/js/portfolio.js</code> handles modals, filters, and live image updates.
    </div>
    
    <!-- EASY IMAGE EDITOR -->
    <div class="mt-6 bg-zinc-900 border border-zinc-700 rounded-3xl p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <span class="font-semibold">Live Image Editor</span>
                <span class="text-xs ml-2 text-emerald-300">(Updates instantly across the site)</span>
            </div>
            <button onclick="resetImagesToDefault()" 
                    class="text-xs px-3 py-1 rounded-2xl bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 transition-colors">Reset Defaults</button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
            <div>
                <label class="font-medium block mb-1 text-zinc-400">Hero Background</label>
                <input type="text" id="hero-img-input" value="<?= htmlspecialchars($config['images']['hero']) ?>" 
                       class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 rounded-2xl text-xs font-mono">
                <button onclick="updateHeroImage()" class="mt-1.5 px-4 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded-2xl w-full">Update Hero</button>
            </div>
            <div>
                <label class="font-medium block mb-1 text-zinc-400">Profile Photo</label>
                <input type="text" id="profile-img-input" value="<?= htmlspecialchars($config['images']['profile']) ?>" 
                       class="w-full px-3 py-2 bg-zinc-950 border border-zinc-700 rounded-2xl text-xs font-mono">
                <button onclick="updateProfileImage()" class="mt-1.5 px-4 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded-2xl w-full">Update Profile</button>
            </div>
            <div>
                <div class="text-zinc-400 font-medium mb-1">Project Images</div>
                <div class="text-[10px] text-zinc-500">Edit project images in <code>includes/config.php</code> under the <strong>projects</strong> array.</div>
                <div class="mt-3 text-xs">All project images are controlled centrally from PHP config for consistency.</div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>