<?php

namespace App\Http\Controllers;

use App\Extra_curicular_actvt;
use App\HomeBannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeBannerImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = HomeBannerImage::orderBy('id', 'ASC')->get();
        return view('homebannerimage-mgmt/index', ['datas' => $datas]);
    }

    public function store(Request $request)
    {

        $keys = [
            'title',
            'image'
        ];
        if ($request->hasfile('image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('image');
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

            $file->move('image/homebannerimage', $filename);
        }

        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/homebannerimage/'.$filename;
//        dd($input);
        HomeBannerImage::create($input);

        return redirect()->intended('/homebannerimage-mgmt')->with('message', 'Data created Successfull');

    }public function show($id)
{
    $datas = HomeBannerImage::find($id);
    return view('homebannerimage-mgmt/view', ['data' => $datas]);
}
    public function edit($id)
    {
        $Datas = HomeBannerImage::where('id', $id)->first();
        return view('homebannerimage-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = HomeBannerImage::findOrFail($id);

        if ($request->hasFile('image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . "." . $extension;

            $fileSize = $file->getSize();
            $maxFileSize = UPLOAD_FILE_SIZE; // 8MB

            if ($fileSize > $maxFileSize * 1024) {
                return back()->with('success', 'File size exceeds the maximum allowed limit (4MB).');
            }

            if (!in_array($extension, $allowedfileExtension)) {
                return back()->with('success', 'Unsupported file extension. Only JPG, PNG, GIF, and JPEG files are allowed.');
            }
            $file->move('image/homebannerimage/', $filename);
            $filename = '/image/homebannerimage/'.$filename;
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'title',
            'image'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        HomeBannerImage::where('id', $id)->update($input);


        return redirect()->intended('/homebannerimage-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = HomeBannerImage::findOrFail($id);
        // Specify the path to the image file
        $imageName = $datas['image']; // $imageName is the name of the image file
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
        HomeBannerImage::where('id', $id)->delete();
        return redirect()->intended('/homebannerimage-mgmt');
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
