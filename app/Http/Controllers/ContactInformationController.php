<?php

namespace App\Http\Controllers;

use App\ContactInformation;
use App\VisionMissionAim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ContactInformation::orderBy('id', 'ASC')->get();

        return view('contactinfo-mgmt/index', ['datas' => $datas]);
    }

    public function contact()
    {
        $datas = ContactInformation::latest('id')->first();
//        dd($datas);
        return view('frontend/aboutus/contact', ['datas' => $datas]);
    }
    public function location()
    {
        $datas = ContactInformation::orderBy('id', 'ASC')->first();
        return view('frontend/aboutus/location', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactinfo-mgmt/create');
    }


    public function store(Request $request)
    {

        $keys = [
            'institute_name',
            'address',
            'mobile_no',
            'phone_no',
            'email_add',
            'email_alternate',
            'tweeter_link',
            'facebook_link',
            'whatsapp_link',
            'location_txt'
        ];
        $input = $this->createQueryInput($keys, $request);

        ContactInformation::create($input);

        return redirect()->intended('/contactinfo-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = ContactInformation::find($id);

        if ($datas == null) {
            return redirect()->intended('/contactinfo-mgmt');
        }
        return view('contactinfo-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = ContactInformation::where('id', $id)->first();
        return view('contactinfo-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $keys = [
            'institute_name',
            'address',
            'mobile_no',
            'phone_no',
            'email_add',
            'email_alternate',
            'tweeter_link',
            'facebook_link',
            'whatsapp_link',
            'location_txt'
        ];
        $input = $this->createQueryInput($keys, $request);
        ContactInformation::where('id', $id)->update($input);


        return redirect()->intended('/contactinfo-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        ContactInformation::where('id', $id)->delete();
        return redirect()->intended('/contactinfo-mgmt')->with('warning', 'Successfully Removed');
    }

    private function createQueryInput($keys, $request)
    {
        $queryInput = [];
        for ($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }

    private function validateInput($request)
    {
        $rules = [
            'title' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }
}
