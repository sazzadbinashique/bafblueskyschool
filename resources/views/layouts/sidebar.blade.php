<!-- Main Sidebar Container -->
<aside class="main-sidebar control-sidebar-dark">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="{{ asset("manual_img_logo/goldeneagleLogo_hover.png") }}"
             alt="BAFWWA"
             class="brand-image img-circle"
             style="opacity: .8"> -->

        <span class="brand-text font-weight-light">  {{ __('appcustom.div_header') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{--      <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
        {{--        <div class="image">--}}
        {{--          <img src="{{ asset("manual_img_logo/goldeneagleLogo_hover.png") }}" class="img-circle" alt="User Image">--}}
        {{--        </div>--}}
        {{--        <div class="info">--}}
        {{--        <p>{{ Auth::user()->name}}</p>--}}
        {{--        </div>--}}
        {{--      </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ url('dashboard') }}"
                       class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                        <p style="color: #ffcc00;">
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header" style="font-weight: bold; color: #ffffff;">MAIN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                        <p style="color: #ffcc00;">
                            Home Page
                            <i class="fas fa-angle-left right" style="color: #ffcc00;"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                                <a href="{{ url('slideimage-mgmt') }}"
                                   class="nav-link {{ (request()->routeIs('slideimage-mgmt.*')) ? 'active' : '' }}"
                                   style="color: #000000;">
                                    <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                                    <p style="color: #ffffff;">
                                        Slide Image
                                    </p>
                                </a>
                        </li>

                        <li class="nav-item">
                                <a href="{{ url('event-mgmt') }}"
                                   class="nav-link {{ (request()->routeIs('event-mgmt.*')) ? 'active' : '' }}"
                                   style="color: #000000;">
                                    <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                                    <p style="color: #ffffff;">
                                        Upcoming Event
                                    </p>
                                </a>
                        </li>

                        <li class="nav-item">
                                <a href="{{ url('specialeducationprogram-mgmt') }}"
                                   class="nav-link {{ (request()->routeIs('specialeducationprogram-mgmt.*')) ? 'active' : '' }}"
                                   style="color: #000000;">
                                    <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                                    <p style="color: #ffffff;">
                                        Special Edu Program
                                    </p>
                                </a>
                        </li>

                        <li class="nav-item">
                                <a href="{{ url('ourfacility-mgmt') }}"
                                   class="nav-link {{ (request()->routeIs('ourfacility-mgmt.*')) ? 'active' : '' }}"
                                   style="color: #000000;">
                                    <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                                    <p style="color: #ffffff;">
                                        Our Facilities
                                    </p>
                                </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item">
                        <a href="{{ url('aboutus-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('aboutus-mgmt.*')) ? 'active' : '' }}"
                           style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                About Us
                            </p>
                        </a>
                </li>

                <li class="nav-item">
                        <a href="{{ url('ourservice-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('ourservice-mgmt.*')) ? 'active' : '' }}"
                           style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                Our Services
                            </p>
                        </a>
                </li>

                <li class="nav-item">
                        <a href="{{ url('educationprogram-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('educationprogram-mgmt.*')) ? 'active' : '' }}"
                           style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                Education Program
                            </p>
                        </a>
                </li>

                <li class="nav-item">
                    @can('imggallery-list')
                        <a href="{{ url('imggallery-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('imggallery-mgmt.*')) ? 'active' : '' }}"
                           style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                Resource
                            </p>
                        </a>
                    @endcan
                </li>

                <li class="nav-item">
                        <a href="{{ url('noticeboard-mgmt') }}"
                            class="nav-link {{ (request()->routeIs('noticeboard-mgmt.*')) ? 'active' : '' }}"
                            style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                Notice
                            </p>
                        </a>
                </li>

                <li class="nav-item">
                        <a href="{{ url('contactinfo-mgmt') }}"
                            class="nav-link {{ (request()->routeIs('contactinfo-mgmt.*')) ? 'active' : '' }}"
                            style="color: #000000;">
                            <i class="nav-icon far fa-circle nav-icon" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">
                                Contact Info
                            </p>
                        </a>
                </li>

                


                

            
    


                <li class="nav-header" style="font-weight: bold; color: #00bfff;">WEBSITE SETTINGS</li>

                <!-- <li class="nav-item">
                    @can('homebannerimage-list')
                        <a href="{{ url('homebannerimage-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('homebannerimage-mgmt.*')) ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">Home Banner</p>
                        </a>
                    @endcan
                </li> -->
                <li class="nav-item">
                        <a href="{{ url('usefulllinks-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('usefulllinks-mgmt.*')) ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">Useful Link</p>
                        </a>
                </li>
                <!-- <li class="nav-item">
                    @can('acadesmiccategory-list')
                        <a href="{{ url('acadesmiccategory-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('acadesmiccategory-mgmt.*')) ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">Academic Notice Menu</p>
                        </a>
                    @endcan
                </li> -->
    
                <!-- <li class="nav-item">
                    @can('homepageinfo-list')
                        <a href="{{ url('homepageinfo-mgmt') }}"
                           class="nav-link {{ (request()->routeIs('homepageinfo-mgmt.*')) ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fas fa-graduation-cap" style="color: #ffcc00;"></i>
                            <p style="color: #ffffff;">Home Page Info</p>
                        </a>
                    @endcan
                </li> -->
                <li class="nav-item">
                    @can('user-list')
                    <a href="{{ route('users.index') }}"
                       class="nav-link {{ Request::routeIs('users.*') ? 'active' : '' }}">
                        <i class="fas fa-user-secret nav-icon" style="color: #ffcc00;"></i>
                        <p style="color: #ffffff;">User Setup</p>
                    </a>
                    @endcan
                </li>

                <li class="nav-item">
                    @can('role-list')
                    <a href="{{ route('roles.index') }}"
                       class="nav-link {{ Request::routeIs('roles.*') ? 'active' : '' }}">
                        <i class="fab fa-critical-role nav-icon" style="color: #ffcc00;"></i>
                        <p style="color: #ffffff;">Role Setup</p>
                    </a>
                    @endcan
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

