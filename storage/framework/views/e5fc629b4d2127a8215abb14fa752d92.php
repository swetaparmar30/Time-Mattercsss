<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(Request::is('/')): ?>
        <title><?php echo $__env->yieldContent('title', 'Time Master'); ?></title>
    <?php else: ?>
        <title><?php echo $__env->yieldContent('title', 'Time Master'); ?>| Clark and Sons</title>
    <?php endif; ?>



    <meta name="description" content="<?php echo $__env->yieldContent('description', ' '); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', ' '); ?>">




    <!-- End Google Tag Manager -->

    <?php if(Request::is('thank-you')): ?>
        <meta name="robots" content="noindex">
    <?php else: ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>



    



    <!--  Google font cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/owl.theme.default.min.css')); ?>">


    <!------------- All css ---------------------------------->
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/custom_container.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/header-footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/service-page.css')); ?>">


</head>

<body>


    <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script src="<?php echo e(asset('front-assets/src/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/magnific-popup.min.js')); ?>"></script>


    <script src="<?php echo e(asset('front-assets/src/js/script.js')); ?>"></script>




    <?php echo $__env->yieldContent('script'); ?>









</body>

</html>
<?php /**PATH C:\wamp64\www\Time\resources\views/frontend/layouts/index.blade.php ENDPATH**/ ?>