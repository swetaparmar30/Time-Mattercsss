<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> <?php echo e(isset($meta_keywords) ? $meta_keywords : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="site-map-sec time-matter-common time-matter-common-padding">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="sitemap">Sitemap</h1>
                </div>
            </div>
        </div>  

    <section>  
        <div class="container-md">
                <div class="row"> 
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="sitemap-list">
                      
                            <?php if(!in_array(route('home').'/', $exselectpages)): ?>
                            <li>
                                <a href="<?php echo e(route('home')); ?>/">Home</a>
                            </li>
                            <?php endif; ?>
                            <?php if(!in_array(route('about.us').'/', $exselectpages)): ?>
                            <li>
                                <a href="<?php echo e(route('about.us')); ?>/">About</a>
                            </li>
                            <?php endif; ?>
                            <?php if(!in_array(route('contact').'/', $exselectpages)): ?>
                            <li>
                                <a href="<?php echo e(route('contact')); ?>/">Contact</a>
                            </li>
                            <?php endif; ?>
                            <?php
                                $excludedSlugs = ['sitemap', 'newport-garage-doors', 'dover-garage-doors', 'georgetown-garage-doors','salisbury-garage-doors'];
                            ?>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!in_array($page->slug, $excludedSlugs) && !in_array(route('frontend.page.index',['slug' => $page->slug]).'/', $exselectpages)): ?>
                                    <li>
                                        <a href="<?php echo e(route('frontend.page.index',['slug' => $page->slug])); ?>/"><?php echo e($page->title); ?></a>
                                    </li>
                                    <?php if(isset($page->id) && $page->id == 1): ?>

                                        <?php if(isset($posts) && count($posts) > 0): ?>
                                            <ul>
                                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $purl = route('front.single_blog_detail',['slug' => $post->slug]);
                                                ?>
                                                <?php if(!in_array($purl, $exselectposts)): ?>
                                                <li>
                                                    <a href="<?php echo e($purl); ?>/"><?php echo e($post->title); ?></a>
                                                </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- for location -->


                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($loc->slug)): ?>
                                    <?php if(!in_array(url('locations/' . $loc->slug).'/', $exselectpages)): ?>
                                    <li>
                                        <a href="<?php echo e(url('locations/' . $loc->slug)); ?>/">
                                            <?php echo e(ucwords(str_replace('-', ' ', $loc->slug))); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            <?php if(isset($timeservices) && $timeservices->count() > 0): ?>
                                <li><a href="#">Services</a></li>
                                
                                    <?php $__currentLoopData = $timeservices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($service->slug)): ?>
                                            <li>
                                                <a href="<?php echo e(url('time-services/' . $service->slug)); ?>/">
                                                    <?php echo e($service->name ?? ucwords(str_replace('-', ' ', $service->slug))); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            <?php endif; ?>

                            <!-- <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Member Access</a>
                            </li>
                            <?php endif; ?>
                             <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Independent Contractor</a>
                            </li>
                            <?php endif; ?>
                              <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Forms & Resources</a>
                            </li>
                            <?php endif; ?>
                              <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Temporary Employee</a>
                            </li>
                            <?php endif; ?>
                              <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Policies</a>
                            </li>
                            <?php endif; ?>
                              <?php if(!in_array(request()->route()->getName(), $exselectpages)): ?>
                            <li>
                                <a href="#">Resources</a>
                            </li>
                            <?php endif; ?> -->

                           
                        </ul>
                    </div>
                </div>
        </div>
    </section>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/hamzahk15.sg-host.com/public_html/resources/views/frontend/sitemap.blade.php ENDPATH**/ ?>