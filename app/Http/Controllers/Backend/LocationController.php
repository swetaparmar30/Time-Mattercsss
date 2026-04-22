<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\MediaImage;
use App\Models\Updatelog;
use App\Models\Location;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;


class LocationController extends Controller
{
    public function index()
    {
        return view('location.index');
    }
    public function add() {
        return view('location.add');
    }

    public function store(Request $request) {
        
        $id = $request->location_id;
       

        if ($id != "") {
           
            $location = Location::findOrfail($id);
            $edata = json_encode($location);
            $location->country_name =  isset($request->country_name) ?  $request->country_name : '';
            $location->country_full_name =  isset($request->country_full_name) ?  $request->country_full_name : '';
            $location->title =  isset($request->title) ?  $request->title : '';
            $location->sub_title =  isset($request->sub_title) ?  $request->sub_title : '';
            $location->address =  isset($request->address) ?  $request->address : '';
            $location->phone =  isset($request->phone) ?  $request->phone : '';
            $location->fax =  isset($request->fax) ?  $request->fax : '';
            $location->image =  isset($request->img_id) ?  $request->img_id : '';
            $location->map =  isset($request->map) ?  $request->map : '';

            $location->update();
            
            $edt = Updatelog::create(['tablename'=>'locations','table_primary_id'=>$location->id,'edit_log'=>$edata]);
            return redirect()->route('location.index')->with('success','Location update Successfully.');
        }else{

            $location = new Location();

            $location->country_name =  isset($request->country_name) ?  $request->country_name : '';
            $location->country_full_name =  isset($request->country_full_name) ?  $request->country_full_name : '';
            $location->title =  isset($request->title) ?  $request->title : '';
            $location->sub_title =  isset($request->sub_title) ?  $request->sub_title : '';
            $location->address =  isset($request->address) ?  $request->address : '';
            $location->phone =  isset($request->phone) ?  $request->phone : '';
            $location->fax =  isset($request->fax) ?  $request->fax : '';
            $location->image =  isset($request->img_id) ?  $request->img_id : '';
            $location->map =  isset($request->map) ?  $request->map : '';

            $location->save();
            return redirect()->route('location.index')->with('success','Location Added Successfully.');
        }
      
    }

    public function list(Request $request) {
        $location_list = Location::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        $location_list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
          
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('location.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a data-href="' . route('location.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $item;

        });
        return response()->json(['data' => $location_list]);
    }

    public function edit($id) {
        $location = Location::findOrFail($id);
        $image_name = MediaImage::where('id' ,$location->image)->first();
        return view('location.add', compact('location','image_name'));
    }

    public function delete($id) {
        if ($id != "") {
            $record = Location::find($id);
            $record->delete();
            return redirect()->route('location.index')
                ->withSuccess('Location Delete Successfully.');
        }
    }

    public function check_slug(Request $request){
        $check = ProductService::where('sub_title', $request->name)->first();
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
