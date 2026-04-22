            <div class="row landing-page">
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12 footer-content footer-second-sec">
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

                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12 footer-content footer-residential">
                     <h3>Residential</h3>
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

                  <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-6 col-sm-6 col-xs-12 footer-content footer-commercial">

                     <h3>Commercial</h3>
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
                  <?php if($showLocationAndMap): ?>
                  <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-content footer-location">
                     <h3>Location</h3>
                     <?php if($slug == 'newport-garage-doors'): ?>
                        <?php $mapLink = $setting->map_link ?? ''; ?>
                         <h4>Newport, Delaware</h4>
                          <ul>
                            <?php if(isset($setting->location) && $setting->location != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no2) && $setting->contact_no2 != ''): ?>
                                <li class="lc_c"><a
                                        href="<?php echo e(isset($setting->contact_no2) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no2) : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email) && $setting->email != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email)); ?>"><?php echo html_entity_decode($setting->email); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>

                    <?php elseif($slug == 'dover-garage-doors'): ?>
                        <?php $mapLink = $setting->map_link2 ?? ''; ?>
                        <h4>Dover, Delaware</h4>
                        <ul>
                            <?php if(isset($setting->location2) && $setting->location2 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location2); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no3) && $setting->contact_no3 != ''): ?>
                                <li class="lc_c"><a
                                        href="<?php echo e(isset($setting->contact_no3) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no3) : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email2) && $setting->email2 != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email2)); ?>"><?php echo html_entity_decode($setting->email2); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php elseif($slug == 'georgetown-garage-doors'): ?>
                        <?php $mapLink = $setting->map_link3 ?? ''; ?>
                        <h4>Georgetown, Delaware</h4>
                        <ul>
                            <?php if(isset($setting->location3) && $setting->location3 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location3); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no4) && $setting->contact_no4 != ''): ?>
                                <li class="lc_c"><a
                                        href="<?php echo e(isset($setting->contact_no4) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no4) : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email3) && $setting->email3 != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email3)); ?>"><?php echo html_entity_decode($setting->email3); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php elseif($slug == 'salisbury-garage-doors'): ?>
                        <?php $mapLink = $setting->map_link4 ?? ''; ?>
                        <h4>Salisbury, Maryland</h4>
                        <ul>
                            <?php if(isset($setting->location4) && $setting->location4 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location4); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no5) && $setting->contact_no5 != ''): ?>
                                <li class="lc_c"><a
                                        href="<?php echo e(isset($setting->contact_no5) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no5) : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email4) && $setting->email4 != ''): ?>
                                <li class="lc_e"><a
                                        href="mailto:<?php echo strip_tags(html_entity_decode($setting->email4)); ?>"><?php echo html_entity_decode($setting->email4); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(
                        isset($setting->google_url) && $setting->google_url != null ||
                        isset($setting->facebook_url) && $setting->facebook_url != null ||
                        isset($setting->insta_url) && $setting->insta_url != null ||
                        isset($setting->linked_url) && $setting->linked_url != null ||
                        isset($setting->twitter_url) && $setting->twitter_url != null ||
                        isset($setting->youtube_url) && $setting->youtube_url != null ||
                        isset($setting->dover_location_url) && $setting->dover_location_url != null ||
                        isset($setting->newport_location_url) && $setting->newport_location_url != null ||
                        isset($setting->pinterest_url) && $setting->pinterest_url != null
                    ): ?>
                    <div class="social desktop-social-sec landing-page">
                        <h3 class="connect-text">Connect With Us</h3>
                        <ul>
                            <?php if(isset($setting->google_url) && $setting->google_url != null): ?><li><a href="<?php echo e($setting->google_url); ?>" target="blank" title="Google"><img src="<?php echo e(asset('front-assets/src/images/google-black.webp')); ?>" alt="Google" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->facebook_url) && $setting->facebook_url != null): ?><li><a href="<?php echo e($setting->facebook_url); ?>" target="blank" title="Facebook"><img src="<?php echo e(asset('front-assets/src/images/new_facbook.svg')); ?>" alt="Facebook" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->insta_url) && $setting->insta_url != null): ?><li><a href="<?php echo e($setting->insta_url); ?>" target="blank" title="Instagram"><img src="<?php echo e(asset('front-assets/src/images/new_instagram.svg')); ?>" alt="Instagram" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->linked_url) && $setting->linked_url != null): ?><li><a href="<?php echo e($setting->linked_url); ?>" target="blank" title="Linkedin"><img src="<?php echo e(asset('front-assets/src/images/new_LinkedIn.svg')); ?>" alt="Linkedin" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->twitter_url) && $setting->twitter_url != null): ?><li><a href="<?php echo e($setting->twitter_url); ?>" target="blank" title="Twitter"><img src="<?php echo e(asset('front-assets/src/images/new_Twitter.svg')); ?>" alt="Twitter" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->pinterest_url) && $setting->pinterest_url != null): ?><li><a href="<?php echo e($setting->pinterest_url); ?>" target="blank" title="Pintrest"><img src="<?php echo e(asset('front-assets/src/images/new_pinterest.svg')); ?>" alt="Pintrest" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->youtube_url) && $setting->youtube_url != null): ?><li><a href="<?php echo e($setting->youtube_url); ?>" target="blank" title="Youtube"><img src="<?php echo e(asset('front-assets/src/images/new_you tube.svg')); ?>" alt="Youtube" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(Request::is('locations/dover-garage-doors')): ?>
                                <?php if(isset($setting->dover_location_url) && $setting->dover_location_url != null): ?><li><a href="<?php echo e($setting->dover_location_url); ?>" target="blank" title="Dover Location"><img src="<?php echo e(asset('front-assets/src/images/new_location.svg')); ?>" alt="Dover" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php endif; ?>
                            <?php if(Request::is('locations/newport-garage-doors')): ?>
                                <?php if(isset($setting->newport_location_url) && $setting->newport_location_url != null): ?><li><a href="<?php echo e($setting->newport_location_url); ?>" target="blank" title="Newport Location"><img src="<?php echo e(asset('front-assets/src/images/new_location.svg')); ?>" alt="Newport" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-12 col-sm-12 col-xs-12 footer-content footer-map">
                    <div class="footer-map-link">
                        <?php if(isset($mapLink) && $mapLink != ''): ?>
                            <?php echo html_entity_decode($mapLink); ?>

                        <?php endif; ?>
                    </div>
                    

                    <div class="location mobile-locations-sec landing-page">
                    <h3>Location</h3>

                    <div class="accordion" id="footerAccordion">
                        <?php if($slug == 'dover-garage-doors'): ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"><span>Dover, Delaware</span></button>
                                </h3>

                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                                    <div class="card-body">
                                        <ul>
                                            <?php if(isset($setting->location2) && $setting->location2 != ''): ?>
                                                <li class="lc_m"><?php echo html_entity_decode($setting->location2); ?></li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->contact_no3) && $setting->contact_no3 != ''): ?>
                                                <li class="lc_c"><a
                                                        href="<?php echo e(isset($setting->contact_no3) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no3) : ''); ?>"
                                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->email2) && $setting->email2 != ''): ?>
                                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email2)); ?>"><?php echo html_entity_decode($setting->email2); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>

                                        <?php if(isset($setting->map_link2) && $setting->map_link2 != "" && $setting->map_link2 != null): ?>
                                           <?php echo html_entity_decode($setting->map_link2); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php elseif($slug == 'newport-garage-doors'): ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"><span>Newport, Delaware</span></button>
                                </h3>

                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                                    <div class="card-body">
                                        <ul>
                                            <?php if(isset($setting->location) && $setting->location != ''): ?>
                                                <li class="lc_m"><?php echo html_entity_decode($setting->location); ?></li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->contact_no2) && $setting->contact_no2 != ''): ?>
                                                <li class="lc_c"><a
                                                        href="<?php echo e(isset($setting->contact_no2) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no2) : ''); ?>"
                                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->email) && $setting->email != ''): ?>
                                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email)); ?>"><?php echo html_entity_decode($setting->email); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>

                                        <?php if(isset($setting->map_link) && $setting->map_link != "" && $setting->map_link != null): ?>
                                           <?php echo html_entity_decode($setting->map_link); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php elseif($slug == 'georgetown-garage-doors'): ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"><span>Georgetown, Delaware</span></button>
                                </h3>

                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                                    <div class="card-body">
                                        <ul>
                                            <?php if(isset($setting->location3) && $setting->location3 != ''): ?>
                                                <li class="lc_m"><?php echo html_entity_decode($setting->location3); ?></li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->contact_no4) && $setting->contact_no4 != ''): ?>
                                                <li class="lc_c"><a
                                                        href="<?php echo e(isset($setting->contact_no4) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no4) : ''); ?>"
                                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->email3) && $setting->email3 != ''): ?>
                                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email3)); ?>"><?php echo html_entity_decode($setting->email3); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>

                                        <?php if(isset($setting->map_link3) && $setting->map_link3 != "" && $setting->map_link3 != null): ?>
                                           <?php echo html_entity_decode($setting->map_link3); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php elseif($slug == 'salisbury-garage-doors'): ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"><span>Salisbury, Maryland</span></button>
                                </h3>

                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                                    <div class="card-body">
                                        <ul>
                                            <?php if(isset($setting->location4) && $setting->location4 != ''): ?>
                                                <li class="lc_m"><?php echo html_entity_decode($setting->location4); ?></li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->contact_no5) && $setting->contact_no5 != ''): ?>
                                                <li class="lc_c"><a
                                                        href="<?php echo e(isset($setting->contact_no5) ? 'tel:+1' . preg_replace('/[^0-9]/', '', $setting->contact_no5) : ''); ?>"
                                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($setting->email4) && $setting->email4 != ''): ?>
                                                <li class="lc_e"><a
                                                        href="mailto:<?php echo strip_tags(html_entity_decode($setting->email4)); ?>"><?php echo html_entity_decode($setting->email4); ?></a></li>
                                            <?php endif; ?>
                                        </ul>

                                        <?php if(isset($setting->map_link4) && $setting->map_link4 != "" && $setting->map_link4 != null): ?>
                                           <?php echo html_entity_decode($setting->map_link4); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                    <?php if(
                        isset($setting->google_url) && $setting->google_url != null ||
                        isset($setting->facebook_url) && $setting->facebook_url != null ||
                        isset($setting->insta_url) && $setting->insta_url != null ||
                        isset($setting->linked_url) && $setting->linked_url != null ||
                        isset($setting->twitter_url) && $setting->twitter_url != null ||
                        isset($setting->youtube_url) && $setting->youtube_url != null ||
                        isset($setting->dover_location_url) && $setting->dover_location_url != null ||
                        isset($setting->newport_location_url) && $setting->newport_location_url != null ||
                        isset($setting->pinterest_url) && $setting->pinterest_url != null
                    ): ?>
                    <div class="social mobile-social-sec landing-page">
                        <h3 class="connect-text">Connect With Us</h3>
                        <ul>
                            <?php if(isset($setting->google_url) && $setting->google_url != null): ?><li><a href="<?php echo e($setting->google_url); ?>" target="blank" title="Google"><img src="<?php echo e(asset('front-assets/src/images/google-black.webp')); ?>" alt="Google" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->facebook_url) && $setting->facebook_url != null): ?><li><a href="<?php echo e($setting->facebook_url); ?>" target="blank" title="Facebook"><img src="<?php echo e(asset('front-assets/src/images/new_facbook.svg')); ?>" alt="Facebook" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->insta_url) && $setting->insta_url != null): ?><li><a href="<?php echo e($setting->insta_url); ?>" target="blank" title="Instagram"><img src="<?php echo e(asset('front-assets/src/images/new_instagram.svg')); ?>" alt="Instagram" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->linked_url) && $setting->linked_url != null): ?><li><a href="<?php echo e($setting->linked_url); ?>" target="blank" title="Linkedin"><img src="<?php echo e(asset('front-assets/src/images/new_LinkedIn.svg')); ?>" alt="Linkedin" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->twitter_url) && $setting->twitter_url != null): ?><li><a href="<?php echo e($setting->twitter_url); ?>" target="blank" title="Twitter"><img src="<?php echo e(asset('front-assets/src/images/new_Twitter.svg')); ?>" alt="Twitter" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->pinterest_url) && $setting->pinterest_url != null): ?><li><a href="<?php echo e($setting->pinterest_url); ?>" target="blank" title="Pintrest"><img src="<?php echo e(asset('front-assets/src/images/new_pinterest.svg')); ?>" alt="Pintrest" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(isset($setting->youtube_url) && $setting->youtube_url != null): ?><li><a href="<?php echo e($setting->youtube_url); ?>" target="blank" title="Youtube"><img src="<?php echo e(asset('front-assets/src/images/new_you tube.svg')); ?>" alt="Youtube" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php if(Request::is('locations/dover-garage-doors')): ?>
                                <?php if(isset($setting->dover_location_url) && $setting->dover_location_url != null): ?><li><a href="<?php echo e($setting->dover_location_url); ?>" target="blank" title="Dover Location"><img src="<?php echo e(asset('front-assets/src/images/new_location.svg')); ?>" alt="Dover" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php endif; ?>
                            <?php if(Request::is('locations/newport-garage-doors')): ?>
                                <?php if(isset($setting->newport_location_url) && $setting->newport_location_url != null): ?><li><a href="<?php echo e($setting->newport_location_url); ?>" target="blank" title="Newport Location"><img src="<?php echo e(asset('front-assets/src/images/new_location.svg')); ?>" alt="Newport" class="img-fluid" width="40" height="40"></a></li> <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                  <!-- <div class="col-12 justify-content-center align-items-center flex-column text-center footer-logo-sec">
                     <figure>
                        <?php if(isset($setting->footer_logo) && $setting->footer_logo != "" && $setting->footer_logo != null): ?>
                        <?php
                        $image_name = App\Models\MediaImage::where('id' ,$setting->footer_logo)->first();
                        if(isset($image_name) && $image_name != null)
                        {
                            $f_path = asset('uploads/' . $image_name->name);
                        }else{
                            $f_path = asset('front-assets/src/images/footer-logo.webp');
                        }
                        ?>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Footer Logo">
                            <img src="<?php echo e($f_path); ?>" alt="Footer Logo" width="210" height="56" loading="lazy" class="img-fluid footer-logo-img landing-page">
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('home')); ?>" aria-label="Footer Logo">
                            <img src="<?php echo e(asset('front-assets/src/images/footer-logo.webp')); ?>" alt="Footer Logo" width="210" height="56" loading="lazy" class="img-fluid footer-logo-img landing-page">
                        </a>
                        <?php endif; ?>
                    </figure>
                        <div class="landing-footer-text mt-4">
                            <?php if(isset($setting->content) && $setting->content != ''): ?>
                                <?php echo html_entity_decode($setting->content); ?>

                            <?php endif; ?>
                        </div>
                  </div> -->
                <!-- <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 footer-content footer-third-sec">
                    <h2>Location</h2>
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 locatin-col">
                        <h4>NEWPORT, DELAWARE</h4>
                        <ul>
                            <?php if(isset($setting->location) && $setting->location != ''): ?>
                                <li><?php echo html_entity_decode($setting->location); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no2) && $setting->contact_no2 != ''): ?>
                                <li><a href="tel:+1<?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?>" class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?></a></li>
                            <?php endif; ?>
                            <?php if(isset($setting->email) && $setting->email != ''): ?>
                                <li><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email)); ?>"><?php echo html_entity_decode($setting->email); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h4>DOVER, DELAWARE </h4>
                        <ul>
                            <?php if(isset($setting->location2) && $setting->location2 != ''): ?>
                                <li><?php echo html_entity_decode($setting->location2); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no3) && $setting->contact_no3 != ''): ?>
                                <li><a href="tel:+1<?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?>" class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?></a></li>
                            <?php endif; ?>
                            <?php if(isset($setting->email2) && $setting->email2 != ''): ?>
                                <li><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email2)); ?>"><?php echo html_entity_decode($setting->email2); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    </div>
                    <div class="row location-bottom-row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 locatin-col">
                             <h4>GEORGETOWN, DELAWARE </h4>
                            <ul>
                                <?php if(isset($setting->location3) && $setting->location3 != ''): ?>
                                    <li><?php echo html_entity_decode($setting->location3); ?></li>
                                <?php endif; ?>
                                <?php if(isset($setting->contact_no4) && $setting->contact_no4 != ''): ?>
                                    <li><a href="tel:+1<?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?>" class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?></a></li>
                                <?php endif; ?>
                                <?php if(isset($setting->email3) && $setting->email3 != ''): ?>
                                    <li><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email3)); ?>"><?php echo html_entity_decode($setting->email3); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h4>SALISBURY, MARYLAND </h4>
                            <ul>
                                <?php if(isset($setting->location4) && $setting->location4 != ''): ?>
                                    <li><?php echo html_entity_decode($setting->location4); ?></li>
                                <?php endif; ?>
                                <?php if(isset($setting->contact_no5) && $setting->contact_no5 != ''): ?>
                                    <li><a href="tel:+1<?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?>" class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?></a></li>
                                <?php endif; ?>
                                <?php if(isset($setting->email4) && $setting->email4 != ''): ?>
                                    <li><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email4)); ?>"><?php echo html_entity_decode($setting->email4); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                </div> -->
                
            </div><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/landing-page-footer.blade.php ENDPATH**/ ?>