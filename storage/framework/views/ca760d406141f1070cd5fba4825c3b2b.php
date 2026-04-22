<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- <section class="vendor-banner-sec inner-service-banner">
                                                            <img src="<?php echo e(asset('front-assets/src/images/vendor-management-banner-img.webp')); ?>" alt="" class="img-fluid w-100  banner-img" width="1920" height="767">
                                                            <div class="banner-content col-12">
                                                                <div class="container-md">
                                                                    <div class="row">
                                                                        <div class="banner-text">
                                                                            <h1 class="desktop-heading">Vendor Management Solution Advisory</h1>
                                                                            <h1 class="mobile-heading">Vendor Management Solution Advisory</h1>
                                                                            <p> Independent guidance to help you build and manage the workforce programs,<br> processes, and technologies that support your vendor strategy and operational goals.</p>
                                                                            <a href="" class="cmn-btn banner-btn light-wht-btn">
                                                                                <spam class="text"> Connect with Us</spam>
                                                                                <span class="btn-circle">
                                                                                    <img decoding="async" src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp ')); ?>">
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section> -->
    <section class="vendor-banner-sec inner-service-banner">
        <?php if(!empty($service->section1_image)): ?>
            <?php
                $img1 = App\Models\MediaImage::select('name', 'alt_text')
                    ->where('id', $service->section1_image)
                    ->first();
            ?>

            <?php if(!empty($img1->name)): ?>
                <img src="<?php echo e(asset('uploads/' . $img1->name)); ?>" alt="<?php echo e($img1->alt_text); ?>" class="img-fluid w-100  banner-img"
                    width="1920" height="767">
            <?php else: ?>
                <img src="<?php echo e(asset('front-assets/src/images/vendor-management-banner-img.webp')); ?>" alt=""
                    class="img-fluid w-100  banner-img" width="1920" height="767">
            <?php endif; ?>
        <?php else: ?>
            <<img src="<?php echo e(asset('front-assets/src/images/vendor-management-banner-img.webp')); ?>" alt=""
                class="img-fluid w-100  banner-img" width="1920" height="767">
        <?php endif; ?>

            <div class="banner-content col-12">
                <div class="container-md">
                    <div class="row">
                        <div class="banner-text">
                            <?php if(isset($service->section1_title)): ?>
                                <h1 class="desktop-heading"><?php echo e($service->section1_title); ?></h1>
                                <h1 class="mobile-heading"><?php echo e($service->section1_title); ?></h1>
                            <?php endif; ?>
                            <?php if(isset($service->section1_description)): ?>
                                <?php echo $service->section1_description; ?>

                            <?php endif; ?>
                            <a href="<?php echo e(isset($service->section1_button_url) ? $service->section1_button_url : '#'); ?>"
                                class="cmn-btn banner-btn light-wht-btn">
                                <spam class="text">
                                    <?php echo e(isset($service->section1_button) ? $service->section1_button : 'Connect with Us'); ?>

                                </spam>
                                <span class="btn-circle">
                                    <img decoding="async"
                                        src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp ')); ?>">
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- <section class="vendore-mange-info-sec time-matter-common time-matter-common-padding">
                                                <div class="container-md">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  left-side">
                                                            <h2 class="desktop-heading mrbt-20">What Is Vendor <br>Management?</h2>
                                                            <h2 class="mobile-heading mrbt-20">What Is Vendor Management?</h2>
                                                            <p>Vendor management is the structured oversight of the staffing suppliers that support your contingent
                                                                workforce. It includes setting program goals, defining performance expectations,
                                                                ensuring compliance, and managing the processes and tools used to coordinate suppliers and
                                                                contingent resources. Effective vendor management improves visibility, strengthens governance,
                                                                and provides better control over supplier performance, cost, and delivery.</p>

                                                        </div>
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                                                            <h2 class="mrbt-20">What Is Vendor Management Solution Advisory?</h2>
                                                            <p>Organizations often struggle with vendor programs that lack structure, visibility, and consistent
                                                                supplier performance. Fragmented processes and unclear compliance expectations can create gaps
                                                                that ultimately impact business outcomes. TimeMatters provides independent program-level
                                                                advisory to help you build a cohesive vendor management framework—strengthening governance,
                                                                supplier alignment, process efficiency, and supporting technology selection.</p>
                                                            <p>TimeMatters provides independent advisory to help organizations design a cohesive vendor
                                                                management framework—focusing on governance, supplier alignment, workflow optimization, and the
                                                                technology required to support the program.</p>
                                                            <p>As part of this service, we offer Vendor Management Software Advisory to ensure your platform
                                                                selection and configuration match your operational requirements. We also support challenges with
                                                                time-based Statement of Work (SOW) engagements, helping clarify scope, establish controls, and
                                                                integrate SOW oversight into your broader vendor management strategy.</p>
                                                            <p>Our advisory approach ensures your program is structured, scalable, and able to deliver
                                                                measurable value.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section> -->
    <section class="vendore-mange-info-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  left-side">
                    <?php if(isset($service->section2_title)): ?>
                        <h2 class="desktop-heading mrbt-20"><?php echo e($service->section2_title); ?></h2>
                        <h2 class="mobile-heading mrbt-20"><?php echo e($service->section2_title); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($service->section2_description)): ?>
                        <?php echo $service->section2_description; ?>

                    <?php endif; ?>


                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                    <?php if(isset($service->section2_title2)): ?>
                        <h2 class="mrbt-20"><?php echo e($service->section2_title2); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($service->section2_description2)): ?>
                        <?php echo $service->section2_description2; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- <section class="how-vendor-mage-sec time-matter-common ">
                                            <div class="container-md">
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side">
                                                        <h2 class="mrbt-20">How Our Vendor Management <br>Solution Advisory Works</h2>
                                                        <img src="<?php echo e(asset('front-assets/src/images/how-vendor-mage-mg.webp ')); ?>" alt=""
                                                            class="mobile-img img-fluid" width="810" height="810" loading="lazy">
                                                        <p>TimeMatters begins by assessing your current vendor landscape, processes, and program structure.
                                                            We identify gaps, define requirements, and establish governance standards across roles,
                                                            workflows, compliance, and performance expectations.</p>
                                                        <p>If a Vendor Management Software is required, we guide you through platform selection,
                                                            configuration, integration, and supplier onboarding. For organizations using SOW arrangements,
                                                            we evaluate existing practices and help implement milestone tracking, approval workflows, and
                                                            deliverable validation.</p>
                                                        <p>Following implementation, we provide ongoing performance monitoring and program refinement to
                                                            keep your vendor ecosystem aligned and effective.</p>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                                                        <img src="<?php echo e(asset('front-assets/src/images/how-vendor-mage-mg.webp ')); ?>" alt=""
                                                            class="desktop-img img-fluid" width="810" height="810" loading="lazy">

                                                    </div>

                                                </div>
                                            </div>
                                        </section> -->
    <section class="how-vendor-mage-sec time-matter-common ">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side">
                    <?php if(isset($service->section3_title)): ?>
                        <h2 class="mrbt-20"><?php echo e($service->section3_title); ?></h2>
                    <?php endif; ?>

                    <img src="<?php echo e(asset('front-assets/src/images/how-vendor-mage-mg.webp ')); ?>" alt=""
                        class="mobile-img img-fluid" width="810" height="810" loading="lazy">
                    <?php if(isset($service->section3_description)): ?>
                        <?php echo $service->section3_description; ?>

                    <?php endif; ?>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
                    <?php if(!empty($service->section3_image)): ?>
                        <?php
                            $img2 = App\Models\MediaImage::select('name', 'alt_text')
                                ->where('id', $service->section3_image)
                                ->first();
                        ?>

                        <?php if(!empty($img2->name)): ?>
                            <img src="<?php echo e(asset('uploads/' . $img2->name)); ?>" alt="<?php echo e($img2->alt_text); ?>" width="810" height="810"
                                class="desktop-img img-fluid" loading="lazy">
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/how-vendor-mage-mg.webp ')); ?>" alt="" width="810"
                                height="810" class="desktop-img img-fluid" loading="lazy">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/src/images/why-choose-us-img.webp ')); ?>" alt="" width="810"
                            height="810" class="img-fluid desktop-img">
                    <?php endif; ?>
                    <!-- <img src="<?php echo e(asset('front-assets/src/images/how-vendor-mage-mg.webp ')); ?>" alt=""
                                    class="desktop-img img-fluid" width="810" height="810" loading="lazy"> -->

                </div>

            </div>
        </div>
    </section>




    <section class="benefits-vendor-sec  time-matter-common time-matter-common-padding benefits-service-cmn-sec">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 top-heading text-center">
                    <?php if(isset($service->section4_title)): ?>
                        <h2><?php echo e($service->section4_title); ?></h2>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row second-row">

                <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-12 col-sm-12 col-12 two-side-line-sec">
                    <?php if(isset($service->section4_subtitle1)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle1); ?></h3>
                            <?php if(isset($service->section4_note1)): ?>
                                <p><?php echo e($service->section4_note1); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>
                    <?php if(isset($service->section4_subtitle2)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle2); ?></h3>
                            <?php if(isset($service->section4_note2)): ?>
                                <p><?php echo e($service->section4_note2); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>
                    <?php if(isset($service->section4_subtitle3)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle3); ?></h3>
                            <?php if(isset($service->section4_note3)): ?>
                                <p><?php echo e($service->section4_note3); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>
                    <?php if(isset($service->section4_subtitle4)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle4); ?></h3>
                            <?php if(isset($service->section4_note4)): ?>
                                <p><?php echo e($service->section4_note4); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>
                    <?php if(isset($service->section4_subtitle5)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle5); ?></h3>
                            <?php if(isset($service->section4_note5)): ?>
                                <p><?php echo e($service->section4_note5); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>
                    <?php if(isset($service->section4_subtitle6)): ?>
                        <article>
                            <h3><?php echo e($service->section4_subtitle6); ?></h3>
                            <?php if(isset($service->section4_note6)): ?>
                                <p><?php echo e($service->section4_note6); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endif; ?>


                </div>



            </div>

        </div>
    </section>

    <section class="blue-oragnization-work-box  time-matter-common time-matter-common-padding ">
        <div class="container-md">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 blue-box text-center">
                    <?php if(isset($service->section5_title)): ?>
                        <h2 class="mrbt-20"><?php echo e($service->section5_title); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($service->section5_description)): ?>
                        <?php echo $service->section5_description; ?>

                    <?php endif; ?>

                    <a href="<?php echo e(isset($service->section5_url) ? $service->section5_url : '#'); ?>"
                        class="cmn-btn banner-btn light-wht-btn">
                        <spam class="text">
                            <?php echo e(isset($service->section5_button) ? $service->section5_button : 'Connect with Us'); ?>

                        </spam>
                        <span class="btn-circle">
                            <img decoding="async" src="<?php echo e(asset('front-assets/src/images/common-btn-white-arrow.webp ')); ?>">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>




    <?php echo $__env->make('frontend.includes.why-choose-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.cta-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>








<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Time\9-april\resources\views/frontend/service/vendor-management-solutions.blade.php ENDPATH**/ ?>