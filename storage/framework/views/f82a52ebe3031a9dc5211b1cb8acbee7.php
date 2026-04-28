<?php $__env->startSection('title', 'Welcome to Time Matters'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Welcome to Time Matters</h1>
    <p>Dear <?php echo e($user->name); ?>,</p>
    <p>Thank you for registering with <strong>Time Matters</strong>. We are pleased to have you join our professional community.</p>
    
    <div class="details-box">
        <p><strong>Registration Status:</strong> Pending Status</p>
        <p><strong>Full Name:</strong> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></p>
         <p><strong>Username:</strong> <?php echo e($user->email); ?></p>
    </div>

    <p>Your account has been successfully created and is currently being reviewed by our administration team. This process ensures the security and integrity of our platform.</p>
    
    <p>You will receive a follow-up email once your account has been activated. We appreciate your patience during this time.</p>
    
    <p>If you have any immediate questions, please feel free to reach out to our support team.</p>
    
    <p>Sincerely,<br>The Time Matters Team</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/emails/user_pending_approval.blade.php ENDPATH**/ ?>