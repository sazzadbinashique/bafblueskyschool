<?php

namespace App\Http\Controllers;

use App\ChairmanMessage;
use App\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ChairmanMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ChairmanMessage::orderBy('id', 'ASC')->get();
        return view('chairmenmessage-mgmt/index', ['datas' => $datas]);
    }

    public function allShow()
    {
        $datas = ChairmanMessage::orderBy('id', 'ASC')->get();
        return view('frontend/notice', ['datas' => $datas]);
    }

    public function chairman()
    {
        $datas = ChairmanMessage::orderBy('id', 'ASC')->first();
        return view('frontend/aboutus/chairman', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chairmenmessage-mgmt/create');
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

            $file->move('image/chairmenmessage', $filename);
            //$teachingstaff->image = $filename;
        }

        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/chairmenmessage/' . $filename;
//        dd($input);
        ChairmanMessage::create($input);

        return redirect()->intended('/chairmenmessage-mgmt')->with('message', 'Data created Successfully');

    }

    public function show($id)
    {
        $datas = ChairmanMessage::find($id);
        return view('chairmenmessage-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $Datas = ChairmanMessage::where('id', $id)->first();
        return view('chairmenmessage-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = ChairmanMessage::findOrFail($id);
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
            $file->move('image/chairmenmessage/', $filename);
            $filename = '/image/chairmenmessage/' . $filename;
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
        ChairmanMessage::where('id', $id)->update($input);


        return redirect()->intended('/chairmenmessage-mgmt')->with('success', 'Successfully updated');

    }


    public function remove($id)
    {
        $datas = ChairmanMessage::findOrFail($id);
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
        ChairmanMessage::where('id', $id)->delete();
        return redirect()->intended('/chairmenmessage-mgmt')->with('warning', 'Successfully Removed');
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
