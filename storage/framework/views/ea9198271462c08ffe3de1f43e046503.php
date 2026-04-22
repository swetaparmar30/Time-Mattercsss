<?php $__env->startSection('main_content'); ?>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <!-- [ breadcrumb ] start -->
         <!-- [ breadcrumb ] end -->
         <div class="main-body">
            <div class="page-wrapper">
               <!-- [ Main Content ] start -->
               <form action="<?php echo e(route('garage-services.store')); ?>" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" id="garage_door_id" name="garage_door_id" value=" <?php echo e(isset($garage->id) ? $garage->id : ''); ?> ">
                  <div class="row">
                     <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           <?php if(isset($garage) && $garage != ''): ?>
                           <h5>Edit Garage Service</h5>
                           <?php else: ?>
                           <h5>Add Garage Service</h5>
                           <?php endif; ?>
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Title <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="title" name="title" required
                                       data-parsley-required-message="Please Enter Title"
                                       placeholder="Title"
                                       value="<?php echo e(isset($garage->title) ? $garage->title : ''); ?>">
                                 </div>
                              </div>
                             
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Description <span
                                       style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea name="description" data-parsley-required="true"
                                       class="form-control" id="description"
                                       data-parsley-required-message="Please Enter Description"
                                       data-parsley-errors-container="#content_required"> <?php echo e(isset($garage->description) ? $garage->description : ''); ?> </textarea>
                                    <span class="error_field" id="content_required"></span>
                                 </div>
                              </div>
                              
                              <div class="mb-3 text-end">
                                 <button type="submit" id="submit_form" class="btn btn-lg btn-primary">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                             <div class="card Recent-Users">
                                    <h5>Thumbnail</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden"
                                                    value="<?php echo e(isset($garage->image) ? $garage->image : ''); ?>"
                                                    name="img_id" id="img_id" required data-parsley-errors-container="#logo_required" data-parsley-trigger="change" data-parsley-required-message="Please Choose an Image.">
                                                <div class="upload-img-sec text-center image_preview_div">
                                                    <?php if(isset($image_name->name) && $image_name->name != ''): ?>
                                                    <img src="<?php echo e(asset('uploads/' . $image_name->name)); ?>" alt=""
                                                        class="img-fluid profile_avtar" id="profile_avtar"
                                                        style="width:125px;height:125px;">
                                                    <a id="remove_image"> <i class="fa fa-times"
                                                            aria-hidden="true"></i></a>
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt=""
                                                        id="profile_avtar" class="profile-img">
                                                    <a id="remove_image" style="display: none;"> <i class="fa fa-times"
                                                            aria-hidden="true"></i></a>
                                                    <?php endif; ?>
                                                    <label for="file" style="cursor: pointer;"
                                                        class="form-label upload_image choose_file hm-choose-img-title">Choose image</label>
                                                </div>
                                                <span class="error_field" id="logo_required"></span>
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
    
</script>
<script>
  
</script>
<script>
   $(document).ready(function () {
       $('form').parsley({
           excluded: 'input[type=hidden]:not(.visible)'
       });

        $('#video_upload').on('change', function() {
        const fileSizeLimit = 40 * 1024 * 1024; // 40 MB in bytes
        const file = this.files[0];
        if (file && file.size > fileSizeLimit) {
            $('#file-size-error').show();
            this.value = ''; // Clear the file input
        } else {
            $('#file-size-error').hide();
        }
    });
       $('#submit_form').on('click', function (e) {
      
         $('#file-size-error').hide();
        $('#img_id').addClass('visible');
        $('#banner_img_id').addClass('visible');

           // Validate the form
           if (!$('form').parsley().validate()) {
               e.preventDefault();
           }
           if ($('#file-size-error').is(':visible')) {
                e.preventDefault();
                return;
            }
           // Hide the hidden input again
           $('#img_id').removeClass('visible');
           $('#banner_img_id').removeClass('visible');
           
   
       });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/garage-services/add.blade.php ENDPATH**/ ?>