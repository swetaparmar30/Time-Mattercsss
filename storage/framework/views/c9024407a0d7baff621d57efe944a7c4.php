<?php $__env->startSection('content'); ?>

<style>

</style>
<section class="banner-sec thank-sec common-text sandk-common-padding sandk-common error-page" style="background-image: url(<?php echo e(asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.webp')); ?>);">
                <!-- Your existing banner content goes here -->
                <div class="banner-content-text">
                    <div class="container-md">
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12 banner-left-sec justify-content-center align-items-center">
                                <h2 class="desktop-heading">404 Page not found</h2>
                                <h2 class="mobile-heading">404 Page <br>not found</h2>
                                <p>The page you are looking for might have been removed had it’s name Changed or is temporarily unavailable.</p>
                                <a href="<?php echo e(route('home')); ?>" class="common-btn common-btn" id="common-btn">BACK TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/errors/404.blade.php ENDPATH**/ ?>