<section class="area-we-cover-sec sandk-common-padding sandk-common servicearea-newarea-sec">
    <div class="container-md">
        <div class="row align-items-center">
           

            <div class="col-12 right-side">
                <?php if(isset($serviceareas->title) && $serviceareas->title != ''): ?>
                    <h1><?php echo e($serviceareas->title ?: 'Areas We Serve'); ?></h1>
                <?php endif; ?>
                <?php echo $serviceareas->description; ?>

            </div>
        </div>
    </div>
</section><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/includes/servicesareas-area-sec.blade.php ENDPATH**/ ?>