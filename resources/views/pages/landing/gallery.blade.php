<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active current">Galeri</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Galeri</h1>
            <p>Dokumentasi Kegiatan</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <div class="row g-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @forelse ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6 gallery-item isotope-item">
                            <div class="gallery-card">
                                <div class="gallery-img">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="{{ $gallery->title }}" loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-info">
                                            <h4>{{ $gallery->title }}</h4>
                                            <p>{{ $gallery->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                    @empty
                        <div class="col-12 text-center">
                            <p>Belum ada data gallery.</p>
                        </div>
                    @endforelse

                </div><!-- End Gallery Container -->
            </div>

        </div>

    </section><!-- /Gallery Section -->
</x-landing.app-layout>
