<?php if(isset($result[0]['subcategory'][0]['categorytitle']) && $result[0]['subcategory'][0]['categorytitle'] != '' && $result[0]['subcategory'][0]['categorytitle'] != null): ?>
<?php $__env->startSection('title'); ?> <?php echo e($result[0]['subcategory'][0]['categorytitle']); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>

    <?php if(isset($result) &&  count($result) > 0): ?>
        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                //echo "<pre>"; print_r($res); echo "</pre>";
            ?>
            <?php if(array_key_exists('subcategory', $res)): ?>
            
                <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">

                                
                                    <?php if(isset($res['subcategory'][0]['categorytitle']) && $res['subcategory'][0]['categorytitle'] != ''): ?>
                                        <h2 class="series-title"><?php echo e($res['subcategory'][0]['categorytitle']); ?></h2>
                                    <?php endif; ?>
                                    <?php if(isset($res['subcategory'][0]['categorysubtitle']) && $res['subcategory'][0]['categorysubtitle'] != ''): ?>
                                        <h5 class="series-subtitle"><?php echo e($res['subcategory'][0]['categorysubtitle']); ?></h5>
                                    <?php endif; ?>
                                    <?php if(isset($res['subcategory'][0]['description']) && $res['subcategory'][0]['description'] != ''): ?>
                                        <p><?php echo $res['subcategory'][0]['description']; ?></p>
                                    <?php endif; ?>
                             
                               
                            </div>
                        </div>

                        <?php if((isset($res['product']) && count($res['product']) > 0)): ?>
                            <?php
                                $ddpcount = $res['product'];
                                if(count($ddpcount)%2 != 0){
                                    $dlst = end($ddpcount);
                                    array_pop($ddpcount);
                                } 
                            ?>

                            <?php if(count($ddpcount) > 0): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $ddpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                          $lnk = $res['category'];
                                          if(isset($dval['maincat']) && $dval['maincat'] != '' && $dval['maincat'] != null){
                                            $lnk = $dval['maincat'];
                                          }
                                        ?>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category products-box-section">
                                            <article>
                                                <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>
                                                <a href="<?php echo e(route('commercial.product_detail', [$lnk, $dval['product_slug']])); ?>/">
                                                    <img src="<?php echo e($dval['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                </a>
                                                <?php endif; ?>

                                                <?php if(isset($dval['list_title'])): ?>
                                                    <h3><a href="<?php echo e(route('commercial.product_detail', [$lnk, $dval['product_slug']])); ?>/"><?php echo e($dval['list_title']); ?></a></h3>
                                                <?php endif; ?>

                                                <?php if(isset($dval['list_subtitle'])): ?>
                                                    <h5><?php echo e($dval['list_subtitle']); ?></h5>
                                                <?php endif; ?>

                                                <?php if(isset($dval['list_description'])): ?>
                                                    <p><?php echo e($dval['list_description']); ?></p>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($dval['list_bullet']) && count($dval['list_bullet']) > 0): ?>
                                                <ul>
                                                    <?php $__currentLoopData = $dval['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($bpoint); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <?php endif; ?>
                                                <div class="learn-more-btn-sec">
                                                    <a href="<?php echo e(route('commercial.product_detail', [$lnk, $dval['product_slug']])); ?>/" class="common-btn">Learn More</a>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($dlst)): ?>
                            <?php
                                $lnk = $res['category'];
                                if(isset($dlst['maincat']) && $dlst['maincat'] != '' && $dlst['maincat'] != null){
                                $lnk = $dlst['maincat'];
                                }
                            ?>
                            <div class="row row-reverse">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                    <article>
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="full-box-sec">
                                                    <?php if(isset($dlst['list_title'])): ?>
                                                        <h3><a href="<?php echo e(route('commercial.product_detail', [$lnk, $dlst['product_slug']])); ?>/"><?php echo e($dlst['list_title']); ?></a></h3>
                                                    <?php endif; ?>

                                                    <?php if(isset($dlst['list_subtitle'])): ?>
                                                        <h5><?php echo e($dlst['list_subtitle']); ?></h5>
                                                    <?php endif; ?>

                                                    <?php if(isset($dlst['list_description'])): ?>
                                                        <p><?php echo e($dlst['list_description']); ?></p>
                                                    <?php endif; ?>
                                                        
                                                    <?php if(isset($dlst['list_bullet']) && count($dlst['list_bullet']) > 0): ?>
                                                        <ul>
                                                            <?php $__currentLoopData = $dlst['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($bpoint); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <div class="learn-more-btn-sec">
                                                        <a href="<?php echo e(route('commercial.product_detail', [$lnk, $dlst['product_slug']])); ?>/" class="common-btn">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <?php if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != ''): ?>
                                                <a href="<?php echo e(route('commercial.product_detail', [$lnk, $dlst['product_slug']])); ?>/" class="image-link">
                                                    <img src="<?php echo e($dlst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        
                                    </article>
                                </div>
                            </div>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/product/commercialsubcategory.blade.php ENDPATH**/ ?>