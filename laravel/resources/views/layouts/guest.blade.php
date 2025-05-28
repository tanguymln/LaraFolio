<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $siteName }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet" />

    <!-- Scripts -->
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body class="font-sans text-gray-900 antialiased overflow-x-hidden">
    <div class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">

        <header class="container mx-auto flex justify-between items-center">
            @include("layouts.header")
        </header>

        <main class="w-full grow">
            @yield("content")
        </main>

        <footer>
            @include("layouts.footer")
        </footer>
    </div>
    </div>

    @yield("modals")
    @yield("scripts")

    <script>
        const toggleDarkModeButton = document.getElementById('toggle-dark-mode');
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme === 'dark') {
            document.body.classList.add('dark');
        }

        toggleDarkModeButton.addEventListener('click', () => {
            document.body.classList.toggle('dark');

            if (document.body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>

</html>
