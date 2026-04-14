<x-landing.app-layout>
    <!-- Page Title -->
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Beranda</a></li>
                    <li class="breadcrumb-item active current">Kontak</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>Kontak</h1>
            <p>Kami siap mendengarkan dan melayani Anda. Hubungi kami untuk informasi layanan kesehatan, pendaftaran,
                atau sampaikan saran dan kritik Anda demi kemajuan pelayanan UPTD Puskesmas Binong</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info-panel">
                    <div class="contact-info-header">
                        <h3>Informasi Kontak</h3>
                    </div>

                    <div class="contact-info-cards">
                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-pin-map-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Lokasi Kami</h4>
                                <p>Jalan Raya Binong, Binong, Pagaden, Binong, Kec. Binong, Kabupaten Subang, Jawa Barat
                                    41253</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-envelope-open"></i>
                            </div>
                            <div class="card-content">
                                <h4>Email Kami</h4>
                                <p>Pkm.binong@gmail.com</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="card-content">
                                <h4>Telepon Kami</h4>
                                <p>0260453308</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="icon-container">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div class="card-content">
                                <h4>Jam Kerja</h4>
                                <p>Senin-Sabtu 08.00-01.00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links-panel">
                        <h5>Ikuti Kami</h5>
                        <div class="social-icons">
                            <a href="https://wa.me/6281234567890"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.instagram.com/pkmbinong/?hl=en"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/@PuskesmasBinong"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="contact-form-panel">
                    <div class="map-container">

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7929.796003736464!2d107.7914555!3d-6.4071394!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6947107feb349b%3A0xa803aaba719c61ff!2sPuskesmas%20Binong!5e0!3m2!1sid!2sid!4v1773193765771!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="form-container">
                        <h3>Berikan kami saran</h3>
                        <p>Saran dan kritik anda sangat berharga bagi kami</p>
                        <form action="{{ route('contact.store') }}" method="post" class="contact-form"
                            id="contactForm">
                            @csrf

                            <div class="my-3">
                                @if(session('success'))
                                    <div class="sent-message">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                    <div class="error-message">{{ session('error') }}</div>
                                @endif
                                @if($errors->any())
                                    <div class="error-message">{{ implode(' ', $errors->all()) }}</div>
                                @endif
                            </div>

                            <!-- Field form yang sudah ada tetap sama -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nameInput" name="name"
                                    placeholder="Nama Lengkap Anda" value="{{ old('name') }}" required>
                                <label for="nameInput">Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailInput" name="email"
                                    placeholder="Alamat Email" value="{{ old('email') }}" required="">
                                <label for="emailInput">Pastikan alamat email Anda benar</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subjectInput" name="subject"
                                    placeholder="Judul Pesan" value="{{ old('subject') }}" required="">
                                <label for="subjectInput">Tujuan</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Pesan Anda"
                                    style="height: 150px" required="">{{ old('message') }}</textarea>
                                <label for="messageInput">Pesan Anda</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-submit">
                                    Kirim pesan <i class="bi bi-send-fill ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->


</x-landing.app-layout>
