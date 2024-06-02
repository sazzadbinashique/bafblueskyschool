<?php

namespace App\Http\Controllers;

use App\ChairmanMessage;
use App\PrincipleMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PrincipleMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = PrincipleMessage::orderBy('id', 'ASC')->get();
        return view('principlemessage-mgmt/index', ['datas' => $datas]);
    }

    public function principal()
    {
        $datas = PrincipleMessage::orderBy('id', 'ASC')->first();
        return view('frontend/aboutus/principal', ['datas' => $datas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('principlemessage-mgmt/create');
    }


    public function store(Request $request)
    {

        $keys = [
            'name',
            'image',
            'description_1',
            'description_2',
            'description_3',
            'conclusion'
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

            $file->move('image/principlemessage', $filename);
            //$teachingstaff->image = $filename;
        }

        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/principlemessage/'.$filename;
//        dd($input);
        PrincipleMessage::create($input);

        return redirect()->intended('/principlemessage-mgmt')->with('message', 'Data created Successfully');

    }public function show($id)
{
    $datas = PrincipleMessage::find($id);
    return view('principlemessage-mgmt/view', ['data' => $datas]);
}
    public function edit($id)
    {
        $Datas = PrincipleMessage::where('id', $id)->first();
        return view('principlemessage-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = PrincipleMessage::findOrFail($id);
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
            $file->move('image/principlemessage/', $filename);
            $filename = '/image/principlemessage/'.$filename;
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'name',
            'image',
            'description_1',
            'description_2',
            'description_3',
            'conclusion'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        PrincipleMessage::where('id', $id)->update($input);


        return redirect()->intended('/principlemessage-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = PrincipleMessage::findOrFail($id);
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
        PrincipleMessage::where('id', $id)->delete();
        return redirect()->intended('/principlemessage-mgmt')->with('warning', 'Successfully Removed');
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
