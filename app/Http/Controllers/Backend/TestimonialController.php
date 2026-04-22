<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use App\Models\Updatelog;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('testimonials.index');
    }
    public function add()
    {
        return view('testimonials.add');
    }
    public function list(Request $request)
    {
        $testi_list = Testimonial::select('testimonials.*','media_images.name AS Imagename')
        ->leftJoin('media_images', function ($join) {
            $join->on('testimonials.img', '=', 'media_images.id')
                 ->whereNotNull('testimonials.img');
        })
        ->get();
        $counter = 1;
        $testi_list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            if (isset($item['Imagename']) && $item['Imagename'] != '') {
                $item['image'] = '<img src="' . asset('uploads/' . $item['Imagename']) . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            } else {
                $item['image'] = '<img src="' . asset('assets/img/new-profile.svg') . '" class="img-fluid white_logo rounded-circle" alt="" style="width:50px;height:50px;">';
            }
            if ($item['is_featured'] == '1') {
                $item['featured'] = '<input type="checkbox" data-id="' . $item['id'] . '"  id="is_featured" name="is_featured" checked class="is_featured_class">';
            } else {
                $item['featured'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_featured" name="is_featured" class="is_featured_class">';
            }   
            $item['action'] = '<a class="label theme-bg2 text-white f-12" data-id="' . $item['id'] . '" href="' . route('testimonials.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            $item['action'] .= '<a data-href="' . route('testimonials.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 testi_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            return $item;
        });

        return response()->json(['data' => $testi_list]);
    }
    public function store(Request $request)
    {
        $slug = SlugService::createSlug(Testimonial::class, 'slug', $request->testi_Slug);
        $testi = new Testimonial();
        $testi->name = isset($request->testi_name) ? $request->testi_name : '';
        $testi->slug = $slug;
        $testi->sub_content = isset($request->sub_content) ? $request->sub_content : '';
        $testi->email = isset($request->testi_email) ? $request->testi_email : '';
        $testi->content = isset($request->testi_content) ? $request->testi_content : '';
        $testi->phone = isset($request->testi_phone) ? $request->testi_phone : '';
        $testi->is_featured =  isset($request->is_featured) &&  $request->is_featured == 'on' ? '1' : '';
        $testi->img = isset($request->testi_image) ? $request->testi_image : null;
        $testi->rating = isset($request->rating) ? $request->rating : null;
        $testi->review = isset($request->review) &&  $request->review == 'on' ? '1' : '0';


        $testi->save();
        return redirect()->route('testimonials.index')->with('success','Testimonial Added Successfully.');
    }
    public function edit($id)
    {
        $testi = Testimonial::findOrFail($id);
        return view('testimonials.add',compact('testi'));
    }
    public function update(Request $request, $id)
    {
        // $slug = SlugService::createSlug(Testimonial::class, 'slug', $request->testi_Slug);
        $check = Testimonial::where('slug', $request->testi_Slug)->first();
        if (isset($check) && $id != $check->id) {
            $slug = SlugService::createSlug(Testimonial::class, 'slug', $request->testi_Slug);
        }else{
            $slug_update = $request->testi_Slug;
            $slug = Str::slug($slug_update, '-');
        }
        $testi = Testimonial::findOrFail($id);
        $edata = json_encode($testi);
        $testi->name = isset($request->testi_name) ? $request->testi_name : '';
        $testi->slug = $slug;
        $testi->sub_content = isset($request->sub_content) ? $request->sub_content : '';
        $testi->email = isset($request->testi_email) ? $request->testi_email : '';
        $testi->content = isset($request->testi_content) ? $request->testi_content : '';
        $testi->phone = isset($request->testi_phone) ? $request->testi_phone : '';
        $testi->is_featured =  isset($request->is_featured) &&  $request->is_featured == 'on' ? '1' : '';
        $testi->img = isset($request->testi_image) ? $request->testi_image : null;
        $testi->rating = isset($request->rating) ? $request->rating : null;
        $testi->review = isset($request->review) &&  $request->review == 'on' ? '1' : '0';
        $edt = Updatelog::create(['tablename'=>'testimonials','table_primary_id'=>$testi->id,'edit_log'=>$edata]); 
        $testi->update();
        return redirect()->route('testimonials.index')->with('success','Testimonial Updated Successfully.');
    }
    public function delete($id)
    {
        if ($id != "") {
            $record = Testimonial::find($id);
            if (isset($record->img) && $record->img != "") {
                $remove_path = public_path('uploads/testimonials/' . $record->img);
                if (File::exists(public_path('uploads/testimonials/' . $record->img))) {
                    File::delete($remove_path);
                }
            }
            $record->delete();
            return redirect()->route('testimonials.index')
                ->withSuccess('Testimonial Delete Successfully.');

        }
    }
    public function check_featured(Request $request)
    {
        $id = $request->id;
        $response['status'] = 0;
        $response['message'] = "Check Featured canceled";
      

        if (isset($request->isChecked) && $request->isChecked != 'true') {
            $data['is_featured'] = 0;
            $save = Testimonial::where('id', $id)->update($data);
            $response['status'] = 1;
            $response['message'] = "Status Update Successfully";

        } else {
            $data['is_featured'] = 1;
            $save = Testimonial::where('id', $id)->update($data);
            $response['status'] = 2;
            $response['message'] = "Status Update Successfully";

        }
        return response()->json($response);
    }
    public function check_slug(Request $request)
    {
        $check = Testimonial::where('name', $request->name)->first();
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
