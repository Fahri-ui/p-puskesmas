<aside class="w-64 bg-primary text-white flex flex-col fixed h-full z-50">
    <div class="p-6 flex items-center gap-3">
        <div class="p-2 bg-white/20 rounded-lg">
            <span class="material-symbols-outlined text-white">shield_person</span>
        </div>
        <span class="font-bold text-xl tracking-tight">SystemAdmin</span>
    </div>
    <nav class="flex-1 px-4 py-4 space-y-2">
        <x-admin.navbar.nav-link 
            href="{{ route('admin.dashboard') }}" 
            route="admin.dashboard">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Dashboard</span>
        </x-admin.navbar.nav-link>
    
        <x-admin.navbar.nav-link 
            href="{{ route('admin.layanan') }}" 
            route="admin.layanan">
            <span class="material-symbols-outlined">settings_suggest</span>
            <span>Services</span>
        </x-admin.navbar.nav-link>
    
        <x-admin.navbar.nav-link 
            href="{{ route('admin.staf') }}" 
            route="admin.staf">
            <span class="material-symbols-outlined">badge</span>
            <span>Staff</span>
        </x-admin.navbar.nav-link>
    
        <x-admin.navbar.nav-link 
            href="{{ route('admin.blog') }}" 
            route="admin.blog">
            <span class="material-symbols-outlined">newspaper</span>
            <span>Berita</span>
        </x-admin.navbar.nav-link>
    
        <x-admin.navbar.nav-link 
            href="{{ route('admin.kategori_blog') }}" 
            route="admin.kategori_blog">
            <span class="material-symbols-outlined">newspaper</span>
            <span>Kategory Berita</span>
        </x-admin.navbar.nav-link>
    
        <x-admin.navbar.nav-link 
            href="{{ route('admin.gallery') }}" 
            route="admin.gallery">
            <span class="material-symbols-outlined">gallery_thumbnail</span>
            <span>Gallery</span>
        </x-admin.navbar.nav-link>
    </nav>
    <div class="p-4 border-t border-white/10">
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
                <button type="submit" class="w-full px-4 py-2 text-sm font-bold text-center text-white bg-red-600 rounded hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
