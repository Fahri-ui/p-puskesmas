<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staf') }}">Staf</a></li>
                    <li class="breadcrumb-item active current">Profil Staf</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Profil Staf</h1>
            <p>Kenali lebih dekat tim profesional kami</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Staff Detail Section -->
    <section class="staff-detail-section">
        <div class="container">

            <!-- Hero Identity Block -->
            <div class="staff-hero">
                <div class="staff-photo-wrapper">
                    <div class="photo-ring">
                        <img src="{{ asset($staf->foto) }}" alt="{{ $staf->nama }}"
                            alt="Foto {{ $staf->nama }}" class="staff-photo">
                    </div>
                    <div class="status-badge">
                        <span class="status-dot"></span>
                        Aktif
                    </div>
                </div>

                <div class="staff-identity">
                    <span class="staff-profesi">{{ $staf->profesi }}</span>
                    <h2 class="staff-nama">{{ $staf->nama }}</h2>
                    <p class="staff-jabatan">{{ $staf->jabatan }}</p>

                    <div class="staff-quick-meta">
                        @if ($staf->nip)
                            <span class="meta-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                                </svg>
                                NIP: {{ $staf->nip }}
                            </span>
                        @endif

                        @if ($staf->telepon)
                            <span class="meta-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.77 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 8a16 16 0 0 0 6 6l.06-.06a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16.92z" />
                                </svg>
                                {{ $staf->telepon }}
                            </span>
                        @endif

                        @if ($staf->bergabung_sejak)
                            <span class="meta-pill">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <polyline points="22 4 12 14.01 9 11.01" />
                                </svg>
                                Bergabung {{ \Carbon\Carbon::parse($staf->bergabung_sejak)->format('Y') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="staff-content-grid">

                <!-- Left Column -->
                <div class="staff-col-left">

                    <!-- About -->
                    @if ($staf->deskripsi)
                        <div class="content-block">
                            <div class="block-label">
                                <span class="label-line"></span>
                                <span>Tentang</span>
                            </div>
                            <p class="staff-bio">{{ $staf->deskripsi }}</p>
                        </div>
                    @endif

                    <!-- Contact Info -->
                    <div class="content-block">
                        <div class="block-label">
                            <span class="label-line"></span>
                            <span>Kontak</span>
                        </div>
                        <ul class="info-list">
                            @if ($staf->email)
                                <li class="info-item">
                                    <span class="info-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                            <polyline points="22,6 12,13 2,6" />
                                        </svg>
                                    </span>
                                    <div class="info-content">
                                        <span class="info-label">Email</span>
                                        <a href="mailto:{{ $staf->email }}"
                                            class="info-value">{{ $staf->email }}</a>
                                    </div>
                                </li>
                            @endif

                            @if ($staf->telepon)
                                <li class="info-item">
                                    <span class="info-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.77 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 8a16 16 0 0 0 6 6l.06-.06a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16.92z" />
                                        </svg>
                                    </span>
                                    <div class="info-content">
                                        <span class="info-label">Telepon</span>
                                        <a href="tel:{{ $staf->telepon }}"
                                            class="info-value">{{ $staf->telepon }}</a>
                                    </div>
                                </li>
                            @endif

                            @if ($staf->alamat)
                                <li class="info-item">
                                    <span class="info-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                            <circle cx="12" cy="10" r="3" />
                                        </svg>
                                    </span>
                                    <div class="info-content">
                                        <span class="info-label">Alamat</span>
                                        <span class="info-value">{{ $staf->alamat }}</span>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>

                <!-- Right Column -->
                <div class="staff-col-right">

                    <!-- Personal Data -->
                    <div class="content-block">
                        <div class="block-label">
                            <span class="label-line"></span>
                            <span>Data Pribadi</span>
                        </div>
                        <dl class="data-grid">
                            @if ($staf->jenis_kelamin)
                                <div class="data-row">
                                    <dt>Jenis Kelamin</dt>
                                    <dd>{{ $staf->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
                                </div>
                            @endif

                            @if ($staf->tanggal_lahir)
                                <div class="data-row">
                                    <dt>Tanggal Lahir</dt>
                                    <dd>{{ \Carbon\Carbon::parse($staf->tanggal_lahir)->translatedFormat('d F Y') }}
                                    </dd>
                                </div>
                            @endif

                            @if ($staf->pendidikan_terakhir)
                                <div class="data-row">
                                    <dt>Pendidikan Terakhir</dt>
                                    <dd>{{ $staf->pendidikan_terakhir }}</dd>
                                </div>
                            @endif

                            @if ($staf->bergabung_sejak)
                                <div class="data-row">
                                    <dt>Bergabung Sejak</dt>
                                    <dd>{{ \Carbon\Carbon::parse($staf->bergabung_sejak)->translatedFormat('d F Y') }}
                                    </dd>
                                </div>
                            @endif

                            @if ($staf->nip)
                                <div class="data-row">
                                    <dt>NIP</dt>
                                    <dd class="mono">{{ $staf->nip }}</dd>
                                </div>
                            @endif

                            @if ($staf->jabatan)
                                <div class="data-row">
                                    <dt>Jabatan</dt>
                                    <dd>{{ $staf->jabatan }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    <!-- Tenure Visual -->
                    {{-- @if ($staf->bergabung_sejak)
                        @php
                            $tahunBergabung = \Carbon\Carbon::parse($staf->bergabung_sejak)->year;
                            $masaKerja = \Carbon\Carbon::now()->year - $tahunBergabung;
                            // Asumsi max karir 30 tahun untuk lebar progress bar
                            $persenBar = min(($masaKerja / 30) * 100, 100);
                        @endphp
                        <div class="tenure-block">
                            <div class="tenure-label">Masa Bergabung</div>
                            <div class="tenure-years">
                                {{ $masaKerja }}
                                <span>Tahun</span>
                            </div>
                            <div class="tenure-sub">bersama tim kami</div>
                            <div class="tenure-bar">
                                <div class="tenure-fill" style="width: {{ $persenBar }}%"></div>
                            </div>
                        </div>
                    @endif --}}

                </div>
            </div>

        </div>
    </section><!-- End Staff Detail Section -->

    <style>
        /* =============================================
   CSS VARIABLES
   ============================================= */
        :root {
            --clr-white: #ffffff;
            --clr-primary: #349953;
            --clr-primary-light: #e8f5ec;
            --clr-primary-mid: #2a7d43;
            --clr-primary-dark: #1e5c31;
            --clr-text: #1a2b22;
            --clr-muted: #6b8070;
            --clr-border: #d4e6da;
            --clr-surface: #f6faf7;

            --radius-sm: 8px;
            --radius-md: 16px;
            --radius-lg: 24px;

            --shadow-sm: 0 2px 8px rgba(52, 153, 83, 0.08);
            --shadow-md: 0 8px 32px rgba(52, 153, 83, 0.12);
            --shadow-lg: 0 20px 60px rgba(52, 153, 83, 0.16);

        }

        /* =============================================
   SECTION WRAPPER
   ============================================= */
        .staff-detail-section {
            padding: 60px 0 80px;
            background: var(--clr-white);
        }

        .staff-detail-section .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* =============================================
   HERO BLOCK
   ============================================= */
        .staff-hero {
            display: flex;
            align-items: flex-start;
            gap: 48px;
            padding-bottom: 56px;
            border-bottom: 1px solid var(--clr-border);
            margin-bottom: 56px;
            animation: fadeUp 0.6s ease both;
        }

        /* Photo */
        .staff-photo-wrapper {
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .photo-ring {
            position: relative;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-primary-dark));
            box-shadow: var(--shadow-lg);
        }

        .staff-photo {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--clr-white);
            display: block;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--clr-primary-light);
            color: var(--clr-primary-dark);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 100px;
            border: 1px solid rgba(52, 153, 83, 0.2);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--clr-primary);
            animation: pulse 2s infinite;
        }

        /* Identity */
        .staff-identity {
            flex: 1;
            padding-top: 12px;
        }

        .staff-profesi {
            display: inline-block;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--clr-primary);
            margin-bottom: 10px;
        }

        .staff-nama {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--clr-text);
            line-height: 1.1;
            margin: 0 0 8px 0;
        }

        .staff-jabatan {
            font-size: 1rem;
            color: var(--clr-muted);
            margin: 0 0 28px 0;
            font-weight: 400;
        }

        .staff-quick-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            color: var(--clr-text);
            font-size: 0.82rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 100px;
            transition: all 0.2s;
        }

        .meta-pill svg {
            color: var(--clr-primary);
        }

        .meta-pill:hover {
            background: var(--clr-primary-light);
            border-color: var(--clr-primary);
            color: var(--clr-primary-dark);
        }

        /* =============================================
   CONTENT GRID
   ============================================= */
        .staff-content-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 56px;
            animation: fadeUp 0.7s 0.15s ease both;
        }

        /* =============================================
   CONTENT BLOCKS (no card)
   ============================================= */
        .content-block {
            margin-bottom: 44px;
        }

        .content-block:last-child {
            margin-bottom: 0;
        }

        .block-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--clr-muted);
        }

        .label-line {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--clr-primary);
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* Bio text */
        .staff-bio {
            font-size: 1rem;
            line-height: 1.8;
            color: var(--clr-text);
            margin: 0;
            font-weight: 300;
        }

        /* =============================================
   INFO LIST (Contact)
   ============================================= */
        .info-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--clr-primary-light);
            color: var(--clr-primary);
            border-radius: var(--radius-sm);
            flex-shrink: 0;
        }

        .info-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding-top: 4px;
        }

        .info-label {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--clr-muted);
        }

        .info-value {
            font-size: 0.95rem;
            color: var(--clr-text);
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
            word-break: break-word;
        }

        a.info-value:hover {
            color: var(--clr-primary);
        }

        /* =============================================
   DATA GRID (Personal Info)
   ============================================= */
        .data-grid {
            display: flex;
            flex-direction: column;
            gap: 0;
            margin: 0;
        }

        .data-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 14px 0;
            border-bottom: 1px solid var(--clr-border);
            gap: 16px;
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .data-row dt {
            font-size: 0.82rem;
            color: var(--clr-muted);
            font-weight: 500;
            flex-shrink: 0;
        }

        .data-row dd {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--clr-text);
            margin: 0;
            text-align: right;
        }

        .data-row dd.mono {
            font-family: var(--font-mono);
            font-size: 0.82rem;
            letter-spacing: 0.05em;
            color: var(--clr-primary-dark);
        }

        /* =============================================
   TENURE VISUAL
   ============================================= */
        .tenure-block {
            margin-top: 44px;
            padding-top: 36px;
            border-top: 1px dashed var(--clr-border);
        }

        .tenure-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--clr-muted);
            margin-bottom: 12px;
        }

        .tenure-years {
            font-family: var(--font-display);
            font-size: 4rem;
            font-weight: 700;
            color: var(--clr-primary);
            line-height: 1;
            display: flex;
            align-items: flex-end;
            gap: 8px;
            margin-bottom: 4px;
        }

        .tenure-years span {
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 500;
            color: var(--clr-text);
            margin-bottom: 8px;
        }

        .tenure-sub {
            font-size: 0.85rem;
            color: var(--clr-muted);
            margin-bottom: 16px;
        }

        .tenure-bar {
            height: 4px;
            background: var(--clr-border);
            border-radius: 100px;
            overflow: hidden;
        }

        .tenure-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--clr-primary-light), var(--clr-primary));
            border-radius: 100px;
            animation: growBar 1.2s 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        /* =============================================
   ANIMATIONS
   ============================================= */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.3);
            }
        }

        @keyframes growBar {
            from {
                width: 0 !important;
            }
        }

        /* =============================================
   RESPONSIVE - TABLET
   ============================================= */
        @media (max-width: 900px) {
            .staff-content-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .staff-col-right {
                padding-top: 44px;
                border-top: 1px solid var(--clr-border);
            }
        }

        /* =============================================
   RESPONSIVE - MOBILE
   ============================================= */
        @media (max-width: 600px) {
            .staff-detail-section {
                padding: 40px 0 60px;
            }

            .staff-hero {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 28px;
                padding-bottom: 40px;
                margin-bottom: 40px;
            }

            .staff-identity {
                padding-top: 0;
            }

            .staff-quick-meta {
                justify-content: center;
            }

            .photo-ring {
                width: 140px;
                height: 140px;
            }

            .staff-nama {
                font-size: 2rem;
            }

            .data-row {
                flex-direction: column;
                gap: 4px;
                padding: 12px 0;
            }

            .data-row dd {
                text-align: left;
                font-size: 0.95rem;
            }

            .tenure-years {
                font-size: 3rem;
            }
        }
    </style>
</x-landing.app-layout>
