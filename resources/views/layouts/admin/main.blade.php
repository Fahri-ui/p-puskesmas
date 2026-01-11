<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - Puskesmas Binong')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-open {
            width: 16rem;
        }
        .sidebar-closed {
            width: 0;
        }
        .transition-width {
            transition: width 0.3s ease-in-out;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    @include('components.flash-message')

    <div class="flex h-screen overflow-hidden">
        @include('layouts.admin.navbar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button id="toggleSidebar" class="text-gray-600 hover:text-gray-900">
                            <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500">Puskesmas Binong</p>
                        </div>
                        <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

            @include('layouts.admin.footer')
        </div>
    </div>

    <script>
        // Toggle Sidebar
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const menuIcon = document.getElementById('menuIcon');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-open');
            sidebar.classList.toggle('sidebar-closed');

            if (sidebar.classList.contains('sidebar-closed')) {
                menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });

        // Menu Active State (for click events, initial active is set in Blade)
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // Optional: handle click if needed, but active is managed by Blade
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
