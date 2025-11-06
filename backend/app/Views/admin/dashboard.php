<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Modding Bonanza</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3d5a80;
            --secondary: #98c1d9;
            --light: #e0fbfc;
            --accent: #ee6c4d;
            --dark: #293241;
        }

        .bg-custom-primary {
            background-color: var(--primary);
        }

        .hover\:bg-custom-dark:hover {
            background-color: var(--dark);
        }

        .text-custom-light {
            color: var(--light);
        }

        .hover\:text-custom-secondary:hover {
            color: var(--secondary);
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-custom-primary shadow-lg">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="font-bold text-custom-light text-xl">Modding Bonanza Admin</span>
                </div>
                <div class="flex items-center space-x-4 text-custom-light">
                    <span>Welcome, Admin</span>
                    <a href="/logout" class="hover:text-custom-secondary">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="mx-auto sm:px-6 lg:px-8 py-6 max-w-7xl">
        <!-- Stats Overview -->
        <div class="gap-4 grid grid-cols-1 md:grid-cols-4 mb-8">
            <div class="bg-white shadow p-6 rounded-lg">
                <h3 class="font-medium text-gray-500 text-sm">Total Users</h3>
                <p class="font-bold text-2xl">1,234</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg">
                <h3 class="font-medium text-gray-500 text-sm">Total Mods</h3>
                <p class="font-bold text-2xl">567</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg">
                <h3 class="font-medium text-gray-500 text-sm">Downloads Today</h3>
                <p class="font-bold text-2xl">89</p>
            </div>
            <div class="bg-white shadow p-6 rounded-lg">
                <h3 class="font-medium text-gray-500 text-sm">Active Users</h3>
                <p class="font-bold text-2xl">45</p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow mb-8 rounded-lg">
            <div class="px-6 py-4 border-gray-200 border-b">
                <h2 class="font-medium text-lg">Quick Actions</h2>
            </div>
            <div class="gap-4 grid grid-cols-1 md:grid-cols-3 p-6">
                <a href="/admin/users" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-white text-center">
                    Manage Users
                </a>
                <a href="/admin/mods" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg text-white text-center">
                    Manage Mods
                </a>
                <a href="/admin/reports" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white text-center">
                    View Reports
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-gray-200 border-b">
                <h2 class="font-medium text-lg">Recent Activity</h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 font-medium text-gray-500 text-xs text-left uppercase tracking-wider">Time</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">New mod uploaded</td>
                                <td class="px-6 py-4 whitespace-nowrap">user123</td>
                                <td class="px-6 py-4 whitespace-nowrap">5 minutes ago</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">User registration</td>
                                <td class="px-6 py-4 whitespace-nowrap">newuser456</td>
                                <td class="px-6 py-4 whitespace-nowrap">10 minutes ago</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Mod downloaded</td>
                                <td class="px-6 py-4 whitespace-nowrap">gamer789</td>
                                <td class="px-6 py-4 whitespace-nowrap">15 minutes ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>