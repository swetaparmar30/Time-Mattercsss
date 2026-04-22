<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TimeMatters</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://hamzahk15.sg-host.com/front-assets/src/css/admin-dashboard.css">
    <link rel="stylesheet" href="https://hamzahk15.sg-host.com/front-assets/src/css/login.css">
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

      <section id="login-section">
        <header class="auth-header">
          <h1 class="auth-title">Welcome Back</h1>
          <p class="auth-subtitle">Sign in to access your account</p>
        </header>

          <form method="POST" action="{{ route('frontend.login.store') }}">
          @csrf

          <div class="form-field">
            <label class="form-label" for="login-email">Email</label>
            <input
              class="form-control @error('email') is-invalid @enderror" 
              type="email"
              id="login-email" value="{{ old('email') }}"
              name="email"
              placeholder="Enter your mail address"
              autocomplete="email"
            >
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-field">
            <label class="form-label" for="login-password">Password</label>
            <input
              class="form-control @error('password') is-invalid @enderror" 
              type="password"
              id="login-password"
              name="password"
              placeholder="********"
              autocomplete="current-password"
            >
             @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <div class="auth-options">
            <label class="checkbox-group">
              <input type="checkbox" id="remember-me" name="rememberMe">
              <span>Remember me</span>
            </label>
            <button type="button" class="auth-link forgot-password forgot-password-toggle" id="open-forgot-password">
              Forgot your password?
            </button>
          </div>

          <button class="btn-primary" type="submit">Log in</button>
        </form>

        <p class="auth-footer-text">
          Don't have an account?
          <a class="auth-link" href="{{ route('frontend.register') }}"><strong>Register here</strong></a>
        </p>
      </section>

      <section id="forgot-password-section" class="auth-panel-hidden">
        <header class="auth-header">
          <h1 class="auth-title">Forgot Password</h1>
          <p class="auth-subtitle">Enter your email to receive a reset link</p>
        </header>

        <form class="auth-form" action="#" method="post" novalidate>
          <div class="form-field">
            <label class="form-label" for="reset-email">Email</label>
            <input
              class="form-control"
              type="email"
              id="reset-email"
              name="resetEmail"
              placeholder="Enter your mail address"
              autocomplete="email"
              required
            >
          </div>

          <button class="btn-primary" type="submit">Send Reset Link</button>
        </form>

        <p class="auth-footer-text">
          Remembered your password?
          <button type="button" class="auth-link back-to-login-btn" id="back-to-login">
           <strong>Back to Login</strong>
          </button>
        </p>
      </section>
    </main>
    <script>
      (function () {
        var loginSection = document.getElementById("login-section");
        var forgotSection = document.getElementById("forgot-password-section");
        var openForgotBtn = document.getElementById("open-forgot-password");
        var backToLoginBtn = document.getElementById("back-to-login");

        if (!loginSection || !forgotSection || !openForgotBtn || !backToLoginBtn) {
          return;
        }

        openForgotBtn.addEventListener("click", function () {
          loginSection.classList.add("auth-panel-hidden");
          forgotSection.classList.remove("auth-panel-hidden");
        });

        backToLoginBtn.addEventListener("click", function () {
          forgotSection.classList.add("auth-panel-hidden");
          loginSection.classList.remove("auth-panel-hidden");
        });
      })();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(session('success'))
    <script>
        $(function () {
            toastr.success("{{ session('success') }}");
        });
    </script>
    @endif
  </body>
</html>
