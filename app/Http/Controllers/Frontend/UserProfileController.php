<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user-layout.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('uploads/profile/' . $user->image))) {
                unlink(public_path('uploads/profile/' . $user->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            
            $destPath = public_path('uploads/profile');
            if (!file_exists($destPath)) {
                mkdir($destPath, 0777, true);
            }
            
            $image->move($destPath, $imageName);
            $user->image = $imageName;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('frontend.independent-contractor.dashboard')->with('success', 'Profile updated successfully.');
    }
}
