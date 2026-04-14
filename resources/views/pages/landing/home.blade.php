<x-landing.app-layout>
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="container-fluid p-0">
            <div class="hero-wrapper">
                <div class="hero-image">
                    <img src="{{ asset('MediTrust/assets/img/pus.jpeg') }}"
                        alt="Layanan Kesehatan Primer di Puskesmas Binong" class="img-fluid">
                </div>

                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-10" data-aos="fade-right" data-aos-delay="100">
                                <div class="content-box">
                                    <span class="badge-accent" data-aos="fade-up" data-aos-delay="150">Layanan Kesehatan
                                        Dasar untuk Semua</span>
                                    <h1 data-aos="fade-up" data-aos-delay="200">Sehat Dimulai dari Lingkungan Terdekat
                                    </h1>
                                    <p data-aos="fade-up" data-aos-delay="250">Puskesmas Binong hadir sebagai garda
                                        terdepan layanan kesehatan primer yang terjangkau, komprehensif, dan
                                        berorientasi pada kesejahteraan masyarakat.</p>

                                    <div class="cta-group" data-aos="fade-up" data-aos-delay="300">
                                        <a href="{{ route('about') }}" class="btn btn-primary">Tentang Puskesmas</a>
                                    </div>

                                    <div class="info-badges" data-aos="fade-up" data-aos-delay="350">
                                        <div class="badge-item">
                                            <i class="bi bi-telephone-fill"></i>
                                            <div class="badge-content">
                                                <span>Telepon Puskesmas</span>
                                                <strong>0260453308</strong>
                                            </div>
                                        </div>
                                        <div class="badge-item">
                                            <i class="bi bi-clock-fill"></i>
                                            <div class="badge-content">
                                                <span>Jam Operasional</span>
                                                <strong>Senin–Sabtu: 08.00–01.00 WIB</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Home About Section -->
    <section id="home-about" class="home-about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-image">
                        @if (!empty($profil) && $profil->image)
                            <img src="{{ Storage::url($profil->image) }}" class="img-fluid rounded-3 mb-4"
                                alt="{{ $profil->title }}">
                        @else
                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}"
                                class="img-fluid rounded-3 mb-4" alt="Tentang Kami">
                        @endif
                        {{-- <div class="experience-badge">
                            <span class="years">25+</span>
                            <span class="text">Tahun Keunggulan</span>
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content">
                        <h2>{{ $profil->title ?? 'Dedikasi Sepenuh Hati untuk Kesehatan Anda' }}</h2>

                        <p>{{ $profil->description ?? 'Puskesmas kami dilengkapi dengan fasilitas modern dan didukung oleh tenaga medis profesional yang berpengalaman untuk memberikan perawatan kesehatan terbaik bagi setiap pasien.' }}
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Home About Section -->

    <!-- Services Section -->
    <section id="featured-departments" class="featured-departments section  light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan</h2>
            <p>Layanan kesehatan komprehensif dengan spesialisasi berbagai bidang medis untuk memenuhi kebutuhan Anda
            </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                @forelse ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="department-card">
                            <div class="department-image">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/400x300/349953/ffffff?text=' . urlencode($service->name) }}"
                                    alt="{{ $service->name }}">
                            </div>
                            <div class="department-content">
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->excerpt }}</p>
                                <a href="{{ route('service.show', $service->slug) }}" class="btn-learn-more">
                                    <span>Selengkapnya</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- End Department Card -->
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada layanan tersedia.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section><!-- /Featured Departments Section -->

    <!-- Find A Doctor Section -->
    <section id="find-a-doctor" class="find-a-doctor section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Staf kami</h2>
            <p>Tenaga kesehatan kami terdiri dari para profesional yang berdedikasi dalam memberikan pelayanan medis
                yang aman, ramah, dan berkualitas bagi masyarakat</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row" data-aos="fade-up" data-aos-delay="400">
                @forelse ($stafs as $staf)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="{{ asset($staf->foto) }}" alt="{{ $staf->nama }}"
                                    alt="{{ $staf->nama }}" class="img-fluid">
                                <div class="availability-badge online">Tersedia</div>
                            </div>
                            <div class="doctor-info">
                                <h5>{{ $staf->nama }}</h5>
                                <p class="specialty">{{ $staf->profesi }}</p>
                                <div class="appointment-actions">
                                    <a href="{{ route('staf.show', $staf->id) }}" class="btn btn-outline-primary btn-sm">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Doctor Card -->

                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada data staf tersedia.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section><!-- /Find A Doctor Section -->


</x-landing.app-layout>
