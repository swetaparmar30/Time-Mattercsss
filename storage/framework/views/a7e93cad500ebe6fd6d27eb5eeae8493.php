<?php $__env->startSection('title', 'Your Account has been Approved'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Account Activated</h1>
    <p>Dear <?php echo e($user->name); ?>,</p>
    <p>We are pleased to inform you that your account on <strong>Time Matters</strong> has been reviewed and successfully <strong>approved</strong>.</p>
    
    <div class="details-box">
        <p><strong>Account Status:</strong> Active</p>
        <p><strong>Registered Email:</strong> <?php echo e($user->email); ?></p>
    </div>

    <p>You can now log in to your dashboard and start accessing our full range of features and services.</p>
    
    <div class="button-wrapper">
        <a href="<?php echo e(route('login')); ?>" class="button">Log In to Dashboard</a>
    </div>

    <p>If you have any questions or require assistance, please don't hesitate to contact our support team.</p>
    
    <p>Welcome aboard!<br>The Time Matters Team</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/emails/user_approved.blade.php ENDPATH**/ ?>