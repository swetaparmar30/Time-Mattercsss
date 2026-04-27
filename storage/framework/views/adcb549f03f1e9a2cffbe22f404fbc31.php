<?php
  use App\Models\RoleCategory;
  $userRole = auth()->user()->role;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(ucwords(str_replace('-', ' ', $userRole))); ?> Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Raleway:wght@600&display=swap" rel="stylesheet">
     <?php
        $setting = App\Models\Setting::first();
        if(isset($setting)){
            $img = App\Models\MediaImage::select('name')->where('id', $setting->site_favicon)->first();
        }
    ?>
    <link rel="manifest" href="<?php echo e(asset('assets/favicon/manifest.json')); ?>">
    <?php if(isset($img->name) && $img->name != ''): ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('uploads/'.$img->name)); ?>">
    <?php endif; ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/admin.css')); ?>?v=0..1">
    
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/dashboard.css')); ?>?v=0..1">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/onboarding.css')); ?>?v=0..1">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/userlogin/css/profile.css')); ?>?v=0..1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
      <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
      <script src="<?php echo e(asset('front-assets/src/userlogin/js/layout-includes.js')); ?>"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            <?php if(Session::has('success')): ?>
                toastr.success("<?php echo e(Session::get('success')); ?>");
            <?php endif; ?>

            <?php if(Session::has('error')): ?>
                toastr.error("<?php echo e(Session::get('error')); ?>");
            <?php endif; ?>

            <?php if(Session::has('info')): ?>
                toastr.info("<?php echo e(Session::get('info')); ?>");
            <?php endif; ?>

            <?php if(Session::has('warning')): ?>
                toastr.warning("<?php echo e(Session::get('warning')); ?>");
            <?php endif; ?>
        });
      </script>
    </body>
</html><?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/user-layout/layout/app.blade.php ENDPATH**/ ?>