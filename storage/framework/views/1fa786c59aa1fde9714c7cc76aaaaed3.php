<?php


 $setting = App\Models\Setting::first();
 $menus = App\Models\Menu::where('header_menu',1)->get();

 if (isset($menus) && $menus != ""&& count($menus)) {
      $menu_lists = [];
      foreach($menus as $menus_item){
         $menu_lists[] = App\Models\Menu_list::with('children')->whereNull('parent_id')->where('menus_id', $menus_item->id)->get();
      }
 }

?>


<style>
    #selectdoor{display: flex; align-items: center; justify-content: center;}
    #selectdoor .modal-dialog{margin: auto;padding: 0;justify-content: center;min-height: 100vh; min-width: 85%;}
    #selectdoor .modal-content{border-radius: 10px; border: 0;/*max-height: 100vh;*/margin-top: 25px;padding: 15px 0;overflow: hidden;}
    #selectdoor .header{box-shadow: unset !important;}
    #selectdoor .modal-body{padding: 20px 20px 40px 20px;}
    #selectdoor .row{padding: 0;}
    #selectdoor .modal-header{border-bottom: unset;}
    #selectdoor .each-product h3{font-size: 25px; line-height: 36px;}
    #selectdoor .each-product h4{font-size: 21px;line-height: 22px;margin-bottom: 15px;}
    #selectdoor .each-product .inner-content{border-right: unset;}
    #selectdoor .modal-header{padding: 40px 20px 20px;}
    #selectdoor .each-product ul{margin-bottom: 5px;}
    .select-door-popup .modal-header .btn-close {
        top: 10px;
        right:18px;
    }
</style>

