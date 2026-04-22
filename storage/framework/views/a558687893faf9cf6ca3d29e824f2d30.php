
<section class="faq-sec sandk-common-padding sandk-common">

    <div class="container-md">
        <div class="row">
            <h2>FAQ’s</h2>
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side-image">
                <?php if($faqs->faq_img): ?>
                    <?php
                        $img = App\Models\MediaImage::where('id', $faqs->faq_img)->first();
                    ?>
                    <figure>
                        <?php if(isset($img->name) && $img->name != null): ?>
                           <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" width="626" height="670" 
                                loading="lazy" class="img-fluid"  alt="<?php echo e($img->alt_text ?: ($faqs->faq_title ?? 'Faq')); ?>">
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>
            </div>

            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-faq-sec">
                <?php if($faq_data->count() > 0): ?>
                    <div class="accordion" id="bestAccordion">
                        <?php $__currentLoopData = $faq_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($dkey == 7): ?>
                                <?php
                                    break;
                                ?>
                            <?php endif; ?>
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="heading<?php echo e($dkey); ?>">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?php echo e($dkey); ?>"><?php echo e($dval['title']); ?></button>
                                </h4>
                                <div id="collapse<?php echo e($dkey); ?>" class="accordion-collapse collapse"
                                    data-bs-parent="#bestAccordion">
                                    <div class="card-body">
                                        <p><?php echo e($dval['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(route('frontend.page.index', 'faqs')); ?>/" class="common-btn">View More FAQ's</a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/faq-sec.blade.php ENDPATH**/ ?>