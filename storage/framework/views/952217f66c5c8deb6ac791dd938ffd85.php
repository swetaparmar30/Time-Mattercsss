<?php if(isset($service_head_sec) || isset($services_sec)): ?>
    <section class="garage-door-maintenance-sec new-services-sec sandk-common-padding sandk-common">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 services-sec 
                <?php if(Route::currentRouteName() == 'middletown.garagedoor' ||
                    Route::currentRouteName() == 'odessa.garagedoor' ||
                     Route::currentRouteName() == 'townsend.garagedoor' ||
                     Route::currentRouteName() == 'smyrna.garagedoor'
                     ): ?>nw-sarea <?php endif; ?>">
                    <?php if($service_head_sec->title): ?>
                        <h2><?php echo $service_head_sec->title; ?></h2>
                    <?php else: ?>
                        <h2>Our Comprehensive <br> Garage Door Services</h2>
                    <?php endif; ?>
                    <?php if($service_head_sec->description): ?>
                        <?php echo $service_head_sec->description; ?>

                    <?php else: ?>
                        <p>At <b>Time Master</b>, our experienced team delivers professional, high-quality garage
                            door
                            solutions tailored specifically to your needs. With over 60 years serving Delaware and the
                            Delmarva
                            Peninsula, we guarantee reliable and efficient services that keep your garage doors safe,
                            secure,
                            and performing smoothly.</p>
                    <?php endif; ?>




                </div>
            </div>
        </div>
        <?php
            if (!function_exists('fetchImgPath')) {
                function fetchImgPath($imgId)
                {
                    $img = App\Models\MediaImage::find($imgId);
                    return $img ? asset('uploads/' . $img->name) : '';
                }
            }
        ?>

        <div class="container-md">
            <div class="row align-items-center desktop-garage-door-maintenance-sec">
                <div class="left-side">
                    <div class="row left-side-tab-items">
                        <?php $__currentLoopData = $services_sec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 service-box-section upper-box">
                                <article>
                                    <?php if($service->img != ''): ?>
                                        <?php $media = App\Models\MediaImage::find($service->img); ?>
                                        <a href="<?php echo e(url($service->url)); ?>">
                                            <img src="<?php echo e(fetchImgPath($service->img)); ?>" class="img-fluid"
                                                alt="<?php echo e($media->alt_text ?? ($service->door_title ?? 'Common Garage')); ?>"
                                                loading="lazy">
                                        </a>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('front-assets/src/images/garage-door-installation-and-replacement-delaware.webp')); ?>"
                                            width="auto" height="auto" class="img-fluid"
                                            alt="delaware garage door installation and replacement" loading="lazy">
                                    <?php endif; ?>
                                    <?php if($service->title != ''): ?>
                                        <a href="<?php echo e(url($service->url)); ?>">
                                            <h4><?php echo e($service->title); ?></h4>
                                        </a>
                                    <?php else: ?>
                                        <h4>Garage Door Installation & Replacement</h4>
                                    <?php endif; ?>

                                    <div>
                                        <?php if($service->description != ''): ?>
                                            <?php echo $service->description; ?>

                                        <?php else: ?>
                                            <p>Enhance your property's value and curb appeal with our premium
                                                residential
                                                and
                                                commercial garage doors. We offer a wide variety of styles, materials,
                                                and
                                                customization options, expertly installed by our skilled professionals
                                                to
                                                match
                                                your
                                                specific requirements.</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="services-link">
                                        <a href="<?php echo e(url($service->url)); ?>"><?php echo e($service->urltitle ?? 'Service'); ?></a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                </div>
            </div>
            <div class="row align-items-center mobile-service-sec">
                <div class="left-side">
                    <div class="left-side-tab-items">
                        <?php $__currentLoopData = $services_sec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 service-box-section upper-box">
                                <article>
                                    <?php if($service->img != ''): ?>
                                        <?php $media = App\Models\MediaImage::find($service->img); ?>
                                        <a href="<?php echo e(url($service->url)); ?>">
                                            <img src="<?php echo e(fetchImgPath($service->img)); ?>" class="img-fluid"
                                                alt="<?php echo e($media->alt_text ?? ($service->door_title ?? 'Common Garage')); ?>"
                                                loading="lazy">
                                        </a>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('front-assets/src/images/garage-door-installation-and-replacement-delaware.webp')); ?>"
                                            width="auto" height="auto" class="img-fluid"
                                            alt="delaware garage door installation and replacement" loading="lazy">
                                    <?php endif; ?>
                                    <?php if($service->title != ''): ?>
                                        <a href="<?php echo e(url($service->url)); ?>">
                                            <h4><?php echo e($service->title); ?></h4>
                                        </a>
                                    <?php else: ?>
                                        <h4>Garage Door Installation & Replacement</h4>
                                    <?php endif; ?>

                                    <div>
                                        <?php if($service->description != ''): ?>
                                            <?php echo $service->description; ?>

                                        <?php else: ?>
                                            <p>Enhance your property's value and curb appeal with our premium
                                                residential
                                                and
                                                commercial garage doors. We offer a wide variety of styles, materials,
                                                and
                                                customization options, expertly installed by our skilled professionals
                                                to
                                                match
                                                your
                                                specific requirements.</p>
                                        <?php endif; ?>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    </div>
                </div>
            </div>
    </section>
<?php else: ?>
<?php endif; ?>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/services-sec-location.blade.php ENDPATH**/ ?>