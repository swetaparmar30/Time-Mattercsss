<section class="area-we-cover-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <?php 
                $slug = request()->segment(count(request()->segments())); 
                $hideLeftColumn = in_array($slug, [
                    'dover-garage-doors',
                    'georgetown-garage-doors',
                    'salisbury-garage-doors',
                    'newport-garage-doors',
                    
                ]);
            ?>

            <?php if (! ($hideLeftColumn)): ?>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 left-side text-center">
                
            </div>
            <?php endif; ?>

            <div class="<?php echo e($hideLeftColumn ? 'col-12 location-pages' : 'col-12'); ?> right-side">
                <?php if(isset($areas->areas_title) && $areas->areas_title != ''): ?>
                    <h2><?php echo e($areas->areas_title ?: 'Areas We Serve'); ?></h2>
                <?php endif; ?>
                <?php echo $areas->areas_sub_title; ?>

            </div>
        </div>
    </div>
</section><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/areas-sec.blade.php ENDPATH**/ ?>