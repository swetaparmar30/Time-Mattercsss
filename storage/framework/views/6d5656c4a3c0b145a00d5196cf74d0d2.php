<?php $__env->startSection('main_content'); ?>

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <form action="<?php echo e(route('homepage_setting.store')); ?>" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data" id="home_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="home_id" value="<?php echo e(isset($home->id) ? $home->id : ''); ?>">
                            <div class="row">
                                <div
                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                    <div class="card Recent-Users">
                                        <div class="d-flex justify-content-between">
                                            <h5>Home Page Settings</h5>
                                            <button type="submit" class="btn btn-lg btn-primary" id="submit_form">Update
                                                Settings</button>
                                        </div>
                                        <div class="card-block px-0 py-3">



                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Banner Section </label>
                                                    </div>
                                                    <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                            <label class="switch">
                                                                <input type="checkbox" id="servicesecbutton"
                                                                    name="banner_checked"
                                                                    <?php if(isset($banner->checked) && $banner->checked == 1): ?> checked <?php endif; ?>>
                                                                <div class="slider round">
                                                                    <span class="on">Enable</span>
                                                                    <span class="off">Disable</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="servicesecbutton"
                                                                    name="banner_checked"
                                                                    <?php if(isset($banner->checked) && $banner->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>
                                                    <div class="accordion" id="accordionExample2"
                                                        <?php if($banner == null || $banner->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingtwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#collapsetwo"
                                                                    aria-expanded="true" aria-controls="collapsetwo">
                                                                    Banner Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsetwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingtwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="banner_title"
                                                                                        id="banner_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($banner->banner_title) ? $banner->banner_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub title</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="banner_subtitle"
                                                                                        id="banner_subtitle"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($banner->banner_subtitle) ? $banner->banner_subtitle : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Banner
                                                                                        Content</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" id="banner_description" name="banner_description" style="height: 150px;"
                                                                                        data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Description"><?php echo e(isset($banner->banner_description) ? $banner->banner_description : ''); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Banner
                                                                                        Image</label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="banner_img"
                                                                                            id="video_sec_img_id_video_sec_id"
                                                                                            value="<?php echo e(isset($banner->banner_img) ? $banner->banner_img : ''); ?>">
                                                                                        <?php if(isset($banner->banner_img) && $banner->banner_img != '' && $banner->banner_img != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $banner->banner_img,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="video_sec_profile_avtar_video_sec_id"
                                                                                                    class="profile-img">
                                                                                                <a id="video_sec_img_id_video_sec_id"
                                                                                                    data-val="video_sec"
                                                                                                    data-id="video_sec_id"
                                                                                                    class="remove_image_media">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="video_sec_profile_avtar_video_sec_id"
                                                                                                    class="profile-img">
                                                                                                <a id="video_sec_img_id_video_sec_id"
                                                                                                    style="display: none;"
                                                                                                    class="remove_image_media"
                                                                                                    data-val="video_sec"
                                                                                                    data-id="video_sec_id">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="video_sec"
                                                                                            data-id="video_sec_id"> Choose
                                                                                            image</label>


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>



                                                                        <div
                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Medium
                                                                                        (1100x480)</label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="banner_img_1100x480"
                                                                                            id="footer_img_id"
                                                                                            value="<?php echo e(isset($banner->banner_img_1100x480) ? $banner->banner_img_1100x480 : ''); ?>">
                                                                                        <?php if(isset($banner->banner_img_1100x480) && $banner->banner_img_1100x480 != '' && $banner->banner_img_1100x480 != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $banner->banner_img_1100x480,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="footer_profile_avtar"
                                                                                                    class="profile-img">
                                                                                                <a
                                                                                                    id="footer_remove_image">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="footer_profile_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="footer_remove_image"
                                                                                                    style="display: none;">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="footer_profile_avtar">Choose
                                                                                            image</label>
                                                                                        <?php if(isset($banner->banner_img_1100x480) && $banner->banner_img_1100x480 != '' && $banner->banner_img_1100x480 != null): ?>
                                                                                        <?php else: ?>
                                                                                            <span id="img_alert1"
                                                                                                class="parsley-required"
                                                                                                style="font-weight: 500 !important;color: red !important;"></span>
                                                                                        <?php endif; ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Mobile Banner
                                                                                        Image </label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="mobile_banner_img"
                                                                                            id="mobile_banner_img"
                                                                                            value="<?php echo e(isset($banner->mobile_banner_img) ? $banner->mobile_banner_img : ''); ?>">
                                                                                        <?php if(isset($banner->mobile_banner_img) && $banner->mobile_banner_img != '' && $banner->mobile_banner_img != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $banner->mobile_banner_img,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="mobile_banner_avtar"
                                                                                                    class="profile-img">
                                                                                                <a
                                                                                                    id="mobile_banner_remove_image">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="mobile_banner_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="mobile_banner_remove_image"
                                                                                                    style="display: none;">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="mobile_banner_img">Choose
                                                                                            image</label>

                                                                                        <?php if(isset($faq->mobile_banner_img) && $faq->mobile_banner_img != '' && $faq->mobile_banner_img != null): ?>
                                                                                        <?php else: ?>
                                                                                            <span id="img_alert1"
                                                                                                class="parsley-required"
                                                                                                style="font-weight: 500 !important;color: red !important;"></span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                                                <div class="row form-sec">
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                                        <label for="">Banner Form Title</label>
                                                                                                    </div>
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <input type="text" name="banner_formtitle" id="banner_formtitle" placeholder="Form Title"  value="<?php echo e(isset($banner->banner_formtitle) ? $banner->banner_formtitle : ''); ?>" data-parsley-required-message="Please Enter Form Title">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                                                <div class="row form-sec">
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                                        <label for="">Form Submit Button Label</label>
                                                                                                    </div>
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <input type="text" name="button_label" id="button_label" placeholder="Button Label"  value="<?php echo e(isset($banner->button_label) ? $banner->button_label : ''); ?>" data-parsley-required-message="Please Enter Button Label">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">About Section</label>
                                                </div>

                                                <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="aboutsecbutton"
                                                                name="system_setting_checked"
                                                                <?php if(isset($system_setting->checked) && $system_setting->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <input type="hidden" id="aboutsecbutton"
                                                                name="system_setting_checked"
                                                                <?php if(isset($system_setting->checked) && $system_setting->checked == 1): ?> value="on" <?php endif; ?>>
                                                <?php endif; ?>

                                                <div class="accordion" id="accordionExample"
                                                    <?php if($system_setting == null || $system_setting->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                About Section Options
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne" class="accordion-collapse collapse"
                                                            aria-labelledby="headingOne"
                                                            data-bs-parent="#accordionExample">
                                                            <?php echo $__env->make('settings.system_setting_sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Garage Door Maintenance</label>
                                                </div>
                                                <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="storysecbutton"
                                                                name="residential_checked"
                                                                <?php if(isset($residential->checked) && $residential->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <input type="hidden" id="storysecbutton"
                                                                name="residential_checked"
                                                                <?php if(isset($residential->checked) && $residential->checked == 1): ?> value="on" <?php endif; ?>>
                                                <?php endif; ?>

                                                <div class="accordion" id="accordionExample3"
                                                    <?php if($residential == null || $residential->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingthree">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsethree"
                                                                aria-expanded="true" aria-controls="collapsethree">
                                                                Garage Door Maintenance Setting
                                                            </button>
                                                        </h2>
                                                        <div id="collapsethree" class="accordion-collapse collapse"
                                                            aria-labelledby="headingthree"
                                                            data-bs-parent="#accordionExample">
                                                            <?php echo $__env->make('settings.residential_sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php endif; ?>




                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Service Section </label>
                                                    </div>
                                                    <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                            <label class="switch">
                                                                <input type="checkbox" class="accordian-checkbox"
                                                                    id="servicedataSecbutton" name="service_sec_checked"
                                                                    <?php if(isset($services->checked) && $services->checked == 1): ?> checked <?php endif; ?>>
                                                                <div class="slider round">
                                                                    <span class="on">Enable</span>
                                                                    <span class="off">Disable</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="servicedataSecbutton"
                                                                    name="service_sec_checked"
                                                                    <?php if(isset($services->checked) && $services->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>
                                                    <div class="accordion" id="serviceSecAccordionBody"
                                                        <?php if($services == null || $services->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="serviceheadingtwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#servicescollapsetwo"
                                                                    aria-expanded="true"
                                                                    aria-controls="servicescollapsetwo">
                                                                    Service Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="servicescollapsetwo"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="serviceheadingtwo"
                                                                data-bs-parent="#accordionExample">


                                                                <?php echo $__env->make('settings.service-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Common Garage Door Problems </label>
                                                </div>
                                                <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="doorsecbutton"
                                                                name="door_title_sec_checked"
                                                                <?php if(isset($garage_door->checked) && $garage_door->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round">
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <input type="hidden" id="doorsecbutton"
                                                                name="door_title_sec_checked"
                                                                <?php if(isset($garage_door->checked) && $garage_door->checked == 1): ?> value="on" <?php endif; ?>>
                                                <?php endif; ?>
                                                <div class="accordion" id="accordionExample9"
                                                    <?php if($garage_door == null || $garage_door->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingnine">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsenine"
                                                                aria-expanded="true" aria-controls="collapsenine">
                                                                Common Garage Door Problems Section Setting
                                                            </button>
                                                        </h2>
                                                        <div id="collapsenine" class="accordion-collapse collapse"
                                                            aria-labelledby="headingfour"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div
                                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Title </label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" name="door_title"
                                                                                    id="door_title" placeholder="Title"
                                                                                    value="<?php echo e(isset($garage_door->door_title) ? $garage_door->door_title : ''); ?>"
                                                                                    data-parsley-required-message="Please Enter Title">
                                                                            </div>
                                                                        </div>
                                                                        <!--  <div class="row form-sec">
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                                        <label for="">Button Name</label>
                                                                                                    </div>
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <input type="text" name="door_button_name" id="door_button_name" placeholder="Sub Title"  value="<?php echo e(isset($garage_door->button_name) ? $garage_door->inquire_button_name : ''); ?>" data-parsley-required-message="Please Enter Sub Title">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row form-sec">
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                                        <label for="">Button Url</label>
                                                                                                    </div>
                                                                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <input type="text" name="door_button_url" id="door_button_url" placeholder="Button Url"  value="<?php echo e(isset($garage_door->door_button_url) ? $garage_door->door_button_url : ''); ?>" data-parsley-required-message="Please Enter Button Url">
                                                                                                    </div>
                                                                                                </div> -->
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Button Name</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text"
                                                                                    name="resi_button_name"
                                                                                    id="resi_button_name"
                                                                                    placeholder="Button Name"
                                                                                    value="<?php echo e(isset($residential->resi_button_name) ? $residential->resi_button_name : ''); ?>"
                                                                                    data-parsley-required-message="Please Enter Button Name">
                                                                                <span id="content_required"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Button Url</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text"
                                                                                    name="resi_button_url"
                                                                                    id="resi_button_url"
                                                                                    placeholder="Button Url"
                                                                                    value="<?php echo e(isset($residential->resi_button_url) ? $residential->resi_button_url : ''); ?>"
                                                                                    data-parsley-required-message="Please Enter Button Url">

                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Image</label>
                                                                                <div class="upload-img-sec">
                                                                                    <input type="hidden"
                                                                                        name="garage_img" id="img_id"
                                                                                        value="<?php echo e(isset($garage_door->garage_img) ? $garage_door->garage_img : ''); ?>">
                                                                                    <?php if(isset($garage_door->garage_img) && $garage_door->garage_img != '' && $garage_door->garage_img != null): ?>
                                                                                        <?php
                                                                                            $img = App\Models\MediaImage::select(
                                                                                                'name',
                                                                                            )
                                                                                                ->where(
                                                                                                    'id',
                                                                                                    $garage_door->garage_img,
                                                                                                )
                                                                                                ->first();
                                                                                        ?>
                                                                                        <div class="image_preview_div">
                                                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                alt=""
                                                                                                id="profile_avtar"
                                                                                                class="profile-img">
                                                                                            <a id="remove_image"> <i
                                                                                                    class="fa fa-times"
                                                                                                    aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    <?php else: ?>
                                                                                        <div class="image_preview_div">
                                                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                alt=""
                                                                                                id="profile_avtar"
                                                                                                class="profile-img">
                                                                                            <a id="remove_image"
                                                                                                style="display: none;"> <i
                                                                                                    class="fa fa-times"
                                                                                                    aria-hidden="true"></i></a>
                                                                                        </div>
                                                                                    <?php endif; ?>

                                                                                    <label for=""
                                                                                        style="cursor: pointer;"
                                                                                        class="choose_file hm-choose-img-title">Choose
                                                                                        image</label>
                                                                                    <?php if(isset($garage_door->garage_img) && $garage_door->garage_img != '' && $garage_door->garage_img != null): ?>
                                                                                    <?php else: ?>
                                                                                        <span id="img_alert"
                                                                                            class="parsley-required"
                                                                                            style="font-weight: 500 !important;color: red !important;">
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Sub Title </label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text"
                                                                                    name="door_sub_title"
                                                                                    id="door_sub_title"
                                                                                    placeholder="Sub Title"
                                                                                    value="<?php echo e(isset($garage_door->door_sub_title) ? $garage_door->door_sub_title : ''); ?>"
                                                                                    data-parsley-required-message="Please Enter Sub Title">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Description</label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <textarea class="form-control rich-text-editor" id="garage_door_description" name="garage_door_description"
                                                                                    style="height: 300px;" data-parsley-errors-container="#content_required1"
                                                                                    data-parsley-required-message="Please Enter Description"><?php echo e(isset($garage_door->garage_door_description) ? $garage_door->garage_door_description : ''); ?></textarea>
                                                                                <span id="content_required1"
                                                                                    class="parsley-required"
                                                                                    style="font-weight: 500 !important;"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Call To action </label>
                                                    </div>
                                                    <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="calltoactionbutton"
                                                                name="calltoaction_checked"
                                                                <?php if(isset($calltoaction->checked) && $calltoaction->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="calltoactionbutton"
                                                                name="calltoaction_checked"
                                                                <?php if(isset($calltoaction->checked) && $calltoaction->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>
                                                    <div class="accordion" id="accordionExample4"
                                                        <?php if($calltoaction == null || $calltoaction->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingfours">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefours" aria-expanded="true"
                                                                    aria-controls="collapsefour">
                                                                    Call to Action Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefours" class="accordion-collapse collapse"
                                                                aria-labelledby="headingfours"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="calltoaction_title"
                                                                                        id="calltoaction_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($calltoaction->calltoaction_title) ? $calltoaction->calltoaction_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="calltosub_title"
                                                                                        id="calltosub_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($calltoaction->calltosub_title) ? $calltoaction->calltosub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="cl_button_name"
                                                                                        id="call_button_name"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($calltoaction->button_name) ? $calltoaction->button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="cl_button_url"
                                                                                        id="call_button_url"
                                                                                        placeholder="Button Url"
                                                                                        value="<?php echo e(isset($calltoaction->button_url) ? $calltoaction->button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Call Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="call_button_name"
                                                                                        id="call_button_name"
                                                                                        placeholder="Call Button Name"
                                                                                        value="<?php echo e(isset($calltoaction->call_button_name) ? $calltoaction->call_button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Call Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="call_button_url"
                                                                                        id="call_button_url"
                                                                                        placeholder="Call Button Url"
                                                                                        value="<?php echo e(isset($calltoaction->call_button_url) ? $calltoaction->call_button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label
                                                                                        for="">Description</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" id="call_button_desc" name="call_button_desc" style="height: 300px;"
                                                                                        data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Description"><?php echo e(isset($calltoaction->call_button_desc) ? $calltoaction->call_button_desc : ''); ?></textarea>
                                                                                    <span id="content_required"
                                                                                        class="parsley-required"
                                                                                        style="font-weight: 500 !important;"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Need a New Garage Door? </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="newsecbutton"
                                                                name="newgarage_sec_checked"
                                                                <?php if(isset($newgarage->checked) && $newgarage->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample13"
                                                        <?php if($newgarage == null || $newgarage->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingthirteen">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsethirteen"
                                                                    aria-expanded="true" aria-controls="collapsethirteen">
                                                                    Need a New Garage Door Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsethirteen" class="accordion-collapse collapse"
                                                                aria-labelledby="headingthirteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="newgarage_title"
                                                                                        id="newgarage_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($newgarage->newgarage_title) ? $newgarage->newgarage_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row form-sec">
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                <label for="">Short Description
                                                                                </label>
                                                                            </div>
                                                                            <div
                                                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <textarea class="form-control rich-text-editor" name="newgarage_desc" id="newgarage_desc" rows="4" cols="50"
                                                                                    data-parsley-required-message="Please Enter Short Description"><?php echo e(isset($newgarage->newgarage_desc) ? $newgarage->newgarage_desc : ''); ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Design Center Section </label>
                                                    </div>
                                                    <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox"
                                                                id="marriedsecbutton"name="design_sec_checked"
                                                                <?php if(isset($design->checked) && $design->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="marriedsecbutton"
                                                                name="design_sec_checked"
                                                                <?php if(isset($design->checked) && $design->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>
                                                    <div class="accordion" id="accordionExample5"
                                                        <?php if($design == null || $design->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingfive">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefive" aria-expanded="true"
                                                                    aria-controls="collapsefive">
                                                                    Design Center Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefive" class="accordion-collapse collapse"
                                                                aria-labelledby="headingfive"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="design_title"
                                                                                        id="design_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($design->design_title) ? $design->design_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                           
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Short Description
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" name="design_description" id="form_short_desc" rows="4" cols="50"
                                                                                        data-parsley-required-message="Please Enter Short Description"><?php echo e(isset($design->design_description) ? $design->design_description : ''); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                             <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="design_sub_title"
                                                                                        id="design_sub_title1"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($design->design_sub_title) ? $design->design_sub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="button_name"
                                                                                        id="call_button_name"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($design->button_name) ? $design->button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="button_url"
                                                                                        id="call_button_url"
                                                                                        placeholder="Button Url"
                                                                                        value="<?php echo e(isset($design->button_url) ? $design->button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Image</label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="design_img"
                                                                                            id="favicon_id"
                                                                                            value="<?php echo e(isset($design->design_img) ? $design->design_img : ''); ?>">
                                                                                        <?php if(isset($design->design_img) && $design->design_img != '' && $design->design_img != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $design->design_img,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="favicon_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="remove_favi_image">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="favicon_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="remove_favi_image"
                                                                                                    style="display: none;">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="faviconimg">Choose
                                                                                            image</label>
                                                                                        <?php if(isset($design->design_img) && $design->design_img != '' && $design->design_img != null): ?>
                                                                                        <?php else: ?>
                                                                                            <span id="favicon_alert"
                                                                                                class="parsley-required"
                                                                                                style="font-weight: 500 !important;color: red !important;">Please
                                                                                                Add Image </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php endif; ?>

                                            

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Why choose sec Section</label>
                                                </div>

                                                <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="whychoosesection"
                                                                name="why_choose_checked"
                                                                <?php if(isset($why_choose->checked) && $why_choose->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <input type="hidden" id="whychoosesection"
                                                            name="why_choose_checked"
                                                            <?php if(isset($why_choose->checked) && $why_choose->checked == 1): ?> value="on" <?php endif; ?>>
                                                <?php endif; ?>

                                                <div class="accordion" id="why_choose_accordionExample"
                                                    <?php if($why_choose == null || $why_choose->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="why_choose_heading">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#why_choose_collapseOne"
                                                                aria-expanded="true"
                                                                aria-controls="why_choose_collapseOne">
                                                                Why Choose Section setting
                                                            </button>
                                                        </h2>
                                                        <div id="why_choose_collapseOne"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="why_choose_heading"
                                                            data-bs-parent="#accordionExample">
                                                            <?php echo $__env->make('settings.why-choose-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Time Master Gallery Section </label>
                                                    </div>

                                                    <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                            <label class="switch">
                                                                <input type="checkbox" id="gallerysecbutton"
                                                                    name="gallery_sec_checked"
                                                                    <?php if(isset($gallery->checked) && $gallery->checked == 1): ?> checked <?php endif; ?>>
                                                                <div class="slider round"><!--ADDED HTML -->
                                                                    <span class="on">Enable</span>
                                                                    <span class="off">Disable</span><!--END-->
                                                                </div>
                                                            </label>
                                                        </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="gallerysecbutton"
                                                                name="gallery_sec_checked"
                                                                <?php if(isset($gallery->checked) && $gallery->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>

                                                    <div class="accordion" id="accordionExample6"
                                                        <?php if($gallery == null || $gallery->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingsix">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#collapsesix"
                                                                    aria-expanded="true" aria-controls="collapsesix">
                                                                    Time Master Gallery Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsesix" class="accordion-collapse collapse"
                                                                aria-labelledby="headingsix"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text" name="gallery_title"
                                                                                        id="gallery_title" placeholder="Title"
                                                                                        value="<?php echo e(isset($gallery->gallery_title) ? $gallery->gallery_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="gallery_sub_title"
                                                                                        id="gallery_sub_title"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($gallery->gallery_sub_title) ? $gallery->gallery_sub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                                                    <div class="row form-sec">
                                                                                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">No Of Images</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                            <input type="number" name="gallery_count" id="gallery_count" placeholder="No Of Images"  value="<?php echo e(isset($gallery->gallery_count) ? $gallery->gallery_count : ''); ?>" data-parsley-required-message="Please Enter Sub Title">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Testimonial Section </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="testimonialbutton"
                                                                name="testimonial_sec_checked"
                                                                <?php if(isset($testimonial->checked) && $testimonial->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample14"
                                                        <?php if($testimonial == null || $testimonial->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingcollapsefourteen">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefourteen"
                                                                    aria-expanded="true" aria-controls="collapsefourteen">
                                                                    Testimonial Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefourteen" class="accordion-collapse collapse"
                                                                aria-labelledby="headingcollapsefourteen"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="testimonial_title"
                                                                                        id="testimonial_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($testimonial->testimonial_title) ? $testimonial->testimonial_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Areas We Serve </label>
                                                    </div>
                                                    <?php if(!in_array(auth()->user()->role, ['dealer','marketing'])): ?>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="testisecbutton"
                                                                name="areas_checked"
                                                                <?php if(isset($areas->checked) && $areas->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <?php else: ?>
                                                        <input type="hidden" id="testisecbutton"
                                                                name="areas_checked"
                                                                <?php if(isset($areas->checked) && $areas->checked == 1): ?> value="on" <?php endif; ?>>
                                                    <?php endif; ?>
                                                    <div class="accordion" id="accordionExample4"
                                                        <?php if($areas == null || $areas->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingfour">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefour" aria-expanded="true"
                                                                    aria-controls="collapsefour">
                                                                    Areas We Serve Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefour" class="accordion-collapse collapse"
                                                                aria-labelledby="headingfour"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="areas_title"
                                                                                        id="areas_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($areas->areas_title) ? $areas->areas_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="areas_button_name"
                                                                                        id="areas_button_name"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($areas->areas_button_name) ? $areas->areas_button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="areas_button_url"
                                                                                        id="areas_button_url"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($areas->design_button_url) ? $areas->design_button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Image</label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="areas_img"
                                                                                            id="story_img_id"
                                                                                            value="<?php echo e(isset($areas->areas_img) ? $areas->areas_img : ''); ?>">
                                                                                        <?php if(isset($areas->areas_img) && $areas->areas_img != '' && $areas->areas_img != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $areas->areas_img,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="profile_avtar_story"
                                                                                                    class="profile-img">
                                                                                                <a id="story_remove_image">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="profile_avtar_story"
                                                                                                    class="profile-img">
                                                                                                <a id="story_remove_image"
                                                                                                    style="display: none;">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="story_img">Choose
                                                                                            image</label>
                                                                                        <?php if(isset($areas->areas_img) && $areas->areas_img != '' && $areas->areas_img != null): ?>
                                                                                        <?php else: ?>
                                                                                            <span id="img_alert1"
                                                                                                class="parsley-required"
                                                                                                style="font-weight: 500 !important;color: red !important;">
                                                                                            </span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label
                                                                                        for="">Description</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" id="areas_sub_title" name="areas_sub_title" style="height: 300px;"
                                                                                        data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Title"><?php echo $areas->areas_sub_title; ?></textarea>
                                                                                    <span id="content_required"
                                                                                        class="parsley-required"
                                                                                        style="font-weight: 500 !important;"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">FAQ's Section </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="postsecbutton"
                                                                name="faq_sec_checked"
                                                                <?php if(isset($faq->checked) && $faq->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample7"
                                                        <?php if($faq == null || $faq->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingseven">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseseven" aria-expanded="true"
                                                                    aria-controls="collapseseven">
                                                                    FAQ's Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapseseven" class="accordion-collapse collapse"
                                                                aria-labelledby="headingseven"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text" name="faq_title"
                                                                                        id="faq_title" placeholder="Title"
                                                                                        value="<?php echo e(isset($faq->faq_title) ? $faq->faq_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="faq_sub_title"
                                                                                        id="faq_sub_title"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($faq->faq_sub_title) ? $faq->faq_sub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Image </label>
                                                                                    <div class="upload-img-sec">
                                                                                        <input type="hidden"
                                                                                            name="faq_img" id="faq_img"
                                                                                            value="<?php echo e(isset($faq->faq_img) ? $faq->faq_img : ''); ?>">
                                                                                        <?php if(isset($faq->faq_img) && $faq->faq_img != '' && $faq->faq_img != null): ?>
                                                                                            <?php
                                                                                                $img = App\Models\MediaImage::select(
                                                                                                    'name',
                                                                                                )
                                                                                                    ->where(
                                                                                                        'id',
                                                                                                        $faq->faq_img,
                                                                                                    )
                                                                                                    ->first();
                                                                                            ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                                                    alt=""
                                                                                                    id="faq_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="faq_remove_image">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php else: ?>
                                                                                            <div class="image_preview_div">
                                                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                                                    alt=""
                                                                                                    id="faq_avtar"
                                                                                                    class="profile-img">
                                                                                                <a id="faq_remove_image"
                                                                                                    style="display: none;">
                                                                                                    <i class="fa fa-times"
                                                                                                        aria-hidden="true"></i></a>
                                                                                            </div>
                                                                                        <?php endif; ?>

                                                                                        <label for=""
                                                                                            style="cursor: pointer;"
                                                                                            class="choose_file hm-choose-img-title"
                                                                                            data-val="faq_img">Choose
                                                                                            image</label>
                                                                                        <?php if(isset($faq->faq_img) && $faq->faq_img != '' && $faq->faq_img != null): ?>
                                                                                        <?php else: ?>
                                                                                            <span id="img_alert1"
                                                                                                class="parsley-required"
                                                                                                style="font-weight: 500 !important;color: red !important;"></span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Blog Section </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="testimonialbutton"
                                                                name="blog_sec_checked"
                                                                <?php if(isset($blog->checked) && $blog->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample21s"
                                                        <?php if($blog == null || $blog->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingcollapsetwentyone">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsetwentyone"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapsetwentyone">
                                                                    Blog Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsetwentyone"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingcollapsetwentyone"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="blog_title"
                                                                                        id="blog_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($blog->blog_title) ? $blog->blog_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Get A Free Quote </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="quotebutton"
                                                                name="quote_checked"
                                                                <?php if(isset($quote->checked) && $quote->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample4"
                                                        <?php if($quote == null || $quote->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="quote_heading">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#quotecollapsefours"
                                                                    aria-expanded="true" aria-controls="collapsefour">
                                                                    Quote Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="quotecollapsefours"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="quote_heading"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quote_title"
                                                                                        id="quote_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($quote->quote_title) ? $quote->quote_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quotesub_title"
                                                                                        id="quotesub_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($quote->quotesub_title) ? $quote->quotesub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Sub Title">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quote_button_name"
                                                                                        id="quote_button_name"
                                                                                        placeholder="Sub Title"
                                                                                        value="<?php echo e(isset($quote->quote_button_name) ? $quote->quote_button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quote_button_url"
                                                                                        id="quote_button_url"
                                                                                        placeholder="Button Url"
                                                                                        value="<?php echo e(isset($quote->quote_button_url) ? $quote->quote_button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Call Button
                                                                                        Name</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quotecall_button_name"
                                                                                        id="quotecall_button_name"
                                                                                        placeholder="Call Button Name"
                                                                                        value="<?php echo e(isset($quote->quotecall_button_name) ? $quote->quotecall_button_name : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Name">
                                                                                </div>
                                                                            </div>


                                                                            

                                                                        </div>

                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Call Button
                                                                                        Url</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="quotecall_button_url"
                                                                                        id="quotecall_button_url"
                                                                                        placeholder="Call Button Url"
                                                                                        value="<?php echo e(isset($quote->quotecall_button_url) ? $quote->quotecall_button_url : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Button Url">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label
                                                                                        for="">Description</label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" id="quote_desc" name="quote_desc" style="height: 300px;"
                                                                                        data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Description"><?php echo e(isset($quote->quote_desc) ? $quote->quote_desc : ''); ?></textarea>
                                                                                    <span id="content_required"
                                                                                        class="parsley-required"
                                                                                        style="font-weight: 500 !important;"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Client Logo Section </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox" id="testimonialbutton"
                                                                name="clientlogo_sec_checked"
                                                                <?php if(isset($clientlogo->checked) && $clientlogo->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample14s"
                                                        <?php if($clientlogo == null || $clientlogo->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingcollapsefourteens">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapsefourteens"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapsefourteen">
                                                                    Client Logo Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapsefourteens"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="headingcollapsefourteens"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="clientlogo_title"
                                                                                        id="clientlogo_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($clientlogo->testimonial_title) ? $clientlogo->testimonial_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>








                                            <?php if(!in_array(auth()->user()->role, ['dealer', 'marketing'])): ?>
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Form Section </label>
                                                    </div>
                                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label class="switch">
                                                            <input type="checkbox"
                                                                id="formsecbutton"name="form_sec_checked"
                                                                <?php if(isset($form->checked) && $form->checked == 1): ?> checked <?php endif; ?>>
                                                            <div class="slider round"><!--ADDED HTML -->
                                                                <span class="on">Enable</span>
                                                                <span class="off">Disable</span><!--END-->
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="accordion" id="accordionExample8"
                                                        <?php if($form == null || $form->checked !== 1): ?> style="display:none;" <?php else: ?> style="display:block;" <?php endif; ?>>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingeight">
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseeight" aria-expanded="true"
                                                                    aria-controls="collapseeight">
                                                                    Form Section Setting
                                                                </button>
                                                            </h2>
                                                            <div id="collapseeight" class="accordion-collapse collapse"
                                                                aria-labelledby="headingeight"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Title </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" name="form_title" id="form_title" rows="4" cols="50"
                                                                                        data-parsley-required-message="Please Enter Title"><?php echo e(isset($form->form_title) ? $form->form_title : ''); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Short
                                                                                        Description </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea class="form-control rich-text-editor" name="form_short_desc" id="form_short_desc" rows="4" cols="50"
                                                                                        data-parsley-required-message="Please Enter Short Description"><?php echo e(isset($form->form_short_desc) ? $form->form_short_desc : ''); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                                            <div class="row form-sec">
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                                                    <label for="">Sub Title
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <input type="text"
                                                                                        name="form_sub_title"
                                                                                        id="form_sub_title"
                                                                                        placeholder="Title"
                                                                                        value="<?php echo e(isset($form->form_sub_title) ? $form->form_sub_title : ''); ?>"
                                                                                        data-parsley-required-message="Please Enter Title">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(!in_array(auth()->user()->role, ['dealer'])): ?>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                    <div class="row form-sec">
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                            <label for="">Meta Title </label>
                                                        </div>
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" name="meta_title" id="meta_title"
                                                                placeholder="Title"
                                                                value="<?php echo e(isset($home->meta_title) ? $home->meta_title : ''); ?>"
                                                                data-parsley-required-message="Please Enter Title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                    <div class="row form-sec">
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                            <label for="">Meta Keyword</label>
                                                        </div>
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" name="meta_keyword"
                                                                id="meta_keyword" placeholder="Sub Title"
                                                                value="<?php echo e(isset($home->meta_keyword) ? $home->meta_keyword : ''); ?>"
                                                                data-parsley-required-message="Please Enter Sub Title">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <div class="row form-sec">
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                            <label for="">Meta Description</label>
                                                        </div>
                                                        <div
                                                            class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <textarea class="form-control" id="meta_description" name="meta_description"
                                                                style="height: 150px;" data-parsley-errors-container="#content_required1"
                                                                data-parsley-required-message="Please Enter Description"><?php echo e(isset($home->meta_description) ? $home->meta_description : ''); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php endif; ?>
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
        function getServiceSectionHtml(index) {

            return `
   
   <div class="row services-append-sec" data-index="${index}">
   
   <label for="" id="service_number_${index}" style="display:none;">Service&nbsp;${index}</label>
   
   <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
   
       <div class="row form-sec">
   
           <div class="col-xxl-12 label-sec">
   
               <label for="">Service&nbsp;Title</label>
   
           </div>
   
           <div class="col-xxl-12">
   
               <input type="text"
   
                   name="service_title[]"
   
                   id="service_title_${index}"
   
                   placeholder="Enter Service Title"
   
                   data-parsley-required-message="Please Enter Title">
   
           </div>
   
       </div>
   
       <div class="row form-sec">
   
           <div class="col-xxl-12 label-sec">
   
               <label for="">Service&nbsp;Content</label>
   
           </div>
   
           <div class="col-xxl-12">
   
               <textarea class="form-control rich-text-editor" id="service_description_${index}" name="service_description[]" style="height: 150px;"
   
                   data-parsley-errors-container="#service_content_required_${index}" placeholder="Enter Service Description"
   
                   data-parsley-required-message="Please Enter Service Description"></textarea>
   
               <span id="service_content_required_${index}"
   
                   class="parsley-required"
   
                   style="font-weight: 500 !important;"></span>
   
           </div>
   
       </div>
 
   
   </div>
   
   <div class="col-xxl-6 label-sec">



   <div class="row form-sec">
   
           <div class="col-xxl-12 label-sec">
   
               <label for="">URL&nbsp;Title</label>
   
           </div>
   
           <div class="col-xxl-12">
   
               <input type="text"
   
                   name="url_title[]"
   
                   id="url_title_${index}"
   
                   placeholder="Enter Service url"
   
                   data-parsley-required-message="Please Enter url">
   
           </div>
   
       </div>

        <div class="row form-sec">
   
           <div class="col-xxl-12 label-sec">
   
               <label for="">Service&nbsp;URL</label>
   
           </div>
   
           <div class="col-xxl-12">
   
               <input type="text"
   
                   name="service_url[]"
   
                   id="service_url_${index}"
   
                   placeholder="Enter Service url"
   
                   data-parsley-required-message="Please Enter url">
   
           </div>
   
       </div>
   
       <div class="row form-sec">
   
           <div class="col-xxl-12 label-sec">
   
               <label for="">Service&nbsp;Image</label>
   
           </div>
   
           <div class="col-xxl-12 label-sec">
   
               <div class="upload-img-sec">
   
                   <input type="hidden"
   
                       name="service_img[]"
   
                       id="service_img_${index}">
   
                   <div class="image_preview_div">
   
                       <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
   
                           alt=""
   
                           id="service_preview_${index}"
   
                           class="profile-img">
   
                       <a id="service_remove_image_${index}" class="remove-service-image" style="display: none; cursor:pointer;">
   
                           <i class="fa fa-times" aria-hidden="true"></i>
   
                       </a>
   
                   </div>
   
                   <label style="cursor: pointer;"
   
                       class="choose_file hm-choose-img-title service-image-input"
   
                       data-val="service_img_${index}">
   
                       Choose image
   
                   </label>
   
                   <span id="img_alert_${index}"
   
                       class="parsley-required"
   
                       style="font-weight: 500 !important;color: red !important;"></span>
   
               </div>
   
           </div>
   
       </div>
   
   </div>
   
   <div class="mx-1 d-md-flex justify-content-md-end">
   
       <button type="button" class="btn btn-danger remove-service-btn mt-2" data-index="${index}">Remove Service</button>
   
   </div>
   
   </div>
   
   `;

        }



        // Add Service button logic

        $('#add_service_btn').on('click', function() {

            // Find used indexes among appended sections (2-6)

            let used = [];

            $('.services-append-sec').each(function() {

                let idx = parseInt($(this).attr('data-index'), 10);

                if (idx >= 2 && idx <= 6) used.push(idx);

            });



            // Find the lowest unused index from 2 to 6

            let nextIndex = null;

            for (let i = 2; i <= 6; i++) {

                if (!used.includes(i)) {

                    nextIndex = i;

                    break;

                }

            }



            if (nextIndex === 6) {

                $(this).hide();

            }

            if (nextIndex) {

                // Append after the last .services-append-sec

                $('.services-append-sec:last').after(getServiceSectionHtml(nextIndex));

            }

            // else: do nothing (max 6 reached)

        });



        // Remove service section

        $(document).on('click', '.remove-service-btn', function() {

            $('#add_service_btn').show();

            $(this).closest('.services-append-sec').remove();

        });



        // Image preview logic

        $(document).on('change', '.service-image-input', function(e) {

            const index = $(this).data('index');

            const input = this;

            if (input.files && input.files[0]) {

                const reader = new FileReader();

                reader.onload = function(e) {

                    $(`#service_preview_${index}`).attr('src', e.target.result);

                    $(`#service_remove_image_${index}`).show();

                }

                reader.readAsDataURL(input.files[0]);

            }

        });



        // Remove image logic

        $(document).on('click', '.remove-service-image', function() {

            const id = $(this).attr('id'); // e.g., service_remove_image_2

            const index = id.split('_').pop();

            $(`#service_img_${index}`).val('');

            $(`#service_preview_${index}`).attr('src',

                "<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>");

            $(this).hide();

        });



        async function fetchImgPath(id) {

            try {

                const res = await $.ajax({

                    url: `<?php echo e(route('media.get.detail')); ?>`,

                    type: 'POST',

                    headers: {

                        'Accept': 'application/json',

                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'

                    },

                    data: {

                        id: id

                    },

                    dataType: 'json'

                });

                return res.details;

            } catch (error) {

                console.error('Error fetching loca tion page setting:', error);

                return null;

            }

        }

        async function previewImg(imgId, inputId) {
            if (!imgId) return;

            try {
                const res = await $.ajax({
                    url: "<?php echo e(route('media.get.detail')); ?>",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    data: {
                        id: imgId
                    },
                    dataType: 'json'
                });

                const imgData = res.details;
                if (!imgData || !imgData.name) return;

                const inputEl = $(`#${inputId}`);
                const previewEl = inputEl.closest('.upload-img-sec').find('img');
                const removeBtn = inputEl.closest('.upload-img-sec').find('.remove-service-image');

                // set hidden input value
                inputEl.val(imgId);

                // show image preview
                previewEl.attr('src', "<?php echo e(asset('/uploads')); ?>/" + imgData.name);

                // show remove button
                removeBtn.show();

            } catch (err) {
                console.error('Error fetching image:', err);
            }
        }


        //    async function previewImg(imgId, inputId) {

        //        const img = await fetchImgPath(imgId);

        //        if (!img) return;

        //        const imgInput = $(`#${inputId}`),

        //            imgContainer = imgInput.closest('.upload-img-sec').find('.image_preview_div'),

        //            basePath = "<?php echo e(asset('/uploads')); ?>";

        //        hideImageAlert(`#${inputId}`);

        //        imgInput.val(imgId);

        //        imgContainer.find('a').show();

        //        imgContainer.find('img').attr('src', `${basePath}/${img.name}`);

        //    }
    </script>

    <script>
        $(document).ready(function() {


             function setTextareaValue($el, value) {

                const el = $el[0];

                const old = el.value;

                el.value = value ?? '';

                if (old !== el.value) {

                    el.dispatchEvent(

                        new Event('change', { bubbles: true })

                    );

                }

            }
            // Fill service heading
            if (<?php echo json_encode($service_head_sec, 15, 512) ?>) {
                $('#service_head_title').val(<?php echo json_encode($service_head_sec->service_head_title ?? '', 15, 512) ?>);
                // $('#service_head_description').val(<?php echo json_encode($service_head_sec->service_head_description ?? '', 15, 512) ?>);
                setTextareaValue( $('#service_head_description'), <?php echo json_encode($service_head_sec->service_head_description ?? '', 15, 512) ?> );
            }

            // Fill services
            let services = <?php echo json_encode($services->services ?? [], 15, 512) ?>;
            if (services.length) {
                for (let i = 0; i < services.length; i++) {
                    let titleId, descriptionId, imgId, urlId, urlTitleId;

                    if (i === 0) {
                        titleId = 'service_title';
                        descriptionId = 'service_description';
                        imgId = 'service_img_1';
                        urlId = 'service_url';
                        urlTitleId = 'url_title';
                    } else {
                        // simulate "Add Service" button
                        $('#add_service_btn').click();
                        titleId = 'service_title_' + (i + 1);
                        descriptionId = 'service_description_' + (i + 1);
                        imgId = 'service_img_' + (i + 1);
                        urlId = 'service_url_' + (i + 1);
                        urlTitleId = 'url_title_' + (i + 1);
                    }

                    $(`#${titleId}`).val(services[i].title || '');
                    // $(`#${descriptionId}`).val(services[i].description || '');


                    setTextareaValue( $(`#${descriptionId}`), services[i].description || '' );
                    $(`#${urlId}`).val(services[i].service_url || '');
                    $(`#${urlTitleId}`).val(services[i].url_title || '');

                    if (services[i].service_img) {
                        previewImg(services[i].service_img, imgId);
                    }
                }
            }
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
        $('#story_remove_image').click(function(event) {
            event.stopPropagation();
            $('#story_img_id').val(null);
            $('#profile_avtar_story').attr('src', assetPath);
            $('#story_remove_image').css('display', 'none');
            $('#profile_avtar_story').css('opacity', '1.0');
        });
        $('#remove_system_image').click(function(event) {
            event.stopPropagation();
            $('#system_img_id').val(null);
            $('#system_avtar').attr('src', assetPath);
            $('#remove_system_image').css('display', 'none');
            $('#system_avtar').css('opacity', '1.0');
        });
        $('#remove_system_image1').click(function(event) {
            event.stopPropagation();
            $('#system_img_id1').val(null);
            $('#system_avtar1').attr('src', assetPath);
            $('#remove_system_image1').css('display', 'none');
            $('#system_avtar1').css('opacity', '1.0');
        });
        $('#remove_system_image2').click(function(event) {
            event.stopPropagation();
            $('#system_img_id2').val(null);
            $('#system_avtar2').attr('src', assetPath);
            $('#remove_system_image2').css('display', 'none');
            $('#system_avtar2').css('opacity', '1.0');
        });
        $('#remove_system_image3').click(function(event) {
            event.stopPropagation();
            $('#system_img_id3').val(null);
            $('#system_avtar3').attr('src', assetPath);
            $('#remove_system_image3').css('display', 'none');
            $('#system_avtar3').css('opacity', '1.0');
        });
        $('#remove_system_image4').click(function(event) {
            event.stopPropagation();
            $('#system_img_id4').val(null);
            $('#system_avtar4').attr('src', assetPath);
            $('#remove_system_image4').css('display', 'none');
            $('#system_avtar4').css('opacity', '1.0');
        });


        $('#remove_why_choose_image1').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id1').val(null);
            $('#why_choose_avtar1').attr('src', assetPath);
            $('#remove_why_choose_image1').css('display', 'none');
            $('#why_choose_avtar1').css('opacity', '1.0');
        });
        $('#remove_why_choose_image2').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id2').val(null);
            $('#why_choose_avtar2').attr('src', assetPath);
            $('#remove_why_choose_image2').css('display', 'none');
            $('#why_choose_avtar2').css('opacity', '1.0');
        });
        $('#remove_why_choose_image3').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id3').val(null);
            $('#why_choose_avtar3').attr('src', assetPath);
            $('#remove_why_choose_image3').css('display', 'none');
            $('#why_choose_avtar3').css('opacity', '1.0');
        });
        $('#remove_why_choose_image4').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id4').val(null);
            $('#why_choose_avtar4').attr('src', assetPath);
            $('#remove_why_choose_image4').css('display', 'none');
            $('#why_choose_avtar4').css('opacity', '1.0');
        });
        $('#remove_why_choose_image5').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id5').val(null);
            $('#why_choose_avtar5').attr('src', assetPath);
            $('#remove_why_choose_image5').css('display', 'none');
            $('#why_choose_avtar5').css('opacity', '1.0');
        });
        $('#remove_why_choose_image6').click(function(event) {
            event.stopPropagation();
            $('#why_choose_img_id6').val(null);
            $('#why_choose_avtar6').attr('src', assetPath);
            $('#remove_why_choose_image6').css('display', 'none');
            $('#why_choose_avtar6').css('opacity', '1.0');
        });

        $('#faq_remove_image').click(function(event) {
            event.stopPropagation();
            $('#faq_img').val(null);
            $('#faq_avtar').attr('src', assetPath);
            $('#faq_remove_image').css('display', 'none');
            $('#faq_avtar').css('opacity', '1.0');
        });
        $('#video_remove_image').click(function(event) {
            event.stopPropagation();
            $('#video_img_id').val(null);
            $('#profile_avtar_video').attr('src', assetPath);
            $('#video_remove_image').css('display', 'none');
            $('#profile_avtar_video').css('opacity', '1.0');
        });
        $('#mobile_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mobile_banner_img').val(null);
            $('#mobile_banner_avtar').attr('src', assetPath);
            $('#mobile_banner_remove_image').css('display', 'none');
            $('#mobile_banner_avtar').css('opacity', '1.0');
        });
    </script>
    <script>
        $('#aboutsecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('.accordion-collapse').removeClass('show');
                // $('#about_title').prop('required', true);
                // $('#about_sub_title').prop('required', true);
                // $('#about_button_name').prop('required', true);
                // $('#about_button_url').prop('required', true);
                // $('#code_preview0').prop('required', true);
                $('#favicon_alert').show();
                $('#accordionExample').show();
            } else {
                // $('#about_title').prop('required', false);
                // $('#about_sub_title').prop('required', false);
                // $('#about_button_name').prop('required', false);
                // $('#about_button_url').prop('required', false);
                // $('#code_preview0').prop('required', false);
                $('#favicon_alert').hide();
                $('#accordionExample').hide();
            }
        });
        $('#servicesecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#service_title').prop('required', true);
                // $('#service_sub_title').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample2').show();
            } else {
                $('#accordionExample2').hide();
                // $('#service_title').prop('required', false);
                // $('#service_sub_title').prop('required', false);
            }
        });

        $('#servicesecbutton1').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample1').show();
            } else {
                $('#accordionExample1').hide();
            }
        });

        $('#storysecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('.accordion-collapse').removeClass('show');
                // $('#story_title').prop('required', true);
                // $('#story_sub_title').prop('required', true);
                // $('#story_button_name').prop('required', true);
                // $('#story_button_url').prop('required', true);
                // $('#code_preview2').prop('required', true);
                // $('#story_tagline').prop('required', true);
                // $('#story_date').prop('required', true);
                $('#img_alert').show();
                $('#img_alert1').show();
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample3').show();
            } else {
                // $('#story_title').prop('required', false);
                // $('#story_sub_title').prop('required', false);
                // $('#story_button_name').prop('required', false);
                // $('#story_button_url').prop('required', false);
                // $('#code_preview2').prop('required', false);
                // $('#story_tagline').prop('required', false);
                // $('#story_date').prop('required', false);
                $('#img_alert').hide();
                $('#img_alert1').hide();
                $('#accordionExample3').hide();
            }
        });
        $('#commercialbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('.accordion-collapse').removeClass('show');
                // $('#story_title').prop('required', true);
                // $('#story_sub_title').prop('required', true);
                // $('#story_button_name').prop('required', true);
                // $('#story_button_url').prop('required', true);
                // $('#code_preview2').prop('required', true);
                // $('#story_tagline').prop('required', true);
                // $('#story_date').prop('required', true);
                $('#img_alert').show();
                $('#img_alert1').show();
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample12').show();
            } else {
                // $('#story_title').prop('required', false);
                // $('#story_sub_title').prop('required', false);
                // $('#story_button_name').prop('required', false);
                // $('#story_button_url').prop('required', false);
                // $('#code_preview2').prop('required', false);
                // $('#story_tagline').prop('required', false);
                // $('#story_date').prop('required', false);
                $('#img_alert').hide();
                $('#img_alert1').hide();
                $('#accordionExample12').hide();
            }
        });
        $('#testisecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('.accordion-collapse').removeClass('show');
                // $('#testi_title').prop('required', true);
                // $('#testi_sub_title').prop('required', true);
                $('#accordionExample4').show();
            } else {
                // $('#testi_title').prop('required', false);
                // $('#testi_sub_title').prop('required', false);
                $('#accordionExample4').hide();
            }
        });

        $('#whychoosesection').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#service_title').prop('required', true);
                // $('#service_sub_title').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#why_choose_accordionExample').show();
            } else {
                $('#why_choose_accordionExample').hide();
                // $('#service_title').prop('required', false);
                // $('#service_sub_title').prop('required', false);
            }
        });
        $('#servicedataSecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {

                $('.accordion-collapse').removeClass('show');
                $('#serviceSecAccordionBody').show();
            } else {

                $('#serviceSecAccordionBody').hide();
            }
        });


        $('#marriedsecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#married_title').prop('required', true);
                // $('#married_sub_title').prop('required', true);
                // $('#married_short').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample5').show();
            } else {
                // $('#married_title').prop('required', false);
                // $('#married_sub_title').prop('required', false);
                // $('#married_short').prop('required', false);
                $('#accordionExample5').hide();
            }
        });
        $('#wholesalesecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#married_title').prop('required', true);
                // $('#married_sub_title').prop('required', true);
                // $('#married_short').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample13').show();
            } else {
                // $('#married_title').prop('required', false);
                // $('#married_sub_title').prop('required', false);
                // $('#married_short').prop('required', false);
                $('#accordionExample13').hide();
            }
        });
        $('#gallerysecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#gallery_title').prop('required', true);
                // $('#gallery_sub_title').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample6').show();
            } else {
                // $('#gallery_title').prop('required', false);
                // $('#gallery_sub_title').prop('required', false);
                $('#accordionExample6').hide();
            }
        });
        $('#postsecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#recent_title').prop('required', true);
                // $('#recent_sub_title').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample7').show();
            } else {
                // $('#recent_title').prop('required', false);
                // $('#recent_sub_title').prop('required', false);
                $('#accordionExample7').hide();
            }
        });
        $('#locationbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#recent_title').prop('required', true);
                // $('#recent_sub_title').prop('required', true);
                $('.accordion-collapse').removeClass('show');
                $('#accordionExample14').show();
            } else {
                // $('#recent_title').prop('required', false);
                // $('#recent_sub_title').prop('required', false);
                $('#accordionExample14').hide();
            }
        });
        $('#formsecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                $('#accordionExample8').show();
            } else {
                $('#accordionExample8').hide();
            }
        });
        $('#videosecbutton').click(function() {
            var val = $(this).prop('checked');
            if (val === true) {
                // $('#video_title').prop('required', true);
                // $('#video_sub_title').prop('required', true);
                // $('#video_url').prop('required', true);
                $('#accordionExample9').show();
            } else {
                // $('#video_title').prop('required', false);
                // $('#video_sub_title').prop('required', false);
                // $('#video_url').prop('required', false);
                $('#accordionExample9').hide();
            }
        });
        $('input[name="videotype"]').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'youtube') {
                $('#video_url').show();
                $('#file_upload').hide();
                $('#video_url2').hide();
                // $('#file_upload').prop('required', false);
                $('#edit_video').hide();
            } else {
                // $('#video_url').prop('required', false);
                // $('#file_upload').prop('required', true);
                $('#video_url').hide();
                $('#file_upload').show();
                $('#edit_video').hide();
                $('#video_url2').hide();
            }
        });
    </script>
    <script>
        $("#submit_form").on("click", function() {
            var isValid = $('#home_form').parsley().isValid();
            if (isValid) {
                $('#home_form').submit();
            } else {
                toastr.error('Form validation failed. Please check the highlighted fields.');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/settings/homepagesetting.blade.php ENDPATH**/ ?>