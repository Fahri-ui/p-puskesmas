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
            <h1>Tentang Kami</h1>
            <p>Mengenal lebih dekat visi, misi, dan nilai-nilai yang kami junjung tinggi</p>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <!-- Company Overview -->
            <div class="row gy-4 align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('MediTrust/assets/img/gallery/gallery-1.webp')}}" class="img-fluid rounded-4 shadow-lg" alt="Tentang Perusahaan">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3 class="mb-3" style="color: #349953;">Siapa Kami</h3>
                        <h2 class="mb-4">Membangun Masa Depan Bersama Inovasi dan Dedikasi</h2>
                        <p class="mb-4">
                            Kami adalah perusahaan yang berkomitmen untuk memberikan solusi terbaik bagi pelanggan kami. 
                            Dengan pengalaman lebih dari 10 tahun di industri ini, kami telah membantu ribuan klien 
                            mencapai tujuan bisnis mereka melalui layanan berkualitas tinggi dan inovasi berkelanjutan.
                        </p>
                        <p class="mb-4">
                            Tim profesional kami terdiri dari para ahli yang berdedikasi untuk menghadirkan solusi 
                            yang tidak hanya memenuhi kebutuhan Anda, tetapi juga melampaui ekspektasi. Kami percaya 
                            bahwa kesuksesan Anda adalah kesuksesan kami.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div id="visi-misi" class="row gy-4 mb-5">
                <div class="col-12 text-center mb-4" data-aos="fade-up">
                    <h2 class="mb-3">Visi & Misi Kami</h2>
                    <p class="text-muted">Fondasi yang menuntun setiap langkah perjalanan kami</p>
                </div>
                
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3" style="background-color: rgba(52, 153, 83, 0.1); width: 60px; height: 60px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-eye" style="font-size: 28px; color: #349953;"></i>
                            </div>
                            <h3 class="mb-3" style="color: #349953;">Visi</h3>
                            <p class="mb-0">
                                Menjadi perusahaan terdepan yang diakui secara nasional dan internasional dalam 
                                memberikan solusi inovatif dan berkelanjutan, serta menciptakan dampak positif 
                                bagi masyarakat dan lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3" style="background-color: rgba(52, 153, 83, 0.1); width: 60px; height: 60px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-flag" style="font-size: 28px; color: #349953;"></i>
                            </div>
                            <h3 class="mb-3" style="color: #349953;">Misi</h3>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: #349953;"></i>Menghadirkan produk dan layanan berkualitas tinggi</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: #349953;"></i>Berinovasi secara berkelanjutan untuk memenuhi kebutuhan pasar</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color: #349953;"></i>Membangun hubungan jangka panjang dengan pelanggan</li>
                                <li class="mb-0"><i class="bi bi-check-circle-fill me-2" style="color: #349953;"></i>Berkontribusi positif bagi masyarakat dan lingkungan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <div class="row gy-4 mb-5">
                <div class="col-12 text-center mb-4" data-aos="fade-up">
                    <h2 class="mb-3">Nilai-Nilai Kami</h2>
                    <p class="text-muted">Prinsip yang menjadi pedoman dalam setiap tindakan kami</p>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm text-center h-100 hover-card">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3 mx-auto" style="background-color: rgba(52, 153, 83, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-shield-check" style="font-size: 36px; color: #349953;"></i>
                            </div>
                            <h4 class="mb-3" style="color: #349953;">Integritas</h4>
                            <p class="mb-0 text-muted">Berkomitmen pada kejujuran dan transparansi dalam setiap tindakan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm text-center h-100 hover-card">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3 mx-auto" style="background-color: rgba(52, 153, 83, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-lightbulb" style="font-size: 36px; color: #349953;"></i>
                            </div>
                            <h4 class="mb-3" style="color: #349953;">Inovasi</h4>
                            <p class="mb-0 text-muted">Terus berinovasi untuk memberikan solusi terbaik dan terdepan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100 hover-card">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3 mx-auto" style="background-color: rgba(52, 153, 83, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-people" style="font-size: 36px; color: #349953;"></i>
                            </div>
                            <h4 class="mb-3" style="color: #349953;">Kolaborasi</h4>
                            <p class="mb-0 text-muted">Bekerja sama untuk mencapai tujuan bersama dengan harmonis</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow-sm text-center h-100 hover-card">
                        <div class="card-body p-4">
                            <div class="icon-box mb-3 mx-auto" style="background-color: rgba(52, 153, 83, 0.1); width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-star" style="font-size: 36px; color: #349953;"></i>
                            </div>
                            <h4 class="mb-3" style="color: #349953;">Excellence</h4>
                            <p class="mb-0 text-muted">Berkomitmen pada keunggulan dalam setiap aspek layanan kami</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="row gy-4 mb-5" style="background: linear-gradient(135deg, #349953 0%, #2d8347 100%); border-radius: 20px; padding: 60px 20px;">
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <h2 class="display-4 fw-bold text-white mb-2">10+</h2>
                        <p class="text-white mb-0">Tahun Pengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <h2 class="display-4 fw-bold text-white mb-2">500+</h2>
                        <p class="text-white mb-0">Klien Puas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <h2 class="display-4 fw-bold text-white mb-2">1000+</h2>
                        <p class="text-white mb-0">Proyek Selesai</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <h2 class="display-4 fw-bold text-white mb-2">50+</h2>
                        <p class="text-white mb-0">Tim Profesional</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- /About Section -->

    <!-- Additional CSS -->
    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }
        
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(52, 153, 83, 0.2) !important;
        }

        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.15) !important;
        }

        .team-card {
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.2) !important;
        }

        .team-card img {
            transition: all 0.3s ease;
        }

        .team-card:hover img {
            transform: scale(1.05);
        }

        .social-links a {
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        .btn-primary:hover {
            background-color: #2d8347 !important;
            border-color: #2d8347 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 153, 83, 0.3);
        }

        .stat-item {
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: scale(1.1);
        }
    </style>

</x-landing.app-layout>