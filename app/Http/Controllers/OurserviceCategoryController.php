<?php

namespace App\Http\Controllers;

use App\OurserviceCategory;
use Illuminate\Http\Request;

class OurserviceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = OurserviceCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('ourservicecategories-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ourservicecategories-mgmt/create');
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
        OurserviceCategory::create($input);

        return redirect()->intended('/ourservicecategories-mgmt')->with('message', 'Data Update Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurserviceCategory  $ourserviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = OurserviceCategory::where('ourservice_categories.id', $id)
            ->select('ourservice_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/ourservicecategories-mgmt');
        }
        return view('ourservicecategories-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurserviceCategory  $ourserviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = OurserviceCategory::where('id', $id)->first();

        return view('ourservicecategories-mgmt/edit', ['Data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurserviceCategory  $ourserviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keys = [
            'name',
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        OurserviceCategory::where('id', $id)->update($input);

        return redirect()->intended('/ourservicecategories-mgmt')->with('success', 'Data Update  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurserviceCategory  $ourserviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurserviceCategory $ourserviceCategory)
    {
        //
    }

    public function remove($id)
    {
        //
        OurserviceCategory::where('id', $id)->delete();
        return redirect()->intended('/ourservicecategories-mgmt')->with('error', 'Deleted Successfully');
    }

}
