<?php $__env->startSection('robots'); ?> noindex <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<section class="banner-sec thank-sec common-text sandk-common-padding sandk-common" style="background-image: url(<?php echo e(asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.webp')); ?>);">
                <!-- Your existing banner content goes here -->
                <div class="banner-content-text">
                    <div class="container-md">
                        <div class="row align-items-center">
                            <div class="col-xxl-12 col-xl-12 col-lg-10 col-md-12 col-sm-12 col-12 banner-left-sec justify-content-center align-items-center">
                                <h2>Thank You for Your Inquiry</h2>
                                <p></p>
                                <a href="<?php echo e(route('home')); ?>" class="common-btn common-btn" id="common-btn">BACK TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/thankyou.blade.php ENDPATH**/ ?>