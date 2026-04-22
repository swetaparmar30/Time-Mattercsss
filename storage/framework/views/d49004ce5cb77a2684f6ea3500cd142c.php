<?php if(isset($page->meta_title) && $page->meta_title != ''): ?>
    <?php $__env->startSection('title'); ?>
        <?php echo e($page->meta_title); ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->meta_keyword) && $page->meta_keyword != ''): ?>
    <?php $__env->startSection('meta-keywords'); ?>
        <?php echo e($page->meta_keyword); ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($page->meta_description) && $page->meta_description != ''): ?>
    <?php $__env->startSection('meta-description'); ?>
        <?php echo e($page->meta_description); ?>

    <?php $__env->stopSection(); ?>
<?php endif; ?>




<?php $__env->startSection('content'); ?>

    <!--------------------- Photo Gallery Banner Section ----------------------->
    <section class="photo-gallery gallery-page sandk-common-padding sandk-common text-center">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                    
                    <h2>Our Work</h2>
                </div>
            </div>
            <!-- <div class="row popup-gallery-tab">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 tab-sec">
                                <ul id="details-tab-item" class="details-tab-items">
                                    <li><a href="#all">All</a></li>
                                    <?php if(isset($categories) && count($categories) > 0 && !empty($categories)): ?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><a href="#<?php echo e($cat->slug); ?>"><?php echo e($cat->category); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

                                </ul>
                            </div>
                        </div> -->
            <div class="row popup-gallery details-tab-details" id="all">
                <?php if(isset($photos) && count($photos) > 0 && !empty($photos)): ?>
                    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($val->featured_img) && $val->featured_img != null): ?>
                            <?php
                                $img_2 = $img = App\Models\MediaImage::select('name')
                                    ->where('id', $val->featured_img)
                                    ->first();
                            ?>
                        <?php endif; ?>
                        <?php if(isset($val->banner_image) && $val->banner_image != null): ?>
                            <?php
                                $img_2 = App\Models\MediaImage::select('name')
                                    ->where('id', $val->banner_image)
                                    ->first();
                            ?>
                        <?php endif; ?>
                        <div
                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 text-center each-image <?php if($key > 2): ?>  <?php endif; ?>">
                            <figure>
                                <div class="gallery-item">
                                    <a data-effect="mfp-zoom-in"
                                        href="<?php echo e(isset($img_2->name) ? asset('uploads/' . $img_2->name) : (isset($img->name) ? asset('uploads/' . $img->name) : '#')); ?>"
                                        title="" class="a">
                                        <img class="img-fluid" src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                            alt="<?php echo e($val->title); ?>" />
                                        <img class="plus-img"
                                            src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                            width="80" height="80">
                                    </a>
                                </div>
                            </figure>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($photos) && count($photos) > 15 && !empty($photos)): ?>
                        <!-- <div>
                                 <a class="common-btn text-center" id="loadMoreBtn" style="cursor: pointer;">Load More</a>
                                </div> -->
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if(isset($categories) && count($categories) > 0 && !empty($categories)): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $images = App\Models\ProjectGallery::where('category_id', $cat->id)->latest()->get();
                    ?>
                    <div class="row popup-gallery details-tab-details" id="<?php echo e($cat->slug); ?>">
                        <?php if(isset($images) && count($images) > 0 && !empty($images)): ?>
                            <?php $__currentLoopData = $images->take(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($val->featured_img) && $val->featured_img != null): ?>
                                    <?php
                                        $img =
                                            isset($val->featured_img) && $val->featured_img != null
                                                ? App\Models\MediaImage::select('name')
                                                    ->where('id', $val->featured_img)
                                                    ->first()
                                                : null;
                                    ?>
                                <?php endif; ?>
                                <?php if(isset($val->banner_image) && $val->banner_image != null): ?>
                                    <?php
                                        $img_2 =
                                            isset($val->banner_image) && $val->banner_image != null
                                                ? App\Models\MediaImage::select('name')
                                                    ->where('id', $val->banner_image)
                                                    ->first()
                                                : null;
                                    ?>
                                <?php endif; ?>
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 each-image text-center  <?php if($key > 2): ?>  <?php endif; ?>">
                                    <figure>
                                        <div class="gallery-item">
                                            <a data-effect="mfp-zoom-in"
                                                href="<?php echo e(isset($img_2->name) ? asset('uploads/' . $img_2->name) : (isset($img->name) ? asset('uploads/' . $img->name) : '#')); ?>"
                                                title="" class="a">
                                                <img class="img-fluid" src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                    alt="<?php echo e($val->title); ?>" />
                                                <img class="plus-img"
                                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                                    width="80" height="80">
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($images) && count($images) > 15 && !empty($images)): ?>
                                <!--  <div>
                             <a class="common-btn text-center loadMoreBtncats" id="loadMoreBtncats" data-container="<?php echo e($cat->slug); ?>-remaining" style="cursor: pointer;">Load More</a>
                            </div> -->
                            <?php endif; ?>
                        <?php else: ?>
                            <h4>No Images Found</h4>
                        <?php endif; ?>
                    </div>
                    <div class="row popup-gallery details-tab-details show_remaining" id="<?php echo e($cat->slug); ?>-remaining">
                        <?php if(isset($images) && count($images) > 0 && !empty($images)): ?>
                            <?php $__currentLoopData = $images->skip(15); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($val->featured_img) && $val->featured_img != null): ?>
                                    <?php
                                        $img =
                                            isset($val->featured_img) && $val->featured_img != null
                                                ? App\Models\MediaImage::select('name')
                                                    ->where('id', $val->featured_img)
                                                    ->first()
                                                : null;
                                    ?>
                                <?php endif; ?>
                                <?php if(isset($val->banner_image) && $val->banner_image != null): ?>
                                    <?php
                                        $img_2 =
                                            isset($val->banner_image) && $val->banner_image != null
                                                ? App\Models\MediaImage::select('name')
                                                    ->where('id', $val->banner_image)
                                                    ->first()
                                                : null;
                                    ?>
                                <?php endif; ?>
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-sm-12 each-image text-center  <?php if($key > 2): ?>  <?php endif; ?>">
                                    <figure>
                                        <div class="gallery-item">
                                            <a data-effect="mfp-zoom-in"
                                                href="<?php echo e(isset($img_2->name) ? asset('uploads/' . $img_2->name) : (isset($img->name) ? asset('uploads/' . $img->name) : '#')); ?>"
                                                title="" class="a">
                                                <img class="img-fluid" src="<?php echo e(asset('uploads/' . $img->name)); ?>" />
                                                <img class="plus-img"
                                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                                    width="80" height="80">
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($images) && count($images) > 15 && !empty($images)): ?>
                                <div>
                                    <a class="common-btn text-center show_less" id="show_less"
                                        data-container="<?php echo e($cat->slug); ?>-remaining" style="cursor: pointer;">Show
                                        Less</a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <h4>No Images Found</h4>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </section>

    <!---------------------  Our Gallery ----------------------->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            var displayedImages = 15;
            var imagesVisible = true;

            $('#all .col-xxl-4:gt(' + (displayedImages - 1) + ')').addClass('hidden');
            $(document).on('click', '#loadMoreBtn', function() {
                if (imagesVisible) {
                    $('#all .col-xxl-4.hidden').removeClass('hidden');
                    $(this).text('Show Less');
                } else {
                    $('#all .col-xxl-4:gt(' + (displayedImages - 1) + ')').addClass('hidden');
                    $(this).text('Load More');
                }
                imagesVisible = !imagesVisible;
            });
        });


        $(document).on('click', '.loadMoreBtncats', function() {
            $(this).hide();
            var content = $(this).data('container');
            $('#' + content).show();
            $('.show_less').show();
        });

        $(document).on('click', '.show_less', function() {
            $(this).hide();
            var content = $(this).data('container');
            $('#' + content).hide();
            $('.loadMoreBtncats').show();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/new_project_gallery.blade.php ENDPATH**/ ?>