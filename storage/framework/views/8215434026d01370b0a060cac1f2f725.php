<header class="my-header header" id="my-header">
    <div class="container-md">
        <div class="row align-items-center desktop-header">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 right-side-logo">
                <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo">
                    <?php if(isset($setting->site_logo) && $setting->site_logo != '' && $setting->site_logo != null): ?>
                        <?php
                            $header_image_name = App\Models\MediaImage::where('id', $setting->site_logo)->first();
                            if (isset($header_image_name) && $header_image_name != null) {
                                $h_path = asset('uploads/' . $header_image_name->name);
                            } else {
                                $h_path = asset('front-assets/images/header-logo.webp');
                            }
                        ?>
                        <img src="<?php echo e($h_path); ?>" width="312" height="70" class="img-fluid"
                            alt="Header Logo Image">
                    <?php else: ?>
                        <img src="<?php echo e(asset('front-assets/images/header-logo.webp')); ?>" class="img-fluid header-logo-img"
                            alt="Header Logo Image" height="60" width="272">
                    <?php endif; ?>
                    <!-- <img src="<?php echo e(asset('front-assets/src/images/Time-matters-header-logo.webp')); ?>" alt="" width="312" height="70" class="img-fluid"> -->
                </a>

            </div>

            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 header-menu">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('about.us')); ?>/">About</a></li>
                    <li class="drop-down-menu">
                        <a href="#">Services</a>
                        <ul class="sub-menu">
                            <li><a href="https://hamzahk15.sg-host.com/service/vendor-management-solutions/">Vendor
                                    Management Solutions</a></li>
                            <li><a href="https://hamzahk15.sg-host.com/service/the-right-resources-one-call-away/">Qualified
                                    Resources on Demand</a></li>
                            <li><a
                                    href="https://hamzahk15.sg-host.com/service/payrolling-independent-contractor-management/">Payrolling
                                    & Independent Contractor Management</a></li>
                            <li><a href="https://hamzahk15.sg-host.com/service/vendor-management-solution/">Vendor
                                    Management Solutions Advisory</a></li>
                        </ul>
                    </li>
                    <li><a href="">Member Access</a></li>
                    <li><a href="#">Resources</a></li>
                </ul>

            </div>

            <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12 left-side-btn">
                <a href="<?php echo e(route('contact')); ?>/" class="header-btn">Contact</a>
            </div>


        </div>


        <div class="mobile-header">
            <div class="row mobile-header">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mobile-col">
                    <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo">
                        <!-- <img src="<?php echo e(asset('front-assets/src/images/Time-matters-header-logo.webp')); ?>" alt="" width="320" height="60" class="img-fluid header-logo" loading="lazy"/> -->
                        <?php if(isset($setting->site_logo) && $setting->site_logo != '' && $setting->site_logo != null): ?>
                            <?php
                                $header_image_name = App\Models\MediaImage::where('id', $setting->site_logo)->first();
                                if (isset($header_image_name) && $header_image_name != null) {
                                    $h_path = asset('uploads/' . $header_image_name->name);
                                } else {
                                    $h_path = asset('front-assets/images/header-logo.webp');
                                }
                            ?>
                            <img src="<?php echo e($h_path); ?>" alt="" width="320" height="60"
                                class="img-fluid header-logo" loading="lazy" />
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/Time-matters-header-logo.webp')); ?>"
                                alt="" width="320" height="60" class="img-fluid header-logo"
                                loading="lazy" />
                        <?php endif; ?>
                    </a>

                    <div class="mobile-toggle-sec">
                        <div class="menu-toggle">
                            <?php if(isset($setting->contact_no)): ?>
                                <?php
                                    $phone = preg_replace('/\D/', '', $setting->contact_no);

                                    // Add country code (1 for Canada/US)
                                    $tel = '1' . $phone;
                                ?>

                                <a href="tel:<?php echo e($tel); ?>" aria-label="Call">
                                    <img src="<?php echo e(asset('front-assets/src/images/phone-call-icon.svg')); ?>"
                                        alt="" width="36" height="36" class="mobile-tel img-fluid" />
                                </a>
                            <?php else: ?>
                                <a href="tel:+14168633993" aria-label="Call">
                                    <img src="<?php echo e(asset('front-assets/src/images/phone-call-icon.svg')); ?>"
                                        alt="" width="36" height="36" class="mobile-tel img-fluid" />
                                </a>
                            <?php endif; ?>
                            <button class="navbar-toggler" type="button" aria-label="nav-open-button">
                                <img src="<?php echo e(asset('front-assets/src/images/toggler_new.svg')); ?>"
                                    alt="Header Logo Image" width="34" height="34" class="open-icon img-fluid" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header-menu mobile-header-menu">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mobile-col">
                        <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo" class="logo"> <img
                                src="<?php echo e(asset('front-assets/src/images/Time-matters-header-logo.webp')); ?>"
                                alt="" width="180" height="40" class="img-fluid brand-logo-mobile"
                                loading="lazy" /></a>

                        <div class="mobile-toggle-sec">
                            <div class="menu-toggle">
                                <?php if(isset($setting->contact_no)): ?>
                                    <?php
                                        $phone = preg_replace('/\D/', '', $setting->contact_no);

                                        // Add country code (1 for Canada/US)
                                        $tel = '1' . $phone;
                                    ?>

                                    <a href="tel:<?php echo e($tel); ?>" aria-label="Call">
                                        <img src="<?php echo e(asset('front-assets/src/images/phone-call-icon.svg')); ?>"
                                            alt="" width="36" height="36"
                                            class="mobile-tel img-fluid" />
                                    </a>
                                <?php else: ?>
                                    <a href="tel:+14168633993" aria-label="Call">
                                        <img src="<?php echo e(asset('front-assets/src/images/phone-call-icon.svg')); ?>"
                                            alt="" width="36" height="36"
                                            class="mobile-tel img-fluid" />
                                    </a>
                                <?php endif; ?>
                                <button class="navbar-toggler mobile-close-icon-new" type="button"
                                    aria-label="nav-open-button">
                                    <img src="<?php echo e(asset('front-assets/src/images/close-icon.svg')); ?>" alt=""
                                        width="20" height="20" class="close-icon img-fluid" />
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-navigation-menu">
                        <ul>
                            <li><a class="" href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li><a href="<?php echo e(route('about.us')); ?>/">About</a></li>

                            <li class="mobile-drop-list">
                                <span><a href="#">Services</a></span>
                                <div class="sub-menu main-submenu">
                                    <ul class="main-inner-sub-menu">
                                        <li class="menu-title-tag"><a href="">Services</a></li>
                                        <li><a
                                                href="https://hamzahk15.sg-host.com/service/vendor-management-solutions/">Vendor
                                                Management Solutions</a></li>
                                        <li><a
                                                href="https://hamzahk15.sg-host.com/service/the-right-resources-one-call-away/">Qualified
                                                Resources on Demand</a></li>
                                        <li><a
                                                href="https://hamzahk15.sg-host.com/service/payrolling-independent-contractor-management/">Payrolling
                                                and Independent Contractor Management</a></li>
                                        <li><a
                                                href="https://hamzahk15.sg-host.com/service/vendor-management-solution/">Vendor
                                                Management Solutions Advisory</a></li>
                                        <!-- <li><a href="">Access to Top Talent</a></li> -->
                                    </ul>

                                </div>
                            </li>


                            <li><a href="">Member Access</a></li>
                            <li><a href="">Resources</a></li>
                        </ul>
                        <div class="mobile-btn-nav header-btn">
                            <a href="<?php echo e(route('contact')); ?>/">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    let lastScrollTop = 0;
    const header = document.getElementById('my-header');

    window.addEventListener('scroll', () => {
        let currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Scroll down → hide (only after some scroll)
        if (currentScrollTop > lastScrollTop && currentScrollTop > 100) {
            header.classList.add('hide-header');
        }
        // Scroll up → show
        else {
            header.classList.remove('hide-header');
        }

        lastScrollTop = currentScrollTop;
    });
</script>
<?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>