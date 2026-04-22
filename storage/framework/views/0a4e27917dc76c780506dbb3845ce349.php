<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(Request::is('/')): ?>
        <title><?php echo $__env->yieldContent('title', ''); ?></title>
    <?php else: ?>
        <title><?php echo $__env->yieldContent('title', ''); ?></title>
    <?php endif; ?>



    <meta name="description" content="<?php echo $__env->yieldContent('description', ' '); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', ' '); ?>">
    <?php
$setting = App\Models\Setting::first();
    ?>
    <?php if(isset($setting->site_favicon) && $setting->site_favicon != "" && $setting->site_favicon != null): ?>
        <?php
            $favicon_name = App\Models\MediaImage::where('id', $setting->site_favicon)->first();
            if (isset($favicon_name) && $favicon_name != null) {
                $h_path = asset('uploads/' . $favicon_name->name);
            } else {
                $h_path = asset('front-assets/images/welcome-logo.png');
            }
        ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e($h_path); ?>">
    <?php else: ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e($h_path); ?>">
    <?php endif; ?>



    <!-- End Google Tag Manager -->

    <?php if(Request::is('thank-you')): ?>
        <meta name="robots" content="noindex">
    <?php else: ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>



    



    <!--  Google font cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect"
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/owl.theme.default.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <!------------- All css ---------------------------------->
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/custom_container.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/header-footer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/service-page.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/about-page.css')); ?>">
    <link rel="stylesheet" href="/front-assets/src/css/admin-dashboard.css">
    <link rel="stylesheet" href="/front-assets/src/css/registration.css">

    <link rel="preload" href="https://www.google.com/recaptcha/api.js" as="script">
    <style>
        .parsley-errors-list {
            color: red;
            list-style-type: none;
            padding: 0 0 0 !important;
        }
    </style>
    <?php if(Request::is('contact')): ?>
        <style>
            .contact-page-form-sec .main-info-box article .info p span {
                display: block !important;

            }

            .testimonial-sec.time-matter-common-padding {
                padding-bottom: 120px;
            }

            footer.footer-sec {
                padding-top: 120px;
            }

            @media (min-width: 1401px) and (max-width: 1800px) {
                .testimonial-sec.time-matter-common-padding {
                    padding-bottom: 120px;
                }

                footer.footer-sec {
                    padding-top: 120px;
                }
            }

            @media (min-width: 1200px) and (max-width: 1399.99px) {
                .testimonial-sec.time-matter-common-padding {
                    padding-bottom: 100px;
                }

                footer.footer-sec {
                    padding-top: 100px;
                }
            }

            @media (min-width: 992px) and (max-width: 1199.98px) {
                .testimonial-sec.time-matter-common-padding {
                    padding-bottom: 80px;
                }

                footer.footer-sec {
                    padding-top: 80px;
                }
            }

            @media (min-width: 768px) and (max-width: 991.98px) {
                .testimonial-sec.time-matter-common-padding {
                    padding-bottom: 60px;
                }

                footer.footer-sec {
                    padding-top: 60px;
                }
            }

            @media (max-width: 767px) {
                .testimonial-sec.time-matter-common-padding {
                    padding-bottom: 45px;
                }

                footer.footer-sec {
                    padding-top: 50px;
                }
            }
        </style>
    <?php endif; ?>

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
    <script src="<?php echo e(asset('js/parsley/parsley.min.js')); ?>"></script>

   
     


    <!-- ==================== desktop/mobile Navigation Script ====================== -->
    <script>
        $(window).on('beforeunload', function () {
            // Remove active class from the section on the first page
            $('.mobile-header-menu').removeClass('show');
        });




        // navigation

        $('.navbar-toggler').on('click', function () {
            if ($('.mobile-header-menu').hasClass("show")) {
                $('.mobile-header-menu').removeClass('show');
            } else {
                $('.mobile-header-menu').addClass('show');
            }
        });


        $(document).on('click', '.mobile-close-icon-new', function () {
            $('.header-menu.mobile-header-menu.show').removeClass('show');
            $('.sub-menu.active').removeClass('active');
        });


        (function ($) {
            document.addEventListener('DOMContentLoaded', function () {

                const dropItems = document.querySelectorAll('.mobile-navigation-menu li.mobile-drop-list');

                dropItems.forEach(dropItem => {
                    const link = dropItem.querySelector(
                        'span'); // This targets your `<span>` that acts as a trigger
                    const subMenu = dropItem.querySelector('div.sub-menu'); // Direct sub-menu

                    if (link && subMenu) {

                        // Add click event on span to open submenu
                        link.addEventListener('click', function (e) {
                            e.preventDefault();
                            dropItem.classList.add('active');
                            subMenu.classList.add('active', 'active-sub');
                        });





                        // Insert Back button if not already present
                        if (!subMenu.querySelector('.nav-back-item')) {
                            const backItem = document.createElement('div');
                            backItem.classList.add('nav-item', 'nav-back-item');

                            // backItem.innerHTML = `<a class="nav-link nav-back-link" href="javascript:;">Back</a>`;
                            backItem.innerHTML =
                                `<div class="sub-header-inner">
            <a class="nav-link nav-back-link" href="javascript:;">Back</a>
            <div class="menu-toggle">
                
                <button class="navbar-toggler mobile-close-icon-new" type="button" aria-label="Close submenu">
                    <img src="<?php echo e(asset('front-assets/src/images/close-icon.svg')); ?>" alt="Close" width="25" height="25" class="close-icon" />
                </button>
            </div>
        </div>`;


                            subMenu.insertBefore(backItem, subMenu.firstChild);

                            // Back button behavior
                            const backBtn = backItem.querySelector('.nav-back-link');
                            backBtn.addEventListener('click', function (e) {
                                e.preventDefault();
                                subMenu.classList.remove('active', 'active-sub');
                                dropItem.classList.remove('active');
                            });

                            // problam to inner sub menu expand 
                            // Close button behavior
                            const closeBtn = backItem.querySelector('.mobile-close-icon-new');
                            closeBtn.addEventListener('click', function (e) {
                                e.preventDefault();
                                subMenu.classList.remove('active', 'active-sub');
                                dropItem.classList.remove('active');
                            });
                        }



                    }
                });

            });
        })(jQuery);





        $(document).ready(function () {
            // Ensure the mobile menu is hidden and all submenus are closed on page load
            if (window.location.href === window.location.origin) {
                // Set initial state to hidden for the mobile menu and submenus
                $('.mobile-header-menu').removeClass('show'); // Close the mobile menu
                $('.mobile-header-menu .sub-menu').removeClass('active active-sub'); // Close all submenus
            }

            // Toggle behavior for opening/closing the mobile menu
            $('.mobile-menu-toggle').on('click', function () {
                $('.mobile-header-menu').toggleClass('show');
            });

            // Handle page unload events to remove the class before leaving
            $(window).on('pagehide', function () {
                // Remove the 'show' class and close any open submenus when navigating away
                $('.mobile-header-menu').removeClass('show');
                $('.mobile-header-menu .sub-menu').removeClass('active active-sub');
            });

            // Reset mobile menu and submenus to closed state when the page reloads
            $(window).on('load', function () {
                $('.mobile-header-menu').removeClass('show'); // Ensures menu is closed after page reload
                $('.mobile-header-menu .sub-menu').removeClass(
                    'active active-sub'); // Ensures all submenus are closed
            });
        });
   </script>











    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                loadReCaptcha();

            }, 6000);
        });
        function loadReCaptcha() {
            if (!window.recaptchaLoaded) {  // Prevent multiple loads
                var head = document.getElementsByTagName('head')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://www.google.com/recaptcha/api.js';
                script.async = true;  // Load asynchronously
                script.defer = true;
                head.appendChild(script);
                window.recaptchaLoaded = true;  // Set flag to avoid reloading
            }
        }
    </script>
    <!-- Google reCAPTCHA v3 Script -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>"></script>
    <script>
        $('#ContactusForm').on('submit', function (event) {
            event.preventDefault();

            var form = $(this);

            // Validate form first
            if (!form.parsley().isValid()) {
                return;
                console.log('dscfsjd');
            }

            grecaptcha.ready(function () {
                grecaptcha.execute("<?php echo e(env('RECAPTCHA_SITE_KEY')); ?>", { action: 'contact' }).then(function (token) {

                    // Set token
                    $('#g-recaptcha-response').val(token);

                    // Submit form properly (native JS, no jQuery loop issue)
                    form.off('submit'); // remove this handler
                    form[0].submit();   // native submit (no redirect issue)
                });
            });
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            let lastScrollTop = 0;
            const $myHeader = $('#my-header');
            const scrollDelta = 15;
            const bannerHeight = 380; // hide after 380px
            let mobilenavslider = false;
            let isHidden = false;

            $myHeader.removeClass('headerHide');

            // Mobile menu open
            $('.mobile-header .navbar-toggler').on('click', function() {
                mobilenavslider = true;
                isHidden = false;
                $myHeader.removeClass('headerHide');
            });

            // Mobile menu close
            $('.mobile-close-icon-new').on('click', function() {
                mobilenavslider = false;
            });

            $(window).on('scroll', function() {
                if (mobilenavslider) return;

                const currentScroll = $(this).scrollTop();

                // Ignore small scrolls
                if (Math.abs(currentScroll - lastScrollTop) < scrollDelta) return;

                // Scroll down Ã¢â€ â€™ hide (only after 350px)
                if (currentScroll > lastScrollTop && currentScroll > bannerHeight) {
                    if (!isHidden) {
                        $myHeader.addClass('headerHide');
                        isHidden = true;
                    }
                }
                // Scroll up Ã¢â€ â€™ show
                else {
                    if (isHidden) {
                        $myHeader.removeClass('headerHide');
                        isHidden = false;
                    }
                }

                lastScrollTop = currentScroll;
            });
        });
    </script>
    <?php echo $__env->yieldContent('script'); ?>


</body>

</html><?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/layouts/index.blade.php ENDPATH**/ ?>