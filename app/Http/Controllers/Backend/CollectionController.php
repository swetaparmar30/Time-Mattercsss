<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\Collection;
use App\Models\MediaImage;
use App\Models\Updatelog;
use App\Models\CollectionsImage;
use App\Models\DoorSelection;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CollectionController extends Controller
{
    public function index()
    {
        return view('collection.index');
    }
    public function add() {
        return view('collection.add');
    }

 
public function store(Request $request)
{
    $response['status'] = 0;
    $response['message'] = 'Gallery not submit';
    $id = $request->collection_id;

    if ($id != '') {

        $check = Collection::where('slug', $request->product_Slug)->first();
            if (isset($check->id) && $id != $check->id) {
                $slug = SlugService::createSlug(Collection::class, 'slug', $request->product_Slug);
            }else{
                $slug_update = $request->product_Slug;
                $slug = Str::slug($slug_update, '-');
            }

        $collection = Collection::findOrFail($id);
        $edata = json_encode($collection);
    } else {
        $slug = SlugService::createSlug(ProductService::class, 'slug', $request->product_Slug);
        $collection = new Collection();
    }

    $collection->type = isset($request->type) ? $request->type : '';
    $collection->title = isset($request->title) ? $request->title : '';
    $collection->sub_title = isset($request->sub_title) ? $request->sub_title : '';
    $collection->short_description = isset($request->short_description) ? $request->short_description : '';
    $collection->button_name = isset($request->button_name) ? $request->button_name : '';
    $collection->button_url = isset($request->button_url) ? $request->button_url : '';
    $collection->slug = $slug;

    if ($id != '') {
        $collection->update();
        $edt = Updatelog::create(['tablename'=>'collections','table_primary_id'=>$collection->id,'edit_log'=>$edata]);
        $response['status'] = 1;
        $response['message'] = "Collection successfully updated";
    } else {
        $collection->save();
        $response['status'] = 1;
        $response['message'] = "Collection successfully submitted";
    }

    if ($request->hasFile('multi_image')) {
        if (isset($collection) && $collection->id != "") {
            $images = $request->file('multi_image');
            foreach ($images as $key => $value) {
                $extension = $value->getClientOriginalExtension();
                $filename = date('YmdHi') . "_" . $request->title . "_" . rand(10, 10000) . "." . $extension;
                $value->move(public_path('/uploads/collection/'), $filename);

                $gallery_image = new CollectionsImage();
                $gallery_image->collection_id = $collection->id;
                $gallery_image->image = $filename;
                $gallery_image->save();
            }
        }
    }
     if ($request->filled('removed_door_ids')) {
           $removedIds = explode(',', $request->removed_door_ids);
        DoorSelection::whereIn('id', $removedIds)->delete();
    }
    // Handle door selections
    if (isset($request->door_id)) {
        foreach ($request->door_id as $index => $doorId) {
            if ($doorId) {
                $doorSelection = DoorSelection::find($doorId);
                if ($doorSelection) {
                    $doorSelection->door_title = $request->door_title[$index];
                    $doorSelection->door_description = $request->door_description[$index];
                    $doorSelection->save();
                }
            } else {
                $doorSelection = new DoorSelection();
                $doorSelection->door_title = $request->door_title[$index];
                $doorSelection->collection_id = $collection->id;
                $doorSelection->door_description = $request->door_description[$index];
                $doorSelection->save();
            }
        }
    }

    return response()->json($response);
}


    public function list(Request $request) {
        $collectionList = Collection::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        $collectionList->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
           
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('collection.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a data-href="' . route('collection.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $item;

        });
        return response()->json(['data' => $collectionList]);
    }

    public function edit($id) {

        $collection = Collection::findOrFail($id);
        $multiImage = CollectionsImage::where('collection_id', $id)->where('deleted_at', null)->get();
        $doorSelection = DoorSelection::select('*')->where('collection_id', $id)->where('deleted_at', null)->get();

        return view('collection.add', compact('collection','multiImage','doorSelection'));
    }
     
    public function image_remove(Request $request) {
        $img_id = $request->img_id;
        $collection_id = $request->collection_id;

        if ($img_id != "") {
          
            $record = CollectionsImage::find($img_id);
            $record->delete();

            $gallery_list = CollectionsImage::select('*')->where('collection_id', $collection_id)->where('deleted_at', null)->get();
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
    public function delete($id) {
        if ($id != "") {
            $record = Collection::find($id);

            $images  = CollectionsImage::where('collection_id' ,$id)->get();

            foreach ($images as $image) {
                    $filename = $image->image;
                    $file_path = public_path('uploads/collection/' . $filename);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }

            $img = CollectionsImage::where('collection_id',$id)->delete();
            $door = DoorSelection::where('collection_id',$id)->delete();
            $record->delete();
            return redirect()->route('collection.index')
                ->withSuccess('Collection Delete Successfully.');
        }
    }
    public function check_slug(Request $request){
        $check = Collection::where('title', $request->name)->first();
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

}
