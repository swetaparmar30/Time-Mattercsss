@extends('emails.layout')

@section('title', 'Account Registration Update')

@section('content')
    <h1>Registration Update</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for your interest in joining <strong>Time Matters</strong>.</p>
    
    <p>After reviewing your application, we regret to inform you that we are unable to approve your account at this time.</p>
    
    <div class="details-box">
        <p><strong>Registration Status:</strong> Declined</p>
    </div>

    <p>This decision may be due to incomplete information or other administrative criteria. If you believe this was in error, or if you wish to provide additional information for a re-review, please feel free to contact our support team.</p>
    
    <p>We appreciate your interest and wish you the best in your professional endeavors.</p>
    
    <p>Sincerely,<br>The Time Matters Team</p>
@endsection
