<!DOCTYPE html>
<html lang="en">
<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Neel Ghuri Fashion</title>
    <meta name="keywords" content="Fashion Shop">
    <meta name="description" content="Neel Ghuri Fashion">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/')}}/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/')}}/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/')}}/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{asset('assets/frontend/')}}/assets/images/icons/site.html">
    <link rel="mask-icon" href="{{asset('assets/frontend/')}}/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{asset('assets/frontend/')}}/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Asif">
    <meta name="application-name" content="Asif">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('assets/frontend/')}}/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/css/demos/demo-4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/assets/css/plugins/nouislider/nouislider.css">
    <script src="{{asset('assets/backend/js/axios.min.js')}}"></script>
</head>

<body>
    <div class="page-wrapper">
        @include('frontend.components.home.header')
        <main class="main">
         @yield('content')
        </main><!-- End .main -->
        @include('frontend.components.home.footer')
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    @include('frontend.components.home.mobile_menu')
    @include('frontend.components.home.registration_modal')
    @include('frontend.components.home.news_later')
    <!-- Plugins JS File -->
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/superfish.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/bootstrap-input-spinner.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.elevateZoom.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.plugin.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/wNumb.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/frontend/')}}/assets/js/main.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/demos/demo-4.js"></script>
    <script src="{{asset('assets/frontend/')}}/assets/js/nouislider.min.js"></script>
</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->
</html>