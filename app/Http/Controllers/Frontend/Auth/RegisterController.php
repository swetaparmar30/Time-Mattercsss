<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;           
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.auth.register');
   
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => ['required', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'        => ['required', 'string', 'max:20'],        
            'name'      => ['nullable', 'string', 'max:255'],
            'role'         => ['required', 'string', 'in:Independent Contractor,Temporary Employee,Vendor'], // Updated
            'password'     => ['required', 'confirmed', Password::defaults()],
        ]);
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            // 'name'       => trim($request->first_name . ' ' . $request->last_name), // fill the 'name' column
            'email'      => $request->email,
            'phone'      => $request->phone,
            'name'       => $request->name,
            'role'       => $request->role,
            'password'   => Hash::make($request->password),
        ]);

        // Auth::login($user);

        // // Role-based dashboard redirect
        // return $this->redirectToDashboard($user);
        return redirect()->route('frontend.login')
                         ->with('success', 'Registration successful! Please login with your email and password.');
    }

    

    // protected function redirectToDashboard(User $user): RedirectResponse
    // {
    //     return match ($user->role) {
    //         'Independent Contractor' => redirect()->route('independent-contractor.dashboard'),
    //         'Temporary Employee'     => redirect()->route('temporary-employee.dashboard'),
    //         'Vendor'                 => redirect()->route('vendor.dashboard'),
    //         default => redirect()->route('dashboard'),
    //     };
    // }
}
