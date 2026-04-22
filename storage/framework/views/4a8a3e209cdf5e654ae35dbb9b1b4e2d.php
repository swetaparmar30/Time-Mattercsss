<?php $__env->startSection('title'); ?> <?php echo e(isset($meta_title) ? $meta_title : ''); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> <?php echo e(isset($meta_description) ? $meta_description : ''); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="sandk-common sandk-common-padding blog-page">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="blog-title">Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="sandk-common sandk-common-padding blog-boxes-section">
    <div class="container-md">
        <div class="row">
            <input type='hidden' id='current_page' />
            <input type='hidden' id='show_per_page' />
            <?php if(isset($blogs) && count($blogs) > 0): ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 blog-box-sec">
                        <article>
                            <a href="<?php echo e(route('front.single_blog_detail',[$item->slug])); ?>/" class="blog-img">
                                <?php if(isset($item->image) && $item->image != null): ?>
                                    <?php
                                        $img = App\Models\MediaImage::select('name')->where('id', $item->image)->first();
                                    ?>
                                    <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" width="auto" height="auto">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('front-assets/src/images/not-found-image.webp')); ?>" class="img-fluid" width="auto" height="auto">
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
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/blogs.blade.php ENDPATH**/ ?>