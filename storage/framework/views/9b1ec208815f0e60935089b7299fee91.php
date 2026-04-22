<?php if($testimonials->count() > 0): ?>
<section class="testimonial-sec sandk-common-padding sandk-common">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <div id="testimonial" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tkey=>$tval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php if($tkey == 0): ?> active <?php endif; ?>">
                                <div class="client-comment">
                                    <div class="star-img">
                                        <?php
                                            $rating = $tval->rating;
                                            $blank = 5 - $rating;
                                            $halfblank = 5 - $tval->rating;
                                        ?>
                                        <?php for($i = 0; $i < $rating; $i++): ?>
                                            <img class="img-fluid" src="/uploads/66a0c92641524.svg" alt="Star Rating" width="32" height="32">
                                        <?php endfor; ?>

                                        <?php for($i = 0; $i < $blank; $i++): ?>
                                            <img class="img-fluid" src="/uploads/66a0c92640233.svg" alt="Star Rating" width="32" height="32">
                                        <?php endfor; ?>
                                        <!-- <img class="img-fluid" src="/uploads/66a0c92641524.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c92641524.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c926418e1.svg" width="auto" height="auto">
                                        <img class="img-fluid" src="/uploads/66a0c92640233.svg" width="auto" height="auto"> -->
                                    </div>

                                    <?php if($tval->content && $tval->content != ''): ?>
                                    <p><?php echo html_entity_decode($tval->content); ?></p> 
                                    <?php endif; ?>
                                </div>
                                <?php if($tval->name && $tval->name != ''): ?>
                                <div class="client-details">
                                    <?php if(isset($tval->img) && $tval->img != ''): ?>
                                        <?php
                                            $img = App\Models\MediaImage::select('name')->where('id', $tval->img)->first();
                                        ?>
                        
                                        <span class="name-first-letter" style="background:white;"><img src="<?php echo e(asset('uploads/'.$img->name)); ?>" style="padding:10px;" class="img-fluid" width="auto" height="auto" alt="" loading="lazy"></span>
                                    <?php else: ?>
                                        <span class="name-first-letter"><?php echo e(substr($tval->name, 0, 1)); ?></span>
                                    <?php endif; ?>
                                    <h4><?php echo e($tval->name); ?></h4>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonial" data-bs-slide="prev"><img class="img-fluid" src="<?php echo e(asset('front-assets/src/images/testimonal-right.webp')); ?>" alt="Prev" width="17" height="30">
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#testimonial" data-bs-slide="next"><img class="img-fluid" src="<?php echo e(asset('front-assets/src/images/testimonal-left.webp')); ?>" alt="Next" width="17" height="30">
                    </button>

                    <div class="carousel-indicators">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tkey=>$tval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-bs-target="#testimonial" data-bs-slide-to="<?php echo e($tkey); ?>" <?php if($tkey == 0): ?> class="active" <?php endif; ?> aria-label="Slide <?php echo e($tkey + 1); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/includes/testimonial.blade.php ENDPATH**/ ?>