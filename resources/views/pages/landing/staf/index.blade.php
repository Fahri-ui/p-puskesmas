<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Staf</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Staf</h1>
            <p>Tenaga kesehatan kami terdiri dari para profesional yang berdedikasi dalam memberikan pelayanan medis yang aman, ramah, dan berkualitas bagi masyarakat</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                @forelse ($stafs as $staf)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset($staf->foto) }}" alt="{{ $staf->nama }}"
                                class="img-fluid">
                        </div>
                        <div class="doctor-content">
                            <h4 class="doctor-name">{{ $staf->nama }}</h4>
                            <span class="doctor-specialty">{{ $staf->profesi }}</span>
                            <a href="{{ route('staf.show', $staf->id) }}" class="btn-appointment">Selengkapnya</a>
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

    </section><!-- /Doctors Section -->
</x-landing.app-layout>
