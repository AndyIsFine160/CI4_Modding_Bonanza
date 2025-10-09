<?php
// app/Views/components/buttons/button_2.php

/**
 * Button Components
 * 
 * Data contract:
 * - $label (string): Button text (required)
 * - $type (string): Button type: 'button', 'submit', etc. (default: 'button')
 * - $variant (string): 'oval', 'rounded', 'submit', 'home' (default: 'oval')
 * - $href (string|null): If set, renders as <a> link (optional, for 'home')
 * - $icon (string|null): SVG icon HTML (optional, for 'home')
 */

// Defaults
$label   = $label   ?? 'Button';
$type    = $type    ?? 'button';
$variant = $variant ?? 'oval';
$href    = $href    ?? null;
$icon    = $icon    ?? null;

// Tailwind classes per variant
$variants = [
    'oval'    => 'px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition',
    'rounded' => 'px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition',
    'submit'  => 'px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition',
    'home'    => 'flex items-center border-[#ee6c4d] px-5 py-2 bg-gray-100 text-gray-800 rounded-full hover:bg-gray-200 transition'
];

$class = $variants[$variant] ?? $variants['oval'];

// Render as <a> for home button with href, else <button>
if ($variant === 'home' && $href):
?>
    <a href="<?= esc($href) ?>" class="<?= $class ?>">
        <?php if ($icon): ?>
            <span class="mr-2"><?= $icon ?></span>
        <?php else: ?>
            <!-- Default Home SVG Icon -->
            <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-4 0h4"></path>
            </svg>
        <?php endif; ?>
        <?= esc($label) ?>
    </a>
<?php else: ?>
    <button type="<?= esc($variant === 'submit' ? 'submit' : $type) ?>" class="<?= $class ?>">
        <?= esc($label) ?>
    </button>
<?php endif; ?>

<!--
Component Usage Examples:

view('components/buttons/button_2', ['label' => 'Oval', 'variant' => 'oval']) ?>
view('components/buttons/button_2', ['label' => 'Rounded', 'variant' => 'rounded']) ?>
view('components/buttons/button_2', ['label' => 'Submit', 'variant' => 'submit']) ?>
view('components/buttons/button_2', ['label' => 'Home', 'variant' => 'home', 'href' => '/', 'icon' => null]) ?> 

Data contract:
- $label: string (required)
- $variant: 'oval'|'rounded'|'submit'|'home'
- $href: string|null (for 'home')
- $icon: string|null (optional SVG for 'home')
-->