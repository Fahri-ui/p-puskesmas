<x-landing.app-layout>

    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                    <li class="breadcrumb-item active current">Detail Layanan</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Poli Umum</h1>
            <p class="short-description">Pelayanan kesehatan dasar untuk pemeriksaan umum, pengobatan penyakit ringan, konsultasi medis, dan rujukan awal oleh dokter umum berpengalaman.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Detail Content -->
    <section id="service-detail" class="service-detail section py-5">
        <div class="container">
            <div class="row gy-5 align-items-center">
                
                <!-- Service Image -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-image-wrapper">
                        <img src="{{ asset('MediTrust/assets/img/health/cardiology-3.webp') }}" 
                             alt="Poli Umum Puskesmas Binong" 
                             class="img-fluid rounded-4 shadow-sm">
                    </div>
                </div>

                <!-- Service Long Description -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="service-content">
                        <div class="long-description">
                            <p>Poli Umum merupakan layanan pertama yang dapat diakses masyarakat untuk mendapatkan pemeriksaan kesehatan dasar. Dokter umum kami siap melakukan anamnesa, pemeriksaan fisik, diagnosis awal, serta penanganan untuk keluhan kesehatan yang bersifat umum dan tidak gawat.</p>
                            
                            <p>Layanan ini juga mencakup edukasi kesehatan, skrining faktor risiko penyakit, serta koordinasi rujukan ke poli spesialis atau fasilitas kesehatan tingkat lanjut bila diperlukan. Kami berkomitmen memberikan pelayanan yang ramah, cepat, dan sesuai standar prosedur operasional Puskesmas.</p>
                            
                            <p>Pasien dapat memperoleh informasi mengenai pola hidup sehat, pencegahan penyakit, dan penanganan awal kondisi medis melalui konsultasi langsung dengan tenaga kesehatan profesional.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- /Service Detail Content -->

</x-landing.app-layout>