<?php

namespace App\Http\Controllers;

use App\AcademicNotice;
use App\AcademicNoticeList;
use App\GalleryCategory;
use App\ImageGallery;
use App\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AcademicNoticeController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('academic_notices')
            ->leftJoin('academic_notice_lists', 'academic_notices.academicnotice_cat_id', '=', 'academic_notice_lists.id')
            ->select( 'academic_notices.*',
                'academic_notice_lists.name as category' )->get();

        $academicnoticelists = AcademicNoticeList::orderBy('id', 'ASC')->get();
        return view('academicnotice-mgmt/index', ['datas' => $datas, 'academicnoticelists' => $academicnoticelists]);
    }

    public function allAcademicNotice($id)
    {
        $titles = AcademicNoticeList::where('id', $id)->groupBy('id')->pluck('name')->first() ;
        $categoryLists = AcademicNoticeList::orderBy('id', 'ASC')->get();
//        dd($titles);
        $datas = AcademicNotice::where('academicnotice_cat_id', $id)->get();
        return view('frontend/academicnotice', compact('datas','titles','categoryLists'));

    }

    public function store(Request $request)
    {
        $keys = [
            'title',
            'file',
            'academicnotice_cat_id'
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

            $file->move('files/academicnotice', $filename);
        }

        $input = $this->createQueryInput($keys, $request);
        $input['file'] = '/files/academicnotice/' . $filename;
//        dd($input);
        AcademicNotice::create($input);

        return redirect()->intended('/academicnotice-mgmt')->with('message', 'Data created Successfull');

    }



    public function edit($id)
    {
        $academicnoticelists = AcademicNoticeList::orderBy('id', 'ASC')->get();
        $Datas = AcademicNotice::where('id', $id)->first();
        return view('academicnotice-mgmt/edit', ['data' => $Datas,'academicnoticelists' => $academicnoticelists]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $datas = AcademicNotice::findOrFail($id);

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
            $file->move('files/academicnotice/', $filename);
        } else {
            $filename = $datas['file'];

        }
        $keys = [
            'title',
            'file',
            'academicnotice_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['file'] ='/files/academicnotice/' .  $filename;

//        dd($input);
        AcademicNotice::where('id', $id)->update($input);


        return redirect()->intended('/academicnotice-mgmt')->with('success', 'Successfully updateded');

    }


    public function remove($id)
    {
        $datas = AcademicNotice::findOrFail($id);
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
        AcademicNotice::where('id', $id)->delete();
        return redirect()->intended('/academicnotice-mgmt');
    }

    public function storeCategory(Request $request)
    {
        $keys = ['name', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        AcademicNoticeList::create($input);

        return redirect()->intended('/academicnotice-mgmt');
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
