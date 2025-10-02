<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up | Modding Bonanza</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Raleway & DM Sans -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=Raleway:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --denim-blue: #3d5a80;
            --pale-cerulean: #98c1d9;
            --baby-blue: #e0fbfc;
            --burnt-sienna: #ee6c4d;
            --gun-metal: #293241;
        }

        body {
            font-family: 'DM Sans', Arial, sans-serif;
            background: var(--denim-blue);
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

<body class="flex justify-center items-center bg-[var(--denim-blue)] min-h-screen">
    <div class="bg-white shadow-lg p-8 border border-[var(--pale-cerulean)] rounded-xl w-full max-w-md">
        <h1 class="mb-2 font-bold text-[var(--denim-blue)] text-3xl text-center">Login</h1>
        <p class="mb-6 text-[var(--gun-metal)] text-center">Join <span class="font-semibold text-[var(--burnt-sienna)]">Modding Bonanza</span> today!</p>
        <form method="post" action="<?= site_url('auth/signup') ?>" class="space-y-4">
            <div>
                <label for="username" class="block mb-1 font-medium text-[var(--denim-blue)] text-sm">Username or Email</label>
                <input type="text" id="username" name="username" required
                    class="bg-[var(--baby-blue)] px-4 py-2 border border-[var(--pale-cerulean)] rounded-lg focus:outline-none focus:ring-[var(--denim-blue)] focus:ring-2 w-full text-[var(--gun-metal)]" />
            </div>
            <div>
                <label for="password" class="block mb-1 font-medium text-[var(--denim-blue)] text-sm">Password</label>
                <input type="password" id="password" name="password" required
                    class="bg-[var(--baby-blue)] px-4 py-2 border border-[var(--pale-cerulean)] rounded-lg focus:outline-none focus:ring-[var(--denim-blue)] focus:ring-2 w-full text-[var(--gun-metal)]" />
            </div>
            <button type="submit"
                class="bg-[var(--denim-blue)] hover:bg-[var(--burnt-sienna)] mt-2 py-2 rounded-lg w-full font-bold text-white transition-colors">
                Login
            </button>
        </form>
    </div>
</body>

</html>