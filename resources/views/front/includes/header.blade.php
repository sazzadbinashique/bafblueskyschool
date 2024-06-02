<header id="header-part">
    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-contact">
                        <ul>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="#">{{$contactInfo->email_alternate}}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>{{$contactInfo->phone_no}}
                                </span>
                            </li>
                        </ul>
                    </div> <!-- header contact -->
                </div>
                <div class="col-md-6">
                    <div class="header-right d-flex justify-content-end">
                        <div class="social d-flex">
                            <span class="follow-us">Follow Us :</span>
                            <ul>
                                <li><a href="{{$contactInfo->facebook_link}}"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{$contactInfo->tweeter_link}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- social -->
                    </div> <!-- header right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('frontend/img/cropped-logo.png')}}" alt="Logo" style="height: 55px;">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="{{ Request::route()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('aboutUs')}}" class="{{ Request::route()->getName() == 'aboutUs' ? 'active' : '' }}">About Us <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="{{route('overview')}}" class="{{ Request::route()->getName() == 'overview' ? 'active' : '' }}">Overview</a>
                                        </li>
                                        <li>
                                        <a href="{{route('facilities')}}" class="{{ Request::route()->getName() == 'facilities' ? 'active' : '' }}">Facilities</a>
                                        </li>
                                        <li>
                                        <a href="{{route('ongoingProject')}}" class="{{ Request::route()->getName() == 'ongoingProject' ? 'active' : '' }}">Ongoing Projects</a>
                                        </li>
                                        <li>
                                        <a href="{{route('futurePlan')}}" class="{{ Request::route()->getName() == 'futurePlan' ? 'active' : '' }}">Future Plan</a>
                                        </li>
                                        <li>
                                        <a href="{{route('administrativeBody')}}" class="{{ Request::route()->getName() == 'administrativeBody' ? 'active' : '' }}">Administrative Body</a>
                                        </li>
                                        <li>
                                        <a href="{{route('message')}}" class="{{ Request::route()->getName() == 'message' ? 'active' : '' }}">Message</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('ourServices')}}" class="{{ Request::route()->getName() == 'ourServices' ? 'active' : '' }}">Our Services</a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('educationProgram')}}" class="{{ Request::route()->getName() == 'educationProgram' ? 'active' : '' }}">Education Program</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Resources <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="{{route('admission')}}" class="{{ Request::route()->getName() == 'admission' ? 'active' : '' }}">Admission</a>
                                        </li>
                                        <li>
                                        <a href="{{route('yearCalendar')}}" class="{{ Request::route()->getName() == 'yearCalendar' ? 'active' : '' }}">Year Calander</a>
                                        </li>
                                        <li>
                                        <a href="{{route('photos')}}" class="{{ Request::route()->getName() == 'photos' ? 'active' : '' }}">Photos</a>
                                        </li>
                                        <li>
                                        <a href="{{route('videos')}}" class="{{ Request::route()->getName() == 'videos' ? 'active' : '' }}">Videos</a>
                                        </li>
                                        <li>
                                        <a href="{{route('prospectus')}}" class="{{ Request::route()->getName() == 'prospectus' ? 'active' : '' }}">Prospectus</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('noticeBoard')}}" class="{{ Request::route()->getName() == 'noticeBoard' ? 'active' : '' }}">Notice Board</a>
                                </li>
                                <li class="nav-item">
                                <a href="{{route('contact')}}" class="{{ Request::route()->getName() == 'contact' ? 'active' : '' }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-icon text-right">
                            <ul>
                                <!-- <li><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a></li> -->
                            </ul>
                        </div> <!-- right icon -->
                    </nav> <!-- nav -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
</header>