<?php
  use App\Models\RoleCategory;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporary Employee Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Raleway:wght@600&display=swap"
      rel="stylesheet"
    >
    
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/admin.css')); ?>?v=0..1">
    
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/dashboard.css')); ?>?v=0..1">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/onboarding.css')); ?>?v=0..1">
  </head>
  <body data-page="dashboard">
    <div class="portal-app">

    <?php echo $__env->make('user-layout/layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="portal-main">
        <?php echo $__env->make('user-layout/layout/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('main_content'); ?>
        
      </main>

      
      <?php echo $__env->make('user-layout/layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      </div>
      <script src="<?php echo e(asset('front-assets/src/userlogin/js/layout-includes.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/app.blade.php ENDPATH**/ ?>