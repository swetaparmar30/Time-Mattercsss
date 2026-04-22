<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaImage;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function index()
    {
        // $images = MediaImage::orderBy('id', 'desc')->with('creator')->get();
        return view('media.index');
    }
    public function show_all()
    {
        $images = MediaImage::orderBy('id', 'desc')->with('creator')->get();   
        return view('layouts.backend.index', compact('images'));
    }


     // New Code for Image url file name dyamanic:


    public function upload(Request $request)
    {
        $imagePaths = [];

        if ($request->file) {
            foreach ($request->file as $uploadedFile) {
                $extension = $uploadedFile->getClientOriginalExtension();
                $originalName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);

                // Generate unique file name
                $uniqueFileName = $this->getUniqueImageName($originalName, $extension);

                // Move file
                $destinationPath = public_path('uploads');
                $uploadedFile->move($destinationPath, $uniqueFileName);

                // Save in DB
                $mediaImage = new MediaImage();
                $mediaImage->name = $uniqueFileName;
                $mediaImage->image_name = pathinfo($uniqueFileName, PATHINFO_FILENAME);
                $mediaImage->path = 'uploads/';
                $mediaImage->extention = $extension;
                $mediaImage->created_by = auth()->id() ?? null;
                $mediaImage->save();

                // URL for frontend
                $imagePaths[] = asset('uploads/' . $mediaImage->name);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Images uploaded successfully',
                'image_paths' => $imagePaths
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No Image Uploaded']);
        }
    }


    // public function upload(Request $request)
    // {
    //    $imagePaths = [];
    //    if ($request->file) {
    //     foreach ($request->file as $uploadedFile) {
    //         $extension = $uploadedFile->getClientOriginalExtension();
    //         $newFileName = uniqid() . '.' . $extension;
    //         $destinationPath = public_path('uploads');
    //         $uploadedFile->move($destinationPath, $newFileName);

    //         $mediaImage = new MediaImage();
    //         $mediaImage->name = $newFileName;
    //         $mediaImage->path = $destinationPath;
    //         $mediaImage->extention = $extension;
    //         $mediaImage->save();

    //         $imagePaths[] = $destinationPath . '/' . $newFileName;
    //     }
    //     return response()->json(['status' => 'success','message' => 'Images uploaded successfully', 'image_paths' => $imagePaths]);
    //    }else{
    //     return response()->json(['status' => 'error','message' => 'No Image Uploaded']);
    //    }
    // }


    public function get_image_detail(Request $request)
    {
        $detail =  MediaImage::where('id', $request->id)->with('creator')->first();

        if($detail)
        {
            return response()->json(['status' => 'success','message' => 'details found successfully', 'details' => $detail]);
        }else{
            return response()->json(['status' => 'error','message' => 'No details found']);
        }
    }

    public function get_all_images()
    {
        $images = MediaImage::orderBy('id', 'desc')->get();
        $html = '';
        $html .= '<div class="media_images_class">';
        if(isset($images) && $images != '' && $images->isNotEmpty())
        {
        foreach($images as $val){
            $imageUrl = asset('uploads/' . $val->name);
            $html .= '<img src="'.$imageUrl.'" class="media_images" data-id = "'.$val->id.'">';
        }
        }else{
            $html .= '<h5> No images Found </h5>';
        }
        echo $html;
    }
    public function get_all_images_index()
    {
        $images = MediaImage::orderBy('id', 'desc')->get();
        $html = '';
        $html .= '<div class="media_images_class">';
        if(isset($images) && $images != '' && $images->isNotEmpty())
        {
        foreach($images as $val){
            $html .= '<div class="media_imges_parent" data-id="'.$val->id.'">';
            $imageUrl = asset('uploads/' . $val->name);
            $html .= '<img src="'.$imageUrl.'" class="media_images_index" data-id = "'.$val->id.'">';
            $html .= '<button class="select_button_img">
            <i class="fa fa-check" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true" style="display:none;"></i>
            </button>'; 
            $html .= '</div>';
        }
        }else{
            $html .= '<h5> No images Found </h5></div>';
        }
        $html .= '</div>';
        $html .= '<div class="d-flex justify-content-end show_img_button" >
        <button class="btn btn-primary get_img_id" type="button" id="get_img_id" style="display:none;">Save</button>
    </div>';
        echo $html;
    }


 public function store_image_detail(Request $request)
    {
        $details = MediaImage::find($request->image_id);

        if ($details) {
            $newBaseName = $request->image_name;
            $extension = $details->extention;

            // Generate unique file name but ignore current record ID
            $newFileName = $this->getUniqueImageName($newBaseName, $extension, $details->id);

            $oldPath = public_path('uploads/' . $details->name);
            $newPath = public_path('uploads/' . $newFileName);

            if (File::exists($oldPath) && $details->name != $newFileName) {
                File::move($oldPath, $newPath);
            }

            $details->name = $newFileName;
            $details->image_name = pathinfo($newFileName, PATHINFO_FILENAME);
            $details->alt_text = $request->alt_text ?: null;
            $details->title = isset($request->title) ? $request->title : null;
            $details->caption = isset($request->caption) ? $request->caption : null;
            $details->description = isset($request->description) ? $request->description : null;
            $details->save();


            return response()->json([
                'status' => 'success',
                'message' => 'Image details updated successfully',
                'new_image_url' => asset('uploads/' . $newFileName)
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No image found'
            ]);
        }
    }



    // public function store_image_detail(Request $request)
    // {
    //     $details = MediaImage::find($request->image_id);
    //     if($details){
    //     $details->alt_text = isset($request->alt_text) ? $request->alt_text : null;
    //     $details->title = isset($request->title) ? $request->title : null;
    //     $details->caption = isset($request->caption) ? $request->caption : null;
    //     $details->description = isset($request->description) ? $request->description : null;
    //     $details->save();
        
    //         return response()->json(['status' => 'success','message' => 'details stored successfully']);
    //     }else{
    //         return response()->json(['status' => 'error','message' => 'No details found']);
    //     }
    // }

    public function delete_image(Request $request)
    {
        $details = MediaImage::find($request->id);
        if($details){
            $img = $details->name;
            $remove_path = public_path('uploads/' . $img);
            if (File::exists(public_path('uploads/' . $img))) {
                File::delete($remove_path);
            }
            $details->delete();
            return response()->json(['status' => 'success','message' => 'image deleted successfully']);
        }else{
            return response()->json(['status' => 'error','message' => 'No image found']);
        }
    }

    public function get_img_byid(Request $request){
        
        $detail =  MediaImage::where('id', $request->img_id)->with('creator')->first();

        if($detail)
        {
            return response()->json(['status' => 'success','message' => 'details found successfully', 'details' => $detail]);
        }else{
            return response()->json(['status' => 'error','message' => 'No details found']);
        }
    }

    public function filter(Request $request)
    {
        $images = MediaImage::skip($request->start)->take(27)->orderBy('id', 'desc')->with('creator')->get();
        $html = view('includes.all_img', ['images' => $images])->render();
        return response()->json(['status' => 'success','html' => $html,'count' => count($images)]);
    }



     // code For uniquename:

        private function getUniqueImageName($baseName, $extension, $ignoreId = null)
        {
            $originalName = $baseName;
            $counter = 1;

            // Check if name exists for OTHER images (ignore current image if updating)
            while (
                MediaImage::where('image_name', $baseName)
                    ->when($ignoreId, function ($q) use ($ignoreId) {
                        $q->where('id', '!=', $ignoreId);
                    })
                    ->exists()
            ) {
                $baseName = $originalName . '-' . $counter;
                $counter++;
            }

            return $baseName . '.' . $extension;
        }
}
