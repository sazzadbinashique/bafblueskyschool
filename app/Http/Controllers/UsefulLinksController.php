<?php

namespace App\Http\Controllers;

use App\ContactInformation;
use App\UsefulLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsefulLinksController extends Controller
{
    public function index()
    {
        $datas = UsefulLinks::orderBy('id', 'ASC')->get();

        return view('usefulllinks-mgmt/index', ['datas' => $datas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usefulllinks-mgmt/create');
    }


    public function store(Request $request)
    {

        $keys = [
            'link_name',
            'link_address'
        ];
        $input = $this->createQueryInput($keys, $request);

        UsefulLinks::create($input);

        return redirect()->intended('/usefulllinks-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = UsefulLinks::find($id);

        if ($datas == null) {
            return redirect()->intended('/usefulllinks-mgmt');
        }
        return view('usefulllinks-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = UsefulLinks::where('id', $id)->first();
        return view('usefulllinks-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $keys = [
            'link_name',
            'link_address'
        ];
        $input = $this->createQueryInput($keys, $request);
        UsefulLinks::where('id', $id)->update($input);


        return redirect()->intended('/usefulllinks-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        UsefulLinks::where('id', $id)->delete();
        return redirect()->intended('/usefulllinks-mgmt')->with('warning', 'Successfully Removed');
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
