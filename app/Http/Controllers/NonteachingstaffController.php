<?php

namespace App\Http\Controllers;

use App\Nonteachingstaff;
use App\Teachingstaff;
use App\WeOffer;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NonteachingstaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Nonteachingstaff::orderBy('id', 'ASC')->get();
        return view('non-teachingstaff-mgmt/index', ['datas' => $datas]);
    }

    public function nonteachingstaff()
    {
        $datas =Nonteachingstaff::orderBy('id', 'ASC')->get();
//        dd($datas->image);
        return view('frontend/aboutus/nonteachingstaff', ['datas' => $datas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('non-teachingstaff-mgmt/create');
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
            'qualification',
            'designation',
            'branch',
            'mobile_no',
            'email',
            'remarks'
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

            $file->move('image/staffimagenonteaching', $filename);
        }
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/staffimagenonteaching/'.$filename;
//        dd($input);
        Nonteachingstaff::create($input);

        return redirect()->intended('/non-teachingstaff-mgmt')->with('message', 'Teachingstaff created Successfull');

    }

    public function show($id)
    {
        $datas = Nonteachingstaff::find($id);
        return view('non-teachingstaff-mgmt/view', ['data' => $datas]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachingstaff  $teachingstaff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = Nonteachingstaff::where('id', $id)->first();
        return view('non-teachingstaff-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = Nonteachingstaff::findOrFail($id);

        if ($request->hasFile('image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . "." . $extension;

            $fileSize = $file->getSize();
            $maxFileSize = UPLOAD_FILE_SIZE; // 8MB

            if ($fileSize > $maxFileSize * UPLOAD_FILE_SIZE) {
                return back()->with('success', 'File size exceeds the maximum allowed limit (4MB).');
            }

            if (!in_array($extension, $allowedfileExtension)) {
                return back()->with('success', 'Unsupported file extension. Only JPG, PNG, GIF, and JPEG files are allowed.');
            }
            $file->move('image/staffimagenonteaching/', $filename);
            $filename = '/image/staffimagenonteaching/'.$filename;
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'name',
            'qualification',
            'designation',
            'branch',
            'mobile_no',
            'email',
            'remarks'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        Nonteachingstaff::where('id', $id)->update($input);


        return redirect()->intended('/non-teachingstaff-mgmt')->with('success', 'Successfully updateded');

    }
    public function remove($id)
    {
        $datas = Nonteachingstaff::findOrFail($id);
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
        Nonteachingstaff::where('id', $id)->delete();
        return redirect()->intended('/non-teachingstaff-mgmt');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teachingstaff  $teachingstaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nonteachingstaff $nonteachingstaff)
    {
        $nonteachingstaff->delete();

        return redirect()->route('nonteachingstaffs.index')
                        ->with('success','Nonteachingstaff deleted successfully');
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
            'name' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'branch' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        return $validator;
    }
}
