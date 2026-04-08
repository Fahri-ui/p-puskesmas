<aside class="w-64 bg-primary text-white flex flex-col fixed h-full z-50">
    <div class="p-6 flex items-center gap-3">
        <div class="p-2 bg-white/20 rounded-lg">
            <span class="material-symbols-outlined text-white">shield_person</span>
        </div>
        <span class="font-bold text-xl tracking-tight">SystemAdmin</span>
    </div>
    <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto max-h-96 scrollbar-thin scrollbar-thumb-white/20 scrollbar-track-transparent">
        <x-admin.navbar.nav-link href="{{ route('admin.dashboard') }}" route="admin.dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Dashboard</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.layanan') }}" route="admin.layanan">
            <span class="material-symbols-outlined">settings_suggest</span>
            <span>Services</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.staf') }}" route="admin.staf">
            <span class="material-symbols-outlined">badge</span>
            <span>Staff</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.blog') }}" route="admin.blog">
            <span class="material-symbols-outlined">newspaper</span>
            <span>Berita</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.gallery') }}" route="admin.gallery">
            <span class="material-symbols-outlined">gallery_thumbnail</span>
            <span>Gallery</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.message') }}" route="admin.message">
            <span class="material-symbols-outlined">mail</span>
            <span>Message</span>
        </x-admin.navbar.nav-link>

        <x-admin.navbar.nav-link href="{{ route('admin.profil') }}" route="admin.profil">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span>Profil</span>
        </x-admin.navbar.nav-link>
        <x-admin.navbar.nav-link href="{{ route('admin.visi-misi.index') }}" route="admin.visi-misi.index">
            <span class="material-symbols-outlined">visibility</span>
            <span>Visi & Misi</span>
        </x-admin.navbar.nav-link>
    </nav>
    <!-- User Profile & Logout - Always Visible -->
    <div class="p-4 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3 px-4 py-3">
            <div
                class="w-10 h-10 rounded-full bg-primary-light flex items-center justify-center border border-white/20 overflow-hidden">
                <img alt="Admin Profile" data-alt="User avatar of the admin user"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC35y_pkeFeEwcyfd-OejOvQQ_dczxwrjqsoOasORw-W2wyictOa88gXo7xPVrAMlgYCVoJtM0ZNxZuOXy3djKu4rVNh2F5KVPK3D2aMLUyOxLQZwtsUONcwf8S3S8WZlXuHXzbL3RVuWMb192BaIJsfRKlYcHVUkiW6I_1vECw3CllEXV2V_okLDV6tGTQds1PQWBPWaK6ZWf8zws9bPbGE0oH4wGqcxYlrfRd-EfI9sDsd7fNh05JTiJJP4LzdqqAb9lD41x2vEc" />
            </div>
            <div>
                <p class="text-sm font-bold">Admin User</p>
                <p class="text-xs text-white/60">System Manager</p>
            </div>
        </div>
        <div class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 text-sm font-bold text-center text-white bg-red-600 rounded hover:bg-red-700 transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>

<style>
/* Custom Scrollbar for Navigation */
.scrollbar-thin {
    scrollbar-width: thin;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: transparent;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background-color: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background-color: rgba(255, 255, 255, 0.5);
}
</style>
