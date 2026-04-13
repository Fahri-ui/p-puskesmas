<x-landing.app-layout>

    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="bi bi-house"></i> Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('service') }}">Layanan</a>
                    </li>
                    <li class="breadcrumb-item active current">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>{{ $service->name }}</h1>
            <p class="short-description">{{ $service->excerpt }}</p>
        </div>
    </div>

    <!-- Service Detail Content -->
    <section id="service-detail" class="service-detail section py-5">
        <div class="container">
            <div class="row gy-5 align-items-center">

                <!-- Service Image -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-image-wrapper">
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/800x600/349953/ffffff?text=' . urlencode($service->name) }}"
                            alt="{{ $service->name }}" class="img-fluid rounded-4 shadow-sm">
                    </div>
                </div>

                <!-- Service Long Description -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="service-content">
                        @if($service->jam_buka || $service->jam_tutup)
                            <p class="text-sm text-slate-600 mb-4"><strong>Jam Operasional:</strong>
                                @if($service->jam_buka && $service->jam_tutup)
                                    {{ $service->jam_buka }} - {{ $service->jam_tutup }}
                                @elseif($service->jam_buka)
                                    {{ $service->jam_buka }}
                                @else
                                    {{ $service->jam_tutup }}
                                @endif
                            </p>
                        @endif
                        @if($service->open_days)
                            <p class="text-sm text-slate-600 mb-4"><strong>Open Days:</strong> {{ $service->open_days }}</p>
                        @endif
                        <div class="long-description">
                            {!! nl2br(e($service->deskripsi)) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-landing.app-layout>
