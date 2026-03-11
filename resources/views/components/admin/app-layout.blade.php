<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Dashboard - System Information</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#226336",
                        "background-light": "#f6f8f7",
                        "background-dark": "#141e17",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-admin.navbar />
        <!-- Main Content -->
        <main class="flex-1 ml-64 min-h-screen flex flex-col">
            <!-- Topbar -->
            <header
                class="h-16 bg-white dark:bg-background-dark/50 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between px-8 sticky top-0 z-40 backdrop-blur-md">
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg text-slate-600 dark:text-slate-400">
                        <span class="material-symbols-outlined">menu_open</span>
                    </button>
                    <h1 class="text-lg font-bold text-slate-800 dark:text-slate-100">Dashboard Overview</h1>
                </div>
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <button class="p-2 text-slate-500 hover:text-primary transition-colors">
                            <span class="material-symbols-outlined">notifications</span>
                            <span
                                class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>
                    </div>
                    <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-2"></div>
                    <div class="flex items-center gap-3 cursor-pointer group">
                        <span
                            class="text-sm font-medium text-slate-700 dark:text-slate-300 group-hover:text-primary">Admin
                            User</span>
                        <div
                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center overflow-hidden border border-primary/20">
                            <img alt="Profile" data-alt="Small avatar of the admin user"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZzZxcFQ6z7ICw-CJ1kpw5ZsMPu0JexRHDzjZrK9o3i--4thATvAPQ5lKHJGJxPiIOlCl27SHnp0XTwf6wt5jcb5hwKlP7jeRm4QF2NVOctq9ATz6x6CB_zMTne61RRmc-4eBpWcdB8XQzy-yQQrbUmFuxK9EDiLTkjDjX5A2-3eTPhbw4dajBFj3GnLkyzCqSCQVVsZgrAzVWdUkSKzFTqsRWhgXYbjU3LJPRsz-VzMgnNVsg94fBTcH4-UWyWc70UoaOIYSqf2g" />
                        </div>
                        <span class="material-symbols-outlined text-slate-400">expand_more</span>
                    </div>
                </div>
            </header>
            <!-- Dashboard Content -->
                {{ $slot }}
            <!-- Footer -->
            <x-admin.footer />
        </main>
    </div>
</body>

</html>
