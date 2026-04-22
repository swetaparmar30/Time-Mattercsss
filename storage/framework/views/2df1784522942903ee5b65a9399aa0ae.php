<?php
$topLevelKey = array_key_first($result);
?>

<?php $__env->startSection('title'); ?> <?php if(isset($meta_title) && $meta_title != null): ?> <?php echo e($meta_title); ?>

    <?php elseif(isset($result[$topLevelKey]['category']['title']) && $result[$topLevelKey]['category']['title'] != '' && $result[$topLevelKey]['category']['title'] != null): ?> <?php echo e($result[$topLevelKey]['category']['title']); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($result) &&  count($result) > 0): ?>
        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                //echo "<pre>"; print_r($res); echo "</pre>";
            ?>
            <?php if(array_key_exists('category', $res)): ?>
                <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">

                                <?php if(isset($banner_title) && $banner_title != null): ?>
                                    <h1><?php echo e($banner_title); ?></h1>
                                <?php elseif(isset($res['category']['title']) && $res['category']['title'] != ''): ?>
                                    <h1><?php echo e($res['category']['title']); ?></h1>
                                <?php endif; ?>


                                <?php if(isset($res['category']['description']) && $res['category']['description'] != ''): ?>
                                    <p><?php echo $res['category']['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if((isset($res['product']) && count($res['product']) > 0) || (isset($res['subcategories']) && count($res['subcategories']) > 0)): ?>
                            <?php
                            if($res['category']['slug'] == 'commercial-high-speed-fabric-doors' || $res['category']['slug'] == 'commercial-sectional-garage-doors'){
                            
                                $prdctcat = $res['product'];
                                $first[] = isset($res['subcategories'][0]) ? $res['subcategories'][0] : null;
                                if(isset($first)){
                                    unset($res['subcategories'][0]);
                                }
                                $subcat = $res['subcategories'];
                                $farr = array_merge($prdctcat,$subcat);
                                $ddpcount = array_merge($first,$farr);
                         
                            }else{
                                $ddpcount = array_merge($res['product'],$res['subcategories']);
                            }
                                
                                if(count($ddpcount)%2 != 0){
                                    $dlst = end($ddpcount);
                                    array_pop($ddpcount);
                                } 
                            ?>

                            <?php if(count($ddpcount) > 0): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $ddpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category products-box-section">
                                            <article>
                                                <?php if(isset($dval['slug'])): ?>
                                                    <?php if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != ''): ?>
                                                        <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/">
                                                                <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/">
                                                                <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/">
                                                                <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['title'])): ?>

                                                        <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                            <h3><a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                        <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                            <h3><a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                        <?php else: ?>
                                                            <h3><a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_subtitle']) && $dval['list_subtitle'] != '' && $dval['list_subtitle'] != null): ?>
                                                        <h5><?php echo e($dval['list_subtitle']); ?></h5>
                                                    <?php elseif(isset($dval['categorysubtitle'])): ?>
                                                        <h5><?php echo e($dval['categorysubtitle']); ?></h5>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null): ?>
                                                        <p><?php echo $dval['list_description']; ?></p>
                                                    <?php elseif(isset($dval['description'])): ?>
                                                        <p><?php echo $dval['description']; ?></p>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['bullet'])): ?>
                                                        <?php
                                                            $bul = explode(',',$dval['bullet']);
                                                        ?>
                                                        <?php if(isset($bul) && count($bul) > 0): ?>
                                                        <ul>
                                                            <?php $__currentLoopData = $bul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($bpoint); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                <?php

                                                    if(isset($dval['maincat']) && $dval['maincat'] != ''){
                                                        $dvalLink = route('commercial.products', $dval['maincat'].'/'.$dval['product_slug']);
                                                    }else {
                                                        $dvalLink = route('commercial.products', $res['category']['slug'].'/'.$dval['product_slug']);
                                                        $isExternal = false;
                                                    }
                                                    ?>

                                                    <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>
                                                    <a href="<?php echo e($dvalLink); ?>/">
                                                        <img src="<?php echo e($dval['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                    </a>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_title'])): ?>
                                                        <h3><a href="<?php echo e($dvalLink); ?>/"><?php echo e($dval['list_title']); ?></a></h3>
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
                                                <?php endif; ?>
                                                <div class="learn-more-btn-sec">
                                                    <?php if(isset($dval['product_slug'])): ?>
                                                            <a href="<?php echo e($dvalLink); ?>/" class="common-btn">Learn More</a>
                                                    <?php endif; ?>
                                                    <?php if(isset($dval['slug'])): ?>
                                                        <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                        <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/" class="common-btn">Learn More</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($dlst)): ?>
                                <?php if((isset($dlst['categorytitle']) && $dlst['categorytitle'] != '') || (isset($dlst['list_title']) && $dlst['list_title'] != '')): ?>
                                    <div class="row row-reverse lst_section <?php if(count($ddpcount) == 0): ?> h_div <?php endif; ?>">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                            <article>
                                                <div class="row">
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="full-box-sec">
                                                            <?php if(isset($dlst['slug'])): ?>
                                                                <?php if(isset($dlst['title'])): ?>
                                                                    <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                        <h3><a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                    <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                        <h3><a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                    <?php else: ?>
                                                                        <h3><a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>

                                                                <?php if(isset($dlst['list_subtitle']) && $dlst['list_subtitle'] != '' && $dlst['list_subtitle'] != null): ?>
                                                                    <h5><?php echo e($dlst['list_subtitle']); ?></h5>
                                                                <?php elseif(isset($dlst['categorysubtitle'])): ?>
                                                                    <h5><?php echo e($dlst['categorysubtitle']); ?></h5>
                                                                <?php endif; ?>
                                                                
                                                                <?php if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null): ?>
                                                                    <p><?php echo $dlst['list_description']; ?></p>
                                                                <?php elseif(isset($dlst['description'])): ?>
                                                                    <p><?php echo $dlst['description']; ?></p>
                                                                <?php endif; ?>

                                                                <?php if(isset($dlst['bullet'])): ?>
                                                                    <?php
                                                                            $bul = explode(',',$dlst['bullet']);
                                                                    ?>
                                                                    <?php if(isset($bul) && count($bul) > 0): ?>
                                                                    <ul>
                                                                        <?php $__currentLoopData = $bul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li><?php echo e($bpoint); ?></li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>

                                                            <?php else: ?>

                                                                <?php
                                                                if(isset($dlst['maincat']) && $dlst['maincat'] != ''){
                                                                    $dlstLink = route('commercial.products', $dlst['maincat'].'/'.$dlst['product_slug']);
                                                                }else {
                                                                    $dlstLink = route('commercial.products', $res['category']['slug'].'/'.$dlst['product_slug']);
                                                                    $isExternal = false;
                                                                }
                                                                ?>
                                                                <?php if(isset($dlst['list_title'])): ?>
                                                                    <h3><a href="<?php echo e($dlstLink); ?>/"><?php echo e($dlst['list_title']); ?></a></h3>
                                                                <?php endif; ?>

                                                                <?php if(isset($dlst['list_subtitle'])): ?>
                                                                    <h5><?php echo e($dlst['list_subtitle']); ?></h5>
                                                                <?php endif; ?>

                                                                <?php if(isset($dlst['list_description'])): ?>
                                                                    <p><?php echo $dlst['list_description']; ?></p>
                                                                <?php endif; ?>

                                                                <?php if(isset($dlst['list_bullet']) && count($dlst['list_bullet']) > 0): ?>
                                                                <ul>
                                                                    <?php $__currentLoopData = $dlst['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><?php echo e($bpoint); ?></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <div class="learn-more-btn-sec">
                                                                <?php if(isset($dlst['product_slug'])): ?><a href="<?php echo e($dlstLink); ?>/" class="common-btn">Learn More</a><?php endif; ?>
                                                                <!-- <?php if(isset($dlst['slug'])): ?><a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/" class="common-btn">Learn More</a><?php endif; ?> -->
                                                                 <?php if(isset($dlst['slug'])): ?>
                                                                    <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                          <a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                                        <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/" class="common-btn">Learn More</a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <?php if(isset($dlst['slug'])): ?>
                                                            <?php if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != ''): ?>
                                                                <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/" class="image-link">
                                                                        <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/" class="image-link">
                                                                        <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/" class="image-link">
                                                                        <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != ''): ?>
                                                                <a href="<?php echo e($dlstLink); ?>/"  class="image-link">
                                                                    <img src="<?php echo e($dlst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>      
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </section>

                <?php if(isset($res['subcategories_dts'])): ?>
                    <?php $__currentLoopData = $res['subcategories_dts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skey=>$subs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                            <div class="container-md">
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                                        <?php if(isset($subs['category']['title']) && $subs['category']['title'] != ''): ?>
                                            <h2><?php echo e($subs['category']['title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if(isset($subs['category']['description']) && $subs['category']['description'] != ''): ?>
                                            <p><?php echo $subs['category']['description']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(isset($subs['subcategories']) && count($subs['subcategories']) > 0): ?>
                                    <?php
                                        $dlst = [];
                                        $ddpcount = $subs['subcategories'];
                                        if(count($ddpcount)%2 != 0){
                                            $dlst = end($ddpcount);
                                            array_pop($ddpcount);
                                        } 
                                    ?>

                                    <?php if(count($ddpcount) > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $ddpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 commercial-category  products-box-section">
                                                    <article>
                                                        <?php if(isset($dval['slug'])): ?>
                                
                                                            <?php if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != ''): ?>
                                                                <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/">
                                                                        <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/">
                                                                        <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                    
                                                                <?php elseif($dval['link_product'] != null || $dval['link_product'] != ''): ?>
                                                                    <a class="121" href="<?php echo e(getCommercialProductUrl($dval['link_product'])); ?>/"> 
                                                                        <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>    
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/">
                                                                        <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                            <?php if(isset($dval['title'])): ?>

                                                                <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                                    <h3><a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                                <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                                    <h3><a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                                 <?php elseif($dval['link_product'] != null || $dval['link_product'] != ''): ?>
                                                                    <h3 class="2"><a href="<?php echo e(getCommercialProductUrl($dval['link_product'])); ?>/"><?php echo e($dval['title']); ?></a></h3>    
                                                                <?php else: ?>
                                                                    <h3><a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                         
                                                            <?php if(isset($dval['list_subtitle']) && $dval['list_subtitle'] != '' && $dval['list_subtitle'] != null): ?>
                                                                <h5><?php echo e($dval['list_subtitle']); ?></h5>
                                                            <?php elseif(isset($dval['categorysubtitle'])): ?>
                                                                <h5><?php echo e($dval['categorysubtitle']); ?></h5>
                                                            <?php endif; ?>

                                                            <?php if(isset($dval['list_description']) && $dval['list_description'] != '' && $dval['list_description'] != null): ?>
                                                                <p><?php echo $dval['list_description']; ?></p>
                                                            <?php elseif(isset($dval['description'])): ?>
                                                                <p><?php echo $dval['description']; ?></p>
                                                            <?php endif; ?>

                                                            <?php if(isset($dval['bullet'])): ?>
                                                                <?php
                                                                    $bul = explode(',',$dval['bullet']);
                                                                ?>
                                                                <?php if(isset($bul) && count($bul) > 0): ?>
                                                                <ul>
                                                                    <?php $__currentLoopData = $bul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><?php echo e($bpoint); ?></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php else: ?>

                                                            <?php

                                                            if(isset($dval['maincat']) && $dval['maincat'] != ''){
                                                                $dvalLink = route('commercial.products', $dval['maincat'].'/'.$dval['product_slug']);
                                                            }else {
                                                                $dvalLink = route('commercial.products', $res['category']['slug'].'/'.$dval['product_slug']);
                                                                $isExternal = false;
                                                            }
                                                            ?>

                                                            <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>
                                                            <a href="<?php echo e($dvalLink); ?>/">
                                                                <img src="<?php echo e($dval['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                            <?php endif; ?>

                                                            <?php if(isset($dval['list_title'])): ?>
                                                                <h3><a href="<?php echo e($dvalLink); ?>/"><?php echo e($dval['list_title']); ?></a></h3>
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
                                                        <?php endif; ?>
                                                        <div class="learn-more-btn-sec">
                                                            <?php if(isset($dval['product_slug'])): ?>
                                                                    <a href="<?php echo e($dvalLink); ?>/" class="common-btn">Learn More</a>
                                                            <?php endif; ?>
                                                            <?php if(isset($dval['slug'])): ?>
                                                                <?php if($dval['link_category'] != null || $dval['link_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                                <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                                <?php elseif($dval['link_product'] != null || $dval['link_product'] != ''): ?>
                                                                    <a href="<?php echo e(getCommercialProductUrl($dval['link_product'])); ?>/" class="common-btn">Learn More</a>    
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(route('commercial.products', [$dval['slug']])); ?>/" class="common-btn">Learn More</a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </article>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($dlst)): ?>
                                        <?php if((isset($dlst['categorytitle']) && $dlst['categorytitle'] != '') || (isset($dlst['list_title']) && $dlst['list_title'] != '')): ?>
                                            <div class="row row-reverse lst_section <?php if(count($ddpcount) == 0): ?> h_div <?php endif; ?>">
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section commercial-category products-full-box-section">
                                                    <article>
                                                        <div class="row">
                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="full-box-sec">
                                                                    <?php if(isset($dlst['slug'])): ?>
                                                                        <?php if(isset($dlst['title'])): ?>
                                                                            <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                                <h3><a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                                <h3><a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php else: ?>
                                                                                <h3><a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['list_subtitle']) && $dlst['list_subtitle'] != '' && $dval['list_subtitle'] != null): ?>
                                                                            <h5><?php echo e($dlst['list_subtitle']); ?></h5>
                                                                        <?php elseif(isset($dlst['categorysubtitle'])): ?>
                                                                            <h5><?php echo e($dlst['categorysubtitle']); ?></h5>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['list_description']) && $dlst['list_description'] != '' && $dlst['list_description'] != null): ?>
                                                                            <p><?php echo $dlst['list_description']; ?></p>
                                                                        <?php elseif(isset($dlst['description'])): ?>
                                                                            <p><?php echo $dlst['description']; ?></p>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['bullet'])): ?>
                                                                            <?php
                                                                                    $bul = explode(',',$dlst['bullet']);
                                                                            ?>
                                                                            <?php if(isset($bul) && count($bul) > 0): ?>
                                                                            <ul>
                                                                                <?php $__currentLoopData = $bul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <li><?php echo e($bpoint); ?></li>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </ul>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>

                                                                     <?php
                                                                        if(isset($dlst['maincat']) && $dlst['maincat'] != ''){
                                                                            $dlstLink = route('commercial.products', $dlst['maincat'].'/'.$dlst['product_slug']);
                                                                        }else {
                                                                            $dlstLink = route('commercial.products', $res['category']['slug'].'/'.$dlst['product_slug']);
                                                                            $isExternal = false;
                                                                        }
                                                                        ?>
                                                                        <?php if(isset($dlst['list_title'])): ?>
                                                                            <h3><a href="<?php echo e($dlstLink); ?>/"><?php echo e($dlst['list_title']); ?></a></h3>
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
                                                                    <?php endif; ?>
                                                                    <div class="learn-more-btn-sec">
                                                                        <?php if(isset($dlst['product_slug'])): ?><a href="<?php echo e($dlstLink); ?>/" class="common-btn">Learn More</a><?php endif; ?>

                                                                        <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                                        <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/" class="common-btn">Learn More</a>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <?php if(isset($dlst['slug'])): ?>
                                                                    <?php if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != ''): ?>
                                                                        <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['link_category']])); ?>/" class="image-link">
                                                                                <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['link_sub_category']])); ?>/" class="image-link">
                                                                                <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(route('commercial.products', [$dlst['slug']])); ?>/" class="image-link">
                                                                                <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != ''): ?>
                                                                        <a href="<?php echo e($dlstLink); ?>/"  class="image-link">
                                                                            <img src="<?php echo e($dlst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>      
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/product/commercialcategory.blade.php ENDPATH**/ ?>