
<section class="sandk-common sandk-common-padding blog-boxes-section home-page-blog-sec">
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
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="read-more-link common-btn">Read Article</a>
                            </div>

                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/frontend/includes/blog-sec.blade.php ENDPATH**/ ?>