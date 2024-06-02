<?php

namespace App\Http\Controllers;

use App\HomePageInfo;
use App\SchoolHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomePageInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = HomePageInfo::orderBy('id', 'ASC')->get();
        return view('homepageinfo-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homepageinfo-mgmt/create');
    }


    public function store(Request $request)
    {
        $keys = [
            'copyright_tag',
            'developed_by_tag',
            'description_1',
            'description_2',
            'top_image',
            'bottom_image'
        ];

        if ($request->hasfile('top_image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('top_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $fileSize = $file->getSize();
            $maxFileSize = UPLOAD_FILE_SIZE; // 8MB
            if ($fileSize > $maxFileSize * 1024) {
                return back()->with('error', 'File size exceeds the maximum allowed limit (4MB).');
            }
            if (!in_array($extension, $allowedfileExtension)) {
                return back()->with('error', 'Unsupported file extension. Only PDF files is allowed.');
            }
            $file->move('image/homepageinfo', $filename);
        }
        if ($request->hasfile('bottom_image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('bottom_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $fileSize = $file->getSize();
            $maxFileSize = UPLOAD_FILE_SIZE; // 8MB
            if ($fileSize > $maxFileSize * 1024) {
                return back()->with('error', 'File size exceeds the maximum allowed limit (4MB).');
            }
            if (!in_array($extension, $allowedfileExtension)) {
                return back()->with('error', 'Unsupported file extension. Only PDF files is allowed.');
            }
            $file->move('image/homepageinfo', $filename);
        }


        $input = $this->createQueryInput($keys, $request);
        $input['top_image'] = '/image/homepageinfo/'.$filename;
        $input['bottom_image'] = '/image/homepageinfo/'.$filename;
//        dd($input);
        HomePageInfo::create($input);

        return redirect()->intended('/homepageinfo-mgmt')->with('message', 'Data created Successfully');

    }public function show($id)
{
    $datas = HomePageInfo::find($id);
    return view('homepageinfo-mgmt/view', ['data' => $datas]);
}
    public function edit($id)
    {
        $Datas = HomePageInfo::where('id', $id)->first();
        return view('homepageinfo-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = HomePageInfo::findOrFail($id);
        if($request->hasFile('top_image')){
            if ($request->hasFile('top_image')) {
                $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
                $file = $request->file('top_image');

                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHis') . "." . $extension;

                $fileSize = $file->getSize();
                $maxFileSize = UPLOAD_FILE_SIZE; // 8MB

                if ($fileSize > $maxFileSize * 1024) {
                    return back()->with('error', 'File size exceeds the maximum allowed limit (4MB).');
                }

                if (!in_array($extension, $allowedfileExtension)) {
                    return back()->with('error', 'Unsupported file extension. Only JPG, PNG, GIF, and JPEG files are allowed.');
                }
                $file->move('image/homepageinfo/', $filename);
                $filenameTop = '/image/homepageinfo/'.$filename;
            }
        }
         else {
            $filenameTop = $datas['top_image'];
        }
        if($request->hasFile('bottom_image')){
            if ($request->hasFile('bottom_image')) {
                $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
                $file = $request->file('bottom_image');

                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHis') . "." . $extension;

                $fileSize = $file->getSize();
                $maxFileSize = UPLOAD_FILE_SIZE; // 8MB

                if ($fileSize > $maxFileSize * 1024) {
                    return back()->with('error', 'File size exceeds the maximum allowed limit (4MB).');
                }

                if (!in_array($extension, $allowedfileExtension)) {
                    return back()->with('error', 'Unsupported file extension. Only JPG, PNG, GIF, and JPEG files are allowed.');
                }
                $file->move('image/homepageinfo/', $filename);
                $filenamebottom = '/image/homepageinfo/'.$filename;
            }
        }
        else {
            $filenamebottom = $datas['bottom_image'];

        }
        $keys = [
            'copyright_tag',
            'developed_by_tag',
            'description_1',
            'description_2',
            'top_image',
            'bottom_image'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['top_image'] = $filenameTop;
        $input['bottom_image'] = $filenamebottom;
//        dd($input);
        HomePageInfo::where('id', $id)->update($input);


        return redirect()->intended('/homepageinfo-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = HomePageInfo::findOrFail($id);
        // Specify the path to the image file
        $topimageName = $datas['top_image']; // $imageName is the name of the image file
        $bottopmimageName = $datas['bottom_image'];
        // Specify the path to the image file
        $topimagePath = public_path($topimageName);
        $bottomimagePath = public_path($bottopmimageName);// $imageName is the name of the image file
        // Check if the file exists before attempting to delete
        if (File::exists($topimagePath)) {
            // Delete the file
            File::delete($topimagePath);

            // Optionally, you can also remove the image record from the database or take any other necessary actions.
        } else {
            // Handle the case where the file does not exist
        }
        if (File::exists($bottomimagePath)) {
            // Delete the file
            File::delete($bottomimagePath);

            // Optionally, you can also remove the image record from the database or take any other necessary actions.
        } else {
            // Handle the case where the file does not exist
        }
        HomePageInfo::where('id', $id)->delete();
        return redirect()->intended('/homepageinfo-mgmt')->with('error', 'Successfully Removed');
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
