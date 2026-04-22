<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loadingdockdoor;
use App\Models\Updatelog;

class LoadingDockdoorController extends Controller
{
    public function index()
    {
        $loadingdockdoor = Loadingdockdoor::first();
        $section2 = json_decode($loadingdockdoor->section2);
        $section3 = json_decode($loadingdockdoor->section3);
        $section4 = json_decode($loadingdockdoor->section4);
        $section5 = json_decode($loadingdockdoor->section5);
        $section6 = json_decode($loadingdockdoor->section6);
        $section7 = json_decode($loadingdockdoor->section7);
        if(isset($loadingdockdoor) && $loadingdockdoor != '' && $loadingdockdoor != null)
        {   

            return view('loadingdock.index', compact('loadingdockdoor','section2','section3','section4','section5','section6','section7'));
        }else{
            return view('loadingdock.index');
        }
        
    }



    public function save(Request $request)
{
  

    $id = $request->loadingdockdoor_id;

    $input = [


        'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
        'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
        'meta_description' => isset($request->meta_description) ? $request->meta_description : null,
          'title' => isset($request->title) ? $request->title : null,
         'subtitle' => isset($request->subtitle) ? $request->subtitle : null,
        'description' => isset($request->description) ? $request->description : null,
        'c_s_button_name' => isset($request->c_s_button_name) ? $request->c_s_button_name : null,
        'c_s_button_url' => isset($request->c_s_button_url) ? $request->c_s_button_url : null,
        'bannerimage' => $request->bannerimage,
        'updated_by' => auth()->user()->id,
    ];

   
    // Pack Section 2 as JSON string
    $section2 = json_encode([
        'status' => 1,
        'section2_title' =>  isset($request->section2_title) ? $request->section2_title : '',
        'section2_description' =>isset($request->section2_description) ? $request->section2_description : '',
        'section2_image' => isset($request->section2_image) ? $request->section2_image : '',
        'sec2_title_1' => isset($request->sec2_title_1) ? $request->sec2_title_1 : '',
        'sec2_description_1' => isset($request->sec2_description_1) ? $request->sec2_description_1 : '',
        'sec2_image_1' => isset($request->sec2_image_1) ? $request->sec2_image_1 : '',
        'sec2_title_2' => isset($request->sec2_title_2) ? $request->sec2_title_2 : '',
        'sec2_description_2' => isset($request->sec2_description_2) ? $request->sec2_description_2 : '',
        'sec2_image_2' => isset($request->sec2_image_2) ? $request->sec2_image_2 : '',
        'sec2_title_3' => isset($request->sec2_title_3) ? $request->sec2_title_3 : '',
        'sec2_description_3' => isset($request->sec2_description_3) ? $request->sec2_description_3 : '',
        'sec2_image_3' => isset($request->sec2_image_3) ? $request->sec2_image_3 : '',
        'sec2_title_4' => isset($request->sec2_title_4) ? $request->sec2_title_4 : '',
        'sec2_image_4' => isset($request->sec2_image_4) ? $request->sec2_image_4 : '',
        'sec2_description_4' => isset($request->sec2_description_4) ? $request->sec2_description_4 : '',
            
      
      
    ]);

         // Pack Section 3 as JSON string
    $section3 = json_encode([
        'status' => 1,
        'section3_title' =>  isset($request->section3_title) ? $request->section3_title : '',
        'section3_description' =>isset($request->section3_description) ? $request->section3_description : '',
        'section3_image' => isset($request->section3_image) ? $request->section3_image : '',
        'sec3_title_1' => isset($request->sec3_title_1) ? $request->sec3_title_1 : '',
        'sec3_description_1' => isset($request->sec3_description_1) ? $request->sec3_description_1 : '',
        'sec3_image_1' => isset($request->sec3_image_1) ? $request->sec3_image_1 : '',
        'sec3_title_2' => isset($request->sec3_title_2) ? $request->sec3_title_2 : '',
        'sec3_description_2' => isset($request->sec3_description_2) ? $request->sec3_description_2 : '',
        'sec3_image_2' => isset($request->sec3_image_2) ? $request->sec3_image_2 : '',
        'sec3_title_3' => isset($request->sec3_title_3) ? $request->sec3_title_3 : '',
        'sec3_description_3' => isset($request->sec3_description_3) ? $request->sec3_description_3 : '',
        'sec3_image_3' => isset($request->sec3_image_3) ? $request->sec3_image_3 : '',
        'sec3_title_4' => isset($request->sec3_title_4) ? $request->sec3_title_4 : '',
        'sec3_image_4' => isset($request->sec3_image_4) ? $request->sec3_image_4 : '',
        'sec3_description_4' => isset($request->sec3_description_4) ? $request->sec3_description_4 : '',
      
      
      
    ]);
    // Pack Section 3 as JSON string
    $section4 = json_encode([
        'status' => 1,
        'section4_title' =>  isset($request->section4_title) ? $request->section4_title : '',
         'section4_sub_title' =>  isset($request->section4_sub_title) ? $request->section4_sub_title : '',
        'section4_description' =>isset($request->section4_description) ? $request->section4_description : '',
        'section4_image' => isset($request->section4_image) ? $request->section4_image : '',
      
      
      
    ]);
    $section5 = json_encode([
        'status' => 1,
        'section5_title' =>  isset($request->section5_title) ? $request->section5_title : '',
       
        'section5_description' =>isset($request->section5_description) ? $request->section5_description : '',
        'section5_image' => isset($request->section5_image) ? $request->section5_image : '',
      
      
      
    ]);

      $section6 = json_encode([
        'status' => 1,
        'section6_title1' =>  isset($request->section6_title1) ? $request->section6_title1 : '',
        'section6_description1' =>isset($request->section6_description1) ? $request->section6_description1 : '',
        'section6_image1' => isset($request->section6_image1) ? $request->section6_image1 : '',
        'section6_title2' =>  isset($request->section6_title2) ? $request->section6_title2 : '',
        'section6_description2' =>isset($request->section6_description2) ? $request->section6_description2 : '',
        'section6_image2' => isset($request->section6_image2) ? $request->section6_image2 : '',
      
      
    ]);

    $section7 = json_encode([
        'status' => 1,
        'section7_description' =>isset($request->section7_description) ? $request->section7_description : '',
        'section7_image' => isset($request->section7_image) ? $request->section7_image : '',
      
      
      
    ]);



 
    $input['section2'] = isset($section2) ? $section2 : '';
    $input['section3'] = isset($section3) ? $section3 : '';
    $input['section4'] = isset($section4) ? $section4 : '';
    $input['section5'] = isset($section5) ? $section5 : '';
    $input['section6'] = isset($section6) ? $section6 : '';
    $input['section7'] = isset($section7) ? $section7 : '';
   if (isset($id) && $id != '') {
        $loadingdockdoor = Loadingdockdoor::findOrFail($id);
         $edata = json_encode($loadingdockdoor);

        if ($loadingdockdoor) {
                $loadingdockdoor->fill($input);
                $loadingdockdoor->update();

        Updatelog::create([
            'tablename' => 'loadingdockdoors',
            'table_primary_id' => $loadingdockdoor->id,
            'edit_log' => $edata,
        ]);

        return redirect()->route('loadingdock.index')->with('success', 'Custom Door Page Updated Successfully.');
    }    else {
                return redirect()->route('loadingdock.index')->with('error', 'Custom Door Page Updated Failed!');
            }
        } else {
            $loadingdockdoor = new loadingdockdoor();
            $loadingdockdoor->fill($input);
            $loadingdockdoor->save();

            return redirect()->route('loadingdock.index')->with('success', 'Custom Door Page  Created Successfully.');
        }
    } 
    
   
}

  