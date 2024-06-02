<?php

namespace App\Http\Controllers;

use App\Studentinfo;
use App\Parentsfeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Studentinfo::orderBy('id', 'ASC')->get();
        return view('studentinfo-mgmt/index', ['datas' => $datas]);
    }

    public function allShow()
    {
        $datas = Studentinfo::orderBy('id', 'ASC')->get();
        return view('frontend/studentinfo', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentinfo-mgmt/create');
    }


    public function store(Request $request)
    {

        $keys = [
            'name',
            'student_id',
            'email',
            'class'
        ];
        
        $input = $this->createQueryInput($keys, $request);
        Studentinfo::create($input);
        // Parentsfeedback::create($input);

        return redirect()->intended('/studentinfo-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = Studentinfo::find($id);
        return view('studentinfo-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = Studentinfo::where('id', $id)->first();
        return view('studentinfo-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = Studentinfo::findOrFail($id);

        $keys = [
            'name',
            'student_id',
            'email',
            'class'
        ];

        $input = $this->createQueryInput($keys, $request);

        Studentinfo::where('id', $id)->update($input);

        return redirect()->intended('/studentinfo-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = Studentinfo::findOrFail($id);

        Studentinfo::where('id', $id)->delete();
        
        return redirect()->intended('/studentinfo-mgmt')->with('warning', 'Successfully Removed');
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
            'name',
            'student_id',
            'email',
            'class'
        ];
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }

}
