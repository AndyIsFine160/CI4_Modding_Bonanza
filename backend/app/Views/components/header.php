<header class="bg-petrol/95 shadow-lg">
    <div class="flex justify-between items-center mx-auto px-6 py-4 container">
        <div class="flex items-center gap-2">
            <svg class="w-8 h-8 text-cerulean" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zm0 13v7m0 0l-7-4m7 4l7-4"></path>
            </svg>
            <span class="font-raleway font-bold text-cerulean text-2xl tracking-tight">Modding Bonanza</span>
        </div>
        <nav class="flex gap-6">
            <?= view('components/buttons/button', ['islink' => true, 'label' => 'Home', 'link' => '/']) ?>
            <?= view('components/buttons/button', ['islink' => true, 'label' => 'Sign Up', 'link' => '/signup']) ?>
            <?= view('components/buttons/button', ['islink' => true, 'label' => 'Login', 'link' => '/login']) ?>
        </nav>
    </div>
</header>