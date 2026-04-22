<?php $__env->startSection('content'); ?>
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
                <form method="POST" action="<?php echo e(route('custom.login')); ?>">
                    <?php echo csrf_field(); ?>
                <h3 class="mb-4">Login</h3>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" <?php if(isset($_COOKIE['email'])): ?> value="<?php echo e($_COOKIE['email']); ?>" <?php endif; ?>>
                </div>
                <div class="input-group mb-4">
                    <input type="password" class="form-control" placeholder="password" name="password" <?php if(isset($_COOKIE['password'])): ?> value="<?php echo e($_COOKIE['password']); ?>" <?php endif; ?>>
                </div>
                <div class="form-group text-left">
                    <div class="checkbox checkbox-fill d-inline">
                        <input type="checkbox" name="remember_me" id="checkbox-fill-a1" <?php if(isset($_COOKIE['email'])): ?> checked <?php endif; ?>>
                        <label for="checkbox-fill-a1" class="cr"> Remember Me</label>
                    </div>
                </div>
                <button class="btn btn-primary shadow-2 mb-4" type="submit">Login</button>
            </form>
                <p class="mb-2 text-muted">Forgot password? <a href="<?php echo e(route('reset.pass.link.view')); ?>">Reset</a></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>