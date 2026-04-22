<?php $__env->startSection('title'); ?>
    <?php echo e(isset($meta_title) ? $meta_title : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
    <?php echo e(isset($meta_description) ? $meta_description : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style type="text/css">
        @media (max-width: 575.98px) {
            .mission-and-values-section .inner-box-col article {
                margin-top: 35px;
            }

            .mission-and-values-section .inner-row .inner-box-col:first-child article {
                margin-top: 0;
            }

            .mission-and-values-section .inner-box-col article .ambition-section {
                display: flex;
                flex-direction: row;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon {
                width: 20%;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon img {
                width: 60px;
                height: auto;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content {
                padding-left: 15px;
                width: 80%;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content h3 {
                padding: 0;
                text-align: left;
                font-size: 22px;
                margin: 0px 0 10px;
                line-height: 22px;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content p {
                padding: 0;
                text-align: left;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .mission-and-values-section .inner-box-col article {
                margin-top: 35px;
            }

            .mission-and-values-section .inner-row .inner-box-col:first-child article {
                margin-top: 0;
            }

            .mission-and-values-section .inner-box-col article .ambition-section {
                display: flex;
                flex-direction: row;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon {
                padding-left: 10px;
                width: 20%;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-icon img {
                width: 75px;
                height: auto;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content {
                width: 80%;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content h3 {
                padding: 0;
                text-align: left;
                font-size: 22px;
                margin: 0px 0 10px;
                line-height: 22px;
            }

            .mission-and-values-section .inner-box-col article .ambition-section .ambition-step-content p {
                padding: 0;
                text-align: left;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            h2.about-history-h2.main_about_title:after {
                margin: 10px auto 30px 0!important;
            }
        }
        .area-we-cover-sec .right-side .area-we-serve-location ul li:last-child {
            padding: 0 0 0px 19px;
        }
        .area-we-cover-sec .right-side .area-we-serve-location ul li:nth-last-child(2) {
            /* padding: 0 0 0px 19px */
        }
    </style>




   

    <?php if(
        (isset($about->title) && $about->title != '') ||
            (isset($about->description) && $about->description != '') ||
            (isset($about->bannerimage) && $about->bannerimage != null)): ?>
        <?php
            $bgurl = '';
            $mobileBgUrl = '';

            if (isset($about->bannerimage) && $about->bannerimage != null) {
                $img = App\Models\MediaImage::select('name')->where('id', $about->bannerimage)->first();

                if ($img && isset($img->name)) {
                    $bgurl = asset('uploads/' . $img->name);
                }
            }
            if (isset($about->abt_mb_bannerimage) && $about->abt_mb_bannerimage != null) {
                $mobileimg = App\Models\MediaImage::select('name')->where('id', $about->abt_mb_bannerimage)->first();

                if ($mobileimg && isset($mobileimg->name)) {
                    $mobileBgUrl = asset('uploads/' . $mobileimg->name);
                }
            }
        ?>

        
        <style>
            @media (max-width: 575.98px) {
                .about-page-banner-section {
                    /* background-image: url('<?php echo e($mobileBgUrl); ?>') !important; */
                }
            }
        </style>

        <section class="about-page-banner-section sandk-common sandk-common-padding">

            <div class="container-md">
                <div class="row">
                    <div class="col-12 text-center about-text-banner">

                        <?php if(isset($about->title) && $about->title != ''): ?>
                            <h1 class="about-title"><?php echo e($about->title); ?></h1>
                        <?php endif; ?>

                        <?php if(isset($about->description) && $about->description != ''): ?>
                            <?php echo $about->description; ?>

                        <?php endif; ?>

                    </div>
                </div>

            </div>
           
           
        </section>

        <section class="new-page-design-about sandk-common">
            <div class="container-md">
                <div class="row">
                    <div class="col-12 text-center">

                         <!-- <img class="img-fluid about-banner-mobile-layout" src="<?php echo e($mobileBgUrl); ?>" alt=""> -->


                          <?php if($mobileBgUrl != ''): ?>
                            <img src="<?php echo e($mobileBgUrl); ?>" class="img-fluid about-banner-mobile-layout" alt="<?php echo e($about->title ?? 'About'); ?>">
                        <?php endif; ?>

                        <?php if($bgurl != ''): ?>
                            <img src="<?php echo e($bgurl); ?>" class="img-fluid about-banner-desktop-layout" alt="<?php echo e($about->title ?? 'About'); ?>">
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(isset($about->historytitle) ||
            isset($about->historydescription) ||
            $about->historytitle != '' ||
            $about->historydescription != '' ||
            $about->historysubtitle != '' ||
            $about->historysubdescription != ''): ?>
        <section class="our-history-section sandk-common sandk-common-padding">
            <div class="container-md">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 left-side">
                        <?php if(isset($about->historytitle) && $about->historytitle != ''): ?>
                            <h2 class="about-history-h2 main_about_title"><?php echo $about->historytitle; ?></h2>
                        <?php endif; ?>
                        <?php if(isset($about->historysubtitle) && $about->historysubtitle != ''): ?>
                            <h3><?php echo $about->historysubtitle; ?></h3>
                        <?php endif; ?>

                        <?php if(isset($about->historyimage) && $about->historyimage != null): ?>
                            <?php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $about->historyimage)
                                    ->first();
                            ?>
                            <?php if(isset($img->name) && $img->name != null): ?>
                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                    alt="<?php echo e(isset($about->historytitle) ? $about->historytitle : ''); ?>"
                                    class="img-fluid mobile-img" width="auto" height="auto" alt=""
                                    loading="lazy">
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/history-about.png')); ?>"
                                class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
                        <?php endif; ?>

                        <?php if(isset($about->historydescription) && $about->historydescription != ''): ?>
                            <?php
                                $slug = request()->segment(count(request()->segments()));
                                $aboutyearDesc = $about->historydescription;
                                
                            ?>

                            <?php if(!empty($aboutyearDesc)): ?>
                                <?php echo $aboutyearDesc; ?>

                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(isset($about->historybuttonurl) && $about->historybuttonurl != '' && $about->historybuttonurl != '#'): ?>
                            <a href="#" class="common-btn" data-bs-target="#getafreequote" data-bs-toggle="modal">GET
                                A QUOTE</a>
                        <?php endif; ?>
                    </div>

                    <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 right-side">
                        <?php if(isset($img)): ?>
                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                alt="<?php echo e(isset($about->historytitle) ? $about->historytitle : ''); ?>"
                                class="img-fluid desktop-image" width="auto" height="auto" alt="" loading="lazy">
                        <?php else: ?>
                            <img src="<?php echo e(asset('front-assets/src/images/residential-images/history-about.png')); ?>"
                                class="img-fluid desktop-image" width="auto" height="auto" alt="" loading="lazy">
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </section>
    <?php endif; ?>


    <section class="our-history-section-coontent sandk-common sandk-common-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="ab container">
                        


                        <?php if(isset($about->our_history_title) && $about->our_history_title != ''): ?>
                            <h2 class="history-title-year-wise"><?php echo $about->our_history_title; ?></h2>
                        <?php endif; ?>
                        <!-- <p>Incorporated in Quincy, Illinois, on Tuesday, October 17th, 1944, Raynor is the oldest door company in the industry. We take pride in our long history of quality products, continually building upon it to offer the exceptional line of residential Premium Garage Doors available today.</p> -->
                    </div>



                    <?php if(isset($about->our_history_desc) && $about->our_history_desc != ''): ?>
                        <?php echo $about->our_history_desc; ?>

                    <?php endif; ?>


                </div>
            </div>
        </div>
    </section>





    


    <?php if(isset($about->missiontitle) ||
            isset($about->missiondescription) ||
            $about->missiontitle != '' ||
            $about->missiondescription != ''): ?>
        <section class="mission-and-values-section sandk-common sandk-common-padding">
            <div class="container-md">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <?php if(isset($about->missiontitle) && $about->missiontitle != ''): ?>
                            <h2 class="about-mission-and-value"><?php echo e($about->missiontitle); ?></h2>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="row inner-row desktop-misson-row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">

                                    <?php if(isset($mission_vlues->mv_icon_1) && $mission_vlues->mv_icon_1 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_1)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission" width="120"
                                                height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_1) ? $mission_vlues->mv_title_1 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_1) ? $mission_vlues->mv_description_1 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    <?php if(isset($mission_vlues->mv_icon_2) && $mission_vlues->mv_icon_2 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_2)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission" width="120"
                                                height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_2) ? $mission_vlues->mv_title_2 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_2) ? $mission_vlues->mv_description_2 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    <?php if(isset($mission_vlues->mv_icon_3) && $mission_vlues->mv_icon_3 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_3)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission" width="120"
                                                height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120" height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_3) ? $mission_vlues->mv_title_3 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_3) ? $mission_vlues->mv_description_3 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    <?php if(isset($mission_vlues->mv_icon_4) && $mission_vlues->mv_icon_4 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_4)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission"
                                                width="120" height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120"
                                            height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_4) ? $mission_vlues->mv_title_4 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_4) ? $mission_vlues->mv_description_4 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    <?php if(isset($mission_vlues->mv_icon_5) && $mission_vlues->mv_icon_5 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_5)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission"
                                                width="120" height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120"
                                            height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_5) ? $mission_vlues->mv_title_5 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_5) ? $mission_vlues->mv_description_5 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 inner-box-col">
                        <article>
                            <div class="ambition-section">
                                <div class="ambition-step-icon">
                                    <?php if(isset($mission_vlues->mv_icon_6) && $mission_vlues->mv_icon_6 != null): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')
                                                ->where('id', $mission_vlues->mv_icon_6)
                                                ->first();
                                        ?>
                                        <?php if(isset($img->name) && $img->name != null): ?>
                                            <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" alt="mission"
                                                width="120" height="120">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="/uploads/66a0af3a05c4f.webp" alt="mission" width="120"
                                            height="120">
                                    <?php endif; ?>
                                </div>
                                <div class="ambition-step-content">
                                    <h3><?php echo e(isset($mission_vlues->mv_title_6) ? $mission_vlues->mv_title_6 : ''); ?></h3>
                                    <p><?php echo e(isset($mission_vlues->mv_description_6) ? $mission_vlues->mv_description_6 : ''); ?>

                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="mobile-misson-row row">


                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                       

                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="inner-list-section">

                            <?php for($i = 1; $i <= 6; $i++): ?>
                                <?php
                                    $iconField = "mv_icon_$i";
                                    $titleField = "mv_title_$i";
                                    $descField = "mv_description_$i";

                                    $imgName = null;

                                    if (!empty($mission_vlues->$iconField)) {
                                        $imgData = App\Models\MediaImage::select('name')
                                            ->where('id', $mission_vlues->$iconField)
                                            ->first();
                                        $imgName = $imgData->name ?? null;
                                    }

                                    $defaultImg = '/uploads/66a0af3a05c4f.webp';
                                    $finalImg = $imgName ? asset('uploads/' . $imgName) : $defaultImg;
                                ?>

                                <?php if(!empty($mission_vlues->$titleField) || !empty($mission_vlues->$descField)): ?>
                                    <div class="ambition-section">
                                        <h2 class="" id="missionHeading<?php echo e($i); ?>">
                                            
                                                <div class="ambition-step-icon">
                                                    <img src="<?php echo e($finalImg); ?>" alt="mission" width="120" height="120">
                                                </div>
                                                <div class="ambition-step-content">
                                                    <h3><?php echo e($mission_vlues->$titleField ?? ''); ?></h3>
                                                </div>
                                            
                                        </h2>

                                            
                                                <p><?php echo e($mission_vlues->$descField ?? ''); ?></p>
                                            
                                        
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>

                        </div>

                        </div>



                    </div>

                </div>

            </div>
        </section>

<style>


.mission-and-values-section .row.mobile-misson-row {
display: none;}




@media (max-width: 575.98px) {



.mission-and-values-section.sandk-common  .row.mobile-misson-row h2::after{display: none}
.mission-and-values-section .row.mobile-misson-row { display: block } 
.mission-and-values-section .row.desktop-misson-row { display: none } 
.mission-and-values-section p { text-align: left;        margin-top: 15px; } 
.mission-and-values-section .inner-list-section .ambition-section { padding: 20px 0;         border-bottom: 1px solid #e3e3e3;} 
.mission-and-values-section .inner-list-section .ambition-section h2{ display: flex; align-items: center; } 


.mission-and-values-section  .row.mobile-misson-row   h2{margin-bottom: 0}
/* .mission-and-values-section .inner-list-section .ambition-section { padding: 20px; border: 1px solid #E0E0E0; border-radius: 15px; box-shadow: 4px 4px 6px 0px #00000005; margin-bottom: 30px; }  */
.mission-and-values-section .inner-list-section .ambition-section:last-of-type { margin-bottom: 0;border: unset; } 

.mission-and-values-section .row.mobile-misson-row .accordion-body { padding: 0; text-align: left !important } 

.mission-and-values-section .row.mobile-misson-row .ambition-step-icon { max-width: 70px; width: 100%; text-align: left; } 
.mission-and-values-section .row.mobile-misson-row .ambition-step-icon img { width: 70%; height: 70%; } 

.mission-and-values-section .row.mobile-misson-row { gap: 10px;padding: 0; } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:not(.collapsed) { background-color: unset; border: 0; box-shadow: unset; ; align-items: center; padding: 0 } 
.mission-and-values-section .row.mobile-misson-row h3 { font-size: 20px; line-height: 30px; margin-bottom: 0; color: #002956; font-weight: 700; } 


.mission-and-values-section .row.mobile-misson-row .accordion-button::after { background-image: url(/front-assets/src/images/new-faw-down-arw.webp); background-repeat: no-repeat; background-position: center; width: 22px; height: 12px; } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:not(.collapsed)::after { background-image: url(/front-assets/src/images/new-faw-down-arw.webp); background-repeat: no-repeat; background-position: center; width: 22px; height: 12px; } 

.mission-and-values-section .row.mobile-misson-row .ambition-section h2 { margin-bottom: 0 !important } 
.mission-and-values-section .row.mobile-misson-row .ambition-section .accordion-collapse { margin-top: 20px } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:focus { border: 0; box-shadow: unset; }



/* .our-history-section-coontent .timeline-carousel.owl-theme .owl-dots .owl-dot{margin: 0 5px}
.our-history-section-coontent .timeline-carousel.owl-theme .owl-dots .owl-dot span{background: #ffffff98;width: 10px;height: 10px;}
.our-history-section-coontent .timeline-carousel.owl-theme .owl-dots .owl-dot.active span{background: #fff}

.our-history-section-coontent .timeline-carousel .timeline-item h3{font-size: 30px; font-weight: 600; line-height: 35px; color: #F2A900; margin-bottom: 20px; text-align: left;} */

    }







@media (min-width: 576px) and (max-width: 767.98px) {
    .year-of-excilence .right-side h2::after, h2.about-history-h2.main_about_title:after{
        margin: 15px auto 30px auto!important;
    }

.mission-and-values-section.sandk-common  .row.mobile-misson-row h2::after{display: none}

.mission-and-values-section .row.mobile-misson-row { display: block } 
.mission-and-values-section .row.desktop-misson-row { display: none } 
.mission-and-values-section p { text-align: left;font-size: 18px;line-height: 30px;margin-top: 15px; } 

.mission-and-values-section  .row.mobile-misson-row   h2{margin-bottom: 0}
.mission-and-values-section .row.mobile-misson-row .ambition-step-icon { max-width: 70px; width: 100% } 
.mission-and-values-section .row.mobile-misson-row .ambition-step-icon img { width: 70%; height: 70%; } 
.mission-and-values-section .inner-list-section .ambition-section h2{ display: flex; align-items: center; } 


.mission-and-values-section .row.mobile-misson-row { gap: 10px;padding: 0; } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:not(.collapsed) { background-color: unset; border: 0; box-shadow: unset; ; align-items: center; padding: 0 } 

.mission-and-values-section .row.mobile-misson-row h3 { font-size: 24px; line-height: 32px; margin-bottom: 0; color: #002956; font-weight: 700; } 
/* .mission-and-values-section .inner-list-section .ambition-section { padding: 20px; border: 1px solid #E0E0E0; border-radius: 15px; box-shadow: 4px 4px 6px 0px #00000005; margin-bottom: 30px; }  */
.mission-and-values-section .inner-list-section .ambition-section:last-of-type { margin-bottom: 0; border: unset;} 
.mission-and-values-section .inner-list-section .ambition-section { padding: 20px 0;         border-bottom: 1px solid #e3e3e3;} 

.mission-and-values-section .row.mobile-misson-row .accordion-body { padding: 0; text-align: left !important } 

.mission-and-values-section .row.mobile-misson-row .accordion-button::after { background-image: url(/front-assets/src/images/new-faw-down-arw.webp); background-repeat: no-repeat; background-position: center; width: 22px; height: 12px; } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:not(.collapsed)::after { background-image: url(/front-assets/src/images/new-faw-down-arw.webp); background-repeat: no-repeat; background-position: center; width: 22px; height: 12px; } 


.mission-and-values-section .row.mobile-misson-row .ambition-section h2 { margin-bottom: 0 !important } 
.mission-and-values-section .row.mobile-misson-row .ambition-section .accordion-collapse { margin-top: 20px } 
.mission-and-values-section .row.mobile-misson-row .accordion-button:focus { border: 0; box-shadow: unset; }
    


}



</style>
<?php endif; ?>





    <?php echo $__env->make('frontend.includes.areas-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/aboutus/index.blade.php ENDPATH**/ ?>