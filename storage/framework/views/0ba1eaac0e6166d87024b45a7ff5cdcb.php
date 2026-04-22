<?php $__env->startSection('content'); ?>
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
                <form method="POST" action="<?php echo e(route('reset.pass.link')); ?>" data-parsley-validate="">
                    <?php echo csrf_field(); ?>
                <h3 class="mb-4">Reset Password</h3>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Email">
                </div>
                <span id="content_required"></span> 
                <button class="btn btn-primary shadow-2 mb-4" type="submit">Send Password Reset Link</button>
            </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/auth/reset_pass_link.blade.php ENDPATH**/ ?>