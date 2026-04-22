<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceAreas;
use App\Models\Updatelog;

class ServiceAreaController extends Controller
{
    public function index()
    {
        $serviceareas = ServiceAreas::first();

        
        if(isset($serviceareas) && $serviceareas != '' && $serviceareas != null)
        {   

            return view('servicearea.index', compact('serviceareas',));
        }else{
            return view('servicearea.index');
        }
        
    }



    public function save(Request $request)
{
  

    $id = $request->serviceareas_id;

    $input = [
        'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
        'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
        'meta_description' => isset($request->meta_description) ? $request->meta_description : null,
        'title' => isset($request->title) ? $request->title : null,
        'description' => isset($request->description) ? $request->description : null,
        
        'updated_by' => auth()->user()->id,
    ];

   
   
   if (isset($id) && $id != '') {
        $serviceareas = ServiceAreas::findOrFail($id);
         $edata = json_encode($serviceareas);

        if ($serviceareas) {
                $serviceareas->fill($input);
                $serviceareas->update();

        Updatelog::create([
            'tablename' => 'serviceareas',
            'table_primary_id' => $serviceareas->id,
            'edit_log' => $edata,
        ]);

        return redirect()->route('servicearea.index')->with('success', 'Custom Door Page Updated Successfully.');
    }    else {
                return redirect()->route('servicearea.index')->with('error', 'Custom Door Page Updated Failed!');
            }
        } else {
            $serviceareas = new serviceareas();
            $serviceareas->fill($input);
            $serviceareas->save();

            return redirect()->route('servicearea.index')->with('success', 'Custom Door Page  Created Successfully.');
        }
    } 
    
   
}
