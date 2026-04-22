<div class="modal" tabindex="-1" id="layout_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Select Layout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-3">
          <div class="py-3">
            <div class="row px-3">
                <?php $__currentLoopData = $layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 my-2" id="<?php echo e($val->id); ?>" data-type = "<?php echo e($val->type); ?>">
                  <input class ="d-none" type="radio" name="section_layout" id="<?php echo e($val->id); ?>" value="<?php echo e($val->type); ?>">
                  <label for="<?php echo e($val->id); ?>">
                    <img src="<?php echo e(asset('uploads/layouts/'.$val->image)); ?>" class="section_layout" data-type = "<?php echo e($val->type); ?>">
                  </label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/pages/modal.blade.php ENDPATH**/ ?>