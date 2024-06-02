<?php

namespace App\Http\Controllers;

use App\EducationprogramCategory;
use Illuminate\Http\Request;

class EducationprogramCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = EducationprogramCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('educationprogramcategories-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('educationprogramcategories-mgmt/create');
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
        EducationprogramCategory::create($input);

        return redirect()->intended('/educationprogramcategories-mgmt')->with('message', 'Data Update Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationprogramCategory  $educationprogramCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = EducationprogramCategory::where('educationprogram_categories.id', $id)
            ->select('educationprogram_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/educationprogramcategories-mgmt');
        }
        return view('educationprogramcategories-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationprogramCategory  $educationprogramCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = EducationprogramCategory::where('id', $id)->first();

        return view('educationprogramcategories-mgmt/edit', ['Data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationprogramCategory  $educationprogramCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keys = [
            'name',
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        EducationprogramCategory::where('id', $id)->update($input);

        return redirect()->intended('/educationprogramcategories-mgmt')->with('success', 'Data Update  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationprogramCategory  $educationprogramCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationprogramCategory $educationprogramCategory)
    {       
    }

    
    public function remove($id)
    {
        //
        EducationprogramCategory::where('id', $id)->delete();
        return redirect()->intended('/educationprogramcategories-mgmt')->with('error', 'Deleted Successfully');
    }
}
