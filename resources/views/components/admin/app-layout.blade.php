<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --primary: #349953;
            --primary-dark: #2a7a42;
            --primary-light: #ecfdf5;
            --heading: #18444c;
            --bg: #f3f4f6;
            --card: #ffffff;
            --danger: #dc2626;
            --warning: #f59e0b;
            --body: #4b5563;
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg);
        }

        /* Sidebar */
        #sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 50;
        }

        #overlay {
            transition: opacity 0.3s ease;
        }

        /* Sidebar submenu */
        .submenu {
            display: none;
        }

        .submenu.open {
            display: block;
        }

        .submenu-arrow {
            transition: transform 0.3s ease;
        }

        .submenu-arrow.open {
            transform: rotate(180deg);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #349953;
            border-radius: 10px;
        }

        /* Toggle switch */
        .toggle-checkbox:checked+.toggle-label {
            background-color: #349953;
        }

        .toggle-checkbox:checked+.toggle-label .toggle-dot {
            transform: translateX(100%);
        }

        .toggle-dot {
            transition: transform 0.2s;
        }

        /* Active page */
        .page {
            display: none;
        }

        .page.active {
            display: block;
        }

        /* Image preview */
        .img-preview {
            border: 2px dashed #349953;
        }

        /* Focus ring */
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #349953 !important;
            box-shadow: 0 0 0 3px rgba(52, 153, 83, 0.15);
        }

        /* Table row hover */
        tbody tr:hover {
            background: #f9fafb;
        }

        /* Badge */
        .badge-active {
            background: #dcfce7;
            color: #166534;
        }

        .badge-inactive {
            background: #f3f4f6;
            color: #6b7280;
        }

        .badge-publish {
            background: #dcfce7;
            color: #166534;
        }

        .badge-draft {
            background: #fef3c7;
            color: #92400e;
        }

        /* Card hover */
        .stat-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(52, 153, 83, 0.15);
        }

        /* Sidebar active item */
        .nav-item.active {
            background: white;
            color: #349953 !important;
        }

        .nav-item.active svg {
            color: #349953 !important;
        }

        .nav-item {
            transition: all 0.2s;
        }

        .nav-item:hover:not(.active) {
            background: rgba(255, 255, 255, 0.15);
        }

        /* Form tab buttons */
        .tab-btn.active {
            background: #349953;
            color: white;
        }

        /* Rich text placeholder */
        .rich-editor {
            min-height: 200px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            color: #4b5563;
        }

        .rich-editor:focus {
            outline: none;
            border-color: #349953;
            box-shadow: 0 0 0 3px rgba(52, 153, 83, 0.15);
        }

        @media (min-width: 768px) {
            #sidebar {
                transform: translateX(0) !important;
                position: relative;
                height: 100vh;
            }

            #overlay {
                display: none !important;
            }
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden">

    <!-- Overlay Mobile -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0" onclick="closeSidebar()"></div>

    <!-- ===================== SIDEBAR ===================== -->
    <aside id="sidebar"
        class="fixed md:relative w-[260px] h-screen bg-[#349953] flex flex-col -translate-x-full md:translate-x-0 shrink-0">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/20">
            <div class="w-9 h-9 bg-white rounded-xl flex items-center justify-center shadow">
                <svg class="w-5 h-5 text-[#349953]" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-base leading-tight">Admin Panel</p>
                <p class="text-white/60 text-xs">Sistem Informasi</p>
            </div>
            <!-- Close button mobile -->
            <button onclick="closeSidebar()" class="ml-auto md:hidden text-white/70 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">

            <!-- Dashboard -->
            <button onclick="showPage('dashboard')"
                class="nav-item active w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-white text-sm font-medium"
                id="nav-dashboard">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </button>

            <!-- Layanan -->
            <div>
                <button onclick="toggleSubmenu('layanan')"
                    class="nav-item w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-white text-sm font-medium"
                    id="nav-layanan">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Layanan
                    <svg id="arrow-layanan" class="submenu-arrow w-4 h-4 ml-auto" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="sub-layanan" class="submenu mt-1 ml-4 pl-4 border-l border-white/20 space-y-1">
                    <button onclick="showPage('layanan-list')"
                        class="nav-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-white/80 text-sm"
                        id="nav-layanan-list">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span> Daftar Layanan
                    </button>
                    <button onclick="showPage('kategori-layanan')"
                        class="nav-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-white/80 text-sm"
                        id="nav-kategori-layanan">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span> Kategori Layanan
                    </button>
                </div>
            </div>

            <!-- Staf -->
            <button onclick="showPage('staf')"
                class="nav-item w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-white text-sm font-medium"
                id="nav-staf">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Staf
            </button>

            <!-- Berita -->
            <div>
                <button onclick="toggleSubmenu('berita')"
                    class="nav-item w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-white text-sm font-medium"
                    id="nav-berita">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Berita
                    <svg id="arrow-berita" class="submenu-arrow w-4 h-4 ml-auto" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="sub-berita" class="submenu mt-1 ml-4 pl-4 border-l border-white/20 space-y-1">
                    <button onclick="showPage('berita-list')"
                        class="nav-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-white/80 text-sm"
                        id="nav-berita-list">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span> Daftar Berita
                    </button>
                    <button onclick="showPage('kategori-berita')"
                        class="nav-item w-full flex items-center gap-2 px-3 py-2 rounded-lg text-white/80 text-sm"
                        id="nav-kategori-berita">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/60"></span> Kategori Berita
                    </button>
                </div>
            </div>
        </nav>

        <!-- User bottom -->
        <div class="px-4 py-4 border-t border-white/20">
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/10">
                <div
                    class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#349953] font-bold text-sm">
                    A</div>
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-medium truncate">Administrator</p>
                    <p class="text-white/60 text-xs truncate">admin@sistem.id</p>
                </div>
                <button class="text-white/60 hover:text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </div>
        </div>
    </aside>

    <!-- ===================== MAIN ===================== -->
    
    <script>
        // ========================
        // PAGE NAVIGATION
        // ========================
        const pageTitles = {
            'dashboard': ['Dashboard', 'Admin Panel / Dashboard'],
            'kategori-layanan': ['Kategori Layanan', 'Admin Panel / Layanan / Kategori'],
            'layanan-list': ['Daftar Layanan', 'Admin Panel / Layanan / Daftar'],
            'layanan-form': ['Form Layanan', 'Admin Panel / Layanan / Tambah'],
            'staf': ['Data Staf', 'Admin Panel / Staf'],
            'staf-form': ['Form Staf', 'Admin Panel / Staf / Tambah'],
            'kategori-berita': ['Kategori Berita', 'Admin Panel / Berita / Kategori'],
            'berita-list': ['Daftar Berita', 'Admin Panel / Berita / Daftar'],
            'berita-form': ['Form Berita', 'Admin Panel / Berita / Tulis'],
        };

        function showPage(pageId) {
            document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
            document.getElementById('page-' + pageId).classList.add('active');

            // Update topbar title
            if (pageTitles[pageId]) {
                document.getElementById('page-title').textContent = pageTitles[pageId][0];
                document.getElementById('page-breadcrumb').textContent = pageTitles[pageId][1];
            }

            // Update nav active state
            document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
            const navEl = document.getElementById('nav-' + pageId);
            if (navEl) navEl.classList.add('active');

            // Auto-open submenu for sub-pages
            if (['layanan-list', 'layanan-form', 'kategori-layanan'].includes(pageId)) {
                openSubmenu('layanan');
            }
            if (['berita-list', 'berita-form', 'kategori-berita'].includes(pageId)) {
                openSubmenu('berita');
            }

            // Close sidebar on mobile after nav
            if (window.innerWidth < 768) closeSidebar();

            // Scroll to top
            document.querySelector('main').scrollTop = 0;
        }

        // ========================
        // SIDEBAR TOGGLE
        // ========================
        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.style.transform = 'translateX(0)';
            overlay.classList.remove('hidden');
            setTimeout(() => overlay.style.opacity = '1', 10);
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.style.transform = 'translateX(-100%)';
            overlay.style.opacity = '0';
            setTimeout(() => overlay.classList.add('hidden'), 300);
        }

        // ========================
        // SUBMENU TOGGLE
        // ========================
        function toggleSubmenu(name) {
            const sub = document.getElementById('sub-' + name);
            const arrow = document.getElementById('arrow-' + name);
            sub.classList.toggle('open');
            arrow.classList.toggle('open');
        }

        function openSubmenu(name) {
            const sub = document.getElementById('sub-' + name);
            const arrow = document.getElementById('arrow-' + name);
            sub.classList.add('open');
            arrow.classList.add('open');
        }
    </script>
</body>

</html>
