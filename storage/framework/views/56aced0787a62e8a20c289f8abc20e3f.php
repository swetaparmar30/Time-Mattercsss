<section class="why-choose-us-sec sandk-common sandk-common-padding">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($why_choose->why_choose_title) && $why_choose->why_choose_title != ''): ?>
                    <h2><?php echo $why_choose->why_choose_title; ?></h2>
                <?php endif; ?>
                <div class="inner-list-section">
                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img1)): ?>
                                    <?php
                                        $img1 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img1)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img1->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img1->name)); ?>" class="img-fluid" alt="Icon"
                                            loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                            alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title1) && $why_choose->why_choose_title1 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title1); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description1)): ?>
                                    <?php echo $why_choose->why_choose_description1; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>
                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img2)): ?>
                                    <?php
                                        $img2 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img2)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img2->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img2->name)); ?>" class="img-fluid"
                                            alt="Icon" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                            alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title2) && $why_choose->why_choose_title2 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title2); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description2)): ?>
                                    <?php echo $why_choose->why_choose_description2; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>
                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img3)): ?>
                                    <?php
                                        $img3 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img3)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img3->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img3->name)); ?>" class="img-fluid"
                                            alt="Icon" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                            class="img-fluid" alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title3) && $why_choose->why_choose_title3 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title3); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description3)): ?>
                                    <?php echo $why_choose->why_choose_description3; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>

                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img4)): ?>
                                    <?php
                                        $img4 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img4)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img4->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img4->name)); ?>" class="img-fluid"
                                            alt="Icon" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                            class="img-fluid" alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title4) && $why_choose->why_choose_title4 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title4); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description4)): ?>
                                    <?php echo $why_choose->why_choose_description4; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>
                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img5)): ?>
                                    <?php
                                        $img5 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img5)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img5->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img5->name)); ?>" class="img-fluid"
                                            alt="Icon" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                            class="img-fluid" alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title5) && $why_choose->why_choose_title5 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title5); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description5)): ?>
                                    <?php echo $why_choose->why_choose_description5; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>
                    <div class="main-list">
                        <article>

                            <div class="img-sec">
                                <?php if(!empty($why_choose->why_choose_img6)): ?>
                                    <?php
                                        $img6 = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img6)
                                            ->first();
                                    ?>

                                    <?php if(!empty($img6->name)): ?>
                                        <img src="<?php echo e(asset('uploads/' . $img6->name)); ?>" class="img-fluid"
                                            alt="Icon" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>"
                                            class="img-fluid" alt="default" width="100" height="100">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/images/user/img-demo_1041.jpg')); ?>" class="img-fluid"
                                        alt="default">
                                <?php endif; ?>
                            </div>

                            <div class="content-sec">

                                <?php if(isset($why_choose->why_choose_title6) && $why_choose->why_choose_title6 != ''): ?>
                                    <h3><?php echo e($why_choose->why_choose_title6); ?> </h3>
                                <?php endif; ?>


                                <?php if(!empty($why_choose->why_choose_description6)): ?>
                                    <?php echo $why_choose->why_choose_description6; ?>

                                <?php endif; ?>

                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/why-choose-us.blade.php ENDPATH**/ ?>