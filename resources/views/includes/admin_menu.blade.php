<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 919px;">
                <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                    data-auto-scroll="true" data-slide-speed="200"
                    style="padding-top: 20px; overflow: hidden; width: auto; height: 919px;">
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <li class="sidebar-user-panel">
                        <div class="sidebar-user">
                            <div class="sidebar-user-picture">
                                <img alt="image" src="../assets/img/dp.jpg">
                            </div>
                            <div class="sidebar-user-details">
                                <div class="user-name">{{ Auth::user()->nom }} {{ Auth::user()->prenom  }}</div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item start @if(Request::is('home')) active @endif">
                        <a href="{{ url('home') }}" class="nav-link ">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-airplay">
                                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                </path>
                                <polygon points="12 15 17 21 7 21 12 15"></polygon>
                            </svg>
                            <span class="title">الصفحة الرئيسية</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::is('niveaux')) active @endif">
                        <a href="{{ route('admin.niveaux.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="title">المراحل التعليمية</span> 
                        </a>
                        
                    </li>
                    <li class="nav-item @if(Request::is('students')) active @endif">
                        <a href="{{ route('admin.students.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="title">التلاميذ</span> 
                        </a>
                    </li>
                    <li class="nav-item @if(Request::is('matieres')) active @endif">
                        <a href="{{ route('admin.matieres.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="title">المواد</span> 
                        </a>
                    </li> 
                    <li class="nav-item @if(Request::is('lessons')) active @endif">
                        <a href="{{ route('admin.lessons.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="title">الدروس</span> 
                        </a>
                    </li> 
                    <li class="nav-item @if(Request::is('activites')) active @endif">
                        <a href="{{ route('admin.activites.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="title">الأنشطة</span> 
                        </a>
                    </li>
                    <li class="nav-item @if(Request::is('histoires')) active @endif">
                        <a href="{{ route('admin.histoires.index') }}" class="nav-link nav-toggle"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            <span class="title">القصص</span> 
                        </a>
                    </li>
                    
                </ul>
                <div class="slimScrollBar"
                    style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 919px;">
                </div>
                <div class="slimScrollRail"
                    style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
        </div>
    </div>
</div>