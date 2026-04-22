<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\ProjectGallery;
use App\Models\Updatelog;
use App\Models\GalleryImage;
use App\Models\MediaImage;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;





class GalleryController extends Controller
{
    public function index()
    {
        return view('gallery.index');
    }
    public function add()
    {
        $galleryCategories = GalleryCategory::select('*')->where('parent_category', 0)->where('deleted_at', null)->get();
        return view('gallery.add', compact('galleryCategories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $id = $request->gallery_id;
       
        if ($id != "") {
            
            $gallery = ProjectGallery::findOrfail($id);
            $gallery->featured_img = isset($request->img_id) ? $request->img_id : null;
            $gallery->banner_image = isset($request->banner_image) ? $request->banner_image : null;
            $gallery->is_publish = isset($request->is_publish) && $request->is_publish == 'on' ? '1' : '0';
            $gallery->update();
           
            return redirect()->route('gallery.index')->with('success','Gallery successfully Update');
        }else{
            
            $gallery = new ProjectGallery();
            $gallery->featured_img = isset($request->img_id) ? $request->img_id : null;
            $gallery->banner_image = isset($request->banner_image) ? $request->banner_image : null;
            $gallery->is_publish = isset($request->is_publish) && $request->is_publish == 'on' ? '1' : '0';
            $gallery->save();
            return redirect()->route('gallery.index')->with('success','Gallery successfully submit');
        }

    }
    public function list(Request $request)
    {
        $gallery_list = ProjectGallery::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        $gallery_list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            if (isset($item['featured_img']) && $item['featured_img'] != '') {
                $image_name = MediaImage::where('id' ,$item['featured_img'])->first();
                $item['image'] = '<img src="' . asset('uploads/' . $image_name->name) . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            } else {
                $item['image'] = '<img src="' . asset('assets/img/new-profile.svg') . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            }
            if ($item['is_publish'] == '1') {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '"  id="is_publish" name="is_publish" checked>';
                $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_publish" name="is_publish"  checked class="is_featured_class">';
            } else {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_publish" name="is_publish">';
                $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_publish"  class="is_featured_class">';
            }
            if ($item['is_featured'] == '1') {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '"  id="is_publish" name="is_publish" checked>';
                $item['featured'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_featured" name="is_featured"  checked class="is_featured_class">';
            } else {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_publish" name="is_publish">';
                $item['featured'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_featured"  class="is_featured_class">';
            }
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('gallery.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            if (auth()->user()->role !== 'dealer' || auth()->user()->role !== 'marketing') {
                $item['action'] .= '<a data-href="' . route('gallery.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 gallery_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }
            return $item;
        });

        return response()->json(['data' => $gallery_list]);
    }

    public function edit($id)
    {
        $gallery = ProjectGallery::findOrFail($id);
        $multiImage = GalleryImage::where('project_galleries_id', $id)->where('deleted_at', null)->get();
        $image_name = MediaImage::where('id' ,$gallery->featured_img)->first();
        $banner_image_name = MediaImage::where('id' ,$gallery->banner_image)->first();

        $galleryCategories = GalleryCategory::select('*')->where('parent_category', 0)->where('deleted_at', null)->get();
        return view('gallery.add', compact('gallery', 'multiImage', 'image_name', 'galleryCategories', 'banner_image_name'));
    }

    // public function check_slug(Request $request){
    //     $check = ProjectGallery::where('title', $request->title)->first();
    //     if($check && $check != '' && $check != null)
    //     {
    //         $response['status'] = 1;
    //         $response['message'] = "available";
    //     }else{
    //         $response['status'] = 2;
    //         $response['message'] = "unavailable";
    //     }
    //     return response()->json($response);
    // }

    
    public function image_remove(Request $request) {
        $img_id = $request->img_id;
        $gallery_id = $request->gallery_id;

        if ($img_id != "") {
          
            $record = GalleryImage::find($img_id);
            $record->delete();

            $gallery_list = GalleryImage::select('*')->where('project_galleries_id', $gallery_id)->where('deleted_at', null)->get();
            if(isset($gallery_list) && $gallery_list != ""){
                $response['status'] = 1;
                $response['gallery_list'] = $img_id;
            }else{
                $response['status'] = 0;
                $response['gallery_list'] = "";
            }
          
            return response()->json($response);
        }
       
        
    }
    public function publish_status(Request $request) {
        $id = $request->id;
        $response['status'] = 0;
        $response['message'] = "Check Status canceled";
      

        if (isset($request->isChecked) && $request->isChecked != 'true') {
            $data['is_publish'] = 0;
            $save = ProjectGallery::where('id', $id)->update($data);
            $response['status'] = 1;
            $response['message'] = "Publish Status Update Successfully";

        } else {
            $data['is_publish'] = 1;
            $save = ProjectGallery::where('id', $id)->update($data);
            $response['status'] = 2;
            $response['message'] = "Publish Status Update Successfully";

        }
        return response()->json($response);
    }
    public function featured_status(Request $request) {
        $id = $request->id;
        $response['status'] = 0;
        $response['message'] = "Check Status canceled";
      

        if (isset($request->isChecked) && $request->isChecked != 'true') {
            $data['is_featured'] = 0;
            $save = ProjectGallery::where('id', $id)->update($data);
            $response['status'] = 1;
            $response['message'] = "Featured Status Update Successfully";

        } else {
            $data['is_featured'] = 1;
            $save = ProjectGallery::where('id', $id)->update($data);
            $response['status'] = 2;
            $response['message'] = "Featured Status Update Successfully";

        }
        return response()->json($response);
    }

    public function delete($id) {

        if ($id != "") {
            $record = ProjectGallery::find($id);
            $image_name = MediaImage::where('id' ,$record->featured_img)->first();
            $filename = $image_name->name;
            $file_path = public_path('uploads/' . $filename);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $image_delete = GalleryImage::where('project_galleries_id', $id)->delete();
            $image_name->delete();
            $record->delete();
            return redirect()->route('gallery.index')
                ->withSuccess('Gallery Delete Successfully.'); 

        }
    }

    public function gallery_category_slug(Request $request) {
        $check = GalleryCategory::where('category', $request->category)->first();
        if($check && $check != '' && $check != null)
        {
            $response['status'] = 1;
            $response['message'] = "available";
        }else{
            $response['status'] = 2;
            $response['message'] = "unavailable";
        }
        return response()->json($response);
    }

    public function gallery_create_category(Request $request) {
        $categories = GalleryCategory::where('category', $request->gallery_category)->first();
        if(isset($categories) && $categories != null && $categories != '')
        {
            return response()->json(['status' => '1', 'message' => 'Category is already exists!']);
        }
        // $slug = Str::slug($request->gallery_category);
        $slug = SlugService::createSlug(GalleryCategory::class, 'slug', $request->gallery_slug);
        $new_cat = new GalleryCategory();
        $new_cat->category = $request->gallery_category;
        $new_cat->slug = $slug;
        $new_cat->parent_category = isset($request->parent_category) ? $request->parent_category : '' ;
        $new_cat->sub_category = isset($request->parent_category) ? $request->parent_category : '' ;


        $new_cat->save();
        if($new_cat)
        {
            return response()->json(['status' => '0', 'message' => 'Category added successfully', 'newCategory' => $new_cat]);
        }
    }


}