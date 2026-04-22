<section class="photo-gallery-sec desktop sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">

            <h2><?php echo e(isset($gallery->gallery_title) ? $gallery->gallery_title : ''); ?></h2>
            <?php if(isset($gallery->gallery_sub_title)): ?>
                <h4><?php echo e(isset($gallery->gallery_sub_title) ? $gallery->gallery_sub_title : ''); ?></h4>
            <?php endif; ?>

            <?php if(isset($gallery_images) && count($gallery_images) > 0 && !empty($gallery_images)): ?>
                <?php
                    $img_1 = '';
                    $img_2 = '';
                    $img_3 = '';
                    $img_4 = '';
                ?>
                <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($image->featured_img) && $image->featured_img != '' && $image->featured_img != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                            if ($key == 0) {
                                $img_1 = $img_1_b = asset('uploads/' . $img->name);
                            } elseif ($key == 1) {
                                $img_2 = $img_2_b = asset('uploads/' . $img->name);
                            } elseif ($key == 2) {
                                $img_3 = $img_3_b = asset('uploads/' . $img->name);
                            } elseif ($key == 3) {
                                $img_4 = $img_4_b = asset('uploads/' . $img->name);
                            }
                        ?>
                    <?php endif; ?>
                    <?php if(isset($image->banner_image) && $image->banner_image != '' && $image->banner_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                            if ($key == 0) {
                                $img_1_b = asset('uploads/' . $img->name);
                            } elseif ($key == 1) {
                                $img_2_b = asset('uploads/' . $img->name);
                            } elseif ($key == 2) {
                                $img_3_b = asset('uploads/' . $img->name);
                            } elseif ($key == 3) {
                                $img_4_b = asset('uploads/' . $img->name);
                            }
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side-image desktop-gallery">
                    <figure>
                        <?php if(isset($img_4) && $img_4 != null): ?>
                            <a data-effect="mfp-zoom-in" href="<?php echo e($img_4_b ?? $img_4); ?>" title="">
                                <img class="img-fluid normal-img" src="<?php echo e($img_4); ?>" width="786" height="393"
                                    loading="lazy" alt="Time Master Gallery">
                            <?php else: ?>
                                <a data-effect="mfp-zoom-in"
                                    href="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" title=""
                                    loading="lazy">
                                    <img class="img-fluid normal-img"
                                        src="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" width="auto"
                                        height="auto" loading="lazy" alt="Time Master Gallery">
                        <?php endif; ?>
                        <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                            width="80" height="80" loading="lazy" alt="Gallery Zoom">
                        </a>
                    </figure>

                    <figure>
                        <?php if(isset($img_3) && $img_3 != null): ?>
                            <a data-effect="mfp-zoom-in" href="<?php echo e($img_3_b ?? $img_3); ?>" title="">
                                <img class="img-fluid normal-img" src="<?php echo e($img_3); ?>" width="416"
                                    height="300" loading="lazy" alt="Time Master Gallery" />
                            <?php else: ?>
                                <a data-effect="mfp-zoom-in"
                                    href="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" title="">
                                    <img class="img-fluid normal-img"
                                        src="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" width="auto"
                                        height="auto" loading="lazy" alt="Time Master Gallery">
                        <?php endif; ?>
                        <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                            width="80" height="80" loading="lazy" alt="Gallery Zoom">
                        </a>
                    </figure>

                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side-image desktop-gallery">
                    <figure>
                        <?php if(isset($img_2) && $img_2 != null): ?>
                            <a data-effect="mfp-zoom-in" href="<?php echo e($img_2_b ?? $img_2); ?>" title="">
                                <img class="img-fluid normal-img" src="<?php echo e($img_2); ?>" width="auto"
                                    height="auto" loading="lazy" alt="Time Master Gallery">
                            <?php else: ?>
                                <a data-effect="mfp-zoom-in"
                                    href="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" title="">
                                    <img class="img-fluid normal-img"
                                        src="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" width="auto"
                                        height="auto" loading="lazy" alt="Time Master Gallery">
                        <?php endif; ?>
                        <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                            width="80" height="80" loading="lazy" alt="Gallery Zoom">
                        </a>
                    </figure>

                    <figure>
                        <?php if(isset($img_1) && $img_1 != null): ?>
                            <a data-effect="mfp-zoom-in" href="<?php echo e($img_1_b ?? $img_1); ?>" title="">
                                <img class="img-fluid normal-img" src="<?php echo e($img_1); ?>" width="416"
                                    height="300" loading="lazy" alt="Time Master Gallery" />
                            <?php else: ?>
                                <a data-effect="mfp-zoom-in"
                                    href="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" title="">
                                    <img class="img-fluid normal-img"
                                        src="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" width="auto"
                                        height="auto" loading="lazy" alt="Time Master Gallery">
                        <?php endif; ?>
                        <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                            width="80" height="80" loading="lazy" alt="Gallery Zoom">
                        </a>
                    </figure>
                </div>

                <?php $__currentLoopData = $gallery_images->slice(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                        $img_banner = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                    ?>
                    <?php if(isset($img->name) && $img->name != null): ?>
                        <div
                            class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 desktop-gallery other-images">
                            <figure>
                                <a data-effect="mfp-zoom-in"
                                    href="<?php echo e(isset($img_banner->name) ? asset('uploads/' . $img_banner->name) : (isset($img->name) ? asset('uploads/' . $img->name) : '#')); ?>"
                                    title="">
                                    <img class="img-fluid normal-img" src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                        width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
                                </a>
                            </figure>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="view-gallery-btn">
                    <a href="<?php echo e(route('frontend.page.index', ['gallery'])); ?>/" class="common-btn">View Our Work</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="photo-gallery-sec mobile sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <h2><?php echo e(isset($gallery->gallery_title) ? $gallery->gallery_title : ''); ?></h2>
            <?php if(isset($gallery->gallery_sub_title)): ?>
                <h4><?php echo e(isset($gallery->gallery_sub_title) ? $gallery->gallery_sub_title : ''); ?></h4>
            <?php endif; ?>

            <?php if(isset($gallery_images) && count($gallery_images) > 0 && !empty($gallery_images)): ?>
                <?php
                    $img_1 = '';
                    $img_2 = '';
                    $img_3 = '';
                    $img_4 = '';

                ?>
                <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($image->featured_img) && $image->featured_img != '' && $image->featured_img != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
                            if ($key == 0) {
                                $img_1 = $img_1_b = asset('uploads/' . $img->name);
                            } elseif ($key == 1) {
                                $img_2 = $img_2_b = asset('uploads/' . $img->name);
                            } elseif ($key == 2) {
                                $img_3 = $img_3_b = asset('uploads/' . $img->name);
                            } elseif ($key == 3) {
                                $img_4 = $img_4_b = asset('uploads/' . $img->name);
                            }
                        ?>
                    <?php endif; ?>

                    <?php if(isset($image->banner_image) && $image->banner_image != '' && $image->banner_image != null): ?>
                        <?php
                            $img = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
                            if ($key == 0) {
                                $img_1_b = asset('uploads/' . $img->name);
                            } elseif ($key == 1) {
                                $img_2_b = asset('uploads/' . $img->name);
                            } elseif ($key == 2) {
                                $img_3_b = asset('uploads/' . $img->name);
                            } elseif ($key == 3) {
                                $img_4_b = asset('uploads/' . $img->name);
                            }
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                  <div class="mobile-gallery-sec owl-loaded mobile-gallery-sec-main">

                     <figure>
                           <?php if(isset($img_4) && $img_4 != null): ?>
<a data-effect="mfp-zoom-in" href="<?php echo e($img_4_b ?? $img_4); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e($img_4); ?>" width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
<?php else: ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
<?php endif; ?>
                                 <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>" width="80" height="80" loading="lazy" alt="Gallery Zoom" >
                              </a>
                     </figure>
                     
                     <figure>
                           <?php if(isset($img_3) && $img_3 != null): ?>
<a data-effect="mfp-zoom-in" href="<?php echo e($img_3_b ?? $img_3); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e($img_3); ?>" width="416" height="300" loading="lazy" alt="Time Master Gallery"/>
<?php else: ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
<?php endif; ?>
                                 <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>
                     
                     <figure>
                           <?php if(isset($img_2) && $img_2 != null): ?>
<a data-effect="mfp-zoom-in" href="<?php echo e($img_2_b ?? $img_2); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e($img_2); ?>" width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
<?php else: ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e(asset('front-assets/src/images/gallery_002.webp')); ?>" width="auto" height="auto" loading="lazy" alt="Time Master Gallery">
<?php endif; ?>
                                 <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>" width="80" height="80" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>

                     <figure>
                           <?php if(isset($img_1) && $img_1 != null): ?>
<a data-effect="mfp-zoom-in" href="<?php echo e($img_1_b ?? $img_1); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e($img_1); ?>" width="416" height="300" loading="lazy" alt="Time Master Gallery"/>
<?php else: ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" title="">
                                 <img class="img-fluid normal-img" src="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" width="auto" height="auto" loading="lazy">
<?php endif; ?>
                                 <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>" width="80" height="80" loading="lazy" loading="lazy" alt="Gallery Zoom">
                              </a>
                     </figure>

                       <?php $__currentLoopData = $gallery_images->slice(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $other_img = App\Models\MediaImage::select('name')->where('id', $image->featured_img)->first();
    $img_banner = App\Models\MediaImage::select('name')->where('id', $image->banner_image)->first();
?>
                                <figure>
                          <?php if(isset($other_img) && $other_img != null): ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(isset($img_banner->name) ? asset('uploads/' . $img_banner->name) : (isset($other_img->name) ? asset('uploads/' . $other_img->name) : '#')); ?>" title="">
                                    <img class="img-fluid normal-img" src="<?php echo e(asset('uploads/' . $other_img->name)); ?>" width="416" height="300" loading="lazy" alt="Time Master Gallery"/>
<?php else: ?>
<a data-effect="mfp-zoom-in" href="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" title="">
                                    <img class="img-fluid normal-img" src="<?php echo e(asset('front-assets/src/images/gallery_001.webp')); ?>" width="auto" height="auto" loading="lazy">
<?php endif; ?>
                                    <img class="plus-img" src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>" width="80" height="80" loading="lazy" loading="lazy" alt="Gallery Zoom">
                              </a>
                           </figure>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>

                  <div class="view-gallery-btn">
                        <a href="<?php echo e(route('frontend.page.index', ['gallery'])); ?>/" class="common-btn">View Our Work</a>
                  </div>
                  
               </div> -->




                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="mobile-gallery-sec owl-carousel mobile-gallery-sec-main">

                        
                        <figure>
                            <a href="javascript:void(0)" class="open-gallery-popup" data-index="0">
                                <img class="img-fluid normal-img"
                                    src="<?php echo e($img_1 ?? asset('front-assets/src/images/gallery_002.webp')); ?>"
                                    loading="lazy">
                                <img class="plus-img"
                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                    width="80" height="80">
                            </a>
                        </figure>

                        
                        <figure>
                            <a href="javascript:void(0)" class="open-gallery-popup" data-index="1">
                                <img class="img-fluid normal-img"
                                    src="<?php echo e($img_2 ?? asset('front-assets/src/images/gallery_001.webp')); ?>"
                                    loading="lazy">
                                <img class="plus-img"
                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                    width="80" height="80">
                            </a>
                        </figure>

                        
                        <figure>
                            <a href="javascript:void(0)" class="open-gallery-popup" data-index="2">
                                <img class="img-fluid normal-img"
                                    src="<?php echo e($img_3 ?? asset('front-assets/src/images/gallery_002.webp')); ?>"
                                    loading="lazy">
                                <img class="plus-img"
                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                    width="80" height="80">
                            </a>
                        </figure>

                        
                        <figure>
                            <a href="javascript:void(0)" class="open-gallery-popup" data-index="3">
                                <img class="img-fluid normal-img"
                                    src="<?php echo e($img_4 ?? asset('front-assets/src/images/gallery_001.webp')); ?>"
                                    loading="lazy">
                                <img class="plus-img"
                                    src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                    width="80" height="80">
                            </a>
                        </figure>

                        <!-- 
                        <?php $__currentLoopData = $gallery_images->slice(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $other_img = App\Models\MediaImage::where('id', $image->featured_img)->first();
                            ?>
                            <figure>
                                <a href="javascript:void(0)" class="open-gallery-popup"
                                    data-index="<?php echo e($key + 4); ?>">
                                    <img class="img-fluid normal-img" src="<?php echo e(asset('uploads/' . $other_img->name)); ?>"
                                        loading="lazy">
                                    <img class="plus-img"
                                        src="<?php echo e(asset('front-assets/src/images/white-zoome-img-icon.svg')); ?>"
                                        width="80" height="80">
                                </a>
                            </figure>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->

                    </div>

                    <div class="view-gallery-btn">
                        <a href="<?php echo e(route('frontend.page.index', ['gallery'])); ?>/" class="common-btn">View Our
                            Work</a>
                    </div>

                </div>






            <?php endif; ?>
        </div>
    </div>
</section>

<!-- custome poup slider for gallry sec -->

<div class="custom-gallery-popup" id="customGalleryPopup">

    <div class="popup-overlay"></div>

    <div class="popup-content">
        <button class="popup-close">&times;</button>

        <div class="popup-slider owl-carousel" id="popupGallerySlider">
            <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $img = App\Models\MediaImage::where('id', $image->banner_image ?? $image->featured_img)->first();
                ?>
                <div class="item">
                    <img src="<?php echo e(asset('uploads/' . $img->name)); ?>">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>





<style>
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
<?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/gallery-sec.blade.php ENDPATH**/ ?>