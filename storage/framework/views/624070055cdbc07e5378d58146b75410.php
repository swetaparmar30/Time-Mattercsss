<?php $__env->startSection('main_content'); ?>

<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->

            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <form id="gallery_addd" action="<?php echo e(route('gallery.store')); ?>" method="POST" data-parsley-validate=""
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                         <input type="hidden" id="gallery_id" name="gallery_id" value=" <?php echo e(isset($gallery->id) ? $gallery->id : ''); ?> ">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                <div class="card Recent-Users">
                                    <?php if(isset($gallery) && $gallery != ''): ?>
                                    <h5>Edit Gallery</h5>
                                    <?php else: ?>
                                    <h5>Add Gallery</h5>
                                    <?php endif; ?>
                                    <div class="card-block px-0 py-3">

                                     <!--    <div class="row form-sec">
                                            <input type="hidden" id="gallery_id" name="gallery_id"
                                                value=" <?php echo e(isset($gallery->id) ? $gallery->id : ''); ?> ">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" id="title" name="title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    placeholder="Title"
                                                    value="<?php echo e(isset($gallery->title) ? $gallery->title : ''); ?>">
                                                <span id="error_name" style="color:red;display:none;">This Title is
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
                                                <input type="text" class="form-control" name="slug" id="slug"
                                                    placeholder="Slug" required
                                                    data-parsley-required-message="Please Enter Slug"
                                                    value="<?php echo e(isset($gallery->slug) ? $gallery->slug : ''); ?>">
                                            </div>
                                        </div> -->

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Thumbnail <span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" required data-parsley-errors-container="#logo_required"data-parsley-trigger="change" data-parsley-required-message="Please choose an image."
                                                    value="<?php echo e(isset($gallery->featured_img) ? $gallery->featured_img : ''); ?>"
                                                    name="img_id" id="img_id">
                                                <div class="upload-img-sec text-center image_preview_div">
                                                    <?php if(isset($image_name->name) && $image_name->name != ''): ?>
                                                    <img src="<?php echo e(asset('uploads/' . $image_name->name)); ?>" alt=""
                                                        class="img-fluid profile_avtar" id="profile_avtar"
                                                        style="width:125px;height:125px;">
                                                    <a id="remove_image"><i class="fa fa-times"
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

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Popup Image<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <input type="hidden" name="banner_image" id="footer_img_id" value="<?php echo e(isset($gallery->banner_image) ? $gallery->banner_image : ''); ?>" data-parsley-errors-container="#banner_image_img_required" data-parsley-trigger="change" data-parsley-required-message="Please choose an image.">
                                       <?php if(isset($banner_image_name->name) && $banner_image_name->name != ''): ?>
                                       <div class="image_preview_div text-center">
                                          <img src="<?php echo e(asset('uploads/'.$banner_image_name->name)); ?>" alt="" id="footer_profile_avtar" class="profile-img" style="width:125px;height:125px;"> 
                                          <a id="footer_remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php else: ?>
                                       <div class="image_preview_div text-center">
                                          <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt="" 
                                             id="footer_profile_avtar" class="profile-img" style="width:125px;height:125px;"> 
                                          <a id="footer_remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                       </div>
                                       <?php endif; ?>
                                      
                                       <label for="" style="cursor: pointer;" data-val="footer_profile_avtar" class="choose_file hm-choose-img-title text-center">Choose image</label>

                                        </div>
                                        <!-- <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <span style="margin-right: 50px;">Publish Status</span>
                                                <input type="checkbox" data-toggle="toggle" checked name="is_publish"
                                                    <?php if(isset($gallery->is_publish) && $gallery->is_publish == '1'): ?>
                                                checked <?php endif; ?>>
                                            </div>
                                        </div> -->
                                           <div class="row form-sec">
                                                
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Publish Status</label>
                                                </div>
                                                <div
                                                class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <label class="switch">
                                                        <input type="checkbox" id="sliderindexbutton" name="is_publish" <?php if(isset($gallery->is_publish) && $gallery->is_publish == '0'): ?> <?php else: ?> checked <?php endif; ?>>
                                                        <div class="slider round">
                                                            <span class="on">Yes</span>
                                                            <span class="off">No</span>
                                                        </div>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        <div class="row form-sec text-end">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                      <!--   <div class="row form-sec">
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
                                        </div> -->
                                     <!--    <?php if(isset($multiImage) && $multiImage != ""): ?>
                                        <div class="row form-sec">

                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="row" id="my_image" style="display: flex;">
                                                    <?php $__currentLoopData = $multiImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 remove_images" dataid="<?php echo e($value->id); ?>" style="position:relative; margin: 15px; width: auto;"><a id="delete_img" class="delete_img" dataid="<?php echo e($value->id); ?>"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a><img id="edit_img" src="<?php echo e(asset('uploads/gallery_multi_img').'/'.$value->name); ?>" width="130" height="130"></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <?php endif; ?> -->
                                    </div>
                                </div>
                            </div>
                     <!--        <div
                                class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                                <div class="card Recent-Users">
                                    <h5>Thumbnail</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" required data-parsley-errors-container="#logo_required"data-parsley-trigger="change" data-parsley-required-message="Please choose an image."
                                                    value="<?php echo e(isset($gallery->featured_img) ? $gallery->featured_img : ''); ?>"
                                                    name="img_id" id="img_id">
                                                <div class="upload-img-sec text-center image_preview_div">
                                                    <?php if(isset($image_name->name) && $image_name->name != ''): ?>
                                                    <img src="<?php echo e(asset('uploads/' . $image_name->name)); ?>" alt=""
                                                        class="img-fluid profile_avtar" id="profile_avtar"
                                                        style="width:125px;height:125px;">
                                                    <a id="remove_image"><i class="fa fa-times"
                                                            aria-hidden="true"></i></a>
                                                    <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" alt=""
                                                        id="profile_avtar" class="profile-img">
                                                    <a id="remove_image" style="display: none;"> <i class="fa fa-times"
                                                            aria-hidden="true"></i></a>
                                                    <?php endif; ?>
                                                    <label for="file" style="cursor: pointer;"
                                                        class="form-label upload_image choose_file">Choose image</label>
                                                </div>
                                                <span class="error_field" id="logo_required"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>-->

                                 


                                <!--<div class="card Recent-Users next-box">
                                    <h5>Status</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <span style="margin-right: 50px;">Publish Status</span>
                                                <input type="checkbox" data-toggle="toggle" checked name="is_publish"
                                                    <?php if(isset($gallery->is_publish) && $gallery->is_publish == '1'): ?>
                                                checked <?php endif; ?>>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card Recent-Users next-box">
                                <h5>Categories</h5>
                                <p style="font-size: 12px;">Only Active Categories</p>
                                <div class="card-block px-0 py-3 common-select">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                            
                                                <select name="gallery_categories[]" id="categorySelect" class="select2"  multiple >
                                                    <option value="Select a Category" disabled>Select a Category</option>
                                                    <?php if(isset($gallery)): ?>
                                                    <?php
                                                        $selectedcategories = explode(',', $gallery->category_id);
                                                    ?>
                                                <?php endif; ?>
                                                    <?php if(isset($galleryCategories)): ?>
                                                        <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             
                                                        <?php $dash=''; ?>
                                                            <option value="<?php echo e($category->id); ?>"
                                                                <?php echo e(isset($selectedcategories) && in_array($category->id, $selectedcategories) ? 'selected' : ''); ?>>
                                                                <?php echo e($category->category); ?>

                                                            </option>
                                                            <?php if(count($category->subcategory)): ?>
                                                            <?php $dash.='-- '; ?>
                                                            <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($subcategory->id); ?>" <?php echo e(isset($selectedcategories) && in_array($subcategory->id, $selectedcategories) ? 'selected' : ''); ?>><?php echo e($dash); ?><?php echo e($subcategory->category); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <span class="error_field" id="category_required"></span>
                                                    <div class="row form-sec" id="new_cat_add_div" style="display:none;">
                                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">New Category
                                                        </label>
                                                        <input type="text" name="gallery_category" id="gallery_category" placeholder="Category">
                                                        <input type="text" name="gallery_slug" id="gallery_slug" placeholder="Slug">
                                                        <span id="new_cat_required" class="error_field" style="display:none;color:red;">Please Enter Category Name</span>
                                                        <select class="form-select" id="parent_category" name="parent_category"
                                                            aria-label="Default select example" style="margin-bottom: 15px;">
                                                            <option value="0">--- Select Category ---</option>

                                                            <?php if(isset($galleryCategories)): ?>
                                                            <?php $__currentLoopData = $galleryCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $dash=''; ?>
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                                            <?php if(count($category->subcategory)): ?>
                                                            <?php echo $__env->make('subcategoryList-option',['subcategories' => $category->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <a class="add_new_cat_class" id="submit_new_cat">Add</a>
                                                    </div>
                                                </div>
                                                <a class="btn add_categories" id="add_new_cat_btn">Add New Categories</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </div> -->
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
// $(document).ready(function() {
//     $('#description').summernote({
//         height: 200
//     });
// });
// const previewTemplate = `<div class="dz-preview dz-file-preview">
// <div class="dz-details">
//   <div class="dz-thumbnail">
//     <img data-dz-thumbnail>
//     <span class="dz-nopreview">No preview</span>
//     <div class="dz-success-mark"></div>
//     <div class="dz-error-mark"></div>
//     <div class="dz-error-message"><span data-dz-errormessage></span></div>
//     <div class="progress">
//       <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
//     </div>
//   </div>
//   <div class="dz-filename" data-dz-name></div>
//   <div class="dz-size" data-dz-size></div>
// </div>
// </div>`;
// myDropzone = new Dropzone("#dropzone_demo", {
//     url: '<?php echo e(route('media.upload')); ?>',
//     previewTemplate: previewTemplate,
//     parallelUploads: 1,
//     maxFilesize: 5,
//     addRemoveLinks: true,
//     dictDefaultMessage: '<p>Click Or Drop Files Here To Upload</p><i class="fa fa-upload" aria-hidden="true"></i>',
// });

// $(document).ready(function() {
//     $("#gallery_add").submit(function(e) {
//         e.preventDefault();
//         var token = $("meta[name='csrf-token']").attr("content");
//         var form = $(this);
//         var data = new FormData(form[0]);
//         // data.append("multi_image", JSON.stringify(myDropzone.files));
//         $.ajax({
//             url: admin_url + "gallery-store",
//             type: "POST",
//             data: data,
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 var data = JSON.parse(response);
//                 if ((data.status = 1)) {
//                     window.location.href = admin_url + "gallery";
//                     toastr.success(data.message);
//                 }
//             },
//         });
//     })
// });

// $(document).on('change', '#title', function(e) {
//     const $nameInput = $("#title");
//     const $slugInput = $("#slug");
//     var token = $("meta[name='csrf-token']").attr("content");
//     var val = $(this).val();
//     $.ajax({
//         url: "<?php echo e(route('gallery.check_slug')); ?>",
//         method: "POST",
//         data: {
//             _token: token,
//             name: val
//         },
//         success: function(response) {
//             if (response.status == 1) {
//                 $('#error_name').show();
//             } else {
//                 $('#error_name').hide();
//                 const nameValue = $nameInput.val();
//                 const slugValue = nameValue.replace(/\s+/g, "-").toLowerCase();
//                 $slugInput.val(slugValue);
//             }
//         },
//         error: function(xhr, status, error) {
//             toastr.error('Something Went Wrong!');
//         }
//     });
// });

$('.delete_img').click(function(event) {
    var img_id = $(this).attr("dataid");

    var gallery_id = $("#gallery_id").val();

    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: "<?php echo e(route('gallery.image_remove')); ?>",
        method: "POST",
        data: {
            _token: token,
            img_id: img_id,
            gallery_id:gallery_id
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

$(document).on('click', '#add_new_cat_btn', function() {
    $('#new_cat_add_div').toggle();
});

// $(document).on('change', '#gallery_category', function(e) {
//     const $nameInput = $("#gallery_category");
//     const $slugInput = $("#gallery_slug");
//     var token = $("meta[name='csrf-token']").attr("content");
//     var val = $(this).val();
//     $.ajax({
//         url: "<?php echo e(route('gallery_category.check_slug')); ?>",
//         method: "POST",
//         data: {
//             _token: token,
//             name: val
//         },
//         success: function(response) {
//             if (response.status == 1) {
//                 $('#error_name').show();
//             } else {
//                 $('#error_name').hide();
//                 const nameValue = $nameInput.val();
//                 const slugValue = nameValue.replace(/\s+/g, "-").toLowerCase();
//                 $slugInput.val(slugValue);
//             }
//         },
//         error: function(xhr, status, error) {
//             toastr.error('Something Went Wrong!');
//         }
//     });
// });

// $(document).on('click', '#submit_new_cat', function() {
//             var gallery_category = $('#gallery_category').val();
//             var gallery_slug = $('#gallery_slug').val();
//             var parent_category = $('#parent_category').val();
//             var token = $("meta[name='csrf-token']").attr("content");
//             if(gallery_category == ''){
//                 $('#new_cat_required').show();
//             }else{
//                 $('#new_cat_required').hide();
//                 $.ajax({
//                 url: "<?php echo e(route('gallery-category.create-category')); ?>",
//                 method: "POST",
//                 data: {
//                     _token: token,
//                     gallery_category: gallery_category,
//                     gallery_slug: gallery_slug,
//                     parent_category: parent_category
//                 },
//                 success: function(response) {
//                     if (response.status == 1) {
//                         toastr.error(response.message);
//                         var new_cat = $('#gallery_category').val('');
//                     }
//                     else if(response.status == 0)
//                     {
//                         var newCategory = response.newCategory;
//                         var categorySelect = $('#categorySelect');
//                         categorySelect.append($('<option>', {
//                         value: newCategory.id,
//                         text: newCategory.category,
//                         selected: true 
//                     }));
//                     categorySelect.trigger('change');
//                     toastr.success(response.message);
//                     $('#gallery_category').val('');
//                     $('#gallery_slug').val('');

//                     }
//                 },
//                 error: function(xhr, status, error) {
//                     toastr.error('Something Went Wrong!');
//                 }
//             });
//             }
//         });
</script>

<script>
    $(document).ready(function () {
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
}) 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/gallery/add.blade.php ENDPATH**/ ?>