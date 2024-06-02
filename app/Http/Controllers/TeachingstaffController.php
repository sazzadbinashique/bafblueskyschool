<?php

namespace App\Http\Controllers;

use App\ContactModel;
use App\ManpowerModel;
use App\Models\RankModel;
use App\Models\RoomModel;
use App\Teachingstaff;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeachingstaffController extends Controller
{

    public function index()
    {
        $datas = Teachingstaff::orderBy('appointment_ser_no', 'ASC')->get();
        return view('teachingstaff-mgmt/index', ['datas' => $datas]);
    }

    public function allShow()
    {
        $datas = Teachingstaff::orderBy('id', 'ASC')->get();
        return view('frontend/aboutus/teachingstaff', compact('datas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('teachingstaff-mgmt/create');
    }

    public function store(Request $request)
    {
        $keys = [
            'name',
            'qualification',
            'designation',
            'branch',
            'mobile_no',
            'email',
            'remarks',
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

            $file->move('image/staffimage', $filename);
        }
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/staffimage/'.$filename;
//        dd($input);
        Teachingstaff::create($input);

        // Teachingstaff::create($request->all());
        //$teachingstaff->save();
        return redirect()->intended('/teachingstaff-mgmt')->with('message', 'Teachingstaff created Successfull');
    }


    public function show($id)
    {
        $datas = Teachingstaff::find($id);
        return view('teachingstaff-mgmt/view', ['data' => $datas]);
    }


    public function edit($id)
    {
        $Datas = Teachingstaff::where('id', $id)->first();
        return view('teachingstaff-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = Teachingstaff::findOrFail($id);

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
            $file->move('image/staffimage/', $filename);
            $filename = '/image/staffimage/'.$filename;
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
            'remarks',
            'appointment_ser_no'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        Teachingstaff::where('id', $id)->update($input);


        return redirect()->intended('/teachingstaff-mgmt')->with('success', 'Successfully updateded');

    }

    public function remove($id)
    {
        $datas = Teachingstaff::findOrFail($id);
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
        Teachingstaff::where('id', $id)->delete();
        return redirect()->intended('/teachingstaff-mgmt');
    }

    public function destroy(Teachingstaff $teachingstaff)
    {
        $teachingstaff->delete();

        return redirect()->route('teachingstaffs.index')
            ->with('success', 'Teachingstaff deleted successfully');
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
