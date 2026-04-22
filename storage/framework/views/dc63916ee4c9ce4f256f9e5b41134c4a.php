<li class="dd-item" data-id="new-<?php echo e($item->id); ?>" data-name="<?php echo e($item->name); ?>" data-slug="<?php echo e($item->slug); ?>" data-new="<?php echo e($item->id); ?>" data-deleted="0">
    <div class="dd-handle"><i class="feather icon-command"></i><?php echo e($item->name); ?></div>
    <span class="button-delete" data-owner-id="new-<?php echo e($item->id); ?>"> <i class="fa fa-times" aria-hidden="true"></i></span><span class="button-edit" data-owner-id="new-<?php echo e($item->id); ?>"> <i class="fa fa-pencil" aria-hidden="true"></i></span>
    
    <?php if(count($item->children)): ?>
        <ol class="dd-list">
            <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('menu.get_menu', ['item' => $child], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    <?php endif; ?>
</li><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/menu/get_menu.blade.php ENDPATH**/ ?>