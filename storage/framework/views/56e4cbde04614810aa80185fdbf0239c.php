
    <div class="container-md">
        <div class="row align-items-center location-line">

            <h2>Locations</h2>
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right first-location">
                <h4>Newport, Delaware</h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            <?php if(isset($setting->location) && $setting->location != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no2) && $setting->contact_no2 != ''): ?>
                                <li class="lc_c"><a
                                        href="tel:+1 <?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email) && $setting->email != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email)); ?>"><?php echo html_entity_decode($setting->email); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-map-link">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d767.2956704458588!2d-75.60475700991606!3d39.7130770448443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c7023df0bdffcf%3A0xcdd051e07eadee44!2s314%20E%20Ayre%20St%2C%20Newport%2C%20DE%2019804%2C%20USA!5e0!3m2!1sen!2sin!4v1738236736333!5m2!1sen!2sin" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right second-location">
               
                 <h4>Dover, Delaware </h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            <?php if(isset($setting->location2) && $setting->location2 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location2); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no3) && $setting->contact_no3 != ''): ?>
                                <li class="lc_c"><a
                                        href="tel:+1 <?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email2) && $setting->email2 != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email2)); ?>"><?php echo html_entity_decode($setting->email2); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-map-link">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3093.8193279670245!2d-75.49979988806274!3d39.1560907715518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c7649c14937d01%3A0x404627572e09c5c5!2s1058%20S%20Little%20Creek%20Rd%2C%20Dover%2C%20DE%2019901%2C%20USA!5e0!3m2!1sen!2sin!4v1738236879628!5m2!1sen!2sin" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 border-right third-location">
                <h4>Georgetown, Delaware </h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            <?php if(isset($setting->location3) && $setting->location3 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location3); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no4) && $setting->contact_no4 != ''): ?>
                                <li class="lc_c"><a
                                        href="tel:+1 <?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email3) && $setting->email3 != ''): ?>
                                <li class="lc_e"><a href="mailto:<?php echo strip_tags(html_entity_decode($setting->email3)); ?>"><?php echo html_entity_decode($setting->email3); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-map-link">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3114.4592587827747!2d-75.39752938808275!3d38.68429367165262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b8eba94a2c9bbf%3A0xa85ea69b2e5ad08f!2s500%20W%20Market%20St%2C%20Georgetown%2C%20DE%2019947%2C%20USA!5e0!3m2!1sen!2sin!4v1738237022852!5m2!1sen!2sin" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 fourth-location">
               
                 <h4>Salisbury, Maryland</h4>
                <div class="all-locations">
                    <div class="location-centers">
                        <ul>
                            <?php if(isset($setting->location4) && $setting->location4 != ''): ?>
                                <li class="lc_m"><?php echo html_entity_decode($setting->location4); ?></li>
                            <?php endif; ?>
                            <?php if(isset($setting->contact_no5) && $setting->contact_no5 != ''): ?>
                                <li class="lc_c"><a
                                        href="tel:+1 <?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?>"
                                        class="custom_fonts_amiko"><?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($setting->email4) && $setting->email4 != ''): ?>
                                <li class="lc_e"><a
                                        href="mailto:<?php echo strip_tags(html_entity_decode($setting->email4)); ?>"><?php echo html_entity_decode($setting->email4); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="footer-map-link">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3127.2859691615727!2d-75.5870428880952!3d38.388636471719614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b9025219affb4b%3A0xbf0c72ea299bfe1c!2sClark%20%26%20Sons%20Inc!5e0!3m2!1sen!2sin!4v1738237062164!5m2!1sen!2sin" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

<?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/all-locations-new.blade.php ENDPATH**/ ?>