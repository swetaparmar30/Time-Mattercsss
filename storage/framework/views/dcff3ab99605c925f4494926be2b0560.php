<?php if($garage_services->count() > 0): ?>

<section class="garage-door-maintenance-sec sandk-common-padding sandk-common">
        <div class="container-md">
            <div class="row align-items-center">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <?php if(isset($residential->resi_title) && $residential->resi_title != ''): ?>
                        <h2><?php echo e($residential->resi_title); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container-md">
            <div class="row desktop-garage-door-maintenance-sec align-items-center">

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
                    <?php if(isset($residential->resi_sub_title) && $residential->resi_sub_title != ''): ?>
                        <h3><?php echo e($residential->resi_sub_title); ?></h3>
                    <?php endif; ?>
                    <?php if(isset($residential->resi_description) && $residential->resi_description != ''): ?>
                        <?php echo $residential->resi_description; ?>

                    <?php endif; ?>
                    
                    <div class="left-side-tab-items" role="tablist">
                        <?php $__currentLoopData = $garage_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gskey => $gsvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="nav-link each-offer-item <?php if($gskey == 0): ?> active <?php endif; ?>" id="door<?php echo e($gskey); ?>-tab" data-bs-toggle="tab" data-bs-target="#door<?php echo e($gskey); ?>-target" role="tab" aria-controls="door<?php echo e($gskey); ?>-target" aria-selected="false" href="" tabindex="-1">
                                <h4><?php echo e($gsvalue->title); ?></h4>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    
                    
                </div>


                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">

                    <div class="tab-content what-offer-image">
              
                        <?php $__currentLoopData = $garage_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gskey => $gsvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane <?php if($gskey == 0): ?> active <?php endif; ?>" id="door<?php echo e($gskey); ?>-target" role="tabpanel" aria-labelledby="door<?php echo e($gskey); ?>-tab">
                                <?php if(isset($gsvalue->image) && $gsvalue->image != null): ?>
                                    <?php
                                    $img = App\Models\MediaImage::select('name')->where('id', $gsvalue->image)->first();
                                    ?>
                                    <?php if(isset($img->name) && $img->name != null): ?>
                                    <img 
                                    src="<?php echo e(asset('uploads/'.$img->name)); ?>" 
                                    srcset="<?php echo e(asset('uploads/' . $img->name)); ?> 400w,
                                            <?php echo e(asset('uploads/' . $img->name)); ?> 600w,
                                            <?php echo e(asset('uploads/' . $img->name)); ?> 786w" 
                                    sizes="(max-width: 600px) 100vw, 
                                            (max-width: 900px) 50vw, 
                                            786px"
                                    class="img-fluid" 
                                    width="786" height="750" 
                                    loading="lazy" 
                                    alt="<?php echo e($gsvalue->title); ?>">
                                    <?php endif; ?>
                                <?php else: ?>
                                <img src="<?php echo e(asset('front-assets/src/images/broken-sprin-grepair.webp')); ?>" class="img-fluid" width="786" height="750" alt="Garage Service" loading="lazy">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <div class="row mobile-garage-door-maintenance-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="heading-sec">
                        <?php if(isset($residential->resi_sub_title) && $residential->resi_sub_title != ''): ?>
                            <h3><?php echo e($residential->resi_sub_title); ?></h3>
                        <?php endif; ?>
                        <?php if(isset($residential->resi_description) && $residential->resi_description != ''): ?>
                            <?php echo $residential->resi_description; ?>

                        <?php endif; ?>
                    </div>
                    
                    <ul style="margin-bottom:15px;">
                        <?php $__currentLoopData = $garage_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gskey => $gsvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($gsvalue->title); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                        <?php echo $garage_door->garage_door_description; ?>


                    <?php if(isset($residential->resi_button_name) && $residential->resi_button_name !=''): ?>
                        <?php if(isset($residential->resi_button_url) && $residential->resi_button_url !=''): ?>
                            <a class="common-btn" href="<?php echo e($residential->resi_button_url); ?>"> 
                        <?php else: ?>
                            <a class="common-btn"> 
                        <?php endif; ?>
                        <img src="<?php echo e(asset('front-assets/src/images/white-yellow-call-icon.webp')); ?>" class="normal-icon" alt=""><img src="<?php echo e(asset('front-assets/src/images/blue-white-call-icon.webp')); ?>" class="hover-icon" alt="Garage Service" width="25" height="25"><?php echo e($residential->resi_button_name); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/includes/door-maintainance.blade.php ENDPATH**/ ?>