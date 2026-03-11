<x-landing.app-layout :title="$blog->title">
    <!-- Page Title -->
    <div class="page-title">
        <div class="container">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <!-- News Detail Section -->
    <section id="news-detail" class="news-detail section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <article class="article-detail" data-aos="fade-up">
                        <!-- Category Badge -->
                        @if($blog->category)
                        <div class="mb-3">
                            <span class="badge" style="background-color: #349953; font-size: 14px; padding: 8px 16px;">
                                <i class="bi bi-folder me-1"></i> {{ $blog->category->d }}
                            </span>
                        </div>
                        @endif

                        <!-- Article Title -->
                        <h1 class="article-title mb-3">
                            {{ $blog->title }}
                        </h1>

                        <!-- Article Meta -->
                        <div class="article-meta d-flex align-items-center mb-4 pb-3 border-bottom">
                            <div class="author-info d-flex align-items-center me-4">
                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2" 
                                     style="width: 40px; height: 40px; font-weight: bold;">
                                    P
                                </div>
                                <div>
                                    <p class="mb-0 fw-semibold">Puskesmas Binong</p>
                                    <small class="text-muted">Penulis</small>
                                </div>
                            </div>
                            
                            <div class="meta-info">
                                <p class="mb-1 text-muted">
                                    <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                    <small>{{ $blog->published_at->format('d F Y') }}</small>
                                </p>
                                <p class="mb-0 text-muted">
                                    <i class="bi bi-eye me-1" style="color: #349953;"></i>
                                    <small>{{ number_format($blog->views) }} dilihat</small>
                                </p>
                            </div>
                        </div>

                        <!-- Main Featured Image -->
                        @if($blog->image)
                        <div class="featured-image mb-4" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset($blog->image) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="img-fluid rounded-4 shadow-sm w-100" 
                                 style="max-height: 500px; object-fit: cover;">
                            @if($blog->excerpt)
                            <p class="text-muted text-center mt-2 mb-0">
                                <small><em>{{ $blog->excerpt }}</em></small>
                            </p>
                            @endif
                        </div>
                        @endif

                        <!-- Article Content -->
                        <div class="article-content" data-aos="fade-up" data-aos-delay="200">
                            <!-- Excerpt/Lead -->
                            @if($blog->excerpt)
                            <p class="lead mb-4" style="font-size: 1.1rem; line-height: 1.8; color: #555;">
                                {{ $blog->excerpt }}
                            </p>
                            @endif

                            <!-- Main Content -->
                            <div class="article-body" style="line-height: 1.8; color: #555; text-align: justify;">
                                {!! nl2br(e($blog->content)) !!}
                            </div>
                        </div>

                        <!-- Related Posts -->
                        @if($relatedPosts->count() > 0)
                        <div class="related-posts mt-5 pt-4 border-top" data-aos="fade-up">
                            <h5 class="mb-4" style="color: #349953;">
                                <i class="bi bi-newspaper me-2"></i>Artikel Terkait
                            </h5>

                            <div class="row g-4">
                                @foreach($relatedPosts as $related)
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm hover-card h-100">
                                        @if($related->thumbnail || $related->image)
                                        <div style="height: 200px; background: url('{{ $related->thumbnail ? asset($related->thumbnail) : asset($related->image) }}') center/cover; border-radius: 8px 8px 0 0;"></div>
                                        @endif
                                        <div class="card-body">
                                            <span class="badge mb-2" style="background-color: rgba(52, 153, 83, 0.1); color: #349953;">
                                                <i class="bi bi-folder me-1"></i>{{ $related->category?->d ?? 'Umum' }}
                                            </span>
                                            <h6 class="card-title mb-2">
                                                <a href="{{ route('blog.show', $related->slug) }}" class="text-dark text-decoration-none hover-link">
                                                    {{ $related->title }}
                                                </a>
                                            </h6>
                                            <p class="card-text text-muted small">
                                                {{ $related->excerpt ? Str::limit($related->excerpt, 80) : Str::limit(strip_tags($related->content), 80) }}
                                            </p>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1"></i>
                                                {{ $related->published_at->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

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
                                    <form action="{{ route('blog') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control" 
                                                   placeholder="Cari artikel..." 
                                                   name="q"
                                                   value="{{ request('q') }}">
                                            <button class="btn" type="submit" style="background-color: #349953; color: white;">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Posts -->
                        @if($recentPosts->count() > 0)
                        <div class="sidebar-widget recent-posts mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="widget-title mb-4" style="color: #349953;">
                                        <i class="bi bi-newspaper me-2"></i>Berita Terkini
                                    </h5>
                                    
                                    @foreach($recentPosts as $recent)
                                    <div class="recent-post-item d-flex mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                        @if($recent->thumbnail || $recent->image)
                                        <img src="{{ $recent->thumbnail ? asset($recent->thumbnail) : asset($recent->image) }}" 
                                             alt="{{ $recent->title }}" 
                                             class="rounded me-3" 
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="{{ route('blog.show', $recent->slug) }}" 
                                                   class="text-dark text-decoration-none hover-link" 
                                                   style="line-height: 1.4;">
                                                    {{ Str::limit($recent->title, 60) }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar-event me-1" style="color: #349953;"></i>
                                                {{ $recent->published_at->format('d M Y') }}
                                            </small>
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
    </section><!-- /News Detail Section -->

    <!-- Additional CSS -->
    <style>
        .article-detail {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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
            border-radius: 12px;
        }

        .featured-image:hover img {
            transform: scale(1.02);
        }

        .article-body h2,
        .article-body h3,
        .article-body h4 {
            color: #349953;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .article-body p {
            margin-bottom: 1.5rem;
        }

        .article-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .gallery-item {
            cursor: pointer;
            overflow: hidden;
            border-radius: 8px;
        }

        .gallery-item img {
            transition: transform 0.3s ease;
            height: 250px;
            object-fit: cover;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, transparent 100%);
            padding: 15px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .quote-box {
            background: linear-gradient(135deg, rgba(52, 153, 83, 0.1) 0%, rgba(52, 153, 83, 0.05) 100%);
            border-left: 4px solid #349953;
            padding: 25px;
            border-radius: 8px;
            margin: 2rem 0;
        }

        .quote-box blockquote p {
            position: relative;
            font-style: italic;
            font-size: 1.1rem;
            color: #333;
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

        .hover-link:hover {
            color: #349953 !important;
        }

        .hover-card {
            transition: all 0.3s ease;
            height: 100%;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(52, 153, 83, 0.2) !important;
        }

        .social-share a {
            transition: all 0.3s ease;
        }

        .social-share a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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

            .social-share {
                flex-wrap: wrap;
            }

            .social-share a {
                margin-bottom: 5px;
            }
        }
    </style>

    <!-- JavaScript -->
    <script>
        function shareArticle() {
            const title = '{{ $blog->title }}';
            const url = window.location.href;
            
            if (navigator.share) {
                navigator.share({
                    title: title,
                    url: url
                }).catch(console.error);
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link artikel telah disalin ke clipboard!');
                });
            }
        }

        function bookmarkArticle() {
            // Simple localStorage implementation
            let bookmarks = JSON.parse(localStorage.getItem('blog_bookmarks') || '[]');
            
            const bookmark = {
                id: {{ $blog->id }},
                title: '{{ $blog->title }}',
                url: window.location.href,
                date: new Date().toISOString()
            };
            
            // Check if already bookmarked
            const exists = bookmarks.some(b => b.id === {{ $blog->id }});
            
            if (exists) {
                alert('Artikel ini sudah ada di bookmark!');
            } else {
                bookmarks.push(bookmark);
                localStorage.setItem('blog_bookmarks', JSON.stringify(bookmarks));
                alert('Artikel berhasil disimpan ke bookmark!');
            }
        }

        function copyLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Link berhasil disalin!');
            });
        }
    </script>

</x-landing.app-layout>