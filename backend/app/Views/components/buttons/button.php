<?php if ($primary ?? false) : ?> <!-- Primary Type Button -->
    <button class="bg-[#e0fbfc] hover:bg-[#98c1d9] shadow px-6 py-2 border-[#3d5a80] border-2 rounded-lg font-raleway text-[#293241] transition">
        <?= esc($label ?? 'Primary') ?>
    </button>
<?php elseif ($islink ?? false) : ?> <!-- Link Type Button A -->
    <a href="<?= $link ?>" class="hover:text-sienna transition"><?= esc($label ?? 'Placeholder') ?></a>

<?php else : ?> <!-- Accent Type Button -->
    <button class="bg-[#ee6c4d] hover:bg-[#3d5a80] shadow px-6 py-2 border-[#ee6c4d] border-2 hover:border-[#3d5a80] rounded-lg font-raleway text-white transition">
        <?= esc($label ?? 'Accent') ?>
    </button>
<?php endif; ?>