<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from freshcart.codescandy.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 06:16:44 GMT -->
<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
  <title>Homepage v1 - eCommerce HTML Template - FreshCart </title>

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

</head>

<body>

@include('home.sections.header')

<!-- Shop Cart -->

@include('home.sections.shop_cart_offcanvas')

<!-- Modal -->
@include('home.sections.location_model')

  <main>
    @include('home.sections.slider')
    @include('home.sections.category')
    @include('home.sections.banner_with_text')
    @include('home.sections.popular_product')
    @include('home.sections.best_seller')
    @include('home.sections.fetures_with_icon')
  </main>


  <!--Product quick view Modal -->
  {{-- @include('home.sections.product_view_model') --}}


@include('home.sections.footer');

  <!-- Javascript-->

  <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="assets/js/theme.min.js"></script>
  <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
  <script src="assets/js/vendors/countdown.js"></script>
  <script src="assets/libs/slick-carousel/slick/slick.min.js"></script>
  <script src="assets/js/vendors/slick-slider.js"></script>
  <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
  <script src="assets/js/vendors/tns-slider.js"></script>
  <script src="assets/js/vendors/zoom.js"></script>
<script src="assets/js/vendors/increment-value.js"></script>



</body>


<!-- Mirrored from freshcart.codescandy.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Jul 2023 06:18:49 GMT -->
</html>