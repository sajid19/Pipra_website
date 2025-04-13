<style>
    /* Default styles */
     .nav-img {
        margin-left: 1.5rem !important;
        height: 60px !important;
        width: 185px !important;
    }

    /* Media query for mobile devices */
    @media (max-width: 767.98px) {
        .nav-img {
            margin-left: 0rem !important;
            margin-right: 1rem !important;
            height: 40px !important;
            width: 112px !important;
        }
        .navbar .navbar-nav .nav-link::after {
            display: none;
        }

        .navbar .navbar-nav .nav-link {
            padding: 10px 0 !important;
        }
    }
</style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status">
    </div>
    <img height="50" width="80" class="position-absolute top-50 start-50 translate-middle" src="{{asset('frontend/img/icons/icon-1.png')}}" alt="Icon">
    
</div>

<nav style="font-family: 'NexaLight', sans-serif !important;" class="navbar navbar-expand-md bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{route('home')}}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="text-primary m-0 ml-5">
            <img class="nav-img" src="{{asset('frontend/img/icons/icon-1.png')}}" alt="Icon">
        </h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('home')}}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}" style="font-weight: 600;">Home</a>
            <a href=" {{route('about')}}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}" style="font-weight: 600;">About</a>
            <a href="{{route('services')}}" class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}" style="font-weight: 600;">Services</a>
            <a href="{{route('projects')}}" class="nav-item nav-link {{ request()->is('projects') ? 'active' : '' }}" style="font-weight: 600;">Projects</a>
 
            <a href="{{route('contact')}}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}" style="font-weight: 600;">Contact</a>
        </div>
    </div>
</nav>






<!-- Navbar End -->