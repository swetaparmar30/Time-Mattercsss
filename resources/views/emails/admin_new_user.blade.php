@extends('emails.layout')

@section('title', 'Action Required: New User Registration')

@section('content')
    <h1>New User Registration</h1>
    <p>Hello Admin,</p>
    <p>A new professional has registered on the <strong>Time Matters</strong> portal. This account requires your review and approval before it can become active.</p>
    
    <div class="details-box">
        <p><strong>Full Name:</strong> {{ $user->name }}</p>
        <p><strong>Email Address:</strong> {{ $user->email }}</p>
        <p><strong>Assigned Role:</strong> {{ $user->role }}</p>
        <p><strong>Date Joined:</strong> {{ $user->created_at->format('M d, Y') }}</p>
    </div>

    <p>To approve or manage this user, please log in to the administrative dashboard using the button below.</p>
    
    <div class="button-wrapper">
        <a href="{{ route('login') }}" class="button">Access Admin Panel</a>
    </div>

    <p>Thank you for your prompt attention to this matter.</p>
@endsection
