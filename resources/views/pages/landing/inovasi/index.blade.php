<x-landing.app-layout>
    <!-- Hero Section -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Beranda</a>
                    </li>
                    <li class="breadcrumb-item active current">Inovasi</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Inovasi</h1>
            <p>Melalui berbagai inovasi layanan, Puskesmas Binong berkomitmen menghadirkan pelayanan kesehatan yang
                lebih responsif, mudah diakses, dan berfokus pada kebutuhan masyarakat.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Inovasi Content Section -->
    <section id="inovasi" class="section">
        <div class="container" data-aos="fade-up">

            <div class="inovasi-intro-wrapper">
                <span class="inovasi-badge">
                    <i class="bi bi-lightbulb-fill"></i> Tentang Program
                </span>

                <p class="desc-text">
                    Puskesmas Binong terus berupaya menghadirkan inovasi-inovasi layanan kesehatan yang berpihak pada
                    masyarakat. Mulai dari digitalisasi pendaftaran, layanan konsultasi jarak jauh, hingga program
                    deteksi dini berbasis komunitas — setiap inovasi dirancang untuk memperpendek jarak antara
                    masyarakat dan layanan kesehatan yang berkualitas.
                </p>
                <p class="desc-text">
                    Kami percaya bahwa teknologi dan semangat kolaborasi adalah kunci untuk menciptakan sistem kesehatan
                    yang tangguh. Dengan melibatkan kader, tokoh masyarakat, dan tenaga medis secara sinergis, inovasi
                    kami tidak hanya menjawab tantangan hari ini, tetapi juga menyiapkan fondasi pelayanan yang lebih
                    baik untuk generasi mendatang.
                </p>
            </div>

            <div class="inovasi-section-header">
                <div class="inovasi-section-title">
                    <span class="dot"></span>
                    Program Unggulan
                </div>
                <div class="inovasi-divider-line"></div>
            </div>

            <div class="innovation-grid">
                @forelse ($inovasis as $inovasi)
                    <div class="innovation-card">
                        <div class="card-accent-bar"></div>
                        <div class="card-header-row">
                            <div class="card-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <span class="card-tag">Inovasi</span>
                        </div>
                        <p class="card-title">{{ $inovasi->title }}</p>
                        <p class="card-desc">{{ $inovasi->description ?: 'Detail inovasi belum tersedia.' }}</p>
                        @if ($inovasi->file_path)
                            <a href="{{ asset('storage/' . $inovasi->file_path) }}" target="_blank" class="btn-more">
                                Unduh PPT <i class="bi bi-arrow-up-right"></i>
                            </a>
                        @else
                            <span class="text-sm text-slate-500">File belum tersedia.</span>
                        @endif
                    </div>
                @empty
                    <div class="innovation-card">
                        <div class="card-accent-bar"></div>
                        <div class="card-header-row">
                            <div class="card-icon">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <span class="card-tag">Info</span>
                        </div>
                        <p class="card-title">Belum ada inovasi</p>
                        <p class="card-desc">Silakan cek kembali nanti. Dokumentasi inovasi akan ditambahkan oleh admin.</p>
                    </div>
                @endforelse
            </div><!-- End Innovation Grid -->

        </div>
    </section><!-- End Inovasi Section -->

</x-landing.app-layout>

<style>
    /* ── Badge ── */
    .inovasi-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eaf5ed;
        color: #349953;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 99px;
        border: 1px solid #b6dfc1;
        margin-bottom: 1.25rem;
    }

    .inovasi-badge i {
        font-size: 13px;
    }

    /* ── Intro wrapper ── */
    .inovasi-intro-wrapper {
        border-left: 3px solid #349953;
        padding-left: 1.25rem;
        margin-bottom: 2rem;
    }

    /* ── Section header ── */
    .inovasi-section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 1.5rem;
    }

    .inovasi-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #349953;
        text-transform: uppercase;
        letter-spacing: 0.07em;
        white-space: nowrap;
    }

    .inovasi-section-title .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #349953;
        flex-shrink: 0;
    }

    .inovasi-divider-line {
        flex: 1;
        height: 1px;
        background: linear-gradient(to right, #b6dfc1, transparent);
    }

    /* ── Desc text ── */
    .desc-text {
        font-size: 15px;
        line-height: 1.8;
        color: #555;
        margin: 0 0 0.85rem;
    }

    /* ── Grid ── */
    .innovation-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    /* ── Card ── */
    .innovation-card {
        background: #fff;
        border: 1px solid #e0efe4;
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 12px;
        position: relative;
        overflow: hidden;
        transition: box-shadow 0.2s, transform 0.2s;
        aspect-ratio: 1 / 1;
        /* rasio persegi */
    }

    .innovation-card:hover {
        box-shadow: 0 6px 24px rgba(52, 153, 83, 0.12);
        transform: translateY(-2px);
    }

    .card-accent-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: #349953;
        border-radius: 12px 12px 0 0;
    }

    .card-header-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 4px;
    }

    .card-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #eaf5ed;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .card-icon i {
        font-size: 20px;
        color: #349953;
    }

    .card-tag {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 99px;
        background: #eaf5ed;
        color: #349953;
        border: 1px solid #b6dfc1;
    }

    .card-title {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a1a;
        margin: 0;
    }

    .card-desc {
        font-size: 13px;
        line-height: 1.65;
        color: #666;
        margin: 0;
        flex: 1;
    }

    /* ── Button ── */
    .btn-more {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 500;
        padding: 7px 16px;
        border-radius: 8px;
        border: 1px solid #349953;
        background: transparent;
        color: #349953;
        cursor: pointer;
        text-decoration: none;
        width: fit-content;
        transition: background 0.15s, color 0.15s;
    }

    .btn-more:hover {
        background: #349953;
        color: #fff;
        text-decoration: none;
    }

    .btn-more i {
        font-size: 12px;
    }
</style>
