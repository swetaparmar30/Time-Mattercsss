<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Time Master Garage Doors">
    <meta name="author" content="Time Master Garage Doors">
    <meta name="keyword" content="Time Master Garage Doors">
    <meta name="robots" content="noindex,nofollow">
    <title>Time Master Garage Doors</title>
  
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
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/simplebar/css/simplebar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendors/simplebar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- Main styles for this application-->
    
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="<?php echo e(asset('css/examples.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .parsley-errors-list {
            color: red; 
            list-style-type: none;
            padding: 10px 0 0 !important;
        }
    </style>
</head>

<body>
    
            <?php echo $__env->yieldContent('content'); ?>
           
    <!-- CoreUI and necessary plugins-->
    
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

</html><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>