<div class="accordion-body">
   <div class="row">
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Title </label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="faq_title" id="faq_title" placeholder="Title" value="<?php echo e(isset($faq->faq_title) ? $faq->faq_title : ''); ?>" data-parsley-required-message="Please Enter Title">
            </div>
         </div>
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Sub Title </label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <input type="text" name="faq_sub_title" id="faq_sub_title" placeholder="Sub Title"  value="<?php echo e(isset($faq->faq_sub_title) ? $faq->faq_sub_title : ''); ?>" data-parsley-required-message="Please Enter Sub Title">
            </div>
         </div>
      </div>
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
         <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
               <label for="">Image </label>
               <div class="upload-img-sec">
                  <input type="hidden" name="faq_img" id="faq_img" value="<?php echo e(isset($faq->faq_img) ? $faq->faq_img : ''); ?>">
                  <?php if(isset($faq->faq_img) && $faq->faq_img != '' && $faq->faq_img != null): ?>
                  <?php
                  $img = App\Models\MediaImage::select('name')->where('id', $faq->faq_img)->first();
                  ?>
                  <div class="image_preview_div">
                     <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="faq_avtar" class="profile-img" > 
                     <a id="faq_remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                  </div>
                  <?php else: ?>
                  <div class="image_preview_div">
                     <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="faq_avtar" class="profile-img"> 
                     <a id="faq_remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                  </div>
                  <?php endif; ?>
                  <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="faq_img">Choose image</label>
                  <?php if(isset($faq->faq_img) && $faq->faq_img != '' && $faq->faq_img != null): ?>
                  <?php else: ?>
                  <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/settings/faq-sec.blade.php ENDPATH**/ ?>