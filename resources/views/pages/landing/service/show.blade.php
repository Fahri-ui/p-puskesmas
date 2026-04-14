<x-landing.app-layout>

    <style>
        

        .service-detail {
            padding-top: 0;
            padding-bottom: 0;
        }

        .service-card-panel {
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 35px 90px rgba(52, 153, 83, 0.08);
            border: 1px solid rgba(52, 153, 83, 0.1);
            padding: 2rem;
        }

        .service-image-wrapper {
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(52, 153, 83, 0.12);
            background: #f6fbf6;
        }

        .service-image-wrapper img {
            display: block;
            width: 100%;
            height: auto;
        }

        .service-content {
            padding-left: 1rem;
        }

        .service-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .service-meta-item {
            display: flex;
            gap: 0.85rem;
            align-items: flex-start;
            padding: 1rem 1.1rem;
            border-radius: 18px;
            background: rgba(52, 153, 83, 0.1);
            border: 1px solid rgba(52, 153, 83, 0.14);
            color: #1f4531;
        }

        .service-meta-item i {
            font-size: 1.35rem;
            color: #30955e;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .meta-label {
            display: block;
            font-size: 0.84rem;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            font-weight: 700;
            color: #184121;
            margin-bottom: 0.15rem;
        }

        .meta-value {
            font-size: 1rem;
            line-height: 1.7;
            color: #354d42;
        }

        .long-description {
            color: #4a5d4e;
            font-size: 1rem;
            line-height: 1.95;
        }

        .long-description p {
            margin-bottom: 1.4rem;
        }

        @media (max-width: 991px) {
            .service-card-panel {
                padding: 1.75rem;
            }

            .service-content {
                padding-left: 0;
            }
        }

        @media (max-width: 767px) {
            .page-title {
                padding: 1.75rem 1rem 1.25rem;
            }

            .service-card-panel {
                padding: 1.5rem;
            }

            .title-wrapper h1 {
                font-size: 2.2rem;
            }

            .service-meta {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .page-title {
                border-radius: 24px;
                padding: 1.5rem 0.9rem 1.1rem;
            }

            .service-card-panel {
                border-radius: 24px;
                padding: 1.25rem;
            }

            .short-description {
                font-size: 1rem;
            }
        }
    </style>


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
            <div class="service-card-panel">
                <div class="row gy-5 align-items-center">

                <!-- Service Image -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-image-wrapper">
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://placehold.co/800x600/349953/ffffff?text=' . urlencode($service->name) }}"
                            alt="{{ $service->name }}" class="img-fluid rounded-4 shadow-sm">
                    </div>
                    <div class="service-meta mt-4">
                        @if($service->jam_buka || $service->jam_tutup)
                            <div class="service-meta-item">
                                <i class="bi bi-clock-fill"></i>
                                <div>
                                    <span class="meta-label">Jam Operasional</span>
                                    <span class="meta-value">
                                        @if($service->jam_buka && $service->jam_tutup)
                                            {{ $service->jam_buka }} - {{ $service->jam_tutup }}
                                        @elseif($service->jam_buka)
                                            {{ $service->jam_buka }}
                                        @else
                                            {{ $service->jam_tutup }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endif

                        @if($service->open_days)
                            <div class="service-meta-item">
                                <i class="bi bi-calendar-check-fill"></i>
                                <div>
                                    <span class="meta-label">Open Days</span>
                                    <span class="meta-value">{{ $service->open_days }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Service Long Description -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="service-content">
                        <div class="long-description">
                            {!! nl2br(e($service->deskripsi)) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-landing.app-layout>
