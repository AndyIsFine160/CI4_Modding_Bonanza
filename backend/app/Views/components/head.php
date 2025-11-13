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