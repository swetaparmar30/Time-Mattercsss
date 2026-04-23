<?php
  use App\Models\RoleCategory;
  $userRole = auth()->user()->role;
  $roleCategories = RoleCategory::where('name', $userRole)
                                 ->where('status', 1)
                                 ->get();
?>
<aside class="portal-sidebar">
  <nav class="portal-nav" aria-label="Primary navigation">
    <?php
      $currentRoute = request()->route()->getName();
      $currentId = request()->route('id');
    ?>
    <a href="<?php echo e(route('frontend.independent-contractor.dashboard')); ?>" data-nav="" 
    class="<?php echo e($currentRoute === 'frontend.independent-contractor.dashboard' ? 'active' : ''); ?>">
        <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png')); ?>" alt="">Dashboard
    </a>
    <?php if($roleCategories->count() > 0): ?>
      <?php $__currentLoopData = $roleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('category.show', $category->id)); ?>" data-nav="<?php echo e(strtolower(str_replace(' ', '-', $category->title))); ?>" 
           class="<?php echo e(($currentRoute === 'category.show' && $currentId == $category->id) ? 'active' : ''); ?>">
          <img src="<?php echo e(asset('uploads/' . $category->image)); ?>" alt="<?php echo e($category->title); ?>">
          <?php echo e($category->title); ?>

        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </nav>
  <nav class="portal-nav portal-logout" aria-label="Account navigation">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <img src="<?php echo e(asset('front-assets/src/userlogin/dashbord/Logout-black-icon.png')); ?>" alt="">Logout
    </a>
     <form id="logout-form" action="<?php echo e(route('frontend.logout')); ?>" method="POST" style="display: none;">
      <?php echo csrf_field(); ?>
     </form>
  </nav>
</aside>
<?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/sidebar.blade.php ENDPATH**/ ?>