<footer id="footer-part">
    <div class="footer-top pt-40 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-about mt-40">
                        <div class="logo">
                            <a href="#">
                                <img src="{{asset('frontend/img/logo_footer.png')}}" alt="Logo">
                            </a>
                        </div>
                        <p>
                            BAF Blue Sky is to provide special education, Therapeutic treatment to children and youth with special needs in order to help them rehabilitate.
                        </p>
                    </div> <!-- footer about -->
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    @if($usefulLink !== null && count($usefulLink) > 0)
                    <div class="footer-link support mt-40">
                        <div class="footer-title pb-25">
                            <h6>Useful Links</h6>
                        </div>
                        <ul>
                        @foreach ($usefulLink as $usefulLink)
                            <li><a href="{{$usefulLink->link_address}}"><i class="fa fa-angle-right"></i>{{$usefulLink->link_name}}</a></li>
                        @endforeach
                        </ul>
                    </div> <!-- support -->
                    @endif
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-address mt-40">
                        <div class="footer-title pb-25">
                            <h6>Contact Us</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="cont">
                                    <p>{{$contactInfo->address}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="cont">
                                    <p>{{$contactInfo->phone_no}} # {{$contactInfo->mobile_no}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="cont">
                                    <p>{{$contactInfo->email_add}}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="cont">
                                    <p>{{$contactInfo->whatsapp_link}}</p>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- footer address -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer top -->

    <div class="footer-copyright pt-10 pb-25">
        <div class="container">
            <div class="row">
                <div class="copyright text-center pt-15" style="width: 100%;">
                    <p>Copyright © 2024. BAF Blue Sky School. All rights reserved.</p>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer copyright -->
</footer>