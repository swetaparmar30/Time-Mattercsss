<?php $__env->startSection('main_content'); ?>
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <form action="<?php echo e(route('setting.add')); ?>" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                    <div class="card Recent-Users">
                                        <h5>Contact Page Settings</h5>
                                        <div class="card-block px-0 py-3">
                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <input type="hidden" name="setting_id"
                                                            value="<?php echo e(isset($setting->id) ? $setting->id : ''); ?>">
                                                        <label for="">Site Title <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <input type="text" name="title" id="title"
                                                            placeholder="Site Title" required
                                                            data-parsley-required-message="Please Enter Name"
                                                            value="<?php echo e(isset($setting->site_title) ? $setting->site_title : ''); ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <!-- <div class="row form-sec">
                                     <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                        <label for="">Site
                                        Tagline <span style="color: red;margin: 0;">*</span></label>
                                     </div>
                                     <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <input type="text" name="tagline" id="tagline" placeholder="Site Tagline" required
                                           data-parsley-required-message="Please Enter Site Tagline" value="<?php echo e(isset($setting->site_tagline) ? $setting->site_tagline : ''); ?>">
                                     </div>
                                     </div> -->
                                            <!--   <div class="row form-sec">
                                     <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                         <label for="">Site URL <span style="color: red;margin: 0;">*</span></label>
                                     </div>
                                     <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                         <input type="text" name="url" id="url" required
                                         data-parsley-required-message="Please Enter Site URL" value="<?php echo e(isset($setting->site_url) ? $setting->site_url : ''); ?>" placeholder="Site URL">
                                     </div>
                                     </div> -->
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Newport, Delaware E-Mail<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="email" id="email" class=""
                                                        placeholder="E-Mail 1" required
                                                        data-parsley-required-message="Please Enter E-Mail"
                                                        value="<?php echo e(isset($setting->email) ? $setting->email : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Dover, Delaware E-Mail</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="email2" id="email2" class=""
                                                        placeholder="E-Mail 2"
                                                        value="<?php echo e(isset($setting->email2) ? $setting->email2 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Georgetown, Delaware E-Mail</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="email3" id="email3" class=""
                                                        placeholder="E-Mail 3"
                                                        value="<?php echo e(isset($setting->email3) ? $setting->email3 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Salisbury, Maryland E-Mail</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="email4" id="email4" class=""
                                                        placeholder="E-Mail 4"
                                                        value="<?php echo e(isset($setting->email4) ? $setting->email4 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Primary Contact<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="contact_no" id="contact_no"
                                                        class="imput-mask" placeholder="Contact No" required
                                                        data-parsley-required-message="Please Enter Contact No"
                                                        data-parsley-pattern="^\(\d{3}\) \d{3}-\d{4}$"
                                                        data-parsley-pattern-message="Phone Number must be at least 10 digits"
                                                        data-parsley-minlength="10"
                                                        data-parsley-minlength-message="Phone Number must be at least 10 digits"
                                                        value="<?php echo e(isset($setting->contact_no) ? $setting->contact_no : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Newport, Delaware Contact</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="contact_no2" id="contact_no2"
                                                        class="imput-mask" placeholder="Contact No 2"
                                                        value="<?php echo e(isset($setting->contact_no2) ? $setting->contact_no2 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Dover, Delaware Contact </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="contact_no3" id="contact_no3"
                                                        class="imput-mask" placeholder="Contact No 3"
                                                        value="<?php echo e(isset($setting->contact_no3) ? $setting->contact_no3 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Georgetown, Delaware Contact </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="contact_no4" id="contact_no4"
                                                        class="imput-mask" placeholder="Contact No 4"
                                                        value="<?php echo e(isset($setting->contact_no4) ? $setting->contact_no4 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Salisbury, Maryland Contact </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="contact_no5" id="contact_no5"
                                                        class="imput-mask" placeholder="Contact No 5"
                                                        value="<?php echo e(isset($setting->contact_no5) ? $setting->contact_no5 : ''); ?>">
                                                </div>
                                            </div>
                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Newport Address <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <!--  <input type="text" name="location" id="location" class="" placeholder="Location" required
                                           data-parsley-required-message="Please Enter Location" value="<?php echo e(isset($setting->location) ? $setting->location : ''); ?>" > -->
                                                        <textarea class="form-control" id="location" name="location" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please enter Address" data-parsley-errors-container="#address_required"><?php echo e(isset($setting->location) ? $setting->location : ''); ?></textarea>
                                                        <span id="address_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Dover Address <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <!--  <input type="text" name="location" id="location" class="" placeholder="Location" required
                                           data-parsley-required-message="Please Enter Location" value="<?php echo e(isset($setting->location) ? $setting->location : ''); ?>" > -->
                                                        <textarea class="form-control" id="location2" name="location2" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please enter Address" data-parsley-errors-container="#address_required"><?php echo e(isset($setting->location2) ? $setting->location2 : ''); ?></textarea>
                                                        <span id="address_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Georgetown Address <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <!--  <input type="text" name="location" id="location" class="" placeholder="Location" required
                                           data-parsley-required-message="Please Enter Location" value="<?php echo e(isset($setting->location) ? $setting->location : ''); ?>" > -->
                                                        <textarea class="form-control" id="location3" name="location3" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please enter Address" data-parsley-errors-container="#address_required"><?php echo e(isset($setting->location3) ? $setting->location3 : ''); ?></textarea>
                                                        <span id="address_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Salisbury Address <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <!--  <input type="text" name="location" id="location" class="" placeholder="Location" required
                                           data-parsley-required-message="Please Enter Location" value="<?php echo e(isset($setting->location) ? $setting->location : ''); ?>" > -->
                                                        <textarea class="form-control" id="location4" name="location4" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please enter Address" data-parsley-errors-container="#address_required"><?php echo e(isset($setting->location4) ? $setting->location4 : ''); ?></textarea>
                                                        <span id="address_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Map Link</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="map_link" name="map_link" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please Enter Map Link " data-parsley-errors-container="#map_link_required"><?php echo e(isset($setting->map_link) ? $setting->map_link : ''); ?></textarea>
                                                        <span id="map_link_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Map Link 2</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="map_link2" name="map_link2" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please Enter Map Link 2" data-parsley-errors-container="#map_link2_required"><?php echo e(isset($setting->map_link2) ? $setting->map_link2 : ''); ?></textarea>
                                                        <span id="map_link2_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Map Link 3</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="map_link3" name="map_link3" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please Enter Map Link 3" data-parsley-errors-container="#map_link3_required"><?php echo e(isset($setting->map_link3) ? $setting->map_link3 : ''); ?></textarea>
                                                        <span id="map_link3_required"></span>
                                                    </div>
                                                </div>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Map Link 4</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="map_link4" name="map_link4" style="height: 150px;" data-parsley-required="true"
                                                            data-parsley-required-message="Please Enter Map Link 4" data-parsley-errors-container="#map_link4_required"><?php echo e(isset($setting->map_link4) ? $setting->map_link4 : ''); ?></textarea>
                                                        <span id="map_link4_required"></span>
                                                    </div>
                                                </div>

                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Footer Content <span
                                                                style="color: red;margin: 0;">*</span></label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="code_preview0" name="content" style="height: 300px;"
                                                            data-parsley-required="true" data-parsley-required-message="Please enter Content"
                                                            data-parsley-errors-container="#content_required"><?php echo e(isset($setting->content) ? $setting->content : ''); ?></textarea>
                                                        <span id="content_required"></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <!-- <div class="row form-sec">
                                     <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                        <label for="">Footer Text </label>
                                     </div>
                                     <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <textarea class="form-control" id="" name="footer_text" style="height: 100px;"><?php echo e(isset($setting->footer_text) ? $setting->footer_text : ''); ?></textarea>
                                     </div>
                                     </div> -->
                                            <!-- <div class="row form-sec">
                                     <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                        <label for="">Map </label>
                                     </div>
                                     <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <textarea class="form-control" id="map" name="map" style="height: 200px;"><?php echo e(isset($setting->map) ? $setting->map : ''); ?></textarea>
                                     </div>
                                     </div> -->
                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Copyright Text </label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="copyright" name="copyright" style="height: 200px;"><?php echo e(isset($setting->copyright) ? $setting->copyright : ''); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Title </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="meta_title" id="meta_title"
                                                        placeholder="Title"
                                                        value="<?php echo e(isset($setting->meta_title) ? $setting->meta_title : ''); ?>"
                                                        data-parsley-required-message="Please Enter Title">
                                                </div>
                                            </div>


                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Keyword</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="meta_keyword" id="meta_keyword"
                                                        placeholder="Sub Title"
                                                        value="<?php echo e(isset($setting->meta_keyword) ? $setting->meta_keyword : ''); ?>"
                                                        data-parsley-required-message="Please Enter Sub Title">
                                                </div>
                                            </div>


                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Description</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" id="meta_description" name="meta_description" style="height: 150px;"
                                                        data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Description"><?php echo e(isset($setting->meta_description) ? $setting->meta_description : ''); ?></textarea>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="card Recent-Users next-box">
                                        <h5>Opening Hours</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Monday</label>
                                                    <?php if(isset($setting->monday) && $setting->monday != 'closed' && $setting->monday != null): ?>
                                                        <?php
                                                            $m_opend = true;
                                                            $m_json = json_decode($setting->monday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="monday_choose">
                                                        <option value="open" <?php echo e(isset($m_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->monday) && $setting->monday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="monday_form" id="monday_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($m_json->from) ? $m_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="monday_to" id="monday_to"
                                                        placeholder="To"
                                                        value="<?php echo e(isset($m_json->to) ? $m_json->to : ''); ?>">
                                                </div>
                                                <!--  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="monday_form2" id="monday_form2" placeholder="From"
                                           value="<?php echo e(isset($m_json->from2) ? $m_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="monday_to2" id="monday_to2" placeholder="To"
                                           value="<?php echo e(isset($m_json->to2) ? $m_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Tuesday</label>
                                                    <?php if(isset($setting->tuesday) && $setting->tuesday != 'closed' && $setting->tuesday != null): ?>
                                                        <?php
                                                            $t_opend = true;
                                                            $t_json = json_decode($setting->tuesday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="tuesday_choose">
                                                        <option value="open" <?php echo e(isset($t_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->tuesday) && $setting->tuesday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="tuesday_form" id="tuesday_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($t_json->from) ? $t_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="tuesday_to" id="tuesday_to"
                                                        placeholder="To"
                                                        value="<?php echo e(isset($t_json->to) ? $t_json->to : ''); ?>">
                                                </div>
                                                <!--  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="tuesday_form2" id="tuesday_form2" placeholder="From"
                                           value="<?php echo e(isset($t_json->from2) ? $t_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="tuesday_to2" id="tuesday_to2" placeholder="To"
                                           value="<?php echo e(isset($t_json->to2) ? $t_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Wednesday</label>
                                                    <?php if(isset($setting->wedsday) && $setting->wedsday != 'closed' && $setting->wedsday != null): ?>
                                                        <?php
                                                            $w_opend = true;
                                                            $w_json = json_decode($setting->wedsday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="wedsday_choose">
                                                        <option value="open" <?php echo e(isset($w_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->wedsday) && $setting->wedsday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="wed_form" id="wed_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($w_json->from) ? $w_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="wed_to" id="wed_to" placeholder="To"
                                                        value="<?php echo e(isset($w_json->to) ? $w_json->to : ''); ?>">
                                                </div>
                                                <!-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="wed_form2" id="wed_form2" placeholder="From"
                                           value="<?php echo e(isset($w_json->from2) ? $w_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="wed_to2" id="wed_to2" placeholder="To"
                                           value="<?php echo e(isset($w_json->to2) ? $w_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Thursday</label>
                                                    <?php if(isset($setting->thursday) && $setting->thursday != 'closed' && $setting->thursday != null): ?>
                                                        <?php
                                                            $th_opend = true;
                                                            $th_json = json_decode($setting->thursday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="thursday_choose">
                                                        <option value="open" <?php echo e(isset($th_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->thursday) && $setting->thursday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="thur_form" id="thur_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($th_json->from) ? $th_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="thur_to" id="thur_to" placeholder="To"
                                                        value="<?php echo e(isset($th_json->to) ? $th_json->to : ''); ?>">
                                                </div>
                                                <!-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="thur_form2" id="thur_form2" placeholder="From"
                                           value="<?php echo e(isset($th_json->from2) ? $th_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="thur_to2" id="thur_to2" placeholder="To"
                                           value="<?php echo e(isset($th_json->to2) ? $th_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Friday</label>
                                                    <?php if(isset($setting->friday) && $setting->friday != 'closed' && $setting->friday != null): ?>
                                                        <?php
                                                            $f_opend = true;
                                                            $f_json = json_decode($setting->friday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="friday_choose">
                                                        <option value="open" <?php echo e(isset($f_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->friday) && $setting->friday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="friday_form" id="friday_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($f_json->from) ? $f_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="friday_to" id="friday_to"
                                                        placeholder="To"
                                                        value="<?php echo e(isset($f_json->to) ? $f_json->to : ''); ?>">
                                                </div>
                                                <!-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="friday_form2" id="friday_form2" placeholder="From"
                                           value="<?php echo e(isset($f_json->from2) ? $f_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="friday_to2" id="friday_to2" placeholder="To"
                                           value="<?php echo e(isset($f_json->to2) ? $f_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Saturday</label>
                                                    <?php if(isset($setting->saturday) && $setting->saturday != 'closed' && $setting->saturday != null): ?>
                                                        <?php
                                                            $st_opend = true;
                                                            $s_json = json_decode($setting->saturday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="sat_sun_choose">
                                                        <option value="open" <?php echo e(isset($st_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->saturday) && $setting->saturday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="sat_sun_form" id="sat_sun_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($s_json->from) ? $s_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="sat_sun_to" id="sat_sun_to"
                                                        placeholder="To"
                                                        value="<?php echo e(isset($s_json->to) ? $s_json->to : ''); ?>">
                                                </div>
                                                <!-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="sat_sun_form2" id="sat_sun_form" placeholder="From"
                                           value="<?php echo e(isset($s_json->from2) ? $s_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="sat_sun_to2" id="sat_sun_to" placeholder="To"
                                           value="<?php echo e(isset($s_json->to2) ? $s_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sunday</label>
                                                    <?php if(isset($setting->sunday) && $setting->sunday != 'closed' && $setting->sunday != null): ?>
                                                        <?php
                                                            $st_opend = true;
                                                            $s_json = json_decode($setting->sunday);
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <select name="sat_sun_choose">
                                                        <option value="open" <?php echo e(isset($st_opend) ? 'selected' : ''); ?>>
                                                            Open</option>
                                                        <option value="close"
                                                            <?php echo e(isset($setting->sunday) && $setting->sunday == 'closed' ? 'selected' : ''); ?>>
                                                            Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="sat_sun_form" id="sat_sun_form"
                                                        placeholder="From"
                                                        value="<?php echo e(isset($s_json->from) ? $s_json->from : ''); ?>">
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                                    <input type="time" name="sat_sun_to" id="sat_sun_to"
                                                        placeholder="To"
                                                        value="<?php echo e(isset($s_json->to) ? $s_json->to : ''); ?>">
                                                </div>
                                                <!-- <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="sat_sun_form2" id="sat_sun_form" placeholder="From"
                                           value="<?php echo e(isset($s_json->from2) ? $s_json->from2 : ''); ?>">
                                     </div>
                                     <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <input type="time" name="sat_sun_to2" id="sat_sun_to" placeholder="To"
                                           value="<?php echo e(isset($s_json->to2) ? $s_json->to2 : ''); ?>">
                                     </div> -->
                                            </div>

                                            <div class="row form-sec text-end">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <button type="submit" id="submit_form"
                                                        class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                                    <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                        <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                            <h5>Site Logo</h5>
                                            <div class="card-block px-0 py-3">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <div class="upload-img-sec text-center image_preview_div">
                                                            <input type="hidden" name="site_logo" id="img_id"
                                                                value="<?php echo e(isset($setting->site_logo) ? $setting->site_logo : ''); ?>"
                                                                required
                                                                data-parsley-errors-container="#site_img_required"data-parsley-trigger="change"
                                                                data-parsley-required-message="Please choose an image.">
                                                            <?php if(isset($setting->site_logo) && $setting->site_logo != '' && $setting->site_logo != null): ?>
                                                                <?php
                                                                    $img = App\Models\MediaImage::select('name')
                                                                        ->where('id', $setting->site_logo)
                                                                        ->first();
                                                                ?>
                                                                <?php if(isset($img->name) && $img->name != ''): ?>
                                                                    <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                        alt="" id="profile_avtar"
                                                                        class="profile-img">
                                                                    <a id="remove_image"> <i class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                <?php else: ?>
                                                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                        alt="" id="profile_avtar"
                                                                        class="profile-img">
                                                                    <a id="remove_image" style="display: none;"> <i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="profile_avtar"
                                                                    class="profile-img">
                                                                <a id="remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            <?php endif; ?>
                                                            <label for="" style="cursor: pointer;"
                                                                class="choose_file hm-choose-img-title">Choose
                                                                image</label>
                                                        </div>
                                                        <span class="error_field" id="site_img_required"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                            <h5>Footer Logo</h5>
                                            <div class="card-block px-0 py-3">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <div class="upload-img-sec text-center">
                                                            <input type="hidden" name="footer_logo" id="footer_img_id"
                                                                value="<?php echo e(isset($setting->footer_logo) ? $setting->footer_logo : ''); ?>"
                                                                required
                                                                data-parsley-errors-container="#footer_img_required"data-parsley-trigger="change"
                                                                data-parsley-required-message="Please choose an image.">
                                                            <?php if(isset($setting->footer_logo) && $setting->footer_logo != '' && $setting->footer_logo != null): ?>
                                                                <?php
                                                                    $img = App\Models\MediaImage::select('name')
                                                                        ->where('id', $setting->footer_logo)
                                                                        ->first();
                                                                ?>
                                                                <?php if(isset($img->name) && $img->name != ''): ?>
                                                                    <div class="image_preview_div">
                                                                        <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                            alt="" id="footer_profile_avtar"
                                                                            class="profile-img">
                                                                        <a id="footer_remove_image"> <i
                                                                                class="fa fa-times"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="image_preview_div">
                                                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                            alt="" id="footer_profile_avtar"
                                                                            class="profile-img">
                                                                        <a id="footer_remove_image"
                                                                            style="display: none;"> <i class="fa fa-times"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <div class="image_preview_div">
                                                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                        alt="" id="footer_profile_avtar"
                                                                        class="profile-img">
                                                                    <a id="footer_remove_image" style="display: none;"> <i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <label for="" style="cursor: pointer;"
                                                                data-val="footer_profile_avtar"
                                                                class="choose_file hm-choose-img-title">Choose
                                                                image</label>
                                                        </div>
                                                        <span class="error_field" id="footer_img_required"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                            <h5>Site Favicon</h5>
                                            <div class="card-block px-0 py-3">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <div class="upload-img-sec text-center">
                                                            <input type="hidden" name="site_favicon" id="favicon_id"
                                                                value="<?php echo e(isset($setting->site_favicon) ? $setting->site_favicon : ''); ?>"
                                                                required
                                                                data-parsley-errors-container="#site_favicon_img_required"data-parsley-trigger="change"
                                                                data-parsley-required-message="Please choose an image.">
                                                            <?php if(isset($setting->site_favicon) && $setting->site_favicon != '' && $setting->site_favicon != null): ?>
                                                                <?php
                                                                    $img = App\Models\MediaImage::select('name')
                                                                        ->where('id', $setting->site_favicon)
                                                                        ->first();
                                                                    if (isset($img) && $img != '' && $img != null) {
                                                                        $path = asset('uploads/' . $img->name);
                                                                    } else {
                                                                        $path = asset(
                                                                            'assets/images/user/img-demo_1041.jpg',
                                                                        );
                                                                    }
                                                                ?>
                                                                <div class="image_preview_div">
                                                                    <img src="<?php echo e($path); ?>" alt=""
                                                                        id="favicon_avtar" class="profile-img">
                                                                    <a id="remove_favi_image"> <i class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="image_preview_div">
                                                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                        alt="" id="favicon_avtar"
                                                                        class="profile-img">
                                                                    <a id="remove_favi_image" style="display: none;"> <i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <label for="" style="cursor: pointer;"
                                                                class="choose_file hm-choose-img-title"
                                                                data-val="faviconimg">Choose image</label>
                                                        </div>
                                                        <span class="error_field" id="site_favicon_img_required"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                        <h5>Social Links</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Facebook</span></label>
                                                    <input type="text" name="facebook_url" id="facebook_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->facebook_url) ? $setting->facebook_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Instagram</span></label>
                                                    <input type="text" name="insta_url" id="insta_url" class=""
                                                        placeholder="Type here"
                                                        value="<?php echo e(isset($setting->insta_url) ? $setting->insta_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">YouTube</span></label>
                                                    <input type="text" name="youtube_url" id="youtube_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->youtube_url) ? $setting->youtube_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Twitter</span></label>
                                                    <input type="text" name="twitter_url" id="twitter_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->twitter_url) ? $setting->twitter_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Linked In</span></label>
                                                    <input type="text" name="linked_url" id="linked_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->linked_url) ? $setting->linked_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Google </span></label>
                                                    <input type="text" name="google_url" id="google_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->google_url) ? $setting->google_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Pinterest</span></label>
                                                    <input type="text" name="pinterest_url" id="pinterest_url"
                                                        class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->pinterest_url) ? $setting->pinterest_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Dover Location</span></label>
                                                    <input type="text" name="dover_location_url"
                                                        id="dover_location_url" class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->dover_location_url) ? $setting->dover_location_url : ''); ?>">
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Newport Location</span></label>
                                                    <input type="text" name="newport_location_url"
                                                        id="newport_location_url" class="" placeholder="Type here"
                                                        value="<?php echo e(isset($setting->newport_location_url) ? $setting->newport_location_url : ''); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card Recent-Users next-box" style="margin-top: 0 !important;"> -->
                                    <!-- <h5>CTA Section Setting</h5> -->
                                    <!-- <div class="card-block px-0 py-3"> -->
                                    <!-- <div class="row form-sec">
                               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                   <label for="">Background Image</span></label>
                                    <div class="upload-img-sec text-center">
                                       <input type="hidden" name="bg_img_id_cta" id="bg_img_id_cta" value="<?php echo e(isset($setting->cta_image) ? $setting->cta_image : ''); ?>" required data-parsley-errors-container="#cta_img_required"data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                       <?php if(isset($setting->cta_image) && $setting->cta_image != '' && $setting->cta_image != null): ?>
    <?php
        $cta_img = App\Models\MediaImage::select('name')->where('id', $setting->cta_image)->first();
        if (isset($cta_img) && $cta_img != '' && $cta_img != null) {
            $c_path = asset('uploads/' . $cta_img->name);
        } else {
            $c_path = asset('assets/images/user/img-demo_1041.jpg');
        }
    ?>
                                       <div class="image_preview_div">
                                       <img src="<?php echo e($c_path); ?>" alt="" id="bg_profile_avtar_cta" class="profile-img" >
                                       <a id="bg_remove_image_cta" class="remove_image_media" data-val="bg" data-id="cta"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
<?php else: ?>
    <div class="image_preview_div">
                                       <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="bg_profile_avtar_cta" class="profile-img">
                                       <a id="bg_remove_image_cta" class="remove_image_media" data-val="bg" data-id="cta" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
    <?php endif; ?>
                                       
                                       <label for="" style="cursor: pointer;" data-val="bg" data-id="cta" class="choose_file" data-val="faviconimg">Choose image</label>
                                   </div>
                                   <span class="error_field" id="cta_img_required"></span>
                               </div>
                               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                   <label for="">Title</span></label>
                                   <input type="text" name="cta_title" id="cta_title" class="" required ata-parsley-required-message="Please Enter Title" placeholder="Title"  value="<?php echo e(isset($setting->cta_title) ? $setting->cta_title : ''); ?>" >
                               </div>
                               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                   <label for="">Button URL</span></label>
                                   <input type="text" name="cta_btn_url" id="cta_btn_url" class="" required ata-parsley-required-message="Please Enter Button URL" data-parsley-type="url" placeholder="Button URL"  value="<?php echo e(isset($setting->cta_btn_url) ? $setting->cta_btn_url : ''); ?>" >
                               </div>
                               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                   <label for="">Button Name</span></label>
                                   <input type="text" name="cta_btn_name" id="cta_btn_name" required ata-parsley-required-message="Please Enter Button Name" class="" placeholder="Button Name"  value="<?php echo e(isset($setting->cta_btn_name) ? $setting->cta_btn_name : ''); ?>" >
                               </div>
                               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                   <label for="">Description</span></label>
                                   <textarea class="form-control" id="cta_description" required=""
                                       ata-parsley-required-message="Please Enter Description" data-parsley-errors-container="#cta_description_req"
                                       name="cta_description" style="height: 100px;"><?php echo e(isset($setting->cta_description) ? $setting->cta_description : ''); ?></textarea>
                                   <span class="error_field" id="cta_description_req"></span>
                               </div>
                               
                               </div> -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                                <!--[ Recent Users ] end-->
                            </div>
                        </form>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
 <script>
        $(document).ready(function() {
            $('#code_preview0').summernote({
                height: 300
            });
            $('#map').summernote({
                height: 200
            });
            $('#copyright').summernote({
                height: 200
            });
            $('#location').summernote({
                height: 200
            });
            $('#location2').summernote({
                height: 200
            });
            $('#location3').summernote({
                height: 200
            });
            $('#location4').summernote({
                height: 200
            });
            $('#map_link').summernote({
                height: 200
            });
            $('#map_link2').summernote({
                height: 200
            });
            $('#map_link3').summernote({
                height: 200
            });
            $('#map_link4').summernote({
                height: 200
            });
        });
    </script> 
    <script>
        const assetPath = "<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>";
        $('#remove_image').click(function(event) {
            event.stopPropagation();
            $('#img_id').val(null);
            $('#profile_avtar').attr('src', assetPath);
            $('#remove_image').css('display', 'none');
            $('#profile_avtar').css('opacity', '1.0');
        });
        $('#remove_favi_image').click(function(event) {
            event.stopPropagation();
            $('#favicon_id').val(null);
            $('#favicon_avtar').attr('src', assetPath);
            $('#remove_favi_image').css('display', 'none');
            $('#favicon_avtar').css('opacity', '1.0');
        });
        $('#footer_remove_image').click(function(event) {
            event.stopPropagation();
            $('#footer_img_id').val(null);
            $('#footer_profile_avtar').attr('src', assetPath);
            $('#footer_remove_image').css('display', 'none');
            $('#footer_profile_avtar').css('opacity', '1.0');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').parsley({
                excluded: 'input[type=hidden]:not(.visible)'
            });
            $('#submit_form').on('click', function(e) {

                $('#img_id').addClass('visible');
                $('#footer_img_id').addClass('visible');
                $('#site_favicon_img_required').addClass('visible');
                $('#bg_img_id_cta').addClass('visible');

                // Validate the form
                if (!$('form').parsley().validate()) {
                    e.preventDefault();
                }

                // Hide the hidden input again

                $('#img_id').removeClass('visible');
                $('#footer_img_id').removeClass('visible');
                $('#site_favicon_img_required').removeClass('visible');
                $('#bg_img_id_cta').removeClass('visible');

            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/settings/index.blade.php ENDPATH**/ ?>