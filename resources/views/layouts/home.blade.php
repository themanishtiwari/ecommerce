<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Codescandy" name="author">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Shop Online') }}</title>

        <link href="assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
        <link href="assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
        <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
        
            <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">
        
        
        <!-- Libs CSS -->
        <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
        <link href="assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
        <link href="assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
        
        
        <!-- Theme CSS -->
        <link rel="stylesheet" href="assets/css/theme.min.css">
            <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
        
            gtag('config', 'G-M8S4MT3EYG');
        </script>

        @livewireStyles
    </head>
    <body>
        @include('home.sections.header')
        @include('home.sections.sign_up_model')

        <!-- Shop Cart -->
        
        @include('home.sections.shop_cart_offcanvas')
        
        <!-- Modal -->
        @include('home.sections.location_model')
        
          <main>
            @yield('content')
          </main>
        
        
          <!--Product quick view Modal -->
          {{-- @include('home.sections.product_view_model') --}}
        
        
        @include('home.sections.footer');
        
          <!-- Javascript-->
        
          <!-- Libs JS -->
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
        
        <!-- Theme JS -->
          <script src="{{ asset('assets/js/theme.min.js')}}"></script>
          <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
          <script src="assets/js/vendors/countdown.js"></script>
          <script src="assets/libs/slick-carousel/slick/slick.min.js"></script>
          <script src="assets/js/vendors/slick-slider.js"></script>
          <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
          <script src="assets/js/vendors/tns-slider.js"></script>
          <script src="assets/js/vendors/zoom.js"></script>
          <script src="assets/js/vendors/increment-value.js"></script>

        @livewireScripts
    </body>
</html>
