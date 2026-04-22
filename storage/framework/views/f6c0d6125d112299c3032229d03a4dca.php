<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | TimeMatters</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@500;600;700&display=swap"
      rel="stylesheet"
    >
    <link rel="stylesheet" href="/front-assets/src/css/admin-dashboard.css">
    <link rel="stylesheet" href="/front-assets/src/css/registration.css">
    <style>
  
      .invalid-feedback {
          color: #dc3545;
          font-size: 13px;
          margin-top: 4px;
          display: block;
      }
    </style>
  </head>
  <body class="auth-page registration-page">
    <main class="auth-card">
      <img
        class="auth-logo"
        src="/front-assets/src/images/Time-matters-header-logo.webp"
        alt="TimeMatters logo"
        width="350"
        height="84"
      >

      <header class="auth-header">
        <h1 class="auth-title">Create Your Account</h1>
        <p class="auth-subtitle">Fill in your details to get started</p>
      </header>

            <form method="POST" action="<?php echo e(route('frontend.register.store')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="first-name">First Name</label>
                        <input type="text" name="first_name" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                      placeholder="Enter your first name" value="<?php echo e(old('first_name')); ?>" >
                      <?php $__errorArgs = ['first_name'];
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

                    <div class="form-field">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input type="text" name="last_name" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        placeholder="Enter your last name" value="<?php echo e(old('last_name')); ?>" >
                          <?php $__errorArgs = ['last_name'];
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

                    <div class="form-field">
                        <label class="form-label" for="register-email">Email Address</label>
                            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          placeholder="Enter your email address" value="<?php echo e(old('email')); ?>" >
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

                    <div class="form-field">
                        <label class="form-label" for="phone-number">Phone Number</label>
                        <input type="tel" name="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                      placeholder="+91 123 456 7890" value="<?php echo e(old('phone')); ?>" >
                      <?php $__errorArgs = ['phone'];
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

                    <div class="form-field">
                        <label class="form-label" for="company-name">Company Name</label>
                        <input type="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        placeholder="" value="<?php echo e(old('name')); ?>">
                      <?php $__errorArgs = ['name'];
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

                    <div class="form-field">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                        <option value="">Select your role</option>
                        <option value="Independent Contractor" <?php echo e(old('role') == 'Independent Contractor' ? 'selected' : ''); ?>>Independent Contractor </option>
                        <option value="Temporary Employee" <?php echo e(old('role') == 'Temporary Employee' ? 'selected' : ''); ?>> Temporary Employee </option>
                        <option value="Vendor" <?php echo e(old('role') == 'Vendor' ? 'selected' : ''); ?>> Vendor </option>
                      </select>
                      <?php $__errorArgs = ['role'];
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

                    <div class="form-field">
                        <label class="form-label" for="register-password">Password</label>
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
                            id="register-password"
                            name="password"
                            placeholder="********"
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

                    <div class="form-field">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <input
                            class="form-control"
                            type="password"
                            id="confirm-password"
                            name="password_confirmation"
                            placeholder="********"
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                <div class="auth-options">
                    <label class="checkbox-group">
                        <input type="checkbox" id="terms-accepted" name="termsAccepted" <?php echo e(old('termsAccepted') ? 'checked' : ''); ?> >
                        <span>
                            I agree to
                            <a class="auth-link" href="#" target="_blank" rel="noopener noreferrer">
                                Terms &amp; Privacy Policy
                            </a>
                        </span>
                    </label>
                </div>

                <button class="btn-primary" type="submit">Register</button>
            </form>

            <p class="auth-footer-text">
                Already have an account?
                <a class="auth-link" href="<?php echo e(route('frontend.login') ?? '#'); ?>"><strong>Login</strong></a>
            </p>
          </main>
  </body>
</html><?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/auth/register.blade.php ENDPATH**/ ?>