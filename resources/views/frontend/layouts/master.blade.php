<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="version" content="version=1.01">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Pipra - ONE STOP BUILDING SOLUTIONS</title>


    <meta name="description" content="ONE STOP BUILDING SOLUTIONS, Consultancy - Construction - Building Materials">
    <meta name="keywords" content="Construction, Consultancy, Building, Architecture, Design, 3D design, Interior, Exterior, 3d molding, 3d render, 3d visualization, green architecture, sustainable architecture, contemporary architecture, Highrise, Duplex, modern architecture, Modern Duplex, triplex, Housing, Mosque design">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="পিঁপড়া - Construction Company">
    <meta property="og:description" content="ONE STOP BUILDING SOLUTIONS, Consultancy - Construction - Building Materials">
    <meta property="og:image" content="{{asset('frontend/img/icons/icon-1.png')}}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Canonical Link -->
    <link rel="canonical" href="{{ url()->current() }}">


    <link rel="icon" type="image/x-icon" href="{{asset('frontend/img/icons/favicon.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&amp;family=Teko:wght@400;500;600&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('frontend/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/style2.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/revolution/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/revolution/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hexa-toaster.css') }}">
    <style>
    
    .btn-whatsapp-pulse {
        
    	background: #25d366;
    	color: white;
    	position: fixed;
    	bottom: 20px;
    	right: 20px;
    	font-size: 30px;
    	display: flex;
    	justify-content: center;
    	align-items: center;
    	width: 0;
    	height: 0;
    	padding: 25px;
    	text-decoration: none;
    	border-radius: 50%;
    	animation-name: pulse;
    	animation-duration: 1.5s;
    	animation-timing-function: ease-out;
    	animation-iteration-count: infinite;
    	z-index:99999;
    }
    
    @keyframes pulse {
    	0% {
    		box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
    	}
    	80% {
    		box-shadow: 0 0 0 14px rgba(37, 211, 102, 0);
    	}
    }
    
    .btn-whatsapp-pulse-border {
    	
    	animation-play-state: paused;
    }
    
    .btn-whatsapp-pulse-border::before {
    	content: "";
    	position: absolute;
    	border-radius: 50%;
    	padding: 15px;
    	border: 5px solid #25d366;
    	opacity: 0.75;
    	animation-name: pulse-border;
    	animation-duration: 1.5s;
    	animation-timing-function: ease-out;
    	animation-iteration-count: infinite;
    }
    
    
    @keyframes pulse-border {
    	0% {
    		padding: 15px;
    		opacity: 0.75;
    	}
    	75% {
    		padding: 40px;
    		opacity: 0;
    	}
    	100% {
    		opacity: 0;
    	}
    }

    </style>
    @yield('page-css')
</head>

<body>

    {{-- Navbar --}}
    @include('frontend.layouts.partial._navbar')

    <!-- toaster Start -->
    <div class="hs-toast-wrapper  hs-toast-fixed-top " id="hexa-toaster"></div>
    <!-- toaster End -->

    @yield('content')

    {{-- footer --}}
    @include('frontend.layouts.partial._footer')

<!--https://wa.me/+8801601041123-->
    <a href="https://wa.me/+8801601041123" target="_blank" id="whatsappButton" class="btn-whatsapp-pulse btn-whatsapp-pulse-border">
    	<i class="fab fa-whatsapp "></i>
    </a>
    <!-- Back to Top -->
    <!--<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>-->
    
    <script src="{{ asset('frontend/code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrolla.min.js') }}"></script><!-- ON SCROLL CONTENT ANIMTE   -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
    <script src="{{ asset('frontend/js/shortcode.js') }}"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('frontend/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/revolution/revolution/js/extensions/revolution-plugin.js') }}"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="{{ asset('frontend/js/rev-script-1.js') }}"></script>

    <script src="{{ asset('assets/js/hexa-toaster.js') }}"></script>
    @include('administrative.layouts.partial._toaster')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lastScrollTop = 0;
            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                if (currentScroll > lastScrollTop) {
                    // Scroll Down
                    navbar.classList.add("hidden");
                } else {
                    // Scroll Up
                    navbar.classList.remove("hidden");
                }
                lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
            });
        });
        
    </script>
   

    @yield('page-js')
</body>

</html>