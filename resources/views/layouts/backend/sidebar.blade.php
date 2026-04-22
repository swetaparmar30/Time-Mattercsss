<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('dashboard') }}" class="b-brand">
                <span class="b-title">TimeMatters Inc.</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <!-- Dealer Sidebar Menu -->
                @if (auth()->user()->role == 'dealer')
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu {{ \Request::route()->getName() == 'about.index' || \Request::route()->getName() == 'setting.index' || \Request::route()->getName() == 'setting.email.index' || \Request::route()->getName() == 'setting.homepage.index' || \Request::route()->getName() == 'sidebar.index' || \Request::route()->getName() == 'comment.index' || \Request::route()->getName() == 'setting.locationpage.index' ? 'pcoded-trigger active' : '' }}">
                        <a href="javascript:;" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Page
                                Settings</span></a>
                        <ul class="pcoded-submenu">
                            <li class="{{ \Request::route()->getName() == 'setting.index' ? 'active' : '' }}"><a
                                    href="{{ route('setting.index') }}" class="">Contact Page Settings</a></li>
                            <li class="{{ \Request::route()->getName() == 'setting.homepage.index' ? 'active' : '' }}">
                                <a href="{{ route('setting.homepage.index') }}" class="">Home Page Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'about.index' ? 'active' : '' }}"><a
                                    href="{{ route('about.index') }}" class="">About Page Settings</a></li>
                           
                        </ul>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'articles.index' || \Request::route()->getName() == 'articles.add' || \Request::route()->getName() == 'articles.edit' ? 'active' : '' }}">
                        <a href="{{ route('articles.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file"></i></span><span class="pcoded-mtext">Blogs</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'gallery.index' || \Request::route()->getName() == 'gallery.add' || \Request::route()->getName() == 'gallery.edit' ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-film"></i></span><span class="pcoded-mtext">Gallery</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'inquiry.index' ? 'active' : '' }}">
                        <a href="{{ route('inquiry.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Inquiry
                                (Leads)</span></a>
                    </li>

                    {{-- Marketing  --}}
                @elseif (auth()->user()->role == 'marketing')
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'media.index' ? 'active' : '' }}">
                        <a href="{{ route('media.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-camera"></i></span><span class="pcoded-mtext">Media</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'categories' ? 'active' : '' }}">
                        <a href="{{ route('categories') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-camera"></i></span><span
                                class="pcoded-mtext">Categories</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'articles.index' || \Request::route()->getName() == 'articles.add' || \Request::route()->getName() == 'articles.edit' ? 'active' : '' }}">
                        <a href="{{ route('articles.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file"></i></span><span class="pcoded-mtext">Blogs</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'pages.index' || \Request::route()->getName() == 'pages.add' || \Request::route()->getName() == 'pages.edit' || \Request::route()->getName() == 'pages.builder' ? 'active' : '' }}">
                        <a href="{{ route('pages.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-minus"></i></span><span
                                class="pcoded-mtext">Pages</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'garage-doors.index' || \Request::route()->getName() == 'garage-doors.add' || \Request::route()->getName() == 'garage-doors.edit' ? 'active' : '' }}">
                        <a href="{{ route('garage-doors.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-menu"></i></span><span class="pcoded-mtext">Garage
                                Doors</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'garage-services.index' || \Request::route()->getName() == 'garage-services.add' || \Request::route()->getName() == 'garage-services.edit' ? 'active' : '' }}">
                        <a href="{{ route('garage-services.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-map"></i></span><span class="pcoded-mtext">Garage
                                Services</span></a>
                    </li>

                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item {{ \Request::route()->getName() == 'faqs.index' || \Request::route()->getName() == 'faqs.add' || \Request::route()->getName() == 'faqs.edit' ? 'active' : '' }}">
                        <a href="{{ route('faqs.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span class="pcoded-mtext">Faqs</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'gallery.index' || \Request::route()->getName() == 'gallery.add' || \Request::route()->getName() == 'gallery.edit' ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-film"></i></span><span class="pcoded-mtext">Gallery</span></a>
                    </li>

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu {{ \Request::route()->getName() == 'about.index' || \Request::route()->getName() == 'setting.index' || \Request::route()->getName() == 'setting.email.index' || \Request::route()->getName() == 'setting.homepage.index' || \Request::route()->getName() == 'sidebar.index' || \Request::route()->getName() == 'comment.index' || \Request::route()->getName() == 'setting.locationpage.index' ? 'pcoded-trigger active' : '' }}">
                        <a href="javascript:;" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Page
                                Settings</span></a>
                        <ul class="pcoded-submenu">
                            <li class="{{ \Request::route()->getName() == 'setting.index' ? 'active' : '' }}"><a
                                    href="{{ route('setting.index') }}" class="">Contact Page Settings</a></li>
                            <li
                                class="{{ \Request::route()->getName() == 'setting.homepage.index' ? 'active' : '' }}">
                                <a href="{{ route('setting.homepage.index') }}" class="">Home Page Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'about.index' ? 'active' : '' }}"><a
                                    href="{{ route('about.index') }}" class="">About Page Settings</a></li>
                            <li
                                class="{{ \Request::route()->getName() == 'setting.locationpage.index' ? 'active' : '' }}">
                                <a href="{{ route('setting.locationpage.index') }}" class="">Location Page
                                    Settings</a>
                            </li>


                            <li class="{{ \Request::route()->getName() == 'loadingdock.index' ? 'active' : '' }}">
                                <a href="{{ route('loadingdock.index') }}" class="">Loading Dock Door Page
                                    Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'hollowmetal.index' ? 'active' : '' }}">
                                <a href="{{ route('hollowmetal.index') }}" class="">Hollw Matal Door Page
                                    Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'servicearea.index' ? 'active' : '' }}">
                                <a href="{{ route('servicearea.index') }}" class="">Service Area Page
                                    Settings</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'sitemapsetting.index' ? 'active' : '' }}">
                        <a href="{{ route('sitemapsetting.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span
                                class="pcoded-mtext">Site Map Settings</span></a> --}}

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'inquiry.index' ? 'active' : '' }}">
                        <a href="{{ route('inquiry.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Inquiry
                                (Leads)</span></a>
                    </li>


                    {{-- Admin Bar --}}
                @else
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span
                                class="pcoded-mtext">Dashboard</span></a>
                    </li>


                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'media.index' ? 'active' : '' }}">
                        <a href="{{ route('media.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-camera"></i></span><span class="pcoded-mtext">Media</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'categories' ? 'active' : '' }}">
                        <a href="{{ route('categories') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-camera"></i></span><span
                                class="pcoded-mtext">Categories</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'articles.index' || \Request::route()->getName() == 'articles.add' || \Request::route()->getName() == 'articles.edit' ? 'active' : '' }}">
                        <a href="{{ route('articles.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file"></i></span><span class="pcoded-mtext">Blogs</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'pages.index' || \Request::route()->getName() == 'pages.add' || \Request::route()->getName() == 'pages.edit' || \Request::route()->getName() == 'pages.builder' ? 'active' : '' }}">
                        <a href="{{ route('pages.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-minus"></i></span><span
                                class="pcoded-mtext">Pages</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'collection.index' || \Request::route()->getName() == 'collection.add' || \Request::route()->getName() == 'collection.edit' ? 'active' : '' }}">
                        <a href="{{ route('collection.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-aperture"></i></span><span
                                class="pcoded-mtext">Collection</span></a>
                    </li>
                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'garage-doors.index' || \Request::route()->getName() == 'garage-doors.add' || \Request::route()->getName() == 'garage-doors.edit' ? 'active' : '' }}">
                        <a href="{{ route('garage-doors.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-menu"></i></span><span class="pcoded-mtext">Garage
                                Doors</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'garage-services.index' || \Request::route()->getName() == 'garage-services.add' || \Request::route()->getName() == 'garage-services.edit' ? 'active' : '' }}">
                        <a href="{{ route('garage-services.index') }}" class="nav-link "><span
                                class="pcoded-micon"><i class="feather icon-map"></i></span><span
                                class="pcoded-mtext">Garage Services</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'timeservice.index' || \Request::route()->getName() == 'timeservice.add' || \Request::route()->getName() == 'timeservice.edit' ? 'active' : '' }}">
                        <a href="{{ route('timeservice.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                     class="feather icon-clock"></i></span><span class="pcoded-mtext">Time Service</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'role-category.index' || \Request::route()->getName() == 'role-category.add' || \Request::route()->getName() == 'role-category.edit' ? 'active' : '' }}">
                        <a href="{{ route('role-category.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                     class="feather icon-clock"></i></span><span class="pcoded-mtext">Role Category</span></a>
                    </li>
                    
                     <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'centralfile.index' || \Request::route()->getName() == 'centralfile.add' || \Request::route()->getName() == 'centralfile.edit' ? 'active' : '' }}">
                        <a href="{{ route('centralfile.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                     class="feather icon-file"></i></span><span class="pcoded-mtext">Central Files</span></a>
                    </li>
                        
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item {{ \Request::route()->getName() == 'faqs.index' || \Request::route()->getName() == 'faqs.add' || \Request::route()->getName() == 'faqs.edit' ? 'active' : '' }}">
                        <a href="{{ route('faqs.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span class="pcoded-mtext">Faqs</span></a>
                    </li>



                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'client-logo.index' || \Request::route()->getName() == 'client-logo.add' || \Request::route()->getName() == 'client-logo.edit' ? 'active' : '' }}">
                        <a href="{{ route('client-logo.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-image"></i></span><span class="pcoded-mtext">Client
                                Logo</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'testimonials.index' || \Request::route()->getName() == 'testimonials.add' || \Request::route()->getName() == 'testimonials.edit' ? 'active' : '' }}">
                        <a href="{{ route('testimonials.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-bookmark"></i></span><span
                                class="pcoded-mtext">Testimonial</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'gallery.index' || \Request::route()->getName() == 'gallery.add' || \Request::route()->getName() == 'gallery.edit' ? 'active' : '' }}">
                        <a href="{{ route('gallery.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-film"></i></span><span class="pcoded-mtext">Gallery</span></a>
                    </li>

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu {{ \Request::route()->getName() == 'about.index' || \Request::route()->getName() == 'setting.index' || \Request::route()->getName() == 'setting.email.index' || \Request::route()->getName() == 'setting.homepage.index' || \Request::route()->getName() == 'sidebar.index' || \Request::route()->getName() == 'comment.index' || \Request::route()->getName() == 'setting.locationpage.index' ? 'pcoded-trigger active' : '' }}">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Page
                                Settings</span></a>
                        <ul class="pcoded-submenu">
                            <li class="{{ \Request::route()->getName() == 'setting.index' ? 'active' : '' }}"><a
                                    href="{{ route('setting.index') }}" class="">Contact Page Settings</a></li>
                            <li
                                class="{{ \Request::route()->getName() == 'setting.homepage.index' ? 'active' : '' }}">
                                <a href="{{ route('setting.homepage.index') }}" class="">Home Page Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'about.index' ? 'active' : '' }}"><a
                                    href="{{ route('about.index') }}" class="">About Page Settings</a></li>
                            <li
                                class="{{ \Request::route()->getName() == 'setting.locationpage.index' ? 'active' : '' }}">
                                <a href="{{ route('setting.locationpage.index') }}" class="">Location Page
                                    Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'loadingdock.index' ? 'active' : '' }}">
                                <a href="{{ route('loadingdock.index') }}" class="">Loading Dock Door Page
                                    Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'hollowmetal.index' ? 'active' : '' }}">
                                <a href="{{ route('hollowmetal.index') }}" class="">Hollw Matal Door Page
                                    Settings</a>
                            </li>
                            <li class="{{ \Request::route()->getName() == 'servicearea.index' ? 'active' : '' }}">
                                <a href="{{ route('servicearea.index') }}" class="">Service Area Page
                                    Settings</a>
                            </li>
                        </ul>
                    </li>

                     <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'sitemapsetting.index' ? 'active' : '' }}">
                        <a href="{{ route('sitemapsetting.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span
                                class="pcoded-mtext">Site Map Settings</span></a> 

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'menu.index' || \Request::route()->getName() == 'menu.add' || \Request::route()->getName() == 'menu.edit' ? 'active' : '' }}">
                        <a href="{{ route('menu.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-menu"></i></span><span class="pcoded-mtext">Menu</span></a>
                    </li>

                    <li data-username="dashboard"
                        class="nav-item {{ \Request::route()->getName() == 'inquiry.index' ? 'active' : '' }}">
                        <a href="{{ route('inquiry.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span class="pcoded-mtext">Inquiry
                                (Leads)</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
