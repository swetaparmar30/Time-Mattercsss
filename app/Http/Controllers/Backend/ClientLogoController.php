<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaImage;
use App\Models\Updatelog;
use App\Models\ClientLogo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ClientLogoController extends Controller
{
    public function index()
    {
        return view('client-logo.index');
    }
    public function add() {
        return view('client-logo.add');
    }

    public function store(Request $request) {
        
        $id = $request->client_logo_id;
       
        if ($id != "") {
            
            $client_logo = ClientLogo::findOrfail($id);
            $client_logo->image = isset($request->img_id) ? $request->img_id : '';
            $client_logo->url = isset($request->url) ? $request->url : '';
            $client_logo->update();
           
            return redirect()->route('client-logo.index')->with('success','Client Logo update Successfully.');
        }else{
            
            $client_logo = new ClientLogo();
            $client_logo->image = isset($request->img_id) ? $request->img_id : '';
            $client_logo->url = isset($request->url) ? $request->url : '';
            $client_logo->status = 1;
            $client_logo->save();
            return redirect()->route('client-logo.index')->with('success','Client Logo Added Successfully.');
        }
      
    }

    public function list(Request $request) {
        $clientLogoList = ClientLogo::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        
        $clientLogoList->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
             if (isset($item['image']) && $item['image'] != '') {
                $image_name = MediaImage::where('id' ,$item['image'])->first();
            
                $item['image'] = '<img src="' . asset('uploads/' . $image_name->name) . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            } else {
                $item['image'] = '<img src="' . asset('assets/img/img-demo_1041.jpg') . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            }
            if ($item['status'] == '1') {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '"  id="is_publish" name="is_publish" checked>';
                $item['status'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_featured" name="status"  checked class="is_featured_class">';
            } else {
                // $item['publish'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_publish" name="is_publish">';
                $item['status'] = '<input type="checkbox" data-id="' . $item['id'] . '" data-toggle="toggle" id="is_featured"  class="is_featured_class">';
            }
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('client-logo.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            if (auth()->user()->role !== 'dealer') {
                $item['action'] .= '<a data-href="' . route('client-logo.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }
            return $item;

        });
        return response()->json(['data' => $clientLogoList]);
    }

    public function edit($id) {

        $client = ClientLogo::findOrFail($id);
        $image_name = MediaImage::where('id' ,$client->image)->first();
        return view('client-logo.add', compact('client','image_name'));
    }
   public function delete($id) {
        if ($id != "") {
            $record = ClientLogo::find($id);
            $record->delete();
            return redirect()->route('client-logo.index')
                ->withSuccess('Client Logo Delete Successfully.');
        }
    }
    public function status(Request $request) {
        $id = $request->id;
        $response['status'] = 0;
        $response['message'] = "Check Status canceled";
      

        if (isset($request->isChecked) && $request->isChecked != 'true') {
            $data['status'] = 0;
            $save = ClientLogo::where('id', $id)->update($data);
            $response['status'] = 1;
            $response['message'] = "Status Update Successfully";

        } else {
            $data['status'] = 1;
            $save = ClientLogo::where('id', $id)->update($data);
            $response['status'] = 2;
            $response['message'] = "Status Update Successfully";

        }
        return response()->json($response);
    }

}
