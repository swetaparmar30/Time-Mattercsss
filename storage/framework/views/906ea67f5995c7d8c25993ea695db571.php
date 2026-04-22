<?php $__env->startSection('main_content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->

            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <?php if(isset($article) && $article != ''): ?>
                            <form action="<?php echo e(route('articles.update', ['id' => $article->id])); ?>" method="POST"
                                data-parsley-validate="" enctype="multipart/form-data">
                            <?php else: ?>
                                <form action="<?php echo e(route('articles.store')); ?>" method="POST" data-parsley-validate=""
                                    enctype="multipart/form-data">
                        <?php endif; ?>
                                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                            <div class="card Recent-Users">
                                <?php if(isset($article) && $article != ''): ?>
                                <h5>Edit Blog</h5>
                                <?php else: ?>
                                <h5>Add Blog</h5>
                                <?php endif; ?>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="article_id"
                                                    value="<?php echo e(isset($article->id) ? $article->id : ''); ?>">
                                                <label for="">Name <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="article_title" id="article_title" placeholder="Name" required
                                                data-parsley-required-message="Please Enter Title" value="<?php echo e(isset($article->title) ? $article->title : ''); ?>">
                                                <span id="error_name" style="color:red;display:none;">This Title is
                                                    Already
                                                    Taken</span>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Slug <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="article_Slug" id="article_slug" placeholder="Slug" required
                                                data-parsley-required-message="Please Enter Slug" value="<?php echo e(isset($article->slug) ? $article->slug : ''); ?>">
                                            </div>
                                        </div>

                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor" name="article_short_desc" data-parsley-required="true" placeholder="Short Description" rows="4" cols="4"
                                                    data-parsley-required-message="Please Enter Short Description" > <?php echo e(isset($article->short_description) ? $article->short_description : ''); ?> </textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Content <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                
                                                <textarea class="form-control rich-text-editor" id="code_preview0" name="article_content" style="height: 300px;" data-parsley-required="true" data-parsley-required-message="Please enter Content" data-parsley-errors-container="#content_required"><?php echo e(isset($article->content) ? $article->content : ''); ?></textarea>
                                                <span id="content_required"></span>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="card Recent-Users next-box">
                                <h5>Seo Meta Tags</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Meta title</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="meta_title" id="" placeholder="Type here" value="<?php echo e(isset($article->meta_title) ? $article->meta_title : ''); ?>">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Meta Keyword</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="meta_keyword" id="" placeholder="Type here" value="<?php echo e(isset($article->meta_keyword) ? $article->meta_keyword : ''); ?>" >
                                            </div>
                                        </div>

                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Meta description</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <textarea class="form-control" name="meta_description" id="" rows="5" cols="10"><?php echo e(isset($article->meta_description) ? $article->meta_description : ''); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                                
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Page Index</label>
                                                </div>
                                                <div
                                                class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <label class="switch">
                                                        <input type="checkbox" id="sliderindexbutton" name="page_index" <?php if(isset($article->page_index) && $article->page_index == '0'): ?> <?php else: ?> checked <?php endif; ?>>
                                                        <div class="slider round">
                                                            <span class="on">Yes</span>
                                                            <span class="off">No</span>
                                                        </div>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Canonical Url</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="canonical_url" id=""
                                                        placeholder="Canonical Url"
                                                        value="<?php echo e(isset($article->canonical_url) ? $article->canonical_url : ''); ?>">
                                                </div>
                                            </div>
                                        

                                  
                                </div>
                            </div>
                        </div>





                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                            <div class="card Recent-Users">
                                <h5>Publish</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec ">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec d-flex justify-content-between">
                                               <div class="d-flex">
                                                <input type="radio" id="a25" name="publish_status" class="public_status_radio" value="Draft" <?php if(isset($article->publish_status) && $article->publish_status == 'Draft'): ?> checked <?php endif; ?>/>
                                                <label class="btn btn-secondary public_status_lable" for="a25">Draft</label>
                                                <input type="radio" id="a26" name="publish_status" class="public_status_radio" value="Pending" <?php if(isset($article->publish_status) && $article->publish_status == 'Pending'): ?> checked <?php endif; ?>/>
                                                <label class="btn btn-secondary public_status_lable" for="a26">Pending</label>
                                               </div>
                                               
                                            </div>
                                        </div>

                                        <div class="row form-sec" style="display:none">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="edit-sec">
                                                    <i class="icofont-eye icofont-1x"></i>
                                                    <span class="font-14 black ml-1">Visibility :</span>
                                                    <span class="font-14 bold black ml-2" id="current_visibility"><?php echo e(isset($article->visibility) ? $article->visibility : 'Public'); ?></span>
                                                    <a class="btn custom-btn ml-2" id="edit_visibility">Edit</a>
                                                    <div class="visibility_hide_div" style="display: none;"> 
                                                        <div class="visiblity_inner_div">
                                                        <input type="radio" checked="" name="visibility" id="visibility-radio-public" value="Public" class="visiblity_toggle" <?php if(isset($article->visibility) && $article->visibility == 'Public'): ?> checked <?php endif; ?>>
                                                        <label for="visibility-radio-public" class="selectit">Public</label>
                                                        </div>
                                                        <div class="visiblity_inner_div">
                                                        <input type="radio"  name="visibility" id="visibility-radio-password" value="Password" class="visiblity_toggle" <?php if(isset($article->visibility) && $article->visibility == 'Password'): ?> checked <?php endif; ?>>
                                                        <label for="visibility-radio-password" class="selectit">Password Protected</label>
                                                    </div>
                                                        <span class="visiblity_password" style="display:none;">
                                                        <input type="text" name="post_pass" value="<?php echo e(isset($article->password) ? $article->password : ''); ?>"><br>
                                                        <span class="visibility_error" style="color:red">If Password Field is remain Empty then visibility will be saved as Public.</span>
                                                        </span>
                                                    
                                                    <div class="visiblity_inner_div">
                                                        <input type="radio"  name="visibility" id="visibility-radio-private" value="Private" class="visiblity_toggle" <?php if(isset($article->visibility) && $article->visibility == 'Private'): ?> checked <?php endif; ?>>
                                                        <label for="visibility-radio-private" class="selectit">Private</label>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="Publish-sec">
                                                    <span class="font-14 black ml-1">Publish :</span>
                                                    <input type="date" name="article_published_at" id="" value="<?php echo e(isset($article->published_at) ? $article->published_at : ''); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" class="btn btn-primary">Publish</button>
                                            </div>
                                        </div>

                                        
                                    
                                </div>
                            </div>

                            <div class="card Recent-Users next-box" style="display:none">
                                <h5>Formate</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 radio-sec">
                                                <p><input type="radio" value="Standard" name="format" checked <?php if(isset($article->format) && $article->format == 'Standard'): ?> checked <?php endif; ?>> Standard</p>
                                                <p><input type="radio" value="Video" name="format" <?php if(isset($article->format) && $article->format == 'Video'): ?> checked <?php endif; ?>> Video</p>
                                                <p><input type="radio" value="Audio" name="format" <?php if(isset($article->format) && $article->format == 'Audio'): ?> checked <?php endif; ?>> Audio</p>
                                                <p><input type="radio" value="Gallery" name="format" <?php if(isset($article->format) && $article->format == 'Gallery'): ?> checked <?php endif; ?>> Gallery</p>
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
                                                <select name="artical_categories[]" id="categorySelect" class="select2"  multiple required
                                                data-parsley-required-message="Please Enter Category"
                                                data-parsley-errors-container="#category_required">
                                                    <option value="Select a Category" disabled>Select a Category</option>
                                                    <?php if(isset($article)): ?>
                                                    <?php
                                                        $selectedcategories = explode(',', $article->category_id);
                                                    ?>
                                                <?php endif; ?>
                                                    <?php if(isset($categories)): ?>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <span id="category_required"></span>
                                                    <div class="row form-sec" id="new_cat_add_div" style="display:none;">
                                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">New Category
                                                        </label>
                                                        <input type="text" name="new_cat" id="new_cat" placeholder="Type here">
                                                        <span id="new_cat_required" style="display:none;color:red;">Please Enter Category Name</span>
                                                        <select class="form-select" id="parent_category" name="parent_category"
                                                            aria-label="Default select example" style="margin-bottom: 15px;">
                                                            <option value="0">None</option>

                                                            <?php if(isset($categories)): ?>
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $dash=''; ?>
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                                            <?php if(count($category->subcategory)): ?>
                                                            <?php echo $__env->make('subcategoryList-option',['subcategories' =>
                                                            $category->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                            <div class="card Recent-Users next-box">
                                <h5>Tags</h5>
                                <div class="card-block px-0 py-3 common-select">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <?php if(isset($article)): ?>
                                                    <?php
                                                        $selectedtags = explode(',', $article->tag_id);
                                                    ?>
                                                <?php endif; ?>
                                                <select name="artical_tags[]" id="artical_tags" multiple
                                                required multiple required
                                                data-parsley-required-message="Please Enter Tag"
                                                data-parsley-errors-container="#tag_required"> 
                                                    <option value="Select a Category" disabled>Select a Tage</option>
                                                    <?php if(isset($tags)): ?>
                                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($tag->id); ?>"
                                                                <?php echo e(isset($article) && in_array($tag->id, $selectedtags) ? 'selected' : ''); ?>>
                                                                <?php echo e($tag->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <span id="tag_required"></span>
                                                <div class="row form-sec" id="new_tag_add_div" style="display:none;">
                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">New Tag </label>
                                                        <div class="new_tag_add_inner">
                                                            <input type="text" name="new_tag" id="new_tag" placeholder="Type here">
                                                            <span id="new_tag_required" style="display:none;color:red;">Please Enter Tag Name</span>
                                                            <a class="add_new_cat_class" id="submit_new_cat">Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn add_categories" id="add_new_tag_btn">Add New Tage</a>
                                            </div>
                                            
                                        </div>

                                </div>
                            </div>

                            <div class="card Recent-Users next-box">
                                <h5>Blog Image</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="upload-img-sec text-center">
                                                    <input type="hidden" name="article_img" id="img_id" value="<?php echo e(isset($article->image) ? $article->image : ''); ?>">
                                                    <?php
                                                        $imgpath = asset('assets/images/user/img-demo_1041.jpg');
                                                        
                                                    ?>
                                                    <?php if(isset($article->image) && $article->image != '' && $article->image != null): ?>
                                                    <?php

                                                        $img = App\Models\MediaImage::select('name')->where('id', $article->image)->first();
                                                        if($img) {
                                                            if(file_exists(public_path('uploads/'.$img->name))){
                                                                $imgpath = asset('uploads/'.$img->name);
                                                            }
                                                        }
                                                    ?>
                                                    <div class="image_preview_div">
                                                    <img src="<?php echo e($imgpath); ?>" alt="" id="profile_avtar" class="profile-img" id="profile_avtar"> 
                                                    <a id="remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="image_preview_div" >
                                                    <img src="<?php echo e($imgpath); ?>" alt="" id="profile_avtar" class="profile-img"> 
                                                    <a id="remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title">Choose image</label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                </div>
                            </div>

                            

                            <div class="card Recent-Users next-box">
                                <h5>Blog Status</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <span style="margin-right: 50px;">Enable/Disable</span>
                                                <input type="checkbox" data-toggle="toggle" checked name="is_featured" <?php if(isset($article->is_featured) && $article->is_featured == '1'): ?> checked <?php endif; ?>>
                                            </div>
                                            
                                        </div>

                                </div>
                            </div>
                        
                        </div>
                        <!--[ Recent Users ] end-->

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
        $(document).on('click', '#edit_visibility', function() {
            $('.visibility_hide_div').toggle();
        });
        $(document).on('change', '.visiblity_toggle', function() {
            var val = $(this).val();
            if(val === "Password")
            {
                $('.visiblity_password').show();
            }
            else{
                $('.visiblity_password').hide();
            }
        });
    </script>
    <script>
        $(document).on('change', '#article_title', function(e) {
            const $nameInput = $("#article_title");
            const $slugInput = $("#article_slug");
            var token = $("meta[name='csrf-token']").attr("content");
            var val = $(this).val();
         
            $.ajax({
                url: "<?php echo e(route('articles.check_article_slug')); ?>",
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
                        const tempElement = $('<div>').html(nameValue);
                        const textContent = tempElement.text();
                        const slugValue = textContent.replace(/\s+/g, '-').toLowerCase();
                        // const slugValue = nameValue.replace(/\s+/g, "-").toLowerCase();
                        $slugInput.val(slugValue);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something Went Wrong!');
                }
            });
        });

        $(document).on('click', '#add_new_cat_btn', function() {
            $('#new_cat_add_div').toggle();
        });
        $(document).on('click', '#submit_new_cat', function() {
            var new_cat = $('#new_cat').val();
            var parent = $('#parent_category').val();
            var token = $("meta[name='csrf-token']").attr("content");
            if(new_cat == ''){
                $('#new_cat_required').show();
            }else{
                $('#new_cat_required').hide();
                $.ajax({
                url: "<?php echo e(route('articles.create-category')); ?>",
                method: "POST",
                data: {
                    _token: token,
                    new_cat: new_cat,
                    parent: parent
                },
                success: function(response) {
                    if (response.status == 1) {
                        toastr.error(response.message);
                        var new_cat = $('#new_cat').val('');
                    }
                    else if(response.status == 0)
                    {
                        var newCategory = response.newCategory;
                        var categorySelect = $('#categorySelect');
                        categorySelect.append($('<option>', {
                        value: newCategory.id,
                        text: newCategory.category,
                        selected: true 
                    }));
                    categorySelect.trigger('change');
                    toastr.success(response.message);
                    $('#new_cat').val('');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something Went Wrong!');
                }
            });
            }
        });
        </script>
        <script>
            $(document).on('click', '#add_new_tag_btn', function() {
            $('#new_tag_add_div').toggle();
            });

            $(document).on('click', '#submit_new_cat', function() {
            var new_tag = $('#new_tag').val();
            var token = $("meta[name='csrf-token']").attr("content");
            if(new_tag == ''){
                $('#new_tag_required').show();
            }else{
                $('#new_tag_required').hide();
                $.ajax({
                url: "<?php echo e(route('articles.create-tag')); ?>",
                method: "POST",
                data: {
                    _token: token,
                    new_tag: new_tag,
                },
                success: function(response) {
                    if (response.status == 1) {
                        toastr.error(response.message);
                        var new_cat = $('#new_tag').val('');
                    }
                    else if(response.status == 0)
                    {
                        var newtag = response.newtag;
                        var tagSelect = $('#artical_tags');
                        tagSelect.append($('<option>', {
                        value: newtag.id,
                        text: newtag.name,
                        selected: true 
                    }));
                    tagSelect.trigger('change');
                    toastr.success(response.message);
                    $('#new_tag').val('');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something Went Wrong!');
                }
            });
            }
        });
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/articles/add.blade.php ENDPATH**/ ?>