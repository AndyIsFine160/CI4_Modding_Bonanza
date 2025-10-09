<div class="flex flex-col bg-denim/80 shadow-lg rounded-lg overflow-hidden">
    <img src="<?= $image ?>" alt="<?= $title ?>"
        class="bg-petrol/50 w-full h-40 object-cover">
    <div class="flex flex-col flex-1 p-5">
        <h3 class="mb-1 font-raleway font-semibold text-sienna text-xl"><?= $title ?></h3>
        <span class="mb-2 text-cerulean text-sm">by <?= $author ?></span>
        <p class="flex-1 text-babyblue"><?= $desc ?></p>
        <div class="flex justify-between items-center mt-4">
            <span class="text-cerulean text-xs"><?= $downloads ?> downloads</span>
            <!-- Should be view('component/button') -->
            <a href="#" class="bg-sienna hover:bg-denim px-3 py-1 rounded font-dmsans font-medium text-babyblue text-sm transition">View</a>
        </div>
    </div>
</div>