<!-- app/Views/user/landing.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modding Bonanza - Discover & Share Mods</title>
    <?= view('components/head') ?>

<body class="bg-denim min-h-screen font-dmsans text-babyblue">

    <!-- Header (Fragmented Na)-->
    <?= view('components/header') ?>

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
            <img src="/logo_box.png"
                alt="Modding Bonanza Logo"
                class="bg-petrol/30 drop-shadow-xl border-4 border-cerulean/30 rounded-xl w-80 h-80 object-contain"
                loading="lazy">
        </div>
    </section>

    <!-- Trending Mods / Modded Cards -->
    <section class="mx-auto px-6 py-10 container">
        <h2 class="mb-6 font-raleway font-bold text-babyblue text-2xl">Trending Mods</h2>
        <div class="gap-8 grid grid-cols-1 md:grid-cols-3">
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
                'image' => '/create_img.jpg',
                'downloads' => '6,520,000'
            ]) ?>
            <?= view('components/cards/card_mod', [
                'title' => 'RLCraft',
                'author' => 'Shivaxi',
                'desc' => 'A modpack centered around challenge and realism',
                'image' => '/create_img.jpg',
                'downloads' => '22,000'
            ]) ?>
    </section>

    <!-- Call to Action (Fragmented Na)-->
    <?= view('components/cta') ?>

    <!-- Footer (Fragmented Na)-->
    <?= view('components/footer') ?>
</body>

</html>