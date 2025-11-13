<footer class="bg-petrol/95 mt-12 py-6">
    <div class="flex md:flex-row flex-col justify-between items-center gap-4 mx-auto px-6 container">
        <span class="text-cerulean">&copy; <?= date('Y') ?> Modding Bonanza. All rights reserved.</span>
        <nav class="flex gap-4 text-babyblue text-sm">
            <?= view('components/buttons/button', ['islink' => true, 'label' => 'Mood Board', 'link' => '/mood']) ?>
            <?= view('components/buttons/button', ['islink' => true, 'label' => 'Road Map', 'link' => '/road']) ?>
        </nav>
    </div>
</footer>