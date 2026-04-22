<?php $__env->startSection('content'); ?>

<style>
.thank-sec{background-position: center right;
  background: no-repeat;
  background-repeat: no-repeat;
  background-size: cover;}
.thank-sec h2{padding-top: 75px !important; color: #fff;}
.thank-sec a{color: #fff; margin-bottom: 50px !important;}
.thank-sec p{padding-right: 0 !important; color: #fff;}
.thank-sec a:hover{color: #fff;}
</style>
<section class="banner-sec thank-sec common-text" style="background-image: url(<?php echo e(asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.png')); ?>);">
                <!-- Your existing banner content goes here -->
                <div class="banner-content-text">
                    <div class="container-md">
                        <div class="row align-items-center">
                            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 banner-left-sec justify-content-center align-items-center">
                                <h2>404 Page not found</h2>
                                <p>The page you are looking for might have been removed had it’s name Changed or is temporarily unavailable.</p>
                                <a href="<?php echo e(route('home')); ?>" class="common-btn common-btn" id="common-btn">BACK TO HOME</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.otherindex', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/errors/500.blade.php ENDPATH**/ ?>