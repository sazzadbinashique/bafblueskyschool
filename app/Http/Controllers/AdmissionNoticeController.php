<?php

namespace App\Http\Controllers;

use App\AcademicNotice;
use App\AcademicNoticeList;
use App\AdmissionCategory;
use App\AdmissionNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdmissionNoticeController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('admission_notices')
            ->leftJoin('admission_categories', 'admission_notices.sub_cat_id', '=', 'admission_categories.id')
            ->select( 'admission_notices.*',
                'admission_categories.name as category' )->get();

        $admissionnoticelists = AdmissionCategory::orderBy('id', 'ASC')->get();
        return view('admissionnotice-mgmt/index', ['datas' => $datas, 'admissionnoticelists' => $admissionnoticelists]);
    }

    public function allAdmissionNotice($id)
    {
        $titles = AdmissionCategory::where('id', $id)->groupBy('id')->pluck('name')->first() ;
        $categoryLists = AdmissionCategory::orderBy('id', 'ASC')->get();
//        dd($titles);
        $datas = AdmissionNotice::where('sub_cat_id', $id)->get();
        return view('frontend/admissionnotice', compact('datas','titles','categoryLists'));

    }

    public function store(Request $request)
    {
        $keys = [
            'title',
            'file',
            'sub_cat_id'
        ];
        if ($request->hasfile('file')) {
            $allowedfileExtension = ['pdf'];
            $file = $request->file('file');
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

            $file->move('files/admissionnotice', $filename);
        }

        $input = $this->createQueryInput($keys, $request);
        $input['file'] = '/files/admissionnotice/' . $filename;
//        dd($input);
        AdmissionNotice::create($input);

        return redirect()->intended('/admissionnotice-mgmt')->with('message', 'Data created Successfull');

    }



    public function edit($id)
    {
        $admissionnoticelists = AdmissionCategory::orderBy('id', 'ASC')->get();
        $Datas = AdmissionNotice::where('id', $id)->first();
        return view('admissionnotice-mgmt/edit', ['data' => $Datas,'admissionnoticelists' => $admissionnoticelists]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = AdmissionNotice::findOrFail($id);

        if ($request->hasFile('file')) {
            $allowedfileExtension = ['pdf'];
            $file = $request->file('file');

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
            $file->move('files/admissionnotice/', $filename);
        } else {
            $filename = $datas['file'];

        }
        $keys = [
            'title',
            'file',
            'sub_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['file'] ='/files/admissionnotice/' .  $filename;

//        dd($input);
        AdmissionNotice::where('id', $id)->update($input);


        return redirect()->intended('/admissionnotice-mgmt')->with('success', 'Successfully updateded');

    }


    public function remove($id)
    {
        $datas = AdmissionNotice::findOrFail($id);
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
        AdmissionNotice::where('id', $id)->delete();
        return redirect()->intended('/admissionnotice-mgmt');
    }

    public function storeCategory(Request $request)
    {
        $keys = ['name', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        AdmissionCategory::create($input);

        return redirect()->intended('/admissionnotice-mgmt');
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
