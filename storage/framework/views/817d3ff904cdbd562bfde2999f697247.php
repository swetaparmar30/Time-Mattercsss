
<?php $__env->startSection('main_content'); ?>
<?php
  use App\Models\RoleCategory;
?>

    <section>
      <div class="onboarding-header">
        <span class="onboarding-back-arrow" aria-hidden="true"></span>
        <h1><?php echo e($category->title); ?></h1>
      </div>

      <div class="doc-panel">
        <?php if($files && $files->count() > 0): ?>
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="doc-row">
              <p><?php echo e($file->name); ?></p>
              <div class="doc-actions">
                <a class="preview" href="<?php echo e(route('central.file.preview', $file->id)); ?>" target="_blank" aria-label="Preview <?php echo e($file->name); ?>">
                  <img src="<?php echo e(asset('front-assets/src/userlogin/images/preview-icon.png')); ?>"></a>
                

                <a class="download" href="<?php echo e(route('file.download', $file->id)); ?>">
                  <img src="<?php echo e(asset('front-assets/src/userlogin/images/download-icon.png')); ?>">
                </a>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <p style="padding: 20px; text-align: center; color: #999;">No files available for this category.</p>
        <?php endif; ?>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-layout.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/category-detail.blade.php ENDPATH**/ ?>