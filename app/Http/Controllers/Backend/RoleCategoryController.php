<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleCategory;
use App\Models\MediaImage;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;


class RoleCategoryController extends Controller
{
    public function index()
    {
        return view('role_category.index');
    }

    public function add()
    {
        return view('role_category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'required|string|max:100',
            'button_url'  => 'nullable|url',
            'role_img'    => 'nullable',
        ]);

        $id = $request->role_category_id;

        if ($id) {
            $data = RoleCategory::findOrFail($id);
        } else {
            $data = new RoleCategory();
            $data->created_by = auth()->id();
        }

        // Media Library Image selection logic
        if ($request->has('role_img') && !empty($request->role_img)) {
            // If it's a media ID
            $media = MediaImage::find($request->role_img);
            if ($media) {
                $data->image = $media->name;
            } else {
                $data->image = $request->role_img;
            }
        } else if ($request->has('role_img') && empty($request->role_img)) {
            // If user removed the image
            $data->image = null;
        } else {
            // Fallback for old behaviour or unmodified states
            if ($request->old_image) {
                $data->image = $request->old_image;
            }
        }

        // Other fields
        $data->name         = $request->name;
        $data->title        = $request->title;
        $data->description  = $request->description;
        $data->button_text  = $request->button_text;
        $data->button_url   = $request->button_url;
        $data->status       = $request->status ?? 1;
        $data->updated_by   = auth()->id();

        $data->save();

        return redirect()->route('role-category.index')
            ->with('success', $id ? 'Updated Successfully' : 'Added Successfully');
    }

    public function edit($id)
    {
        $role_category = RoleCategory::findOrFail($id);

        // Fetch image from MediaImage table
        $role_img = MediaImage::where('name', $role_category->image)->first();

        return view('role_category.add', compact('role_category', 'role_img'));
    }

    public function list(Request $request)
    {
        $list = RoleCategory::where('deleted_at', null)->latest()->get();

        $counter = 1;
        $list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            $item['status'] = '<input type="checkbox" data-id="' . $item['id'] . '" id="is_status" ' . ($item['status'] == 1 ? 'checked' : '') . ' class="is_featured_class">';
            $item['action'] = '<a class="label theme-bg2 text-white f-12 tags_edit" href="' . route('role-category.edit', $item['id']) . '"><i mce_href="' . route('role-category.edit', $item['id']) . '" class="fa fa-edit"></i></a>';
            if (!in_array(auth()->user()->role, ['dealer', 'marketing'])) {
                $item['action'] .= '<a data-href="' . route('role-category.delete', $item['id']) . '" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }

            return $item;
        });

        return response()->json(['data' => $list]);
    }

     public function delete($id)
    {
        $record = RoleCategory::find($id);
        if ($record) {
            $record->delete();
            return redirect()->route('role-category.index')->with('success', 'Role Category deleted successfully.');
        }
        return redirect()->route('role-category.index')->with('error', 'Role Category not found.');
    }

     public function change_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $record = RoleCategory::find($id);
        if ($record) {
            $record->status = $status;
            $record->save();
            return response()->json(['status' => 1, 'message' => 'Status changed successfully.']);
        }
        return response()->json(['status' => 0, 'message' => 'Record not found.']);
    }
}
