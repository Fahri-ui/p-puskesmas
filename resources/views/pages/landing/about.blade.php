<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a></li>
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
                        <img src="{{asset('MediTrust/assets/img/gallery/gallery-1.webp')}}" class="img-fluid rounded-4" alt="Tentang Kami">
                        <div class="image-badge">
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Terpercaya Sejak 2014</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="content-wrapper">
                        <h2 class="section-title" style="margin-bottom: -30px; color:#349953;">Dedikasi Sepenuh Hati untuk Kesehatan Anda</h2>
                        <p class="lead-text">Memberikan pelayanan kesehatan yang ramah, cepat, dan berkualitas bagi masyarakat </p>
                        <p class="description-text">
                            Dengan pengalaman lebih dari satu dekade, kami telah membantu ribuan individu
                            dan institusi dalam meningkatkan standar kesehatan mereka. Tim profesional kami
                            yang berpengalaman siap memberikan solusi terbaik yang disesuaikan dengan
                            kebutuhan Anda.
                        </p>
                        <div class="feature-list">
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Layanan berkualitas internasional</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Tenaga medis berpengalaman dan bersertifikat</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Teknologi medis modern dan canggih</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Komitmen pada kepuasan pasien</span>
                            </div>
                        </div>
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
                <p class="section-description">Komitmen kami untuk memberikan layanan kesehatan terbaik bagi masyarakat</p>
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
                            Menjadi institusi kesehatan terdepan di Indonesia yang diakui secara nasional
                            dan internasional, dengan standar pelayanan berkelas dunia yang mengutamakan
                            keselamatan, kenyamanan, dan kesembuhan pasien.
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
                            <li><i class="bi bi-check2-circle"></i>Memberikan pelayanan kesehatan yang berkualitas, aman, dan terjangkau</li>
                            <li><i class="bi bi-check2-circle"></i>Mengembangkan SDM yang kompeten dan berintegritas tinggi</li>
                            <li><i class="bi bi-check2-circle"></i>Menerapkan teknologi medis terkini untuk hasil optimal</li>
                            <li><i class="bi bi-check2-circle"></i>Membangun kemitraan strategis untuk peningkatan kualitas layanan</li>
                            <li><i class="bi bi-check2-circle"></i>Berkontribusi aktif dalam program kesehatan masyarakat</li>
                        </ul>
                        <div class="vm-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Vision & Mission Section -->

    <!-- Core Values Section -->
    <section class="core-values-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Nilai-Nilai Kami</span>
                <h2 class="section-title">Prinsip yang Menjadi Pedoman Kami</h2>
                <p class="section-description">Nilai-nilai fundamental yang membentuk budaya kerja dan pelayanan kami</p>
            </div>

            <div class="row gy-4 mt-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="value-title">Integritas</h4>
                        <p class="value-description">Berpegang teguh pada kejujuran, transparansi, dan etika profesional dalam setiap tindakan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                        <h4 class="value-title">Empati</h4>
                        <p class="value-description">Memahami dan peduli terhadap kebutuhan pasien dengan penuh kasih sayang dan perhatian</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h4 class="value-title">Inovasi</h4>
                        <p class="value-description">Terus berinovasi dan mengadopsi teknologi terkini untuk hasil pelayanan yang lebih baik</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="bi bi-star"></i>
                        </div>
                        <h4 class="value-title">Keunggulan</h4>
                        <p class="value-description">Berkomitmen pada standar tertinggi dalam setiap aspek pelayanan yang kami berikan</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Core Values Section -->

    <!-- Organizational Structure Section -->
    <section id="struktur-organisasi" class="org-structure-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Struktur Organisasi</span>
                <h2 class="section-title">Tim Kepemimpinan Kami</h2>
                <p class="section-description">Dipimpin oleh para profesional berpengalaman di bidangnya</p>
            </div>

            <!-- Board of Directors -->
            <div class="org-level director-level" data-aos="fade-up" data-aos-delay="100">
                <h3 class="org-level-title">Dewan Direksi</h3>
                <div class="row justify-content-center gy-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="org-card director-card">
                            <div class="org-card-header">
                                <div class="org-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="org-card-body">
                                <h4 class="org-name">Dr. Ahmad Wijaya, Sp.PD</h4>
                                <p class="org-position">Direktur Utama</p>
                                <p class="org-description">Spesialis Penyakit Dalam dengan pengalaman 20+ tahun di bidang manajemen kesehatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="org-card director-card">
                            <div class="org-card-header">
                                <div class="org-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="org-card-body">
                                <h4 class="org-name">Dr. Sarah Kusuma, M.Kes</h4>
                                <p class="org-position">Direktur Pelayanan Medis</p>
                                <p class="org-description">Ahli manajemen pelayanan medis dengan fokus pada peningkatan kualitas layanan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="org-card director-card">
                            <div class="org-card-header">
                                <div class="org-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="org-card-body">
                                <h4 class="org-name">Budi Santoso, S.E., M.M.</h4>
                                <p class="org-position">Direktur Keuangan & Operasional</p>
                                <p class="org-description">Profesional berpengalaman dalam manajemen keuangan institusi kesehatan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Department Heads -->
            <div class="org-level department-level mt-5" data-aos="fade-up" data-aos-delay="200">
                <h3 class="org-level-title">Kepala Departemen</h3>
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="org-card dept-card">
                            <div class="dept-icon">
                                <i class="bi bi-heart-pulse-fill"></i>
                            </div>
                            <h5 class="dept-name">Departemen Medis</h5>
                            <p class="dept-head">Dr. Rina Hartono, Sp.B</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="org-card dept-card">
                            <div class="dept-icon">
                                <i class="bi bi-clipboard2-pulse"></i>
                            </div>
                            <h5 class="dept-name">Departemen Keperawatan</h5>
                            <p class="dept-head">Ns. Maya Putri, S.Kep., M.Kep</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="org-card dept-card">
                            <div class="dept-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <h5 class="dept-name">Departemen Marketing</h5>
                            <p class="dept-head">Dewi Lestari, S.Sos., M.M.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="org-card dept-card">
                            <div class="dept-icon">
                                <i class="bi bi-gear-fill"></i>
                            </div>
                            <h5 class="dept-name">Departemen IT & Sistem</h5>
                            <p class="dept-head">Rahmat Hidayat, S.Kom., M.T.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Organizational Structure Section -->

    <!-- Accreditation Section -->
    <section id="akreditasi" class="accreditation-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge">Akreditasi & Sertifikasi</span>
                <h2 class="section-title">Pengakuan Kualitas Layanan Kami</h2>
                <p class="section-description">Komitmen kami terhadap standar kualitas internasional</p>
            </div>

            <!-- Main Accreditation -->
            <div class="row gy-4 mt-4 justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="main-accreditation-card">
                        <div class="accreditation-badge">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div class="accreditation-content">
                            <h3 class="accreditation-title">Akreditasi Paripurna</h3>
                            <p class="accreditation-issuer">Komisi Akreditasi Rumah Sakit (KARS)</p>
                            <p class="accreditation-description">
                                Telah meraih akreditasi tingkat Paripurna, standar tertinggi dalam pelayanan kesehatan
                                di Indonesia yang mencakup keselamatan pasien, pelayanan medis, manajemen, dan
                                peningkatan mutu berkelanjutan.
                            </p>
                            <div class="accreditation-year">
                                <span class="year-badge">Berlaku: 2023 - 2026</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Certifications -->
            <div class="row gy-4 mt-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="cert-card">
                        <div class="cert-icon">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <h4 class="cert-title">ISO 9001:2015</h4>
                        <p class="cert-description">Sistem Manajemen Mutu untuk memastikan konsistensi kualitas layanan</p>
                        <span class="cert-status">Tersertifikasi</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="cert-card">
                        <div class="cert-icon">
                            <i class="bi bi-file-medical-fill"></i>
                        </div>
                        <h4 class="cert-title">ISO 15189:2012</h4>
                        <p class="cert-description">Standar internasional untuk laboratorium medis dan kualitas hasil pemeriksaan</p>
                        <span class="cert-status">Tersertifikasi</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="cert-card">
                        <div class="cert-icon">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>
                        <h4 class="cert-title">SNARS Edition 1.1</h4>
                        <p class="cert-description">Standar Nasional Akreditasi Rumah Sakit untuk pelayanan yang aman dan bermutu</p>
                        <span class="cert-status">Terakreditasi</span>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="achievements-wrapper mt-5" data-aos="fade-up" data-aos-delay="500">
                <h3 class="achievements-title text-center mb-4">Penghargaan & Pencapaian</h3>
                <div class="row gy-3">
                    <div class="col-lg-6">
                        <div class="achievement-item">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Top 100 Rumah Sakit Terbaik Indonesia 2024</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-item">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Hospital Safety Index (HSI) - Kategori A</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-item">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Indonesia Hospital Patient Safety Award 2023</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-item">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Green Hospital Award untuk Lingkungan Berkelanjutan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Accreditation Section -->

    <!-- Additional CSS -->
    <style>
        /* Color Variables */
        :root {
            --primary-color:#349953;
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
            background: var(--bg-light);
        }

        .org-level {
            margin-bottom: 50px;
        }

        .org-level:last-child {
            margin-bottom: 0;
        }

        .org-level-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .org-level-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-light) 100%);
            border-radius: 2px;
        }

        .org-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px var(--shadow);
            transition: all 0.3s ease;
            height: 100%;
        }

        .org-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px var(--shadow-hover);
        }

        .director-card .org-card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            padding: 30px;
            text-align: center;
        }

        .org-avatar {
            font-size: 80px;
            color: var(--white);
            opacity: 0.9;
        }

        .org-card-body {
            padding: 30px;
            text-align: center;
        }

        .org-name {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .org-position {
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .org-description {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0;
        }

        .dept-card {
            padding: 30px 20px;
            text-align: center;
        }

        .dept-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 32px;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .dept-card:hover .dept-icon {
            background: var(--primary-color);
            color: var(--white);
            transform: scale(1.1);
        }

        .dept-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .dept-head {
            font-size: 14px;
            color: var(--text-muted);
            margin: 0;
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
