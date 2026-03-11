<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


Saya sedang mengembangkan Admin Dashboard untuk website sistem informasi (berbasis Laravel + Blade + Tailwind CSS).

Buatkan UI lengkap untuk Admin Dashboard dengan sidebar navigasi dan halaman konten utama. Fokus hanya pada pembuatan UI (frontend saja), tanpa backend logic.

Gunakan warna utama:
-Primary: #349953
-Background terang: #ffffff
-Heading text color: #18444c
Desain harus modern, clean, minimalis, dan responsive.

Struktur halaman yang harus dibuat:

1️⃣ Dashboard
Halaman ringkasan data admin.
Tampilkan:
-Card statistik (total layanan, total staf, total berita, total gallery)
-Tabel ringkasan data terbaru (hardcode 5 data)
-Gunakan layout grid responsive

2️⃣ Layanan (CRUD UI Only)
Halaman ini memiliki 2 sistem CRUD:
A. Kategori Layanan
Field:
-nama
Buat UI:
-Halaman list (READ) dengan tabel (hardcode 5 data)
-Modal / halaman form Create & Edit
-Tombol Edit & Delete
B. Layanan
Field:
-name
-slug
-image
-excerpt
-deskripsi
-service_category_id
-is_active
-sort_order
Buat UI:
-Tabel list data (hardcode 5 data)
-Form Create & Edit lengkap sesuai field
-Gunakan select dropdown untuk service_category_id
-Toggle / switch untuk is_active
-Upload preview untuk image

3️⃣ Staf (CRUD UI Only)
Field:
-foto
-nama
-telepon
-email
-jenis_kelamin
-tanggal_lahir
-profesi
-nip
-jabatan
-deskripsi
-alamat
-pendidikan_terakhir
-bergabung_sejak
-urutan
Buat UI:
-Tabel list (hardcode 5 data)
-Form Create & Edit lengkap
-Preview foto
-Select untuk jenis_kelamin
-Date picker untuk tanggal_lahir & bergabung_sejak

4️⃣ Berita (CRUD UI Only)
Memiliki 2 sistem CRUD:
A. Kategori Berita
Field:
-nama
Buat UI:
-Tabel list (hardcode 5 data)
-Form Create & Edit
B. Berita
Field:
-title
-slug
-content
-excerpt
-thumbnail
-image
-category_id
-status
-published_at
Buat UI:
-Tabel list (hardcode 5 data)
-Form Create & Edi
-Select dropdown untuk category_id
-Select status (draft/publish)
-Date picker untuk published_at
-Preview thumbnail & image

Ketentuan Tambahan:
-Data READ harus di-hardcode (tidak menggunakan foreach atau backend).
-Semua halaman menggunakan layout admin yang konsisten (sidebar + topbar).