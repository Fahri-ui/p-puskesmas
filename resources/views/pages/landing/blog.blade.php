<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="container">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita & Informasi</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper text-center mt-4">
                <h1>Berita & Informasi</h1>
                <p class="mt-2">Temukan update terkini seputar layanan, kegiatan, dan informasi kesehatan dari Puskesmas Binong.</p>
            </div>
        </div>
    </div><!-- End Page Title -->

    <!-- News Section -->
    <section class=" py-5">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Featured News -->
                    <div class="featured-news mb-5" data-aos="fade-up">
                        <div class="card border-0 shadow-lg overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <div class="featured-image" style="height: 100%; min-height: 350px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover;">
                                        <div class="featured-badge" style="position: absolute; top: 20px; left: 20px; background-color: #349953; color: white; padding: 8px 20px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                                            <i class="bi bi-star-fill me-1"></i>Berita Utama
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-4 d-flex flex-column h-100">
                                        <div class="mb-2">
                                            <span class="badge mb-2" style="background-color: rgba(52, 153, 83, 0.1); color: #349953; font-weight: 500;">
                                                <i class="bi bi-folder me-1"></i>Kesehatan
                                            </span>
                                        </div>
                                        <h3 class="card-title mb-3" style="color: #2c3e50; line-height: 1.4;">
                                            <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                Program Vaksinasi COVID-19 Booster Gratis untuk Seluruh Masyarakat Binong
                                            </a>
                                        </h3>
                                        <p class="card-text text-muted mb-4" style="line-height: 1.7;">
                                            Puskesmas Binong kembali menggelar program vaksinasi booster gratis untuk seluruh masyarakat. 
                                            Program ini bertujuan meningkatkan imunitas masyarakat dalam menghadapi varian baru COVID-19. 
                                            Vaksinasi dilaksanakan setiap hari Senin-Jumat pukul 08.00-14.00 WIB.
                                        </p>
                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    28 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm" style="background-color: #349953; color: white;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- (Search moved to sidebar) -->

                    <!-- News List -->
                    <div class="news-list">
                        <!-- News Item 1 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #349953; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Kesehatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Pemeriksaan Kesehatan Gratis untuk Lansia di Puskesmas Binong
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Puskesmas Binong mengadakan program pemeriksaan kesehatan gratis khusus untuk lansia usia 60 tahun ke atas. 
                                                Program ini meliputi cek tekanan darah, gula darah, kolesterol, dan konsultasi kesehatan dengan dokter umum.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    27 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 2 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="150">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #2196F3; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Kegiatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Sosialisasi PHBS di Sekolah Dasar Wilayah Binong
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Tim promosi kesehatan Puskesmas Binong mengadakan sosialisasi Perilaku Hidup Bersih dan Sehat (PHBS) 
                                                di 10 sekolah dasar wilayah kerja Puskesmas. Kegiatan ini bertujuan meningkatkan kesadaran siswa tentang pentingnya pola hidup sehat.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    26 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 3 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #FF9800; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Pengumuman
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Perubahan Jam Pelayanan Puskesmas Selama Bulan Ramadhan
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Puskesmas Binong mengumumkan perubahan jam operasional selama bulan Ramadhan 1447 H. 
                                                Pelayanan akan dimulai pukul 08.00 WIB hingga 14.00 WIB untuk memberikan kesempatan 
                                                bagi petugas untuk beribadah dan berbuka puasa bersama keluarga.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    25 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 4 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="250">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #349953; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Kesehatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Tips Mencegah Penyakit Demam Berdarah di Musim Hujan
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Memasuki musim hujan, kasus demam berdarah dengue (DBD) cenderung meningkat. 
                                                Puskesmas Binong memberikan edukasi kepada masyarakat tentang cara mencegah DBD 
                                                melalui gerakan 3M Plus: Menguras, Menutup, Mengubur, dan aktivitas pencegahan lainnya.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    24 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 5 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #2196F3; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Kegiatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Pelatihan Kader Posyandu untuk Meningkatkan Pelayanan Kesehatan
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Puskesmas Binong mengadakan pelatihan bagi 50 kader posyandu dari berbagai RW. 
                                                Pelatihan mencakup pemantauan tumbuh kembang balita, deteksi dini stunting, 
                                                dan cara memberikan penyuluhan kesehatan kepada ibu dan anak.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    23 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 6 -->
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="350">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px 0 0 8px;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #349953; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                Kesehatan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="text-decoration-none text-dark hover-link">
                                                    Layanan Konseling Kesehatan Mental Gratis Setiap Hari Jumat
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                Puskesmas Binong membuka layanan konseling kesehatan mental gratis setiap hari Jumat. 
                                                Layanan ini ditangani oleh psikolog profesional dan ditujukan untuk masyarakat yang 
                                                membutuhkan pendampingan dalam mengatasi masalah psikologis seperti stres, kecemasan, dan depresi.
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    22 Januari 2026
                                                </small>
                                                <a href="{{ route('blog.show', 'program-vaksinasi-covid-19-booster-gratis') }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-5" data-aos="fade-up">
                        <nav aria-label="News pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#" style="background-color: #349953; border-color: #349953;">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" style="color: #349953;">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" style="color: #349953;">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" style="color: #349953;">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar" data-aos="fade-up" data-aos-delay="100">


                        <!-- Search + Categories (compact and professional) -->
                        <div class="sidebar-widget search-categories mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-3" style="color: #349953;">
                                        <i class="bi bi-search me-2"></i>Cari Berita
                                    </h5>

                                    <form action="{{ route('admin.blog') }}" method="GET" class="mb-3">
                                        <div class="input-group">
                                            <input type="search" name="q" class="form-control" placeholder="Cari berita atau kategori..." value="{{ request('q') }}">
                                            <button class="btn" type="submit" style="background-color: #349953; color: white;">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="mb-3" style="height:1px;background:#e9ecef"></div>

                                    <h6 class="mb-3" style="font-weight:600;">Kategori</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark hover-link">
                                                <span><i class="    bi bi-chevron-right me-2" style="color: #349953;"></i>Kesehatan</span>
                                                <small class="text-muted">24</small>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark hover-link">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Kegiatan</span>
                                                <small class="text-muted">18</small>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark hover-link">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Pengumuman</span>
                                                <small class="text-muted">12</small>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark hover-link">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Layanan</span>
                                                <small class="text-muted">9</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none text-dark hover-link">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Edukasi</span>
                                                <small class="text-muted">7</small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Popular News -->
                        <div class="sidebar-widget popular-news mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-fire me-2"></i>Berita Populer
                                    </h5>
                                    
                                    <div class="popular-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex">
                                            <div class="popular-thumbnail me-3" style="width: 80px; height: 80px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px; flex-shrink: 0;"></div>
                                            <div>
                                                <h6 class="mb-2" style="font-size: 14px; line-height: 1.4;">
                                                    <a href="#" class="text-dark text-decoration-none hover-link">
                                                        Program Imunisasi MR untuk Anak Usia 9 Bulan - 15 Tahun
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    20 Jan 2026
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="popular-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex">
                                            <div class="popular-thumbnail me-3" style="width: 80px; height: 80px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px; flex-shrink: 0;"></div>
                                            <div>
                                                <h6 class="mb-2" style="font-size: 14px; line-height: 1.4;">
                                                    <a href="#" class="text-dark text-decoration-none hover-link">
                                                        Puskesmas Binong Raih Akreditasi Paripurna
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    18 Jan 2026
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="popular-item mb-3 pb-3 border-bottom">
                                        <div class="d-flex">
                                            <div class="popular-thumbnail me-3" style="width: 80px; height: 80px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px; flex-shrink: 0;"></div>
                                            <div>
                                                <h6 class="mb-2" style="font-size: 14px; line-height: 1.4;">
                                                    <a href="#" class="text-dark text-decoration-none hover-link">
                                                        Peluncuran Aplikasi Mobile untuk Pendaftaran Online
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    15 Jan 2026
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="popular-item">
                                        <div class="d-flex">
                                            <div class="popular-thumbnail me-3" style="width: 80px; height: 80px; background: url('{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}') center/cover; border-radius: 8px; flex-shrink: 0;"></div>
                                            <div>
                                                <h6 class="mb-2" style="font-size: 14px; line-height: 1.4;">
                                                    <a href="#" class="text-dark text-decoration-none hover-link">
                                                        Senam Sehat Bersama di Lapangan Binong
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    12 Jan 2026
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Archive
                        <div class="sidebar-widget archive mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-archive-fill me-2"></i>Arsip
                                    </h5>
                                    
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="#" class="text-decoration-none text-dark hover-link">
                                                <i class="bi bi-calendar3 me-2" style="color: #349953;"></i>
                                                Januari 2026 <span class="text-muted">(15)</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="text-decoration-none text-dark hover-link">
                                                <i class="bi bi-calendar3 me-2" style="color: #349953;"></i>
                                                Desember 2025 <span class="text-muted">(22)</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="text-decoration-none text-dark hover-link">
                                                <i class="bi bi-calendar3 me-2" style="color: #349953;"></i>
                                                November 2025 <span class="text-muted">(18)</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="text-decoration-none text-dark hover-link">
                                                <i class="bi bi-calendar3 me-2" style="color: #349953;"></i>
                                                Oktober 2025 <span class="text-muted">(20)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none text-dark hover-link">
                                                <i class="bi bi-calendar3 me-2" style="color: #349953;"></i>
                                                September 2025 <span class="text-muted">(16)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->

                    </aside>
                </div>
            </div>
        </div>
    </section><!-- End News Section -->

    <!-- Additional CSS -->
    <style>
        .news-section {
            background-color: #f8f9fa;
        }

        .featured-news .card {
            transition: all 0.3s ease;
        }

        .featured-news .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(52, 153, 83, 0.2) !important;
        }

        .hover-link {
            transition: color 0.3s ease;
        }

        .hover-link:hover {
            color: #349953 !important;
        }

        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.15) !important;
        }

        .news-thumbnail {
            position: relative;
            overflow: hidden;
        }

        .category-badge {
            transition: all 0.3s ease;
        }

        .hover-card:hover .category-badge {
            transform: scale(1.1);
        }

        .category-btn {
            transition: all 0.3s ease;
        }

        .category-btn:hover {
            background-color: #349953 !important;
            color: white !important;
            border-color: #349953 !important;
        }

        .active-category {
            box-shadow: 0 3px 10px rgba(52, 153, 83, 0.3);
        }

        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget .card {
            transition: all 0.3s ease;
        }

        .sidebar-widget .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(52, 153, 83, 0.15) !important;
        }

        .popular-thumbnail {
            transition: all 0.3s ease;
        }

        .popular-item:hover .popular-thumbnail {
            transform: scale(1.05);
        }

        .pagination .page-link {
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background-color: #349953;
            border-color: #349953;
            color: white !important;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 153, 83, 0.3);
        }

        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                top: 0;
                margin-top: 40px;
            }

            .featured-news .row {
                flex-direction: column;
            }

            .featured-news .featured-image {
                min-height: 250px !important;
            }
        }

        @media (max-width: 768px) {
            .filter-section .row {
                flex-direction: column;
            }

            .category-filter {
                margin-bottom: 15px;
            }

            .news-item .row {
                flex-direction: column;
            }

            .news-thumbnail {
                min-height: 180px !important;
                border-radius: 8px 8px 0 0 !important;
            }
        }
    </style>

</x-landing.app-layout>