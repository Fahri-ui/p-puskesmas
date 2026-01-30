<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staf') }}">Tim Kami</a></li>
                    <li class="breadcrumb-item active current">Profil Staf</li>
                </ol>
            </nav>
        </div>
        
        <div class="title-wrapper">
            <h1>Profil Staf</h1>
            <p>Kenali lebih dekat tim profesional kami</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Staff Profile Section -->
    <section id="staff-profile" class="staff-profile section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Staff Profile Card -->
                    <div class="staff-profile-card mb-4" data-aos="fade-up">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <!-- Profile Section -->
                                <div class="row align-items-center">
                                    <!-- Photo -->
                                    <div class="col-md-4 text-center mb-4 mb-md-0">
                                        <div class="staff-photo-wrapper position-relative d-inline-block">
                                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" 
                                                 alt="Staff Photo" 
                                                 class="img-fluid rounded-circle shadow-lg" 
                                                 style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #349953;">
                                            <div class="status-badge" 
                                                 style="position: absolute; bottom: 15px; right: 15px; background-color: #349953; color: white; padding: 8px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 3px 10px rgba(0,0,0,0.2);">
                                                <i class="bi bi-check-circle-fill me-1"></i>Aktif
                                            </div>
                                        </div>
                                        <!-- Social Links -->
                                        <div class="social-links mt-4">
                                            <a href="#" class="me-2" style="color: #349953; font-size: 20px;" title="LinkedIn">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                            <a href="#" class="me-2" style="color: #349953; font-size: 20px;" title="Email">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                            <a href="#" style="color: #349953; font-size: 20px;" title="Telepon">
                                                <i class="bi bi-telephone-fill"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Basic Info -->
                                    <div class="col-md-8">
                                        <div class="staff-info">
                                            <!-- Name -->
                                            <div class="info-item mb-3">
                                                <h2 class="mb-2" style="color: #2c3e50; font-weight: 700;">
                                                    Dr. Ahmad Hidayat, S.Kom., M.Kom.
                                                </h2>
                                                <p class="text-muted mb-0" style="font-size: 14px;">
                                                    <i class="bi bi-card-text me-2" style="color: #349953;"></i>
                                                    <strong>NIP:</strong> 198503152010121003
                                                </p>
                                            </div>

                                            <!-- Position -->
                                            <div class="info-item mb-3 p-3 rounded-3" style="background: linear-gradient(135deg, rgba(52, 153, 83, 0.1) 0%, rgba(52, 153, 83, 0.05) 100%); border-left: 4px solid #349953;">
                                                <p class="mb-1 text-muted" style="font-size: 13px; font-weight: 600; text-transform: uppercase;">Jabatan</p>
                                                <h5 class="mb-0" style="color: #349953; font-weight: 600;">
                                                    <i class="bi bi-briefcase-fill me-2"></i>Kepala Divisi Teknologi Informasi
                                                </h5>
                                            </div>

                                            <!-- Personal Info -->
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="info-item mb-2">
                                                        <p class="mb-1 text-muted" style="font-size: 12px;">
                                                            <i class="bi bi-gender-ambiguous me-1" style="color: #349953;"></i>
                                                            Jenis Kelamin
                                                        </p>
                                                        <p class="mb-0 fw-semibold" style="color: #2c3e50;">Laki-laki</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="info-item mb-2">
                                                        <p class="mb-1 text-muted" style="font-size: 12px;">
                                                            <i class="bi bi-calendar-heart me-1" style="color: #349953;"></i>
                                                            Tanggal Lahir
                                                        </p>
                                                        <p class="mb-0 fw-semibold" style="color: #2c3e50;">15 Maret 1985</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="about-section mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="mb-4" style="color: #349953;">
                                    <i class="bi bi-person-lines-fill me-2"></i>Tentang
                                </h5>
                                <p style="line-height: 1.8; color: #555; text-align: justify;">
                                    Dr. Ahmad Hidayat adalah seorang profesional berpengalaman di bidang Teknologi Informasi 
                                    dengan lebih dari 14 tahun pengalaman dalam mengembangkan dan mengelola sistem teknologi 
                                    informasi skala enterprise. Beliau memiliki keahlian mendalam dalam cloud computing, 
                                    cybersecurity, dan transformasi digital.
                                </p>
                                <p style="line-height: 1.8; color: #555; text-align: justify;">
                                    Dengan latar belakang pendidikan yang kuat hingga jenjang doktoral, beliau telah memimpin 
                                    berbagai proyek strategis yang berhasil meningkatkan efisiensi operasional dan keamanan 
                                    sistem informasi perusahaan. Komitmennya terhadap inovasi dan pengembangan berkelanjutan 
                                    menjadikannya aset berharga bagi organisasi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Card -->
                    <div class="contact-info-card mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="mb-4" style="color: #349953;">
                                    <i class="bi bi-telephone-fill me-2"></i>Informasi Kontak
                                </h5>

                                <div class="row">
                                    <!-- Phone -->
                                    <div class="col-md-6 mb-3">
                                        <div class="contact-item p-3 rounded-3" style="background-color: #f8f9fa; border-left: 3px solid #349953;">
                                            <p class="text-muted mb-2" style="font-size: 13px; font-weight: 600;">
                                                <i class="bi bi-phone-fill me-2" style="color: #349953;"></i>NOMOR TELEPON
                                            </p>
                                            <p class="mb-0 fw-semibold" style="color: #2c3e50; font-size: 16px;">
                                                +62 812-3456-7890
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <div class="contact-item p-3 rounded-3" style="background-color: #f8f9fa; border-left: 3px solid #349953;">
                                            <p class="text-muted mb-2" style="font-size: 13px; font-weight: 600;">
                                                <i class="bi bi-envelope-fill me-2" style="color: #349953;"></i>EMAIL
                                            </p>
                                            <p class="mb-0 fw-semibold" style="color: #2c3e50; font-size: 16px;">
                                                ahmad.hidayat@company.co.id
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12">
                                        <div class="contact-item p-3 rounded-3" style="background-color: #f8f9fa; border-left: 3px solid #349953;">
                                            <p class="text-muted mb-2" style="font-size: 13px; font-weight: 600;">
                                                <i class="bi bi-geo-alt-fill me-2" style="color: #349953;"></i>LOKASI KANTOR
                                            </p>
                                            <p class="mb-0" style="color: #2c3e50; line-height: 1.6;">
                                                Jl. Sudirman No. 123<br>
                                                Jakarta Pusat, DKI Jakarta 10250
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Education & Expertise Card -->
                    <div class="education-expertise-card mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="mb-4" style="color: #349953;">
                                    <i class="bi bi-mortarboard-fill me-2"></i>Pendidikan & Keahlian
                                </h5>

                                <!-- Education -->
                                <div class="mb-4">
                                    <h6 class="mb-3" style="color: #2c3e50;">
                                        <i class="bi bi-book me-2" style="color: #349953;"></i>Riwayat Pendidikan
                                    </h6>
                                    <div class="timeline">
                                        <div class="timeline-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                            <div class="d-flex align-items-start">
                                                <div class="timeline-icon me-3 mt-1" style="color: #349953;">
                                                    <i class="bi bi-mortarboard-fill" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 15px;">
                                                        Doktor (S3) Teknik Informatika
                                                    </p>
                                                    <p class="mb-1 text-muted" style="font-size: 14px;">Universitas Indonesia</p>
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar3 me-1"></i>2015 - 2019
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="timeline-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                            <div class="d-flex align-items-start">
                                                <div class="timeline-icon me-3 mt-1" style="color: #349953;">
                                                    <i class="bi bi-mortarboard-fill" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 15px;">
                                                        Magister (S2) Ilmu Komputer
                                                    </p>
                                                    <p class="mb-1 text-muted" style="font-size: 14px;">Institut Teknologi Bandung</p>
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar3 me-1"></i>2008 - 2010
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="timeline-item p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                            <div class="d-flex align-items-start">
                                                <div class="timeline-icon me-3 mt-1" style="color: #349953;">
                                                    <i class="bi bi-mortarboard-fill" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 15px;">
                                                        Sarjana (S1) Teknik Komputer
                                                    </p>
                                                    <p class="mb-1 text-muted" style="font-size: 14px;">Institut Teknologi Sepuluh Nopember</p>
                                                    <small class="text-muted">
                                                        <i class="bi bi-calendar3 me-1"></i>2003 - 2007
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expertise -->
                                <div>
                                    <h6 class="mb-3" style="color: #2c3e50;">
                                        <i class="bi bi-star me-2" style="color: #349953;"></i>Area Keahlian
                                    </h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Project Management
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Cloud Computing
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Cybersecurity
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Data Analytics
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Machine Learning
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Network Architecture
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Digital Transformation
                                        </span>
                                        <span class="badge px-3 py-2" style="background-color: #349953; font-weight: normal; font-size: 13px;">
                                            <i class="bi bi-check-circle me-1"></i>Enterprise Architecture
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar" data-aos="fade-up" data-aos-delay="100">
                        
                        <!-- Professional Info -->
                        <div class="sidebar-widget professional-info mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-info-circle-fill me-2"></i>Informasi Profesional
                                    </h5>
                                    
                                    <div class="info-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa;">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box me-3" style="background-color: rgba(52, 153, 83, 0.1); width: 45px; height: 45px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-diagram-3" style="font-size: 20px; color: #349953;"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted mb-0" style="font-size: 12px;">Departemen</p>
                                                <p class="mb-0 fw-semibold" style="color: #2c3e50;">Teknologi Informasi</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa;">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box me-3" style="background-color: rgba(52, 153, 83, 0.1); width: 45px; height: 45px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-calendar-check" style="font-size: 20px; color: #349953;"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted mb-0" style="font-size: 12px;">Bergabung Sejak</p>
                                                <p class="mb-0 fw-semibold" style="color: #2c3e50;">Desember 2010</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-item p-3 rounded-3" style="background-color: #f8f9fa;">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-box me-3" style="background-color: rgba(52, 153, 83, 0.1); width: 45px; height: 45px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-hourglass-split" style="font-size: 20px; color: #349953;"></i>
                                            </div>
                                            <div>
                                                <p class="text-muted mb-0" style="font-size: 12px;">Pengalaman</p>
                                                <p class="mb-0 fw-semibold" style="color: #2c3e50;">14+ Tahun</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Certifications -->
                        <div class="sidebar-widget certifications mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-award-fill me-2"></i>Sertifikasi Profesional
                                    </h5>
                                    
                                    <div class="cert-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-patch-check-fill me-2 mt-1" style="color: #349953; font-size: 20px;"></i>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="font-size: 14px; color: #2c3e50;">
                                                    AWS Certified Solutions Architect
                                                </p>
                                                <small class="text-muted">Amazon Web Services • 2023</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cert-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-patch-check-fill me-2 mt-1" style="color: #349953; font-size: 20px;"></i>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="font-size: 14px; color: #2c3e50;">
                                                    PMP - Project Management Professional
                                                </p>
                                                <small class="text-muted">PMI • 2022</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cert-item mb-3 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-patch-check-fill me-2 mt-1" style="color: #349953; font-size: 20px;"></i>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="font-size: 14px; color: #2c3e50;">
                                                    CISSP - Information Systems Security
                                                </p>
                                                <small class="text-muted">ISC² • 2021</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cert-item p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #349953;">
                                        <div class="d-flex align-items-start">
                                            <i class="bi bi-patch-check-fill me-2 mt-1" style="color: #349953; font-size: 20px;"></i>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="font-size: 14px; color: #2c3e50;">
                                                    ITIL Foundation v4
                                                </p>
                                                <small class="text-muted">AXELOS • 2020</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Achievements -->
                        <div class="sidebar-widget achievements mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-trophy-fill me-2"></i>Pencapaian
                                    </h5>

                                    <div class="achievement-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="achievement-icon me-3" style="background: linear-gradient(135deg, #349953 0%, #2d8347 100%); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-star-fill" style="font-size: 24px;"></i>
                                            </div>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 14px;">Best IT Leader Award</p>
                                                <small class="text-muted">2024</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="achievement-item mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="achievement-icon me-3" style="background: linear-gradient(135deg, #349953 0%, #2d8347 100%); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-lightbulb-fill" style="font-size: 24px;"></i>
                                            </div>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 14px;">Innovation Excellence</p>
                                                <small class="text-muted">2023</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="achievement-item">
                                        <div class="d-flex align-items-start">
                                            <div class="achievement-icon me-3" style="background: linear-gradient(135deg, #349953 0%, #2d8347 100%); width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
                                                <i class="bi bi-shield-check" style="font-size: 24px;"></i>
                                            </div>
                                            <div>
                                                <p class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 14px;">Cybersecurity Champion</p>
                                                <small class="text-muted">2022</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section><!-- /Staff Profile Section -->

    <!-- Related Team Section -->
    <section class="related-team py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h3 class="mb-3" style="color: #349953;">
                    <i class="bi bi-people-fill me-2"></i>Tim Profesional Lainnya
                </h3>
                <p class="text-muted">Kenali lebih dekat tim ahli kami yang siap membantu Anda</p>
            </div>

            <div class="row g-4">
                <!-- Team Member 1 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 team-card text-center">
                        <div class="card-body p-4">
                            <div class="team-photo mb-3">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #349953;">
                            </div>
                            <h5 class="mb-1" style="color: #2c3e50;">Dr. Sarah Wijaya</h5>
                            <p class="text-muted mb-2" style="font-size: 14px;">Kepala Divisi HRD</p>
                            <p class="text-muted mb-3" style="font-size: 12px;">
                                <i class="bi bi-card-text me-1"></i>199012151015122001
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                Lihat Profil <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 team-card text-center">
                        <div class="card-body p-4">
                            <div class="team-photo mb-3">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #349953;">
                            </div>
                            <h5 class="mb-1" style="color: #2c3e50;">Budi Santoso, M.M.</h5>
                            <p class="text-muted mb-2" style="font-size: 14px;">Kepala Divisi Keuangan</p>
                            <p class="text-muted mb-3" style="font-size: 12px;">
                                <i class="bi bi-card-text me-1"></i>198805202012121002
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                Lihat Profil <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 team-card text-center">
                        <div class="card-body p-4">
                            <div class="team-photo mb-3">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #349953;">
                            </div>
                            <h5 class="mb-1" style="color: #2c3e50;">Linda Puspitasari, S.E.</h5>
                            <p class="text-muted mb-2" style="font-size: 14px;">Kepala Divisi Marketing</p>
                            <p class="text-muted mb-3" style="font-size: 12px;">
                                <i class="bi bi-card-text me-1"></i>199203101016122003
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                Lihat Profil <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow-sm h-100 team-card text-center">
                        <div class="card-body p-4">
                            <div class="team-photo mb-3">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow" 
                                     style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #349953;">
                            </div>
                            <h5 class="mb-1" style="color: #2c3e50;">Andi Prasetyo, S.T.</h5>
                            <p class="text-muted mb-2" style="font-size: 14px;">Kepala Divisi Operasional</p>
                            <p class="text-muted mb-3" style="font-size: 12px;">
                                <i class="bi bi-card-text me-1"></i>198707151014121004
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                Lihat Profil <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('staf') }}" class="btn btn-lg" style="background-color: #349953; color: white; padding: 12px 40px;">
                    <i class="bi bi-people me-2"></i>Lihat Semua Tim
                </a>
            </div>
        </div>
    </section>

    <!-- Additional CSS -->
    <style>
        .staff-profile {
            padding: 60px 0;
        }

        .staff-profile-card .card {
            transition: all 0.3s ease;
        }

        .staff-profile-card .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.15) !important;
        }

        .staff-photo-wrapper img {
            transition: all 0.3s ease;
        }

        .staff-photo-wrapper:hover img {
            transform: scale(1.05);
        }

        .social-links a {
            transition: all 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            color: #2d8347 !important;
        }

        .contact-item {
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background-color: #e9ecef !important;
            transform: translateX(5px);
        }

        .timeline-item {
            transition: all 0.3s ease;
        }

        .timeline-item:hover {
            background-color: #e9ecef !important;
            transform: translateX(5px);
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

        .cert-item {
            transition: all 0.3s ease;
        }

        .cert-item:hover {
            background-color: #e9ecef !important;
            transform: translateX(5px);
        }

        .achievement-item {
            transition: all 0.3s ease;
        }

        .achievement-item:hover {
            transform: translateX(5px);
        }

        .achievement-icon {
            transition: all 0.3s ease;
        }

        .achievement-item:hover .achievement-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .team-card {
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.2) !important;
        }

        .team-card img {
            transition: all 0.3s ease;
        }

        .team-card:hover img {
            transform: scale(1.1);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 153, 83, 0.3);
        }

        .info-item {
            transition: all 0.3s ease;
        }

        @media (max-width: 992px) {
            .sidebar {
                position: relative;
                top: 0;
                margin-top: 40px;
            }

            .staff-profile-card .card-body {
                padding: 25px !important;
            }
        }

        @media (max-width: 768px) {
            .staff-photo-wrapper img {
                width: 150px !important;
                height: 150px !important;
            }

            .social-links {
                margin-top: 20px !important;
            }
        }
    </style>

</x-landing.app-layout>