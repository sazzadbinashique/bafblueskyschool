<?php

namespace App\Http\Controllers;

use App\Specialeducationprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;

class SpecialeducationprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Specialeducationprogram::orderBy('id', 'ASC')->get();
        return view('specialeducationprogram-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allShow()
    {
        $datas = Specialeducationprogram::orderBy('id', 'ASC')->get();
        return view('frontend/notice', ['datas' => $datas]);
    }

    public function create()
    {
        return view('specialeducationprogram-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,JPEG,PNG,png,jpg,JPG,gif,svg|max:10048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/image'), $input['image']);

        $input['title'] = $request->title;

        Specialeducationprogram::create($input);

        return redirect()->intended('/specialeducationprogram-mgmt')->with('message', 'Data created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialeducationprogram  $specialeducationprogram
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $datas = Specialeducationprogram::find($id);
        return view('specialeducationprogram-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specialeducationprogram  $specialeducationprogram
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $Datas = Specialeducationprogram::where('id', $id)->first();
        return view('specialeducationprogram-mgmt/edit', ['data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialeducationprogram  $specialeducationprogram
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
    
        $specialeducationprogram = Specialeducationprogram::findOrFail($id);
    
        if ($request->has('image')) {
            if (File::exists(public_path('uploads/image/' . $specialeducationprogram->image))) {
                File::delete(public_path('uploads/image/' . $specialeducationprogram->image));
            }
    
            $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/image'), $input['image']);
        }
    
        $input['title'] = $request->title;

    
        $specialeducationprogram->update($input);
    
        return redirect()->intended('/specialeducationprogram-mgmt')->with('message', 'Data updated Successfully');
    }

    public function remove($id)
    {
        $datas = Specialeducationprogram::findOrFail($id);
        // Specify the path to the image file
        $imageName = $datas['file']; // $imageName is the name of the image file
        // Specify the path to the image file
        $imagePath = public_path($imageName); // $imageName is the name of the image file
        // Check if the file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the file
            File::delete($imagePath);

            // Optionally, you can also remove the image record from the database or take any other necessary actions.
        } else {
            // Handle the case where the file does not exist
        }
        Specialeducationprogram::where('id', $id)->delete();
        return redirect()->intended('/specialeducationprogram-mgmt')->with('warning', 'Successfully Removed');
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



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialeducationprogram  $specialeducationprogram
     * @return \Illuminate\Http\Response
     */


    public function destroy(Specialeducationprogram $specialeducationprogram)
    {
        //
    }
}
