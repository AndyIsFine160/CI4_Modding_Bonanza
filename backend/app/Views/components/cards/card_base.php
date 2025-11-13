<?php
if ($islogo ?? false) :
?>
    <div class="flex flex-col items-center bg-[#e0fbfc] shadow-lg p-6 border border-[#98c1d9] rounded-xl w-full md:w-1/2">
        <img src="<?= $img ?>" alt="<?= $label ?>" class="mb-4 w-20 h-20 object-contain">
        <div class="mb-1 font-raleway text-[#3d5a80] text-lg"><?= $label ?></div>
        <div class="font-dmsans text-[#293241] text-sm text-center"><?= $text ?>
        </div>
    </div>

<?php else :
?>
    <div class="flex flex-col items-center bg-[#e0fbfc] shadow-lg p-6 border border-[#98c1d9] rounded-xl">
        <div class="mb-2 font-raleway text-[#3d5a80] text-xl"><?= $label ?></div>
        <div class="font-dmsans text-[#293241] text-base text-center"><?= $text ?>
        </div>
    </div>

<?php endif; ?>