 <div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    <img src="{{asset('assets/admin/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                    <img src="{{asset('assets/admin/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                    <div class="media-body">
                        <h6 style="padding-top:11px" class="pro-user-name mt-0 mb-0">{{ Auth::user()->name }}</h6>

                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">


                            <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>{{ __('Logout') }}</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{route('dashboard')}}">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="inbox"></i>
                                    <span> ID Card Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{route('all.category')}}">Category manage</a>
                                    </li>
                                    <li>
                                        <a href="{{route('all.unit')}}">Unit Manage</a>
                                    </li>
                                    <li>
                                        <a href="{{route('add.officer')}}">Add officer</a>
                                    </li>
                                    <li>
                                        <a href="{{route('all.officer')}}">All officer</a>

                                    </li>
                                    <li>
                                        <a href="{{route('add.officer.worker')}}">Add officer worker</a>
                                    </li>
                                    <li>
                                        <a href="{{route('all.officer.worker.category')}}">Officer wise worker</a>

                                    </li>
                                    <li><a href="{{route('all.officer.worker.unit')}}">Unit wise worker</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
