<header id="header" class="header">
    <div class=" container-fluid header-content">
        <div class="col-lg-12" >
            <a href="http://baf.org/"><img class="header-logo" src="http://127.0.0.1:8000/frontend/img/BAF-Final-Logo.png" alt="Bangladesh Air Force"></a>
            <div id="block-defence8ui-videobannerhome" class="settings-tray-editable" data-drupal-settingstray="editable">
                <div class="dod-video-upload" style="height: 125px;">
                    <div class="dod-video-upload-bg">
                        <div id="video-upload-paragraph" class="video-position" style="opacity: 0.4">
                            <video id="video-upload" src="{{asset('frontend/video/reel_out.mp4')}}" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" ></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex align-items-center baf-navy-blue site-header">

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto @if(Request::is('/') || Request::is('home')) active @endif " href="{{route('home')}}">Home</a></li>
                <li><a class="nav-link scrollto @if(Request::is('application-soft')) active @endif  " href="{{route('application-soft')}}">Application Soft</a></li>
                <li><a class="nav-link scrollto " href="#">Cheif Inspector</a></li>
                <li><a class="nav-link scrollto " href="#">Guest Pass</a></li>
                <li><a class="nav-link scrollto " href="#">Organization</a></li>
                <li><a class="nav-link scrollto " href="#">BAF Arenas</a></li>
                <li class="dropdown"><a href="#" class=""><span>Recruitment</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="baf-navy-blue">
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown " ><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul class="baf-navy-blue">
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto " href="#">Training</a></li>
                <li><a class="nav-link scrollto " href="#">Flight Safety</a></li>
                <li><a class="nav-link scrollto " href="#">Miscellaneous</a></li>
                <li><a class="nav-link scrollto " href="#">Download</a></li>
                <li><a class="nav-link scrollto " href="#">Webmail</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
