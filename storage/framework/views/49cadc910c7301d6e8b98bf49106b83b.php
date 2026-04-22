<?php $__env->startSection('title'); ?><?php echo e(isset($meta_title) ? $meta_title : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(isset($meta_description) ? $meta_description : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <section class="loading-dock-banner-section loading-dock-one-banner-section sandk-common">
        <?php if(isset($loadingdockdoor->bannerimage) && $loadingdockdoor->bannerimage != null): ?>
            <?php
                $img = App\Models\MediaImage::select('name')->where('id', $loadingdockdoor->bannerimage)->first();
            ?>
            <?php if(isset($img->name) && $img->name != null): ?>
                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                    class="img-fluid ld-banner-img" width="auto" height="auto" loading="lazy"
                    alt="<?php echo e(isset($loadingdockdoor->title) ? $loadingdockdoor->title : 'residential banner'); ?>">
            <?php endif; ?>
        <?php else: ?>
            <img src="<?php echo e(asset('front-assets/src/images/residential-images/loading-dock-one-banner.webp')); ?>"
                class="img-fluid" width="auto" height="auto" alt="Garage Door" loading="lazy">
        <?php endif; ?>

        <div class="loading-dock-banner-content">



            <?php if(isset($loadingdockdoor->title) && $loadingdockdoor->title != ''): ?>
                <h1 class="loading-title"><?php echo $loadingdockdoor->title; ?></h1>
            <?php endif; ?>


            <?php if(isset($loadingdockdoor->description) && $loadingdockdoor->description != ''): ?>
                <?php echo $loadingdockdoor->description; ?>

            <?php endif; ?>


            <?php if(isset($loadingdockdoor->c_s_button_name) && $loadingdockdoor->c_s_button_name != ''): ?>
                <?php if(isset($loadingdockdoor->c_s_button_url) && $loadingdockdoor->c_s_button_url != ''): ?>
                    <?php if($loadingdockdoor->c_s_button_url == '#getafreequote'): ?>
                        <button class="common-btn first-btn" data-bs-target="#getafreequote" data-bs-toggle="modal">
                        <?php else: ?>
                            <a class="common-btn first-btn" href="<?php echo e($loadingdockdoor->c_s_button_url); ?>">
                    <?php endif; ?>
                <?php else: ?>
                    <a class="common-btn first-btn">
                <?php endif; ?>
                <?php echo e($loadingdockdoor->c_s_button_name); ?>


                <?php if($loadingdockdoor->c_s_button_url == '#getafreequote'): ?>
                    </button>
                <?php else: ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>



        </div>
    </section>
    <section class="work-with-your-app-section work-sec sandk-common sandk-common-padding sandk-inner-common">
        <div class="container-md">
            <div class="row">
                <div
                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center hollow-headings-section">
                    <?php if(isset($section2->section2_title) && $section2->section2_title != ''): ?>
                        <h2><?php echo $section2->section2_title; ?></h2>
                    <?php endif; ?>


                    <?php if(isset($section2->section2_description) && $section2->section2_description != ''): ?>
                        <?php echo $section2->section2_description; ?>

                    <?php endif; ?>
                </div>
                <div class="need-new-garage-door desktop preload-images" type="button" data-bs-toggle="modal"
                    data-bs-target="#selectdoor" id="door" style="display: block;">
                    <div class="inner-sec">
                        <div class="text-sec">
                            <h3>Need a new <br>garage door?</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row inner-application-sec app-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec loading-box-sec">
                    <article>




                        <?php if(isset($section2->sec2_image_1) && $section2->sec2_image_1 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section2->sec2_image_1)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section2->title) ? $section2->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-1.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section2->sec2_title_1) && $section2->sec2_title_1 != ''): ?>
                            <h3><?php echo e($section2->sec2_title_1); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section2->sec2_description_1) && $section2->sec2_description_1 != ''): ?>
                            <?php echo $section2->sec2_description_1; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section2->sec2_image_2) && $section2->sec2_image_2 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section2->sec2_image_2)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section2->title) ? $section2->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-2.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section2->sec2_title_2) && $section2->sec2_title_2 != ''): ?>
                            <h3><?php echo e($section2->sec2_title_2); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section2->sec2_description_2) && $section2->sec2_description_2 != ''): ?>
                            <?php echo $section2->sec2_description_2; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section2->sec2_image_3) && $section2->sec2_image_3 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section2->sec2_image_3)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section2->title) ? $section2->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-3.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section2->sec2_title_3) && $section2->sec2_title_3 != ''): ?>
                            <h3><?php echo e($section2->sec2_title_3); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section2->sec2_description_3) && $section2->sec2_description_3 != ''): ?>
                            <?php echo $section2->sec2_description_3; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section2->sec2_image_4) && $section2->sec2_image_4 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section2->sec2_image_4)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section2->title) ? $section2->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-4.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section2->sec2_title_4) && $section2->sec2_title_4 != ''): ?>
                            <h3><?php echo e($section2->sec2_title_4); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section2->sec2_description_4) && $section2->sec2_description_4 != ''): ?>
                            <?php echo $section2->sec2_description_4; ?>

                        <?php endif; ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="work-with-your-app-section inner-work-sec sandk-common sandk-inner-common">
        <div class="container-md">
            <div class="row">
                <div
                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center hollow-headings-section">
                    <?php if(isset($section3->section3_title) && $section3->section3_title != ''): ?>
                        <h2><?php echo e($section3->section3_title); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row inner-application-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec loading-box-sec">
                    <article>

                        <?php if(isset($section3->sec3_image_1) && $section3->sec3_image_1 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section3->sec3_image_1)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section3->title) ? $section3->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-4.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section3->sec3_title_1) && $section3->sec3_title_1 != ''): ?>
                            <h3><?php echo e($section3->sec3_title_1); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section3->sec3_description_1) && $section3->sec3_description_1 != ''): ?>
                            <?php echo $section3->sec3_description_1; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section3->sec3_image_2) && $section3->sec3_image_2 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section3->sec3_image_2)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section3->title) ? $section3->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-4.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section3->sec3_title_2) && $section3->sec3_title_2 != ''): ?>
                            <h3><?php echo e($section3->sec3_title_2); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section3->sec3_description_2) && $section3->sec3_description_2 != ''): ?>
                            <?php echo $section3->sec3_description_2; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section3->sec3_image_3) && $section3->sec3_image_3 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section3->sec3_image_3)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section3->title) ? $section3->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-4.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section3->sec3_title_3) && $section3->sec3_title_3 != ''): ?>
                            <h3><?php echo e($section3->sec3_title_3); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section3->sec3_description_3) && $section3->sec3_description_3 != ''): ?>
                            <?php echo $section3->sec3_description_3; ?>

                        <?php endif; ?>
                    </article>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 loading-box-sec">
                    <article>

                        <?php if(isset($section3->sec3_image_4) && $section3->sec3_image_4 != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $section3->sec3_image_4)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                    class="img-fluid" width="auto" height="auto" loading="lazy"
                                    alt="<?php echo e(isset($section3->title) ? $section3->title : ''); ?>">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/app-box-img-4.webp')); ?>"
                                class="img-fluid" width="602" height="588" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($section3->sec3_title_4) && $section3->sec3_title_4 != ''): ?>
                            <h3><?php echo e($section3->sec3_title_4); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($section3->sec3_description_4) && $section3->sec3_description_4 != ''): ?>
                            <?php echo $section3->sec3_description_4; ?>

                        <?php endif; ?>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="service-all-loading-sec sandk-common sandk-common-padding sandk-inner-common">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center parts-section">
                    <?php if(isset($section4->section4_title) && $section4->section4_title != ''): ?>
                        <h2><?php echo e($section4->section4_title); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row inner-loadind-repair">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                   



                    <?php if(isset($section4->section4_image) && $section4->section4_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')
                                ->where('id', $section4->section4_image)
                                ->first();
                        ?>
                        <?php if(isset($img->name) && $img->name != null): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                class="img-fluid" width="1000" height="592.88" loading="lazy"
                                alt="<?php echo e(isset($section4->section4_title) ? $section4->section4_title : ''); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/residential-images/Green-hill-loading-dock-doors-Scissor-Lift-with-Rick-1.webp')); ?>"
                            class="img-fluid" width="1000" height="592.88" alt="" loading="lazy">
                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">

 					<?php if(isset($section4->section4_sub_title) && $section4->section4_sub_title != ''): ?>
                        <h4 class="right-title"><?php echo $section4->section4_sub_title; ?></h4>
                    <?php endif; ?>


                    <?php if(isset($section4->section4_description) && $section4->section4_description != ''): ?>
                        <?php echo $section4->section4_description; ?>

                    <?php endif; ?>
                </div>
            </div>
            <div class="row loading-dock-accessories-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(isset($section5->section5_title) && $section5->section5_title != ''): ?>
                        <h2><?php echo e($section5->section5_title); ?></h2>
                    <?php endif; ?>
                </div>


				<?php if(isset($section5->section5_description) && $section5->section5_description != ''): ?>
                        <?php echo $section5->section5_description; ?>

                    <?php endif; ?>
                
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

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/landing_page/loading-dock.blade.php ENDPATH**/ ?>