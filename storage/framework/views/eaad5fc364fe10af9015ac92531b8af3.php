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
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/admin-dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/login.css')); ?>">
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

        <form method="POST" action="<?php echo e(route('frontend.password.update')); ?>">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="token" value="<?php echo e($token); ?>">

          <div class="form-field">
            <label class="form-label" for="email">Email</label>
            <input
              class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
              type="email"
              id="email"
              name="email"
              value="<?php echo e($email ?? old('email')); ?>"
              readonly
            >
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="form-field" style="margin-top: 20px;">
            <label class="form-label" for="password">New Password</label>
            <input
              class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
              type="password"
              id="password"
              name="password"
              placeholder="********"
              required
              autocomplete="new-password"
            >
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
          <a class="auth-link" href="<?php echo e(route('frontend.login')); ?>"><strong>Back to Login</strong></a>
        </p>
      </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <?php if(session('success')): ?>
    <script>
        $(function () {
            toastr.success("<?php echo e(session('success')); ?>");
        });
    </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
    <script>
        $(function () {
            toastr.error("<?php echo e(session('error')); ?>");
        });
    </script>
    <?php endif; ?>
  </body>
</html>
<?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/frontend/auth/reset_password.blade.php ENDPATH**/ ?>