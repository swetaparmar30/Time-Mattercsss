<?php

namespace App\Http\Controllers\Backend;

use App\Models\TimeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaImage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TimeServiceController extends Controller
{
    public function index()
    {
        return view('timeservice.index');
    }

    public function add()
    {
        return view('timeservice.add');
    }

    public function store(Request $request)
    {
        $id = $request->id;

        if ($id != "") {
            $timeservice = TimeService::findOrFail($id);
        } else {
            $timeservice = new TimeService();
        }

        $timeservice->title = $request->title ?? '';
        $timeservice->name = $request->name ?? '';
        $timeservice->slug = $request->slug;
        $timeservice->description = $request->description ?? '';


        // Sections
        for ($i = 1; $i <= 5; $i++) {
            $timeservice->{"section{$i}_name"} = $request->{"section{$i}_name"} ?? '';
            $timeservice->{"section{$i}_title"} = $request->{"section{$i}_title"} ?? '';
            $timeservice->{"section{$i}_description"} = $request->{"section{$i}_description"} ?? '';
        }

        // Section 1 Banner Fields
        $timeservice->section1_subtitle = $request->section1_subtitle ?? '';
        $timeservice->section1_button = $request->section1_button ?? '';
        $timeservice->section1_url = $request->section1_url ?? '';
        $timeservice->section1_image = $request->section1_image ?? '';

        // Section 2 customized: 2 titles, 2 descriptions
        $timeservice->section2_title2 = $request->section2_title2 ?? '';
        $timeservice->section2_description2 = $request->section2_description2 ?? '';

        // Section 4 customized: 6 subtitles, 6 notes
        for ($j = 1; $j <= 6; $j++) {
            $timeservice->{"section4_subtitle{$j}"} = $request->{"section4_subtitle{$j}"} ?? '';
            $timeservice->{"section4_note{$j}"} = $request->{"section4_note{$j}"} ?? '';
        }

        // Culture & Values Section
        $timeservice->historysubtitle = $request->historysubtitle ?? '';
        $timeservice->historydescription = $request->historydescription ?? '';
        $timeservice->historyimage = $request->historyimage ?? '';
        for ($k = 1; $k <= 5; $k++) {
            $timeservice->{"cv_subtitle_{$k}"} = $request->{"cv_subtitle_{$k}"} ?? '';
            $timeservice->{"cv_note_{$k}"} = $request->{"cv_note_{$k}"} ?? '';
        }

        // Section 5 customized: button name, button url
        $timeservice->section5_button = $request->section5_button ?? '';
        $timeservice->section5_url = $request->section5_url ?? '';

        // Talk to an Expert Section
        $timeservice->expert_title = $request->expert_title ?? '';
        $timeservice->expert_description = $request->expert_description ?? '';
        $timeservice->expert_button_name = $request->expert_button_name ?? '';
        $timeservice->expert_url = $request->expert_url ?? '';

        // Section Images
        $timeservice->section2_image = $request->section2_image ?? '';
        $timeservice->section3_image = $request->section3_image ?? '';


        $timeservice->status = $request->status ?? 0;
        $timeservice->publish_status = $request->publish_status ?? 'Draft';


        // Meta fields
        $timeservice->meta_title = $request->meta_title ?? '';
        $timeservice->meta_keyword = $request->meta_keyword ?? '';
        $timeservice->meta_description = $request->meta_description ?? '';

        $timeservice->save();


        $message = $id ? 'Time Service updated successfully.' : 'Time Service added successfully.';
        return redirect()->route('timeservice.index')->with('success', $message);
    }

    public function list(Request $request)
    {
        $list = TimeService::where('deleted_at', null)->latest()->get();

        $counter = 1;
        $list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            $item['status'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_status" ' . ($item['status'] == 1 ? 'checked' : '') . ' class="is_featured_class">';
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" href="' . route('timeservice.edit', $item['id']) . '"><i mce_href="' . route('timeservice.edit', $item['id']) . '" class="fa fa-edit"></i></a>';
            if (!in_array(auth()->user()->role, ['dealer', 'marketing'])) {
                $item['action'] .= '<a data-href="' . route('timeservice.delete', $item['id']) . '" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }

            return $item;
        });

        return response()->json(['data' => $list]);
    }

    public function edit($id)
    {
        $timeservice = TimeService::findOrFail($id);
        $section1_image = MediaImage::where('id', $timeservice->section1_image)->first();
        $section2_image = MediaImage::where('id', $timeservice->section2_image)->first();
        $section3_image = MediaImage::where('id', $timeservice->section3_image)->first();
        $historyimage = MediaImage::where('id', $timeservice->historyimage)->first();

        return view('timeservice.add', compact('timeservice', 'section1_image', 'section2_image', 'section3_image', 'historyimage'));
    }


    public function delete($id)
    {
        $record = TimeService::find($id);
        if ($record) {
            $record->delete();
            return redirect()->route('timeservice.index')->with('success', 'Time Service deleted successfully.');
        }
        return redirect()->route('timeservice.index')->with('error', 'Time Service not found.');
    }

    public function check_slug(Request $request)
    {
        $name = $request->name;
        $status = 0;
        $id = $request->id;

        $query = TimeService::where('title', $name);
        if ($id) {
            $query->where('id', '!=', $id);
        }
        $check = $query->first();

        if ($check) {
            $status = 1;
        }
        return response()->json(['status' => $status]);
    }

    public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $record = TimeService::find($id);
        if ($record) {
            $record->status = $status;
            $record->save();
            return response()->json(['status' => 1, 'message' => 'Status changed successfully.']);
        }
        return response()->json(['status' => 0, 'message' => 'Record not found.']);
    }
}


