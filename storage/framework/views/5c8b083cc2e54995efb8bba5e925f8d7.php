<?php if(isset($result['product_title']) && $result['product_title'] != '' && $result['product_title'] != null): ?>
<?php $__env->startSection('title'); ?> <?php echo strip_tags($result['product_title']); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<div class="prdct_detail_main_page">
<section class="sandk-common-padding sandk-common product-page-banner-section <?php if(isset($result['product_slug']) && $result['product_slug']): ?> <?php echo e($result['product_slug']); ?> <?php endif; ?>">
        <div class="container-md">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 left-side">
                    <?php if(isset($result['product_title']) && $result['product_title']): ?>
                        <h1><?php echo $result['product_title']; ?></h1>
                    <?php endif; ?>
                    <?php if(isset($result['product_subtitle']) && $result['product_subtitle']): ?>
                        <h4 class="desk-product-subtitle"><?php echo e($result['product_subtitle']); ?></h4>
                    <?php endif; ?>

                    <?php if(isset($result['image']) && $result['image'] != null && $result['image'] != ''): ?>
                    <div class="mobile_product_image">
                        <img src="<?php echo e($result['image']); ?>" width="auto" height="auto" class="img-fluid" alt="<?php echo e(isset($result['product_title']) ? $result['product_title'] : ''); ?>">
                    </div>
                    <?php endif; ?>
                    <?php if(isset($result['product_subtitle']) && $result['product_subtitle']): ?>
                        <h4 class="mb-product-subtitle"><?php echo e($result['product_subtitle']); ?></h4>
                    <?php endif; ?>
                    <?php if(isset($result['description']) && $result['description']): ?>
                        <?php echo $result['description']; ?>

                    <?php endif; ?>
                    <a  data-bs-toggle="modal" data-bs-target="#getafreequote" class="common-btn" style=" cursor: pointer;">GET A QUOTE</a>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right-side desktop_product_image">
                    <?php if(isset($result['image']) && $result['image'] != null && $result['image'] != ''): ?>
                        <img src="<?php echo e($result['image']); ?>" width="auto" height="auto" class="img-fluid" alt="<?php echo e(isset($result['product_title']) ? $result['product_title'] : ''); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($result['contents'])): ?>
        <?php if($result['contents'][0]['title'] != '-'): ?>
            <?php if(count($result['contents']) > 0): ?>
                <section class="sandk-common-padding sandk-common product-page-product-item-section">
                    <div class="container-md">
                        <div class="row desktop-product-sec">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 left-side">
                                <ul class="nav nav-tabs product-nav-tab ">
                                    <?php $__currentLoopData = $result['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc => $kval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li data-bs-active="#tab<?php echo e($kc); ?>"><a data-bs-toggle="tab" href="javascript:;" data-target="#tab<?php echo e($kc); ?>" class="product-tab-link <?php if($kc == 0): ?> active <?php endif; ?>"><?php echo e(isset($kval['title']) ? $kval['title'] : '-'); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 right-side">
                                <div class="tab-content">
                                    <?php $__currentLoopData = $result['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc => $kval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div id="tab<?php echo e($kc); ?>" class="tab-pane fade tab<?php echo e($kc); ?> <?php if($kc == 0): ?> active show <?php endif; ?> product-tab-pan">
                                            <!-- <div class="row product-heading-content"> -->
                                                <!-- <div class="col-12"> -->
                                                    <?php echo $kval['content']; ?>

                                                <!-- </div> -->
                                            <!-- </div> -->
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mobile-product-details-sec">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <?php $__currentLoopData = $result['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc => $kval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="tab<?php echo e($kc); ?>">
                                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#tabcl<?php echo e($kc); ?>" aria-expanded="true"><span><?php echo e(isset($kval['title']) ? $kval['title'] : '-'); ?></span></button>
                                            </h3>
                                            <div id="tabcl<?php echo e($kc); ?>" class="accordion-collapse collapse" data-bs-parent="#footerAccordion" style="">
                                                <div class="card-body">
                                                    <div class="colors">
                                                        <?php echo $kval['content']; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($result['features_and_options'])): ?>
        <?php if($result['features_and_options'][0]['title'] != '-'): ?>
            <?php if(count($result['features_and_options']) > 0): ?>
                <section class="sandk-common-padding sandk-common product-features-options-section">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if(isset($result['feature_option_title']) && $result['feature_option_title']): ?>
                                    <h2><?php echo e($result['feature_option_title']); ?></h2>
                                <?php else: ?>
                                    <?php if(isset($result['product_title']) && $result['product_title']): ?>
                                        <h2><?php echo $result['product_title']; ?> Features & Options</h2>
                                    <?php else: ?>
                                        <h2>Features & Options</h2>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if(isset($result['feature_main_title']) && $result['feature_main_title']): ?>
                                    <p><?php echo e($result['feature_main_title']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row product-features-options-row for-deskop-features">
                            <?php $__currentLoopData = $result['features_and_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 product-features-options-boxes">
                                    <article>
                                        
                                        <?php if(isset($fval['file_path']) && $fval['file_path'] != '' && $fval['file_path'] != '-'): ?>
                                            <img src="<?php echo e($fval['file_path']); ?>" width="284" height="220" class="imgfluid" alt="">
                                            <div>
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="row product-features-options-row for-mobile-features container">
                            <?php $__currentLoopData = $result['features_and_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 product-features-options-boxes">
                                    <article>
                                        <?php if(isset($fval['file_path']) && $fval['file_path'] != '' && $fval['file_path'] != '-'): ?>
                                            <div>
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                <img src="<?php echo e($fval['file_path']); ?>" width="284" height="220" class="mobile-fe-image" alt="">
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php if(isset($result['energy_options'])): ?>
        <?php if($result['energy_options'][0]['title'] != '-'): ?>
            <?php if(count($result['energy_options']) > 0): ?>
                <section class="sandk-common-padding sandk-common product-features-options-section">
                    <div class="container-md">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php if(isset($result['product_title']) && $result['product_title']): ?>
                                    <h2><?php echo e($result['product_title']); ?> Energy Option</h2>
                                <?php else: ?>
                                    <h2>Energy-Saving Options</h2>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row product-features-options-row for-deskop-features">
                            <?php $__currentLoopData = $result['energy_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 product-features-options-boxes">
                                    <article>
                                        
                                        <?php if(isset($fval['file_path']) && $fval['file_path'] != '' && $fval['file_path'] != '-'): ?>
                                            <img src="<?php echo e($fval['file_path']); ?>" width="284" height="220" class="imgfluid" alt="">
                                            <div>
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="row product-features-options-row for-mobile-features container">
                            <?php $__currentLoopData = $result['energy_options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey=>$fval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 product-features-options-boxes">
                                    <article>
                                        <?php if(isset($fval['file_path']) && $fval['file_path'] != '' && $fval['file_path'] != '-'): ?>
                                            <div>
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                <img src="<?php echo e($fval['file_path']); ?>" width="284" height="220" class="mobile-fe-image" alt="">
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <p><?php echo $fval['content']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
    <?php echo $__env->make('frontend.includes.designs-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.includes.quote-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($client_logo) > 0): ?>
        <?php echo $__env->make('frontend.includes.client-logo-sec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function() {
    // for desktop
    $('.product-tab-link').on('click', function(e) {
        e.preventDefault();

        var targetId = $(this).data('target');
        var $targetElement = $(targetId);

        if ($targetElement.length) {
            var tabContentOffset = $('.tab-content').offset().top;
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (tabContentOffset < scrollTop || tabContentOffset > (scrollTop + windowHeight)) {
                $('html, body').animate({
                    scrollTop: tabContentOffset - 140
                }, 300);
            }

            $('.product-tab-pan').removeClass('active show');
            $targetElement.addClass('active show');

            $('.product-tab-link').removeClass('active');
            $(this).addClass('active');
        } 
    });

    // for mobile
    $(".accordion-button").click(function() {
        var target = $(this).attr("data-bs-target");

        setTimeout(function() {
            var $targetElement = $(target);
            var targetOffset = $targetElement.offset().top;
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (targetOffset < scrollTop || targetOffset > (scrollTop + windowHeight)) {
                $('html, body').animate({
                    scrollTop: targetOffset - 170
                }, 300);
            }
        }, 300);
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/product/commercialdetail.blade.php ENDPATH**/ ?>