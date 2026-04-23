<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="banner-sec cmn-banner-sec home-page-banner">
        <video class="w-100 banner-img" autoplay="" muted="" loop="" playsinline="" preload="metadata" width="auto"
            height="auto">
            <source src="<?php echo e(asset('front-assets/src/images/Timematters-banner-video.mp4')); ?>" type="video/mp4">Your
            browser does not support the video tag.
        </video>
        <div class="banner-content col-12">
            <div class="container-md">
                <div class="row">
                    <div class="banner-text">
                        <h1 class="desktop-heading">Because Your Time is Valuable</h1>
                        <h1 class="mobile-heading">Because Your Time is Valuable</h1>
                        <p>Independent and impartial Vendor Management Solutions for optimized<br> staffing supplier
                            programs.</p>
                        <a href="<?php echo e(route('contact')); ?>/" class="cmn-btn banner-btn white-arrow-btn">
                            <span class="text"> Connect with Us</span>
                            <span class="btn-circle">
                                <img decoding="async" src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp ')); ?>">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php if(isset($system_setting->checked) && $system_setting->checked == 1): ?>
        <section class="service-drop-down-sec time-matter-common time-matter-common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                        <?php if(isset($system_setting->system_setting_title) && $system_setting->system_setting_title != ''): ?>
                            <h2><?php echo e($system_setting->system_setting_title); ?></h2>
                        <?php endif; ?>
                    </div>
                   
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                        <div class="accordion all-services-accordion service-drop-down-accordion" id="homeServiceAccordion">

                            
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseOne" aria-expanded="false"
                                        aria-controls="ServicecollapseOne">
                                        <span><?php echo e($system_setting->title1 ?? ''); ?></span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="ServiceheadingOne" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p><?php echo e($system_setting->note1 ?? ''); ?></p>
                                        <a href="<?php echo e($system_setting->btn_url1 ?? '#'); ?>"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text"><?php echo e($system_setting->btn_name1 ?? ''); ?></span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp')); ?>">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseTwo" aria-expanded="false"
                                        aria-controls="ServicecollapseTwo">
                                        <span><?php echo e($system_setting->title2 ?? ''); ?></span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="ServiceheadingTwo" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p><?php echo e($system_setting->note2 ?? ''); ?></p>
                                        <a href="<?php echo e($system_setting->btn_url2 ?? '#'); ?>"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text"><?php echo e($system_setting->btn_name2 ?? ''); ?></span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp')); ?>">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="ServiceheadingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#ServicecollapseThree" aria-expanded="false"
                                        aria-controls="ServicecollapseThree">
                                        <span><?php echo e($system_setting->title3 ?? ''); ?></span>
                                    </button>
                                </h3>
                                <div id="ServicecollapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="ServiceheadingThree" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p><?php echo e($system_setting->note3 ?? ''); ?></p>
                                        <a href="<?php echo e($system_setting->btn_url3 ?? '#'); ?>"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text"><?php echo e($system_setting->btn_name3 ?? ''); ?></span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp')); ?>">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="Serviceheadingfour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#Servicecollapsefour" aria-expanded="false"
                                        aria-controls="Servicecollapsefour">
                                        <span><?php echo e($system_setting->title4 ?? ''); ?></span>
                                    </button>
                                </h3>
                                <div id="Servicecollapsefour" class="accordion-collapse collapse"
                                    aria-labelledby="Serviceheadingfour" data-bs-parent="#homeServiceAccordion">
                                    <div class="accordion-body">
                                        <p><?php echo e($system_setting->note4 ?? ''); ?></p>
                                        <a href="<?php echo e($system_setting->btn_url4 ?? '#'); ?>"
                                            class="cmn-btn banner-btn white-arrow-btn">
                                            <span class="text"><?php echo e($system_setting->btn_name4 ?? ''); ?></span>
                                            <span class="btn-circle">
                                                <img decoding="async"
                                                    src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp')); ?>">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if(isset($value_highlight->checked) && $value_highlight->checked == 1): ?>
        <div class="container-md border-seprater"></div>

        <section class="value-highlight-sec time-matter-common time-matter-common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center">
                        <h2><?php echo e($value_highlight->section_title ?? ''); ?></h2>
                    </div>
                </div>

                <div class="row second-row">
                    <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-12 col-sm-12 col-12 two-side-line-sec left-side">
                        <?php if(!empty($value_highlight->items)): ?>
                            <?php $__currentLoopData = $value_highlight->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article>
                                    <h3><?php echo e($item->title ?? ''); ?></h3>
                                    <p><?php echo e($item->content ?? ''); ?></p>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if(isset($why_choose->checked) && $why_choose->checked == 1): ?>
        <?php echo $__env->make('frontend.includes.why-choose-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <?php if(isset($testimonial->checked) && $testimonial->checked == 1): ?>
        <?php echo $__env->make('frontend.includes.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php if(isset($form->checked) && $form->checked == 1): ?>
        <?php echo $__env->make('frontend.includes.cta-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/frontend/home.blade.php ENDPATH**/ ?>