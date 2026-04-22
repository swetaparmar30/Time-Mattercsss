@extends('layouts.app')
@section('title') Forgot Password @endsection
@section('content')
<style>
    .parsley-errors-list{
        padding: 0 !important;
    }
    .parsley-errors-list li{
        text-align: left !important;
    }
</style>
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <i class="feather icon-unlock auth-icon"></i>
                </div>
                <form method="POST" action="{{ route('update.password') }}" data-parsley-validate="">
                    @csrf
                <h3 class="mb-4">Forgot Password</h3>
                <div class="input-group mb-3">
                    <input type="hidden" name="token" value="{{ $user_token }}">
                    <input type="email" class="form-control" placeholder="Email" name="email" required data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Title">    
                </div>
                <span id="content_required"></span>
                <div class="input-group mb-4">
                    <input type="password" class="form-control" placeholder="New Password" id="password" name="password" required 
                    data-parsley-errors-container="#pass_required" 
                    data-parsley-required-message="Please Enter Password" 
                    data-parsley-minlength="8"
                    data-parsley-pattern="^(?=.*[A-Za-z])(?=.*\d).{8,}$"
                    data-parsley-error-message="Password must be at least 8 characters long and include at least one letter and one digit.">
                </div>
                <span id="pass_required"></span>
                <div class="input-group mb-4">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="con_password" required 
                    data-parsley-errors-container="#conpass_required" 
                    data-parsley-required-message="Please Enter Confirm Password" 
                    data-parsley-equalto="#password" 
                    data-parsley-error-message="Passwords does not match.">
                </div>
                <span id="conpass_required"></span>
                <button class="btn btn-primary shadow-2 mb-4" type="submit">Submit</button>
            </form>
                 
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('form').parsley();  // Initialize Parsley validation
    });
</script>
@endsection