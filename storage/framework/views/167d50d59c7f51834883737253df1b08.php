<section class="new-garage-door-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($newgarage->newgarage_title) && $newgarage->newgarage_title != ''): ?>
                    <h2><?php echo e($newgarage->newgarage_title); ?></h2>
                    <h2 class="mobile-heading"><?php echo e($newgarage->newgarage_title); ?></h2>
                <?php endif; ?>
                <?php if(isset($newgarage->newgarage_desc) && $newgarage->newgarage_desc != ''): ?>
                    <?php echo e($newgarage->newgarage_desc); ?>

                <?php endif; ?>
            </div>
        </div>

        <?php if($garage_doors->count() > 0): ?>
        <div class="row justify-content-center desktop-garage-door-sec">
            <?php $__currentLoopData = $garage_doors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gky=>$gvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 box-sec-1 box-sec">
                    <article>
                        <div class="heading">
                            <?php if(isset($gvl->title) && $gvl->title != ''): ?><h3><a href="<?php if(isset($gvl->button_url) && $gvl->button_url !=''): ?> <?php echo e($gvl->button_url); ?> <?php endif; ?> " aria-label="<?php echo e($gvl->title); ?>"><?php echo e($gvl->title); ?></a></h3><?php endif; ?>
                            <?php if(isset($gvl->subtitle) && $gvl->subtitle != ''): ?><h4><a href="<?php if(isset($gvl->button_url) && $gvl->button_url !=''): ?> <?php echo e($gvl->button_url); ?> <?php endif; ?> " aria-label="<?php echo e($gvl->title); ?>"><?php echo e($gvl->subtitle); ?></a></h4><?php endif; ?>
                        </div>
                        <?php if(isset($gvl->image) && $gvl->image != null): ?>
                            <?php
                            $img = App\Models\MediaImage::select('name')->where('id', $gvl->image)->first();
                            ?>
                            <?php if($img && isset($img->name) && $img->name != null): ?>
                            <figure>
                                <a <?php if(isset($gvl->button_url) && $gvl->button_url !=''): ?> href="<?php echo e($gvl->button_url); ?>" <?php endif; ?> aria-label="<?php echo e($gvl->title); ?>">
                                    <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="486" height="205" alt="" loading="lazy">
                                </a>
                            </figure>
                            <?php endif; ?>
                        <?php else: ?>
                        <figure>
                            <a <?php if(isset($gvl->button_url) && $gvl->button_url !=''): ?> href="<?php echo e($gvl->button_url); ?>" <?php endif; ?> aria-label="<?php echo e($gvl->title); ?>"><img src="<?php echo e(asset('front-assets/src/images/new-residential-garage-doors.webp')); ?>" class="img-fluid" width="486" height="205" alt="" loading="lazy"></a>
                        </figure>
                        <?php endif; ?>
                        <?php if(isset($gvl->description) && $gvl->description != ''): ?>
                            <?php echo $gvl->description; ?>

                        <?php endif; ?>

                        <?php if(isset($gvl->bullets) && $gvl->bullets != ''): ?>
                            <?php echo $gvl->bullets; ?>

                        <?php endif; ?>
                 
                        <?php if(isset($gvl->button) && $gvl->button !=''): ?>
                            <?php if(isset($gvl->button_url) && $gvl->button_url !=''): ?>
                                <a class="common-btn first-btn" href="<?php echo e($gvl->button_url); ?>" aria-label="<?php echo e($gvl->title); ?>" title="<?php echo e($gvl->title); ?>" > 
                            <?php else: ?>
                            <a class="common-btn first-btn" aria-label="<?php echo e($gvl->title); ?>" title="<?php echo e($gvl->title); ?>" > 
                            <?php endif; ?>
                                <?php echo e($gvl->button); ?>

                            </a>
                        <?php endif; ?>
                    </article>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/includes/newgarage.blade.php ENDPATH**/ ?>