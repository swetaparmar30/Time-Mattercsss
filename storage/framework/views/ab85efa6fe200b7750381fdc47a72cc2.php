<?php if(isset($result['product_title']) && $result['product_title'] != '' && $result['product_title'] != null): ?>
<?php $__env->startSection('title'); ?> <?php echo strip_tags($result['product_title']); ?> <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<style>

</style>
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
                        <?php
                            $slug = request()->segment(count(request()->segments())); 
                            $fullPath = Request::path();
                            $resDetailDesc = $result['description'];
                            if ($fullPath === 'residential/distinctions-series-custom-garage-doors/styleview-collection-aluminum-garage-doors') 
                            {
                                $find = [
                                    'contemporary',
                                    'residential garage doors'
                                ];
                                $replace = [
                                    '<a class="in-link" href="https://clarkandsonsdoors.com/residential/contemporary-style-garage-doors/">contemporary</a>',
                                    '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage doors</a>'
                                ];
                                $resDetailDesc = str_replace($find, $replace, $resDetailDesc);
                            }
                            elseif ($fullPath === 'residential/distinctions-series-custom-garage-doors/revival-wood-collection')
                            {
                                $find = 'Aspen base';
                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/aspen-series/">Aspen base</a>';
                                $resDetailDesc = str_replace($find, $replace, $resDetailDesc);
                            }
                            elseif ($fullPath === 'residential/advantage-series-steel-pan-garage-doors/trademark-steel-pan-garage-doors')
                            {
                                $find = 'garage doors';
                                $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/">garage doors</a>';
                                $resDetailDesc = str_replace($find, $replace, $resDetailDesc);
                            }
                        ?>
                        <?php if(!empty($resDetailDesc)): ?>
                            <?php echo $resDetailDesc; ?>

                        <?php endif; ?>

                    <?php endif; ?>
                    
                    <?php 
                        $LiteratureFiles = [
                            'smart-garage-camera' => 'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf',
                            'smart-touchscreen-deadbolt' => 'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf',
                            'smart-keypad-lever' => 'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf',
                            'myq-video-keypad' => 'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf',
                            'video-doorbell' => 'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf',
                            'outdoor-battery-camera' =>'https://raynor.dev/uploads/2025061410152910228-Smart-Accessories-0625.pdf'
                        ];
                        $LiteratureFiles = $LiteratureFiles[$result['product_slug']] ?? '';
                    ?>
                    <?php if($LiteratureFiles): ?>
                        <div class="uploaded-files">
                            
                        <a href="<?php echo e($LiteratureFiles); ?>" class="file-button literature-btn" target="_blank">Literature <i class="fa fa-download"></i></a>
                        <a href="https://raynor.dev/uploads/2910304-Residential Accessories Compatibility Chart-0925-web.pdf" class="file-button compatibility-btn" target="_blank">Compatibility Chart <i class="fa fa-download"></i></a>
                        </div>
                    <?php endif; ?>
                <a  data-bs-toggle="modal" data-bs-target="#getafreequote" class="common-btn detail-btn" style=" cursor: pointer;">GET A QUOTE</a>
                
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 right-side desktop_product_image">
                    <?php if(isset($result['image']) && $result['image'] != null && $result['image'] != ''): ?>
                        <img src="<?php echo e($result['image']); ?>" width="auto" height="auto" class="img-fluid" alt="<?php echo e(isset($result['product_title']) ? $result['product_title'] : ''); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </section>

