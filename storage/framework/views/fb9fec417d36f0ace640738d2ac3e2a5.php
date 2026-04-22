<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('sections.store')); ?>" method="POST" enctype="multipart/form-data" id="section-create-form">
        <?php echo csrf_field(); ?>
        <?php if(session('error') && ! empty(old())): ?>
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <i class="ph ph-warning fs-5 me-2"></i>
                <div><?php echo e(session('error')); ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <!-- Basic Information -->
            <fieldset class="mb-4">
                <legend class="h4 mb-3">Section Information</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                                name="name" value="<?php echo e(old('name')); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="public" class="w-100 form-label">Make Section Public</label>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" id="public" name="is_public" value="on"
                                    <?php if(old('is_public', 'on') === 'on'): echo 'checked'; endif; ?>>
                                <label class="btn btn-outline-dark" for="public">Public</label>
                                <input type="radio" class="btn-check" id="draft" name="is_public" value="off"
                                    <?php if(old('is_public') === 'off'): echo 'checked'; endif; ?>>
                                <label class="btn btn-outline-dark" for="draft">Draft</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="editor <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="content"
                                name="content"><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('card-footer'); ?>
    <div class="d-flex gap-2">
        <button type="submit" form="section-create-form" class="btn btn-primary">
            <i class="ph ph-floppy-disk"></i> Create section
        </button>
        <a href="<?php echo e(route('sections.index')); ?>" class="btn btn-outline-secondary">
            <i class="ph ph-arrow-left"></i> Cancel
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let t = document.querySelectorAll("textarea.editor");
            t.forEach((t) => {
                new RichTextEditor(t, {
                    showToast: false,
                    showStatusBar: true,
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', ['pageTitle' => 'Create Section', 'cardTitle' => 'Create Section'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/sections/create.blade.php ENDPATH**/ ?>