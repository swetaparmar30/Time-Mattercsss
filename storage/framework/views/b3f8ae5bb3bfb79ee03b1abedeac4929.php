 
<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="contact-page-banner-section sandk-common">
    <div class="banner-content">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 left-side">
                    <?php if(isset($form->form_sub_title) && $form->form_sub_title != ''): ?>
                    <h1 class="get-touch"><?php echo e($form->form_sub_title); ?></h1>
                    <?php endif; ?> <?php if(isset($form->form_short_desc) && $form->form_short_desc != ''): ?> <?php echo $form->form_short_desc; ?> <?php endif; ?>

                    <div class="contact-info-section desktop-contact-info-section">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 contact-location-sec">
                                <h4>Locations</h4>
                                <div class="accordion" id="contactAccordion">
                                    
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingOne">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"><span>Newport, Delaware</span></button>
                                        </h3>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#contactAccordion">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingTwo">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"><span>Dover, Delaware</span></button>
                                        </h3>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#contactAccordion">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingThree">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"><span>Georgetown, Delaware</span></button>
                                        </h3>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#contactAccordion">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingFour">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"><span>Salisbury, Maryland</span></button>
                                        </h3>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#contactAccordion">
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
                                            </div>
                                        </div>
                                    </div>
                        
                        
                                </div>
                            </div>
                        

                        

                    
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 hours-section">
                            <h4>Hours</h4>
                            <div class="row">
                                <?php if(isset($setting)): ?> 
                                <?php $monday = json_decode($setting->monday); 
                                    $tuesday = json_decode($setting->tuesday); 
                                    $wedsday = json_decode($setting->wedsday); 
                                    $thursday = json_decode($setting->thursday); 
                                    $friday = json_decode($setting->friday); 
                                    $saturday = json_decode($setting->saturday); 
                                    $sunday = json_decode($setting->sunday); 
                                ?>
                                <div class="col-md-12 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">MON - FRI:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($monday->status) && $monday->status != 0): ?> <?php echo e(date('g:i A', strtotime($monday->from))); ?> – <?php echo e(date('g:i A', strtotime($monday->to))); ?>

                                                <!-- &<br>  <?php echo e(date('g:i A', strtotime($monday->from2))); ?> – <?php echo e(date('g:i A', strtotime($monday->to2))); ?> -->
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SAT - SUN:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($saturday->status) && $saturday->status != 0): ?> <?php echo e(date('g:i A', strtotime($saturday->from))); ?> - <?php echo e(date('g:i A', strtotime($saturday->to))); ?>

                                 
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- <div class="col-md-6 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">MON:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($monday->status) && $monday->status != 0): ?> <?php echo e(date('g:i A', strtotime($monday->from))); ?> – <?php echo e(date('g:i A', strtotime($monday->to))); ?>

                                       
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">TUE:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($tuesday->status) && $tuesday->status != 0): ?> <?php echo e(date('g:i A', strtotime($tuesday->from))); ?> - <?php echo e(date('g:i A', strtotime($tuesday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">WED:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($wedsday->status) && $wedsday->status != 0): ?> <?php echo e(date('g:i A', strtotime($wedsday->from))); ?> - <?php echo e(date('g:i A', strtotime($wedsday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">THU:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($thursday->status) && $thursday->status != 0): ?> <?php echo e(date('g:i A', strtotime($thursday->from))); ?> - <?php echo e(date('g:i A', strtotime($thursday->to))); ?>

                                              
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">FRI:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($friday->status) && $friday->status != 0): ?> <?php echo e(date('g:i A', strtotime($friday->from))); ?> - <?php echo e(date('g:i A', strtotime($friday->to))); ?>

                                                
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SAT:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($saturday->status) && $saturday->status != 0): ?> <?php echo e(date('g:i A', strtotime($saturday->from))); ?> - <?php echo e(date('g:i A', strtotime($saturday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SUN:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($sunday->status) && $sunday->status != 0): ?> <?php echo e(date('g:i A', strtotime($sunday->from))); ?> - <?php echo e(date('g:i A', strtotime($sunday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div> -->
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 right-side">
                    <?php echo $__env->make('frontend.includes.contactform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="contact-info-section mobile-contact-info-section">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 contact-location-sec">
                                <h4>Locations</h4>
                                <div class="accordion" id="contactAccordion_mo">
                                    
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingOne">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne_mo" aria-expanded="false"><span>Newport, Delaware</span></button>
                                        </h3>
                                        <div id="collapseOne_mo" class="accordion-collapse collapse" data-bs-parent="#contactAccordion_mo">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingTwo">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo_mo" aria-expanded="false"><span>Dover, Delaware</span></button>
                                        </h3>
                                        <div id="collapseTwo_mo" class="accordion-collapse collapse" data-bs-parent="#contactAccordion_mo">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingThree">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree_mo" aria-expanded="false"><span>Georgetown, Delaware</span></button>
                                        </h3>
                                        <div id="collapseThree_mo" class="accordion-collapse collapse" data-bs-parent="#contactAccordion_mo">
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingFour">
                                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour_mo" aria-expanded="false"><span>Salisbury, Maryland</span></button>
                                        </h3>
                                        <div id="collapseFour_mo" class="accordion-collapse collapse" data-bs-parent="#contactAccordion_mo">
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
                                            </div>
                                        </div>
                                    </div>
                        
                        
                                </div>
                            </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12  hours-section">
                            <h4>Hours</h4>
                            <div class="row">
                                 <?php if(isset($setting)): ?> 
                                    <?php $monday = json_decode($setting->monday); 
                                        $tuesday = json_decode($setting->tuesday); 
                                        $wedsday = json_decode($setting->wedsday); 
                                        $thursday = json_decode($setting->thursday); 
                                        $friday = json_decode($setting->friday); 
                                        $saturday = json_decode($setting->saturday); 
                                        $sunday = json_decode($setting->sunday); 
                                    ?>
                                    <div class="col-md-12 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">MON - FRI:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($monday->status) && $monday->status != 0): ?> <?php echo e(date('g:i A', strtotime($monday->from))); ?> – <?php echo e(date('g:i A', strtotime($monday->to))); ?>

                                                <!-- &<br>  <?php echo e(date('g:i A', strtotime($monday->from2))); ?> – <?php echo e(date('g:i A', strtotime($monday->to2))); ?> -->
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SAT - SUN:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($saturday->status) && $saturday->status != 0): ?> <?php echo e(date('g:i A', strtotime($saturday->from))); ?> - <?php echo e(date('g:i A', strtotime($saturday->to))); ?>

                                 
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="col-md-6 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">MON:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($monday->status) && $monday->status != 0): ?> <?php echo e(date('g:i A', strtotime($monday->from))); ?> - <?php echo e(date('g:i A', strtotime($monday->to))); ?>

                                                                                               <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">TUE:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($tuesday->status) && $tuesday->status != 0): ?> <?php echo e(date('g:i A', strtotime($tuesday->from))); ?> - <?php echo e(date('g:i A', strtotime($tuesday->to))); ?>

                                              
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">WED:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($wedsday->status) && $wedsday->status != 0): ?> <?php echo e(date('g:i A', strtotime($wedsday->from))); ?> - <?php echo e(date('g:i A', strtotime($wedsday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">THU:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($thursday->status) && $thursday->status != 0): ?> <?php echo e(date('g:i A', strtotime($thursday->from))); ?> - <?php echo e(date('g:i A', strtotime($thursday->to))); ?>

                                              
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 day-hours">
                                    <ul>
                                        <li>
                                            <span class="hours-day">FRI:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($friday->status) && $friday->status != 0): ?> <?php echo e(date('g:i A', strtotime($friday->from))); ?> - <?php echo e(date('g:i A', strtotime($friday->to))); ?>

                                              
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SAT:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($saturday->status) && $saturday->status != 0): ?> <?php echo e(date('g:i A', strtotime($saturday->from))); ?> - <?php echo e(date('g:i A', strtotime($saturday->to))); ?>

                                              
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="hours-day">SUN:&nbsp;</span>
                                            <span class="hours-time">
                                                <?php if(isset($sunday->status) && $sunday->status != 0): ?> <?php echo e(date('g:i A', strtotime($sunday->from))); ?> - <?php echo e(date('g:i A', strtotime($sunday->to))); ?>

                                               
                                                <?php else: ?> CLOSED <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div> -->
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(count($client_logo) > 0): ?> 
<?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/contactus/index.blade.php ENDPATH**/ ?>