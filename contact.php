<?php
// contact.php
$config = include 'includes/config.php';
$personal = $config['personal'];

// Handle form submission (real PHP OOP)
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the OOP handler
    require_once 'includes/ContactFormHandler.php';
    
    $handler = new ContactFormHandler();
    $result = $handler->processSubmission($_POST);
    
    if ($result['success']) {
        $success = true;
    } else {
        $error = $result['error'] ?? 'An error occurred. Please try again.';
    }
}
?>
<?php include 'includes/header.php'; ?>

<!-- CONTACT PAGE -->
<div class="page px-8 pt-9 pb-16">
    <div class="max-w-xl">
        <div>
            <span class="px-3 py-1 text-xs font-semibold tracking-wider bg-zinc-900 border border-zinc-700 text-blue-300 rounded-2xl">LET'S CONNECT</span>
            <h2 class="section-header mt-2">Ready to build something<br>great together?</h2>
        </div>
        
        <div class="mt-6">
            <div class="flex flex-col md:flex-row items-start gap-4">
                <div>
                    <div class="text-xs text-zinc-400">EMAIL</div>
                    <a href="mailto:<?= htmlspecialchars($personal['email']) ?>" class="font-medium text-lg hover:text-blue-300 transition-colors"><?= htmlspecialchars($personal['email']) ?></a>
                </div>
                <div>
                    <div class="text-xs text-zinc-400">PHONE</div>
                    <a href="tel:<?= htmlspecialchars($personal['phone']) ?>" class="font-medium text-lg hover:text-blue-300 transition-colors"><?= htmlspecialchars($personal['phone']) ?></a>
                </div>
            </div>
        </div>
        
        <!-- Contact Form (PHP Backend) -->
        <div class="mt-8 bg-zinc-900 border border-zinc-800 p-7 rounded-3xl">
            <div class="mb-4 flex items-center gap-x-2">
                <span class="php-badge text-xs">PHP 8.3</span>
                <span class="text-xs text-emerald-300 font-medium">Real OOP handler (ContactFormHandler.php)</span>
            </div>
            
            <?php if ($success): ?>
                <div class="bg-emerald-900/30 border border-emerald-700 px-4 py-3 rounded-2xl text-sm">
                    <div class="flex items-center gap-x-3">
                        <i class="fa-solid fa-check-circle text-emerald-400"></i>
                        <div>
                            <span class="font-semibold text-emerald-200">Thank you!</span> 
                            <span class="text-emerald-300 text-xs">Your message has been received. I'll get back to you within 24 hours.</span>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            
                <?php if ($error): ?>
                    <div class="mb-4 bg-red-900/30 border border-red-700 px-4 py-2 rounded-2xl text-sm text-red-300">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
            
                <form method="POST" class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-medium mb-1.5 text-zinc-300">FULL NAME</label>
                            <input type="text" name="name" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" 
                                   class="w-full px-4 py-[10px] bg-zinc-950 border border-zinc-700 focus:border-blue-700 transition-colors outline-none rounded-2xl text-sm" placeholder="Jane Cooper">
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1.5 text-zinc-300">COMPANY / ORGANIZATION</label>
                            <input type="text" name="company" value="<?= htmlspecialchars($_POST['company'] ?? '') ?>" 
                                   class="w-full px-4 py-[10px] bg-zinc-950 border border-zinc-700 focus:border-blue-700 transition-colors outline-none rounded-2xl text-sm" placeholder="Acme Corp">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-xs font-medium mb-1.5 text-zinc-300">EMAIL ADDRESS</label>
                        <input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                               class="w-full px-4 py-[10px] bg-zinc-950 border border-zinc-700 focus:border-blue-700 transition-colors outline-none rounded-2xl text-sm" placeholder="jane@acmecorp.com">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-medium mb-1.5 text-zinc-300">PROJECT DETAILS</label>
                        <textarea name="message" required rows="4" 
                                  class="w-full px-4 py-3 bg-zinc-950 border border-zinc-700 focus:border-blue-700 transition-colors outline-none rounded-3xl text-sm resize-y" 
                                  placeholder="I'm looking for a developer to help with..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="pt-1 flex items-center justify-between">
                        <div class="flex items-center gap-x-2">
                            <input type="checkbox" id="nda" name="nda" class="accent-blue-600">
                            <label for="nda" class="text-xs cursor-pointer text-zinc-400">I agree to a mutual NDA</label>
                        </div>
                        
                        <button type="submit" 
                                class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 transition-colors font-semibold text-sm rounded-3xl flex items-center gap-x-2 shadow-md">
                            <span>Send Message</span>
                            <i class="fa-solid fa-paper-plane text-xs"></i>
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
        
        <div class="px-1 mt-5 flex items-center justify-center gap-x-4 text-xs text-zinc-400">
            <div class="flex items-center">
                <i class="fa-brands fa-linkedin mr-2"></i> 
                <span>LinkedIn</span>
            </div>
            <div>•</div>
            <div class="flex items-center">
                <i class="fa-brands fa-github mr-2"></i> 
                <span>GitHub</span>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>