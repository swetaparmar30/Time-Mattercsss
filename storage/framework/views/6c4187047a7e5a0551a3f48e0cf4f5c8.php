<?php $__env->startSection('title'); ?>
    Custom Wood Door Page Settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <form action="<?php echo e(route('loadingdock.add')); ?>" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if(isset($customdoor)): ?>
                                <input type="hidden" name="customdoor_id"
                                    value="<?php echo e(isset($customdoor->id) ? $customdoor->id : ''); ?>">
                            <?php endif; ?>
                            <div class="row">
                                <div
                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                    <div class="card Recent-Users">
                                        <h5>Custom Wood Door Page Settings</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="title"
                                                        value="<?php echo e(isset($customdoor->title) ? $customdoor->title : ''); ?>">
                                                    <label for="title">Banner Title<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="title" id="title"
                                                        placeholder="About Page Title" required
                                                        data-parsley-required-message="Please Enter Title"
                                                        value="<?php echo e(isset($customdoor->title) ? $customdoor->title : ''); ?>">
                                                </div>
                                            </div>




                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="description">Banner Description<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" id="description" name="description"><?php echo e(isset($customdoor->description) ? $customdoor->description : ''); ?></textarea>
                                                    <span id="description_required"></span>
                                                </div>

                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="bannerimage" id="bannerimage"
                                                            value="<?php echo e(isset($customdoor->bannerimage) ? $customdoor->bannerimage : ''); ?>">
                                                        <?php if(isset($customdoor->bannerimage) && $customdoor->bannerimage != '' && $customdoor->bannerimage != null): ?>
                                                            <?php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $customdoor->bannerimage)
                                                                    ->first();
                                                            ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="bannerimage_avtar"
                                                                    class="profile-img">
                                                                <a id="bannerimage_remove_image" class="remove_image_media">
                                                                    <i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="bannerimage_avtar"
                                                                    class="profile-img">
                                                                <a id="bannerimage_remove_image" class="remove_image_media"
                                                                    style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="bannerimage">Choose image</label>
                                                        <?php if(isset($customdoor->bannerimage) && $customdoor->bannerimage != '' && $customdoor->bannerimage != null): ?>
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
                                        <h5>Section 2</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="section2_title">Section 2 Title<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="section2_title" id="section2_title"
                                                        placeholder="Section 2 Title" required
                                                        data-parsley-required-message="Please Enter Section 2 Title"
                                                        value="<?php echo e(isset($section2->section2_title) ? $section2->section2_title : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="section2_description">Section 2 Description<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" id="section2_description" name="section2_description"><?php echo e(isset($section2->section2_description) ? $section2->section2_description : ''); ?></textarea>
                                                    <span id="description2_required"></span>
                                                </div>


                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Title 1</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="sec2_title_1" id=""
                                                        placeholder="Type here"
                                                        value="<?php echo e(isset($section2->sec2_title_1) ? $section2->sec2_title_1 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 1</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea name="sec2_description_1" id="sec2_description_1" rows="5" cols="10"><?php echo e(isset($section2->sec2_description_1) ? $section2->sec2_description_1 : ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Image 1</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="sec2_image_1" id="sec2_image_1"
                                                            value="<?php echo e(isset($section2->sec2_image_1) ? $section2->sec2_image_1 : ''); ?>">
                                                        <?php if(isset($section2->sec2_image_1) && $section2->sec2_image_1 != '' && $section2->sec2_image_1 != null): ?>
                                                            <?php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $section2->sec2_image_1)
                                                                    ->first();
                                                            ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="sec2img1_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img1_banner_remove_image"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="sec2img1_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img1_banner_remove_image"
                                                                    style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="sec2_image_1">Choose
                                                            image</label>
                                                        <?php if(isset($section2->sec2_image_1) && $section2->sec2_image_1 != '' && $section2->sec2_image_1 != null): ?>
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
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="sec2_title_2" id=""
                                                        placeholder="Type here"
                                                        value="<?php echo e(isset($section2->sec2_title_2) ? $section2->sec2_title_2 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 2</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea name="sec2_description_2" id="sec2_description_2" rows="5" cols="10"><?php echo e(isset($section2->sec2_description_2) ? $section2->sec2_description_2 : ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Image 2</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="sec2_image_2" id="sec2_image_2"
                                                            value="<?php echo e(isset($section2->sec2_image_2) ? $section2->sec2_image_2 : ''); ?>">
                                                        <?php if(isset($section2->sec2_image_2) && $section2->sec2_image_2 != '' && $section2->sec2_image_2 != null): ?>
                                                            <?php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $section2->sec2_image_2)
                                                                    ->first();
                                                            ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="sec2img2_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img2_banner_remove_image"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="sec2img2_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img2_banner_remove_image"
                                                                    style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="sec2_image_2">Choose
                                                            image</label>
                                                        <?php if(isset($section2->sec2_image_2) && $section2->sec2_image_2 != '' && $section2->sec2_image_2 != null): ?>
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
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="sec2_title_3" id=""
                                                        placeholder="Type here"
                                                        value="<?php echo e(isset($section2->sec2_title_3) ? $section2->sec2_title_3 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 3</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea name="sec2_description_3" id="sec2_description_3" rows="5" cols="10"><?php echo e(isset($section2->sec2_description_3) ? $section2->sec2_description_3 : ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Image 3</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="sec2_image_3" id="sec2_image_3"
                                                            value="<?php echo e(isset($section2->sec2_image_3) ? $section2->sec2_image_3 : ''); ?>">
                                                        <?php if(isset($section2->sec2_image_3) && $section2->sec2_image_3 != '' && $section2->sec2_image_3 != null): ?>
                                                            <?php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $section2->sec2_image_3)
                                                                    ->first();
                                                            ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="sec2img3_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img3_banner_remove_image"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="sec2img3_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img3_banner_remove_image"
                                                                    style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="sec2_image_3">Choose
                                                            image</label>
                                                        <?php if(isset($section2->sec2_image_3) && $section2->sec2_image_3 != '' && $section2->sec2_image_3 != null): ?>
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
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="sec2_title_4" id=""
                                                        placeholder="Type here"
                                                        value="<?php echo e(isset($section2->sec2_title_4) ? $section2->sec2_title_4 : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 4</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <textarea name="sec2_description_4" id="sec2_description_4" rows="5" cols="10"><?php echo e(isset($section2->sec2_description_4) ? $section2->sec2_description_4 : ''); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Icon 4</label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="sec2_image_4" id="sec2_image_4"
                                                            value="<?php echo e(isset($section2->sec2_image_4) ? $section2->sec2_image_4 : ''); ?>">
                                                        <?php if(isset($section2->sec2_image_4) && $section2->sec2_image_4 != '' && $section2->sec2_image_4 != null): ?>
                                                            <?php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $section2->sec2_image_4)
                                                                    ->first();
                                                            ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                    alt="" id="sec2img4_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img4_banner_remove_image"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="image_preview_div">
                                                                <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                    alt="" id="sec2img4_banner_avtar"
                                                                    class="profile-img">
                                                                <a id="sec2img4_banner_remove_image"
                                                                    style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="sec2_image_4">Choose
                                                            image</label>
                                                        <?php if(isset($section2->sec2_image_4) && $section2->sec2_image_4 != '' && $section2->sec2_image_4 != null): ?>
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
                                        <h5>Section 3</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="section3_title">Section 3 Title<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <input type="text" name="section3_title" id="section3_title"
                                                        placeholder="Section 2 Title" required
                                                        data-parsley-required-message="Please Enter Section 2 Title"
                                                        value="<?php echo e(isset($section3->section3_title) ? $section3->section3_title : ''); ?>">
                                                </div>
                                            </div>

                                            


                                        </div>

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="sec3_title_1" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($section3->sec3_title_1) ? $section3->sec3_title_1 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea name="sec3_description_1" id="sec3_description_1" rows="5" cols="10"><?php echo e(isset($section3->sec3_description_1) ? $section3->sec3_description_1 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Image 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="sec3_image_1" id="sec3_image_1"
                                                        value="<?php echo e(isset($section3->sec3_image_1) ? $section3->sec3_image_1 : ''); ?>">
                                                    <?php if(isset($section3->sec3_image_1) && $section3->sec3_image_1 != '' && $section3->sec3_image_1 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section3->sec3_image_1)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="sec3img1_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img1_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="sec3img1_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img1_banner_remove_image" style="display: none;">
                                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="sec3_image_1">Choose
                                                        image</label>
                                                    <?php if(isset($section3->sec3_image_1) && $section3->sec3_image_1 != '' && $section3->sec3_image_1 != null): ?>
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
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="sec3_title_2" id="sec3_title_2"
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($section3->sec3_title_2) ? $section3->sec3_title_2 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 2</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea name="sec3_description_2" id="sec3_description_2" rows="5" cols="10"><?php echo e(isset($section3->sec3_description_2) ? $section3->sec3_description_2 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Image 2</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="sec3_image_2" id="sec3_image_2"
                                                        value="<?php echo e(isset($section3->sec3_image_2) ? $section3->sec3_image_2 : ''); ?>">
                                                    <?php if(isset($section3->sec3_image_2) && $section3->sec3_image_2 != '' && $section3->sec3_image_2 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section3->sec3_image_2)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="sec3img2_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img2_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="sec3img2_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img2_banner_remove_image" style="display: none;">
                                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="sec3_image_2">Choose
                                                        image</label>
                                                    <?php if(isset($section3->sec3_image_2) && $section3->sec3_image_2 != '' && $section3->sec3_image_2 != null): ?>
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
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="sec3_title_3" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($section3->sec3_title_3) ? $section3->sec3_title_3 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 3</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea name="sec3_description_3" id="sec3_description_3" rows="5" cols="10"><?php echo e(isset($section3->sec3_description_3) ? $section3->sec3_description_3 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Image 3</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="sec3_image_3" id="sec3_image_3"
                                                        value="<?php echo e(isset($section3->sec3_image_3) ? $section3->sec3_image_3 : ''); ?>">
                                                    <?php if(isset($section3->sec3_image_3) && $section3->sec3_image_3 != '' && $section3->sec3_image_3 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section3->sec3_image_3)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="sec3img3_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img3_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="sec3img3_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img3_banner_remove_image" style="display: none;">
                                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="sec3_image_3">Choose
                                                        image</label>
                                                    <?php if(isset($section3->sec3_image_3) && $section3->sec3_image_3 != '' && $section3->sec3_image_3 != null): ?>
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
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="sec3_title_4" id=""
                                                    placeholder="Type here"
                                                    value="<?php echo e(isset($section3->sec3_title_4) ? $section3->sec3_title_4 : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 4</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea name="sec3_description_4" id="sec3_description_4" rows="5" cols="10"><?php echo e(isset($section3->sec3_description_4) ? $section3->sec3_description_4 : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Icon 4</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="sec3_image_4" id="sec3_image_4"
                                                        value="<?php echo e(isset($section3->sec3_image_4) ? $section3->sec3_image_4 : ''); ?>">
                                                    <?php if(isset($section3->sec3_image_4) && $section3->sec3_image_4 != '' && $section3->sec3_image_4 != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section3->sec3_image_4)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="sec3img4_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img4_banner_remove_image"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="sec3img4_banner_avtar"
                                                                class="profile-img">
                                                            <a id="sec3img4_banner_remove_image" style="display: none;">
                                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="sec3_image_4">Choose
                                                        image</label>
                                                    <?php if(isset($section3->sec3_image_4) && $section3->sec3_image_4 != '' && $section3->sec3_image_4 != null): ?>
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
                                    <h5>Section 4</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="section4_title"
                                                    value="<?php echo e(isset($section4->section4_title) ? $section4->section4_title : ''); ?>">
                                                <label for="section4_title">Section 4 Title<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section4_title" id="title4"
                                                    placeholder="Section 4 Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($section4->section4_title) ? $section4->section4_title : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section4_description">Section 4 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="section4_description" name="section4_description"><?php echo e(isset($section4->section4_description) ? $section4->section4_description : ''); ?></textarea>
                                                <span id="section4_description_required"></span>
                                            </div>

                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="section4_image" id="section4_image"
                                                        value="<?php echo e(isset($section4->section4_image) ? $section4->section4_image : ''); ?>">
                                                    <?php if(isset($section4->section4_image) && $section4->section4_image != '' && $section4->section4_image != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section4->section4_image)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="section4_image_avtar"
                                                                class="profile-img">
                                                            <a id="section4_image_remove_image"
                                                                class="remove_image_media"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="section4_image_avtar"
                                                                class="profile-img">
                                                            <a id="section4_image_remove_image" class="remove_image_media"
                                                                style="display: none;"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="section4_image">Choose image</label>
                                                    <?php if(isset($section4->section4_image) && $section4->section4_image != '' && $section4->section4_image != null): ?>
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
                                    <h5>Section 5</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="section5_title"
                                                    value="<?php echo e(isset($section5->section5_title) ? $section5->section5_title : ''); ?>">
                                                <label for="section5_title">Section 5 Title<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section5_title" id="title5"
                                                    placeholder="Section 5 Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="<?php echo e(isset($section5->section5_title) ? $section5->section5_title : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section5_description">Section 5 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control" id="section5_description" name="section5_description"><?php echo e(isset($section5->section5_description) ? $section5->section5_description : ''); ?></textarea>
                                                <span id="section5_description_required"></span>
                                            </div>

                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="section5_image" id="section5_image"
                                                        value="<?php echo e(isset($section5->section5_image) ? $section5->section5_image : ''); ?>">
                                                    <?php if(isset($section5->section5_image) && $section5->section5_image != '' && $section5->section5_image != null): ?>
                                                        <?php
                                                            $img = App\Models\MediaImage::select('name')
                                                                ->where('id', $section5->section5_image)
                                                                ->first();
                                                        ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                                alt="" id="section5_image_avtar"
                                                                class="profile-img">
                                                            <a id="section5_image_remove_image"
                                                                class="remove_image_media"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="image_preview_div">
                                                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                                                alt="" id="section5_image_avtar"
                                                                class="profile-img">
                                                            <a id="section5_image_remove_image" class="remove_image_media"
                                                                style="display: none;"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="section5_image">Choose image</label>
                                                    <?php if(isset($section5->section5_image) && $section5->section5_image != '' && $section5->section5_image != null): ?>
                                                    <?php else: ?>
                                                        <span id="img_alert1" class="parsley-required"
                                                            style="font-weight: 500 !important;color: red !important;"></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row form-sec text-end">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                        <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
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

            $('#description').summernote({
                height: 200
            });
            $('#section2_description').summernote({
                height: 200
            });
            $('#section3_description').summernote({
                height: 200
            });
            $('#section4_description').summernote({
                height: 200
            });
            $('#section5_description').summernote({
                height: 200
            });
            $('#section6_description1').summernote({
                height: 200
            });
            $('#section6_description2').summernote({
                height: 200
            });
            $('#section7_description').summernote({
                height: 200
            });
            $('#sec2_description_1').summernote({
                height: 200
            });
            $('#sec2_description_2').summernote({
                height: 200
            });
            $('#sec2_description_3').summernote({
                height: 200
            });
            $('#sec2_description_4').summernote({
                height: 200
            });
            $('#sec3_description_1').summernote({
                height: 200
            });
            $('#sec3_description_2').summernote({
                height: 200
            });
            $('#sec3_description_3').summernote({
                height: 200
            });
            $('#sec3_description_4').summernote({
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
        $('#bannerimage_remove_image').click(function(event) {
            event.stopPropagation();
            $('#bannerimage').val(null);
            $('#bannerimage_avtar').attr('src', assetPath);
            $('#bannerimage_remove_image').css('display', 'none');
            $('#bannerimage_avtar').css('opacity', '1.0');
        });
        $('#section2_image_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section2_image').val(null);
            $('#section2_image_avtar').attr('src', assetPath);
            $('#section2_image_remove_image').css('display', 'none');
            $('#section2_image_avtar').css('opacity', '1.0');
        });
        $('#section3_image_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section3_image').val(null);
            $('#section3_image_avtar').attr('src', assetPath);
            $('#section3_image_remove_image').css('display', 'none');
            $('#section3_image_avtar').css('opacity', '1.0');
        });

        $('#section4_image_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section4_image').val(null);
            $('#section4_image_avtar').attr('src', assetPath);
            $('#section4_image_remove_image').css('display', 'none');
            $('#section4_image_avtar').css('opacity', '1.0');
        });

        $('#section5_image_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section5_image').val(null);
            $('#section5_image_avtar').attr('src', assetPath);
            $('#section5_image_remove_image').css('display', 'none');
            $('#section5_image_avtar').css('opacity', '1.0');
        });

        $('#section6_image1_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section6_image1').val(null);
            $('#section6_image1_avtar').attr('src', assetPath);
            $('#section6_image1_remove_image').css('display', 'none');
            $('#section6_image1_avtar').css('opacity', '1.0');
        });

        $('#section6_image2_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section6_image2').val(null);
            $('#section6_image2_avtar').attr('src', assetPath);
            $('#section6_image2_remove_image').css('display', 'none');
            $('#section6_image2_avtar').css('opacity', '1.0');
        });
        $('#section7_image_remove_image').click(function(event) {
            event.stopPropagation();
            $('#section7_image').val(null);
            $('#section7_image_avtar').attr('src', assetPath);
            $('#section7_image_remove_image').css('display', 'none');
            $('#section7_image_avtar').css('opacity', '1.0');
        });


        $('#sec2img1_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec2_image_1').val(null);
            $('#sec2img1_banner_avtar').attr('src', assetPath);
            $('#sec2img1_banner_remove_image').css('display', 'none');
            $('#sec2img1_banner_avtar').css('opacity', '1.0');
        });
        $('#sec2img2_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec2_image_2').val(null);
            $('#sec2img2_banner_avtar').attr('src', assetPath);
            $('#sec2img2_banner_remove_image').css('display', 'none');
            $('#sec2img2_banner_avtar').css('opacity', '1.0');
        });
        $('#sec2img3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec2_image_3').val(null);
            $('#sec2img3_banner_avtar').attr('src', assetPath);
            $('#sec2img3_banner_remove_image').css('display', 'none');
            $('#sec2img3_banner_avtar').css('opacity', '1.0');
        });
        $('#sec2img4_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec2_image_4').val(null);
            $('#sec2img4_banner_avtar').attr('src', assetPath);
            $('#sec2img4_banner_remove_image').css('display', 'none');
            $('#sec2img4_banner_avtar').css('opacity', '1.0');
        });
        $('#sec3img1_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec3_image_1').val(null);
            $('#sec3img1_banner_avtar').attr('src', assetPath);
            $('#sec3img1_banner_remove_image').css('display', 'none');
            $('#sec3img1_banner_avtar').css('opacity', '1.0');
        });
        $('#sec3img2_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec3_image_2').val(null);
            $('#sec3img2_banner_avtar').attr('src', assetPath);
            $('#sec3img2_banner_remove_image').css('display', 'none');
            $('#sec3img2_banner_avtar').css('opacity', '1.0');
        });
        $('#sec3img3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec3_image_3').val(null);
            $('#sec3img3_banner_avtar').attr('src', assetPath);
            $('#sec3img3_banner_remove_image').css('display', 'none');
            $('#sec3img3_banner_avtar').css('opacity', '1.0');
        });
        $('#sec3img4_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#sec3_image_4').val(null);
            $('#sec3img4_banner_avtar').attr('src', assetPath);
            $('#sec3img4_banner_remove_image').css('display', 'none');
            $('#sec3img4_banner_avtar').css('opacity', '1.0');
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

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/customdoor/index.blade.php ENDPATH**/ ?>