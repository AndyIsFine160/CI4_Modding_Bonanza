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

<body class="bg-[#e0fbfc] px-4 py-8 min-h-screen">
    <div class="space-y-12 mx-auto max-w-5xl">

        <!-- Color Palette -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Color Palette</h2>
            <div class="flex gap-6">
                <?php
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

        <!-- Buttons -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Buttons</h2>
            <div class="flex gap-6">
                <button class="bg-[#e0fbfc] hover:bg-[#98c1d9] shadow px-6 py-2 border-[#3d5a80] border-2 rounded-lg font-raleway text-[#293241] transition">Primary</button>
                <button class="bg-[#ee6c4d] hover:bg-[#3d5a80] shadow px-6 py-2 border-[#ee6c4d] border-2 hover:border-[#3d5a80] rounded-lg font-raleway text-white transition">Accent</button>
            </div>
        </section>

        <!-- Simple Cards -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Simple Cards</h2>
            <div class="gap-6 grid grid-cols-1 md:grid-cols-3">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div class="flex flex-col items-center bg-[#e0fbfc] shadow-lg p-6 border border-[#98c1d9] rounded-xl">
                        <div class="mb-2 font-raleway text-[#3d5a80] text-xl">Card Title <?= $i ?></div>
                        <div class="font-dmsans text-[#293241] text-base text-center">This is a simple card example. Use for features, highlights, or quick info.</div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>

        <!-- Logo Cards -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Logo Cards</h2>
            <div class="flex md:flex-row flex-col gap-8">
                <?php
                $logos = [
                    ['https://upload.wikimedia.org/wikipedia/commons/a/a7/React-icon.svg', 'React Logo'],
                    ['https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png', 'JavaScript Logo'],
                ];
                foreach ($logos as [$img, $label]): ?>
                    <div class="flex flex-col items-center bg-[#e0fbfc] shadow-lg p-6 border border-[#98c1d9] rounded-xl w-full md:w-1/2">
                        <img src="<?= $img ?>" alt="<?= $label ?>" class="mb-4 w-20 h-20 object-contain">
                        <div class="mb-1 font-raleway text-[#3d5a80] text-lg"><?= $label ?></div>
                        <div class="font-dmsans text-[#293241] text-sm text-center">A sample logo card with supporting text using DM Sans for clarity and style.</div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Road Map -->
        <section>
            <h2 class="mb-4 font-raleway text-[#293241] text-3xl">Road Map</h2>
            <div class="space-y-6">
                <?php
                $roadmap = [
                    ['Design', 'UI/UX', '#ee6c4d'],
                    ['Development', 'Backend', '#3d5a80'],
                    ['Testing', 'QA', '#98c1d9'],
                    ['Deployment', 'Ops', '#293241'],
                ];
                foreach ($roadmap as $step): ?>
                    <div class="flex justify-between items-center bg-white shadow border-l-8 rounded-lg" style="border-color: <?= $step[2] ?>;">
                        <div class="flex-1 p-4">
                            <div class="font-raleway text-[#293241] text-xl"><?= $step[0] ?></div>
                        </div>
                        <div class="ml-4 px-4 py-2 rounded-full font-dmsans text-white text-sm" style="background: <?= $step[2] ?>;">
                            <?= $step[1] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
</body>

</html>