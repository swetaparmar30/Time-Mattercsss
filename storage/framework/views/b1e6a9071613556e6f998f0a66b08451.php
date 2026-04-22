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
    <section class="photo-gallery gallery-page sandk-common-padding sandk-common text-center deskop-gallry-page">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                    
                    <h2>Our Work</h2>
                </div>
            </div>

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


    <section class="photo-gallery gallery-page sandk-common-padding sandk-common text-center mobile-gallry-page">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 photo-gallery-content">
                    
                    <h2>Our Work</h2>
                </div>
            </div>

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
                                    


                                    <a href="javascript:void(0)" class="open-gallery-popup"
                                        data-index="<?php echo e($key); ?>">

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
                                            <a href="javascript:void(0)" class="open-gallery-popup"
                                                data-index="<?php echo e($key); ?>">

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
                                            <a href="javascript:void(0)" class="open-gallery-popup"
                                                data-index="<?php echo e($key); ?>">

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



    <div id="customGalleryPopup" class="custom-gallery-popup gallry-page-popup-sec">

        <div class="popup-overlay"></div>

        <div class="popup-content">

            <button class="popup-close">×</button>

            <div id="popupGallerySlider" class="popup-slider owl-carousel">

                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $img = isset($val->banner_image)
                            ? App\Models\MediaImage::find($val->banner_image)
                            : App\Models\MediaImage::find($val->featured_img);
                    ?>

                    <div class="item">

                        <img src="<?php echo e(asset('uploads/' . $img->name)); ?>">

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>






<style>
    .mobile-gallry-page{display:none}



    .custom-gallery-popup {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;

        /* CENTER CONTENT */
        /* display:flex; */
        align-items: center;
        /* vertical center */
        justify-content: center;
        /* horizontal center */
    }

    .custom-gallery-popup.is-open {
        display: flex;
    }

    .popup-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .85);
    }

    .popup-content {
        position: relative;
        max-width: 90%;
        max-height: 90vh;
        z-index: 2;

    }

    .popup-slider img {
        width: 100%;
        height: auto;
        max-height: 90vh;
        object-fit: contain;
    }

    .popup-close {
        position: absolute;
        top: -65px;
        right: 0;
        font-size: 40px;
        color: #fff;
        background: none;
        border: 0;
        cursor: pointer;
    }


    .popup-content {
        animation: popupZoom .3s ease;
    }

    @keyframes popupZoom {
        from {
            transform: scale(.85);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }



    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-controls .owl-nav [class*=owl-] {
        background: #fff;
        margin: 0;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 50%;
        transform: translatey(-50%);
        border-radius: 0;
        padding: 0;
    }


    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-controls .owl-nav {
        display: none;
    }

    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-controls .owl-nav svg {
        stroke: #002855;
    }

    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-dots .owl-dot.active span,
    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-dots .owl-dot:hover span {
        background-color: #fff !important;
        width: 20px;
    }

    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-dots .owl-dot span {
        width: 10px;
        background-color: #ffffff80 !important;
        height: 10px
    }

    .custom-gallery-popup .popup-content .popup-slider.owl-carousel .owl-controls .owl-nav .owl-next {
        right: 0;
    }



    @media (max-width:767px) {



        .custom-gallery-popup.gallry-page-popup-sec .popup-content .popup-slider.owl-carousel .owl-controls .owl-dots {
            display: none !important
        }



.mobile-gallry-page{display:block !important;opacity: 1 !important;}
.deskop-gallry-page{display:none}
        .popup-slider img {

            height: 250px;
            max-height: 100%;
            object-fit: cover;
        }


        .popup-content {
            max-width: 100%;
            max-height: 100%;
        }


    }
</style>



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

<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/new_project_gallery.blade.php ENDPATH**/ ?>