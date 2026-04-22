<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section class="inner-residential-commercial-banner-section residential-banner-section sandk-common">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1>Residential Garage Doors Delaware</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-residential-commercial-slider-section residential-banner-section sandk-common">
        <div id="residentialslider" class="carousel slide">
            <?php if(isset($banners) && count($banners) > 0): ?>
            <div class="carousel-inner">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php if($key == 0): ?> active <?php endif; ?>">
                    <img src="<?php echo e(isset($banner->banner_image) ? $banner->banner_image : ''); ?>" class="img-fluid" width="auto" height="auto" alt="residential banner">
                    <div class="slider-content">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 banner_<?php echo e($key); ?>">
                                    <h4><?php echo e(isset($banner->banner_title) ? $banner->banner_title : ''); ?></h4>
                                    <h1><?php echo e(isset($banner->banner_subtitle) ? $banner->banner_subtitle : ''); ?></h1>
                                    <?php
                                    if(isset($banner->link_product) && $banner->link_product != '' && $banner->link_product != null)
                                    {
                                        $route = route('residential.product_detail',['slug' => $banner->parent_cat_slug, 'slug2' => $banner->link_product]);

                                    }else if(isset($banner->link_sub_category) && $banner->link_sub_category != null && $banner->link_sub_category != '')
                                    {
                                        $route = route('residential.products',['slug' => $banner->link_sub_category]);

                                    }else if(isset($banner->link_category) && $banner->link_category != null && $banner->link_category != '')
                                    {
                                        $route = route('residential.products',['slug' => $banner->link_category]);
                                    }
                                    ?>
                                    <?php if(isset($route) && $route != null && $route != ''): ?>
                                    <a href="<?php echo e($route); ?>/" class="common-btn">View Product</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo e(asset('front-assets/src/images/residential-images/Residential-Garage-Doors-banner.webp')); ?>" class="img-fluid" width="auto" height="auto" alt="residential banner">
                    <div class="slider-content">
                        <div class="container-md">
                            <div class="row">
                                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8 col-sm-12 col-xs-12">
                                    <h4>Aspen™ AP200</h4>
                                    <h1>Unbeatable Quality With The Most Design Options</h1>
                                    <a class="common-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php endif; ?>
            <?php if(isset($banners) && count($banners) > 1): ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#residentialslider" data-bs-slide="prev">
                <img src="<?php echo e(asset('front-assets/src/images/residential-images/residential-slider-left.png')); ?>" class="img-fluid" width="auto" height="auto" alt="residential arrow">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#residentialslider" data-bs-slide="next">
                <img src="<?php echo e(asset('front-assets/src/images/residential-images/residential-slider-right.png')); ?>" class="img-fluid" width="auto" height="auto" alt="residential arrow">
            </button>
            <?php endif; ?>
        </div>
    </section>


    <?php if(isset($result) &&  count($result) > 0): ?>
        <?php if(array_key_exists('Distinctions Series', $result)): ?>
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                <div class="container-md">
                    <?php if(isset($result['Distinctions Series']['category'])): ?>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            <?php if(isset($result['Distinctions Series']['category']['title'])): ?>
                                <h2><?php echo e($result['Distinctions Series']['category']['title']); ?></h2>
                            <?php endif; ?>
                            
                            <?php if(isset($result['Distinctions Series']['category']['description'])): ?>

                                <?php
                                    $slug = request()->segment(count(request()->segments())); 
                                    $resDescription = $result['Distinctions Series']['category']['description'] ?? '';

                                    if ($slug == 'residential') {
                                        $find = 'Distinctions Series residential garage doors';
                                        $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/distinctions-series-custom-garage-doors/">Distinctions Series residential garage doors</a>';
                                        $resDescription = str_replace($find, $replace, $resDescription);
                                    }

                                ?>

                                <?php if(!empty($resDescription)): ?>
                                    <p><?php echo $resDescription; ?></p>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($result['Distinctions Series']['product']) && count($result['Distinctions Series']['product']) > 0): ?>
                        <?php
                            $ddpcount = $result['Distinctions Series']['product'];
                            if(count($ddpcount)%2 != 0){
                                $dlst = end($ddpcount);
                                array_pop($ddpcount);
                            }
                        ?>

                        <?php if(count($ddpcount) > 0): ?>
                            <div class="row">
                                <?php $__currentLoopData = $ddpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        // Determine product link for each item
                                        if(isset($dval['direct_file']) && $dval['direct_file'] != null){
                                            $productLink = $dval['direct_file'];
                                            $isExternal = true;
                                        } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                                            $productLink = route('residential.products', $dval['maincat'].'/'.$dval['product_slug']);
                                            $isExternal = false;
                                        } else {
                                            $productLink = route('residential.products', $dval['product_slug']);
                                            $isExternal = false;
                                        }
                                    ?>

                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>
                                            <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>>
                                                <img src="<?php echo e($dval['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            <?php endif; ?>

                                            <?php if(isset($dval['list_title'])): ?>
                                                <h3><a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>><?php echo e($dval['list_title']); ?></a></h3>
                                            <?php endif; ?>

                                            <?php if(isset($dval['list_subtitle'])): ?>
                                                <h5><?php echo e($dval['list_subtitle']); ?></h5>
                                            <?php endif; ?>

                                            <?php if(isset($dval['list_description'])): ?>
                                                <?php
                                                    $slug = request()->segment(count(request()->segments())); 
                                                    $resboxDescription = $dval['list_description'];

                                                    if ($slug == 'residential') {
                                                        $find = 'wood garage doors';
                                                        $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/woodlook-garage-doors/">wood garage doors</a>';
                                                        $resboxDescription = str_replace($find, $replace, $resboxDescription);
                                                    }

                                                ?>

                                                <?php if(!empty($resboxDescription)): ?>
                                                    <p><?php echo $resboxDescription; ?></p>
                                                <?php endif; ?>
                                         
                                            <?php endif; ?>
                                            
                                            <?php if(isset($dval['list_bullet']) && count($dval['list_bullet']) > 0): ?>
                                            <ul>
                                                <?php $__currentLoopData = $dval['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($bpoint); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <?php endif; ?>
                                            <div class="learn-more-btn-sec">
                                                <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($dlst)): ?>

                            <?php
                                // Determine link for dlst (last odd product)
                                if(isset($dlst['direct_file']) && $dlst['direct_file'] != null){
                                    $dlstLink = $dlst['direct_file'];
                                    $isExternal = true;
                                } elseif(isset($dlst['maincat']) && $dlst['maincat'] != ''){
                                    $dlstLink = route('residential.products', $dlst['maincat'].'/'.$dlst['product_slug']);
                                    $isExternal = false;
                                } else {
                                    $dlstLink = route('residential.products', $dlst['product_slug']);
                                    $isExternal = false;
                                }
                            ?>
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="full-box-sec">
                                                <?php if(isset($dlst['list_title'])): ?>
                                                    <h3><a href="<?php echo e($dlstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>><?php echo e($dlst['list_title']); ?></a></h3>
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
                                                    <a href="<?php echo e($dlstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <?php if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != ''): ?>
                                            <a href="<?php echo e($dlstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="image-link">
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

        <?php if(array_key_exists('Aspen Series', $result)): ?>
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common aspen-residential">
                <div class="container-md">
                    <?php if(isset($result['Aspen Series']['category'])): ?>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            <?php if(isset($result['Aspen Series']['category']['title'])): ?>
                                <h2><?php echo e($result['Aspen Series']['category']['title']); ?></h2>
                            <?php endif; ?>
                            <?php if(isset($result['Aspen Series']['category']['description'])): ?>
                                <p><?php echo e($result['Aspen Series']['category']['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($result['Aspen Series']['product']) && count($result['Aspen Series']['product']) > 0): ?>
                        <?php
                            $adpcount = $result['Aspen Series']['product'];
                            if(count($adpcount)%2 != 0){
                                $alst = end($adpcount);
                                array_pop($adpcount);
                            }
                        ?>

                        <?php if(count($adpcount) > 0): ?>
                            <div class="row">
                                <?php $__currentLoopData = $adpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        // Determine product link
                                        if(isset($dval['direct_file']) && $dval['direct_file'] != null){
                                            $productLink = $dval['direct_file'];
                                            $isExternal = true;
                                        } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                                            $productLink = route('residential.products', $dval['maincat'].'/'.$dval['product_slug']);
                                            $isExternal = false;
                                        } else {
                                            $productLink = route('residential.products', $dval['product_slug']);
                                            $isExternal = false;
                                        }
                                    ?>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
                                            <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>
                                            <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>>
                                                <img src="<?php echo e($dval['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                            </a>
                                            <?php endif; ?>

                                            <?php if(isset($dval['list_title'])): ?>
                                                <h3><a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>><?php echo e($dval['list_title']); ?></a></h3>
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
                                                <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($alst)): ?>

                            <?php
                                // Determine link for the last odd product
                                if(isset($alst['direct_file']) && $alst['direct_file'] != null){
                                    $alstLink = $alst['direct_file'];
                                    $isExternal = true;
                                } elseif(isset($alst['maincat']) && $alst['maincat'] != ''){
                                    $alstLink = route('residential.products', $alst['maincat'].'/'.$alst['product_slug']);
                                    $isExternal = false;
                                } else {
                                    $alstLink = route('residential.products', $alst['product_slug']);
                                    $isExternal = false;
                                }
                            ?>
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="full-box-sec">
                                        <?php if(isset($alst['list_title'])): ?>
                                            <h3><a href="<?php echo e($alstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>><?php echo e($alst['list_title']); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if(isset($alst['list_subtitle'])): ?>
                                            <h5><?php echo e($alst['list_subtitle']); ?></h5>
                                        <?php endif; ?>

                                        <?php if(isset($alst['list_description'])): ?>
                                            <p><?php echo e($alst['list_description']); ?></p>
                                        <?php endif; ?>
                                            
                                        <?php if(isset($alst['list_bullet']) && count($alst['list_bullet']) > 0): ?>
                                            <ul>
                                                <?php $__currentLoopData = $alst['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($bpoint); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="learn-more-btn-sec">
                                            <a href="<?php echo e($alstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>
                                        </div>
                                    </div>
                                 </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <?php if(isset($alst['list_image']) && $alst['list_image'] != null && $alst['list_image'] != ''): ?>
                                            <a href="<?php echo e($alstLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="image-link">
                                                <img src="<?php echo e($alst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
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

        <?php if(array_key_exists('Encore Series', $result)): ?>
            <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common sandk-inner-common residential-Polystyrene-steel-garage-door-section">
                <div class="container-md">
                    <?php if(isset($result['Encore Series']['category'])): ?>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            <?php if(isset($result['Encore Series']['category']['title'])): ?>
                                <h2><?php echo e($result['Encore Series']['category']['title']); ?></h2>
                            <?php endif; ?>
                            <?php if(isset($result['Encore Series']['category']['description'])): ?>
                                <p><?php echo e($result['Encore Series']['category']['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($result['Encore Series']['product']) && count($result['Aspen Series']['product']) > 0): ?>
                        <?php
                            $edpcount = $result['Encore Series']['product'];
                            if(count($edpcount)%2 != 0){
                                $elst = end($edpcount);
                                array_pop($edpcount);
                            }
                        ?>

                        <?php if(count($edpcount) > 0): ?>
                            <div class="row">
                                <?php $__currentLoopData = $edpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        // Determine link for the last odd product
                                        if(isset($dval['direct_file']) && $dval['direct_file'] != null){
                                            $dvalLink = $dval['direct_file'];
                                            $isExternal = true;
                                        } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                                            $dvalLink = route('residential.products', $dval['maincat'].'/'.$dval['product_slug']);
                                            $isExternal = false;
                                        } else {
                                            $dvalLink = route('residential.products', $dval['product_slug']);
                                            $isExternal = false;
                                        }
                                    ?>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="<?php echo e($dvalLink); ?>/" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(isset($elst)): ?>
                    <?php
                        // Determine link for the last odd product
                        if(isset($elst['direct_file']) && $elst['direct_file'] != null){
                            $elstLink = $elst['direct_file'];
                            $isExternal = true;
                        } elseif(isset($elst['maincat']) && $elst['maincat'] != ''){
                            $elstLink = route('residential.products', $elst['maincat'].'/'.$elst['product_slug']);
                            $isExternal = false;
                        } else {
                            $elstLink = route('residential.products', $elst['product_slug']);
                            $isExternal = false;
                        }
                    ?>
                    <div class="row row-reverse">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                            <article>
                            <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="full-box-sec">
                                    <?php if(isset($elst['list_title'])): ?>
                                        <h3><a href="<?php echo e($elstLink); ?>/"><?php echo e($elst['list_title']); ?></a></h3>
                                    <?php endif; ?>

                                    <?php if(isset($elst['list_subtitle'])): ?>
                                        <h5><?php echo e($elst['list_subtitle']); ?></h5>
                                    <?php endif; ?>

                                    <?php if(isset($elst['list_description'])): ?>
                                        <p><?php echo e($elst['list_description']); ?></p>
                                    <?php endif; ?>
                                        
                                    <?php if(isset($elst['list_bullet']) && count($elst['list_bullet']) > 0): ?>
                                        <ul>
                                            <?php $__currentLoopData = $elst['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($bpoint); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                    <div class="learn-more-btn-sec">
                                        <a href="<?php echo e($elstLink); ?>/" class="common-btn">Learn More</a>
                                    </div>
                                </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <?php if(isset($elst['list_image']) && $elst['list_image'] != null && $elst['list_image'] != ''): ?>
                                    <a href="<?php echo e($elstLink); ?>/" class="image-link">
                                        <img src="<?php echo e($elst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                    </a>
                                <?php endif; ?>
                                </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if(array_key_exists('Advantage Series', $result)): ?>
        <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common last-product-section advantage-series-sec">
            <div class="container-md">

                <?php if(isset($result['Advantage Series']['category'])): ?>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">
                            <?php if(isset($result['Advantage Series']['category']['title'])): ?>
                                <h2><?php echo e($result['Advantage Series']['category']['title']); ?></h2>
                            <?php endif; ?>
                            <?php if(isset($result['Advantage Series']['category']['description'])): ?>
                                <p><?php echo e($result['Advantage Series']['category']['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($result['Advantage Series']['product']) && count($result['Advantage Series']['product']) > 0): ?>
                        <?php
                            $addpcount = $result['Advantage Series']['product'];
                            if(count($addpcount)%2 != 0){
                                $adlst = end($addpcount);
                                array_pop($addpcount);
                            }
                        ?>

                        <?php if(count($addpcount) > 0): ?>
                            <div class="row">
                                <?php $__currentLoopData = $addpcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        // Determine link for the last odd product
                                        if(isset($dval['direct_file']) && $dval['direct_file'] != null){
                                            $dvalLink = $dval['direct_file'];
                                            $isExternal = true;
                                        } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                                            $dvalLink = route('residential.products', $dval['maincat'].'/'.$dval['product_slug']);
                                            $isExternal = false;
                                        } else {
                                            $dvalLink = route('residential.products', $dval['product_slug']);
                                            $isExternal = false;
                                        }
                                    ?>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                        <article>
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
                                            <div class="learn-more-btn-sec">
                                                <a href="<?php echo e($dvalLink); ?>/" class="common-btn">Learn More</a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($adlst)): ?>

                         <?php
                        // Determine link for the last odd product
                        if(isset($adlst['direct_file']) && $adlst['direct_file'] != null){
                            $adlstLink = $adlst['direct_file'];
                            $isExternal = true;
                        } elseif(isset($adlst['maincat']) && $adlst['maincat'] != ''){
                            $adlstLink = route('residential.products', $adlst['maincat'].'/'.$adlst['product_slug']);
                            $isExternal = false;
                        } else {
                            $adlstLink = route('residential.products', $adlst['product_slug']);
                            $isExternal = false;
                        }
                        ?>
                        <div class="row row-reverse">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                <article>
                                <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="full-box-sec">
                                        <?php if(isset($adlst['list_title'])): ?>
                                            <h3><a href="<?php echo e($adlstLink); ?>/"><?php echo e($adlst['list_title']); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if(isset($adlst['list_subtitle'])): ?>
                                            <h5><?php echo e($adlst['list_subtitle']); ?></h5>
                                        <?php endif; ?>

                                        <?php if(isset($adlst['list_description'])): ?>
                                            <p><?php echo e($adlst['list_description']); ?></p>
                                        <?php endif; ?>
                                            
                                        <?php if(isset($adlst['list_bullet']) && count($adlst['list_bullet']) > 0): ?>
                                            <ul>
                                                <?php $__currentLoopData = $adlst['list_bullet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($bpoint); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                        <div class="learn-more-btn-sec">
                                            <a href="<?php echo e($adlstLink); ?>/" class="common-btn">Learn More</a>
                                        </div>
                                    </div>
                                    </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <?php if(isset($adlst['list_image']) && $adlst['list_image'] != null && $adlst['list_image'] != ''): ?>
                                        <a href="<?php echo e($adlstLink); ?>/" class="image-link">
                                            <img src="<?php echo e($adlst['list_image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
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

    <?php endif; ?>
    
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <section class="sandk-common sandk-common-padding residential-garage-door-openers-section">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Residential Garage Door Openers</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 left-side">
                    <img src="<?php echo e(asset('front-assets/src/images/residential-images/residential-garage-door-openers.webp')); ?>" width="auto" height="auto" alt="Residential Garage Door Openers" class="img-fluid">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right-side">
                    <h3>Automatic Garage Door Openers</h3>
                    <p>Raynor’s full line of residential garage door openers offer a broad selection of performance, features, and durability. All models offer the ultimate in garage door opener safety and security. This product line is available in a variety of horsepower levels and drive systems, as well as wall-mounted jackshaft door operators and battery backup systems. myQ™ technology enables you to securely monitor and control your garage door opener with your smartphone, tablet or computer.</p>
                    <div class="learn-more-btn-sec">
                        <a href="<?php echo e(route('residential.products', ['openers'])); ?>/" class="common-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/product/residential.blade.php ENDPATH**/ ?>