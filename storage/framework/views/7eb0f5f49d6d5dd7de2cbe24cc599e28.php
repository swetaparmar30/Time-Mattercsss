<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    
    <?php if(!in_array(route('home').'/', $exselectpages)): ?>
    <url>
        <loc><?php echo e(route('home')); ?>/</loc>
        <lastmod>2024-02-24T09:52:56+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <?php endif; ?>
    <?php if(!in_array(route('about.us').'/', $exselectpages)): ?>
    <url>
        <loc><?php echo e(route('about.us')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <?php endif; ?>
    <?php if(!in_array(route('contact').'/', $exselectpages)): ?>
    <url>
        <loc><?php echo e(route('contact')); ?>/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <?php endif; ?>
    <?php
        $excludedSlugs = ['sitemap'];
    ?>

    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!in_array($page->slug, $excludedSlugs) && !in_array(route('frontend.page.index',['slug' => $page->slug]).'/', $exselectpages)): ?>
            <url>
                <loc><?php echo e(route('frontend.page.index', ['slug' => $page->slug])); ?>/</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($loc->slug)): ?>
            <?php if(!in_array(url('locations/' . $loc->slug).'/', $exselectpages)): ?>
            <url>
                <loc><?php echo e(url('locations/' . $loc->slug)); ?>/</loc>
                <lastmod><?php echo e($loc->updated_at->tz('UTC')->toAtomString()); ?></lastmod>
                <priority>0.80</priority>
            </url>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    
    <?php $__currentLoopData = $timeservices ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($service->slug)): ?>
            <url>
                <loc><?php echo e(url('time-services/' . $service->slug)); ?></loc>
                <lastmod><?php echo e(now()->format('Y-m-d')); ?></lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
   
</urlset>
               <?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/sitemap_xml_page.blade.php ENDPATH**/ ?>