<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Glightbox CSS -->
<link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<!-- Glightbox JS -->
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>

</head>
<body>

    @include('layouts.ClientLayouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.ClientLayouts.Footer')
 <!-- Vendor JS Files -->
 <script src="{{ asset('vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
 <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
 <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
 <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
 
 <!-- Template Main JS File -->
 <script src="{{ asset('js/main.js') }}"></script>
 <script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>

</body>
</html>
