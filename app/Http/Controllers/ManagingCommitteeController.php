<?php

namespace App\Http\Controllers;
use App\ChairmanMessage;
use App\ManagingCommittee;
use App\Teachingstaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ManagingCommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ManagingCommittee::orderBy('appointment_ser_no', 'ASC')->get();
        return view('managingcommittee-mgmt/index', ['datas' => $datas]);
    }
    public function committee()
    {
        $datas = ManagingCommittee::orderBy('appointment_ser_no', 'ASC')->get();

        if ($datas == null) {
            return redirect()->intended('/');
        }
        return view('frontend/administration/committee', ['datas' => $datas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managingcommittee-mgmt/create');
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
            'designation',
            'appointment_ser_no'
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

            $file->move('image/managingcommittee', $filename);
        }

        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/managingcommittee/' . $filename;
//        dd($input);
        ManagingCommittee::create($input);

        return redirect()->intended('/managingcommittee-mgmt')->with('message', 'Data created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = ManagingCommittee::find($id);
        return view('managingcommittee-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Datas = ManagingCommittee::where('id', $id)->first();
        return view('managingcommittee-mgmt/edit', ['data' => $Datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validateInput($request);

        $datas = ManagingCommittee::findOrFail($id);
        if ($request->hasFile('image')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'];
            $file = $request->file('image');

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
            $file->move('image/managingcommittee/', $filename);
            $filename = '/image/managingcommittee/' . $filename;
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'name',
            'designation',
            'appointment_ser_no'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        ManagingCommittee::where('id', $id)->update($input);


        return redirect()->intended('/managingcommittee-mgmt')->with('success', 'Successfully updated');
    }
    public function remove($id)
    {
        $datas = ManagingCommittee::findOrFail($id);
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
        ManagingCommittee::where('id', $id)->delete();
        return redirect()->intended('/managingcommittee-mgmt')->with('warning', 'Successfully Removed');
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
