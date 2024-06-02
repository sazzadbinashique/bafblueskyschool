<?php

namespace App\Http\Controllers;

use App\Latestinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Str;

class LatestinfoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Latestinfo::orderBy('id', 'ASC')->get();
        return view('latestinfo-mgmt/index', ['datas' => $datas]);
    }
    public function allShow()
    {
        $datas = Latestinfo::orderBy('id', 'ASC')->get();
        return view('frontend/latestinfo', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('latestinfo-mgmt/create');
    }


    public function store(Request $request)
    {

        if ($request->hasFile('latest_news_doc')) { // check if file exists in the request
            $file = $request->file('latest_news_doc');
            $filename = uniqid('latest_news_doc_', true) . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        } else {
            $filename = null; // if file doesn't exist in the request
        }
        
        $keys = [
            'title',
        ];
        
        $input = $this->createQueryInput($keys, $request);
        $input['latest_news_doc'] = $filename; // assign filename to input array
        Latestinfo::create($input);
        

        return redirect()->intended('/latestinfo-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = Latestinfo::find($id);
        return view('latestinfo-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = Latestinfo::where('id', $id)->first();
        return view('latestinfo-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);
        $datas = Latestinfo::findOrFail($id);

        if ($request->hasFile('latest_news_doc')) { // check if file exists in the request
            $file = $request->file('latest_news_doc');
            $filename = uniqid('latest_news_doc_', true) . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        } else {
            $filename = null; // if file doesn't exist in the request
        }


        $keys = [
            'title'
        ];

        $input = $this->createQueryInput($keys, $request);
        $input['latest_news_doc'] = $filename; // assign filename to input array

        Latestinfo::where('id', $id)->update($input);


        return redirect()->intended('/latestinfo-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = Latestinfo::findOrFail($id);

        Latestinfo::where('id', $id)->delete();
        
        return redirect()->intended('/latestinfo-mgmt')->with('warning', 'Successfully Removed');
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
