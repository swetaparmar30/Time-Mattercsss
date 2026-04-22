<?php $__env->startSection('main_content'); ?>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <!-- [ breadcrumb ] start -->
         <!-- [ breadcrumb ] end -->
         <div class="main-body">
            <div class="page-wrapper">
               <!-- [ Main Content ] start -->
               <form action="<?php echo e(route('faqs.store')); ?>" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" id="faq_id" name="faq_id" value=" <?php echo e(isset($faq->id) ? $faq->id : ''); ?> ">
                  <div class="row">
                     <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           <?php if(isset($faq) && $faq != ''): ?>
                           <h5>Edit Faq</h5>
                           <?php else: ?>
                           <h5>Add Faq</h5>
                           <?php endif; ?>
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Title<span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="country_name" name="title" required
                                       data-parsley-required-message="Please Enter Faq Title"
                                       placeholder="Please Enter Faq Title"
                                       value="<?php echo e(isset($faq->title) ? $faq->title : ''); ?>">
                                 </div>
                              </div>
                              
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Description <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea class="form-control rich-text-editor" id="address" name="description" style="height: 300px;" required  data-parsley-required-message="Please Enter Description" data-parsley-errors-container="#content_required" placeholder="Please Enter Description"><?php echo e(isset($faq->description) ? $faq->description : ''); ?></textarea>
                                    <span id="content_required" style="font-weight: 400!important;"></span>
                                 </div>
                              </div>
                              <div class="mb-3 text-end">
                                 <button type="submit" id="submit_form" class="btn btn-lg btn-primary">Save</button>
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
   $(document).ready(function () {
   
       $('form').parsley({
           excluded: 'input[type=hidden]:not(.visible)'
       });
       $('#submit_form').on('click', function (e) {
      
   
        $('#img_id').addClass('visible');
        $('#banner_img_id').addClass('visible');
   
   
           // Validate the form
           if (!$('form').parsley().validate()) {
               e.preventDefault();
           }
           // Hide the hidden input again
           $('#img_id').removeClass('visible');
           $('#banner_img_id').removeClass('visible');
           
   
       });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/faqs/add.blade.php ENDPATH**/ ?>