<nav id="navmenu" class="navmenu">
    <ul>
        <li><x-landing.navbar.nav-link href="{{ route('welcome') }}" route="welcome">Beranda</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('about') }}" route="about">Profil</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('service') }}" route="service">Layanan</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('inovasi') }}" route="inovasi">Inovasi</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('staf') }}" route="staf">Staff</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('blog') }}" route="blog">Berita</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('gallery') }}" route="gallery">Galeri</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('contact') }}" route="contact">Kontak</x-landing.navbar.nav-link></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>