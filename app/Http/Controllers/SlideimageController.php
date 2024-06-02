<?php

namespace App\Http\Controllers;

use App\Slideimage;
use Illuminate\Http\Request;
use App\NoticeBoard;
use App\Syllabus;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;


class SlideimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Slideimage::orderBy('id', 'ASC')->get();
        return view('slideimage-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allShow()
    {
        $datas = Slideimage::orderBy('id', 'ASC')->get();
        return view('frontend/notice', ['datas' => $datas]);
    }

    public function create()
    {
        return view('slideimage-mgmt/create');
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
            'slide_img' => 'required|image|mimes:jpeg,JPEG,PNG,png,jpg,JPG,gif,svg|max:10048',
        ]);

        $input['slide_img'] = time().'.'.$request->slide_img->getClientOriginalExtension();
        $request->slide_img->move(public_path('uploads/image'), $input['slide_img']);

        $input['img_title'] = $request->img_title;

        Slideimage::create($input);

        return redirect()->intended('/slideimage-mgmt')->with('message', 'Data created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slideimage  $slideimage
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $datas = Slideimage::find($id);
        return view('slideimage-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slideimage  $slideimage
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $Datas = Slideimage::where('id', $id)->first();
        return view('slideimage-mgmt/edit', ['data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slideimage  $slideimage
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'slide_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
    
        $slideimage = Slideimage::findOrFail($id);
    
        if ($request->has('slide_img')) {
            if (File::exists(public_path('uploads/image/' . $slideimage->slide_img))) {
                File::delete(public_path('uploads/image/' . $slideimage->slide_img));
            }
    
            $input['slide_img'] = time() . '.' . $request->slide_img->getClientOriginalExtension();
            $request->slide_img->move(public_path('uploads/image'), $input['slide_img']);
        }
    
        $input['img_title'] = $request->img_title;

    
        $notice->update($input);
    
        return redirect()->intended('/slideimage-mgmt')->with('message', 'Data updated Successfully');
    }

    public function remove($id)
    {
        $datas = Slideimage::findOrFail($id);
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
        Slideimage::where('id', $id)->delete();
        return redirect()->intended('/slideimage-mgmt')->with('warning', 'Successfully Removed');
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
     * @param  \App\Slideimage  $slideimage
     * @return \Illuminate\Http\Response
     */


    public function destroy(Slideimage $slideimage)
    {
        //
    }

}
