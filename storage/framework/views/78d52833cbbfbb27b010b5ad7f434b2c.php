<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="<?php echo e(route('dashboard')); ?>" class="b-brand">
                <span class="b-title">Time Master</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <!-- Dealer Sidebar Menu -->
                <?php if(auth()->user()->role == 'dealer' || auth()->user()->role == 'marketing'): ?>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu <?php echo e(\Request::route()->getName() == 'about.index' || \Request::route()->getName() == 'setting.index' || \Request::route()->getName() == 'setting.email.index' || \Request::route()->getName() == 'setting.homepage.index' || \Request::route()->getName() == 'sidebar.index' || \Request::route()->getName() == 'comment.index' || \Request::route()->getName() == 'setting.locationpage.index' ? 'pcoded-trigger active' : ''); ?>">
                        <a href="javascript:;" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Page
                                Settings</span></a>
                        <ul class="pcoded-submenu">
                            <li class="<?php echo e(\Request::route()->getName() == 'setting.index' ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('setting.index')); ?>" class="">Contact Page Settings</a></li>
                            <!-- <li class=""><a href="<?php echo e(route('setting.email.index')); ?>" class="">E-Mail Settings</a></li> -->
                            <li class="<?php echo e(\Request::route()->getName() == 'setting.homepage.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('setting.homepage.index')); ?>" class="">Home Page Settings</a>
                            </li>
                            <li class="<?php echo e(\Request::route()->getName() == 'about.index' ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('about.index')); ?>" class="">About Page Settings</a></li>
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'setting.locationpage.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('setting.locationpage.index')); ?>" class="">Location Page
                                    Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'articles.index' || \Request::route()->getName() == 'articles.add' || \Request::route()->getName() == 'articles.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('articles.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file"></i></span><span class="pcoded-mtext">Blogs</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'gallery.index' || \Request::route()->getName() == 'gallery.add' || \Request::route()->getName() == 'gallery.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('gallery.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-film"></i></span><span class="pcoded-mtext">Gallery</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'inquiry.index' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('inquiry.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Inquiry
                                (Leads)</span></a>
                    </li>
                    <!-- Admin Sidebar Menu -->
                <?php else: ?>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>


                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'media.index' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('media.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-camera"></i></span><span class="pcoded-mtext">Media</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'articles.index' || \Request::route()->getName() == 'articles.add' || \Request::route()->getName() == 'articles.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('articles.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file"></i></span><span class="pcoded-mtext">Blogs</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'pages.index' || \Request::route()->getName() == 'pages.add' || \Request::route()->getName() == 'pages.edit' || \Request::route()->getName() == 'pages.builder' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('pages.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-minus"></i></span><span
                                class="pcoded-mtext">Pages</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'collection.index' || \Request::route()->getName() == 'collection.add' || \Request::route()->getName() == 'collection.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('collection.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-aperture"></i></span><span
                                class="pcoded-mtext">Collection</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'garage-doors.index' || \Request::route()->getName() == 'garage-doors.add' || \Request::route()->getName() == 'garage-doors.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('garage-doors.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-menu"></i></span><span class="pcoded-mtext">Garage
                                Doors</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'garage-services.index' || \Request::route()->getName() == 'garage-services.add' || \Request::route()->getName() == 'garage-services.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('garage-services.index')); ?>" class="nav-link "><span
                                class="pcoded-micon"><i class="feather icon-map"></i></span><span
                                class="pcoded-mtext">Garage Services</span></a>
                    </li>

                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'faqs.index' || \Request::route()->getName() == 'faqs.add' || \Request::route()->getName() == 'faqs.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('faqs.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span class="pcoded-mtext">Faqs</span></a>
                    </li>

                    <!-- <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item <?php echo e(\Request::route()->getName() == 'location.index' || \Request::route()->getName() == 'location.add' || \Request::route()->getName() == 'location.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('location.index')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Location</span></a>
                    </li> -->

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'client-logo.index' || \Request::route()->getName() == 'client-logo.add' || \Request::route()->getName() == 'client-logo.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('client-logo.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-image"></i></span><span class="pcoded-mtext">Client
                                Logo</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'testimonials.index' || \Request::route()->getName() == 'testimonials.add' || \Request::route()->getName() == 'testimonials.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('testimonials.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-bookmark"></i></span><span
                                class="pcoded-mtext">Testimonial</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'gallery.index' || \Request::route()->getName() == 'gallery.add' || \Request::route()->getName() == 'gallery.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('gallery.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-film"></i></span><span class="pcoded-mtext">Gallery</span></a>
                    </li>

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu <?php echo e(\Request::route()->getName() == 'about.index' || \Request::route()->getName() == 'setting.index' || \Request::route()->getName() == 'setting.email.index' || \Request::route()->getName() == 'setting.homepage.index' || \Request::route()->getName() == 'sidebar.index' || \Request::route()->getName() == 'comment.index' || \Request::route()->getName() == 'setting.locationpage.index' ? 'pcoded-trigger active' : ''); ?>">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Page
                                Settings</span></a>
                        <ul class="pcoded-submenu">
                            <li class="<?php echo e(\Request::route()->getName() == 'setting.index' ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('setting.index')); ?>" class="">Contact Page Settings</a></li>
                            <!-- <li class=""><a href="<?php echo e(route('setting.email.index')); ?>" class="">E-Mail Settings</a></li> -->
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'setting.homepage.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('setting.homepage.index')); ?>" class="">Home Page Settings</a>
                            </li>
                            <li class="<?php echo e(\Request::route()->getName() == 'about.index' ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('about.index')); ?>" class="">About Page Settings</a></li>
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'setting.locationpage.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('setting.locationpage.index')); ?>" class="">Location Page
                                    Settings</a>
                            </li>
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'loadingdock.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('loadingdock.index')); ?>" class="">Loading Dock Door Page
                                    Settings</a>
                            </li>
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'hollowmetal.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('hollowmetal.index')); ?>" class="">Hollw Matal Door Page
                                    Settings</a>
                            </li>
                            <li
                                class="<?php echo e(\Request::route()->getName() == 'servicearea.index' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('servicearea.index')); ?>" class="">Service Area  Page
                                    Settings</a>
                            </li>
                        </ul>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'menu.index' || \Request::route()->getName() == 'menu.add' || \Request::route()->getName() == 'menu.edit' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('menu.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-menu"></i></span><span class="pcoded-mtext">Menu</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item <?php echo e(\Request::route()->getName() == 'inquiry.index' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('inquiry.index')); ?>" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Inquiry
                                (Leads)</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/layouts/backend/sidebar.blade.php ENDPATH**/ ?>