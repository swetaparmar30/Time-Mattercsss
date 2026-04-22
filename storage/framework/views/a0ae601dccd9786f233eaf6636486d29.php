

<section class="year-of-excilence sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-side">
                <?php if(isset($system_setting->system_img) && $system_setting->system_img != null): ?>
                    <?php
                        $img = App\Models\MediaImage::where('id', $system_setting->system_img)->first();
                    ?>
                    <?php if(isset($img->name) && $img->name != null): ?>
                        <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" class="img-fluid"
                           alt="<?php echo e($img->alt_text ?: ($system_setting->system_setting_title ?? 'Garage Door')); ?>"
                            loading="lazy" width="1000" height="592.88">
                    <?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo e(asset('front-assets/src/images/51-Years-Of-Excellence.webp')); ?>"
                        class="img-fluid desktop-image" width="1000" height="592.88" alt="" loading="lazy">
                <?php endif; ?>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-side">

                <div class="need-new-garage-door mobile garage-door-popup-button" type="button" data-bs-toggle="modal"
                    data-bs-target="#selectdoor" style="display: none;" loading="lazy">
                    <div class="inner-sec">
                        <img src="<?php echo e(asset('front-assets/src/images/full-open-door.webp')); ?>" class="img-fluid"
                            width="auto" height="auto" alt="" loading="lazy">
                        <div class="text-sec">
                            <h3>Need a new <br>garage door?</h3>
                        </div>
                    </div>
                </div>

                <?php if(isset($system_setting->system_setting_title) && $system_setting->system_setting_title != ''): ?>
                    <h2><?php echo e($system_setting->system_setting_title); ?> <span>
                            <?php echo e($system_setting->system_sub_title); ?></span></h2>
                <?php endif; ?>

                <?php if(isset($system_setting->system_img) && $system_setting->system_img != null && $img->name && $img->name != null): ?>
                    <?php if(isset($img->name) && $img->name != null): ?>
                        <img src="<?php echo e(asset('uploads/' . $img->name)); ?>" class="img-fluid mobile-img"
                            alt="<?php echo e(isset($system_setting->system_setting_title) ? $system_setting->system_setting_title : 'S&K Door'); ?>"
                            loading="lazy" width="1000" height="500">
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(isset($system_setting->system_setting_description) && $system_setting->system_setting_description != ''): ?>

                    <?php
                        $slug = request()->segment(count(request()->segments()));
                        $yearDesc = $system_setting->system_setting_description;
                        if ($slug === 'service-and-repair') {
                            $find = 'garage and door company in Delaware';
                            $replace =
                                '<a class="in-link" href="https://clarkandsonsdoors.com/">garage door company in Delaware</a>';
                            $yearDesc = str_replace($find, $replace, $yearDesc);
                        }
                    ?>

                    <?php if(!empty($yearDesc)): ?>
                        <?php echo $yearDesc; ?>

                    <?php endif; ?>

                <?php endif; ?>
                <div class="need-new-garage-door desktop preload-images" type="button" data-bs-toggle="modal"
                    data-bs-target="#selectdoor" id="door" style="display: block;">
                    <div class="inner-sec">
                        <div class="text-sec">
                            <h3>Need a new <br>garage door?</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 center-side-list desktop">
                <ul class="with-icon-list ">
                    <?php if(isset($system_setting->title1) && $system_setting->title1 != ''): ?>
                        <?php if(isset($system_setting->system_img1) && $system_setting->system_img1 != null): ?>
                            <?php
                                $img1 = App\Models\MediaImage::select('name')
                                    ->where('id', $system_setting->system_img1)
                                    ->first();

                            ?>
                            <?php if(isset($img1->name) && $img1->name != null): ?>
                                <?php
                                    $url1 = asset('uploads/' . $img1->name);
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li
                            <?php if(isset($url1)): ?> style="background-image: url(<?php echo e($url1); ?>)" <?php endif; ?>>
                            <div>
                                <span class="text-span"><?php echo $system_setting->title1; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title2) && $system_setting->title2 != ''): ?>
                        <?php if(isset($system_setting->system_img2) && $system_setting->system_img2 != null): ?>
                            <?php
                                $img2 = App\Models\MediaImage::select('name')
                                    ->where('id', $system_setting->system_img2)
                                    ->first();

                            ?>
                            <?php if(isset($img2->name) && $img2->name != null): ?>
                                <?php
                                    $url2 = asset('uploads/' . $img2->name);
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li
                            <?php if(isset($url2)): ?> style="background-image: url(<?php echo e($url2); ?>)" <?php endif; ?>>
                            <div>
                                <span class="text-span"><?php echo $system_setting->title2; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title3) && $system_setting->title3 != ''): ?>
                        <?php if(isset($system_setting->system_img3) && $system_setting->system_img3 != null): ?>
                            <?php
                                $img3 = App\Models\MediaImage::select('name')
                                    ->where('id', $system_setting->system_img3)
                                    ->first();

                            ?>
                            <?php if(isset($img3->name) && $img3->name != null): ?>
                                <?php
                                    $url3 = asset('uploads/' . $img3->name);
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li
                            <?php if(isset($url3)): ?> style="background-image: url(<?php echo e($url3); ?>)" <?php endif; ?>>
                            <div>
                                <span class="text-span"><?php echo $system_setting->title3; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title4) && $system_setting->title4 != ''): ?>
                        <?php if(isset($system_setting->system_img4) && $system_setting->system_img4 != null): ?>
                            <?php
                                $img4 = App\Models\MediaImage::select('name')
                                    ->where('id', $system_setting->system_img4)
                                    ->first();
                            ?>
                            <?php if(isset($img4->name) && $img4->name != null): ?>
                                <?php
                                    $url4 = asset('uploads/' . $img4->name);
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li
                            <?php if(isset($url4)): ?> style="background-image: url(<?php echo e($url4); ?>)" <?php endif; ?>>
                            <div>
                                <span class="text-span"><?php echo $system_setting->title4; ?></span>
                            </div>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 center-side-list mobile">
                <ul>
                    <?php if(isset($system_setting->title1) && $system_setting->title1 != ''): ?>
                        <li><?php echo e(strip_tags($system_setting->title1)); ?></li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title2) && $system_setting->title2 != ''): ?>
                        <li><?php echo e(strip_tags($system_setting->title2)); ?></li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title3) && $system_setting->title3 != ''): ?>
                        <li><?php echo e(strip_tags($system_setting->title3)); ?></li>
                    <?php endif; ?>
                    <?php if(isset($system_setting->title4) && $system_setting->title4 != ''): ?>
                        <li><?php echo e(strip_tags($system_setting->title4)); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>

    </div>
</section>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/systemsetting.blade.php ENDPATH**/ ?>