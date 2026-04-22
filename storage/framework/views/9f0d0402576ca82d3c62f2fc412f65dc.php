<?php $__env->startSection('title'); ?>

    Exotic Garagr Door Page Settings

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

    <div class="pcoded-wrapper">

        <div class="pcoded-content">

            <div class="pcoded-inner-content">

                <div class="main-body">

                    <div class="page-wrapper">

                        <form action="<?php echo e(route('servicearea.add')); ?>" method="POST" data-parsley-validate=""

                            enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <?php if(isset($serviceareas)): ?>

                                <input type="hidden" name="serviceareas_id"

                                    value="<?php echo e(isset($serviceareas->id) ? $serviceareas->id : ''); ?>">

                            <?php endif; ?>

                            <div class="row">

                                <div

                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 cpl-sm-12 col-xs-12 add-article form-main-sec ">

                                    <div class="card Recent-Users">

                                        <h5> Service Area Page Settings</h5>

                                        <div class="card-block px-0 py-3">











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

                                                                value="<?php echo e(isset($serviceareas->meta_title) ? $serviceareas->meta_title : ''); ?>"

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

                                                            <input type="text" name="meta_keyword" id="meta_keyword"

                                                                placeholder="Sub Title"

                                                                value="<?php echo e(isset($serviceareas->meta_keyword) ? $serviceareas->meta_keyword : ''); ?>"

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

                                                            <textarea class="form-control" id="meta_description" name="meta_description" style="height: 150px;"

                                                                data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Description"><?php echo e(isset($serviceareas->meta_description) ? $serviceareas->meta_description : ''); ?></textarea>

                                                        </div>

                                                    </div>

                                                </div>



                                            </div>



                                            <div class="row form-sec">

                                                <div

                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">

                                                    <label for="description">Title<span

                                                            style="color: red;margin: 0;">*</span></label>

                                                </div>

                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <input type="text" name="title" id="title"

                                                                placeholder="Title"

                                                                value="<?php echo e(isset($serviceareas->title) ? $serviceareas->title : ''); ?>"

                                                                data-parsley-required-message="Please Enter Title">

                                                </div>







                                            </div>

                                            <div class="row form-sec">

                                                <div

                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">

                                                    <label for="description">Banner Description<span

                                                            style="color: red;margin: 0;">*</span></label>

                                                </div>

                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <textarea class="form-control" id="description" name="description"><?php echo e(isset($serviceareas->description) ? $serviceareas->description : ''); ?></textarea>

                                                    <span id="description_required"></span>

                                                </div>







                                            </div>







                                            <div class="row form-sec text-end">

                                                <div

                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">

                                                    <button type="submit" id="submit_form"

                                                        class="btn btn-primary">Save</button>

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

        $(document).ready(function() {



            $('#description').summernote({

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

        $('#hollowmetal_bannerimage_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hollowmetal_bannerimage').val(null);

            $('#hollowmetal_bannerimage_avtar').attr('src', assetPath);

            $('#hollowmetal_bannerimage_remove_image').css('display', 'none');

            $('#hollowmetal_bannerimage_avtar').css('opacity', '1.0');

        });

        $('#section2_image_remove_image').click(function(event) {

            event.stopPropagation();

            $('#section2_image').val(null);

            $('#section2_image_avtar').attr('src', assetPath);

            $('#section2_image_remove_image').css('display', 'none');

            $('#section2_image_avtar').css('opacity', '1.0');

        });

        $('#hm_d_section3_image_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section3_image').val(null);

            $('#hm_d_section3_image_avtar').attr('src', assetPath);

            $('#hm_d_section3_image_remove_image').css('display', 'none');

            $('#hm_d_section3_image_avtar').css('opacity', '1.0');

        });



        $('#hm_d_section4_image_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section4_image').val(null);

            $('#hm_d_section4_image_avtar').attr('src', assetPath);

            $('#hm_d_section4_image_remove_image').css('display', 'none');

            $('#hm_d_section4_image_avtar').css('opacity', '1.0');

        });



        $('#hm_d_section5_image_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section5_image').val(null);

            $('#hm_d_section5_image_avtar').attr('src', assetPath);

            $('#hm_d_section5_image_remove_image').css('display', 'none');

            $('#hm_d_section5_image_avtar').css('opacity', '1.0');

        });



        $('#hm_d_section6_image1_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section6_image').val(null);

            $('#hm_d_section6_image1_avtar').attr('src', assetPath);

            $('#hm_d_section6_image1_remove_image').css('display', 'none');

            $('#hm_d_section6_image1_avtar').css('opacity', '1.0');

        });



        $('#hm_d_section6_image2_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section6_image2').val(null);

            $('#hm_d_section6_image2_avtar').attr('src', assetPath);

            $('#hm_d_section6_image2_remove_image').css('display', 'none');

            $('#hm_d_section6_image2_avtar').css('opacity', '1.0');

        });

        $('#hm_d_section7_image_remove_image').click(function(event) {

            event.stopPropagation();

            $('#hm_d_section7_image').val(null);

            $('#hm_d_section7_image_avtar').attr('src', assetPath);

            $('#hm_d_section7_image_remove_image').css('display', 'none');

            $('#hm_d_section7_image_avtar').css('opacity', '1.0');

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


<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/servicearea/index.blade.php ENDPATH**/ ?>