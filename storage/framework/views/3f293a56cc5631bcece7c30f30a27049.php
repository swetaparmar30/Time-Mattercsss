

<section class="diffrent-brand-sec newHome-common-padding sandk-newHome">
   <div class="container-md">
      <div class="row align-items-center">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="logo-inline-image">
               <?php $__currentLoopData = $client_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($val->image) && $val->image != null): ?>
                     <?php
                     $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                     ?>
                     <figure>
                           <?php if(isset($img->name) && $img->name != null): ?>
                           <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                        <?php endif; ?>
                     </figure>
                  <?php else: ?>
                     <figure>
                       
                           <img src="<?php echo e(asset('front-assets/images/IDA.webp')); ?>" width="258" height="" alt="" class="img-fluid">
                     
                     </figure>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
            </div>
            <div class="logo-mobile-images owl-loaded">
               <?php $__currentLoopData = $client_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($val->image) && $val->image != null): ?>
                     <?php
                     $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                     ?>
                     <article>
                     <figure>
                     <?php if(isset($img->name) && $img->name != null): ?>
                           <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                           <?php endif; ?>
                     </figure>
                     </article>
                  <?php else: ?>
                     <article>
                     <figure>
                     
                           <img src="<?php echo e(asset('front-assets/images/IDA.webp')); ?>" width="258" height="" alt="" class="img-fluid">
                      
                     </figure>
                     </article>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="new-diffrent-brand-sec newHome-common-padding sandk-newHome d-none">
   <div class="container-md">
         <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="logo-images owl-loaded">
                  <?php $__currentLoopData = $client_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if(isset($val->image) && $val->image != null): ?>
                        <?php
                        $img = App\Models\MediaImage::select('name')->where('id', $val->image)->first();
                        ?>
                        <figure>
                           <?php if(isset($img->name) && $img->name != null): ?>
                          <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="" height="" alt="Time Master Garage Doors Client" loading="lazy">
                        <?php endif; ?>
                        </figure>
                     <?php else: ?>
                        <figure>
                           <img src="<?php echo e(asset('front-assets/images/IDA.webp')); ?>" width="258" height="" alt="" class="img-fluid">
                       
                        </figure>
                     <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
            </div>
         </div>
   </div>
</section><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/client-logo-sec.blade.php ENDPATH**/ ?>