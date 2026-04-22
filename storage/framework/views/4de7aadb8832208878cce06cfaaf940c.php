<?php $__env->startSection('main_content'); ?>
<style type="text/css">
    .tab-button{padding: 11px 30px!important;}
</style>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <!-- [ breadcrumb ] start -->
         <!-- [ breadcrumb ] end -->
         <div class="main-body">
            <div class="page-wrapper">
               <!-- [ Main Content ] start -->
               <form id="collection_add" action="" method="POST" data-parsley-validate=""
                  enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div
                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                        <div class="card Recent-Users">
                           <?php if(isset($collection) && $collection != ''): ?>
                           <h5>Edit Collection</h5>
                           <?php else: ?>
                           <h5>Add Collection</h5>
                           <?php endif; ?>
                           <div class="card-block px-0 py-3">
                              <div class="row form-sec">
                                 <input type="hidden" id="collection_id" name="collection_id"
                                    value=" <?php echo e(isset($collection->id) ? $collection->id : ''); ?> ">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Type <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <select class="form-control" name="type" required
                                       data-parsley-required-message="Please Select Type">
                                       <option value="">Please Select</option>
                                       <option value="Residential" <?php echo e((isset($collection->type) && $collection->type == 'Residential') ? 'selected' : ''); ?>>Residential</option>
                                       <option value="Commercial" <?php echo e((isset($collection->type) && $collection->type == 'Commercial') ? 'selected' : ''); ?>>Commercial</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Name <span
                                       style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" id="title" name="title"
                                       required data-parsley-required-message="Please Enter Name"
                                       placeholder="Name"
                                       value="<?php echo e(isset($collection->title) ? $collection->title : ''); ?>">
                                    <span id="error_name" style="color:red;display:none;">This Name is
                                    Already
                                    Taken</span>
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Slug <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" name="product_Slug"
                                       id="product_slug" placeholder="Slug" required
                                       data-parsley-required-message="Please Enter Slug"
                                       value="<?php echo e(isset($collection->slug) ? $collection->slug : ''); ?>">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Title <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" class="form-control" name="sub_title"
                                       id="sub_title" placeholder="Title" required
                                       data-parsley-required-message="Please Enter Title"
                                       value="<?php echo e(isset($collection->sub_title) ? $collection->sub_title : ''); ?>">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Short Description <span
                                       style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea name="short_description" data-parsley-required="true"
                                       class="form-control" id="short_description"
                                       data-parsley-required-message="Please Enter Short Description"
                                       data-parsley-errors-container="#content_required"> <?php echo e(isset($collection->short_description) ? $collection->short_description : ''); ?> </textarea>
                                    <span class="error_field" id="content_required"></span>
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Button Name <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="button_name" id="button_name" placeholder="Button Name"  value="<?php echo e(isset($collection->button_name) ? $collection->button_name : ''); ?>" required data-parsley-required-message="Please Enter Button Name">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Button Url <span style="color: red;margin: 0;">*</span></label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <input type="text" name="button_url" id="button_url" placeholder="Button Url"  value="<?php echo e(isset($collection->button_url) ? $collection->button_url : ''); ?>" required data-parsley-required-message="Please Enter Button Url">
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Multi Image</label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="mb-3">
                                       <div class="dropzone needsclick form-control" id="dropzone_demo"
                                          name="dropzone_demo"
                                          style="text-align: center; display: flex; justify-content: center;">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php if(isset($multiImage) && $multiImage != ""): ?>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="row" id="my_image" style="display: flex;">
                                       <?php $__currentLoopData = $multiImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 remove_images" dataid="<?php echo e($value->id); ?>" style="position:relative; margin: 15px; width: auto;"><a id="delete_img" class="delete_img" dataid="<?php echo e($value->id); ?>"><i class="fa fa-times"
                                          aria-hidden="true"></i></a><img id="edit_img" src="<?php echo e(asset('uploads/collection').'/'.$value->image); ?>" width="130" height="130"></div>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                 </div>
                              </div>
                              <?php else: ?>
                              <?php endif; ?>
                              <!-- <div class="row form-sec text-end">
                                 <div
                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                    <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
                                 </div>
                                 </div> -->
                           </div>
                        </div>
                        <!-- Tab Content  -->
                        <div class="card Recent-Users next-box">
                           <h5>Door Selections</h5>
                           <div class="card-block px-0 py-3">
                             <?php $max_count = mt_rand(1, 1000); ?>
                             <input type="hidden" name="removed_door_ids" id="removed_door_ids" value="">
                              <?php if(isset($doorSelection) && count($doorSelection) != 0): ?>
                               <?php $door_selection_id =1; ?>
                                <?php $__currentLoopData = $doorSelection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="doorSelection_div mt-4">
                                  <div class="row form-sec">
                                     <div
                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                        <label for="">Title</label>
                                     </div>
                                     <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <input type="hidden" name="door_id[]" value="<?php echo e($val->id); ?>">
                                        <input type="text" name="door_title[]" id="door_title" placeholder="Title"
                                           value="<?php echo e(isset($val->door_title) ? $val->door_title : ''); ?>" required data-parsley-required-message="Please Enter Title">
                                     </div>
                                     <?php if($door_selection_id != 1): ?>
                                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                           <a href="javascript:void(0);" class="remove_icon" onclick="remove_icon(this, <?php echo e($val->id); ?>)"><i class="feather icon-minus tab-button btn btn-lg btn-danger"></i></a>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                           <i class="feather icon-plus btn btn-lg btn-primary tab-button add_icon"></i>
                                        </div>
                                    <?php endif; ?>
                                  </div>
                                  <div class="row form-sec">
                                     <div
                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                        <label for="">Description</label>
                                     </div>
                                     <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <textarea name="door_description[]" id="door_description_<?php echo e($max_count); ?>" rows="5"
                                           cols="10" required data-parsley-required-message="Please Enter Description"
                                           data-parsley-errors-container="#content_required_<?php echo e($max_count); ?>"><?php echo e(isset($val->door_description) ? $val->door_description : ''); ?></textarea>
                                        <span class="error_field" id="content_required_<?php echo e($max_count); ?>"></span>
                                     </div>
                                  </div>
                                </div>
                              <?php $max_count++; $door_selection_id++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php else: ?>
                            <div class="doorSelection_div mt-4">
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Title</label>
                                 </div>
                                 <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <input type="hidden" name="door_id[]" value="">
                                    <input type="text" name="door_title[]" id="door_title" placeholder="Title"
                                       value="" required data-parsley-required-message="Please Enter Title">
                                 </div>
                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <i class="feather icon-plus btn btn-lg btn-primary tab-button add_icon"></i>
                                 </div>
                              </div>
                              <div class="row form-sec">
                                 <div
                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                    <label for="">Description</label>
                                 </div>
                                 <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <textarea name="door_description[]" id="door_description_<?php echo e($max_count); ?>" rows="5"
                                       cols="10" required data-parsley-required-message="Please Enter Description"
                                       data-parsley-errors-container="#content_required_<?php echo e($max_count); ?>"></textarea>
                                    <span class="error_field" id="content_required_<?php echo e($max_count); ?>"></span>
                                 </div>
                              </div>
                            </div>
                            <?php $max_count++; ?>
                            <?php endif; ?>
                            <div id="doorSelection_card"></div>
                              
                           </div>
                               <div class="row form-sec mt-4">
                                 <div class="" style="display: flex; justify-content: end;">
                                    <button type="submit" id="submit_form"
                                       class="btn btn-lg btn-primary">Save</button>
                                 </div>
                              </div>
                        </div>

                     </div>
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


    //Multiple Images 

     const previewTemplate = `<div class="dz-preview dz-file-preview">
       <div class="dz-details">
        <div class="dz-thumbnail">
          <img data-dz-thumbnail>
          <span class="dz-nopreview">No preview</span>
          <div class="dz-success-mark"></div>
          <div class="dz-error-mark"></div>
          <div class="dz-error-message"><span data-dz-errormessage></span></div>
          <div class="progress">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
          </div>
        </div>
        <div class="dz-filename" data-dz-name></div>
        <div class="dz-size" data-dz-size></div>
       </div>
       </div>`;
       myDropzone = new Dropzone("#dropzone_demo", {
          url: '<?php echo e(route('media.upload')); ?>',
          previewTemplate: previewTemplate,
          parallelUploads: 1,
          maxFilesize: 5,
          addRemoveLinks: true,
          dictDefaultMessage: '<p>Click Or Drop Files Here To Upload</p><i class="fa fa-upload" aria-hidden="true"></i>',
       });

      $("#collection_add").submit(function(e) {
          e.preventDefault();
          var token = $("meta[name='csrf-token']").attr("content");
          var form = $(this);
          var data = new FormData(form[0]);
   
          myDropzone.files.forEach(function(file, index) {
              data.append(`multi_image[${index}]`, file);
          });
          $.ajax({
              url: admin_url + "store-collection",
              type: "POST",
              data: data,
              contentType: false,
              processData: false,
              
              success: function(response) {
              if (response.status == 1) {
                  window.location.href = admin_url + "collection";
                  toastr.success(response.message);
              } else {
                  toastr.error(response.message);
              }
          },
          error: function(xhr, status, error) {
              toastr.error('An error occurred while submitting the collection.');
          }
          });
      })


    // Multiple Door Selection

   $('textarea[id^="door_description_"]').each(function () {
        $(this).summernote({
            height: 300
        });
    });

    var maxField = 10; 
    var addButton = $('.add_icon'); 
    var wrapper = $('#doorSelection_card'); 

    var x = <?php echo e(isset($doorSelection) ? count($doorSelection) : 1); ?>;
    var count = <?php echo e($max_count); ?>; 

    addButton.click(function () {
        if (x < maxField) {
            x++; 
            count++;

            var fieldHTML = `
                <div class="doorSelection_div mt-4">
                    <div class="row form-sec">
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title</label>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                           <input type="hidden" name="door_id[]" value="">
                            <input type="text" name="door_title[]" id="door_title" placeholder="Title"
                                value="" required data-parsley-required-message="Please Enter Title">
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                           <i class="feather icon-minus tab-button btn btn-lg btn-danger remove_icon"></i>
                        </div>
                    </div>
                    <div class="row form-sec">
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description</label>
                        </div>
                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <textarea name="door_description[]" id="door_description_${count}" rows="5" cols="10"
                                required data-parsley-required-message="Please Enter Description"
                                data-parsley-errors-container="#content_required_${count}"></textarea>
                            <span class="error_field" id="content_required_${count}"></span>
                        </div>
                    </div>
                </div>`;
            $(wrapper).append(fieldHTML);

            // Initialize summernote for new textarea
            $(`#door_description_${count}`).summernote({
                height: 300
            });
        }
    });

    $(wrapper).on('click', '.remove_icon', function (e) {
        e.preventDefault();
        $(this).closest('.doorSelection_div').remove();
        x--; 
    });
    
    var removedDoorIds = [];

    remove_icon = function(self, id) {
        $(self).closest('.doorSelection_div').remove();
        removedDoorIds.push(id);
        $('#removed_door_ids').val(removedDoorIds.join(","));
        x--; 
    }

    $('form').parsley({
           excluded: 'input[type=hidden]:not(.visible)'
       });
       $('#submit_form').on('click', function (e) {
      
   
        $('#img_id').addClass('visible');
        $('#banner_img_id_gallery').addClass('visible');
   
   
           // Validate the form
           if (!$('form').parsley().validate()) {
               e.preventDefault();
           }
   
           // Hide the hidden input again
           $('#img_id').removeClass('visible');
           $('#banner_img_id_gallery').removeClass('visible');
           
   
       });
   });

   $('.delete_img').click(function(event) {
      var img_id = $(this).attr("dataid");
   
      var collection_id = $("#collection_id").val();
   
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
          url: "<?php echo e(route('collection.image_remove')); ?>",
          method: "POST",
          data: {
              _token: token,
              img_id: img_id,
              collection_id:collection_id
          },
          success: function(response) {
              if (response.status == 1) {
                  var image_id = response.gallery_list;
                  $(".remove_images[dataid='" + image_id + "']").remove();
              } else {
         
              }
          },
       
      });
      
   });


   // Slug Check
   
   $(document).on('change', '#title', function(e) {
      const $nameInput = $("#title");
      const $slugInput = $("#product_slug");
      var token = $("meta[name='csrf-token']").attr("content");
      var val = $(this).val();
      $.ajax({
          url: "<?php echo e(route('collection.check_slug')); ?>",
          method: "POST",
          data: {
              _token: token,
              name: val
          },
          success: function(response) {
              if (response.status == 1) {
                  $('#error_name').show();
              } else {
                  $('#error_name').hide();
                  const nameValue = $nameInput.val();
                  const slugValue = nameValue.replace(/\s+/g, "-").toLowerCase();
                  $slugInput.val(slugValue);
              }
          },
          error: function(xhr, status, error) {
              toastr.error('Something Went Wrong!');
          }
      });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/collection/add.blade.php ENDPATH**/ ?>