<header class="header desk-header" id="myHeader">
      <div class="container-md">
            <div class="row">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 header-logo">
                     <?php if(isset($setting->site_logo) && $setting->site_logo != "" && $setting->site_logo != null): ?>
                        <?php
                           $header_image_name = App\Models\MediaImage::where('id' ,$setting->site_logo)->first();
                           if(isset($header_image_name) && $header_image_name != null)
                           {
                               $h_path = asset('uploads/' . $header_image_name->name);
                           }else{
                               $h_path = asset('front-assets/images/header-logo.webp');
                           }
                        ?>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo">
                           <img src="<?php echo e($h_path); ?>" class="img-fluid header-logo-img" alt="Header Logo Imgae" height="33" width="248"></a>
                     <?php else: ?>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo">
                           <img src="<?php echo e(asset('front-assets/images/header-logo.webp')); ?>" class="img-fluid header-logo-img" alt="Header Logo Imgae" height="33" width="248">
                        </a>
                     <?php endif; ?>

                    <div class="mobile-toggle-sec">
                        <div class="menu-toggle">
                            <a href="<?php echo e(isset($setting->contact_no) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no) : ''); ?>" class="tel mobile-tel1"><img
                                    src="<?php echo e(asset('front-assets/src/images/mobile-call-header.webp')); ?>" class="img-fluid" alt="Contact"></a>

                            <button class="navbar-toggler" type="button">
                                <img src="<?php echo e(asset('front-assets/src/images/mobile-open-bar.webp')); ?>" class="open-icon" height="47" width="47" alt="Open Menu">
                                <img src="<?php echo e(asset('front-assets/src/images/mobile-close-brown-icon.webp')); ?>" class="close-icon"
                                    style="display: none;" alt="Close Menu">

                            </button>
                        </div>
                    </div>
                </div>
               
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 header-menu header-new">
                    <div class="header-menu-mobile-desk">
                    <nav class="navigation">
                        <ul>
                                <li <?php if(Route::currentRouteName() == 'home'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('home')); ?>/">Home</a></li>
                            
                                <li <?php if((Route::currentRouteName() == 'get.residential.products' || Route::currentRouteName() == 'residential.product_detail' || Route::currentRouteName() == 'residential.products') && !request()->is('residential/openers') && !request()->is('residential/openers/*')): ?> class="dropdown active" <?php else: ?> class="dropdown" <?php endif; ?>>
                                    <a class="dropdown-a submenu" href="<?php echo e(route('get.residential.products')); ?>/">Residential</a>

                                    <ul class="dropdown-menu first-dropdown ">
                                        <?php if(count($residential_menus) > 0): ?>
                                            <?php $__currentLoopData = $residential_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($reskey == 'series'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a href="<?php echo e(route('get.residential.products')); ?>/" class="dropdown-sub-a sub-dropdown-arrow">Explore by Series</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class=" main-list-sec">
                                                            <li><a href="<?php echo e(route('get.residential.products')); ?>/" class="dropdown-a dropdown-sub-a">Explore by Series</a></li>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <li class="main-list-li"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'style'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class="dropdown-sub-a sub-dropdown-arrow" href="javascript:">Explore by Style</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class=" main-list-sec" >
                                                            <li><a class="dropdown-a dropdown-sub-a" href="javascript:">Explore by Style</a></li>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="main-list-li"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'insulation_type'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a href="javascript:" class="dropdown-sub-a sub-dropdown-arrow">Explore by Insulation Type</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class=" main-list-sec">
                                                            <li><a href="javascript:" class="dropdown-a dropdown-sub-a">Explore by Insulation Type</a></li>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="main-list-li"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'main'): ?>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(route('serviceAndRepair')); ?>/">Service and Repair</a>
                                        </li>
                                    </ul>

                                </li>

                                <li <?php if(Route::currentRouteName() == 'get.commercial.products' || Route::currentRouteName() == 'commercial.product_detail' || Route::currentRouteName() == 'commercial.products'): ?> class="dropdown active" <?php else: ?> class="dropdown" <?php endif; ?>>
                                    <a class="dropdown-a submenu" href="<?php echo e(route('get.commercial.products')); ?>/">Commercial</a>

                                    <ul class="dropdown-menu first-dropdown">
                                        
                                        <?php if(count($commercial_menus) > 0): ?>
                                            <?php $__currentLoopData = $commercial_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($reskey == 'door_type'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a href="<?php echo e(route('get.commercial.products')); ?>/" class="dropdown-sub-a sub-dropdown-arrow">Explore by Type</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="main-box main-list-sec">
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															
                                                            <?php
                                                             $prdctcat = $fval['products'];
                                                             $first = null;

                                                             if( $fval['slug'] == 'commercial-sectional-garage-doors'){
                                                                $first = isset($fval['subcategories'][0]) ? $fval['subcategories'][0] : null;
                                                                if(isset($first)){
                                                                    unset($fval['subcategories'][0]);
                                                                }
                                                             }
                                                             
                                                             $subcat = $fval['subcategories'];
                                                            ?>
                                                            <li class="main-list-li">
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/" <?php if(count($subcat) > 0 || count($prdctcat) > 0): ?> class="dropdown-a dropdown-sub-a"   <?php endif; ?>><?php echo e($fval['category']); ?></a>
                                                                <?php if(count($subcat) > 0 || count($prdctcat) > 0): ?>
                                                                <ul class="inner-four-sec main-list-inner-list">
                                                                    <?php if(isset($first)): ?>
                                                                        <li><a href="<?php echo e(route('commercial.products', [$first['slug']])); ?>/"><?php echo e($first['title']); ?></a></li>
                                                                    <?php endif; ?>
																	<?php if(count($prdctcat) > 0): ?>
																		<?php $__currentLoopData = $prdctcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss=>$vls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<li><a href="<?php echo e(route('commercial.product_detail', [$fval['slug'],$vls['product_slug']])); ?>/"><?php echo e($vls['list_title']); ?></a></li>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php endif; ?>
                                                                    <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s=>$vl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><a href="<?php echo e(route('commercial.products', [$vl['slug']])); ?>/"><?php echo e($vl['title']); ?></a></li> 
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'application'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a href="javascript:" class=" dropdown-sub-a sub-dropdown-arrow">Explore by Application</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class=" main-list-sec">
                                                            <li><a href="javascript:" class="dropdown-a dropdown-sub-a">Explore by Application</a></li>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                             $subcat = $fval['subcategories'];
                                                            ?>
                                                            <li class="main-list-li">
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                                
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'main'): ?>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            if($fval['slug'] == 'thermal-efficient-loading-dock-doors' || $fval['slug'] == 'secure-and-durable-loading-dock-doors'){
                                                                continue;
                                                            }
                                                        ?>
                                                            <li>
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        <li>
                                            <a href="<?php echo e(url('loading-dock')); ?>/">Loading Docks</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('commercial/hollow-metal-doors')); ?>/">Hollow Metal Doors</a>
                                        </li>
                                    </ul>
                                </li>

                                
                                <li <?php if(Route::currentRouteName() == 'dover.garagedoor' || Route::currentRouteName() == 'georgetown.garagedoor' || Route::currentRouteName() == 'salisbury.garagedoor' || Route::currentRouteName() == 'newport.garagedoor' || Route::currentRouteName() == 'serviceareas'): ?> class="dropdown active" <?php else: ?> class="dropdown" <?php endif; ?>>
                                    <a href="javascript:;" style="cursor: default;" class="dropdown-a submenu">Locations</a>

                                    <ul class="dropdown-menu first-dropdown">
                                    
                                        
                                
                                        <li>
                                            <a href="<?php echo e(url('locations/newport-garage-doors')); ?>/">Newport, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/dover-garage-doors')); ?>/">Dover, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/georgetown-garage-doors')); ?>/">Georgetown, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/salisbury-garage-doors')); ?>/">Salisbury, MD</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo e(url('service-areas')); ?>/">Service Areas</a>
                                        </li>
                                    
                                    </ul>
                                </li>
                             
                                

                                <!--<li <?php if(request()->is('residential/openers') || request()->is('residential/openers/*')): ?> class="dropdown active" <?php else: ?> class="dropdown" <?php endif; ?>>
                                    <a class="dropdown-a submenu" style=" cursor: default;">Openers </a>

                                    <?php if(isset($openers['main'])): ?>
                                        <?php if(count($openers['main']) > 0): ?>
                                        <ul class="dropdown-menu first-dropdown">
                                            <?php $__currentLoopData = $openers['main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php
                                                        $urls = strtolower($resmenu['parent']).'.products';
                                                    ?>
                                                    <a href="<?php echo e(route($urls, [$resmenu['slug']])); ?>"><?php echo e($resmenu['parent']); ?> <?php echo e($resmenu['category']); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>-->
                                <li <?php if(Route::currentRouteName() == 'about.us'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('about.us')); ?>/">About</a></li>
                                <li <?php if(Route::currentRouteName() == 'contact'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('contact')); ?>/">Contact</a></li>
                            </ul>
                            <a href="https://raynor.chameleonpower.com/?dealer=true&did=0027" target="_blank" class="header-design-center">Design Center</a>
    
                            <div class="mobile-btn">
                               <a href="https://raynor.chameleonpower.com/?dealer=true&did=0027" target="_blank" class="header-bottom-btn">Design Center</a>
                                <!-- <a href="tel:6623236381" class="header-bottom-btn">Call Now</a> -->
                            </div>
                        </nav>
                    </div>
                    
                </div>

                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 header-right-side">
                    <p>Call Now</p>
                    <a href="<?php echo e(isset($setting->contact_no) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no) : ''); ?>" class="tel"><?php echo e(isset($setting->contact_no) ? $setting->contact_no : ''); ?></a>
                </div>

            </div>
      </div>
</header>

<header class="header mobile-header" id="myHeader_mobile">
      <div class="container-md">
            <div class="row">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 header-logo">
                     <?php if(isset($setting->site_logo) && $setting->site_logo != "" && $setting->site_logo != null): ?>
                        <?php
                           $header_image_name = App\Models\MediaImage::where('id' ,$setting->site_logo)->first();
                           if(isset($header_image_name) && $header_image_name != null)
                           {
                               $h_path = asset('uploads/' . $header_image_name->name);
                           }else{
                               $h_path = asset('front-assets/images/header-logo.webp');
                           }
                        ?>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Header Logo">
                           <img src="<?php echo e($h_path); ?>" class="img-fluid header-logo-img" alt="Header Logo Imgae" height="93" width="93"></a>
                     <?php else: ?>
                        <a href="<?php echo e(route('home')); ?>">
                           <img src="<?php echo e(asset('front-assets/images/header-logo.webp')); ?>" class="img-fluid header-logo-img" alt="Header Logo Imgae" height="93" width="93">
                        </a>
                     <?php endif; ?>

                    <div class="mobile-toggle-sec">
                        <div class="menu-toggle">
                            <a href="<?php echo e(isset($setting->contact_no) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no) : ''); ?>" class="tel mobile-tel1"><img
                                    src="<?php echo e(asset('front-assets/src/images/mobile-call-header.svg')); ?>" class="img-fluid" height="47" width="47" alt="Contact"></a>

                            <button class="navbar-toggler" type="button">
                                <img src="<?php echo e(asset('front-assets/src/images/mobile-open-bar.webp')); ?>" class="open-icon" height="47" width="47" alt="Open Menu">
                                <img src="<?php echo e(asset('front-assets/src/images/mobile-close-brown-icon.webp')); ?>" class="close-icon"
                                    style="display: none;" alt="Close Menu">

                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 header-menu">
                    <div class="header-menu-mobile">
                        <div class="header-logo-and-close">
                            <a href="<?php echo e(route('home')); ?>" class="header-logo" aria-label="Header Logo"><img src="<?php echo e($h_path); ?>" alt="header logo" class="img-fluid" width="93" height="93"></a>
                            <div class="nav-right-sec">
                                    <a href="<?php echo e(isset($setting->contact_no) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no) : ''); ?>" class="tel mobile-tel1"><img
                                            src="<?php echo e(asset('front-assets/src/images/mobile-call-header.svg')); ?>" class="img-fluid" height="47" width="47" alt="Contact"></a>

                                    <img src="<?php echo e(asset('front-assets/src/images/mobile-close-brown-icon.webp')); ?>" alt="" class="mobile-close-icon-new" width="30" height="30">
                            </div>
                        </div>

                    <nav class="navigation">
                            <ul>
                                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <!-- <li><a href="<?php echo e(route('get.residential.products')); ?>">Residential</a></li>

                                        <?php if(count($residential_menus) > 0): ?>
                                            <?php $__currentLoopData = $residential_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($reskey == 'series'): ?>
                                                <li class="dropdown open-drop">
                                                    <a class="dropdown-a submenu"   >Explore by Series</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu first-dropdown "  >
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'style'): ?>
                                                <li class="dropdown open-drop">
                                                    <a class="dropdown-a submenu">Explore by Style</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu first-dropdown "  >
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'insulation_type'): ?>
                                                <li class="dropdown open-drop">
                                                    <a class="dropdown-a submenu">Explore by Insulation Type</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu first-dropdown " >
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'main'): ?>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="open-drop">
                                                                <a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?> -->

                                <!-- <li class="dropdown">
                                    <a class="dropdown-a submenu"    style=" cursor: default; ">Residential</a> -->
                                    <!-- <a href="">Residential</a> -->

                                    <!-- <ul class="dropdown-menu first-dropdown open-drop" >
                                        
                                        
                                    </ul>

                                </li> -->

                                <li class="dropdown">
                                    <a class="dropdown-a submenu" style=" cursor: default;" href="<?php echo e(route('get.residential.products')); ?>/">Residential</a>

                                    <ul class="dropdown-menu first-dropdown resfirst_menu" >
                                        <li><a href="<?php echo e(route('get.residential.products')); ?>/">Residential</a></li>
                                        
                                        <?php if(count($residential_menus) > 0): ?>
                                            <?php $__currentLoopData = $residential_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($reskey == 'series'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class="dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.residential.products')); ?>/">Explore by Series</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu" >
                                                         <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown sub-inner-dropdown"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'style'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class=" dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.residential.products')); ?>/">Explore by Style</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu" >
                                                         <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown sub-inner-dropdown"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>
                                                <?php if($reskey == 'insulation_type'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class=" dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.residential.products')); ?>/">Explore by Insulation Type</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu" >
                                                         <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown sub-inner-dropdown"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>
                                                <?php if($reskey == 'main'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class="dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.residential.products')); ?>/">Openers</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu">
                                                         <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="dropdown sub-inner-dropdown"><a href="<?php echo e(route('residential.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(route('serviceAndRepair')); ?>/">Service and Repair</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="dropdown">
                                    <a class="dropdown-a submenu" style="cursor: default;" href="<?php echo e(route('get.commercial.products')); ?>/">Commercial</a>

                                    <ul class="dropdown-menu first-dropdown comfirst_menu" >
                                        <li><a href="<?php echo e(route('get.commercial.products')); ?>">Commercial</a></li>
                                        
                                        <?php if(count($commercial_menus) > 0): ?>
                                            <?php $__currentLoopData = $commercial_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($reskey == 'door_type'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class="dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.commercial.products')); ?>/">Explore by Type</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu" >

                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <?php
                                                             $prdctcat = $fval['products'];
                                                             $first = isset($fval['subcategories'][0]) ? $fval['subcategories'][0] : null;
                                                             if(isset($first)){
                                                                unset($fval['subcategories'][0]);
                                                             }
                                                             $subcat = $fval['subcategories'];
                                                            ?>
                                                            <li class="dropdown sub-inner-dropdown">
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/" <?php if(count($subcat) > 0 || count($prdctcat) > 0): ?> class="dropdown-a dropdown-sub-a"  <?php endif; ?>><?php echo e($fval['category']); ?></a>
                                                                <?php if(count($subcat) > 0 || count($prdctcat) > 0): ?>
                                                                <ul class="dropdown-menu sub-inner-dropdown-menu">
                                                                    <?php if(isset($first)): ?>
                                                                        <li><a href="<?php echo e(route('commercial.products', [$first['slug']])); ?>/"><?php echo e($first['title']); ?></a></li>
                                                                    <?php endif; ?>
                                                                    <?php if(count($prdctcat) > 0): ?>
                                                                        <?php $__currentLoopData = $prdctcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss=>$vls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li><a href="<?php echo e(route('commercial.product_detail', [$fval['slug'],$vls['product_slug']])); ?>/"><?php echo e($vls['list_title']); ?></a></li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s=>$vl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><a href="<?php echo e(route('commercial.products', [$vl['slug']])); ?>/"><?php echo e($vl['title']); ?></a></li> 
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'application'): ?>
                                                <li class="dropdown sub-dropdown">
                                                    <a class=" dropdown-sub-a sub-dropdown-arrow" href="<?php echo e(route('get.commercial.products')); ?>/">Explore by Application</a>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <ul class="dropdown-menu sub-dropdown-menu">
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                             $subcat = $fval['subcategories'];
                                                            ?>
                                                            <li class="dropdown sub-inner-dropdown">
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                                
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endif; ?>

                                                <?php if($reskey == 'main'): ?>
                                                    <?php if(count($resmenu) > 0): ?>
                                                        <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($fval['slug'] == 'secure-and-durable-loading-dock-doors' || $fval['slug'] == 'thermal-efficient-loading-dock-doors'): ?>
                                                            <?php 
                                                                continue;
                                                            ?>
                                                        <?php endif; ?>
                                                            <li>
                                                                <a href="<?php echo e(route('commercial.products', [$fval['slug']])); ?>/"><?php echo e($fval['category']); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(url('loading-dock')); ?>/">Loading Docks</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('commercial/hollow-metal-doors')); ?>/">Hollow Metal Doors</a>
                                        </li>
                                    </ul>
                                </li>

                                


                                <li <?php if(Route::currentRouteName() == 'dover.garagedoor' || Route::currentRouteName() == 'georgetown.garagedoor' || Route::currentRouteName() == 'salisbury.garagedoor' || Route::currentRouteName() == 'newport.garagedoor' || Route::currentRouteName() == 'serviceareas'): ?> class="dropdown active" <?php else: ?> class="dropdown" <?php endif; ?>>
                                    <a class="dropdown-a submenu" href="javascript:;">Locations</a>
    
                                    <ul class="dropdown-menu first-dropdown">
                                        <li>
                                            <a href="<?php echo e(url('locations/newport-garage-doors')); ?>/">Newport, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/dover-garage-doors')); ?>/">Dover, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/georgetown-garage-doors')); ?>/">Georgetown, DE</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('locations/salisbury-garage-doors')); ?>/">Salisbury, MD</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(url('service-areas')); ?>/">Service Areas</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                






                                <!--<li class="dropdown">
                                    <a class="dropdown-a submenu" style=" cursor: default;">Openers</a>

                                    <?php if(isset($openers['main'])): ?>
                                        <?php if(count($openers['main']) > 0): ?>
                                        <ul class="dropdown-menu first-dropdown">
                                            <?php $__currentLoopData = $openers['main']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php
                                                        $urls = strtolower($resmenu['parent']).'.products';
                                                    ?>
                                                    <a href="<?php echo e(route($urls, [$resmenu['slug']])); ?>/"><?php echo e($resmenu['parent']); ?> <?php echo e($resmenu['category']); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </li>-->
                                
                                <li><a href="<?php echo e(route('about.us')); ?>/">About</a></li>
                                <li><a href="<?php echo e(route('contact')); ?>/">Contact</a></li>
                            </ul>
                            <a href="https://raynor.chameleonpower.com/?dealer=true&did=0027" target="_blank" class="header-design-center">Design Center</a>
    
                            <div class="mobile-btn">
                               <button data-bs-target="#getafreequote" data-bs-toggle="modal" class="header-bottom-btn quote-btn">Get A Free Quote</button>
                               <a href="https://raynor.chameleonpower.com/?dealer=true&did=0027" target="_blank" class="header-bottom-btn">Design Center</a>
                                <!-- <a href="tel:6623236381" class="header-bottom-btn">Call Now</a> -->
                            </div>
                        </nav>
                    </div>
                    
                </div>

                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 header-right-side">
                    <p>Call Now</p>
                    <a href="<?php echo e(isset($setting->contact_no) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no) : ''); ?>" class="tel"><?php echo e(isset($setting->contact_no) ? $setting->contact_no : ''); ?></a>
                </div>

            </div>
      </div>
</header>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>