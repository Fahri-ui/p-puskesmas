<x-landing.app-layout>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="error-content text-center">

            {{-- Icon --}}
            <div class="error-icon-wrap mx-auto mb-4">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 4L44 40H4L24 4Z" stroke="white" stroke-width="3" stroke-linejoin="round" fill="none"/>
                    <line x1="24" y1="18" x2="24" y2="28" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    <circle cx="24" cy="34" r="2" fill="white"/>
                </svg>
            </div>

            {{-- Angka 404 --}}
            <div class="error-number">4<span>0</span>4</div>

            {{-- Dekoratif dots --}}
            <div class="divider-dots justify-content-center mb-3">
                <div class="dot"></div>
                <div class="dot active"></div>
                <div class="dot"></div>
            </div>

            <h1 class="error-title">Halaman Tidak Ditemukan</h1>
            <p class="error-desc">Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>

            <a href="{{ route('welcome') }}" class="btn-home">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <style>
        :root {
            --primary: #349953;
            --primary-light: #5ab870;
        }

        body {
            background: #f8fdf9;
        }

        /* Dekorasi background */
        body::before {
            content: '';
            position: fixed;
            width: 350px; height: 350px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.06);
            top: -100px; left: -100px;
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            width: 250px; height: 250px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.05);
            bottom: -80px; right: -80px;
            pointer-events: none;
            z-index: 0;
        }

        .error-content {
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        /* Icon wrapper */
        .error-icon-wrap {
            width: 100px; height: 100px;
            border-radius: 28px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 32px rgba(52, 153, 83, 0.25);
        }

        /* Angka 404 */
        .error-number {
            font-size: 7rem;
            font-weight: 800;
            line-height: 1;
            color: var(--primary);
            letter-spacing: -4px;
            margin-bottom: 16px;
            text-shadow: 4px 4px 0px rgba(52, 153, 83, 0.12);
        }
        .error-number span {
            color: var(--primary-light);
        }

        /* Judul & deskripsi */
        .error-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 12px;
        }
        .error-desc {
            font-size: 16px;
            color: #6c757d;
            line-height: 1.7;
            margin: 0 0 32px;
        }

        /* Dots dekoratif */
        .divider-dots {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }
        .dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(52, 153, 83, 0.25);
        }
        .dot.active {
            background: var(--primary);
        }

        /* Tombol */
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: #fff !important;
            font-size: 15px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(52, 153, 83, 0.3);
            transition: all 0.3s ease;
        }
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(52, 153, 83, 0.4);
        }

        .min-vh-100 {
            min-height: 100vh;
        }
    </style>
</x-landing.app-layout>
