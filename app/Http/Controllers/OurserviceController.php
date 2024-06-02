<?php

namespace App\Http\Controllers;

use App\Ourservice;
use App\OurserviceCategory;
use Illuminate\Http\Request;
use App\Educationprogram;
use App\EducationprogramCategory;
use App\ChairmanMessage;
use App\GalleryCategory;
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

class OurserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = \Illuminate\Support\Facades\DB::table('ourservices')
            ->leftJoin('ourservice_categories', 'ourservices.ourservice_cat_id', '=', 'ourservice_categories.id')
            ->select( 'ourservices.*',
                'ourservice_categories.name as category' )->get();

        $ourserviceCats = OurserviceCategory::orderBy('id', 'ASC')->get();
        return view('ourservice-mgmt/index', ['datas' => $datas, 'ourserviceCats' => $ourserviceCats]);
    }

    public function gallery($id)
    {
        $titles = Ourservice::where('id', $id)->groupBy('id')->pluck('name')->first() ;
        $images = Ourservice::where('ourservice_cat_id', $id)->get();
        $ourserviceCats = Ourservice::orderBy('id', 'ASC')->get();
        return view('frontend/gallery', compact('images','titles','ourserviceCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,JPEG,PNG,png,jpg,JPG,gif,svg|max:10048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/image'), $input['image']);

        $input['title'] = $request->title;
        $input['description1'] = $request->description1;
        $input['description2'] = $request->description2;
        $input['description3'] = $request->description3;
        $input['ourservice_cat_id'] = $request->ourservice_cat_id;

        Ourservice::create($input);

        return redirect()->intended('/ourservice-mgmt')->with('message', 'Our Service created Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ourservice  $ourservice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Ourservice::where('ourservices.id', $id)
            ->leftJoin('ourservice_categories', 'ourservices.ourservice_cat_id', '=', 'ourservice_categories.id')
            ->select(
                'ourservices.*',
                'ourservice_categories.name as category'

            )->first();

        return view('ourservice-mgmt/view', ['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ourservice  $ourservice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ourserviceCats = OurserviceCategory::orderBy('id', 'ASC')->get();
        $Datas = Ourservice::where('id', $id)->first();
        return view('ourservice-mgmt/edit', ['data' => $Datas,'ourserviceCats' => $ourserviceCats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ourservice  $ourservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048'
        ]);

        // Find the education program record
        $ourservice = Ourservice::findOrFail($id);

        // Check if image file is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Move the uploaded file to the desired location
            $image->move(public_path('uploads/image'), $filename);

            // Delete the old image file if exists
            if (File::exists(public_path('uploads/image/' . $ourservice->image))) {
                File::delete(public_path('uploads/image/' . $ourservice->image));
            }

            // Update the image filename in the input data
            $input['image'] = $filename;
        }

        // Update other fields in the input data
        $input['title'] = $request->title;
        $input['description1'] = $request->description1;
        $input['description2'] = $request->description2;
        $input['description3'] = $request->description3;
        $input['ourservice_cat_id'] = $request->ourservice_cat_id;

        // Update the education program record with the new data
        $ourservice->update($input);

        // Redirect back with success message
        return redirect()->intended('/ourservice-mgmt')->with('success', 'Successfully updated');
    }

    public function remove($id)
    {
        $datas = Ourservice::findOrFail($id);
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
        Ourservice::where('id', $id)->delete();
        return redirect()->intended('/ourservice-mgmt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ourservice  $ourservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ourservice $ourservice)
    {
        //
    }

    public function storeCategory(Request $request)
    {

        $keys = ['name', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        OurserviceCategory::create($input);

        return redirect()->intended('/ourservice-mgmt');
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
