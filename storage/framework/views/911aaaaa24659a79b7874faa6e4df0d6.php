<div class="accordion-body">
    <div class="row"> 
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" name="system_setting_title" id="setting_title" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->system_setting_title) ? $system_setting->system_setting_title : ''); ?>">
                </div>
            </div>
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Sub Title</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" name="system_sub_title" id="system_sub_title" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->system_sub_title) ? $system_setting->system_sub_title : ''); ?>">
                </div>
            </div>
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Description</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" id="system_setting_description" name="system_setting_description" style="height: 300px;"  data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Description"><?php echo e(isset($system_setting->system_setting_description) ? $system_setting->system_setting_description : ''); ?></textarea>
                    <span id="content_required" class="parsley-required" style="font-weight: 500 !important;"></span>
                </div>
            </div>
            <div class="row form-sec">
                <label for="">Image </label>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img" id="system_img_id" value="<?php echo e(isset($system_setting->system_img) ? $system_setting->system_img : ''); ?>">
                        <?php if(isset($system_setting->system_img) && $system_setting->system_img != '' && $system_setting->system_img != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img)->first();
                        ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="system_avtar" class="profile-img" > 
                            <a id="remove_system_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php else: ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="system_avtar" class="profile-img"> 
                            <a id="remove_system_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php endif; ?>

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img">Choose image</label>
                        <?php if(isset($system_setting->system_img) && $system_setting->system_img != '' && $system_setting->system_img != null): ?>
                        <?php else: ?>
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;">Please Add Image </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="row form-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 1</label>
                    <input type="text" name="title1" id="title1" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->title1) ? $system_setting->title1 : ''); ?>">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="">Icon 1</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img1" id="system_img_id1" value="<?php echo e(isset($system_setting->system_img1) ? $system_setting->system_img1 : ''); ?>">
                        <?php if(isset($system_setting->system_img1) && $system_setting->system_img1 != '' && $system_setting->system_img1 != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img1)->first();
                        ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="system_avtar1" class="profile-img" > 
                            <a id="remove_system_image1"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php else: ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="system_avtar1" class="profile-img"> 
                            <a id="remove_system_image1" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php endif; ?>

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img1">Choose image</label>
                        <?php if(isset($system_setting->system_img1) && $system_setting->system_img1 != '' && $system_setting->system_img1 != null): ?>
                        <?php else: ?>
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row form-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 2</label>
                    <input type="text" name="title2" id="title2" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->title2) ? $system_setting->title2 : ''); ?>">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="">Icon 2</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img2" id="system_img_id2" value="<?php echo e(isset($system_setting->system_img2) ? $system_setting->system_img2 : ''); ?>">
                        <?php if(isset($system_setting->system_img2) && $system_setting->system_img2 != '' && $system_setting->system_img2 != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img2)->first();
                        ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="system_avtar2" class="profile-img" > 
                            <a id="remove_system_image2"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php else: ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="system_avtar2" class="profile-img"> 
                            <a id="remove_system_image2" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php endif; ?>

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img2">Choose image</label>
                        <?php if(isset($system_setting->system_img2) && $system_setting->system_img2 != '' && $system_setting->system_img2 != null): ?>
                        <?php else: ?>
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row form-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 3</label>
                    <input type="text" name="title3" id="title3" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->title3) ? $system_setting->title3 : ''); ?>">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="">Icon 3</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img3" id="system_img_id3" value="<?php echo e(isset($system_setting->system_img3) ? $system_setting->system_img3 : ''); ?>">
                        <?php if(isset($system_setting->system_img3) && $system_setting->system_img3 != '' && $system_setting->system_img3 != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img3)->first();
                        ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="system_avtar3" class="profile-img" > 
                            <a id="remove_system_image3"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php else: ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="system_avtar3" class="profile-img"> 
                            <a id="remove_system_image3" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php endif; ?>

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img3">Choose image</label>
                        <?php if(isset($system_setting->system_img3) && $system_setting->system_img3 != '' && $system_setting->system_img3 != null): ?>
                        <?php else: ?>
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row form-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 4</label>
                    <input type="text" name="title4" id="title4" placeholder="Title" data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($system_setting->title4) ? $system_setting->title4 : ''); ?>">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="">Icon 4</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img4" id="system_img_id4" value="<?php echo e(isset($system_setting->system_img4) ? $system_setting->system_img4 : ''); ?>">
                        <?php if(isset($system_setting->system_img4) && $system_setting->system_img4 != '' && $system_setting->system_img4 != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img4)->first();
                        ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="system_avtar4" class="profile-img" > 
                            <a id="remove_system_image4"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php else: ?>
                        <div class="image_preview_div">
                            <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="system_avtar4" class="profile-img"> 
                            <a id="remove_system_image4" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <?php endif; ?>

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img4">Choose image</label>
                        <?php if(isset($system_setting->system_img4) && $system_setting->system_img4 != '' && $system_setting->system_img4 != null): ?>
                        <?php else: ?>
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/settings/system_setting_sec.blade.php ENDPATH**/ ?>