<?php

namespace App\Http\Controllers;

use App\NoticeBoard;
use App\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use DB;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = NoticeBoard::orderBy('id', 'ASC')->get();
        return view('noticeboard-mgmt/index', ['datas' => $datas]);
    }

    public function allShow()
    {
        $datas = NoticeBoard::orderBy('id', 'ASC')->get();
        return view('frontend/notice', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticeboard-mgmt/create');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'notice_img' => 'required|image|mimes:jpeg,JPEG,PNG,png,jpg,JPG,gif,svg|max:10048',
        ]);

        $input['notice_img'] = time().'.'.$request->notice_img->getClientOriginalExtension();
        $request->notice_img->move(public_path('uploads/image'), $input['notice_img']);

        $input['notice_publish_dt'] = $request->notice_publish_dt;
        $input['notice_admin_name'] = $request->notice_admin_name;
        $input['notice_title'] = $request->notice_title;
        $input['notice_description'] = $request->notice_description;

        NoticeBoard::create($input);

        return redirect()->intended('/noticeboard-mgmt')->with('message', 'Data created Successfully');

    }
    
    public function show($id)
    {
      $datas = NoticeBoard::find($id);
      return view('noticeboard-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = NoticeBoard::where('id', $id)->first();
        return view('noticeboard-mgmt/edit', ['data' => $Datas]);
    }


    public function update(Request $request, $id)
    {
        
    $this->validate($request, [
        'notice_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ]);

    $notice = NoticeBoard::findOrFail($id);

    if ($request->has('notice_img')) {
        if (File::exists(public_path('uploads/image/' . $notice->notice_img))) {
            File::delete(public_path('uploads/image/' . $notice->notice_img));
        }

        $input['notice_img'] = time() . '.' . $request->notice_img->getClientOriginalExtension();
        $request->notice_img->move(public_path('uploads/image'), $input['notice_img']);
    }

    $input['notice_publish_dt'] = $request->notice_publish_dt;
    $input['notice_admin_name'] = $request->notice_admin_name;
    $input['notice_title'] = $request->notice_title;
    $input['notice_description'] = $request->notice_description;

    $notice->update($input);

    return redirect()->intended('/noticeboard-mgmt')->with('message', 'Data updated Successfully');
    
    }



    public function remove($id)
    {
        $datas = NoticeBoard::findOrFail($id);
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
        NoticeBoard::where('id', $id)->delete();
        return redirect()->intended('/noticeboard-mgmt')->with('warning', 'Successfully Removed');
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
