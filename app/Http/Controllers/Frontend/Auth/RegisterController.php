<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;           // ← This is the correct import
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.auth.register');
   
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'name'       => $validated['name'],
            'role'       => $validated['role'],
            'password'   => Hash::make($validated['password']),
            'status'     => 0,
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
