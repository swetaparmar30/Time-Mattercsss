<?php if(isset($slidebanner) && $slidebanner != ''): ?>
<?php $__env->startSection('title'); ?> Edit Slider Banner <?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection('title'); ?> Add Slider Banner <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('main_content'); ?>
<style>
span.image-size {
    line-height: 25px!important;
    color: red!important;
    font-weight: 500!important;
    text-align: center!important;
}
</style>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <div class="main-body">
            <div class="page-wrapper">
               <form action="<?php echo e(route('slider-banner.save')); ?>" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" id="slider_banner_id" name="slider_banner_id" value=" <?php echo e(isset($slidebanner->id) ? $slidebanner->id : ''); ?> ">
                  <div class="row">
                     <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           <?php if(isset($slidebanner) && $slidebanner != ''): ?>
                           <h5>Edit Slider Banner</h5>
                           <?php else: ?>
                           <h5>Add Slider Banner</h5>
                           <?php endif; ?>
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                   <div
                                       class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="">Large (1920x600)<span style="color: red;margin: 0;">*</span></label>
                                   </div>
                                  <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 label-sec text-center">
                                    <div class="upload-img-sec text-center image_preview_div">
                                       <input type="hidden" name="large_img" id="img_id" value="<?php echo e(isset($slidebanner->large_img) ? $slidebanner->large_img : ''); ?>" required data-parsley-errors-container="#logo_required"data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                       <?php if(isset($slidebanner->large_img) && $slidebanner->large_img != '' && $slidebanner->large_img != null): ?>
                                       <?php
                                       $img = App\Models\MediaImage::select('name')->where('id', $slidebanner->large_img)->first();
                                       ?>
                                       <?php if(isset($img->name) && $img->name != ''): ?>
                                       <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="profile_avtar" class="profile-img"> 
                                       <a id="remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       <?php else: ?>
                                       <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="profile_avtar" class="profile-img"> 
                                       <a id="remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       <?php endif; ?>
                                       <?php else: ?>
                                       <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="profile_avtar" class="profile-img"> 
                                       <a id="remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       <?php endif; ?>
                                       <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title">Choose image</label>
                                       <span class="image-size">*Recommended Image Size 1920 x 757</span>
                                    </div>
                                    <span class="error_field" id="logo_required"></span>
                                 </div>
                               </div>
                               <div class="row form-sec">
                                   <div
                                       class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="">Medium (1100 x 480) </label>
                                   </div>
                                  <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 label-sec text-center">
                                    <div class="upload-img-sec text-center">
                                       <input type="hidden" name="medium_img" id="footer_img_id" value="<?php echo e(isset($slidebanner->medium_img) ? $slidebanner->medium_img : ''); ?>" data-parsley-errors-container="#mobile_banner_image_img_required"data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                       <?php if(isset($slidebanner->medium_img) && $slidebanner->medium_img != '' && $slidebanner->medium_img != null): ?>
                                       <?php
                                       $img = App\Models\MediaImage::select('name')->where('id', $slidebanner->medium_img)->first();
                                       ?>
                                       <?php if(isset($img->name) && $img->name != ''): ?>
                                       <div class="image_preview_div">
                                          <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" alt="" id="footer_profile_avtar" class="profile-img"> 
                                          <a id="footer_remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php else: ?>
                                       <div class="image_preview_div">
                                          <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" 
                                             id="footer_profile_avtar" class="profile-img"> 
                                          <a id="footer_remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php endif; ?>
                                       <?php else: ?>
                                       <div class="image_preview_div">
                                          <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" 
                                             id="footer_profile_avtar" class="profile-img"> 
                                          <a id="footer_remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php endif; ?>
                                       <label for="" style="cursor: pointer;" data-val="footer_profile_avtar" class="choose_file hm-choose-img-title">Choose image</label>
                                       <span class="image-size">*Recommended Image Size 1100 x 480</span>
                                    </div>
                                    <span class="error_field" id="mobile_banner_image_img_required"></span>
                                 </div>
                               </div>
                               <div class="row form-sec">
                                   <div
                                       class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="">Small (375 x 400) </label>
                                   </div>
                                  
                                   <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 label-sec text-center">
                                    <div class="upload-img-sec text-center">
                                       <input type="hidden" name="small_img" id="favicon_id" value="<?php echo e(isset($slidebanner->small_img) ? $slidebanner->small_img : ''); ?>" required data-parsley-errors-container="#site_favicon_img_required" data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                       <?php if(isset($slidebanner->small_img) && $slidebanner->small_img != '' && $slidebanner->small_img != null): ?>
                                       <?php
                                       $img = App\Models\MediaImage::select('name')->where('id', $slidebanner->small_img)->first();
                                       if(isset($img) && $img != '' && $img != null)
                                       {
                                       $path = asset('uploads/'.$img->name);
                                       }else{
                                       $path = asset('assets/images/user/img-demo_1041.jpg');
                                       }
                                       ?>
                                       <div class="image_preview_div">
                                          <img src="<?php echo e($path); ?>" alt="" id="favicon_avtar" class="profile-img" > 
                                          <a id="remove_favi_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php else: ?>
                                       <div class="image_preview_div">
                                          <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" id="favicon_avtar" class="profile-img"> 
                                          <a id="remove_favi_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php endif; ?>
                                       <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="faviconimg">Choose image</label>
                                       <span class="image-size">*Recommended Image Size 375 x 400</span>
                                    </div>
                                    <span class="error_field" id="site_favicon_img_required"></span>
                                 </div>
                               </div>
                               <div class="row form-sec">
                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="banner_title">Banner Title<span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="banner_title" id="banner_title" placeholder="Title" required
                                       data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($slidebanner->banner_title) ? $slidebanner->banner_title : ''); ?>">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="banner_title">Banner Sub Title<span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="banner_sub_title" id="banner_sub_title" placeholder="Title" required
                                       data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($slidebanner->banner_sub_title) ? $slidebanner->banner_sub_title : ''); ?>">
                                 </div>
                              </div>

                               <div class="row form-sec">
                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="banner_url">Banner Url</label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="url" name="banner_url" id="banner_url" placeholder="Url" 
                                        value="<?php echo e(isset($slidebanner->banner_url) ? $slidebanner->banner_url : ''); ?>">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="banner_desc">Banner Description </label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea class="form-control" id="banner_desc" name="banner_desc" style="height: 150px;" data-parsley-required="true" data-parsley-required-message="Please enter Description" data-parsley-errors-container="#description_required"><?php echo e(isset($slidebanner->banner_desc) ? $slidebanner->banner_desc : ''); ?></textarea>
                                    <span id="description_required"></span>
                                 </div>
                              </div>
                              <div class="row form-sec text-end">
                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                    <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
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
   $(document).ready(function(){
       $('form').parsley({
           excluded: 'input[type=hidden]:not(.visible)'
       });
       $('#submit_form').on('click', function (e) {
            
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
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/slider-banner/add.blade.php ENDPATH**/ ?>