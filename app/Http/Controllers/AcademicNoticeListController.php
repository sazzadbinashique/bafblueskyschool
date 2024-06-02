<?php

namespace App\Http\Controllers;

use App\AcademicNoticeList;
use App\HistoryCategory;
use Illuminate\Http\Request;

class AcademicNoticeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $InternetDatas = AcademicNoticeList::orderBy('id', 'ASC')->get();

        $datas = $InternetDatas;
        // dd($data);

        return view('acadesmiccategory-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('acadesmiccategory-mgmt/create');
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
        AcademicNoticeList::create($input);

        return redirect()->intended('/acadesmiccategory-mgmt')->with('message', 'Data Update Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = AcademicNoticeList::where('academic_notice_lists.id', $id)
            ->select('academic_notice_lists.*')->first();
        //        dd($datas);
        if ($datas == null) {
            return redirect()->intended('/acdemic-mgmt');
        }
        return view('acadesmiccategory-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internet  $internet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = AcademicNoticeList::where('id', $id)->first();

        return view('acadesmiccategory-mgmt/edit', ['Data' => $Datas]);
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
        AcademicNoticeList::where('id', $id)->update($input);

        return redirect()->intended('/acadesmiccategory-mgmt')->with('success', 'Data Update  Successfully');
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
        AcademicNoticeList::where('id', $id)->delete();
        return redirect()->intended('/acadesmiccategory-mgmt')->with('error', 'Deleted Successfully');
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
