<style>
    .cx-dropdown-menu {
        width: 320px;
        max-height: 400px;
        overflow-y: scroll;
        border: 1px solid #e6e6e6 !important;

    }

    .cx-dropdown-menu::-webkit-scrollbar {
        width: 3px;
        height: 1px;
        background-color: white;
    }

    .cx-dropdown-menu::-webkit-scrollbar-thumb {
        background-color: #acacac;
    }

    .fa-bell {
        font-size: 22px;
    }



    .belll-icon {
        top: 3px;
        right: 10px;
    }

    .notification-msgs {
        white-space: wrap;
        text-align: justify;
    }

    .unread-msgs {
        background-color: #d9e8ff;
    }

    .read-msgs {
        background-color: #fff;
    }

    .cx-navbar-badge {
        font-size: .6rem;
        font-weight: 700;
        position: absolute;
        left: 7px;
        bottom: 15px;
        /* animation: pulse-animation .8s 10; */
    }


    @keyframes pulse-animation {
        0% {
            box-shadow: 0 0 0 0px rgba(233, 76, 45, 0.4);
        }

        100% {
            box-shadow: 0 0 0 10px rgba(233, 76, 45, 0);
        }
    }
</style>
<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        <ul class="navbar-nav">
            <li class="nav-item dropdown notification-section">
                <a class="nav-link belll-icon" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span id="notificationCount" class="badge pulsate badge-danger cx-navbar-badge d-none"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right cx-dropdown-menu">
                    <div class="d-flex justify-content-between py-2">
                        <h5>Notifications</h5>
                        <a id="clearAllNotification" style="cursor: pointer" class="text-capitalize text-danger  d-none">Mark as Read</a>
                    </div>

                    <div class="noptifi">

                    </div>

                </div>
            </li>

            <li class="nav-item dropdown nav-profile">

                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://via.placeholder.com/30x30" alt="profile">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="https://via.placeholder.com/80x80" alt="">
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">Admn</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <form id="logoutForm" method="post" action="{{ route('administrative.logout') }}" style="display: none">
                                @csrf
                            </form>
                            {{-- <li class="nav-item">
                                <a href="{{ route('administrative.password-change') }}" class="nav-link">
                            <i data-feather="lock"></i>
                            <span>Password Change</span>
                            </a>
            </li> --}}
            <li class="nav-item">
                <a href="javascript:;" onclick="document.getElementById('logoutForm').submit();" class="nav-link">
                    <i data-feather="log-out"></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    </div>
    </li>
    </ul>
    </div>
</nav>