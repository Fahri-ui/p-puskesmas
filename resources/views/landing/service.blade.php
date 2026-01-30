<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Layanan</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Layanan Kami</h1>
        <p>Berbagai layanan kesehatan berkualitas untuk memenuhi kebutuhan Anda</p>
      </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="departments" class="departments section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        @if($services->isEmpty())
          <div class="row">
            <div class="col-12">
              <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle"></i> Belum ada layanan yang tersedia.
              </div>
            </div>
          </div>
        @else
          <div class="row gy-4">
            @php
              $delay = 200;
            @endphp

            @foreach($services->chunk(2) as $column)
              <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $delay }}">
                @foreach($column as $service)
                  <div class="department-card" data-aos="zoom-in" data-aos-delay="{{ $delay + 50 }}">
                    <div class="department-header">
                      <div class="department-icon">
                        @php
                          $iconSvg = '';
                          switch($service->icon) {
                              case 'stethoscope':
                                  $iconSvg = '<i class="bi bi-heart-pulse"></i>';
                                  break;
                              case 'microscope':
                                  $iconSvg = '<i class="bi bi-droplet"></i>';
                                  break;
                              case 'syringe':
                                  $iconSvg = '<i class="bi bi-bandage"></i>';
                                  break;
                              case 'clipboard':
                                  $iconSvg = '<i class="bi bi-clipboard-check"></i>';
                                  break;
                              case 'user-group':
                                  $iconSvg = '<i class="bi bi-people"></i>';
                                  break;
                              case 'clock':
                                  $iconSvg = '<i class="bi bi-clock"></i>';
                                  break;
                              case 'home':
                                  $iconSvg = '<i class="bi bi-house-heart"></i>';
                                  break;
                              case 'plus-circle':
                                  $iconSvg = '<i class="bi bi-plus-circle"></i>';
                                  break;
                              default:
                                  $iconSvg = '<i class="bi bi-hospital"></i>';
                          }
                        @endphp
                        {!! $iconSvg !!}
                      </div>
                      <h3>{{ $service->nama_layanan }}</h3>
                      <p class="department-subtitle">{{ Str::limit($service->deskripsi, 50, '...') }}</p>
                    </div>
                    <div class="department-image-wrapper">
                      <img src="{{ asset('MediTrust/assets/img/gallery/gallery-1.webp') }}" alt="{{ $service->nama_layanan }}" class="img-fluid" loading="lazy">
                      <div class="department-stats">
                        <div class="stat-item">
                          <span class="stat-number">Urutan {{ $service->urutan }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="department-content">
                      <p>{{ $service->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                      <ul class="department-highlights">
                        <li><i class="bi bi-check2"></i> Layanan profesional</li>
                        <li><i class="bi bi-check2"></i> Tim berpengalaman</li>
                        <li><i class="bi bi-check2"></i> Fasilitas lengkap</li>
                      </ul>
                      <a href="javascript:void(0)" class="department-link">Pelajari Lebih Lanjut</a>
                    </div>
                  </div>
                  @php $delay += 50; @endphp
                @endforeach
              </div>
            @endforeach
          </div>
        @endif

      </div>

    </section><!-- /Services Section -->
</x-landing.app-layout>