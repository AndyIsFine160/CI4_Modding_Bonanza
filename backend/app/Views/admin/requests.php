<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modding Bonanza - Upload Request</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #3d5a80;
            --blue: #98c1d9;
            --ice: #e0fbfc;
            --coral: #ee6c4d;
            --dark: #293241;
        }

        .font-raleway {
            font-family: 'Raleway', sans-serif;
        }

        .font-dm-sans {
            font-family: 'DM Sans', sans-serif;
        }

        .bg-navy {
            background-color: var(--navy);
        }

        .bg-blue {
            background-color: var(--blue);
        }

        .bg-ice {
            background-color: var(--ice);
        }

        .bg-coral {
            background-color: var(--coral);
        }

        .bg-dark {
            background-color: var(--dark);
        }

        .text-navy {
            color: var(--navy);
        }

        .text-coral {
            color: var(--coral);
        }

        .text-dark {
            color: var(--dark);
        }

        .border-navy {
            border-color: var(--navy);
        }
    </style>
</head>

<body class="bg-ice font-dm-sans">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-dark py-6">
            <div class="mx-auto px-4 container">
                <h1 class="font-raleway font-bold text-ice text-3xl">Modding Bonanza</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="mx-auto px-4 py-8 container">
            <div class="bg-white shadow-lg mx-auto p-6 rounded-lg max-w-3xl">
                <h2 class="mb-6 font-raleway font-semibold text-navy text-2xl">Mod Upload Request</h2>

                <form action="/admin/submit-request" method="POST" enctype="multipart/form-data">
                    <!-- Mod Title -->
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-dark" for="mod_title">Mod Title</label>
                        <input type="text" id="mod_title" name="mod_title" class="px-4 py-2 border border-blue focus:border-navy rounded focus:outline-none w-full" required>
                    </div>

                    <!-- Mod Description -->
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-dark" for="mod_description">Description</label>
                        <textarea id="mod_description" name="mod_description" rows="4" class="px-4 py-2 border border-blue focus:border-navy rounded focus:outline-none w-full" required></textarea>
                    </div>

                    <!-- Mod Category -->
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-dark" for="mod_category">Category</label>
                        <select id="mod_category" name="mod_category" class="px-4 py-2 border border-blue focus:border-navy rounded focus:outline-none w-full" required>
                            <option value="">Select a category</option>
                            <option value="gameplay">Gameplay</option>
                            <option value="graphics">Graphics</option>
                            <option value="audio">Audio</option>
                            <option value="utilities">Utilities</option>
                        </select>
                    </div>

                    <!-- Mod File -->
                    <div class="mb-6">
                        <label class="block mb-2 font-medium text-dark" for="mod_file">Mod File</label>
                        <input type="file" id="mod_file" name="mod_file" class="px-4 py-2 border border-blue focus:border-navy rounded focus:outline-none w-full" required>
                        <p class="mt-1 text-gray-600 text-sm">Supported formats: .zip, .rar (Max size: 100MB)</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-coral hover:bg-opacity-90 px-6 py-2 rounded font-medium text-white transition duration-300">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>