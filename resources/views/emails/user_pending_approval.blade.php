@extends('emails.layout')

@section('title', 'Welcome to Time Matters')

@section('content')
    <h1>Welcome to Time Matters</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for registering with <strong>Time Matters</strong>. We are pleased to have you join our professional community.</p>
    
    <div class="details-box">
        <p><strong>Registration Status:</strong> Pending Status</p>
        <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
         <p><strong>Username:</strong> {{ $user->email }}</p>
    </div>

    <p>Your account has been successfully created and is currently being reviewed by our administration team. This process ensures the security and integrity of our platform.</p>
    
    <p>You will receive a follow-up email once your account has been activated. We appreciate your patience during this time.</p>
    
    <p>If you have any immediate questions, please feel free to reach out to our support team.</p>
    
    <p>Sincerely,<br>The Time Matters Team</p>
@endsection
