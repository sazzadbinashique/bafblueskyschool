<?php

namespace App\Http\Controllers;

use App\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $InternetDatas = GalleryCategory::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('gallerycategories-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('gallerycategories-mgmt/create');
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
        GalleryCategory::create($input);

        return redirect()->intended('/gallerycategories-mgmt')->with('message', 'Data Update Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = GalleryCategory::where('gallery_categories.id', $id)
            ->select('gallery_categories.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/gallerycategories-mgmt');
        }
        return view('gallerycategories-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = GalleryCategory::where('id', $id)->first();

        return view('gallerycategories-mgmt/edit', ['Data' => $Datas]);
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
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        GalleryCategory::where('id', $id)->update($input);

        return redirect()->intended('/gallerycategories-mgmt')->with('success', 'Data Update  Successfully');
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
        GalleryCategory::where('id', $id)->delete();
        return redirect()->intended('/gallerycategories-mgmt')->with('error', 'Deleted Successfully');
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
