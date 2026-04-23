<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | TimeMatters</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('front-assets/src/css/admin-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/src/css/login.css') }}">
  </head>
  <body class="auth-page login-page">
    <main class="auth-card">
      <img
        class="auth-logo"
        src="/front-assets/src/images/Time-matters-header-logo.webp"
        alt="TimeMatters logo"
        width="350"
        height="84"
      >

      <section id="reset-password-section">
        <header class="auth-header">
          <h1 class="auth-title">Reset Password</h1>
          <p class="auth-subtitle">Enter your new password below</p>
        </header>

        <form method="POST" action="{{ route('frontend.password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-field">
            <label class="form-label" for="email">Email</label>
            <input
              class="form-control @error('email') is-invalid @enderror" 
              type="email"
              id="email"
              name="email"
              value="{{ $email ?? old('email') }}"
              readonly
            >
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-field" style="margin-top: 20px;">
            <label class="form-label" for="password">New Password</label>
            <input
              class="form-control @error('password') is-invalid @enderror" 
              type="password"
              id="password"
              name="password"
              placeholder="********"
              required
              autocomplete="new-password"
            >
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-field" style="margin-top: 20px;">
            <label class="form-label" for="password-confirm">Confirm Password</label>
            <input
              class="form-control" 
              type="password"
              id="password-confirm"
              name="password_confirmation"
              placeholder="********"
              required
              autocomplete="new-password"
            >
          </div>

          <button class="btn-primary" type="submit" style="margin-top: 30px;">Reset Password</button>
        </form>

        <p class="auth-footer-text">
          Remembered your password?
          <a class="auth-link" href="{{ route('frontend.login') }}"><strong>Back to Login</strong></a>
        </p>
      </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(session('success'))
    <script>
        $(function () {
            toastr.success("{{ session('success') }}");
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        $(function () {
            toastr.error("{{ session('error') }}");
        });
    </script>
    @endif
  </body>
</html>
