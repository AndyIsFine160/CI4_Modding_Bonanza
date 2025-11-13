<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        .header-font {
            font-family: 'Raleway', sans-serif;
        }

        .body-font {
            font-family: 'DM Sans', sans-serif;
        }

        :root {
            --navy-blue: #3d5a80;
            --light-blue: #98c1d9;
            --ice-blue: #e0fbfc;
            --coral: #ee6c4d;
            --dark-blue: #293241;
        }
    </style>
</head>

<body class="bg-gray-50 body-font">
    <?= view('components/header') ?>
    <div class="mx-auto px-4 py-8 container">
        <h1 class="mb-6 font-bold text-3xl header-font" style="color: #293241;">
            Mod Upload Requests
        </h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #3d5a80;" class="header-font">
                            <th class="px-6 py-3 font-semibold text-white text-xs text-left uppercase tracking-wider">
                                Request ID
                            </th>
                            <th class="px-6 py-3 font-semibold text-white text-xs text-left uppercase tracking-wider">
                                Mod Name
                            </th>
                            <th class="px-6 py-3 font-semibold text-white text-xs text-left uppercase tracking-wider">
                                Requester
                            </th>
                            <th class="px-6 py-3 font-semibold text-white text-xs text-left uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 font-semibold text-white text-xs text-left uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($requests ?? [] as $request): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm whitespace-nowrap" style="color: #293241;">
                                    #<?= esc($request['id'] ?? '') ?>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap" style="color: #293241;">
                                    <?= esc($request['mod_name'] ?? '') ?>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap" style="color: #293241;">
                                    <?= esc($request['requester_name'] ?? '') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        <?php
                                        $status = $request['status'] ?? '';
                                        if ($status === 'Approved') {
                                            echo 'bg-green-100 text-green-800';
                                        } elseif ($status === 'Pending') {
                                            echo 'bg-yellow-100 text-yellow-800';
                                        } elseif ($status === 'Rejected') {
                                            echo 'bg-red-100 text-red-800';
                                        }
                                        ?>">
                                        <?= esc($status) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <button class="bg-[#98c1d9] hover:bg-[#3d5a80] mr-2 px-3 py-1 rounded font-medium text-white">
                                        View
                                    </button>
                                    <?php if ($status === 'Pending'): ?>
                                        <button class="bg-[#ee6c4d] hover:bg-[#293241] px-3 py-1 rounded font-medium text-white">
                                            Review
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 sm:px-6 py-3 border-gray-200 border-t">
                <div class="flex justify-between items-center">
                    <div class="sm:hidden flex flex-1 justify-between">
                        <a href="#" class="inline-flex relative items-center px-4 py-2 rounded-md font-medium text-white text-sm" style="background-color: #3d5a80;">
                            Previous
                        </a>
                        <a href="#" class="inline-flex relative items-center ml-3 px-4 py-2 rounded-md font-medium text-white text-sm" style="background-color: #3d5a80;">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('components/footer') ?>
</body>

</html>