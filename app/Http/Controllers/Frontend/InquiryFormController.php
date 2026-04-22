<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetInTouch;
use Illuminate\Support\Facades\Http;
use App\Mail\InquiryMail;
use Mail;

class InquiryFormController extends Controller
{
    public function getInTouchStore(Request $request)
    {
        
        // 1. Security / Honeypot Check
        if (!empty($request->hname) || !empty($request->hemail)) {
            // It's a bot, block quietly
            if ($request->ajax()) {
                
                return response()->json(['success' => false, 'message' => 'Spam detected.']);
            }
            
            return redirect()->back()->with('error', 'Spam detected.');
        }

        // 2. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'nullable|string|max:255',
            'message' => [
                'nullable',
                'string',
                'max:2000',
                'not_regex:/<script\b[^>]*>(.*?)<\/script>/is', // block script tag
                'not_regex:/<[^>]+>/', // block all HTML tags
                'not_regex:/\.(php|exe|js|sh|bat)/i' // block file mentions
            ],
            'g-recaptcha-response' => 'required' // Make sure the token is supplied
        ]);

        // 3. reCAPTCHA Verification
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip()
        ]);
        
        $recaptchaResult = $response->json();
        
        // reCAPTCHA v3 returns a score (0.0 to 1.0)
        // Usually, 0.5 or above means it's a human.
        if (!$recaptchaResult['success'] || $recaptchaResult['score'] < 0.5) {
            if ($request->ajax()) {
                
                return response()->json(['success' => false, 'message' => 'reCAPTCHA validation failed. Please try again.']);
            }
            
            return redirect()->back()->with('error', 'reCAPTCHA validation failed. Please try again.');
        }

        // 4. Extra Manual Security Check
        $message = $request->message;

        // Block suspicious patterns
        if (
            preg_match('/<script\b[^>]*>(.*?)<\/script>/is', $message) ||
            preg_match('/<[^>]+>/', $message) ||
            preg_match('/\.(php|exe|js|sh|bat)/i', $message) ||
           ($request->isSecure() && preg_match('/https?:\/\/|www\./i', $message)) // block links only on HTTPS
        ) {
            
            return redirect()->back()->with('error', 'Invalid message content.');
        }

        // 5. Sanitize Message
        $cleanMessage = strip_tags($message);
        $cleanMessage = htmlspecialchars($cleanMessage, ENT_QUOTES, 'UTF-8');

        // 6. Store Data
        $inquiry = new GetInTouch();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->zipcode = $request->company;
        $inquiry->message = $cleanMessage;
        $inquiry->url = $request->company; // storing company in 'url' as workaround since 'company' isn't in GetInTouch fillable, alternatively ignore it

        $inquiry->save();

        // 7. Response
        if ($request->ajax()) {
            return response()->json([
                'success' => true, 
                'message' => 'Your inquiry has been submitted successfully!'
            ]);
        }
        $contact_data = $request->all();

        Mail::to("soni@logikdigital.com")->send(new InquiryMail($contact_data, $contact_data['url']));

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }
}
