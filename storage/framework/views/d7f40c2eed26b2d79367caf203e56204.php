<section class="fix-it-yourself-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center justify-content-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($calltoaction->calltoaction_title) && $calltoaction->calltoaction_title !=''): ?>
                <h2><?php echo e($calltoaction->calltoaction_title); ?></h2>
                <?php endif; ?>

                <?php if(isset($calltoaction->call_button_desc) && $calltoaction->call_button_desc !=''): ?>
                    <p><?php echo e($calltoaction->call_button_desc); ?></p>
                <?php endif; ?>
                <div class="get-quote-content-sec-button">
                <?php if(isset($calltoaction->button_name) && $calltoaction->button_name !=''): ?>
                    <?php if(isset($calltoaction->button_url) && $calltoaction->button_url !=''): ?>
                        <?php if($calltoaction->button_url == '#getafreequote'): ?>
                            <button class="common-btn first-btn" data-bs-target="#getafreequote" data-bs-toggle="modal"> 
                        <?php else: ?>
                            <a class="common-btn first-btn" href="<?php echo e($calltoaction->button_url); ?>"> 
                        <?php endif; ?>
                    <?php else: ?>
                    <a class="common-btn first-btn"> 
                    <?php endif; ?>
                        <?php echo e($calltoaction->button_name); ?>

                        <?php if($calltoaction->button_url == '#getafreequote'): ?>
                            </button>
                        <?php else: ?>
                            </a>
                        <?php endif; ?>
                <?php endif; ?>

                <?php if(isset($calltoaction->call_button_name) && $calltoaction->call_button_name !=''): ?>
                    <?php if(isset($calltoaction->call_button_url) && $calltoaction->call_button_url !=''): ?>
                        <a class="common-btn second-btn" href="<?php echo e($calltoaction->call_button_url); ?>"> 
                    <?php else: ?>
                        <a class="common-btn second-btn"> 
                    <?php endif; ?>
                    <img src="<?php echo e(asset('front-assets/src/images/white-yellow-call-icon.webp')); ?>" class="normal-icon" alt="" height="25" width="25"><img src="<?php echo e(asset('front-assets/src/images/blue-white-call-icon.webp')); ?>" class="hover-icon" alt="" height="25" width="25"><?php echo e($calltoaction->call_button_name); ?>

                    </a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/calltoaction.blade.php ENDPATH**/ ?>