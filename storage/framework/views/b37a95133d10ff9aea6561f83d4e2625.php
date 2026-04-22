
<section class="design-center-sec sandk-common-padding sandk-common">
   <div class="container-md">
         <div class="row align-items-center">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-side">
               <?php if(isset($design->design_title) && $design->design_title != ''): ?>
                  <h2 class="design-h2"><?php echo e($design->design_title); ?></h2>
               <?php endif; ?>
               <?php if(isset($design->design_sub_title) && $design->design_sub_title != ''): ?>
                  <h3 class="design-h3"><?php echo e($design->design_sub_title); ?></h3>
               <?php endif; ?>
               <?php if(isset($design->design_img) && $design->design_img != null): ?>
                  <?php
                  $img = App\Models\MediaImage::select('name')->where('id', $design->design_img)->first();
                  ?>
                  <?php if(isset($img->name) && $img->name != null): ?>
                  <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid mobile-img" width="786" height="473" alt="" loading="lazy">
                  <?php endif; ?>
               <?php else: ?>
               <img src="<?php echo e(asset('front-assets/src/images/new-design-adoor-right-img.webp')); ?>" class="img-fluid mobile-img" width="auto" height="auto" alt="" loading="lazy">
               <?php endif; ?>
               
               <?php if(isset($design->design_description) && $design->design_description != ''): ?>
                  <?php echo html_entity_decode($design->design_description); ?>

               <?php endif; ?>

               <?php if(isset($design->button_name) && $design->button_name !=''): ?>
                     <?php if(isset($design->button_url) && $design->button_url !=''): ?>
                        <a class="common-btn first-btn" href="<?php echo e($design->button_url); ?>" target="_blank"> 
                     <?php else: ?>
                     <a class="common-btn first-btn"> 
                     <?php endif; ?>
                        <?php echo e($design->button_name); ?>

                     </a>
               <?php endif; ?>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 right-side">
               <?php if(isset($design->design_img) && $design->design_img != null): ?>
                  <?php
                  $img = App\Models\MediaImage::select('name')->where('id', $design->design_img)->first();
                  ?>
                  <?php if(isset($img->name) && $img->name != null): ?>
                  <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid deskto-img" width="786" height="473" alt="" loading="lazy">
                  <?php endif; ?>
               <?php else: ?>
               <img src="<?php echo e(asset('front-assets/src/images/new-design-adoor-right-img.webp')); ?>" class="img-fluid deskto-img" width="auto" height="auto" alt="" loading="lazy">
               <?php endif; ?>
            </div>
         </div>
   </div>
</section><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/frontend/includes/designs-sec.blade.php ENDPATH**/ ?>