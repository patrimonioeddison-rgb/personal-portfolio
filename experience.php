<?php
// experience.php
$config = include 'includes/config.php';
$experience = $config['experience'];
?>
<?php include 'includes/header.php'; ?>

<!-- EXPERIENCE PAGE -->
<div class="page px-8 pt-9 pb-14 max-w-4xl">
    <div class="mb-8">
        <span class="px-3 py-1 text-xs font-semibold tracking-wider bg-zinc-900 border border-zinc-700 text-blue-300 rounded-2xl">CAREER</span>
        <h2 class="section-header mt-1.5">Professional Journey</h2>
    </div>
    
    <div class="space-y-6" id="experience-timeline">
        <?php foreach ($experience as $index => $exp): ?>
        <div class="timeline-item flex gap-5">
            <div class="flex-shrink-0 w-8 pt-1">
                <div class="w-8 h-8 bg-zinc-800 border border-zinc-700 flex items-center justify-center rounded-2xl text-xs font-extrabold text-blue-300">
                    <?= $index + 1 ?>
                </div>
            </div>
            
            <div class="flex-1 pb-4">
                <div class="flex items-baseline justify-between">
                    <div>
                        <h4 class="font-extrabold text-xl tracking-tight"><?= htmlspecialchars($exp['role']) ?></h4>
                        <div class="font-medium"><?= htmlspecialchars($exp['company']) ?> <span class="text-xs text-zinc-400 font-normal">— <?= htmlspecialchars($exp['location']) ?></span></div>
                    </div>
                    <div class="text-xs font-semibold px-3 py-1 bg-zinc-900 border border-zinc-700 text-zinc-300 rounded-3xl whitespace-nowrap"><?= htmlspecialchars($exp['period']) ?></div>
                </div>
                
                <div class="mt-3 text-sm text-zinc-300">
                    <?= htmlspecialchars($exp['description']) ?>
                </div>
                
                <div class="mt-3 flex flex-wrap gap-2">
                    <?php foreach ($exp['highlights'] as $highlight): ?>
                        <span class="text-xs px-3 py-1 bg-zinc-800 border border-zinc-700 rounded-[2.1rem]"><?= htmlspecialchars($highlight) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="mt-8 bg-zinc-900 border border-zinc-800 rounded-3xl p-5">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-semibold">Education</div>
                <div class="text-sm text-zinc-400">B.S. Computer Science • Stanford University</div>
            </div>
            <div class="text-xs px-3 py-1.5 bg-zinc-800 rounded-2xl text-center">
                <div class="font-semibold">2016</div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>