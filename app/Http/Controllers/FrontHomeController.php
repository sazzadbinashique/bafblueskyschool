<?php

namespace App\Http\Controllers;

use App\ChairmanMessage;
use App\ContactInformation;
use App\HomeBannerImage;
use App\ImageGallery;
use App\Test;
use App\PrincipleMessage;
use App\WeOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontHomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = ImageGallery::get();
        $notices = DB::table('notice_boards')->orderBy('id', 'DESC')->get();
        $Principals = PrincipleMessage::latest('id')->first();
        $chairman = ChairmanMessage::latest('id')->first();
        $weOffer = WeOffer::orderBy('id', 'ASC')->first();
        $bannerImage = HomeBannerImage::orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::latest('id')->first();

        return view('frontend/main',compact('images','notices',
            'Principals','chairman','weOffer','bannerImage','contactInfo'));

    }

}
