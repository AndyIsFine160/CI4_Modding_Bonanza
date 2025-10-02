<!-- app/Views/user/landing.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modding Bonanza - Discover & Share Mods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts: Raleway & DM Sans -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Raleway:wght@700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="theme-color" content="#3d5a80">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        raleway: ['Raleway', 'sans-serif'],
                        dmsans: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        denim: '#3d5a80',
                        cerulean: '#98c1d9',
                        babyblue: '#e0fbfc',
                        sienna: '#ee6c4d',
                        petrol: '#293241',
                    }
                }
            }
        }
    </script>
    <style>
        /* Fallback for non-Tailwind elements */
        body {
            font-family: 'DM Sans', Arial, sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Raleway', Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-denim min-h-screen font-dmsans text-babyblue">

    <!-- Header -->
    <header class="bg-petrol/95 shadow-lg">
        <div class="flex justify-between items-center mx-auto px-6 py-4 container">
            <div class="flex items-center gap-2">
                <svg class="w-8 h-8 text-cerulean" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zm0 13v7m0 0l-7-4m7 4l7-4"></path>
                </svg>
                <span class="font-raleway font-bold text-cerulean text-2xl tracking-tight">Modding Bonanza</span>
            </div>
            <nav class="flex gap-6">
                <a href="#" class="hover:text-sienna transition">Home</a>
                <a href="/signup" class="hover:text-sienna transition">Sign Up</a>
                <a href="/login" class="hover:text-sienna transition">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="flex md:flex-row flex-col items-center gap-12 mx-auto px-6 py-16 container">
        <div class="flex-1">
            <h1 class="drop-shadow-lg mb-4 font-raleway font-extrabold text-babyblue text-4xl md:text-5xl">
                Discover, Share, and Download <span class="text-sienna">Game Mods</span>
            </h1>
            <p class="mb-8 text-cerulean text-lg">
                The open platform for modders and gamers. Browse trending mods, upload your creations, and join a vibrant community.
            </p>
            <form class="flex gap-2 max-w-lg">
                <input
                    type="text"
                    placeholder="Search mods..."
                    class="flex-1 bg-babyblue px-4 py-2 rounded-l-md focus:outline-none font-dmsans text-petrol placeholder-cerulean">
                <button
                    type="submit"
                    class="bg-sienna hover:bg-denim px-5 py-2 rounded-r-md font-dmsans font-semibold text-babyblue transition">
                    Search
                </button>
            </form>
        </div>
        <div class="flex flex-1 justify-center">
            <img src=""
                alt="Modding Bonanza Logo"
                class="bg-petrol/30 drop-shadow-xl border-4 border-cerulean/30 rounded-xl w-80 h-80 object-contain"
                loading="lazy">
        </div>
    </section>

    <!-- Trending Mods -->
    <section class="mx-auto px-6 py-10 container">
        <h2 class="mb-6 font-raleway font-bold text-babyblue text-2xl">Trending Mods</h2>
        <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
            <?php
            // $mods = [...]; // Example: fetch from controller/service
            $mods = [
                [
                    'title' => 'THE CREATE MOD',
                    'author' => 'simibubi',
                    'desc' => 'YES! IT IS THE CREATE MOD! The one and only CREATE MOD!',
                    'image' => 'https://rocketnode.com/img/blog42photo1.png',
                    'downloads' => 6.74e6,
                ],
                [
                    'title' => 'Farmer\'s Delight',
                    'author' => 'Vectowring',
                    'desc' => 'All in one farming mod ',
                    'image' => 'https://i.tlauncher.org/images/farmers-delight-mod.jpg',
                    'downloads' => 6.52e6,
                ],
                [
                    'title' => 'RLCraft',
                    'author' => 'Shivaxi',
                    'desc' => 'A modpack centered around challenge and realism',
                    'image' => 'https://i.imgur.com/MzWz0e4.png',
                    'downloads' => 22000,
                ],
            ];
            foreach ($mods as $mod): ?>
                <div class="flex flex-col bg-denim/80 shadow-lg rounded-lg overflow-hidden">
                    <img src="<?= esc($mod['image']) ?>" alt="<?= esc($mod['title']) ?>"
                        class="bg-petrol/50 w-full h-40 object-cover">
                    <div class="flex flex-col flex-1 p-5">
                        <h3 class="mb-1 font-raleway font-semibold text-sienna text-xl"><?= esc($mod['title']) ?></h3>
                        <span class="mb-2 text-cerulean text-sm">by <?= esc($mod['author']) ?></span>
                        <p class="flex-1 text-babyblue"><?= esc($mod['desc']) ?></p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-cerulean text-xs"><?= number_format($mod['downloads']) ?> downloads</span>
                            <a href="#" class="bg-sienna hover:bg-denim px-3 py-1 rounded font-dmsans font-medium text-babyblue text-sm transition">View</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="mx-auto px-6 py-12 text-center container">
        <h2 class="mb-4 font-raleway font-bold text-babyblue text-2xl">Ready to share your own mod?</h2>
        <p class="mb-6 text-cerulean">Join our community and help shape the future of gaming mods.</p>
        <a href="#" class="inline-block bg-denim hover:bg-sienna shadow-lg px-8 py-3 rounded-lg font-dmsans font-semibold text-babyblue transition">
            Upload Your Mod
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-petrol/95 mt-12 py-6">
        <div class="flex md:flex-row flex-col justify-between items-center gap-4 mx-auto px-6 container">
            <span class="text-cerulean">&copy; <?= date('Y') ?> Modding Bonanza. All rights reserved.</span>
            <nav class="flex gap-4 text-babyblue text-sm">
                <a href="#" class="hover:text-sienna">About</a>
                <a href="#" class="hover:text-sienna">Mood Board</a>
                <a href="#" class="hover:text-sienna">Road Map</a>
            </nav>
        </div>
    </footer>
</body>

</html>