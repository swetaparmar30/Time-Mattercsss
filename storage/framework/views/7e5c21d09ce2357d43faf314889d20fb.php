
<?php $__env->startSection('main_content'); ?>
<?php
  use App\Models\RoleCategory;
?>
    <section>
        <?php
            $userRole = auth()->user()->role;
            $roleCategories = RoleCategory::where('name', $userRole)
                                            ->where('status', 1)
                                            ->get();
            $titles = $roleCategories->pluck('title')->map(function ($item) {
                    return strtolower($item);
                })->toArray();

            $last = array_pop($titles); // last item
        ?>
        <h1 class="content-title">Welcome Back, <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></h1>
        
        <p class="content-subtitle">Access <?php echo e(implode(', ', $titles)); ?>

            <?php if($last): ?>
                <?php echo e(count($titles) ? ' and ' : ''); ?><?php echo e($last); ?>

            <?php endif; ?>
        </p>

        <div class="dashboard-cards">
        <?php
            $userRole = auth()->user()->role;
            $roleCategories = RoleCategory::where('name', $userRole)
                                            ->where('status', 1)
                                            ->get();
        ?>
        
        <?php if($roleCategories->count() > 0): ?>
            <?php $__currentLoopData = $roleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="dashboard-card">
                <div class="card-icon-box">
                <?php if($category->image): ?>
                    <img class="top-icon" src="<?php echo e(asset('uploads/' . $category->image)); ?>" alt="<?php echo e($category->title); ?>" >
                <?php else: ?>
                    <img class="top-icon" src="/src/images/dashbord-images/<?php echo e(strtolower(str_replace(' ', '-', $category->title))); ?>-black-icon.png" alt="<?php echo e($category->title); ?>">
                <?php endif; ?>
                </div>
                <h3><?php echo e($category->title); ?></h3>
                <p><?php echo $category->description; ?></p>
                <a class="view-more-link cmn-btn light-wht-btn" 
                    href="<?php echo e(route('category.show', $category->id)); ?>">
                    
                    <span class="view-more-badge">View More</span>
                    <span class="btn-circle">
                        
                        <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/common-btn-white-arrow.webp')); ?>" alt="" aria-hidden="true">
                    </span>
                    
                </a>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            
        <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user-layout.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/dashboard.blade.php ENDPATH**/ ?>