<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Slideimage;
use App\Ourservice;
use App\Educationprogram;
use App\Admission;
use App\NoticeBoard;
use App\ImageGallery;
use App\ContactInformation;
use App\UserMessage;
use App\Event;
use App\Specialeducationprogram;
use App\Ourfacilit;
use App\UsefulLinks;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function home()
    {

        return view('frontend.index');
    }


    public function applicationSoft()
    {

        return view('frontend.pages.applicationSoft');
    }

    public function aboutUs()
    {
        $about = About::where('aboutus_cat_id','1')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.aboutUs',compact('about','contactInfo','usefulLink'));
    }

    public function overview()
    {
        $overview = About::where('aboutus_cat_id','1')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.overview',compact('overview','contactInfo','usefulLink'));
    }

    public function facilities()
    {
        $facility = About::where('aboutus_cat_id','2')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.facilities',compact('facility','contactInfo','usefulLink'));
    }

    public function ongoingProject()
    {
        $ongoingProject = About::where('aboutus_cat_id','3')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.ongoingProject',compact('ongoingProject','contactInfo','usefulLink'));
    }

    public function futurePlan()
    {
        $futurePlan = About::where('aboutus_cat_id','4')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.futurePlan',compact('futurePlan','contactInfo','usefulLink'));
    }

    public function administrativeBody()
    {
        $administrativeBody = About::where('aboutus_cat_id','5')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.administrativeBody',compact('administrativeBody','contactInfo','usefulLink'));
    }

    public function message()
    {
        $message = About::where('aboutus_cat_id','6')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.message',compact('message','contactInfo','usefulLink'));
    }

    public function ourServices()
    {
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.ourServices',compact('usefulLink'));
    }

    public function educationProgram()
    {
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.educationProgram',compact('usefulLink'));
    }

    public function admission()
    {
        $admission = ImageGallery::where('gallery_cat_id','12')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.admission',compact('admission','contactInfo','usefulLink'));
    }

    public function yearCalendar()
    {
        $yearCalendar = NoticeBoard::orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.yearCalendar',compact('usefulLink'));
    }

    public function photos()
    {
        $photos = ImageGallery::where('gallery_cat_id','14')->orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.photos',compact('photos','contactInfo','usefulLink'));
    }

    public function videos()
    {
        $videos = NoticeBoard::orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.videos',compact('usefulLink'));
    }

    public function prospectus()
    {
        $prospectus = ImageGallery::where('gallery_cat_id','16')->orderBy('id', 'ASC')->first();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.prospectus',compact('prospectus','contactInfo','usefulLink'));
    }

    public function noticeBoard()
    {
        $noticeBoard = NoticeBoard::orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.noticeBoard',compact('noticeBoard','contactInfo','usefulLink'));
    }

    public function noticeBoardDtls($id)
    {
        $noticeBoardDtls = NoticeBoard::where('id', $id)->orderBy('id', 'ASC')->get();
        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.noticeBoardDtls',compact('noticeBoardDtls','contactInfo','usefulLink'));
    }

    public function contact()
    {

        $contactInfo = ContactInformation::first();
        $usefulLink = UsefulLinks::orderBy('id', 'ASC')->get();
        return view('front.contact',compact('contactInfo','usefulLink'));
    }

    public function feedbackStore(Request $request)
    {
        $feedback = new UserMessage();
        $feedback->firstname = $request->firstname;
        $feedback->lastname = $request->lastname;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        Session::flash('user_feedback', 'User message added successfully!');
        return redirect()->route('contact');
    }
}
