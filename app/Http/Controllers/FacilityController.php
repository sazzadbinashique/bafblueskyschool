<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use App\ChairmanMessage;
use App\GalleryCategory;
use App\FacilityCategory;
use App\HomeBannerImage;
use App\Nonteachingstaff;
use App\PrincipleMessage;
use App\WeOffer;
use App\ImageGallery;
use App\Principal;
use App\chairman;
use App\ManagingCommittee;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = \Illuminate\Support\Facades\DB::table('facilities')
            ->leftJoin('facility_categories', 'facilities.facility_cat_id', '=', 'facility_categories.id')
            ->select( 'facilities.*',
                'facility_categories.name as category' )->get();

        $facilityCats = FacilityCategory::orderBy('id', 'ASC')->get();
        return view('facility-mgmt/index', ['datas' => $datas, 'facilityCats' => $facilityCats]);
    }

    public function facility($id)
    {
        $titles = FacilityCategory::where('id', $id)->groupBy('id')->pluck('name')->first() ;
        $images = Facility::where('facility_cat_id', $id)->get();
        $facilityCats = FacilityCategory::orderBy('id', 'ASC')->get();
        return view('frontend/facility', compact('images','titles','facilityCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'title',
            'image',
            'facility_cat_id'
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

            $file->move('image/facility', $filename);
        }

        $input = $this->createQueryInput($keys, $request);
        $input['image'] = '/image/facility/' . $filename;
//        dd($input);
        Facility::create($input);

        return redirect()->intended('/facility-mgmt')->with('message', 'Teachingstaff created Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        $datas = Facility::where('facilities.id', $id)
            ->leftJoin('facility_categories', 'facilities.facility_cat_id', '=', 'facility_categories.id')
            ->select(
                'facilities.*',
                'facility_categories.name as category'

            )->first();

        return view('facility-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilityCats = FacilityCategory::orderBy('id', 'ASC')->get();
        $Datas = Facility::where('id', $id)->first();
        return view('facility-mgmt/edit', ['data' => $Datas,'facilityCats' => $facilityCats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $this->validateInput($request);

        $datas = Facility::findOrFail($id);

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
            $file->move('image/facility/', $filename);
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'title',
            'image',
            'facility_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        Facility::where('id', $id)->update($input);


        return redirect()->intended('/facility-mgmt')->with('success', 'Successfully updateded');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }

    public function remove($id)
    {
        $datas = Facility::findOrFail($id);
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
        Facility::where('id', $id)->delete();
        return redirect()->intended('/facility-mgmt');
    }

    public function storeCategory(Request $request)
    {
        $keys = ['name', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        FacilityCategory::create($input);

        return redirect()->intended('/facility-mgmt');
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
