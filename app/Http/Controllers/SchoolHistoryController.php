<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\PrincipleMessage;
use App\SchoolHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SchoolHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = SchoolHistory::orderBy('id', 'ASC')->get();
        return view('schoolhistory-mgmt/index', ['datas' => $datas]);
    }

    public function history()
    {
        $datas = SchoolHistory::orderBy('id', 'ASC')->first();
        return view('frontend/aboutus/history', ['datas' => $datas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolhistory-mgmt/create');
    }


    public function store(Request $request)
    {
        // Validate the form data including the image files
        $validator = validator($request->all(), [
            'aboutus_title' => 'required|string|max:255',
            'aboutus_detail' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,JPG,PNG,jpg,gif|max:80000',
        ], [
            'images.*.image' => 'The uploaded file must be an image.',
            'images.*.mimes' => 'The image must be in JPEG, PNG, or GIF format.',
            'images.*.max' => 'The image size cannot exceed 40 MB.',
        ]);

        if ($validator->passes()) {
            // Process the form data
            $formData = $request->except('images'); // Exclude images from main form data

            // Handle the image uploads
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $fileName = time() . "_{$key}." . $image->getClientOriginalExtension();
                    $image->move('image/schoolhistory', $fileName);
                    // Store the file name in the form data array
                    $keyName = "image_" . ($key + 1);
                    $formData[$keyName] = '/image/schoolhistory/'.$fileName;;
                }
            }
            SchoolHistory::create($formData);
            return redirect()->intended('/schoolhistory-mgmt')->with('success', 'Data created Successfully');
        } else {
            // If validation fails, redirect back with validation errors and warning message
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'Data creation failed. Please fix the errors.')
                ->with('warning', implode(', ', Arr::flatten($validator->errors()->messages())));
        }

    }

    public function edit($id)
    {
        $Datas = SchoolHistory::where('id', $id)->first();
        return view('schoolhistory-mgmt/edit', ['data' => $Datas]);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        // Validate the form data including the image files
        $validator = validator($request->all(), [
            'aboutus_title' => 'required|string|max:255',
            'aboutus_detail' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,JPG,PNG,jpg,gif|max:40000',
        ], [
            'images.*.image' => 'The uploaded file must be an image.',
            'images.*.mimes' => 'The image must be in JPEG, PNG, or GIF format.',
            'images.*.max' => 'The image size cannot exceed 40 MB.',
        ]);

        if ($validator->passes()) {
            // Process the form data
            $formData = $request->except('images'); // Exclude images from main form data

            // Handle the image uploads
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $fileName = time() . "_{$key}." . $image->getClientOriginalExtension();
                    $image->move('image/schoolhistory', $fileName);
                    // Store the file name in the form data array
                    $keyName = "image_" . ($key + 1);
                    $formData[$keyName] = '/image/schoolhistory/' . $fileName;
                }
            }
            // Update the record in the database
            SchoolHistory::findOrFail($id)->update($formData);

            return redirect()->intended('/schoolhistory-mgmt')->with('success', 'Data updated Successfully');
        } else {
            // If validation fails, redirect back with validation errors and warning message
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'Data update failed. Please fix the errors.')
                ->with('error', implode(', ', Arr::flatten($validator->errors()->messages())));
        }

    }


    public function remove($id)
    {
        $datas = SchoolHistory::findOrFail($id);
// Retrieve the paths of the four images
        $imagePaths = [
            $datas->image_1,
            $datas->image_2,
            $datas->image_3,
            $datas->image_4,
        ];
// Loop through each image path and delete the file
        foreach ($imagePaths as $imagePath) {
            // Specify the path to the image file
            $fullImagePath = public_path($imagePath);

            // Check if the file exists before attempting to delete
            if (File::exists($fullImagePath)) {
                // Delete the file
                File::delete($fullImagePath);
            }
        }
// Delete the record from the database
        SchoolHistory::where('id', $id)->delete();

        return redirect()->intended('/schoolhistory-mgmt')->with('error', 'Successfully Removed');
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
