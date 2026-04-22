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
        <?php if(isset($result)): ?>
            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <section class="inner-product-boxes-section residential-product-boxes-section sandk-common sandk-common-padding sandk-inner-common">
                    <div class="container-md">
                        <?php if(isset($res['category'])): ?>
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center products-headings-section">

                                <?php if(isset($banner_title) && $banner_title != null): ?>
                                    <h1 class="pro-category-title"><?php echo e($banner_title); ?></h1>
                                <?php elseif(isset($res['category']['title']) && $res['category']['title'] != ''): ?>
                                    <h1 class="pro-category-title"><?php echo e($res['category']['title']); ?></h1>
                                <?php endif; ?>

                                <?php if(isset($res['category']['description'])): ?>
                                    <?php 
                                        $slug = request()->segment(count(request()->segments()));
                                        $rescatBanerDesc = $res['category']['description'];
                                        if ($slug === 'openers') 
                                        {
                                            $find = 'residential garage door';
                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                            $rescatBanerDesc = str_replace($find, $replace, $rescatBanerDesc);
                                        }
                                        elseif($slug === 'distinctions-series-custom-garage-doors')
                                        {
                                            $find = '/\bgarage door\b/';
                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/">garage door</a>';
                                            $rescatBanerDesc = preg_replace($find, $replace, $rescatBanerDesc);
                                        }
                                    ?>

                                    <?php if(!empty($rescatBanerDesc)): ?>
                                        <p><?php echo $rescatBanerDesc; ?></p>
                                    <?php endif; ?>
                     
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if((isset($res['product']) && count($res['product']) > 0) || (isset($res['subcategories']) && count($res['subcategories']) > 0)): ?>
                            <?php
                                if($res['category']['slug'] == 'openers'){
                                    $ddpcount = array_merge($res['product'],$res['subcategories']);
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
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 products-box-section">
                                            <article>

                                                <?php if(isset($dval['slug'])): ?>
                                                        <?php if(isset($dval['image']) && $dval['image'] != null && $dval['image'] != ''): ?>
                                                            <?php if(isset($dval['link_category']) && ($dval['link_category'] != null || $dval['link_category'] != '')): ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['link_category']])); ?>/">
                                                                    <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                            <?php elseif(isset($dval['link_sub_category']) && ($dval['link_sub_category'] != null || $dval['link_sub_category'] != '')): ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['link_sub_category']])); ?>/">
                                                                    <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['slug']])); ?>/">
                                                                    <img src="<?php echo e($dval['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if(isset($dval['title'])): ?>

                                                            <?php if(isset($dval['link_category']) && ($dval['link_category'] != null || $dval['link_category'] != '')): ?>
                                                                <h3><a href="<?php echo e(route('residential.products', [$dval['link_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                            <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                                <h3><a href="<?php echo e(route('residential.products', [$dval['link_sub_category']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                            <?php else: ?>
                                                                <h3><a href="<?php echo e(route('residential.products', [$dval['slug']])); ?>/"><?php echo e($dval['title']); ?></a></h3>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if(isset($dval['categorysubtitle'])): ?>
                                                            <h5><?php echo e($dval['categorysubtitle']); ?></h5>
                                                        <?php endif; ?>

                                                        <?php if(isset($dval['description'])): ?>
                                                            <p><?php echo e($dval['description']); ?></p>
                                                        <?php endif; ?>

                                                        <?php if(isset($dval['bullet'])): ?>
                                                            <?php
                                                                if(strpos($dval['bullet'], "//") !== false){
                                                                    $bul = explode('//',$dval['bullet']);
                                                                }else{
                                                                    $bul = explode(',',$dval['bullet']);
                                                                }
                                                                
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

                                                    <?php if(isset($dval['list_image']) && $dval['list_image'] != null && $dval['list_image'] != ''): ?>

                                                            <?php
                                                                $imgsl = null;
                                                                if(isset($dval['list_images'])){
                                                                    foreach($dval['list_images'] as $kim=>$kvl){
                                                                        if($kvl['category'] == $res['category']['slug']){
                                                                            $imgsl = $kvl['image'];
                                                                        }
                                                                    }
                                                                    if(isset($imgsl)){
                                                                        $imgp = $imgsl;
                                                                    }else{
                                                                        $imgp = $dval['list_image'];
                                                                    }
                                                                }

                                                            // build product link logic
                                                            if(isset($dval['direct_file']) && $dval['direct_file'] != null){
                                                                $productLink = $dval['direct_file'];
                                                                $isExternal = true;
                                                            } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                                                                // product link if maincat exists
                                                                $productLink = route('residential.products', $dval['maincat'].'/'.$dval['product_slug']);
                                                                $isExternal = false;
                                                            } else {
                                                                // fallback product link (normal)
                                                                $productLink = route('residential.products', $dval['product_slug']);
                                                                $isExternal = false;
                                                            }
                                                            ?>
                                                       <!--  <?php if(isset($dval['direct_file']) && $dval['direct_file'] != null): ?>
                                                            <a href="<?php echo e($dval['direct_file']); ?>" target="_blank">
                                                                <img src="<?php echo e($imgp); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dval['product_slug']])); ?>/">
                                                                <img src="<?php echo e($imgp); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                            </a>
                                                        <?php endif; ?> -->

                                                         <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>>
                                                            <img src="<?php echo e($imgp); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_title'])): ?>
                                                       <!--  <?php if(isset($dval['direct_file']) && $dval['direct_file'] != null): ?>
                                                            <h3><a href="<?php echo e($dval['direct_file']); ?>" target="_blank"><?php echo e($dval['list_title']); ?></a></h3>
                                                        <?php else: ?>
                                                            <h3><a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dval['product_slug']])); ?>/"><?php echo e($dval['list_title']); ?></a></h3>
                                                        <?php endif; ?> -->

                                                        <h3>
                                                            <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>>
                                                                <?php echo e($dval['list_title']); ?>

                                                            </a>
                                                        </h3>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_subtitle'])): ?>
                                                        <h5><?php echo e($dval['list_subtitle']); ?></h5>
                                                    <?php endif; ?>

                                                    <?php if(isset($dval['list_description'])): ?>
                                                        <?php
                                                            $slug = request()->segment(count(request()->segments())); 

                                                            $resCatDescription = $dval['list_description'];

                                                            if ($slug === 'aspen-series' && $dval['product_slug'] === 'aspen-ap200n') 
                                                            {
                                                                $find = 'contemporary';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/contemporary-style-garage-doors/">contemporary garage door</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'aspen-series' && $dval['product_slug'] === 'aspen-ap138')
                                                            {
                                                                $find = 'polyurethane insulation';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/polyurethane-insulated-garage-doors/">polyurethane insulation</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'advantage-series-steel-pan-garage-doors' && $dval['product_slug'] === 'buildmark-steel-pan-garage-doors')
                                                            {
                                                                $find = '/\bgarage door\b/';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/">garage door</a>';
                                                                $resCatDescription = preg_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'classic-style-garage-doors' && $dval['product_slug'] === 'aspen-ap200')
                                                            {
                                                                $find = 'polyurethane insulation';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/polyurethane-insulated-garage-doors/">polyurethane insulation</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'classic-style-garage-doors' && $dval['product_slug'] === 'encore-en200')
                                                            {
                                                                $find = 'polystyrene insulation';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/polystyrene-insulated-garage-doors/">polystyrene insulation</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'farmhouse-style-garage-doors' && $dval['product_slug'] === 'encore-en200')
                                                            {
                                                                $find = 'residential garage door';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'contemporary-style-garage-doors' && $dval['product_slug'] === 'encore-en200')
                                                            {
                                                                $find = 'residential garage door';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'openers' && $dval['product_slug'] === 'ultra-ii-wifi')
                                                            {
                                                                $find = 'residential garage door';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'openers' && $dval['product_slug'] === 'airman-ii-with-wifi')
                                                            {
                                                                $find = 'residential garage door';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }
                                                            elseif ($slug === 'distinctions-series-custom-garage-doors' && $dval['product_slug'] === 'revival-wood-collection')
                                                            {
                                                                $find = 'wood garage doors';
                                                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/woodlook-garage-doors/">wood garage doors</a>';
                                                                $resCatDescription = str_replace($find, $replace, $resCatDescription);
                                                            }

                                                        ?>

                                                        <?php if(!empty($resCatDescription)): ?>
                                                            <p><?php echo $resCatDescription; ?></p>
                                                        <?php endif; ?>
                                                      
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
                                                            <!-- <?php if(isset($dval['direct_file']) && $dval['direct_file'] != null): ?>
                                                                <a href="<?php echo e($dval['direct_file']); ?>" target="_blank" class="common-btn">Learn More</a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dval['product_slug']])); ?>/" class="common-btn">Learn More</a>
                                                            <?php endif; ?> -->

                                                            <a href="<?php echo e($productLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>

                                                    <?php endif; ?>
                                                    <?php if(isset($dval['slug'])): ?>
                                                            
                                                            <?php if(isset($dval['link_category']) && ($dval['link_category'] != null || $dval['link_category'] != '')): ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                            <?php elseif($dval['link_sub_category'] != null || $dval['link_sub_category'] != ''): ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(route('residential.products', [$dval['slug']])); ?>/" class="common-btn">Learn More</a>
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
                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 products-box-section products-full-box-section">
                                                        <article>
                                                        <div class="row">
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="full-box-sec">
                                                                    <?php if(isset($dlst['slug'])): ?>

                                                                        <?php if(isset($dlst['title'])): ?>
                                                                            <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                                <h3><a href="<?php echo e(route('residential.products', [$dlst['link_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                                <h3><a href="<?php echo e(route('residential.products', [$dlst['link_sub_category']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php else: ?>
                                                                                <h3><a href="<?php echo e(route('residential.products', [$dlst['slug']])); ?>/"><?php echo e($dlst['title']); ?></a></h3>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['categorysubtitle'])): ?>
                                                                            <h5><?php echo e($dlst['categorysubtitle']); ?></h5>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['description'])): ?>
                                                                            <p><?php echo e($dlst['description']); ?></p>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['bullet'])): ?>
                                                                            <?php
                                                                                if(strpos($dlst['bullet'], "//") !== false){
                                                                                    $bul = explode('//',$dlst['bullet']);
                                                                                }else{
                                                                                    $bul = explode(',',$dlst['bullet']);
                                                                                }
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
                                                                        <?php if(isset($dlst['list_title'])): ?>
                                                                            <?php
                                                                                if(isset($dlst['direct_file']) && $dlst['direct_file'] != null){
                                                                                    $titleLink = $dlst['direct_file'];
                                                                                    $isExternal = true;
                                                                                } elseif(isset($dlst['maincat']) && $dlst['maincat'] != ''){
                                                                                    $titleLink = route('residential.products', $dlst['maincat'].'/'.$dlst['product_slug']);
                                                                                    $isExternal = false;
                                                                                } else {
                                                                                    $titleLink = route('residential.products', $dlst['product_slug']);
                                                                                    $isExternal = false;
                                                                                }
                                                                            ?>
                                                                           <!--  <?php if(isset($dlst['direct_file']) && $dlst['direct_file'] != null): ?>
                                                                                <h3><a href="<?php echo e($dval['direct_file']); ?>" target="_blank"><?php echo e($dlst['list_title']); ?></a></h3>
                                                                            <?php else: ?>
                                                                                <h3><a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dlst['product_slug']])); ?>/"><?php echo e($dlst['list_title']); ?></a></h3>
                                                                            <?php endif; ?> -->

                                                                            <h3>
                                                                                <a href="<?php echo e($titleLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?>>
                                                                                    <?php echo e($dlst['list_title']); ?>

                                                                                </a>
                                                                            </h3>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['list_subtitle'])): ?>
                                                                            <h5><?php echo e($dlst['list_subtitle']); ?></h5>
                                                                        <?php endif; ?>

                                                                        <?php if(isset($dlst['list_description'])): ?>

                                                                            <?php
                                                                                $slug = request()->segment(count(request()->segments())); 

                                                                                $resFullCatDesc = $dlst['list_description'];

                                                                                if ($slug === 'encore-series' && $dlst['product_slug'] === 'encore-en200') 
                                                                                {
                                                                                    $find = [
                                                                                        'residential garage door',
                                                                                        'polystyrene insulation'
                                                                                    ];
                                                                                    $replace = [
                                                                                        '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>',
                                                                                        '<a class="in-link" href="https://clarkandsonsdoors.com/residential/polystyrene-insulated-garage-doors/">polystyrene insulation</a>'
                                                                                    ];

                                                                                    $resFullCatDesc = str_replace($find, $replace, $resFullCatDesc);
                                                                                }
                                                                                
                                                                            ?>

                                                                            <?php if(!empty($resFullCatDesc)): ?>
                                                                                <p><?php echo $resFullCatDesc; ?></p>
                                                                            <?php endif; ?>

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
                                                                    <?php if(isset($dlst['product_slug'])): ?>
                                                                       <!--  <?php if(isset($dlst['direct_file']) && $dlst['direct_file'] != null): ?>
                                                                            <a href="<?php echo e($dval['direct_file']); ?>" target="_blank" class="common-btn">Learn More</a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dlst['product_slug']])); ?>" class="common-btn">Learn More</a>
                                                                        <?php endif; ?> -->
                                                                        <a href="<?php echo e($titleLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="common-btn">Learn More</a>

                                                                    <?php endif; ?>
                                                                    

                                                                    <?php if(isset($dlst['link_category']) && ($dlst['link_category'] != null || $dlst['link_category'] != '')): ?>
                                                                        <a href="<?php echo e(route('residential.products', [$dlst['link_category']])); ?>/" class="common-btn">Learn More</a>
                                                                    <?php elseif(isset($dlst['link_sub_category']) && ($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != '')): ?>
                                                                        <a href="<?php echo e(route('residential.products', [$dlst['link_sub_category']])); ?>/" class="common-btn">Learn More</a>
                                                                    <?php else: ?>
                                                                        <?php if(isset($dlst['slug'])): ?><a href="<?php echo e(route('residential.products', [$dlst['slug']])); ?>/" class="common-btn">Learn More</a><?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <?php if(isset($dlst['slug'])): ?>
                                                                <?php if(isset($dlst['image']) && $dlst['image'] != null && $dlst['image'] != ''): ?>
                                                                    <?php if($dlst['link_category'] != null || $dlst['link_category'] != ''): ?>
                                                                        <a href="<?php echo e(route('residential.products', [$dlst['link_category']])); ?>/" class="image-link">
                                                                            <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php elseif($dlst['link_sub_category'] != null || $dlst['link_sub_category'] != ''): ?>
                                                                        <a href="<?php echo e(route('residential.products', [$dval['link_sub_category']])); ?>/" class="image-link">
                                                                            <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a href="<?php echo e(route('residential.products', [$dlst['slug']])); ?>/" class="image-link">
                                                                            <img src="<?php echo e($dlst['image']); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php if(isset($dlst['list_image']) && $dlst['list_image'] != null && $dlst['list_image'] != ''): ?>
                                                                    <?php
                                                                        $imgsls = null;
                                                                        if(isset($dlst['list_images'])){
                                                                            foreach($dlst['list_images'] as $kim=>$kvl){
                                                                                if($kvl['category'] == $res['category']['slug']){
                                                                                    $imgsls = $kvl['image'];
                                                                                }
                                                                            }
                                                                            if(isset($imgsls)){
                                                                                $imgps = $imgsls;
                                                                            }else{
                                                                                $imgps = $dlst['list_image'];
                                                                            }
                                                                        }
                                                                         // build product link logic
                                                                        if(isset($dlst['direct_file']) && $dlst['direct_file'] != null){
                                                                            $titleLink = $dlst['direct_file'];
                                                                            $isExternal = true;
                                                                        } elseif(isset($dlst['maincat']) && $dlst['maincat'] != ''){
                                                                            // product link if maincat exists
                                                                            $titleLink = route('residential.products', $dlst['maincat'].'/'.$dlst['product_slug']);
                                                                            $isExternal = false;
                                                                        } else {
                                                                            // fallback product link (normal)
                                                                            $titleLink = route('residential.products', $dlst['product_slug']);
                                                                            $isExternal = false;
                                                                        }
                                                                    ?>
                                                                    <!-- <?php if(isset($dlst['direct_file']) && $dlst['direct_file'] != null): ?>
                                                                        <a href="<?php echo e($dval['direct_file']); ?>" target="_blank" class="image-link">
                                                                            <img src="<?php echo e($imgps); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <a href="<?php echo e(route('residential.product_detail', [$res['category']['slug'], $dlst['product_slug']])); ?>/"  class="image-link">
                                                                            <img src="<?php echo e($imgps); ?>" width="auto" height="auto" class="img-fluid" alt="">
                                                                        </a>
                                                                    <?php endif; ?> -->

                                                                     <a href="<?php echo e($titleLink); ?>/" <?php if($isExternal): ?> target="_blank" <?php endif; ?> class="image-link">
                                                                        <img src="<?php echo e($imgps); ?>" width="auto" height="auto" class="img-fluid" alt="">
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
    
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/product/residentialcategory.blade.php ENDPATH**/ ?>