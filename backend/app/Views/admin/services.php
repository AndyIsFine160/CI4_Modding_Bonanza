<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mod Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#3d5a80',
                        'blue-light': '#98c1d9',
                        'mint': '#e0fbfc',
                        'coral': '#ee6c4d',
                        'dark': '#293241'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-mint min-h-screen">
    <?= view('components/header') ?>

    <main class="mx-auto px-4 py-8 container">
        <div class="bg-white shadow-lg p-6 rounded-lg">
            <h1 class="mb-6 font-bold text-dark text-3xl">Mod Management</h1>

            <!-- Search and Filter Section -->
            <div class="flex gap-4 mb-6">
                <input type="text"
                    placeholder="Search mods..."
                    class="flex-1 p-2 border border-blue-light rounded-md focus:outline-none focus:ring-2 focus:ring-navy">
                <button class="bg-navy hover:bg-opacity-90 px-4 py-2 rounded-md text-white">
                    Search
                </button>
                <button class="bg-coral hover:bg-opacity-90 px-4 py-2 rounded-md text-white">
                    Add New Mod
                </button>
            </div>

            <!-- Mods Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="p-3 text-left">Mod Name</th>
                            <th class="p-3 text-left">Author</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Last Updated</th>
                            <th class="p-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample rows - replace with actual data -->
                        <tr class="hover:bg-mint border-blue-light border-b">
                            <td class="p-3">Enhanced Graphics Pack</td>
                            <td class="p-3">JohnDoe</td>
                            <td class="p-3"><span class="bg-green-500 px-2 py-1 rounded-full text-white text-sm">Active</span></td>
                            <td class="p-3">2023-10-15</td>
                            <td class="p-3">
                                <button class="mr-2 text-navy hover:text-blue-light">Edit</button>
                                <button class="text-coral hover:text-red-700">Delete</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-mint border-blue-light border-b">
                            <td class="p-3">Custom UI Pack</td>
                            <td class="p-3">JaneSmith</td>
                            <td class="p-3"><span class="bg-yellow-500 px-2 py-1 rounded-full text-white text-sm">Pending</span></td>
                            <td class="p-3">2023-10-14</td>
                            <td class="p-3">
                                <button class="mr-2 text-navy hover:text-blue-light">Edit</button>
                                <button class="text-coral hover:text-red-700">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6">
                <div class="text-dark text-sm">
                    Showing 1-10 of 24 entries
                </div>
                <div class="flex gap-2">
                    <button class="hover:bg-navy px-3 py-1 border border-navy rounded text-navy hover:text-white">Previous</button>
                    <button class="bg-navy px-3 py-1 rounded text-white">1</button>
                    <button class="hover:bg-navy px-3 py-1 border border-navy rounded text-navy hover:text-white">2</button>
                    <button class="hover:bg-navy px-3 py-1 border border-navy rounded text-navy hover:text-white">3</button>
                    <button class="hover:bg-navy px-3 py-1 border border-navy rounded text-navy hover:text-white">Next</button>
                </div>
            </div>
        </div>
    </main>

    <?= view('components/footer') ?>
</body>

</html>