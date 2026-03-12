<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active current">Gallery</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Gallery</h1>
            <p>Dokumentasi Kegiatan</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 gallery-item isotope-item filter-nature">
                        <div class="gallery-card">
                            <div class="gallery-img">
                                <img src="{{ asset('MediTrust/assets/img/gallery/WhatsApp Image 2026-02-24 at 07.44.06 (1).jpeg') }}" class="img-fluid" alt="Gallery Image" loading="lazy">
                                <div class="gallery-overlay">
                                    <div class="gallery-info">
                                         <h4>Koordinasi Internal & Pertemuan Rutin</h4>
                                         <p>Pelaksanaan rapat koordinasi di kantor puskesmas guna membahas evaluasi kinerja dan peningkatan mutu layanan bagi masyarakat Kecamatan Binong.</p>
                                        <a href="{{ asset('MediTrust/assets/img/gallery/WhatsApp Image 2026-02-24 at 07.44.06 (1).jpeg') }}" class="glightbox gallery-link" data-gallery="gallery-images">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Gallery Item -->
                </div><!-- End Gallery Container -->
            </div>

        </div>

    </section><!-- /Gallery Section -->
</x-landing.app-layout>
