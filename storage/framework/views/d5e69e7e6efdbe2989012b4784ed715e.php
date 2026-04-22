<?php if(isset($images) && $images != '' && $images->isNotEmpty()): ?>
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="media_imges_parent" data-id="<?php echo e($val->id); ?>">
        <img src="<?php echo e(asset('uploads/' . $val->name)); ?>" class="media_images_index media_images"
            data-id="<?php echo e($val->id); ?>">
        <button class="select_button_img">
            <i class="fa fa-check" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true" style="display:none;"></i>
        </button>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <h5> No images Found </h5>
    <?php endif; ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/includes/all_img.blade.php ENDPATH**/ ?>