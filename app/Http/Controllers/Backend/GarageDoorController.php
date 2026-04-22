<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MediaImage;
use App\Models\Updatelog;
use App\Models\GarageDoor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class GarageDoorController extends Controller
{
    public function index()
    {
        return view('garage-doors.index');
    }
    public function add() {
        return view('garage-doors.add');
    }

    public function store(Request $request) {


        $id = $request->garage_door_id;
        $uploaded_video = null;

        if ($request->hasFile('video')) {
            $current = Carbon::now()->format('YmdHs');
            $uploadvideo = $request->file('video');
            $video = $current . $uploadvideo->getClientOriginalName();
            $destinationPath = public_path('uploads/videos');

            // If updating, delete the old video if a new one is uploaded
            if ($id != "") {
                $garage_door = GarageDoor::findOrFail($id);
                $oldVideo = $garage_door->video;
                if ($oldVideo && file_exists($destinationPath . '/' . $oldVideo)) {
                    unlink($destinationPath . '/' . $oldVideo);
                }
            }

            $uploadvideo->move($destinationPath, $video);
            $uploaded_video = $video;
        }

        if ($id != "") {
            // Update existing record
            $garage_door = GarageDoor::findOrFail($id);
        } else {
            // Create new record
            $garage_door = new GarageDoor();
        }

        $garage_door->title = $request->title ?? '';
        $garage_door->description = $request->description ?? '';
        $garage_door->bullets = $request->bullets ?? '';
        $garage_door->subtitle = $request->subtitle ?? '';
        $garage_door->button = $request->button ?? '';
        $garage_door->button_url = $request->button_url ?? '';
        $garage_door->image = $request->img_id ?? '';

        if ($uploaded_video) {
            $garage_door->video = $uploaded_video;
        } else {
            $garage_door->video = $request->old_video ?? '';
        }

        $garage_door->save();

        $message = $id ? 'Garage Door updated successfully.' : 'Garage Door added successfully.';
        return redirect()->route('garage-doors.index')->with('success', $message);
    }


    public function list(Request $request) {
        $garageDoorList = GarageDoor::select('*')->where('deleted_at', null)->latest()->get();

        $counter = 1;
        $garageDoorList->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            $item['description'] = Str::limit($item['description'], 80);
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" data-id="' . $item['id'] . '" href="' . route('garage-doors.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
           if (!in_array(auth()->user()->role, ['dealer', 'marketing'])) {
                $item['action'] .= '<a data-href="' . route('garage-doors.delete', $item['id']) . '" data-title="testrete" data-original-title="Delete Tags" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
             }
            return $item;

        });
        return response()->json(['data' => $garageDoorList]);
    }

    public function edit($id) {

        $garage = GarageDoor::findOrFail($id);
        $image_name = MediaImage::where('id' ,$garage->image)->first();
        return view('garage-doors.add', compact('garage','image_name'));
    }
   public function delete($id) {
    if ($id != "") {
        $record = GarageDoor::find($id);
        if ($record) {
            $filename = $record->video;
            if ($filename) {
                $file_path = public_path('uploads/videos/' . $filename);
                if (file_exists($file_path)) {
                    // Ensure it is a file, not a directory
                    if (is_file($file_path)) {
                        unlink($file_path);
                    }
                }
            }
            $record->delete();
            return redirect()->route('garage-doors.index')
                ->withSuccess('Garage Door deleted successfully.');
        } else {
            return redirect()->route('garage-doors.index')
                ->withError('Garage Door not found.');
        }
    } else {
        return redirect()->route('garage-doors.index')
            ->withError('Invalid Garage Door ID.');
    }
}


}
