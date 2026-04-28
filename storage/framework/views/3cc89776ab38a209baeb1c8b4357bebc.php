<?php $__env->startSection('title', 'Action Required: New User Registration'); ?>

<?php $__env->startSection('content'); ?>
    <h1>New User Registration</h1>
    <p>Hello Admin,</p>
    <p>A new professional has registered on the <strong>Time Matters</strong> portal. This account requires your review and approval before it can become active.</p>
    
    <div class="details-box">
        <p><strong>Full Name:</strong> <?php echo e($user->name); ?></p>
        <p><strong>Email Address:</strong> <?php echo e($user->email); ?></p>
        <p><strong>Assigned Role:</strong> <?php echo e($user->role); ?></p>
        <p><strong>Date Joined:</strong> <?php echo e($user->created_at->format('M d, Y')); ?></p>
    </div>

    <p>To approve or manage this user, please log in to the administrative dashboard using the button below.</p>
    
    <div class="button-wrapper">
        <a href="<?php echo e(route('login')); ?>" class="button">Access Admin Panel</a>
    </div>

    <p>Thank you for your prompt attention to this matter.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/emails/admin_new_user.blade.php ENDPATH**/ ?>