<?php $__env->startSection('main_content'); ?>
<section class="search-results-section">
    <div class="search-header">
        <h1 class="content-title">Search Results for "<?php echo e($query); ?>"</h1>
        <p class="content-subtitle">Found <?php echo e($categories->count() + $files->count()); ?> matches</p>
    </div>

    <?php if($categories->count() > 0): ?>
        <div class="results-group">
            <h2 style="margin-bottom: 20px; font-size: 1.5rem; color: #333;">Categories</h2>
            <div class="dashboard-cards" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="dashboard-card">
                    <div class="card-icon-box">
                        <?php if($category->image): ?>
                            <img class="top-icon" src="<?php echo e(asset('uploads/' . $category->image)); ?>" alt="<?php echo e($category->title); ?>">
                        <?php else: ?>
                            <img class="top-icon" src="<?php echo e(asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png')); ?>" alt="<?php echo e($category->title); ?>">
                        <?php endif; ?>
                    </div>
                    <h3><?php echo e($category->title); ?></h3>
                    <p><?php echo \Illuminate\Support\Str::limit(strip_tags($category->description), 100); ?></p>
                    <a class="view-more-link cmn-btn light-wht-btn" href="<?php echo e(route('category.show', $category->id)); ?>">
                        <span class="view-more-badge">View Details</span>
                        <span class="btn-circle">
                            <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/common-btn-white-arrow.webp')); ?>" alt="" aria-hidden="true">
                        </span>
                    </a>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if($files->count() > 0): ?>
        <div class="results-group" style="margin-top: 40px;">
            <h2 style="margin-bottom: 20px; font-size: 1.5rem; color: #333;">Files & Resources</h2>
            <div class="files-list" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden;">
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="file-item" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #eee;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png')); ?>" alt="File" style="width: 24px; opacity: 0.5;">
                        <div>
                            <strong style="display: block; color: #333;"><?php echo e($file->name); ?></strong>
                            <small style="color: #666;">Resource</small>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <a href="<?php echo e(route('central.file.preview', $file->id)); ?>" target="_blank" class="cmn-btn" style="padding: 5px 15px; font-size: 12px; background: #eee; color: #333; text-decoration: none; border-radius: 4px;">Preview</a>
                        <a href="<?php echo e(route('file.download', $file->id)); ?>" class="cmn-btn" style="padding: 5px 15px; font-size: 12px; background: #000; color: #fff; text-decoration: none; border-radius: 4px;">Download</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if($categories->count() == 0 && $files->count() == 0): ?>
        <div class="no-results" style="text-align: center; padding: 80px 20px;">
            <h3 style="color: #666;">No matches found for your search.</h3>
            <p style="color: #999;">Try different keywords or browse categories.</p>
            <a href="<?php echo e(route('dashboard')); ?>" class="cmn-btn" style="display: inline-block; margin-top: 20px; background: #000; color: #fff; padding: 10px 25px; border-radius: 6px; text-decoration: none;">Back to Dashboard</a>
        </div>
    <?php endif; ?>
</section>

<style>
    .search-results-section {
        padding: 40px 20px;
    }
    .search-header {
        margin-bottom: 40px;
    }
    .file-item:last-child {
        border-bottom: none;
    }
    .cmn-btn {
        transition: opacity 0.3s;
    }
    .cmn-btn:hover {
        opacity: 0.8;
    }
    .dashboard-card p {
        color: #666;
        line-height: 1.5;
        margin-bottom: 20px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user-layout.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/search-results.blade.php ENDPATH**/ ?>