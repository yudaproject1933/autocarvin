<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Vin Auto Records</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="icon" type="image/png" href="favicon.ico"> --}}
        <!-- Favicon-->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" >
        <link rel="icon" href="{{ asset('images/favicon-16x16.png') }}" type="image/png">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <link rel="stylesheet" href="{{asset('landing/css/slick/slick.css')}}"> 
        <link rel="stylesheet" href="{{asset('landing/css/slick/slick-theme.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/animate.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/iconfont.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/bootstrap.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.cs')}}s">
        <link rel="stylesheet" href="{{asset('landing/css/bootsnav.cs')}}s">

        <!-- xsslider slider css -->


        <!--<link rel="stylesheet" href="assets/css/xsslider.css">-->




        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{asset('landing/css/responsive.css')}}" />

        <script src="{{asset('landing/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
        <style>
            .white-text > h1, .white-text > h2, .white-text > h3, .white-text > h4, .white-text > h5, .white-text > h6, .white-text > p, .white-text > span, .white-text {
                color: white;
            }
        </style>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->


            @include('layouts.landing.nav')

            <!--Home Sections-->

            @yield('content')



            




            {{-- @include('layouts.landing.footer') --}}




            <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                <div class="col-md-12">
                    <p class="wow fadeInRight" data-wow-duration="1s">
                        Made 
                        {{-- <i class="fa fa-heart"></i> --}}
                        by 
                        <a target="_blank" href="#">VinAutoRecords</a> 
                        2015.
                    </p>
                </div>
            
            </div>
        </div>

        <!-- JS includes -->

        <script src="{{asset('landing/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('landing/js/vendor/bootstrap.min.js')}}"></script>

        {{-- <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script> --}}
        <script src="{{asset('landing/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('landing/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('landing/css/slick/slick.js')}}"></script>
        <script src="{{asset('landing/css/slick/slick.min.js')}}"></script>
        <script src="{{asset('landing/js/jquery.collapse.js')}}"></script>
        <script src="{{asset('landing/js/bootsnav.js')}}"></script>



        <script src="{{asset('landing/js/plugins.js')}}"></script>
        <script src="{{asset('landing/js/main.js')}}"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('js')
    </body>
</html>
