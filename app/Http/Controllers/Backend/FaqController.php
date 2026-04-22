<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductService;
use App\Models\MediaImage;
use App\Models\Updatelog;
use App\Models\Faq;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index()
    {
        return view('faqs.index');
    }
    public function add()
    {
        return view('faqs.add');
    }

    public function store(Request $request)
    {

        $id = $request->faq_id;

        if ($id != "") {

            $faq = FAQ::findOrfail($id);

            $faq->title = isset($request->title) ? $request->title : '';
            $faq->description = isset($request->description) ? $request->description : '';
            $faq->update();

            return redirect()->route('faqs.index')->with('success', 'FAQ`s update Successfully.');
        } else {

            $faq = new FAQ();
            $faq->title = isset($request->title) ? $request->title : '';
            $faq->description = isset($request->description) ? $request->description : '';
            $faq->save();
            return redirect()->route('faqs.index')->with('success', 'FAQ`s Added Successfully.');
        }

    }

    public function list(Request $request)
    {
        $faq_list = FAQ::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        $faq_list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            $item['description'] = Str::limit($item->description, 80);
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('faqs.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            if (!in_array(auth()->user()->role, ['dealer', 'marketing'])) {
                $item['action'] .= '<a data-href="' . route('faqs.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }
            return $item;
        });
        return response()->json(['data' => $faq_list]);
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faqs.add', compact('faq'));
    }

    public function delete($id)
    {
        if ($id != "") {
            $record = Faq::find($id);
            $record->delete();
            return redirect()->route('faqs.index')
                ->withSuccess('Location Delete Successfully.');
        }
    }

    public function check_slug(Request $request)
    {
        $check = ProductService::where('sub_title', $request->name)->first();
        if ($check && $check != '' && $check != null) {
            $response['status'] = 1;
            $response['message'] = "available";
        } else {
            $response['status'] = 2;
            $response['message'] = "unavailable";
        }
        return response()->json($response);
    }
}
