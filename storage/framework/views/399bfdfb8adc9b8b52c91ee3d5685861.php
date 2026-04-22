
<section class="common-problems-sec sandk-common-padding sandk-common">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 left-side">
                <?php if(isset($garage_door->garage_img) && $garage_door->garage_img != null): ?>
                    <?php
                        $img = App\Models\MediaImage::where('id', $garage_door->garage_img)->first();
                    ?>
                    <?php if(isset($img->name) && $img->name != null): ?>
                      <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" srcset="<?php echo e(asset('uploads/'.$img->name)); ?> 602w"
                            sizes="(max-width: 600px) 400px, (max-width: 900px) 600px, 602px" class="img-fluid"
                            width="602" height="588" loading="lazy"  alt="<?php echo e($img->alt_text ?: ($garage_door->door_title ?? 'Common Garage')); ?>">
                    <?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo e(asset('front-assets/src/images/More-Common-Problems.webp')); ?>" class="img-fluid"
                        width="602" height="588" alt="Garage Door" loading="lazy">
                <?php endif; ?>
            </div>

            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 right-side">
                <h2><?php echo e(isset($garage_door->door_title) ? $garage_door->door_title : ''); ?> <?php if(isset($garage_door->door_sub_title) && $garage_door->door_sub_title != ''): ?>
                        <?php echo e($garage_door->door_sub_title); ?>

                    <?php endif; ?>
                </h2>
                <h2 class="mobile-heading"><?php echo e(isset($garage_door->door_title) ? $garage_door->door_title : ''); ?>

                    <?php echo e(isset($garage_door->door_sub_title) ? $garage_door->door_sub_title : ''); ?></h2>
                <?php echo $garage_door->garage_door_description; ?>

                <?php if(isset($residential->resi_button_name) && $residential->resi_button_name != ''): ?>
                    <?php if(isset($residential->resi_button_url) && $residential->resi_button_url != ''): ?>
                        <a class="common-btn" href="<?php echo e($residential->resi_button_url); ?>">
                        <?php else: ?>
                            <a class="common-btn">
                    <?php endif; ?>
                    <img src="<?php echo e(asset('front-assets/src/images/white-yellow-call-icon.webp')); ?>" class="normal-icon"
                        alt=""><img src="<?php echo e(asset('front-assets/src/images/blue-white-call-icon.webp')); ?>"
                        class="hover-icon" alt="" width="25"
                        height="25"><?php echo e($residential->resi_button_name); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/garagedoor.blade.php ENDPATH**/ ?>