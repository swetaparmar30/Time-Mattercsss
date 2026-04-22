    <?php
$setting = App\Models\Setting::first();

$menus_company = App\Models\Menu::where('footre_quick_links', 1)->get();
if (isset($menus_company) && $menus_company != '' && count($menus_company)) {
    $menu_lists_services = [];
    foreach ($menus_company as $menus_company_item) {
        $menu_lists_services[] = App\Models\Menu_list::with('children')->whereNull('parent_id')->where('menus_id', $menus_company_item->id)->get();
    }
}
$menus_residential = App\Models\Menu::where('residential', 1)->get();
if (isset($menus_residential) && $menus_residential != '' && count($menus_residential)) {
    $menu_lists_residential = [];
    foreach ($menus_residential as $menus_residential_item) {
        $menu_lists_residential[] = App\Models\Menu_list::with('children')->whereNull('parent_id')->where('menus_id', $menus_residential_item->id)->get();
    }
}

$menus_commercial = App\Models\Menu::where('commercial', 1)->get();
if (isset($menus_commercial) && $menus_commercial != '' && count($menus_commercial)) {
    $menu_lists_commercial = [];
    foreach ($menus_commercial as $menus_commercial_item) {
        $menu_lists_commercial[] = App\Models\Menu_list::with('children')->whereNull('parent_id')->where('menus_id', $menus_commercial_item->id)->get();
    }
}
?>
    <Footer class="footer-sec">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12 quick-links">
                    <h3>Quick Links</h3>
                    <?php if(isset($menu_lists_services) && count($menu_lists_services)): ?>
                        <ul>
                            <?php $__currentLoopData = $menu_lists_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicesLinks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $servicesLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu_links_services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   
                                    <li><a href="<?php echo e($menu_links_services->slug); ?>"><?php echo e($menu_links_services->name); ?></a></li>
                                       
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 service-link">
                    <h3>Services</h3>
                    <?php if(isset($menu_lists_residential) && count($menu_lists_residential)): ?>
                     <ul>

                        <?php $__currentLoopData = $menu_lists_residential; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reslinks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- <?php
                            $limitedMenu = collect($reslinks)->flatten()->take(9);
                        ?> -->
                             <?php $__currentLoopData = $reslinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resmenu_links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($resmenu_links->slug); ?>"><?php echo e($resmenu_links->name); ?></a></li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                     <?php endif; ?>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12 member-access">
                    <h3>Member Access</h3>
                     <?php if(isset($menu_lists_commercial) && count($menu_lists_commercial)): ?>
                     <ul>
                        <?php $__currentLoopData = $menu_lists_commercial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comlinks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--  <?php
                            $comlimitedMenu = collect($comlinks)->flatten()->take(9);
                        ?> -->
                             <?php $__currentLoopData = $comlinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $commenu_links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($commenu_links->slug); ?>"><?php echo e($commenu_links->name); ?></a></li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                     <?php endif; ?>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12 col-12  contact-link">
                    <h3>Contact</h3>
                    <ul>
                        <?php if(isset($setting->location)): ?>
                        <li class="address"><?php echo $setting->location; ?></li>
                        <?php endif; ?>
                        <!-- <li class="address">200 Consumers Rd<br>
                            North York, ON M2J 4R4<br>
                            Canada</li> -->
                        <?php if(isset($setting->contact_no)): ?>
                            <?php
                                $phone = preg_replace('/\D/', '', $setting->contact_no);

                                // Add country code (1 for Canada/US)
                                $tel = '1' . $phone;
                            ?>

                            <li class="call"><a href="tel:<?php echo e($tel); ?>">+1 <?php echo e($setting->contact_no); ?></a></li>
                        <?php else: ?>
                            <li class="call"><a href="tel:+14168633993">+1 416-863-3993</a></li>
                        <?php endif; ?>


                        <?php if(isset($setting->email)): ?>
                            <li class="mail"><a href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a></li>
                        <?php endif; ?>
                        <!-- <li class="mail"><a href="mailto:info@timemattersinc.com">info@timemattersinc.com</a></li> -->

                    </ul>
                    <div class="icon-sec">
                        <?php if(isset($setting->linked_url) && $setting->linked_url !=null): ?>
                        <a href="<?php echo e($setting->linked_url); ?>" target="_blank">
                        <img src="<?php echo e(asset('front-assets/src/images/linkdin-circle-icon.webp' )); ?>" alt="" width="44" height="44" class="img-fluid"></a>
                        <?php endif; ?>
                        <?php if(isset($setting->google_url) && $setting->google_url !=null): ?>
                            <a href="<?php echo e($setting->google_url); ?>" target="_blank">
                            <img src="<?php echo e(asset('front-assets/src/images/location-circle-icon.webp' )); ?>" alt="" width="44" height="44" class="img-fluid"></a>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 iframe-sec">
                    <!-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.002316587617!2d-79.33368002334278!3d43.772810744685756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4d25937d014cf%3A0x94ca935d1687eab3!2s200%20Consumers%20Rd%20%23809%2C%20North%20York%2C%20ON%20M2J%204R4!5e0!3m2!1sen!2sca!4v1775136700992!5m2!1sen!2sca"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <?php echo $setting->map_link; ?>

                </div>

                <div class="col-12 footer-logo text-center">
                    <img src="<?php echo e(asset('front-assets/src/images/time-matters-footer-logo.webp' )); ?>" alt="" width="322" height="80"
                        class="img-fluid" loading="lazy">
                </div>
            </div>
        </div>
    </Footer>


    <section class="copy-right-sec">
        <div class="container-md">
            <div class="row">
                <?php if(isset($setting->copyright)): ?>
                <?php echo ($setting->copyright); ?>

                <?php else: ?>
                <p>© 2026 TimeMatters Inc. <span>|</span><a href="">Sitemap</a><span>|</span> <a href="">Privacy Policy</a></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php /**PATH C:\laragon\www\Time-Mattercsss\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>