<?php if(empty($LiteratureFiles) && $LiteratureFiles == ""): ?>
    <?php if(isset($result['contents'])): ?>
        <?php if($result['contents'][0]['title'] != '-'): ?>
            <?php if(count($result['contents']) > 0): ?>
                <section class="sandk-common-padding sandk-common product-page-product-item-section <?php if(isset($result['product_slug']) && $result['product_slug']): ?> <?php echo e($result['product_slug']); ?>1 <?php endif; ?>">
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
                                    <?php
                                        $fullPath = Request::path();
                                        $resFeaturedesc = $result['feature_main_title'];
                    
                                        if ($fullPath === 'residential/advantage-series-steel-pan-garage-doors/trademark-steel-pan-garage-doors')
                                        {
                                            $find = 'residential garage doors';
                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/" >residential garage doors</a>';
                                            $resFeaturedesc = str_replace($find, $replace, $resFeaturedesc);
                                        }
                                        elseif ($fullPath === 'residential/distinctions-series-custom-garage-doors/eden-coast-steel-carriage-house-garage-door')
                                        {
                                            $find = '/\bgarage door\b/';
                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/">garage door</a>';
                                            $resFeaturedesc = preg_replace($find, $replace, $resFeaturedesc);
                                        }
                                        
                                    ?>
                                    <?php if(!empty($resFeaturedesc)): ?>
                                        <p><?php echo $resFeaturedesc; ?></p>
                                    <?php endif; ?>
                                   
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

                                                    <?php
                                                        $fullPath = Request::path();
                                                        $resFeInnerdesc = $fval['content'];
                                    
                                                        if ($fullPath === 'residential/distinctions-series-custom-garage-doors/eden-coast-steel-carriage-house-garage-door')
                                                        {
                                                            $find = 'residential garage door';
                                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                            $resFeInnerdesc = str_replace($find, $replace, $resFeInnerdesc);
                                                        }
                                                        
                                                    ?>
                                                    <?php if(!empty($resFeInnerdesc)): ?>
                                                        <p><?php echo $resFeInnerdesc; ?></p>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <?php
                                                        $fullPath = Request::path();
                                                        $resFeInnerdesc = $fval['content'];
                                    
                                                        if ($fullPath === 'residential/distinctions-series-custom-garage-doors/eden-coast-steel-carriage-house-garage-door')
                                                        {
                                                            $find = 'residential garage door';
                                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                            $resFeInnerdesc = str_replace($find, $replace, $resFeInnerdesc);
                                                        }
                                                        
                                                    ?>
                                                    <?php if(!empty($resFeInnerdesc)): ?>
                                                        <p><?php echo $resFeInnerdesc; ?></p>
                                                    <?php endif; ?>
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
                                                    <?php
                                                        $fullPath = Request::path();
                                                        $resFeInnerdesc = $fval['content'];
                                    
                                                        if ($fullPath === 'residential/distinctions-series-custom-garage-doors/eden-coast-steel-carriage-house-garage-door')
                                                        {
                                                            $find = 'residential garage door';
                                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                            $resFeInnerdesc = str_replace($find, $replace, $resFeInnerdesc);
                                                        }
                                                        
                                                    ?>
                                                    <?php if(!empty($resFeInnerdesc)): ?>
                                                        <p><?php echo $resFeInnerdesc; ?></p>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="no_img_div">
                                                <?php if(isset($fval['title']) && $fval['title']): ?>
                                                    <h3><?php echo e($fval['title']); ?></h3>
                                                <?php endif; ?>
                                                
                                                <?php if(isset($fval['content']) && $fval['content']): ?>
                                                    <?php
                                                        $fullPath = Request::path();
                                                        $resFeInnerdesc = $fval['content'];
                                    
                                                        if ($fullPath === 'residential/distinctions-series-custom-garage-doors/eden-coast-steel-carriage-house-garage-door')
                                                        {
                                                            $find = 'residential garage door';
                                                            $replace = '<a class="in-link" href="https://clarkandsonsdoors.com/residential/">residential garage door</a>';
                                                            $resFeInnerdesc = str_replace($find, $replace, $resFeInnerdesc);
                                                        }
                                                        
                                                    ?>
                                                    <?php if(!empty($resFeInnerdesc)): ?>
                                                        <p><?php echo $resFeInnerdesc; ?></p>
                                                    <?php endif; ?>
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
<?php echo $__env->make('frontend.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/frontend/product/residentialdetail.blade.php ENDPATH**/ ?>