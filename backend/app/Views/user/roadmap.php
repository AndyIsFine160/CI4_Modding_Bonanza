<?php
// app/Views/user/roadmap.php
// Data contract: $goals = array of ['title' => string, 'description' => string, 'icon' => string (SVG markup)]
$goals = [
    [
        'title' => 'User Authentication',
        'description' => 'Implement secure registration, login, and password reset for all users.',
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="#3d5a80" stroke-width="2" viewBox="0 0 24 24"><path d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3zm0 2c-2.67 0-8 1.337-8 4v3h16v-3c0-2.663-5.33-4-8-4z"/></svg>',
    ],
    [
        'title' => 'Modding Submission System',
        'description' => 'Allow users to submit, browse, and manage game mods with file uploads.',
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="#ee6c4d" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>',
    ],
    [
        'title' => 'Admin Dashboard',
        'description' => 'Provide admins with tools to moderate content, manage users, and view analytics.',
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="#293241" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
    ],
    [
        'title' => 'Responsive Design',
        'description' => 'Ensure the website is fully responsive and accessible on all devices.',
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="#e0fbfc" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 3h-8"/></svg>',
    ],
];
?>

<!-- Google Fonts: Raleway and DM Sans -->
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=Raleway:wght@700;900&display=swap" rel="stylesheet">
<!-- Tailwind CDN for utility classes -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<style>
    :root {
        --primary: #3d5a80;
        --secondary: #98c1d9;
        --background: #e0fbfc;
        --accent: #ee6c4d;
        --dark: #293241;
    }

    body,
    html {
        background: var(--background);
    }

    .roadmap-section {
        background: linear-gradient(135deg, var(--background) 0%, #fff 100%);
        min-height: 100vh;
    }

    .roadmap-header {
        color: var(--primary);
        font-family: 'Raleway', sans-serif;
        letter-spacing: 0.02em;
    }

    .roadmap-subtitle {
        color: var(--secondary);
        font-family: 'DM Sans', sans-serif;
    }

    .roadmap-card {
        background: #fff;
        border-left: 6px solid var(--primary);
        box-shadow: 0 4px 16px 0 rgba(61, 90, 128, 0.07);
        transition: box-shadow 0.2s;
    }

    .roadmap-card:hover {
        box-shadow: 0 8px 32px 0 rgba(61, 90, 128, 0.15);
        border-left-color: var(--accent);
    }

    .roadmap-step {
        background: var(--secondary);
        color: var(--dark);
        font-family: 'Raleway', sans-serif;
    }

    .roadmap-title {
        color: var(--primary);
        font-family: 'Raleway', sans-serif;
    }

    .roadmap-desc {
        color: var(--dark);
        font-family: 'DM Sans', sans-serif;
    }
</style>

<section class="py-16 roadmap-section">
    <div class="mx-auto px-4 max-w-4xl">
        <h2 class="mb-4 font-extrabold text-4xl text-center tracking-tight roadmap-header">Website Road Map</h2>
        <p class="mb-12 text-lg text-center roadmap-subtitle">Our journey to building the ultimate modding community platform</p>
        <ol class="space-y-8">
            <?php foreach ($goals as $i => $goal): ?>
                <li class="group relative flex items-start p-6 rounded-xl roadmap-card">
                    <div class="flex-shrink-0 mr-4">
                        <?= $goal['icon'] ?>
                    </div>
                    <div>
                        <h3 class="mb-1 font-semibold text-xl roadmap-title">
                            <span class="inline-block mr-2 px-3 py-0.5 rounded-full font-bold text-sm align-middle roadmap-step"><?= $i + 1 ?></span>
                            <?= esc($goal['title']) ?>
                        </h3>
                        <p class="roadmap-desc"><?= esc($goal['description']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>