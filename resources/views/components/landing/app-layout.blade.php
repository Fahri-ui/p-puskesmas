<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Puskesmas Binong</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('MediTrust/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('MediTrust/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('MediTrust/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('MediTrust/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('MediTrust/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('MediTrust/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('MediTrust/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('MediTrust/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('MediTrust/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
* Template Name: MediTrust
* Template URL: https://bootstrapmade.com/meditrust-bootstrap-hospital-website-template/
* Updated: Jul 04 2025 with Bootstrap v5.3.7
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('MediTrust/assets/img/logo.webp') }}" alt=""> -->
                <img src="{{ asset('MediTrust/assets/img/favicon.png') }}" alt="Puskesmas Binong Logo" class="my-icon">

                <h1 class="sitename">Puskesmas Binong</h1>
            </a>

            <!-- Navbar -->
            <x-landing.navbar />

            <!-- <a class="btn-getstarted" href="appointment.html">Appointment</a> -->

        </div>
    </header>
    <!-- Main Content -->
    <main class="main">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-landing.footer />

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('MediTrust/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('MediTrust/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('MediTrust/assets/js/main.js') }}"></script>

</body>

</html>