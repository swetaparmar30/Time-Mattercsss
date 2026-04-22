<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc><?php echo e(route('home')); ?>/</loc>
        <lastmod>2024-02-24T09:52:56+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc><?php echo e(route('about.us')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?php echo e(route('contact')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc><?php echo e(route('privacypolicy')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    
    <?php
        $excludedSlugs = ['sitemap', 'newport-garage-doors', 'dover-garage-doors', 'georgetown-garage-doors', 'salisbury-garage-doors'];
    ?>

    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!in_array($page->slug, $excludedSlugs)): ?>
            <url>
                <loc><?php echo e(route('frontend.page.index', ['slug' => $page->slug])); ?>/</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($loc->slug)): ?>
        <url>
            <loc><?php echo e(url('locations/' . $loc->slug)); ?>/</loc>
            <lastmod><?php echo e($loc->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <priority>0.80</priority>
        </url>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php if(count($residential_menus) > 0): ?>
 
        <?php $__currentLoopData = $residential_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reskey => $resmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($resmenu) > 0): ?>
                <?php $__currentLoopData = $resmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <url>
                        <loc><?php echo e(route('residential.products', [$fval['slug']])); ?>/</loc>
                        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                        <priority>0.80</priority>
                    </url>
                   
                    <?php if(count($fval['subcategories']) > 0): ?>
                        <?php $__currentLoopData = $fval['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey1 => $fval1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <url>
                                <loc><?php echo e(route('residential.products', [$fval1['slug']])); ?>/</loc>
                                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                                <priority>0.80</priority>
                            </url>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
            $dataproduct = App\Models\Apiproductdata::select('subcategory','maincat', 'product_json')
                ->where('menutype', 'residential')
                ->get()
                ->unique('product_json')
                ->values()
                ->toArray();
        ?> 

        <?php if(count($dataproduct) > 0): ?>
            <?php $__currentLoopData = $dataproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php

                $products_j = json_decode($dval['product_json'],true);

                if(isset($products_j['direct_file']) && $products_j['direct_file'] != null){
                    $productLink = $products_j['direct_file'];
                    $isExternal = true;
                }elseif($dval['subcategory'] == 'smart-garage-accessories'){
                    $productLink = route('residential.products', 'openers/'.$products_j['product_slug']);
                    $isExternal = false;
                } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                    $productLink = route('residential.products', $dval['maincat'].'/'.$products_j['product_slug']);
                    $isExternal = false;
                } else {
                    $productLink = route('residential.products', $products_j['product_slug']);
                    $isExternal = false;
                }
            ?>

            <url>
                <loc><?php echo e($productLink); ?>/</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>
          
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    <?php endif; ?>
    <url>
        <loc><?php echo e(route('serviceAndRepair')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

      <url>
        <loc><?php echo e(route('serviceareas')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
   
 <?php $__currentLoopData = $serviceAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($serv->slug)): ?>
        <url>
            <loc><?php echo e(url('service-areas/' . $serv->slug)); ?>/</loc>
            <lastmod><?php echo e($serv->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
            <priority>0.80</priority>
        </url>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    <url>
        <loc><?php echo e(route('get.commercial.products')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

    

    <?php
        $datacategorys = App\Models\Apicategorydata::where('menutype', 'commercial')
           ->where('category', '!=', 'traffic-doors')
            ->get()
            ->unique('category')
            ->values()
            ->toArray();
    ?> 
    <?php if(count($datacategorys) > 0): ?>
            <?php $__currentLoopData = $datacategorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cates => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $category_json = json_decode($cate['category_json'],true);
            ?>
                <url>
                    <loc><?php echo e(route('commercial.products', [$cate['category']])); ?>/</loc>
                    <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                    <priority>0.80</priority>
                </url>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php
        $datasubcategorys = App\Models\Apisubcategorydata::where('menutype', 'commercial')
            ->whereNotIn('subcategory', ['sectional-thermaseal-doors', 'thermaseal', 'thermaseal-thermal-sectional-insulated-steel-doors', 'extruded-alumaview-aluminum-rail-and-stile-doors', 'alumaview-aluminum-rail-and-stile-doors', 'firehoist-operators', 'energycore', 'rolling-steel-solutions', 'controlhoist-commercial-door-operators', 'steelpro-sectional-ribbed-steel-overhead-doors', 'customized-solutions'])
            ->get()
            ->unique('subcategory')
            ->values()
            ->toArray();
    ?> 
    <?php if(count($datacategorys) > 0): ?>
            <?php $__currentLoopData = $datasubcategorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcates => $subcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $category_json_sub = json_decode($subcate['category_json'],true);
                ?>
                <url>
                    <loc><?php echo e(route('commercial.products', [$subcate['subcategory']])); ?>/</loc>
                    <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                    <priority>0.80</priority>
                </url>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php
        $dataproduct = App\Models\Apiproductdata::select('category', 'subcategory','maincat', 'product_json')
            ->where('menutype', 'commercial')->whereNotIn('subcategory', ['steelform-series', 'steelform-sectional-ribbed-steel-overhead-doors'])
            ->get()
            ->unique('product_json')
            ->values()
            ->toArray();
    ?> 
    <?php if(count($dataproduct) > 0): ?>
            <?php $__currentLoopData = $dataproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $dval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $products_j_data = json_decode($dval['product_json'],true);
                if(isset($products_j_data['product_slug']) && $products_j_data['product_slug'] == 'energycore-ec200') {
                    continue;
                }
                if(isset($products_j_data['direct_file']) && $products_j_data['direct_file'] != null){
                    $productLink = $products_j_data['direct_file'];
                    $isExternal = true;
                }elseif($dval['subcategory'] == 'openers'){
                    $productLink = route('commercial.products', 'openers/'.$products_j_data['product_slug']);
                    $isExternal = false;
                } elseif(isset($dval['maincat']) && $dval['maincat'] != ''){
                    $productLink = route('commercial.products', $dval['maincat'].'/'.$products_j_data['product_slug']);
                    $isExternal = false;
                } else {
                    $productLink = route('commercial.products', $dval['category'].'/'.$products_j_data['product_slug']);
                    $isExternal = false;
                }
            ?>
            <url>
                <loc><?php echo e($productLink); ?>/</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


    <url>
        <loc><?php echo e(url('loading-dock')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

    <url>
        <loc><?php echo e(url('hollow-metal-door')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

   
</urlset>
               <?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/sitemap_xml_page.blade.php ENDPATH**/ ?>