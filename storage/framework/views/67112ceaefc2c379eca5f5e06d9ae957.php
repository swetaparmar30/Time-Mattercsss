<?php $__env->startSection('title'); ?><?php echo e(isset($meta_title) ? $meta_title : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(isset($meta_description) ? $meta_description : ''); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?><?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $setting = App\Models\Setting::first(); ?>

    <?php if(isset($banner->checked) && $banner->checked == 1): ?>
        <?php echo $__env->make('frontend.includes.bannersection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div>
        <?php if(isset($system_setting->checked) && $system_setting->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.systemsetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->make('frontend.includes.services-sec-townsend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- <?php if(isset($residential) && $residential->checked == 1): ?>
    <?php echo $__env->make('frontend.includes.door-maintainance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?> -->
    </div>

    <div>
        <?php if(isset($garage_door) && $garage_door->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.garagedoor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(isset($calltoaction) && $calltoaction->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.calltoaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <div>
        <?php if(isset($newgarage) && $newgarage->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.newgarage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(isset($design) && $design->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <?php echo $__env->make('frontend.includes.townsend-why-choose-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>

        <?php if(isset($gallery) && $gallery->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.gallery-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <div>
        <?php if(isset($testimonial) && $gallery->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(isset($areas) && $gallery->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.areas-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if($faqs && $faqs->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.faq-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(isset($blog_sec) && $blog_sec->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.blog-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(isset($quote) && $quote->checked == 1): ?>
            <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(count($client_logo) > 0): ?>
            <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/landing_page/townsend.blade.php ENDPATH**/ ?>