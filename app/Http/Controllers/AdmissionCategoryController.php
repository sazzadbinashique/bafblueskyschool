<?php

namespace App\Http\Controllers;

use App\AcademicNoticeList;
use App\AdmissionCategory;
use Illuminate\Http\Request;

class AdmissionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = AdmissionCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('admissioncategory-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admissioncategory-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys = [
            'name',
            'remarks',
            'sub_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        AdmissionCategory::create($input);

        return redirect()->intended('/admissioncategory-mgmt')->with('message', 'Data Update Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = AdmissionCategory::where('admission_categories.id', $id)
            ->select('admission_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/acdemic-mgmt');
        }
        return view('admissioncategory-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = AdmissionCategory::where('id', $id)->first();

        return view('admissioncategory-mgmt/edit', ['Data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $keys = [
            'name',
            'remarks',
            'sub_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        AdmissionCategory::where('id', $id)->update($input);

        return redirect()->intended('/admissioncategory-mgmt')->with('success', 'Data Update  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internet $internet)
    {
        //
    }

    public function remove($id)
    {
        //
        AdmissionCategory::where('id', $id)->delete();
        return redirect()->intended('/admissioncategory-mgmt')->with('error', 'Deleted Successfully');
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
            'mobile_no' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }
}
