<?php

namespace App\Http\Controllers;

use App\FacilityCategory;
use Illuminate\Http\Request;

class FacilityCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = FacilityCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('facilitycategories-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facilitycategories-mgmt/create');
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
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        FacilityCategory::create($input);

        return redirect()->intended('/facilitycategories-mgmt')->with('message', 'Data Update Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacilityCategory  $facilityCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FacilityCategory $facilityCategory)
    {
        $datas = FacilityCategory::where('facility_categories.id', $id)
            ->select('facility_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/facilitycategories-mgmt');
        }
        return view('facilitycategories-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacilityCategory  $facilityCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = FacilityCategory::where('id', $id)->first();

        return view('facilitycategories-mgmt/edit', ['Data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacilityCategory  $facilityCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilityCategory $facilityCategory)
    {
        $keys = [
            'name',
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        FacilityCategory::where('id', $id)->update($input);

        return redirect()->intended('/facilitycategories-mgmt')->with('success', 'Data Update  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacilityCategory  $facilityCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacilityCategory $facilityCategory)
    {
        //
    }

    public function remove($id)
    {
        //
        FacilityCategory::where('id', $id)->delete();
        return redirect()->intended('/facilitycategories-mgmt')->with('error', 'Deleted Successfully');
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
