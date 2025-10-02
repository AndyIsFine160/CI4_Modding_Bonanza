<!-- app/Views/user/roadmap.php -->
<!--
    Roadmap List with Opposite-Side Icons
    Color scheme: #3d5a80, #98c1d9, #e0fbfc, #ee64cd, #293241
    Fonts: Raleway (headers), DM Sans (bottom text)
    Data contract: $roadmap = [
        ['title' => string, 'desc' => string, 'icon' => string (SVG or icon class), 'category' => string],
        ...
    ]
-->

<link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=DM+Sans:400,500&display=swap" rel="stylesheet">

<div class="mx-auto py-8 w-full max-w-2xl">
    <h2 class="mb-8 font-bold text-[#3d5a80] text-3xl" style="font-family: 'Raleway', sans-serif;">
        Roadmap
    </h2>
    <ul class="space-y-8">
        <?php foreach ($roadmap as $i => $item): ?>
            <li class="flex justify-between items-center bg-[#e0fbfc] shadow p-6 rounded-lg">
                <?php if ($i % 2 === 0): ?>
                    <!-- Icon left, content right -->
                    <span class="flex flex-shrink-0 justify-center items-center bg-[#98c1d9] rounded-full w-14 h-14">
                        <?= $item['icon'] ?>
                    </span>
                    <div class="flex-1 ml-6 text-right">
                        <h3 class="font-semibold text-[#3d5a80] text-xl" style="font-family: 'Raleway', sans-serif;">
                            <?= esc($item['title']) ?>
                        </h3>
                        <p class="mt-2 text-[#293241]" style="font-family: 'DM Sans', sans-serif;">
                            <?= esc($item['desc']) ?>
                        </p>
                        <span class="inline-block mt-2 px-3 py-1 rounded-full font-medium text-xs" style="background-color: #ee64cd; color: #fff; font-family: 'DM Sans', sans-serif;">
                            <?= esc($item['category']) ?>
                        </span>
                    </div>
                <?php else: ?>
                    <!-- Content left, icon right -->
                    <div class="flex-1 mr-6 text-left">
                        <h3 class="font-semibold text-[#3d5a80] text-xl" style="font-family: 'Raleway', sans-serif;">
                            <?= esc($item['title']) ?>
                        </h3>
                        <p class="mt-2 text-[#293241]" style="font-family: 'DM Sans', sans-serif;">
                            <?= esc($item['desc']) ?>
                        </p>
                        <span class="inline-block mt-2 px-3 py-1 rounded-full font-medium text-xs" style="background-color: #ee64cd; color: #fff; font-family: 'DM Sans', sans-serif;">
                            <?= esc($item['category']) ?>
                        </span>
                    </div>
                    <span class="flex flex-shrink-0 justify-center items-center bg-[#98c1d9] rounded-full w-14 h-14">
                        <?= $item['icon'] ?>
                    </span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="mt-10 text-[#293241] text-sm text-center" style="font-family: 'DM Sans', sans-serif;">
        Stay tuned for more updates on our journey!
    </div>
</div>