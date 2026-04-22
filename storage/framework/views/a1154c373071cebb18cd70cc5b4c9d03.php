<?php $__env->startSection('title'); ?> Sailsbury Service and Repair <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php $setting = App\Models\Setting::first(); ?>

<?php if(isset($banner->checked) && $banner->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.bannersection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($system_setting->checked) && $system_setting->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.systemsetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($residential) && $residential->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.door-maintainance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($garage_door) && $garage_door->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.garagedoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($calltoaction) && $calltoaction->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.calltoaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(isset($design) && $design->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('frontend.includes.areas-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/landing_page/sailsbury-service-and-repair.blade.php ENDPATH**/ ?>