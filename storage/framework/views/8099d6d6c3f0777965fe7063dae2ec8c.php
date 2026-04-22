<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="faq-sec faq-page sandk-common-padding sandk-common">

    <div class="container-md">
        <div class="row align-items-center">
            <h1 class="faq">FAQ’s</h1>
            <!-- <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side-image">
                <?php if(isset($faqs->faq_img)): ?>
                    <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $faqs->faq_img)->first();
                    ?>
                    <figure>
                        <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" width="auto" height="auto" alt="" loading="lazy" class="img-fluid">
                    </figure>
                <?php endif; ?>
            </div> -->

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 right-faq-sec">
                <?php if($faqs->count() > 0): ?>
                    <div class="accordion" id="bestAccordion">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey=>$dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="heading<?php echo e($dkey); ?>">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($dkey); ?>"><?php echo e($dval['title']); ?></button>
                                </h4>
                                <div id="collapse<?php echo e($dkey); ?>" class="accordion-collapse collapse" data-bs-parent="#bestAccordion">
                                    <div class="card-body">
                                        <p><?php echo e($dval['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if(count($client_logo) > 0): ?>
    <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/faqs.blade.php ENDPATH**/ ?>