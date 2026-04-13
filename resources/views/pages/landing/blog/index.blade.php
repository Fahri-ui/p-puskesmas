<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="container">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper text-center mt-4">
                <h1>Berita</h1>
                <p class="mt-2">Temukan update terkini seputar layanan, kegiatan, dan informasi kesehatan dari Puskesmas Binong.</p>
            </div>
        </div>
    </div><!-- End Page Title -->

    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">

                    <!-- Featured News -->
                    @if($featuredNews)
                    <div class="featured-news mb-5" data-aos="fade-up">
                        <div class="card border-0 shadow-lg overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    {{-- Gunakan kolom `image` sebagai gambar utama --}}
                                    <div class="featured-image" style="height: 100%; min-height: 350px; background: url('{{ $featuredNews->image ? asset($featuredNews->image) : asset('MediTrust/assets/img/gallery/anak.Jpg.webp') }}') center/cover; position: relative;">
                                        <div class="featured-badge" style="position: absolute; top: 20px; left: 20px; background-color: #349953; color: white; padding: 8px 20px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                                            <i class="bi bi-star-fill me-1"></i>Terbaru
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-4 d-flex flex-column h-100">
                                        <div class="mb-2">
                                            <span class="badge mb-2" style="background-color: rgba(52, 153, 83, 0.1); color: #349953; font-weight: 500;">
                                                <i class="bi bi-folder me-1"></i>{{ $featuredNews->category?->nama_kategori ?? 'Umum' }}
                                            </span>
                                        </div>
                                        <h3 class="card-title mb-3" style="color: #2c3e50; line-height: 1.4;">
                                            <a href="{{ route('blog.show', $featuredNews->slug) }}" class="text-decoration-none text-dark hover-link">
                                                {{ $featuredNews->title }}
                                            </a>
                                        </h3>
                                        <p class="card-text text-muted mb-4" style="line-height: 1.7;">
                                            {{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 150) }}
                                        </p>
                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    {{ $featuredNews->published_at->format('d F Y') }}
                                                </small>
                                                <a href="{{ route('blog.show', $featuredNews->slug) }}" class="btn btn-sm" style="background-color: #349953; color: white;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- News List -->
                    <div class="news-list">
                        @forelse($news as $item)
                        <div class="news-item mb-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm hover-card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        {{-- Tidak ada kolom thumbnail; gunakan `image` sebagai gantinya --}}
                                        <div class="news-thumbnail" style="height: 100%; min-height: 200px; background: url('{{ $item->image ? asset($item->image) : asset('MediTrust/assets/img/gallery/olahraga.webp') }}') center/cover; border-radius: 8px 0 0 8px; position: relative;">
                                            <div class="category-badge" style="position: absolute; top: 15px; left: 15px; background-color: #349953; color: white; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">
                                                {{ $item->category?->nama_kategori ?? 'Umum' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">
                                                <a href="{{ route('blog.show', $item->slug) }}" class="text-decoration-none text-dark hover-link">
                                                    {{ $item->title }}
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted mb-3" style="line-height: 1.6; font-size: 14px;">
                                                {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    {{ $item->published_at->format('d F Y') }}
                                                </small>
                                                <a href="{{ route('blog.show', $item->slug) }}" class="btn btn-sm btn-outline-success" style="border-color: #349953; color: #349953;">
                                                    Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i>
                            Belum ada berita yang tersedia.
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($news->hasPages())
                    <div class="pagination-wrapper mt-5" data-aos="fade-up">
                        {{ $news->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    @endif

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar" data-aos="fade-up" data-aos-delay="100">

                        <!-- Search + Categories -->
                        <div class="sidebar-widget search-categories mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-3" style="color: #349953;">
                                        <i class="bi bi-search me-2"></i>Cari Berita
                                    </h5>

                                    <form action="{{ route('blog') }}" method="GET" class="mb-3">
                                        <div class="input-group">
                                            <input type="search" name="q" class="form-control" placeholder="Cari berita atau kategori..." value="{{ $search ?? '' }}">
                                            <button class="btn" type="submit" style="background-color: #349953; color: white;">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <div class="mb-3" style="height:1px;background:#e9ecef"></div>

                                    <h6 class="mb-3" style="font-weight:600;">Kategori</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <a href="{{ route('blog') }}" class="d-flex justify-content-between align-items-center text-decoration-none {{ !$categoryId ? 'text-success fw-bold' : 'text-dark' }} hover-link">
                                                <span>
                                                    <i class="bi bi-chevron-right me-2" style="color: {{ !$categoryId ? '#349953' : '#6c757d' }};"></i>Semua Kategori
                                                </span>
                                            </a>
                                        </li>
                                        @foreach($categories as $category)
                                        <li class="mb-2">
                                            <a href="{{ route('blog', ['category' => $category->id]) }}" class="d-flex justify-content-between align-items-center text-decoration-none {{ $categoryId == $category->id ? 'text-success fw-bold' : 'text-dark' }} hover-link">
                                                <span>
                                                    <i class="bi bi-chevron-right me-2" style="color: {{ $categoryId == $category->id ? '#349953' : '#6c757d' }};"></i>{{ $category->nama_kategori }}
                                                </span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Berita Terbaru (Sidebar) -->
                        @if($popularNews->count() > 0)
                        <div class="sidebar-widget popular-news mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-fire me-2"></i>Berita Terbaru
                                    </h5>

                                    @foreach($popularNews as $popular)
                                    <div class="popular-item mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                        <div class="d-flex">
                                            {{-- Gunakan `image` sebagai gambar sidebar --}}
                                            <div class="popular-thumbnail me-3" style="width: 80px; height: 80px; background: url('{{ $popular->image ? asset($popular->image) : asset('MediTrust/assets/img/gallery/stress.Jpg') }}') center/cover; border-radius: 8px; flex-shrink: 0;"></div>
                                            <div>
                                                <h6 class="mb-2" style="font-size: 14px; line-height: 1.4;">
                                                    <a href="{{ route('blog.show', $popular->slug) }}" class="text-dark text-decoration-none hover-link">
                                                        {{ Str::limit($popular->title, 50) }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                    {{ $popular->published_at->format('d M Y') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                    </aside>
                </div>
            </div>
        </div>
    </section><!-- End News Section -->

    <!-- Additional CSS -->
    <style>
        .pagination-wrapper { margin-top: 40px; }
        .pagination-wrapper .pagination { display: flex; justify-content: center; flex-wrap: wrap; gap: 5px; padding: 0; margin: 0; }
        .pagination-wrapper .page-link { padding: 0.5rem 1rem; font-weight: 500; transition: all 0.3s ease; border: 1px solid #dee2e6; color: #6c757d; background-color: #fff; border-radius: 8px !important; min-width: 40px; display: flex; align-items: center; justify-content: center; text-decoration: none; }
        .pagination-wrapper .page-link:hover { background-color: rgba(52, 153, 83, 0.1); color: #349953; border-color: #349953; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(52, 153, 83, 0.15); }
        .pagination-wrapper .page-item.active .page-link { background-color: #349953; border-color: #349953; color: #fff; box-shadow: 0 5px 15px rgba(52, 153, 83, 0.3); transform: translateY(-2px); }
        .pagination-wrapper .page-item.disabled .page-link { color: #adb5bd; background-color: #f8f9fa; border-color: #dee2e6; cursor: not-allowed; transform: none; box-shadow: none; opacity: 0.6; }
        .featured-news .card { transition: all 0.3s ease; }
        .featured-news .card:hover { transform: translateY(-10px); box-shadow: 0 20px 50px rgba(52, 153, 83, 0.2) !important; }
        .hover-link { transition: color 0.3s ease; }
        .hover-link:hover { color: #349953 !important; }
        .hover-card { transition: all 0.3s ease; }
        .hover-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(52, 153, 83, 0.15) !important; }
        .news-thumbnail { position: relative; overflow: hidden; }
        .category-badge { transition: all 0.3s ease; }
        .hover-card:hover .category-badge { transform: scale(1.1); }
        .sidebar { position: sticky; top: 100px; }
        .sidebar-widget .card { transition: all 0.3s ease; }
        .sidebar-widget .card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(52, 153, 83, 0.15) !important; }
        .popular-thumbnail { transition: all 0.3s ease; }
        .popular-item:hover .popular-thumbnail { transform: scale(1.05); }
        .btn { transition: all 0.3s ease; }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(52, 153, 83, 0.3); }

        @media (max-width: 992px) {
            .sidebar { position: relative; top: 0; margin-top: 40px; }
            .featured-news .row { flex-direction: column; }
            .featured-news .featured-image { min-height: 250px !important; }
        }
        @media (max-width: 768px) {
            .news-item .row { flex-direction: column; }
            .news-thumbnail { min-height: 180px !important; border-radius: 8px 8px 0 0 !important; }
        }
    </style>

</x-landing.app-layout>
