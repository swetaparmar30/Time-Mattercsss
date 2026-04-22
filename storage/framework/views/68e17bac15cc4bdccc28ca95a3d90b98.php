<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>
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

<!-- <?php if(isset($design) && $design->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?> -->

<section class="we-repair-commerical-overheadoors sandk-common-padding sandk-common"> 
         <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 common-garage-door-repair-we-repair-commerical-overhead-heading hamilton-garage-door-repair-we-repair-commerical-overhead-heading">
                    <h2 class="desk-heading">We repair all commercial overhead doors</h2>
                    <h2 class="mob-heading">We repair all commercial overhead doors</h2>
                   
                </div>
            </div>
            <div class="row new-port-commercial-doors">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    <h3 class="desk-heading">Commercial Overhead<br> Door Repair in Newport</h3>
                    <h3 class="mob-heading">Commercial Overhead Door Repair <br> in Newport</h3>
                       <p>Time Master has a family-owned and a 3rd generation owner with over 60 years of experience making us the oldest private independent garage and door company in  Newport.</p> 
                       <p>We service all commercial overhead and rolling doors, Contact us for competitive pricing and Reliable services.</p>
                </div>
                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                    <img src="/front-assets/src/images/overhead-garage-door-repair-newportwebp.webp" alt="overhead garage door repair in hamilton" width="786" height="325" class="img-fluid">
                 </div>
            </div>
        </div>
    </section>

<?php echo $__env->make('frontend.includes.areas-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(count($client_logo) > 0): ?>
    <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/landing_page/service-and-repair.blade.php ENDPATH**/ ?>