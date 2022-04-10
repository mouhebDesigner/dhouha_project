<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="index.html">
                <span class="logo-default">Smart</span> </a>
        </div>
        <!-- logo end -->
        <ul class="nav navbar-nav navbar-right in">
            <li><a href="#" class="menu-toggler sidebar-toggler">
                <i class="fa-solid fa-bars"></i>
            </a></li>
        </ul>

        <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <!-- start manage user dropdown -->
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true"
                        aria-expanded="false">
                        <img alt="" class="img-circle " src="../assets/img/dp.jpg">
                        <span class="username username-hide-on-mobile"> {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                        </span></a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="user_profile.html">
                                <i class="icon-user"></i> صفحتي الشخصية </a>
                        </li>
                        <li>
                            <a href="login.html">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i>

                                    {{ __('تسجيل الخروج ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                    </ul>
                </li>
                <!-- end manage user dropdown -->
                <!-- start notification dropdown -->
                
                <!-- end notification dropdown -->
                <!-- start message dropdown -->

                <!-- end message dropdown -->
                <!-- start language menu -->

                <!-- end language menu -->
                <li><a class="fullscreen-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a></li>
            </ul>
        </div>
    </div>
</div>
