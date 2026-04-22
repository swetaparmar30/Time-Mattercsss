<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>





    <!-- <section class="contact-banner-sec inner-service-banner ">
                                                                        <img src="<?php echo e(asset('front-assets/src/images/contact-us-banner.webp')); ?>" alt="" class="img-fluid w-100  banner-img"
                                                                            width="1920" height="767">
                                                                        <div class="banner-content col-12">
                                                                            <div class="container-md">
                                                                                <div class="row">
                                                                                    <div class="banner-text">
                                                                                        <h1>Let’s Talk Vendor Management Solutions</h1>

                                                                                        <p> We’re here to help you simplify your staffing supplier relationships, reduce costs, and<br>
                                                                                            ensure compliance. Connect with our team today and discover how TimeMatters Inc. can
                                                                                            <br>bring
                                                                                            clarity and control to your vendor ecosystem.
                                                                                        </p>
                                                                                        <p>"Because your time is valuable — we’re here to listen, guide, and simplify vendor<br>
                                                                                            management
                                                                                            together."</p>



                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section> -->

    <section class="contact-banner-sec inner-service-banner ">
        <?php if(!empty($setting->banner_image)): ?>
            <?php
                $bnr_img = App\Models\MediaImage::select('name', 'alt_text')
                    ->where('id', $setting->banner_image)
                    ->first();
            ?>

            <?php if(!empty($bnr_img->name)): ?>
                <img src="<?php echo e(asset('uploads/' . $bnr_img->name)); ?>" alt="<?php echo e($bnr_img->alt_text); ?>"
                    class="img-fluid w-100  banner-img 1" width="1920" height="767">
            <?php else: ?>
                <img src="<?php echo e(asset('front-assets/src/images/contact-us-banner.webp')); ?>" alt=""
                    class="img-fluid w-100  banner-img 2" width="1920" height="767">
            <?php endif; ?>
        <?php else: ?>
            <img src="<?php echo e(asset('front-assets/src/images/contact-us-banner.webp')); ?>" alt=""
                class="img-fluid w-100  banner-img 3" width="1920" height="767">
        <?php endif; ?>

        <div class="banner-content col-12">
            <div class="container-md">
                <div class="row">
                    <div class="banner-text">
                        <?php if(isset($setting->banner_title)): ?>
                            <h1 class="desktop-heading"><?php echo e($setting->banner_title); ?></h1>
                            <h1 class="mobile-heading"><?php echo e($setting->banner_title); ?></h1>
                        <?php endif; ?>
                        <?php if(isset($setting->banner_description)): ?>
                            <?php echo $setting->banner_description; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="contact-page-form-sec time-matter-common time-matter-common-padding">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-4 col-xl-4 co-lg-5 col-md-12 col-sm-12 col-12 left-side">
                                    <div class="main-info-box">
                                        <h2>Ways to Connect</h2>

                                        <article>
                                            <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/location-info-icon.webp')); ?>"
                                                    alt="" width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Email Address</p>
                                                <p><a href="mailto:info@timemattersinc.com">info@timemattersinc.com</a></p>
                                            </div>
                                        </article>

                                        <article>
                                            <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/call-info-icon.webp')); ?>" alt=""
                                                    width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Phone Number</p>
                                                <p><a href="tel:14168633993">+1 416-863-3993</a></p>
                                            </div>
                                        </article>

                                        <article>
                                            <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/mail-info-icon.webp')); ?>" alt=""
                                                    width="72" height="72" loading="lazy"></div>
                                            <div class="info">
                                                <p>Address</p>
                                                <p>TimeMatters Inc<br>
                                                    200 Consumers Rd<br>
                                                    North York, ON M2J 4R4<br>
                                                    Canada</p>
                                            </div>
                                        </article>

                                    </div>

                                </div>


                                <div class="col-xxl-8 col-xl-8 co-lg-7 col-md-12 col-sm-12 col-12 right-side">
                                    <div class="contact-page-form">
                                        <h2 class="mrbt-20">Reach Out Today</h2>
                                        <p>Have a question or want to schedule a consultation? Fill out the form below and a member of
                                            our
                                            team will respond promptly.</p>
                                        <form action="" id="contact-form">
                                            <div class="form-row">
                                                <input type="text" placeholder="Name*" required />
                                                <input type="text" placeholder="Company*" />
                                            </div>
                                            <div class="form-row">
                                                <input type="email" placeholder="Email*" required />
                                                <input type="tel" placeholder="Phone (optional)" />
                                            </div>
                                            <textarea name="message" id="message" placeholder="Message" rows="3"></textarea>
                                            <button type="submit">Send</button>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </section> -->


    <section class="contact-page-form-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 co-lg-5 col-md-12 col-sm-12 col-12 left-side">
                    <div class="main-info-box">
                        <h2>Ways to Connect</h2>
                        <?php if(isset($setting->email)): ?>
                            <article>
                                <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/location-info-icon.webp')); ?>"
                                        alt="" width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Email Address</p>
                                    <p><a href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a></p>
                                </div>
                            </article>
                        <?php endif; ?>

                        <?php if(isset($setting->contact_no)): ?>
                            <article>
                                <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/call-info-icon.webp')); ?>" alt=""
                                        width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Phone Number</p>
                                    <p><a href="tel:<?php echo e($setting->contact_no); ?>"><?php echo e($setting->contact_no); ?></a></p>
                                </div>
                            </article>
                        <?php endif; ?>


                        <?php if(isset($setting->location)): ?>
                            <article>
                                <div class="icon"><img src="<?php echo e(asset('front-assets/src/images/mail-info-icon.webp')); ?>" alt=""
                                        width="72" height="72" loading="lazy"></div>
                                <div class="info">
                                    <p>Address</p>
                                    <p><?php echo $setting->location; ?></p>
                                </div>
                            </article>
                        <?php endif; ?>


                    </div>

                </div>


                <div class="col-xxl-8 col-xl-8 co-lg-7 col-md-12 col-sm-12 col-12 right-side">
                    <div class="contact-page-form">
                        <h2 class="mrbt-20">Reach Out Today</h2>
                        <p>Have a question or want to schedule a consultation? Fill out the form below and a member of our
                            team will respond promptly.</p>
                        <?php echo $__env->make('frontend.includes.contact-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="why-reach-out-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    <?php if(isset($setting->reach_out_title)): ?>
                        <h2><?php echo e($setting->reach_out_title); ?></h2>
                    <?php endif; ?>
                    <?php if(isset($setting->reach_out_description)): ?>
                        <?php echo $setting->reach_out_description; ?>

                    <?php endif; ?>

                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12 right-side">

                    <div class="additional-info">
                        <h3>Additional Info</h3>
                        <article class="hours">
                            <div class="icon">
                                <img src="<?php echo e(asset('front-assets/src/images/office-hours-icon.webp')); ?>" alt="" width="78"
                                    height="78" class="img-fluid">
                            </div>
                            <div class="content">
                                <p>Office Hours:</p>
                                <?php if(isset($setting->office_hours)): ?>
                                    <p><?php echo $setting->office_hours; ?></p>
                                <?php endif; ?>
                            </div>
                        </article>

                        <!-- <article class="linkdin-sec">
                                                                                                                                                                                                            <div class="icon">
                                                                                                                                                                                                                <img src="src/images/linkdin-info-icon.webp" alt="" width="78" height="78"
                                                                                                                                                                                                                    class="img-fluid">
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="content">
                                                                                                                                                                                                                <p>LinkedIn </p>
                                                                                                                                                                                                                <p><a href="">Follow us for updates and insights</a></p>

                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </article> -->

                    </div>

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
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Time\9-april\resources\views/frontend/contact.blade.php ENDPATH**/ ?>