<?php if(isset($service_head_sec) || isset($services_sec)): ?>
    <section class="garage-door-maintenance-sec new-services-sec sandk-common-padding sandk-common">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 services-sec">

                    <?php if(!empty($service_head_sec->service_head_title)): ?>
                        <h2><?php echo $service_head_sec->service_head_title; ?></h2>
                    <?php endif; ?>



                    <?php if(!empty($service_head_sec->service_head_description)): ?>
                        <?php echo $service_head_sec->service_head_description; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if(!empty($services_sec->services)): ?>
            <div class="container-md">
                <div class="row align-items-center desktop-garage-door-maintenance-sec">
                    <div class="left-side">
                        <div class="row left-side-tab-items">
                            <?php $__currentLoopData = $services_sec->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 service-box-section <?php echo e($loop->iteration <= 3 ? 'upper-box' : ''); ?>">
                                    <article>
                                        <?php if(!empty($service->service_url)): ?>
                                            <a href="<?php echo e($service->service_url); ?>">
                                        <?php endif; ?>

                                        <?php if(isset($service->service_img) && $service->service_img != null): ?>
                                            <?php
                                                $img = App\Models\MediaImage::where(
                                                    'id',
                                                    $service->service_img,
                                                )->first();
                                            ?>
                                            <?php if(isset($img->name) && $img->name != null): ?>
                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w"
                                                    sizes="(max-width: 600px) 400px, (max-width: 900px) 600px, 602px"
                                                    class="img-fluid" width="602" height="588" loading="lazy"
                                                    alt="<?php echo e($img->alt_text ?: $service->door_title ?? 'Common Garage'); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('front-assets/src/images/More-Common-Problems.webp')); ?>"
                                                class="img-fluid" width="602" height="588" alt="Garage Door"
                                                loading="lazy">
                                        <?php endif; ?>

                                        <?php if(!empty($service->service_url)): ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if(!empty($service->title)): ?>
                                            <a href="<?php echo e($service->service_url ?? '#'); ?>">
                                                <h4><?php echo e($service->title); ?></h4>
                                            </a>
                                        <?php endif; ?>

                                        <?php if(!empty($service->description)): ?>
                                            <div>
                                                <?php echo $service->description; ?>

                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($service->url_title)): ?>
                                            <div class="services-link">
                                                <a
                                                    href="<?php echo e($service->service_url ?? '#'); ?>"><?php echo e($service->url_title); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                
                <div class="row align-items-center mobile-service-sec">
                    <div class="left-side">
                        <div class="left-side-tab-items">
                            <?php $__currentLoopData = $services_sec->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 service-box-section <?php echo e($loop->iteration <= 3 ? 'upper-box' : ''); ?>">
                                    <article>
                                        <?php if(!empty($service->service_url)): ?>
                                            <a href="<?php echo e($service->service_url); ?>">
                                        <?php endif; ?>

                                        <?php if(isset($service->service_img) && $service->service_img != null): ?>
                                            <?php
                                                $img = App\Models\MediaImage::where(
                                                    'id',
                                                    $service->service_img,
                                                )->first();
                                            ?>
                                            <?php if(isset($img->name) && $img->name != null): ?>
                                                <img src="<?php echo e(asset('uploads/' . $img->name)); ?>"
                                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 602w"
                                                    sizes="(max-width: 600px) 400px, (max-width: 900px) 600px, 602px"
                                                    class="img-fluid" width="602" height="588" loading="lazy"
                                                    alt="<?php echo e($img->alt_text ?: $service->door_title ?? 'Common Garage'); ?>">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('front-assets/src/images/More-Common-Problems.webp')); ?>"
                                                class="img-fluid" width="602" height="588" alt="Garage Door"
                                                loading="lazy">
                                        <?php endif; ?>

                                        <?php if(!empty($service->service_url)): ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if(!empty($service->title)): ?>
                                            <a href="<?php echo e($service->service_url ?? '#'); ?>">
                                                <h4><?php echo e($service->title); ?></h4>
                                            </a>
                                        <?php endif; ?>

                                        <?php if(!empty($service->description)): ?>
                                            <div>
                                                <p><?php echo e($service->description); ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($service->url_title)): ?>
                                            <div class="services-link">
                                                <a
                                                    href="<?php echo e($service->service_url ?? '#'); ?>"><?php echo e($service->url_title); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/services-sec.blade.php ENDPATH**/ ?>