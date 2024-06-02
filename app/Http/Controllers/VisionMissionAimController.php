<?php

namespace App\Http\Controllers;

use App\Models\RankModel;
use App\SchoolHistory;
use App\VisionMissionAim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class VisionMissionAimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = VisionMissionAim::orderBy('id', 'ASC')->get();
        return view('vissionmissionaim-mgmt/index', ['datas' => $datas]);
    }

    public function vision()
    {
        $datas = VisionMissionAim::orderBy('id', 'ASC')->first();
        return view('frontend/aboutus/vision', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vissionmissionaim-mgmt/create');
    }


    public function store(Request $request)
    {

        $keys = [
            'vision_txt',
            'mission_txt',
            'aim_txt'
        ];
        $input = $this->createQueryInput($keys, $request);

        VisionMissionAim::create($input);

        return redirect()->intended('/vissionmissionaim-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = VisionMissionAim::find($id);

        if ($datas == null) {
            return redirect()->intended('/vissionmissionaim-mgmt');
        }
        return view('vissionmissionaim-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = VisionMissionAim::where('id', $id)->first();
        return view('vissionmissionaim-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $keys = [
            'vision_txt',
            'mission_txt',
            'aim_txt'
        ];
        $input = $this->createQueryInput($keys, $request);
        VisionMissionAim::where('id', $id)->update($input);


        return redirect()->intended('/vissionmissionaim-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        VisionMissionAim::where('id', $id)->delete();
        return redirect()->intended('/vissionmissionaim-mgmt')->with('warning', 'Successfully Removed');
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
