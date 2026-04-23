<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\FrontendForgotMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'We could not find a user with that email address.'
        ]);

        $token = Str::random(64);
        
        $user = User::where('email', $request->email)->first();
        $user->reset_token = $token;
        $user->save();

        try {
            Mail::to($request->email)->send(new FrontendForgotMail($token, $request->email));
            return back()->with('success', 'We have emailed your password reset link!');
        } catch (\Exception $e) {
            return back()->with('error', 'There was an issue sending the email. Please try again later.');
        }
    }

    public function showResetForm($token)
    {
        $user = User::where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->route('frontend.login')->with('error', 'Invalid password reset token.');
        }

        return view('frontend.auth.reset_password', ['token' => $token, 'email' => $user->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)
                    ->where('reset_token', $request->token)
                    ->first();

        if (!$user) {
            return back()->withInput()->with('error', 'Invalid token or email.');
        }

        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();

        return redirect()->route('frontend.login')->with('success', 'Your password has been reset!');
    }
}
