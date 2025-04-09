<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('administrative.dashboard')}}" class="sidebar-brand">
            <!--<img src="{{ asset('assets/images/pipra.png') }}" height="100px" width="140px">-->
            <img src="{{ asset('frontend/img/icons/icon-1.png') }}" height="55px" width="140px">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ request()->is('administrative/dashboard') ? 'active' : '' }} ">
                <a href="{{ route('administrative.dashboard') }}" class="nav-link parent-link">
                    <i class="link-icon" data-feather="align-left"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Components</li>
            <li class="nav-item {{ request()->is('administrative/slider/*') ? 'active' : '' }} ">
                <a href="{{ route('administrative.slider') }}" class="nav-link parent-link">
                    <i class="link-icon" data-feather="sliders"></i>
                    <span class="link-title">Slider</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('administrative/project/*') ? 'active' : '' }} ">
                <a href="{{ route('administrative.project') }}" class="nav-link parent-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Project</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('administrative/member/*') ? 'active' : '' }} ">
                <a href="{{ route('administrative.member') }}" class="nav-link parent-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Member</span>
                </a>
            </li>

        </ul>
    </div>
</nav>