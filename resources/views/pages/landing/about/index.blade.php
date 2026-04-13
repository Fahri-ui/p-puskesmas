<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a>
                    </li>
                    <li class="breadcrumb-item active current">Profil</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Profil Kami</h1>
            <p>Bersama Membangun Kepercayaan Melalui Inovasi dan Pelayanan Terbaik</p>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="image-wrapper">
                        @if (!empty($profil) && $profil->image)
                            <img src="{{ Storage::url($profil->image) }}" class="img-fluid rounded-4"
                                alt="{{ $profil->title }}">
                        @else
                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}"
                                class="img-fluid rounded-4" alt="Tentang Kami">
                        @endif
                        {{-- <div class="image-badge">
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Terpercaya Sejak 2014</span>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="content-wrapper">
                        <h2 class="section-title" style="margin-bottom: -30px; color:#349953;">
                            {{ $profil->title ?? 'Dedikasi Sepenuh Hati untuk Kesehatan Anda' }}
                        </h2>
                        <p class="description-text">
                            {!! $profil && $profil->description
                                ? nl2br(e($profil->description))
                                : 'Dengan pengalaman lebih dari satu dekade, kami telah membantu ribuan individu dan institusi dalam meningkatkan standar kesehatan mereka. Tim profesional kami yang berpengalaman siap memberikan solusi terbaik yang disesuaikan dengan kebutuhan Anda.' !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

    <!-- Vision & Mission Section -->
    <section id="visi-misi" class="vision-mission-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Visi & Misi</span>
                <h2 class="section-title">Fondasi yang Menuntun Setiap Langkah Kami</h2>
                <p class="section-description">Komitmen kami untuk memberikan layanan kesehatan terbaik bagi masyarakat
                </p>
            </div>

            <div class="row gy-4 mt-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="vm-card vision-card">
                        <div class="vm-icon-wrapper">
                            <div class="vm-icon">
                                <i class="bi bi-eye"></i>
                            </div>
                        </div>
                        <h3 class="vm-title">Visi Kami</h3>
                        <p class="vm-description">
                            {{ $visi ? $visi->content : 'Menjadi institusi kesehatan terdepan di Indonesia yang diakui secara nasional dan internasional, dengan standar pelayanan berkelas dunia yang mengutamakan keselamatan, kenyamanan, dan kesembuhan pasien.' }}
                        </p>
                        <div class="vm-decoration"></div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="vm-card mission-card">
                        <div class="vm-icon-wrapper">
                            <div class="vm-icon">
                                <i class="bi bi-flag"></i>
                            </div>
                        </div>
                        <h3 class="vm-title">Misi Kami</h3>
                        <ul class="vm-list">
                            @forelse($misis as $misi)
                                <li><i class="bi bi-check2-circle"></i>{{ $misi->content }}</li>
                            @empty
                                <li><i class="bi bi-check2-circle"></i>Memberikan pelayanan kesehatan yang berkualitas,
                                    aman, dan terjangkau</li>
                                <li><i class="bi bi-check2-circle"></i>Mengembangkan SDM yang kompeten dan berintegritas
                                    tinggi</li>
                                <li><i class="bi bi-check2-circle"></i>Menerapkan teknologi medis terkini untuk hasil
                                    optimal</li>
                                <li><i class="bi bi-check2-circle"></i>Membangun kemitraan strategis untuk peningkatan
                                    kualitas layanan</li>
                                <li><i class="bi bi-check2-circle"></i>Berkontribusi aktif dalam program kesehatan
                                    masyarakat</li>
                            @endforelse
                        </ul>
                        <div class="vm-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Vision & Mission Section -->

    <!-- Core Values Section -->
    {{-- <section class="core-values-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Nilai-Nilai Kami</span>
                <h2 class="section-title">Prinsip yang Menjadi Pedoman Kami</h2>
                <p class="section-description">Nilai-nilai fundamental yang membentuk budaya kerja dan pelayanan kami
                </p>
            </div>

            <div class="row gy-4 mt-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="value-title">Integritas</h4>
                        <p class="value-description">Berpegang teguh pada kejujuran, transparansi, dan etika profesional
                            dalam setiap tindakan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h4 class="value-title">Empati</h4>
                        <p class="value-description">Memahami dan peduli terhadap kebutuhan pasien dengan penuh kasih
                            sayang dan perhatian</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h4 class="value-title">Inovasi</h4>
                        <p class="value-description">Terus berinovasi dan mengadopsi teknologi terkini untuk hasil
                            pelayanan yang lebih baik</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-star"></i>
                        </div>
                        <h4 class="value-title">Keunggulan</h4>
                        <p class="value-description">Berkomitmen pada standar tertinggi dalam setiap aspek pelayanan
                            yang kami berikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Core Values Section --> --}}

    <!-- Organizational Structure Section -->
    <section id="struktur-organisasi" class="org-structure-section">
        <div class="container">

            {{-- Header --}}
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Struktur Organisasi</span>
                <h2 class="section-title">Integrasi Layanan Primer UPTD Puskesmas Binong</h2>
                <p class="section-description">Pemerintah Daerah Kabupaten Subang &mdash; Dinas Kesehatan</p>
            </div>

            {{-- Kepala Puskesmas --}}
            @if ($kepala)
                <div class="kepala-wrap" data-aos="fade-up" data-aos-delay="100">
                    <div class="person-card-kepala">
                        <div class="avatar-kepala">
                            <img src="{{ asset($kepala->foto ?? '') }}" alt="{{ $kepala->nama }}"
                                onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                            <span class="initials" style="display:none">
                                {{ collect(explode(' ', $kepala->nama))->map(fn($w) => strtoupper($w[0]))->take(2)->implode('') }}
                            </span>
                        </div>
                        <div class="jabatan-badge-kepala">{{ $kepala->jabatan }}</div>
                        <div class="nama-kepala">{{ $kepala->nama }}</div>
                        <div class="vm-decoration"></div>
                    </div>
                </div>
            @endif

            <div class="connector-v"></div>

            {{-- Grid Klaster --}}
            <div class="klaster-grid" data-aos="fade-up" data-aos-delay="150">
                @foreach ($klasters as $klaster)
                    <div class="klaster-card">

                        {{-- Header Klaster --}}
                        <div class="klaster-head">
                            <div class="icon-row">
                                <div class="klaster-icon">
                                    @if ($klaster['pj'])
                                        <img src="{{ asset($klaster['pj']->foto ?? '') }}"
                                            alt="{{ $klaster['pj']->nama }}"
                                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                        <span class="initials" style="display:none">
                                            {{ collect(explode(' ', $klaster['pj']->nama))->map(fn($w) => strtoupper($w[0]))->take(2)->implode('') }}
                                        </span>
                                    @endif
                                </div>
                                <span class="klaster-label-badge">{{ $klaster['label'] }}</span>
                            </div>
                            <p class="klaster-nama">{{ $klaster['nama_klaster'] }}</p>
                            <p class="klaster-pj">{{ $klaster['pj']?->nama ?? '-' }}</p>
                        </div>

                        <div class="klaster-divider"></div>

                        {{-- Anggota Klaster --}}
                        <div class="klaster-body">
                            @foreach ($klaster['anggota'] as $staf)
                                <div class="sub-item">
                                    <div class="avatar-xs">
                                        <img src="{{ asset($staf->foto ?? '') }}" alt="{{ $staf->nama }}"
                                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                        <span class="initials" style="display:none">
                                            {{ collect(explode(' ', $staf->nama))->map(fn($w) => strtoupper($w[0]))->take(2)->implode('') }}
                                        </span>
                                    </div>
                                    <div class="sub-info">
                                        <div class="sub-label">{{ $staf->jabatan }}</div>
                                        <div class="sub-nama">{{ $staf->nama }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="vm-decoration"></div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- /Organizational Structure Section -->

    <!-- Accreditation Section -->
    <section id="gallery" class="gallery section">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Sertifikasi</span>
            <h2 class="section-title">Pengakuan Kualitas Layanan Kami</h2>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @forelse ($certificates as $certificate)
                        <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-certificate">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('storage/' . $certificate->image) }}" class="img-fluid"
                                        alt="{{ $certificate->title }}" loading="lazy">
                                    <div class="gallery-overlay">
                                        <a href="{{ asset('storage/' . $certificate->image) }}"
                                            class="glightbox gallery-link" data-gallery="gallery-images">
                                            <div class="gallery-info">
                                                <h4>{{ $certificate->title }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="empty-state">
                                <i class="bi bi-image-alt text-muted" style="font-size: 3rem;"></i>
                                <h5 class="mt-3 text-muted">Belum ada sertifikat yang ditampilkan</h5>
                                <p class="text-muted">Sertifikat akan segera ditambahkan.</p>
                            </div>
                        </div>
                    @endforelse
                </div><!-- End Gallery Container -->
            </div>

        </div>

    </section><!-- /Gallery Section --

    <!-- Additional CSS -->
    <style>
        /* Color Variables */
        :root {
            --primary-color: #349953;
            --primary-dark: #2d8347;
            --primary-light: #349953;
            --accent-color: #349953;
            --text-dark: #2c3e50;
            --text-muted: #6c757d;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --shadow: rgba(52, 153, 83, 0.1);
            --shadow-hover: rgba(52, 153, 83, 0.2);
        }

        .gallery-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            inset: 0;
            position: absolute;
            background: rgba(0, 0, 0, 0.35);
            transition: background 0.3s ease;
        }

        .gallery-info {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 1rem;
        }

        .gallery-info h4 {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
        }

        .gallery-card:hover .gallery-overlay {
            background: rgba(0, 0, 0, 0.5);
        }

        .gallery-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }

        .gallery-link:hover .gallery-info h4 {
            text-decoration: underline;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
            background: var(--white);
        }

        .image-wrapper {
            position: relative;
        }

        .image-wrapper img {
            box-shadow: 0 20px 60px var(--shadow);
        }

        .image-badge {
            position: absolute;
            bottom: 30px;
            left: 30px;
            background: var(--white);
            padding: 15px 25px;
            border-radius: 50px;
            box-shadow: 0 10px 30px var(--shadow);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .image-badge i {
            font-size: 24px;
        }

        .section-badge {
            display: inline-block;
            background: rgba(52, 153, 83, 0.1);
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .lead-text {
            font-size: 20px;
            color: var(--text-dark);
            margin-bottom: 20px;
            font-weight: 500;
            line-height: 1.6;
        }

        .description-text {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            color: var(--text-dark);
        }

        .feature-item i {
            font-size: 20px;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        /* Vision Mission Section */
        .vision-mission-section {
            padding: 80px 0;
            background: var(--bg-light);
        }

        .section-header {
            margin-bottom: 40px;
        }

        .section-description {
            font-size: 18px;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto;
        }

        .vm-card {
            background: var(--white);
            border-radius: 20px;
            padding: 40px;
            height: 100%;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
        }

        .vm-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px var(--shadow-hover);
        }

        .vm-icon-wrapper {
            margin-bottom: 25px;
        }

        .vm-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 36px;
        }

        .vm-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .vm-description {
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.8;
            margin: 0;
        }

        .vm-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .vm-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 16px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .vm-list li:last-child {
            margin-bottom: 0;
        }

        .vm-list i {
            font-size: 20px;
            color: var(--primary-color);
            margin-top: 2px;
            flex-shrink: 0;
        }

        .vm-decoration {
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.05);
        }

        /* Core Values Section */
        .core-values-section {
            padding: 80px 0;
            background: var(--white);
        }

        .value-card {
            background: var(--white);
            border: 2px solid rgba(52, 153, 83, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-light) 100%);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .value-card:hover {
            transform: translateY(-15px);
            border-color: var(--primary-color);
            box-shadow: 0 20px 60px var(--shadow-hover);
        }

        .value-card:hover::before {
            transform: scaleX(1);
        }

        .value-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 42px;
            color: var(--primary-color);
            transition: all 0.4s ease;
        }

        .value-card:hover .value-icon {
            background: var(--primary-color);
            color: var(--white);
            transform: rotateY(360deg);
        }

        .value-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .value-description {
            font-size: 15px;
            color: var(--text-muted);
            line-height: 1.7;
            margin: 0;
        }

        /* Organizational Structure Section */
        .org-structure-section {
            padding: 80px 0;
        }

        /* Section Header */
        .org-structure-section .section-badge {
            display: inline-block;
            background: rgba(52, 153, 83, 0.1);
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 12px;
        }

        /* Kepala Card */
        .person-card-kepala {
            background: var(--white);
            border-radius: 20px;
            padding: 32px 48px;
            box-shadow: 0 10px 40px var(--shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            min-width: 260px;
        }

        .person-card-kepala:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px var(--shadow-hover);
        }

        .avatar-kepala {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.12);
            border: 3px solid var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .avatar-kepala img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-kepala .initials {
            font-size: 26px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .jabatan-badge-kepala {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 16px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 10px;
        }

        .nama-kepala {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .kepala-wrap {
            display: flex;
            justify-content: center;
            margin: 40px 0 16px;
        }

        .connector-v {
            display: flex;
            justify-content: center;
            height: 32px;
        }

        .connector-v::after {
            content: '';
            width: 2px;
            background: rgba(52, 153, 83, 0.3);
            display: block;
        }

        /* Klaster Grid */
        .klaster-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 8px;
        }

        .klaster-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
            position: relative;
        }

        .klaster-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px var(--shadow-hover);
        }

        .klaster-head {
            padding: 28px 24px 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }

        .klaster-head .icon-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 4px;
        }

        .klaster-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        .klaster-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .klaster-icon .initials {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
        }

        .klaster-label-badge {
            background: rgba(52, 153, 83, 0.1);
            color: var(--primary-color);
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .klaster-nama {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1.3;
            margin: 0;
        }

        .klaster-pj {
            font-size: 14px;
            color: var(--text-muted);
            margin: 0;
        }

        .klaster-divider {
            height: 1px;
            background: rgba(52, 153, 83, 0.1);
            margin: 0 24px;
        }

        .klaster-body {
            padding: 16px 24px 28px;
        }

        .sub-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(52, 153, 83, 0.08);
        }

        .sub-item:last-child {
            border-bottom: none;
        }

        .avatar-xs {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.08);
            border: 1.5px solid rgba(52, 153, 83, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        .avatar-xs img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-xs .initials {
            font-size: 12px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .sub-info {
            flex: 1;
            min-width: 0;
        }

        .sub-label {
            font-size: 12px;
            color: var(--primary-color);
            font-weight: 600;
            line-height: 1.3;
        }

        .sub-nama {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.4;
            margin-top: 2px;
        }

        @media (max-width: 768px) {
            .klaster-grid {
                grid-template-columns: 1fr;
            }

            .person-card-kepala {
                padding: 24px 32px;
            }
        }

        /* Accreditation Section */
        .accreditation-section {
            padding: 80px 0;
            background: var(--white);
        }

        .main-accreditation-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border-radius: 30px;
            padding: 50px;
            display: flex;
            align-items: center;
            gap: 40px;
            box-shadow: 0 20px 60px var(--shadow-hover);
            position: relative;
            overflow: hidden;
        }

        .main-accreditation-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .accreditation-badge {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            color: var(--primary-color);
            flex-shrink: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .accreditation-content {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .accreditation-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 10px;
        }

        .accreditation-issuer {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 20px;
            font-weight: 500;
        }

        .accreditation-description {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .year-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
        }

        .cert-card {
            background: var(--bg-light);
            border-radius: 20px;
            padding: 35px 25px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .cert-card:hover {
            background: var(--white);
            border-color: var(--primary-color);
            transform: translateY(-10px);
            box-shadow: 0 15px 50px var(--shadow-hover);
        }

        .cert-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            color: var(--primary-color);
            box-shadow: 0 5px 20px var(--shadow);
        }

        .cert-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .cert-description {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .cert-status {
            display: inline-block;
            background: rgba(52, 153, 83, 0.1);
            color: var(--primary-color);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }

        .achievements-wrapper {
            background: rgba(52, 153, 83, 0.05);
            border-radius: 20px;
            padding: 40px;
        }

        .achievements-title {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .achievement-item {
            background: var(--white);
            padding: 20px 25px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 5px 20px var(--shadow);
            transition: all 0.3s ease;
        }

        .achievement-item:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 30px var(--shadow-hover);
        }

        .achievement-item i {
            font-size: 28px;
            color: var(--accent-color);
            flex-shrink: 0;
        }

        .achievement-item span {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
        }


        /* Responsive */
        @media (max-width: 992px) {
            .section-title {
                font-size: 28px;
            }

            .lead-text {
                font-size: 18px;
            }

            .main-accreditation-card {
                flex-direction: column;
                text-align: center;
                padding: 40px 30px;
            }

            .accreditation-title {
                font-size: 26px;
            }

        }

        @media (max-width: 768px) {
            .hero-stats-section {
                padding: 40px 0;
            }

            .stat-number {
                font-size: 36px;
            }

            .about-section,
            .vision-mission-section,
            .core-values-section,
            .org-structure-section,
            .accreditation-section {
                padding: 60px 0;
            }

            .image-badge {
                font-size: 14px;
                padding: 12px 20px;
                bottom: 20px;
                left: 20px;
            }

            .vm-card,
            .value-card,
            .org-card,
            .cert-card {
                margin-bottom: 20px;
            }
        }
    </style>

</x-landing.app-layout>
