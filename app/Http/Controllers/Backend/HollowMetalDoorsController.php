<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hollowmetaldoors;
use App\Models\Updatelog;

class HollowMetalDoorsController extends Controller
{
    public function index()
    {
        $hollowmetaldoors = Hollowmetaldoors::first();

         $hm_d_section2 = json_decode($hollowmetaldoors->hm_d_section2);
         $hm_d_section3 = json_decode($hollowmetaldoors->hm_d_section3);
         $hm_d_section4 = json_decode($hollowmetaldoors->hm_d_section4);
         $hm_d_section5 = json_decode($hollowmetaldoors->hm_d_section5);
         $hm_d_section6 = json_decode($hollowmetaldoors->hm_d_section6);
         $hm_d_section7 = json_decode($hollowmetaldoors->hm_d_section7);
         $hm_d_section8 = json_decode($hollowmetaldoors->hm_d_section8);
         $hm_d_section9 = json_decode($hollowmetaldoors->hm_d_section9);
        if(isset($hollowmetaldoors) && $hollowmetaldoors != '' && $hollowmetaldoors != null)
        {   

            return view('hollowmetaldoors.index', compact('hollowmetaldoors','hm_d_section2','hm_d_section3','hm_d_section4','hm_d_section5','hm_d_section6','hm_d_section7','hm_d_section8','hm_d_section9'));
        }else{
            return view('hollowmetaldoors.index');
        }
        
    }



    public function save(Request $request)
{
  

    $id = $request->hollowmetaldoors_id;

    $input = [
        'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
        'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
        'meta_description' => isset($request->meta_description) ? $request->meta_description : null,
        'bannersubtitle' => isset($request->bannersubtitle) ? $request->bannersubtitle : null,
        'bannerdescription' => isset($request->bannerdescription) ? $request->bannerdescription : null,
        'hm_d_button_name' => isset($request->hm_d_button_name) ? $request->hm_d_button_name : null,
        'hm_d_button_url' => isset($request->hm_d_button_url) ? $request->hm_d_button_url : null,
        'hollowmetal_bannerimage' => $request->hollowmetal_bannerimage,
        'updated_by' => auth()->user()->id,
    ];

   
    // Pack Section 2 as JSON string
    $hm_d_section2 = json_encode([
        'status' => 1,
        'section2_title' =>  isset($request->section2_title) ? $request->section2_title : '',
        'section2_description' =>isset($request->section2_description) ? $request->section2_description : '',
      
      
      
      
    ]);
         // Pack Section 3 as JSON string
    $hm_d_section3 = json_encode([
        'status' => 1,
        'section3_title' =>  isset($request->section3_title) ? $request->section3_title : '',
        'section3_description' =>isset($request->section3_description) ? $request->section3_description : '',
        'hm_d_section3_image' => isset($request->hm_d_section3_image) ? $request->hm_d_section3_image : '',
      
      
      
    ]);
    // Pack Section 3 as JSON string
    $hm_d_section4 = json_encode([
        'status' => 1,
        'section4_title' =>  isset($request->section4_title) ? $request->section4_title : '',
        'section4_description' =>isset($request->section4_description) ? $request->section4_description : '',
      
      
      
    ]);
    $hm_d_section5 = json_encode([
        'status' => 1,
        'section5_title' =>  isset($request->section5_title) ? $request->section5_title : '',
        'section5_description' =>isset($request->section5_description) ? $request->section5_description : '',
        'hm_d_section5_image' => isset($request->hm_d_section5_image) ? $request->hm_d_section5_image : '',
      
      
      
    ]);

      $hm_d_section6 = json_encode([
        'status' => 1,
        'section6_title' =>  isset($request->section6_title) ? $request->section6_title : '',
        'section6_description' =>isset($request->section6_description) ? $request->section6_description : '',
        'hm_d_section6_image' => isset($request->hm_d_section6_image) ? $request->hm_d_section6_image : '',
       
      
      
    ]);

    $hm_d_section7 = json_encode([
        'status' => 1,
        'section7_description' =>isset($request->section7_description) ? $request->section7_description : '',
      
      
      
    ]);
    $hm_d_section8 = json_encode([
        'status' => 1,
        'section8_description' =>isset($request->section8_description) ? $request->section8_description : '',
      
      
      
    ]);
    $hm_d_section9 = json_encode([
        'status' => 1,
        'section9_description' =>isset($request->section9_description) ? $request->section9_description : '',
      
      
      
    ]);
   



 
    $input['hm_d_section2'] = isset($hm_d_section2) ? $hm_d_section2 : '';
    $input['hm_d_section3'] = isset($hm_d_section3) ? $hm_d_section3 : '';
    $input['hm_d_section4'] = isset($hm_d_section4) ? $hm_d_section4 : '';
    $input['hm_d_section5'] = isset($hm_d_section5) ? $hm_d_section5 : '';
    $input['hm_d_section6'] = isset($hm_d_section6) ? $hm_d_section6 : '';
    $input['hm_d_section7'] = isset($hm_d_section7) ? $hm_d_section7 : '';
    $input['hm_d_section8'] = isset($hm_d_section8) ? $hm_d_section8 : '';
    $input['hm_d_section9'] = isset($hm_d_section9) ? $hm_d_section9 : '';
   if (isset($id) && $id != '') {
        $hollowmetaldoors = Hollowmetaldoors::findOrFail($id);
         $edata = json_encode($hollowmetaldoors);

        if ($hollowmetaldoors) {
                $hollowmetaldoors->fill($input);
                $hollowmetaldoors->update();

        Updatelog::create([
            'tablename' => 'hollowmetaldoors',
            'table_primary_id' => $hollowmetaldoors->id,
            'edit_log' => $edata,
        ]);

        return redirect()->route('hollowmetal.index')->with('success', 'Custom Door Page Updated Successfully.');
    }    else {
                return redirect()->route('hollowmetal.index')->with('error', 'Custom Door Page Updated Failed!');
            }
        } else {
            $hollowmetaldoors = new hollowmetaldoors();
            $hollowmetaldoors->fill($input);
            $hollowmetaldoors->save();

            return redirect()->route('hollowmetal.index')->with('success', 'Custom Door Page  Created Successfully.');
        }
    } 
    
   
}
