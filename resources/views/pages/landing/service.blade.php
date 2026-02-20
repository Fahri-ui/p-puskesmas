<x-landing.app-layout>

    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Layanan</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Layanan</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Tambahkan CDN Bootstrap Icons di <head> jika belum ada -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Services Section Styles */
        .services-section {
            padding: 3rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Category Filter Styles */
        .category-filter {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 0.75rem 2rem;
            border: 2px solid #e5e7eb;
            background: #ffffff;
            color: #374151;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            white-space: nowrap;
        }

        .category-btn:hover {
            border-color: #349953;
            color: #349953;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 153, 83, 0.15);
        }

        .category-btn.active {
            background: linear-gradient(135deg, #349953 0%, #2d8a4a 100%);
            border-color: #349953;
            color: #ffffff;
            box-shadow: 0 4px 16px rgba(52, 153, 83, 0.3);
        }

        .category-btn.active:hover {
            background: linear-gradient(135deg, #2d8a4a 0%, #257a3f 100%);
            border-color: #2d8a4a;
            color: #ffffff;
        }

        /* Services Grid Styles */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem;
            margin: 0 auto;
        }

        .service-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: 1px solid rgba(52, 153, 83, 0.1);
            margin: 0;
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(52, 153, 83, 0.15);
        }

        .service-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: linear-gradient(135deg, #349953 0%, #2d8a4a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .service-card:hover .service-image img {
            transform: scale(1.05);
        }

        .service-icon-badge {
            position: absolute;
            bottom: -24px;
            left: 24px;
            width: 52px;
            height: 52px;
            background: #349953;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            z-index: 2;
            border: 3px solid #ffffff;
        }

        .service-icon-badge i {
            color: #ffffff;
            font-size: 1.35rem;
        }

        .service-content {
            padding: 36px 24px 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 1rem 0;
            line-height: 1.4;
        }

        .service-description {
            font-size: 1rem;
            color: #555;
            line-height: 1.7;
            margin: 0;
            flex-grow: 1;
        }

        .service-cta {
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid #eee;
        }

        .service-cta a {
            color: #349953;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.2s ease;
        }

        .service-cta a:hover {
            gap: 0.75rem;
        }

        .service-cta a i {
            font-size: 0.9rem;
            transition: transform 0.2s ease;
        }

        .service-cta a:hover i {
            transform: translateX(4px);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .services-section {
                padding: 2.5rem 1.5rem;
            }

            .category-filter {
                gap: 0.75rem;
                margin-bottom: 2.5rem;
            }

            .category-btn {
                padding: 0.65rem 1.5rem;
                font-size: 0.95rem;
            }

            .services-grid {
                padding: 1.5rem;
                gap: 1.75rem;
            }
        }

        @media (max-width: 768px) {
            .services-section {
                padding: 2rem 1rem;
            }

            .category-filter {
                gap: 0.5rem;
                margin-bottom: 2rem;
            }

            .category-btn {
                padding: 0.6rem 1.25rem;
                font-size: 0.9rem;
            }

            .services-grid {
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 1.5rem;
                padding: 1.25rem;
            }

            .service-image {
                height: 160px;
            }

            .service-content {
                padding: 32px 20px 20px;
            }

            .service-title {
                font-size: 1.05rem;
            }

            .service-description {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .services-section {
                padding: 1.5rem 0.75rem;
            }

            .category-filter {
                gap: 0.5rem;
                margin-bottom: 1.75rem;
            }

            .category-btn {
                padding: 0.55rem 1rem;
                font-size: 0.85rem;
                flex: 1 1 calc(50% - 0.5rem);
                text-align: center;
            }

            .category-btn.active,
            .category-btn:first-child {
                flex: 1 1 100%;
            }

            .services-grid {
                grid-template-columns: 1fr;
                padding: 1rem;
                gap: 1.5rem;
            }

            .service-image {
                height: 150px;
            }

            .service-icon-badge {
                width: 48px;
                height: 48px;
                bottom: -20px;
                left: 20px;
            }

            .service-icon-badge i {
                font-size: 1.2rem;
            }

            .service-content {
                padding: 28px 16px 16px;
            }

            .service-title {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Services Section Wrapper -->
    <div class="services-section">

        <!-- Category Filter -->
        <div class="category-filter">
            <button class="category-btn active">Pelayanan Dasar</button>
            <button class="category-btn">Pelayanan Khusus</button>
            <button class="category-btn">Penunjang Medis</button>
            <button class="category-btn">Gawat Darurat</button>
            <button class="category-btn">Promkes & Pencegahan</button>
        </div>
        <!-- /Category Filter -->

        <!-- Services Grid -->
        <div class="services-grid">

            <!-- Item 1: Poli Umum -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Poli+Umum" alt="Poli Umum">
                    <div class="service-icon-badge">
                        <i class="bi bi-person-heart"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Poli Umum</h3>
                    <p class="service-description">Pelayanan kesehatan dasar untuk pemeriksaan umum, pengobatan penyakit ringan, dan konsultasi medis oleh dokter umum.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 2: Poli Anak -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Poli+Anak" alt="Poli Anak">
                    <div class="service-icon-badge">
                        <i class="bi bi-balloon-heart"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Poli Anak</h3>
                    <p class="service-description">Pelayanan kesehatan khusus untuk bayi, anak, dan remaja meliputi pemeriksaan tumbuh kembang, imunisasi, dan pengobatan.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 3: Poli Gigi -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Poli+Gigi" alt="Poli Gigi">
                    <div class="service-icon-badge">
                        <i class="bi bi-tooth"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Poli Gigi</h3>
                    <p class="service-description">Pelayanan kesehatan gigi dan mulut termasuk pemeriksaan, pembersihan karang gigi, tambal, dan pencabutan gigi.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 4: KIA / Kebidanan -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=KIA" alt="KIA Kebidanan">
                    <div class="service-icon-badge">
                        <i class="bi bi-flower1"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">KIA & Kebidanan</h3>
                    <p class="service-description">Pelayanan kesehatan ibu dan anak meliputi pemeriksaan kehamilan, persalinan, nifas, dan KB.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 5: IGD 24 Jam -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=IGD" alt="IGD">
                    <div class="service-icon-badge">
                        <i class="bi bi-ambulance"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">IGD 24 Jam</h3>
                    <p class="service-description">Pelayanan gawat darurat yang siap melayani 24 jam untuk penanganan kasus kecelakaan dan kondisi kritis.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 6: Laboratorium -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Laboratorium" alt="Laboratorium">
                    <div class="service-icon-badge">
                        <i class="bi bi-flask"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Laboratorium</h3>
                    <p class="service-description">Pemeriksaan penunjang diagnostik seperti darah lengkap, gula darah, kolesterol, dan tes urin dengan hasil akurat.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 7: Farmasi -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Farmasi" alt="Farmasi">
                    <div class="service-icon-badge">
                        <i class="bi bi-capsule-pill"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Farmasi</h3>
                    <p class="service-description">Pelayanan resep obat yang aman dan berkualitas, dilengkapi konsultasi penggunaan obat oleh apoteker.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 8: Imunisasi -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Imunisasi" alt="Imunisasi">
                    <div class="service-icon-badge">
                        <i class="bi bi-shield-check"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Imunisasi</h3>
                    <p class="service-description">Program imunisasi lengkap untuk bayi, anak, dan dewasa sesuai jadwal Kementerian Kesehatan RI.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 9: Konseling Gizi -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Gizi" alt="Konseling Gizi">
                    <div class="service-icon-badge">
                        <i class="bi bi-apple"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Konseling Gizi</h3>
                    <p class="service-description">Konsultasi nutrisi dan pola makan sehat oleh ahli gizi untuk mendukung pencegahan dan pemulihan penyakit.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Item 10: Surat Rujukan -->
            <div class="service-card">
                <div class="service-image">
                    <img src="https://placehold.co/400x300/349953/ffffff?text=Rujukan" alt="Surat Rujukan">
                    <div class="service-icon-badge">
                        <i class="bi bi-file-earmark-medical"></i>
                    </div>
                </div>
                <div class="service-content">
                    <h3 class="service-title">Surat Rujukan</h3>
                    <p class="service-description">Pelayanan administrasi pembuatan surat rujukan ke fasilitas kesehatan tingkat lanjut dengan proses cepat dan terverifikasi.</p>
                    <div class="service-cta">
                        <a href="#"><i class="bi bi-arrow-right"></i> Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Services Grid -->

    </div>
    <!-- /Services Section Wrapper -->

    <script>
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');

                // Di sini Anda bisa tambahkan logika filtering
                const category = this.textContent;
                console.log('Filter by:', category);
                // Contoh: filterCards(category);
            });
        });
    </script>

</x-landing.app-layout>