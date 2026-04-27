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
use Illuminate\Support\Facades\Mail;
use App\Mail\UserPendingApprovalMail;
use App\Mail\AdminNewUserMail;
use App\Models\Setting;

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

        // Send email to the user
        try {
            Mail::to($user->email)->send(new UserPendingApprovalMail($user));
        } catch (\Exception $e) {
            \Log::error("User registration email failed: " . $e->getMessage());
        }

        // Small delay to avoid Mailtrap rate limit (5 emails / 10 seconds on free plan)
        sleep(2);

        // Send email to the admin
        $adminEmail = config('mail.admin_email');

        if (!$adminEmail) {
            $setting = Setting::first();
            $adminEmail = $setting->email ?? null;
        }

        if (!$adminEmail) {
            $admin = User::where('role', 'administrator')->first();
            $adminEmail = $admin->email ?? null;
        }

        if ($adminEmail) {
            \Log::info("Attempting to send admin registration notification to: " . $adminEmail);
            try {
                Mail::to($adminEmail)->send(new AdminNewUserMail($user));
            } catch (\Exception $e) {
                \Log::error("Admin registration notification failed: " . $e->getMessage());
            }
        }

        // Auth::login($user);

        // // Role-based dashboard redirect
        // return $this->redirectToDashboard($user);
        return redirect()->route('frontend.login')
                         ->with('success', 'Registration successful! Your account is pending admin approval. Please wait for activation.');
    }

}
