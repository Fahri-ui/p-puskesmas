<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog') }}">Berita</a></li>
                    <li class="breadcrumb-item active current">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- News Detail Section -->
    <section id="news-detail" class="news-detail section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Article Header -->
                    <article class="article-detail" data-aos="fade-up">
                        <!-- Category Badge -->
                        <div class="mb-3">
                            <span class="badge" style="background-color: #349953; font-size: 14px; padding: 8px 16px;">
                                <i class="bi bi-folder me-1"></i> Teknologi
                            </span>
                        </div>

                        <!-- Article Title -->
                        <h1 class="article-title mb-3">
                            Inovasi Terbaru dalam Teknologi Ramah Lingkungan: Solusi Masa Depan untuk Pembangunan Berkelanjutan
                        </h1>

                        <!-- Article Meta -->
                        <div class="article-meta d-flex align-items-center mb-4 pb-3 border-bottom">
                            <div class="author-info d-flex align-items-center me-4">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}Author" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <div>
                                    <p class="mb-0 fw-semibold">John Doe</p>
                                    <small class="text-muted">Penulis</small>
                                </div>
                            </div>
                            <div class="meta-info">
                                <p class="mb-1 text-muted">
                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                    <small>28 Januari 2026</small>
                                </p>
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-clock me-1" style="color: #349953;"></i>
                                    <small>5 menit baca</small>
                                </p>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-sm btn-outline-secondary me-2" onclick="shareArticle()">
                                    <i class="bi bi-share"></i> Bagikan
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" onclick="bookmarkArticle()">
                                    <i class="bi bi-bookmark"></i> Simpan
                                </button>
                            </div>
                        </div>

                        <!-- Main Featured Image -->
                        <div class="featured-image mb-4" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Featured Image" class="img-fluid rounded-4 shadow-sm w-100" style="max-height: 500px; object-fit: cover;">
                            <p class="text-muted text-center mt-2 mb-0">
                                <small><em>Teknologi ramah lingkungan menjadi solusi pembangunan berkelanjutan di masa depan</em></small>
                            </p>
                        </div>

                        <!-- Article Introduction -->
                        <div class="article-content" data-aos="fade-up" data-aos-delay="200">
                            <p class="lead mb-4" style="font-size: 1.1rem; line-height: 1.8; color: #555;">
                                Dalam era modern ini, kebutuhan akan teknologi yang ramah lingkungan semakin mendesak. 
                                Perubahan iklim dan degradasi lingkungan mendorong para inovator di seluruh dunia untuk 
                                mengembangkan solusi berkelanjutan yang dapat memenuhi kebutuhan manusia tanpa merusak 
                                planet kita. Artikel ini mengulas berbagai inovasi terkini yang membawa harapan baru 
                                untuk masa depan yang lebih hijau.
                            </p>

                            <!-- Section 1 -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-lightbulb me-2"></i>Energi Terbarukan: Fondasi Masa Depan
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Energi terbarukan telah menjadi tulang punggung dalam upaya mengurangi ketergantungan 
                                pada bahan bakar fosil. Panel surya generasi terbaru kini memiliki efisiensi konversi 
                                hingga 40%, jauh melampaui teknologi sebelumnya yang hanya mencapai 20-25%. Inovasi 
                                ini tidak hanya meningkatkan produktivitas energi, tetapi juga mengurangi biaya instalasi 
                                hingga 60% dalam lima tahun terakhir.
                            </p>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Turbin angin lepas pantai juga mengalami perkembangan signifikan. Dengan desain blade 
                                yang lebih aerodinamis dan sistem kontrol berbasis AI, turbin modern dapat menghasilkan 
                                energi 35% lebih banyak dibandingkan model konvensional. Negara-negara seperti Denmark 
                                dan Belanda telah berhasil memenuhi lebih dari 50% kebutuhan listrik mereka dari energi 
                                angin, membuktikan bahwa transisi energi bersih bukan lagi sekadar mimpi.
                            </p>

                            <!-- Gallery Images -->
                            <div class="article-gallery my-5" data-aos="fade-up" data-aos-delay="100">
                                <h4 class="mb-4 text-center" style="color: #349953;">Galeri Inovasi Teknologi</h4>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm">
                                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Gallery 1" class="img-fluid w-100 hover-zoom" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                            <div class="gallery-overlay">
                                                <p class="text-white mb-0"><small>Panel Surya Modern</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm">
                                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Gallery 2" class="img-fluid w-100 hover-zoom" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                            <div class="gallery-overlay">
                                                <p class="text-white mb-0"><small>Turbin Angin Lepas Pantai</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm">
                                            <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Gallery 3" class="img-fluid w-100 hover-zoom" style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                            <div class="gallery-overlay">
                                                <p class="text-white mb-0"><small>Smart Grid Technology</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2 -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-recycle me-2"></i>Ekonomi Sirkular: Mengubah Limbah Menjadi Sumber Daya
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Konsep ekonomi sirkular membawa paradigma baru dalam pengelolaan sumber daya. 
                                Alih-alih model linear "ambil-gunakan-buang", ekonomi sirkular menekankan pada 
                                penggunaan kembali, daur ulang, dan regenerasi material. Startup teknologi di seluruh 
                                dunia kini mengembangkan platform digital yang memfasilitasi pertukaran dan daur ulang 
                                material industri, mengurangi limbah hingga 70%.
                            </p>

                            <!-- Quote Box -->
                            <div class="quote-box my-4 p-4 rounded-3" style="background: linear-gradient(135deg, rgba(52, 153, 83, 0.1) 0%, rgba(52, 153, 83, 0.05) 100%); border-left: 4px solid #349953;" data-aos="fade-up">
                                <blockquote class="mb-0">
                                    <p class="mb-3" style="font-size: 1.1rem; font-style: italic; color: #333;">
                                        "Teknologi ramah lingkungan bukan hanya tentang mengurangi dampak negatif, 
                                        tetapi juga tentang menciptakan sistem yang regeneratif dan berkelanjutan 
                                        untuk generasi mendatang."
                                    </p>
                                    <footer class="blockquote-footer mt-2">
                                        Dr. Sarah Johnson, <cite title="Source Title">Pakar Teknologi Berkelanjutan, MIT</cite>
                                    </footer>
                                </blockquote>
                            </div>

                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Teknologi blockchain juga memainkan peran penting dalam transparansi rantai pasok 
                                material daur ulang. Dengan sistem pelacakan yang terdesentralisasi, konsumen dapat 
                                memverifikasi asal-usul produk dan memastikan bahwa material yang digunakan berasal 
                                dari sumber yang bertanggung jawab. Hal ini tidak hanya meningkatkan kepercayaan 
                                konsumen, tetapi juga mendorong perusahaan untuk mengadopsi praktik yang lebih berkelanjutan.
                            </p>

                            <!-- Section 3 -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-building me-2"></i>Bangunan Hijau: Arsitektur yang Menyatu dengan Alam
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Industri konstruksi bertanggung jawab atas 40% emisi karbon global. Namun, inovasi 
                                dalam material bangunan dan desain arsitektur membawa harapan baru. Beton karbon negatif, 
                                yang menyerap CO2 dari atmosfer selama proses pengeringan, kini telah digunakan dalam 
                                berbagai proyek besar di Eropa dan Amerika Utara. Material ini tidak hanya mengurangi 
                                jejak karbon, tetapi juga lebih tahan lama dan ekonomis dalam jangka panjang.
                            </p>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Sistem HVAC (Heating, Ventilation, and Air Conditioning) pintar menggunakan machine 
                                learning untuk mengoptimalkan konsumsi energi berdasarkan pola penggunaan dan kondisi 
                                cuaca. Teknologi ini dapat mengurangi penggunaan energi hingga 40% tanpa mengorbankan 
                                kenyamanan penghuni. Ditambah dengan sistem pencahayaan LED yang dapat menyesuaikan 
                                intensitas berdasarkan cahaya alami, bangunan hijau modern dapat mencapai efisiensi 
                                energi yang luar biasa.
                            </p>

                            <!-- Info Box -->
                            <div class="info-box my-4 p-4 rounded-3 shadow-sm" style="background-color: #f8f9fa; border: 2px solid #349953;" data-aos="fade-up">
                                <h5 class="mb-3" style="color: #349953;">
                                    <i class="bi bi-info-circle me-2"></i>Fakta Menarik
                                </h5>
                                <ul class="mb-0" style="line-height: 2;">
                                    <li>Bangunan hijau dapat mengurangi konsumsi air hingga 50%</li>
                                    <li>Material daur ulang dalam konstruksi mengurangi limbah hingga 80%</li>
                                    <li>Atap hijau dapat menurunkan suhu bangunan hingga 5°C</li>
                                    <li>Ventilasi alami dapat menghemat biaya pendinginan hingga 60%</li>
                                </ul>
                            </div>

                            <!-- Section 4 -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-truck me-2"></i>Transportasi Berkelanjutan: Mobilitas Tanpa Emisi
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Revolusi kendaraan listrik telah mengubah lanskap industri otomotif secara fundamental. 
                                Dengan peningkatan kapasitas baterai dan infrastruktur pengisian yang semakin luas, 
                                kendaraan listrik kini menjadi pilihan praktis untuk mobilitas sehari-hari. Teknologi 
                                baterai solid-state yang sedang dikembangkan menjanjikan peningkatan jangkauan hingga 
                                800 km dengan waktu pengisian hanya 10 menit.
                            </p>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Tidak hanya kendaraan pribadi, transportasi umum juga mengalami transformasi hijau. 
                                Bus listrik dan kereta hidrogen mulai beroperasi di berbagai kota besar dunia. 
                                Sistem transportasi cerdas yang terintegrasi dengan aplikasi mobile memungkinkan 
                                perencanaan perjalanan yang lebih efisien, mengurangi kemacetan dan emisi. Konsep 
                                Mobility-as-a-Service (MaaS) menggabungkan berbagai mode transportasi dalam satu 
                                platform, mendorong masyarakat untuk beralih dari kepemilikan kendaraan pribadi ke 
                                layanan transportasi bersama.
                            </p>

                            <!-- Section 5 -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-graph-up me-2"></i>Dampak Ekonomi dan Sosial
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Transisi ke teknologi ramah lingkungan tidak hanya memberikan manfaat ekologis, tetapi 
                                juga menciptakan peluang ekonomi yang signifikan. Industri teknologi hijau diproyeksikan 
                                akan menciptakan lebih dari 24 juta lapangan kerja baru secara global pada tahun 2030. 
                                Investasi dalam energi terbarukan dan infrastruktur berkelanjutan telah mencapai lebih 
                                dari $500 miliar per tahun, mencerminkan komitmen global terhadap masa depan yang lebih 
                                hijau.
                            </p>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Dari perspektif sosial, akses terhadap energi bersih dan terjangkau dapat meningkatkan 
                                kualitas hidup masyarakat, terutama di daerah terpencil. Program elektrifikasi desa 
                                menggunakan sistem solar home system telah memberikan akses listrik kepada jutaan 
                                keluarga yang sebelumnya hidup tanpa listrik. Teknologi ini tidak hanya meningkatkan 
                                produktivitas dan pendidikan, tetapi juga membuka peluang ekonomi baru bagi masyarakat 
                                pedesaan.
                            </p>

                            <!-- Conclusion -->
                            <h3 class="mb-3 mt-5" style="color: #349953;">
                                <i class="bi bi-flag-fill me-2"></i>Kesimpulan
                            </h3>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Inovasi dalam teknologi ramah lingkungan telah menunjukkan bahwa pembangunan berkelanjutan 
                                bukan hanya mungkin, tetapi juga menguntungkan secara ekonomi dan sosial. Dari energi 
                                terbarukan hingga transportasi tanpa emisi, dari ekonomi sirkular hingga bangunan hijau, 
                                setiap inovasi membawa kita selangkah lebih dekat ke masa depan yang lebih berkelanjutan.
                            </p>
                            <p style="line-height: 1.8; color: #555; text-align: justify;">
                                Namun, kesuksesan transformasi ini membutuhkan kolaborasi dari semua pihak: pemerintah, 
                                industri, akademisi, dan masyarakat. Dengan kebijakan yang tepat, investasi yang memadai, 
                                dan komitmen bersama, kita dapat menciptakan planet yang lebih sehat dan masa depan yang 
                                lebih cerah untuk generasi mendatang. Teknologi adalah alat, namun perubahan sejati 
                                dimulai dari kesadaran dan tindakan kita setiap hari.
                            </p>
                        </div>

                        <!-- Tags -->
                        <div class="article-tags mt-5 pt-4 border-top" data-aos="fade-up">
                            <h6 class="mb-3" style="color: #349953;">
                                <i class="bi bi-tags-fill me-2"></i>Tags:
                            </h6>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Teknologi</span>
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Lingkungan</span>
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Energi Terbarukan</span>
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Inovasi</span>
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Berkelanjutan</span>
                                <span class="badge bg-light text-dark px-3 py-2" style="font-weight: normal; font-size: 13px;">Green Technology</span>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="article-share mt-4 p-4 rounded-3" style="background-color: #f8f9fa;" data-aos="fade-up">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="mb-0" style="color: #349953;">
                                    <i class="bi bi-share-fill me-2"></i>Bagikan Artikel Ini:
                                </h6>
                                <div class="social-share">
                                    <a href="#" class="btn btn-sm me-2" style="background-color: #1877f2; color: white;">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm me-2" style="background-color: #1da1f2; color: white;">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm me-2" style="background-color: #0a66c2; color: white;">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm me-2" style="background-color: #25d366; color: white;">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm" style="background-color: #6c757d; color: white;">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Author Box -->
                        <div class="author-box mt-5 p-4 rounded-3 shadow-sm" style="background-color: #f8f9fa; border-left: 4px solid #349953;" data-aos="fade-up">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}Author" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <h5 class="mb-2" style="color: #349953;">John Doe</h5>
                                    <p class="text-muted mb-2"><small>Jurnalis Teknologi & Lingkungan</small></p>
                                    <p class="mb-3" style="line-height: 1.6; color: #555;">
                                        John adalah seorang jurnalis senior dengan pengalaman lebih dari 10 tahun dalam 
                                        meliput isu-isu teknologi dan lingkungan. Beliau telah menulis ratusan artikel 
                                        dan berkontribusi pada berbagai publikasi internasional terkemuka.
                                    </p>
                                    <div class="author-social">
                                        <a href="#" class="me-3" style="color: #349953;"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="me-3" style="color: #349953;"><i class="bi bi-twitter"></i></a>
                                        <a href="#" style="color: #349953;"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar" data-aos="fade-up" data-aos-delay="100">
                        
                        <!-- Search Box -->
                        <div class="sidebar-widget search-widget mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="widget-title mb-3" style="color: #349953;">
                                        <i class="bi bi-search me-2"></i>Cari Berita
                                    </h5>
                                    <form action="#" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari artikel..." name="search">
                                            <button class="btn" type="submit" style="background-color: #349953; color: white;">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Posts -->
                        <div class="sidebar-widget recent-posts mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-newspaper me-2"></i>Berita Terkini
                                    </h5>
                                    
                                    <div class="recent-post-item d-flex mb-3 pb-3 border-bottom">
                                        <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Recent" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="#" class="text-dark" style="text-decoration: none; line-height: 1.4;">
                                                    Startup Indonesia Raih Pendanaan $10 Juta
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                27 Jan 2026
                                            </small>
                                        </div>
                                    </div>

                                    <div class="recent-post-item d-flex mb-3 pb-3 border-bottom">
                                        <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Recent" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="#" class="text-dark" style="text-decoration: none; line-height: 1.4;">
                                                    Peluncuran Satelit Komunikasi Terbaru
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                26 Jan 2026
                                            </small>
                                        </div>
                                    </div>

                                    <div class="recent-post-item d-flex mb-3 pb-3 border-bottom">
                                        <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Recent" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="#" class="text-dark" style="text-decoration: none; line-height: 1.4;">
                                                    AI dalam Pendidikan Meningkat 200%
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                25 Jan 2026
                                            </small>
                                        </div>
                                    </div>

                                    <div class="recent-post-item d-flex">
                                        <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="Recent" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="#" class="text-dark" style="text-decoration: none; line-height: 1.4;">
                                                    Program Pelatihan Digital Gratis
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                24 Jan 2026
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar-widget categories-widget mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-folder me-2"></i>Kategori
                                    </h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Teknologi</span>
                                                <span class="badge" style="background-color: #349953;">42</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Bisnis</span>
                                                <span class="badge" style="background-color: #349953;">38</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Lingkungan</span>
                                                <span class="badge" style="background-color: #349953;">29</span>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Inovasi</span>
                                                <span class="badge" style="background-color: #349953;">24</span>
                                            </a>
                                        </li>
                                        <li class="mb-0">
                                            <a href="#" class="d-flex justify-content-between align-items-center text-decoration-none">
                                                <span><i class="bi bi-chevron-right me-2" style="color: #349953;"></i>Pendidikan</span>
                                                <span class="badge" style="background-color: #349953;">18</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Newsletter -->
                        <div class="sidebar-widget newsletter-widget mb-4">
                            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #349953 0%, #2d8347 100%);">
                                <div class="card-body text-white p-4">
                                    <h5 class="widget-title mb-3 text-white">
                                        <i class="bi bi-envelope-heart me-2"></i>Newsletter
                                    </h5>
                                    <p class="mb-3" style="font-size: 14px;">
                                        Dapatkan berita terbaru langsung ke email Anda setiap minggu!
                                    </p>
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email Anda" required>
                                        </div>
                                        <button type="submit" class="btn btn-light w-100" style="color: #349953; font-weight: 600;">
                                            <i class="bi bi-send me-2"></i>Berlangganan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Popular Tags -->
                        <div class="sidebar-widget tags-widget">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-tags me-2"></i>Tag Populer
                                    </h5>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">AI</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Blockchain</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">IoT</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Cloud</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Mobile</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Startup</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Digital</a>
                                        <a href="#" class="badge bg-light text-dark px-3 py-2" style="text-decoration: none; font-weight: normal;">Innovation</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section><!-- /News Detail Section -->

    <!-- Additional CSS -->
    <style>
        .article-detail {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .article-title {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.3;
            color: #2c3e50;
        }

        .article-meta {
            font-size: 14px;
        }

        .featured-image img {
            transition: transform 0.3s ease;
        }

        .featured-image:hover img {
            transform: scale(1.02);
        }

        .article-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2rem;
        }

        .gallery-item {
            cursor: pointer;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
            padding: 15px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .quote-box blockquote p {
            position: relative;
        }

        .quote-box blockquote p::before {
            content: '"';
            font-size: 3rem;
            position: absolute;
            left: -20px;
            top: -10px;
            color: #349953;
            opacity: 0.3;
        }

        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            margin-bottom: 30px;
        }

        .widget-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .recent-post-item h6 a:hover {
            color: #349953 !important;
        }

        .categories-widget a:hover {
            color: #349953 !important;
        }

        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(52, 153, 83, 0.2) !important;
        }

        .social-share a {
            transition: all 0.3s ease;
        }

        .social-share a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .author-box {
            transition: all 0.3s ease;
        }

        .author-box:hover {
            transform: translateY(-5px);
        }

        @media (max-width: 992px) {
            .article-detail {
                padding: 25px;
            }

            .article-title {
                font-size: 1.8rem;
            }

            .sidebar {
                position: relative;
                top: 0;
                margin-top: 40px;
            }
        }

        @media (max-width: 768px) {
            .article-meta {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .article-meta .ms-auto {
                margin-top: 15px;
                margin-left: 0 !important;
            }
        }
    </style>

    <!-- JavaScript -->
    <script>
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: document.querySelector('.article-title').textContent,
                    url: window.location.href
                }).catch(console.error);
            } else {
                alert('Fitur berbagi tidak didukung di browser Anda');
            }
        }

        function bookmarkArticle() {
            alert('Artikel telah disimpan!');
        }
    </script>

</x-landing.app-layout>