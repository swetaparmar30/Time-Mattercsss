<section class="get-free-quote-sec sandk-common">
    <img src="<?php echo e(asset('front-assets/src/images/get-free-quote-bg.webp')); ?>" class="background-image" width="100%"
        height="789" alt="" loading="lazy">
    <div class="get-quote-content-sec">
        <div class="container-md">
            <div class="row align-items-center justify-content-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                    
                    <?php if(isset($quote->quote_title) && $quote->quote_title != ''): ?>
                        <?php if(Route::currentRouteName() == 'smyrna.garagedoor'): ?>
                            <h2 class="smyrna-h2"><?php echo $quote->quote_title; ?></h2>
                        <?php else: ?>
                            <h2><?php echo $quote->quote_title; ?></h2>
                        <?php endif; ?>
                    <?php endif; ?>

                  

                    <?php if(isset($quote->quotesub_title) && $quote->quotesub_title != ''): ?>
                        <?php if(Route::currentRouteName() == 'smyrna.garagedoor'): ?>
                            <h3 class="smyrna-content"><?php echo $quote->quotesub_title; ?></h3>
                        <?php else: ?>
                            <h3><?php echo $quote->quotesub_title; ?></h3>
                        <?php endif; ?>
                    <?php endif; ?>



                    <div class="get-quote-content-sec-button">
                        <?php if(isset($quote->quote_button_name) && $quote->quote_button_name != ''): ?>
                            <?php if(isset($quote->quote_button_url) && $quote->quote_button_url != ''): ?>
                                <?php if($quote->quote_button_url == '#getafreequote'): ?>
                                    <button class="common-btn first-btn" data-bs-target="#getafreequote"
                                        data-bs-toggle="modal">
                                    <?php else: ?>
                                        <a class="common-btn first-btn" href="<?php echo e($quote->quote_button_url); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <a class="common-btn first-btn">
                            <?php endif; ?>
                            <?php echo e($quote->quote_button_name); ?>


                            <?php if($quote->quote_button_url == '#getafreequote'): ?>
                                </button>
                            <?php else: ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(isset($quote->quotecall_button_name) && $quote->quotecall_button_name != ''): ?>
                            <?php if(isset($quote->quotecall_button_url) && $quote->quotecall_button_url != ''): ?>
                                <a class="common-btn second-btn" href="<?php echo e($quote->quotecall_button_url); ?>">
                                <?php else: ?>
                                    <a class="common-btn second-btn">
                            <?php endif; ?>
                            <img src="<?php echo e(asset('front-assets/src/images/white-yellow-call-icon.webp')); ?>"
                                class="normal-icon" alt="" height="25" width="25"><img
                                src="<?php echo e(asset('front-assets/src/images/blue-white-call-icon.webp')); ?>"
                                class="hover-icon" alt="" height="25"
                                width="25"><?php echo e($quote->quotecall_button_name); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/includes/quote-sec.blade.php ENDPATH**/ ?>