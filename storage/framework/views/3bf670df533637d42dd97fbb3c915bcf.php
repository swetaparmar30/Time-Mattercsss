
<section class="sandk-common sandk-common-padding blog-boxes-section home-page-blog-sec article-page-sec desktop-layout">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($blog_sec->blog_title) && $blog_sec->blog_title != ''): ?>
                    <h2><?php echo e($blog_sec->blog_title); ?></h2>
                    <h2 class="mobile-heading"><?php echo e($blog_sec->blog_title); ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row desktop-blog-sec">
            
            


             <?php if(isset($blogs) && count($blogs) > 0): ?>
                <?php $__currentLoopData = $blogs->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 blog-box-sec post-item">
                        <article>
                            <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="blog-img">
                                <?php if(isset($item->image) && $item->image != null): ?>
                                    <?php
                                        $img = App\Models\MediaImage::select('name')->where('id', $item->image)->first();
                                    ?>
                                    <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="778" height="332" loading="lazy" alt="Blog Image">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('front-assets/src/images/not-found-image.webp')); ?>" class="img-fluid" width="778" height="332" loading="lazy" alt="Blog Image">
                                <?php endif; ?>
                            </a>

                            <div class="blog-content">
                                <h4>
                                    <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/"><?php echo e(isset($item->title) ? $item->title : ''); ?></a>
                                </h4>
                                
                                <?php
                                    if(isset($item->published_at)){
                                        $time = strtotime($item->published_at);
                                        $newformat = date('F j\, Y',$time);
                                    }else{
                                        $time = strtotime($item->created_at);
                                        $newformat = date('F j\, Y',$time);
                                    }
                                ?>
                                
                                <div class="publish-date"><h5><?php echo e($newformat); ?></h5></div>
                                
                                <p><?php echo e(isset($item->short_description) ? $item->short_description : ''); ?></p>
                                <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="read-more-link common-btn">View Article</a>
                            </div>

                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>






        
    </div>
</section>



<section class="sandk-common sandk-common-padding blog-boxes-section home-page-blog-sec article-page-sec mobile-layout">
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php if(isset($blog_sec->blog_title) && $blog_sec->blog_title != ''): ?>
                    <h2><?php echo e($blog_sec->blog_title); ?></h2>
                    <h2 class="mobile-heading"><?php echo e($blog_sec->blog_title); ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="mobile-blog-sec blog-carousel owl-loaded owl-carousel owl-theme owl-center">
            
            <?php if(isset($blogs) && count($blogs) > 0): ?>
               <?php $__currentLoopData = $blogs->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="blog-box-sec post-item article-box">
                        <article>
                            <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="blog-img">
                                <?php if(isset($item->image) && $item->image != null): ?>
                                    <?php
                                        $img = App\Models\MediaImage::select('name')->where('id', $item->image)->first();
                                    ?>
                                    <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="778" height="332" loading="lazy" alt="Blog Image">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('front-assets/src/images/not-found-image.webp')); ?>" class="img-fluid" width="778" height="332" loading="lazy" alt="Blog Image">
                                <?php endif; ?>
                            </a>

                            <div class="blog-content">
                                <h4>
                                    <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/"><?php echo e(isset($item->title) ? $item->title : ''); ?></a>
                                </h4>
                                
                                <?php
                                    if(isset($item->published_at)){
                                        $time = strtotime($item->published_at);
                                        $newformat = date('F j\, Y',$time);
                                    }else{
                                        $time = strtotime($item->created_at);
                                        $newformat = date('F j\, Y',$time);
                                    }
                                ?>
                                
                                <div class="publish-date"><h5><?php echo e($newformat); ?></h5></div>
                                
                                <p><?php echo e(isset($item->short_description) ? $item->short_description : ''); ?></p>
                                <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="read-more-link new-cmn-btn"><span class="text">View article </span><svg viewBox="0 0 24 24" preserveAspectRatio="none" fill="currentColor" role="presentation" class="LinkSanity_Icon__JmAKV LinkSanity_Icon_right__9NwEP LinkSanity_Icon_triggered__kerGW" xmlns="http://www.w3.org/2000/svg"><path d="M16.6075 11.8572L13.255 8.40897L14.1388 7.5L19 12.5L14.1388 17.5L13.255 16.591L16.6075 13.1428H5V11.8572H16.6075Z"></path></svg></a>
                                
                            </div>

                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>






        
    </div>
</section><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/includes/blog-sec.blade.php ENDPATH**/ ?>