<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Timemattersinc">
    <meta name="author" content="Timemattersinc">
    <meta name="keyword" content="Timemattersinc">
    <meta name="robots" content="noindex,nofollow">

    <title><?php echo $__env->yieldContent('title', 'Timemattersinc'); ?></title>

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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/admin-dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/registration.css')); ?>">

</head>

<body class="auth-page registration-page">
    
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/simplebar/js/simplebar.min.js')); ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            <?php if(Session::has('error')): ?>
                toastr.error('<?php echo e(Session::get("error")); ?>');
            <?php elseif(Session::has('success')): ?>
                toastr.success('<?php echo e(Session::get("success")); ?>');
            <?php endif; ?>
        });
    </script>

    <script src="<?php echo e(asset('js/parsley/parsley.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>