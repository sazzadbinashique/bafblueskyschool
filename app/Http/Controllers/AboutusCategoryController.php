<?php

namespace App\Http\Controllers;

use App\AboutusCategory;
use Illuminate\Http\Request;

class AboutusCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = AboutusCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('aboutuscategories-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutuscategories-mgmt/create');
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
        AboutusCategory::create($input);

        return redirect()->intended('/aboutuscategories-mgmt')->with('message', 'Data Update Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutusCategory  $aboutusCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AboutusCategory $aboutusCategory)
    {
        $datas = AboutusCategory::where('gallery_categories.id', $id)
            ->select('gallery_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/aboutuscategories-mgmt');
        }
        return view('aboutuscategories-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutusCategory  $aboutusCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutusCategory $aboutusCategory)
    {
        $Datas = AboutusCategory::where('id', $id)->first();

        return view('aboutuscategories-mgmt/edit', ['Data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutusCategory  $aboutusCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutusCategory $aboutusCategory)
    {
        $keys = [
            'name',
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        AboutusCategory::where('id', $id)->update($input);

        return redirect()->intended('/aboutuscategories-mgmt')->with('success', 'Data Update  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutusCategory  $aboutusCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutusCategory $aboutusCategory)
    {
        //
    }

    public function remove($id)
    {
        //
        AboutusCategory::where('id', $id)->delete();
        return redirect()->intended('/aboutuscategories-mgmt')->with('error', 'Deleted Successfully');
    }

}
