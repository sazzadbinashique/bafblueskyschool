<?php


namespace App\Http\Controllers;


use App\ChairmanMessage;
use App\GalleryCategory;
use App\HomeBannerImage;
use App\Nonteachingstaff;
use App\PrincipleMessage;
use App\WeOffer;
use Illuminate\Http\Request;
use App\ImageGallery;
use App\Principal;
use App\chairman;
use App\ManagingCommittee;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class ImageGalleryController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = \Illuminate\Support\Facades\DB::table('image_gallery')
            ->leftJoin('gallery_categories', 'image_gallery.gallery_cat_id', '=', 'gallery_categories.id')
            ->select( 'image_gallery.*',
                'gallery_categories.name as category' )->get();

        $galleryCats = GalleryCategory::orderBy('id', 'ASC')->get();
        return view('imggallery-mgmt/index', ['datas' => $datas, 'galleryCats' => $galleryCats]);
    }

    public function gallery($id)
    {
        $titles = GalleryCategory::where('id', $id)->groupBy('id')->pluck('name')->first() ;
        $images = ImageGallery::where('gallery_cat_id', $id)->get();
        $galleryCats = GalleryCategory::orderBy('id', 'ASC')->get();
        return view('frontend/gallery', compact('images','titles','galleryCats'));
    }

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
        $input['gallery_cat_id'] = $request->gallery_cat_id;

        ImageGallery::create($input);

        return redirect()->intended('/imggallery-mgmt')->with('message', 'Data created Successfull');

    }

    public function show($id)
    {
        $datas = ImageGallery::where('image_gallery.id', $id)
            ->leftJoin('gallery_categories', 'image_gallery.gallery_cat_id', '=', 'gallery_categories.id')
            ->select(
                'image_gallery.*',
                'gallery_categories.name as category'

            )->first();

        return view('imggallery-mgmt/view', ['data' => $datas]);
    }

    public function edit($id)
    {
        $galleryCats = GalleryCategory::orderBy('id', 'ASC')->get();
        $Datas = ImageGallery::where('id', $id)->first();
        return view('imggallery-mgmt/edit', ['data' => $Datas,'galleryCats' => $galleryCats]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
    
        $datas = ImageGallery::findOrFail($id);
    
        if ($request->has('image')) {
            if (File::exists(public_path('uploads/image/' . $datas->image))) {
                File::delete(public_path('uploads/image/' . $datas->image));
            }
    
            $input['image'] = time() . '.' . $request->notice_img->getClientOriginalExtension();
            $request->notice_img->move(public_path('uploads/image'), $input['image']);
        }
    
        $input['title'] = $request->title;
        $input['description1'] = $request->description1;
        $input['description2'] = $request->description2;
        $input['description3'] = $request->description3;
    
        $datas->update($input);




        $this->validateInput($request);

        $datas = ImageGallery::findOrFail($id);

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
            $file->move('image/gallery/', $filename);
        } else {
            $filename = $datas['image'];

        }
        $keys = [
            'title',
            'image',
            'gallery_cat_id'
        ];
        $input = $this->createQueryInput($keys, $request);
        $input['image'] = $filename;
//        dd($input);
        ImageGallery::where('id', $id)->update($input);


        return redirect()->intended('/imggallery-mgmt')->with('success', 'Successfully updateded');

    }


    public function remove($id)
    {
        $datas = ImageGallery::findOrFail($id);
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
        ImageGallery::where('id', $id)->delete();
        return redirect()->intended('/imggallery-mgmt');
    }

    public function storeCategory(Request $request)
    {
        $keys = ['name', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        GalleryCategory::create($input);

        return redirect()->intended('/imggallery-mgmt');
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
