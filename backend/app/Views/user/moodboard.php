<!--
    Mood Board View
    Data contract: none (static showcase)
    Fonts: Raleway (header), DM Sans (body)
    Colors: #3d5a80, #98c1d9, #e0fbfc, #ee6c4d, #293241
    Tailwind via CDNJS
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mood Board</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Raleway & DM Sans -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <style>
        .font-raleway {
            font-family: 'Raleway', sans-serif;
        }

        .font-dmsans {
            font-family: 'DM Sans', sans-serif;
        }
    </style>
</head>

<?= view('components/header') ?>

<body class="bg-[#e0fbfc] px-4 py-8 min-h-screen">
    <div class="space-y-12 mx-auto max-w-5xl">

        <!-- Color Palette -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Color Palette</h2>
            <div class="flex gap-6">
                <?php

                use function PHPSTORM_META\type;

                $colors = [
                    ['#3d5a80', 'Denim Blue'],
                    ['#98c1d9', 'Pale Cerulean'],
                    ['#e0fbfc', 'Baby Blue'],
                    ['#ee6c4d', 'Burnt Sienna'],
                    ['#293241', 'Gun Metal'],
                ];
                foreach ($colors as [$hex, $name]): ?>
                    <div class="flex flex-col items-center">
                        <div class="shadow-lg border-2 border-white rounded-full w-16 h-16" style="background: <?= $hex ?>"></div>
                        <span class="mt-2 font-dmsans text-[#293241] text-sm"><?= $name ?><br><span class="text-xs"><?= $hex ?></span></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Font Showcase -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Font Showcase</h2>
            <div class="flex md:flex-row flex-col gap-8">
                <div class="flex-1">
                    <div class="font-raleway text-[#3d5a80] text-4xl">Raleway Header Example</div>
                    <div class="mt-2 text-[#293241] text-base">Used for prominent headings and titles.</div>
                </div>
                <div class="flex-1">
                    <div class="font-dmsans text-[#293241] text-lg">DM Sans body text example: <span class="italic">"Clean, modern, and easy to read for paragraphs and UI."</span></div>
                    <div class="mt-2 text-[#293241] text-base">Used for body and supporting text.</div>
                </div>
            </div>
        </section>

        <!-- Buttons (Fragmented Na)-->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Button Samples</h2>
            <div class="flex gap-6">
                <?= view('components/buttons/button', ['primary' => false, 'label' => 'Test']) ?>
                <?= view('components/buttons/button', ['primary' => true, 'label' => 'Another']) ?>
                <?= view('components/buttons/button_2', ['label' => 'Submit', 'variant' => 'submit']) ?>
                <?= view('components/buttons/button_2', ['label' => 'Test', 'variant' => 'home', 'href' => '/', 'icon' => null]) ?>

            </div>
        </section>

        <!-- Simple Cards (Fragmented na)-->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Simple Cards</h2>
            <div class="gap-6 grid grid-cols-1 md:grid-cols-3">
                <?= view('components/cards/card_base', ['label' => 'Test 1', 'img' => '/logo_box.png', 'text' => 'not sample text']) ?>
                <?= view('components/cards/card_base', ['label' => 'Test 2', 'img' => '/logo_box.png', 'text' => 'definitely not just some sample text']) ?>
                <?= view('components/cards/card_base', ['label' => 'Test 3', 'img' => '/logo_box.png', 'text' => 'I swear this is not sample text']) ?>
            </div>
        </section>
        <!-- Modded Cards -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Mod Cards</h2>
            <div class="flex md:flex-row flex-col gap-8 md:grid-cols-2">
                <?= view('components/cards/card_mod', [
                    'title' => 'Create Mod [Original]',
                    'author' => 'simibubi',
                    'desc' => 'An immersive journey through cogs and steam',
                    'image' => '/create_img.jpg',
                    'downloads' => '6,740,000'
                ]) ?>
                <?= view('components/cards/card_mod', [
                    'title' => 'Farmer\s Delight',
                    'author' => 'Vectowring',
                    'desc' => 'All in one Farming Mod for modern minecraft!',
                    'image' => '/fDelight_img.jpg',
                    'downloads' => '6,520,000'
                ]) ?>
                <?= view('components/cards/card_mod', [
                    'title' => 'RLCraft',
                    'author' => 'Shivaxi',
                    'desc' => 'A modpack centered around challenge and realism',
                    'image' => '/rlcraft_img.jpg',
                    'downloads' => '22,000'
                ]) ?>
            </div>

        </section>

        <!-- Logo Cards (Fragmented na)-->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Logo Cards</h2>
            <div class="flex md:flex-row flex-col gap-8 md:grid-cols-2">
                <?= view('components/cards/card_base', ['islogo' => true, 'label' => 'Logo Card', 'img' => '/logo_box.png', 'text' => 'This is a sample card with description text!']) ?>
                <?= view('components/cards/card_base', ['islogo' => true, 'label' => 'Logo Card 2', 'img' => '/logo_horizontal.png', 'text' => 'Might as well try putting something here']) ?>
                <?= view('components/cards/card_base', ['islogo' => true, 'label' => 'Logo Card 2', 'img' => '/logo_horizontal.png', 'text' => 'Might as well try putting something here']) ?>
        </section>
    </div>
    <?= view('components/footer') ?>
</body>

</html>