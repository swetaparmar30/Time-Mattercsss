<?php if(isset($article->meta_title) && $article->meta_title != ''): ?>
<?php $__env->startSection('title'); ?> <?php echo $article->meta_title; ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($article->meta_keyword) && $article->meta_keyword != ''): ?>
<?php $__env->startSection('keywords'); ?> <?php echo e($article->meta_keyword); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($article->meta_description) && $article->meta_description != ''): ?>
<?php $__env->startSection('description'); ?> <?php echo $article->meta_description; ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($article->page_index) && $article->page_index != '' && $article->page_index == 'on'): ?>
<?php $__env->startSection('robots'); ?> index <?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection('robots'); ?> noindex <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(isset($article->canonical_url) && $article->canonical_url != '' && $article->canonical_url != null): ?>
<?php $__env->startSection('canonical'); ?> <?php echo e($article->canonical_url); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<section class="single-blog-page-banner sandk-common sandk-common-padding blog-page">
   <div class="container-md">
      <div class="row">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
         </div>
      </div>
   </div>
</section>
<section class="blog-content-sec single-blog-content sandk-common sandk-common-padding">
   <div class="container-md single-blog-container">
      <div class="row">
         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 single-blog-box-sec-col left-side">
            <!--  -->
            <div class="single-blog-box-sec">
               <?php if(isset($article->image) && $article->image != null): ?>
               <?php
               $img = App\Models\MediaImage::select('name')->where('id', $article->image)->first();
               ?>
               <img src="<?php echo e(asset('uploads/'.$img->name)); ?>" class="img-fluid" alt="<?php echo e($article->title); ?>" decoding="async" fetchpriority="high">
               <?php else: ?>
               <img src="<?php echo e(asset('front-assets/src/images/not-found-image.webp')); ?>" class="img-fluid" alt="<?php echo e($article->title); ?>" decoding="async" fetchpriority="high">
               <?php endif; ?>
               <!--  -->
               <?php 
                  $time = strtotime($article->published_at);
                  $newformat = date('jS \of F Y',$time);
                  
                  ?>
               <div class="row blog_social_icon">
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 common-text">
                     <?php if(isset($article->published_at)): ?>
                     <p class="date-cat"><b>Posted On: <?php echo e($newformat); ?></b> <br><span>in for <u><?php echo e($article->category($article->category_id)); ?></u></span></p>
                     <p class="author-name">By <?php echo e(isset($article->author_name->name) ? $article->author_name->name : ''); ?></p>
                     <?php endif; ?>
                  </div>
                  <!-- <div class="col-sm-12 col-md-6 col-lg-6 text-end author_name">
                      <p>
                        <b>By <?php echo e(isset($article->author_name->name) ? $article->author_name->name : ''); ?></b> <br>
                        <b>IN <?php echo e($article->category($article->category_id)); ?></b>
                     </p>
                  </div> -->
                  
               </div>
               <!--  -->
               <h4><?php echo e($article->title); ?></h4>
               <?php echo html_entity_decode($article->content); ?>

               <!--  <?php if($article->tag_id): ?>
                  <div class="tags_data">
                      <span><?php echo $article->tags_data($article->tag_id); ?></span>
                  </div>
                  <?php endif; ?> -->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-3 text-end blog-social-icons-last">
                 <!-- Twitter -->
                 <a href="https://twitter.com/intent/tweet?url=<?php echo e(URL::to('/blog/')); ?>/<?php echo e($article->slug); ?>&text=<?php echo e($article->title); ?>" target="_blank" class="share-btn1 share-btn twitter">
                    <img src="<?php echo e(asset('front-assets/src/images/twitter-new.png')); ?>" class="img-fluid">
                 </a>
                 <!-- Google Plus -->
                 <!-- <a href="https://plus.google.com/share?url=<?php echo e(URL::to('/blogs/')); ?>/<?php echo e($article->slug); ?>" target="_blank" class="share-btn1 share-btn google-plus">
                    <img src="<?php echo e(asset('front-assets/src/images/google-plus-new.png')); ?>" class="img-fluid">
                 </a> -->
                 <!-- Facebook -->
                 <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(URL::to('/blog/')); ?>/<?php echo e($article->slug); ?>" target="_blank" class="share-btn1 share-btn facebook">
                    <img src="<?php echo e(asset('front-assets/src/images/facebook-new.png')); ?>" class="img-fluid">
                 </a>
                 <!-- LinkedIn -->
                 <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(URL::to('/blog/')); ?>/<?php echo e($article->slug); ?>&title=<?php echo e($article->title); ?>" target="_blank" class="share-btn1 share-btn linkedin">
                    <img src="<?php echo e(asset('front-assets/src/images/linkedin-new.png')); ?>" class="img-fluid">
                 </a>
                 <!-- Email -->
                 <a href="https://api.whatsapp.com/send?text=<?php echo e($article->title); ?> <?php echo e(URL::to('/blog/')); ?>/<?php echo e($article->slug); ?>" target="_blank" class="share-btn1 share-btn email">
                    <img src="<?php echo e(asset('front-assets/src/images/whatsapp-new.png')); ?>" class="img-fluid">
                 </a>

                 
          </div>
         </div>
         <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 single-right-sec-col right-side">
            <?php
            $p_count = 10;
            $posts = App\Models\Article::where('status', 1)->take($p_count)->latest()->get();
            ?>  
            <?php if($posts->count() > 0): ?>
            <div class="new-inner-featured-articles-sec">
               <h3>Recent Articles</h3>
               <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <?php
               if(isset($val->published_at)){
               $time = strtotime($val->published_at);
               $newformat = date('F j\, Y',$time);
               }else{
               $time = strtotime($val->created_at);
               $newformat = date('F j\, Y',$time);
               }
               ?>
               <h4><a href="<?php echo e(url('/blog/'.$val->slug)); ?>/"><?php echo e($val->title); ?></a></h4>
               <h5><?php echo e($newformat); ?></h5>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Font Awesome 5 CDN -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/frontend/blogs/index.blade.php ENDPATH**/ ?>