<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CentralFile;
use App\Models\RoleCategory;
use Illuminate\Support\Facades\File;

class CentralFileController extends Controller
{
    public function index()
    {
        return view('centralfile.index');
    }

    public function add()
    {
        $role_categories = RoleCategory::where('status', 1)->get();
        return view('centralfile.add', compact('role_categories'));
    }

    public function edit($id)
    {
        $central_file = CentralFile::with('roleCategories')->findOrFail($id);
        
        $role_categories = RoleCategory::where('status', 1)->get();
        $selected_roles = $central_file->roleCategories->pluck('id')->toArray();

        return view('centralfile.add', compact('central_file', 'role_categories', 'selected_roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'role_categories'  => 'required|array',
            'role_categories.*'=> 'exists:role_category,id',
            'uploaded_file'    => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,jpg,jpeg,png,gif,webp|max:10240', // max 10MB limit
        ]);

        $id = $request->central_file_id;

        if ($id) {
            $data = CentralFile::findOrFail($id);
            $data->updated_by = auth()->id();
        } else {
            $data = new CentralFile();
            $data->created_by = auth()->id();
        }

        // Direct File Upload Logic (no media library)
        if ($request->hasFile('uploaded_file')) {
            $file = $request->file('uploaded_file');
            
            // To avoid duplicate storage of the exact same file, we can hash the content
            $hash = md5_file($file->getRealPath());
            $extension = $file->getClientOriginalExtension();
            $filename = $hash . '.' . $extension;

            // Check if this exact file already exists in DB to prevent duplicate entries
            $existing_file = CentralFile::where('file_path', 'central_files/' . $filename)->first();
            if ($existing_file && $existing_file->id != $id) {
                return redirect()->back()->with('error', 'This identical file has already been uploaded as "' . $existing_file->name . '". Please use the existing file or upload a different one.');
            }

            // Save the file
            $destinationPath = public_path('uploads/central_files');
            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $file->move($destinationPath, $filename);

            $data->file_path = 'central_files/' . $filename;
        } else {
            if ($request->old_file_path) {
                $data->file_path = $request->old_file_path;
            }
        }

        $data->name = $request->name;
        $data->status = $request->status ?? 1;

        $data->save();

        // Sync role categories smoothly
        $data->roleCategories()->sync($request->role_categories);

        return redirect()->route('centralfile.index')
            ->with('success', $id ? 'File Updated Successfully' : 'File Added Successfully');
    }

    public function list(Request $request)
    {
        $list = CentralFile::with('roleCategories')->latest()->get();

        $counter = 1;
        $list->transform(function ($item) use (&$counter) {
            $item['ser_id'] = $counter++;
            
            $roles = $item->roleCategories->map(function($role) {
                return $role->name . ' (' . $role->title . ')';
            })->toArray();
            $item['roles'] = implode(', ', $roles);
            
            // Format file_path as a link
            $item['file_link'] = $item->file_path ? '<a href="'.asset('uploads/'.$item->file_path).'" target="_blank">Download/View File</a>' : '-';

            $item['action'] = '<a class="label theme-bg2 text-white f-12" href="' . route('centralfile.edit', $item['id']) . '"><i class="fa fa-edit"></i></a>';
            if (!in_array(auth()->user()->role, ['dealer', 'marketing'])) {
                $item['action'] .= ' <a data-href="' . route('centralfile.delete', $item['id']) . '" class="label theme-bg text-white f-12 product_delete"><i class="fa fa-trash" aria-hidden="true"></i></a>';
            }

            return $item;
        });

        return response()->json(['data' => $list]);
    }

    public function delete($id)
    {
        $record = CentralFile::find($id);
        if ($record) {
            $record->roleCategories()->detach();
            $record->delete();
            return redirect()->route('centralfile.index')->with('success', 'File deleted successfully.');
        }
        return redirect()->route('centralfile.index')->with('error', 'File not found.');
    }
}
