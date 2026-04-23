<!-- <section class="cta-sec time-matter-common time-matter-common-padding">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side content-sec">
                <h2 class="mrbt-20">Ready to Take Control of Your Vendor Relationships?</h2>
                <p>Discover how TimeMatters can streamline your staffing supplier management, optimize costs, and
                    ensure compliance across your workforce program.</p>

                <a href="" class="cmn-btn banner-btn blue-arrow-btn">
                   <span class="text">Schedule a Free Consultation</span>
                    <span class="btn-circle">
                        <img decoding="async" src="<?php echo e(asset('front-assets/src/images/common-btn-blue-arrow.webp ')); ?>">
                    </span>
                </a>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side form-sec">

                <div class="contact-form-sec">
                    <form id="cta-form">
                        <div class="form-row">
                            <input type="text" placeholder="Name" required />
                            <input type="text" placeholder="Company" />
                        </div>
                        <div class="form-row">
                            <input type="tel" placeholder="Phone" />
                            <input type="email" placeholder="Email" required />
                        </div>
                       <textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->



<section class="cta-sec time-matter-common time-matter-common-padding">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side content-sec">
                <?php if(isset($form->form_title) && $form->form_title != ''): ?>
                    <h2 class="mrbt-20"><?php echo e($form->form_title ?? ''); ?></h2>
                <?php endif; ?>
                <?php if(isset($form->form_short_desc) && $form->form_short_desc != ''): ?>
                    <p><?php echo $form->form_short_desc ?? ''; ?></p>
                <?php endif; ?>

                <a href="<?php echo e(route('contact')); ?>/" class="cmn-btn banner-btn blue-arrow-btn">
                    <span class="text"><?php echo e($form->btn_name ?? 'Schedule a Free Consultation'); ?></span>
                    <span class="btn-circle">
                        <img decoding="async" src="<?php echo e(asset('front-assets/src/images/common-btn-blue-arrow.webp ')); ?>">
                    </span>
                </a>

            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side form-sec">
                <div class="contact-form-sec">
                    <?php echo $__env->make('frontend.includes.contact-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/frontend/includes/cta-sec.blade.php ENDPATH**/ ?>