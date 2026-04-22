<?php $__env->startSection('main_content'); ?>
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <form action="<?php echo e(route('about.add')); ?>" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($about)): ?>
                                <input type="hidden" name="about_id" value="<?php echo e(isset($about->id) ? $about->id : ''); ?>">
                            <?php endif; ?>
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                    <div class="card Recent-Users">
                                        <h5>About Page Settings</h5>
                                        <div class="card-block px-0 py-3">





                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec"">
                                                    <label for="">Meta Title </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="meta_title" id="meta_title"
                                                        placeholder="Title"
                                                        value="<?php echo e(isset($about->meta_title) ? $about->meta_title : ''); ?>"
                                                        data-parsley-required-message="Please Enter Title">
                                                </div>
                                                </div>

                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec"">
                                                        <label for="">Meta Keyword</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <input type="text" name="meta_keyword" id="meta_keyword"
                                                            placeholder="Sub Title"
                                                            value="<?php echo e(isset($about->meta_keyword) ? $about->meta_keyword : ''); ?>"
                                                            data-parsley-required-message="Please Enter Sub Title">
                                                    </div>
                                                </div>

                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Meta Description</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                        <textarea class="form-control" id="meta_description" name="meta_description" style="height: 150px;"
                                                            data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Description"><?php echo e(isset($about->meta_description) ? $about->meta_description : ''); ?></textarea>
                                                    </div>
                                                </div>
                                            

                                        
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="title"
                                                    value="<?php echo e(isset($about->title) ? $about->title : ''); ?>">
                                                <label for="title">About Page Title <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="title" id="title"
                                                    placeholder="About Page Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($about->title) ? $about->title : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="description">Description <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="description" name="description" style="height: 150px;" data-parsley-required="true"
                                                    data-parsley-required-message="Please enter Description" data-parsley-errors-container="#description_required"><?php echo e(isset($about->description) ? $about->description : ''); ?></textarea>
                                                <span id="description_required"></span>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="missiontitle"
                                                    value="<?php echo e(isset($about->missiontitle) ? $about->missiontitle : ''); ?>">
                                                <label for="missiontitle">Section 2 Title <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="missiontitle" id="missiontitle"
                                                    placeholder="About Page Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($about->missiontitle) ? $about->missiontitle : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="missiondescription">Section 2 Description <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="missiondescription" name="missiondescription" style="height: 150px;"
                                                    data-parsley-required="true" data-parsley-required-message="Please enter Description"
                                                    data-parsley-errors-container="#missiondescription_required"><?php echo e(isset($about->missiondescription) ? $about->missiondescription : ''); ?></textarea>
                                                <span id="missiondescription_required"></span>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="missionbutton"
                                                    value="<?php echo e(isset($about->missionbutton) ? $about->missionbutton : ''); ?>">
                                                <label for="missionbutton">Section 2 Button <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="missionbutton" id="missionbutton"
                                                    placeholder="Button Name"
                                                    data-parsley-required-message="Please Enter Button Title"
                                                    value="<?php echo e(isset($about->missionbutton) ? $about->missionbutton : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="missionbuttonurl"
                                                    value="<?php echo e(isset($about->missionbuttonurl) ? $about->missionbuttonurl : ''); ?>">
                                                <label for="missionbuttonurl">Section 2 Button Url<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="missionbuttonurl" id="missionbuttonurl"
                                                    placeholder="Button URL"
                                                    data-parsley-required-message="Please Enter Url"
                                                    value="<?php echo e(isset($about->missionbuttonurl) ? $about->missionbuttonurl : ''); ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="teamtitle" value="<?php echo e(isset($about->teamtitle) ? $about->teamtitle : ''); ?>">
                                                <label for="teamtitle">Section 3 Title <span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="teamtitle" id="teamtitle" placeholder="Team Section Title" required
                                                   data-parsley-required-message="Please Enter Team Section Title" value="<?php echo e(isset($about->teamtitle) ? $about->teamtitle : ''); ?>">
                                             </div>
                                          </div> -->
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="teamdescription">Section 3 Description <span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="teamdescription" name="teamdescription" style="height: 150px;"
                                                    data-parsley-required="true" data-parsley-required-message="Please enter Description"
                                                    data-parsley-errors-container="#teamdescription_required"><?php echo e(isset($about->teamdescription) ? $about->teamdescription : ''); ?></textarea>
                                                <span id="teamdescription_required"></span>
                                             </div>
                                          </div> -->
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="button1" value="<?php echo e(isset($about->button1) ? $about->button1 : ''); ?>">
                                                <label for="button1">Section 3 Button <span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="button1" id="button1" placeholder="Button Name"
                                                   data-parsley-required-message="Please Enter Button Title" value="<?php echo e(isset($about->button1) ? $about->button1 : ''); ?>">
                                             </div>
                                          </div> -->
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="button1url" value="<?php echo e(isset($about->button1url) ? $about->button1url : ''); ?>">
                                                <label for="button1url">Section 3 Button Url<span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="button1url" id="button1url" placeholder="Button URL"
                                                   data-parsley-required-message="Please Enter Url" value="<?php echo e(isset($about->button1url) ? $about->button1url : ''); ?>">
                                             </div>
                                          </div> -->
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="button2" value="<?php echo e(isset($about->button2) ? $about->button2 : ''); ?>">
                                                <label for="button2">Section 3 Call Button <span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="button2" id="button2" placeholder="Button Name"
                                                   data-parsley-required-message="Please Enter Button Title" value="<?php echo e(isset($about->button2) ? $about->button2 : ''); ?>">
                                             </div>
                                          </div> -->
                                        <!-- <div class="row form-sec">
                                             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="button2url" value="<?php echo e(isset($about->button2url) ? $about->button2url : ''); ?>">
                                                <label for="button2url">Section 3 Call Button Url<span style="color: red;margin: 0;">*</span></label>
                                             </div>
                                             <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="button2url" id="button2url" placeholder="Button URL"
                                                   data-parsley-required-message="Please Enter Url" value="<?php echo e(isset($about->button2url) ? $about->button2url : ''); ?>">
                                             </div>
                                          </div> -->
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="historytitle"
                                                    value="<?php echo e(isset($about->historytitle) ? $about->historytitle : ''); ?>">
                                                <label for="historytitle">History Section Title <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="historytitle" id="historytitle"
                                                    placeholder="History Section Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($about->historytitle) ? $about->historytitle : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="historysubtitle"
                                                    value="<?php echo e(isset($about->historysubtitle) ? $about->historysubtitle : ''); ?>">
                                                <label for="historysubtitle">History Section Title <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="historysubtitle" id="historysubtitle"
                                                    placeholder="History Section Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($about->historysubtitle) ? $about->historysubtitle : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="historydescription">History Section Description <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="historydescription" name="historydescription" style="height: 150px;"
                                                    data-parsley-required="true" data-parsley-required-message="Please enter Description"
                                                    data-parsley-errors-container="#historydescription_required"><?php echo e(isset($about->historydescription) ? $about->historydescription : ''); ?></textarea>
                                                <span id="historydescription_required"></span>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="historybutton"
                                                    value="<?php echo e(isset($about->historybutton) ? $about->historybutton : ''); ?>">
                                                <label for="historybutton">Section 4 Button <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="historybutton" id="historybutton"
                                                    placeholder="Button Name"
                                                    data-parsley-required-message="Please Enter Button Title"
                                                    value="<?php echo e(isset($about->historybutton) ? $about->historybutton : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="historybuttonurl"
                                                    value="<?php echo e(isset($about->historybuttonurl) ? $about->historybuttonurl : ''); ?>">
                                                <label for="historybuttonurl">Section 4 Button Url<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="historybuttonurl" id="historybuttonurl"
                                                    placeholder="Button URL"
                                                    data-parsley-required-message="Please Enter Url"
                                                    value="<?php echo e(isset($about->historybuttonurl) ? $about->historybuttonurl : ''); ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card Recent-Users next-box">
                                    <h5>Mission & Values</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 1</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_1" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_1) ? $mission_values->mv_title_1 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 1</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_1" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_1) ? $mission_values->mv_description_1 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 1</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_1" id="mv_icon_1"
                                                        value="<?php echo e(isset($mission_values->mv_icon_1) ? $mission_values->mv_icon_1 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_1) && $mission_values->mv_icon_1 != '' && $mission_values->mv_icon_1 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_1)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon1_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon1_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon1_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon1_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_1">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_1) && $mission_values->mv_icon_1 != '' && $mission_values->mv_icon_1 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 2</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_2" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_2) ? $mission_values->mv_title_2 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 2</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_2" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_2) ? $mission_values->mv_description_2 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 2</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_2" id="mv_icon_2"
                                                        value="<?php echo e(isset($mission_values->mv_icon_2) ? $mission_values->mv_icon_2 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_2) && $mission_values->mv_icon_2 != '' && $mission_values->mv_icon_2 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_2)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon2_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon2_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon2_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon2_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_2">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_2) && $mission_values->mv_icon_2 != '' && $mission_values->mv_icon_2 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 3</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_3" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_3) ? $mission_values->mv_title_3 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 3</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_3" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_3) ? $mission_values->mv_description_3 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 3</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_3" id="mv_icon_3"
                                                        value="<?php echo e(isset($mission_values->mv_icon_3) ? $mission_values->mv_icon_3 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_3) && $mission_values->mv_icon_3 != '' && $mission_values->mv_icon_3 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_3)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon3_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon3_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon3_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon3_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_3">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_3) && $mission_values->mv_icon_3 != '' && $mission_values->mv_icon_3 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 4</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_4" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_4) ? $mission_values->mv_title_4 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 4</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_4" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_4) ? $mission_values->mv_description_4 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 4</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_4" id="mv_icon_4"
                                                        value="<?php echo e(isset($mission_values->mv_icon_4) ? $mission_values->mv_icon_4 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_4) && $mission_values->mv_icon_4 != '' && $mission_values->mv_icon_4 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_4)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon4_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon4_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon4_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon4_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_4">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_4) && $mission_values->mv_icon_4 != '' && $mission_values->mv_icon_4 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 5</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_5" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_5) ? $mission_values->mv_title_5 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 5</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_5" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_5) ? $mission_values->mv_description_5 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 5</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_5" id="mv_icon_5"
                                                        value="<?php echo e(isset($mission_values->mv_icon_5) ? $mission_values->mv_icon_5 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_5) && $mission_values->mv_icon_5 != '' && $mission_values->mv_icon_5 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_5)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon5_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon5_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon5_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon5_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_5">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_5) && $mission_values->mv_icon_5 != '' && $mission_values->mv_icon_5 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 6</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="mv_title_6" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($mission_values->mv_title_6) ? $mission_values->mv_title_6 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 6</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="mv_description_6" id="" rows="5" cols="10"><?php echo e(isset($mission_values->mv_description_6) ? $mission_values->mv_description_6 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 6</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="mv_icon_6" id="mv_icon_6"
                                                        value="<?php echo e(isset($mission_values->mv_icon_6) ? $mission_values->mv_icon_6 : ''); ?>">
                                                    <?php if(isset($mission_values->mv_icon_6) && $mission_values->mv_icon_6 != '' && $mission_values->mv_icon_6 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $mission_values->mv_icon_6)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="mvicon6_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon6_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="mvicon6_banner_avtar"
                                                                class="profile-img">
                                                            <a id="mvicon6_banner_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="mv_icon_6">Choose image</label>
                                                    <?php if(isset($mission_values->mv_icon_6) && $mission_values->mv_icon_6 != '' && $mission_values->mv_icon_6 != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="card Recent-Users next-box">
                                    <h5>Our History</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Our History Title </label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="our_history_title" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($about->our_history_title) ? $about->our_history_title : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Our History Description </label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea name="our_history_desc" id="our_history_desc" rows="5" cols="10"><?php echo e(isset($about->our_history_desc) ? $about->our_history_desc : ''); ?></textarea>
                                            </div>
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
                                <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                    <h5>About Banner Background</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="upload-img-sec text-center image_preview_div">
                                                    <input type="hidden" name="bannerimage" id="img_id"
                                                        value="<?php echo e(isset($about->bannerimage) ? $about->bannerimage : ''); ?>"
                                                        data-parsley-errors-container="#site_img_required"data-parsley-trigger="change"
                                                        data-parsley-required-message="Please choose an image.">
                                                    <?php if(isset($about->bannerimage) && $about->bannerimage != '' && $about->bannerimage != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $about->bannerimage)
                                                                ->first();
                                                        ?>
                                                        <?php if(isset($img->name) && $img->name != ''): ?>
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="profile_avtar" class="profile-img">
                                                            <a id="remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="profile_avtar" class="profile-img">
                                                            <a id="remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                            alt="" id="profile_avtar" class="profile-img">
                                                        <a id="remove_image" style="display: none;"> <i
                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title">Choose image</label>
                                                </div>
                                                <span class="error_field" id="site_img_required"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                    <h5>Our Team Section</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="upload-img-sec text-center">
                                                    <input type="hidden" name="teambackground" id="footer_img_id"
                                                        value="<?php echo e(isset($about->teambackground) ? $about->teambackground : ''); ?>"
                                                        data-parsley-errors-container="#teambackground_img_required"data-parsley-trigger="change"
                                                        data-parsley-required-message="Please choose an image.">
                                                    <?php if(isset($about->teambackground) && $about->teambackground != '' && $about->teambackground != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $about->teambackground)
                                                                ->first();
                                                        ?>
                                                        <?php if(isset($img->name) && $img->name != ''): ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="footer_profile_avtar"
                                                                    class="profile-img">
                                                                <a id="footer_remove_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="footer_profile_avtar"
                                                                    class="profile-img">
                                                                <a id="footer_remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="footer_profile_avtar"
                                                                class="profile-img">
                                                            <a id="footer_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        data-val="footer_profile_avtar"
                                                        class="choose_file hm-choose-img-title">Choose image</label>
                                                </div>
                                                <span class="error_field" id="teambackground_img_required"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                    <h5>History Section Image</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="upload-img-sec text-center">
                                                    <input type="hidden" name="historyimage" id="favicon_id"
                                                        value="<?php echo e(isset($about->historyimage) ? $about->historyimage : ''); ?>"
                                                        required data-parsley-errors-container="#site_favicon_img_required"
                                                        data-parsley-trigger="change"
                                                        data-parsley-required-message="Please choose an image.">
                                                    <?php if(isset($about->historyimage) && $about->historyimage != '' && $about->historyimage != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $about->historyimage)
                                                                ->first();
                                                            if (isset($img) && $img != '' && $img != null) {
                                                                $path = asset('uploads/' . $img->name);
                                                            } else {
                                                                $path = asset('assets/images/user/img-demo_1041.jpg');
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
                                                                alt="" id="favicon_avtar" class="profile-img">
                                                            <a id="remove_favi_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
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
                            </div>
                    </div>
                    </form>
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
            $('#our_history_desc').summernote({
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
        $('#mvicon1_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_1').val(null);
            $('#mvicon1_banner_avtar').attr('src', assetPath);
            $('#mvicon1_banner_remove_image').css('display', 'none');
            $('#mvicon1_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon2_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_2').val(null);
            $('#mvicon2_banner_avtar').attr('src', assetPath);
            $('#mvicon2_banner_remove_image').css('display', 'none');
            $('#mvicon2_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_3').val(null);
            $('#mvicon3_banner_avtar').attr('src', assetPath);
            $('#mvicon3_banner_remove_image').css('display', 'none');
            $('#mvicon3_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_3').val(null);
            $('#mvicon4_banner_avtar').attr('src', assetPath);
            $('#mvicon4_banner_remove_image').css('display', 'none');
            $('#mvicon4_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon5_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_5').val(null);
            $('#mvicon5_banner_avtar').attr('src', assetPath);
            $('#mvicon5_banner_remove_image').css('display', 'none');
            $('#mvicon5_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon6_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_6').val(null);
            $('#mvicon6_banner_avtar').attr('src', assetPath);
            $('#mvicon6_banner_remove_image').css('display', 'none');
            $('#mvicon6_banner_avtar').css('opacity', '1.0');
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

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/about/index.blade.php ENDPATH**/ ?>