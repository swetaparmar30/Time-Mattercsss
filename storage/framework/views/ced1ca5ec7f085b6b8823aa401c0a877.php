<?php $__env->startSection('title'); ?><?php echo e(isset($meta_title) ? $meta_title : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(isset($meta_description) ? $meta_description : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <section class="loading-dock-banner-section hollow-metal-door-banner-section sandk-common">


        <?php if(isset($hollowmetaldoors->hollowmetal_bannerimage) && $hollowmetaldoors->hollowmetal_bannerimage != null): ?>
            <?php
                $img = App\Models\MediaImage::select('name')
                    ->where('id', $hollowmetaldoors->hollowmetal_bannerimage)
                    ->first();
            ?>
            <?php if(isset($img->name) && $img->name != null): ?>
                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                    sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                    class="img-fluid ld-banner-img" width="auto" height="auto" loading="lazy"
                    alt="<?php echo e(isset($hollowmetaldoors->bannertitle) ? $hollowmetaldoors->bannertitle : 'residential banner'); ?>">
            <?php endif; ?>
        <?php else: ?>
            <img src="<?php echo e(asset('front-assets/src/images/residential-images/hollow-metal-door-banner.webp')); ?>"
                class="img-fluid" width="auto" height="auto" alt="Garage Door" loading="lazy">
        <?php endif; ?>

        <div class="loading-dock-banner-content">



            <?php if(isset($hollowmetaldoors->bannertitle) && $hollowmetaldoors->bannertitle != ''): ?>
                <h1 class="loading-bannertitle"><?php echo $hollowmetaldoors->bannertitle; ?></h1>
            <?php endif; ?>


            <?php if(isset($hollowmetaldoors->bannerdescription) && $hollowmetaldoors->bannerdescription != ''): ?>
                <?php echo $hollowmetaldoors->bannerdescription; ?>

            <?php endif; ?>


            <?php if(isset($hollowmetaldoors->hm_d_button_name) && $hollowmetaldoors->hm_d_button_name != ''): ?>
                <?php if(isset($hollowmetaldoors->hm_d_button_url) && $hollowmetaldoors->hm_d_button_url != ''): ?>
                    <?php if($hollowmetaldoors->hm_d_button_url == '#getafreequote'): ?>
                        <button class="common-btn first-btn" data-bs-target="#getafreequote" data-bs-toggle="modal">
                        <?php else: ?>
                            <a class="common-btn first-btn" href="<?php echo e($hollowmetaldoors->hm_d_button_url); ?>">
                    <?php endif; ?>
                <?php else: ?>
                    <a class="common-btn first-btn">
                <?php endif; ?>
                <?php echo e($hollowmetaldoors->hm_d_button_name); ?>


                <?php if($hollowmetaldoors->hm_d_button_url == '#getafreequote'): ?>
                    </button>
                <?php else: ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>



        </div>
    </section>
    <section class="hollow-metal-configurations-section sandk-common sandk-common-padding sandk-inner-common">
        <div class="container-md">
            <div class="row">
                <div
                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center hollow-headings-section">
                    <?php if(isset($hm_d_section2->section2_title) && $hm_d_section2->section2_title != ''): ?>
                        <h2><?php echo $hm_d_section2->section2_title; ?></h2>
                    <?php endif; ?>


                    <?php if(isset($hm_d_section2->section2_description) && $hm_d_section2->section2_description != ''): ?>
                        <?php echo $hm_d_section2->section2_description; ?>

                    <?php endif; ?>
                </div>

                <div class="need-new-garage-door desktop preload-images" type="button" data-bs-toggle="modal"
                    data-bs-target="#selectdoor" id="door" style="display: block;">
                    <div class="inner-sec">
                        <div class="text-sec">
                            <h3>
                                Need a new <br />
                                garage door?
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hollow-metal-doors-sec sandk-common sandk-common-padding">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">


                    <?php if(isset($hm_d_section3->section3_title) && $hm_d_section3->section3_title != ''): ?>
                        <h4><?php echo $hm_d_section3->section3_title; ?></h4>
                    <?php endif; ?>



                    <?php if(isset($hm_d_section3->hm_d_section3_image) && $hm_d_section3->hm_d_section3_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')
                                ->where('id', $hm_d_section3->hm_d_section3_image)
                                ->first();
                        ?>
                        <?php if(isset($img->name) && $img->name != null): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                class="img-fluid mobile-img" width="auto" height="auto" loading="lazy"
                                alt="<?php echo e(isset($hm_d_section3->section3_title) ? $hm_d_section3->section3_title : 'residential banner'); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/residential-images/ld-hollow-metal.webp')); ?>"
                            class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
                    <?php endif; ?>




                    <?php if(isset($hm_d_section3->section3_description) && $hm_d_section3->section3_description != ''): ?>
                        <?php echo $hm_d_section3->section3_description; ?>

                    <?php endif; ?>


                </div>


                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                    <?php if(isset($hm_d_section3->hm_d_section3_image) && $hm_d_section3->hm_d_section3_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')
                                ->where('id', $hm_d_section3->hm_d_section3_image)
                                ->first();
                        ?>
                        <?php if(isset($img->name) && $img->name != null): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                class="img-fluid desktop-image" width="auto" height="auto" loading="lazy"
                                alt="<?php echo e(isset($hm_d_section3->section3_title) ? $hm_d_section3->section3_title : 'residential banner'); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/residential-images/ld-hollow-metal.webp')); ?>" img-fluid
                            desktop-image" width="auto" height="auto" alt="" loading="lazy">
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>



    <?php if(isset($hm_d_section4->section4_description) && $hm_d_section4->section4_description != ''): ?>
        <?php echo $hm_d_section4->section4_description; ?>

    <?php endif; ?>

    <?php if(isset($hm_d_section5->section5_description) && $hm_d_section5->section5_description != ''): ?>
        <?php echo $hm_d_section5->section5_description; ?>

    <?php endif; ?>

    <section class="metal-door-frames-sec sandk-common sandk-common-padding sandk-inner-common">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    <?php if(isset($hm_d_section6->hm_d_section6_image) && $hm_d_section6->hm_d_section6_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')
                                ->where('id', $hm_d_section6->hm_d_section6_image)
                                ->first();
                        ?>
                        <?php if(isset($img->name) && $img->name != null): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                class="img-fluid" width="777" height="350" loading="lazy"
                                alt="<?php echo e(isset($hm_d_section6->section6_title) ? $hm_d_section6->section6_title : 'residential banner'); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/Metal-Door-Frames-image.webp')); ?>" class="img-fluid"
                            width="777" height="350" alt="" loading="lazy">
                    <?php endif; ?>

                </div>



                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">


                    <?php if(isset($hm_d_section6->section6_title) && $hm_d_section6->section6_title != ''): ?>
                        <h2><?php echo e($hm_d_section6->section6_title); ?> </h2>
                    <?php endif; ?>


                    <?php if(isset($hm_d_section6->hm_d_section6_image) && $hm_d_section6->hm_d_section6_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')
                                ->where('id', $hm_d_section6->hm_d_section6_image)
                                ->first();
                        ?>
                        <?php if(isset($img->name) && $img->name != null): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w, 
                             <?php echo e(asset('uploads/' . $img->name)); ?> 400w"
                                sizes="(max-width: 600px) 100vw, 
                            (max-width: 900px) 80vw, 
                            602px"
                                class="img-fluid mobile-img" width="777" height="350" loading="lazy"
                                alt="<?php echo e(isset($hm_d_section6->section6_title) ? $hm_d_section6->section6_title : 'residential banner'); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/Metal-Door-Frames-image.webp')); ?>"
                            class="img-fluid mobile-img" width="777" height="350" alt="" loading="lazy">
                    <?php endif; ?>




                    <?php if(isset($hm_d_section6->section6_description) && $hm_d_section6->section6_description != ''): ?>
                        <?php echo $hm_d_section6->section6_description; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($hm_d_section7->section7_description) && $hm_d_section7->section7_description != ''): ?>
        <?php echo $hm_d_section7->section7_description; ?>

    <?php endif; ?>
    <?php if(isset($hm_d_section8->section8_description) && $hm_d_section8->section8_description != ''): ?>
        <?php echo $hm_d_section8->section8_description; ?>

    <?php endif; ?>
    <?php if(isset($hm_d_section9->section9_description) && $hm_d_section9->section9_description != ''): ?>
        <?php echo $hm_d_section9->section9_description; ?>

    <?php endif; ?>



    <?php echo $__env->make('frontend.includes.areas-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/landing_page/hollow-metal-door.blade.php ENDPATH**/ ?>