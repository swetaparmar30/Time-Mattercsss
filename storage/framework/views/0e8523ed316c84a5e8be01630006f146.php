<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <?php
        $slugExceptions = [
            'berlin.garagedoor',
            'bethany.garagedoor',
            'dewey.garagedoor',
            'fenwickIsland.garagedoor',
            'lewes.garagedoor',
            'oceanCity.garagedoor',
            'oceanPines.garagedoor',
            'rehobothBeach.garagedoor',
        ];
        $currentRoute = \Request::route() ? \Request::route()->getName() : null;
        $title = html_entity_decode(trim($__env->yieldContent('title', 'Time Master Garage Doors')));
        if ($currentRoute === 'front.single_blog_detail' && isset($article) && !empty($article->meta_title)) {
            $title = $article->meta_title;
        }
    ?>

    <?php if(Request::is('/') || $currentRoute == 'front.single_blog_detail' || in_array($currentRoute, $slugExceptions)): ?>
        <title><?php echo e($title); ?></title>
    <?php else: ?>
        <title><?php echo e($title); ?></title>
    <?php endif; ?>

    <meta name="description" content="<?php echo $__env->yieldContent('description', ' '); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', ' '); ?>">

    <?php
    $setting = App\Models\Setting::first();
    ?>
    <?php if(isset($setting->site_favicon) && $setting->site_favicon != '' && $setting->site_favicon != null): ?>
        <?php
            $favicon_name = App\Models\MediaImage::where('id', $setting->site_favicon)->first();
            if (isset($favicon_name) && $favicon_name != null) {
                $h_path = asset('uploads/' . $favicon_name->name);
            } else {
                $h_path = asset('front-assets/images/welcome-logo.png');
            }
        ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e($h_path); ?>">
    <?php else: ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e($h_path); ?>">
    <?php endif; ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PJGMK73T');
    </script>
    <!-- End Google Tag Manager →-->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16955521782"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-16955521782');
    </script>

    <!-- End Google Tag Manager -->

     <?php if(Request::is('thank-you')): ?>
    <meta name="robots" content="noindex">
    <?php else: ?>
    <meta name="robots" content="index, follow">
    <?php endif; ?>

    <meta name="p:domain_verify" content="9ef4218168f9a9549cb13eace74635f6" />
    <?php if(str_ends_with(url()->current(), '/') || url()->current() == url('/')): ?>
        <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <?php else: ?>
        <link rel="canonical" href="<?php echo e(url()->current()); ?>/" />
    <?php endif; ?>


    <link rel="preload" as="image" href="<?php echo e(asset('uploads/67ebedfdcb37d.webp')); ?>" fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('uploads/67d16b0342bc2.webp')); ?>" fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/home-page-banner1100.webp')); ?>"
        fetchpriority="high" />
    <!-- <link rel="preload" as="image" href="<?php echo e(asset('uploads/675aa5d5ab11f.webp')); ?>" fetchpriority="high"/> -->
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/banner1100.webp')); ?>"
        fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('uploads/67ca884f73e05.webp')); ?>" fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/get-a-free-quote-bg-image.webp')); ?>"
        fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/mobile-open-bar.webp')); ?>"
        fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/desktop-form-bg.webp')); ?>"
        fetchpriority="high" />
    <link rel="preload" as="image" href="<?php echo e(asset('front-assets/src/images/hollow-metal-doors-delaware.webp')); ?>"
        fetchpriority="high" />

    <!-- 05-08-2025 -->
    <link rel="preload" as="image" href="<?php echo e(asset('uploads/small/garage-door-installation-delaware.webp')); ?>"
        fetchpriority="high" />
    <!-- <link rel="preload" as="image" href="<?php echo e(asset('uploads/68480922ea745.webp')); ?>" fetchpriority="high"/> -->
    <link rel="preload" as="image" href="<?php echo e(asset('uploads/small/garage-door-company-delaware.webp')); ?>"
        fetchpriority="high" />

    <!-- new Preload -->
    <link rel="preload" as="image" href="<?php echo e(asset('uploads/garage-door-installation-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/src/images/garage-door-installation-and-replacement-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/src/images/garage-door-repairs-and-parts-replacement-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/src/images/garage-door-openers-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/src/images/garage-door-maintenance-and-service-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/src/images/garage-door-maintenance-and-service-delaware.webp')); ?>" />
    <link rel="preload" as="image"
        href="<?php echo e(asset('front-assets/front-assets/src/images/loading-dock-equipment-services-delaware.webp')); ?>" />

    <!-- new Preload -->

    <!-- Preload critical CSS files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&display=swap">
    <!-- Load font asynchronously -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&display=swap" rel="stylesheet"
        media="print" onload="this.onload=null;this.removeAttribute('media');">

    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/bootstrap.min.css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/owl.carousel.min.css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/owl.theme.default.min.css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/magnific-popup.css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/custom_container.css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/main.css')); ?>?v=1.2.8" />
    <link rel="preload" as="style" href="<?php echo e(url('/api-custom-css')); ?>" />
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/font-awesome.min.css')); ?>">
    <link rel="preload" as="style" href="<?php echo e(asset('front-assets/src/css/new-header.css')); ?>?v=0.0.2">

    <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/vendor/jquery.min.js')); ?>" />
    <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/vendor/bootstrap.bundle.min.js')); ?>" />
    <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/vendor/owl.carousel.min.js')); ?>" />
    <link rel="preload" as="script"
        href="<?php echo e(asset('front-assets/src/js/vendor/jquery.magnific-popup.min.js')); ?>" />
    <!-- <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/parsley.min.js')); ?>"/> -->
    <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/jquery.mask.js')); ?>" />
    <link rel="preload" as="script" href="<?php echo e(asset('front-assets/src/js/script.js')); ?>" />
    <link rel="preload" href="https://www.google.com/recaptcha/api.js" as="script">

    <style>
        body {
            margin: 0;
            padding: 0;
            text-decoration: none;
            color: inherit;
            font-family: "Mulish", sans-serif;
            font-size: 18px;
        }

        .banner img,
        .banner .desk-banner-left-side {
            display: block !important;
        }

        .banner .mobile-banner-left-side {
            display: none;
        }

        /*    Home Page Gallery Section*/
        .photo-gallery-sec .left-side-image figure:first-child img.normal-img,
        .photo-gallery-sec .right-side-image figure:last-child img.normal-img {
            aspect-ratio: 2;
        }

        .photo-gallery-sec .left-side-image figure:nth-child(2) img.normal-img,
        .photo-gallery-sec .right-side-image figure:nth-child(1) img.normal-img {
            aspect-ratio: 1.5;
        }

        .photo-gallery-sec img.normal-img {
            object-fit: cover;
        }

        .photo-gallery-sec .other-images img.normal-img {
            aspect-ratio: 1.5;
        }

        .year-of-excilence .left-side img {
            object-fit: cover;
        }

        .product-page-product-item-section .image-and-title.revival-wood-collection .col-3 {
            margin-bottom: 30px;
        }

        .product-page-product-item-section .inner-row.revival-wood-notes {
            margin-top: 0;
        }

        .product-page-product-item-section .image-and-title h2.optional-h2-color {
            font-size: 30px !important;
            line-height: 45px !important;
            text-align: left;
        }

        .product-page-product-item-section .image-and-title.revival-wood-collection .col-3 {
            margin-bottom: 30px;
        }

        .product-page-product-item-section .inner-row.revival-wood-notes {
            margin-top: 0;
        }

        .product-page-product-item-section .image-and-title h2.optional-h2-color::after {
            margin-left: 0 !important;
        }

        .get-free-quote-sec h2 {
            color: #fff !important;
            font-size: 42px;
            line-height: 50px;
        }

        .design-center-sec {
            background-color: #F1F1F1;
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .banner .left-side {
                position: absolute !important;
                top: 0;
                background: none !important;
            }

            .banner img {
                height: 320px !important;
            }

            .product-page-banner-section h1 br.distinctions {
                display: none;
            }

        }

        @media (min-width: 200px) and (max-width: 576px) {
            .banner .left-side h1 br {
                display: none;
            }

            .banner .left-side {
                position: absolute !important;
                top: 0;
                background: none !important;
            }

            .banner img {
                height: 415px !important;
            }

            .banner .left-side h1 {
                max-width: 340px;
            }

            .banner .left-side p {
                /* max-width: 400px; */
            }
        }

        @media (min-width: 992px) and (max-width: 1199.98px) {
            .banner .left-side h1 {
                max-width: 425px !important;
            }
        }
    </style>
    <?php if(Request::is('/')): ?>
        <style>
            @media (min-width: 1201px) and (max-width: 1499.98px) {
                .year-of-excilence .right-side h2 {
                    max-width: 450px !important;
                }

                .banner .left-side p {
                    max-width: 600px !important;
                }
            }

            @media (min-width: 768px) and (max-width: 991.98px) {
                .year-of-excilence .right-side h2 {
                    max-width: 445px !important;
                }
            }

            @media (max-width: 575.98px) {
                .banner .left-side p {
                    max-width: 325px !important;
                }
            }

            @media (min-width: 575.98px) and (max-width: 767.98px) {
                .banner .left-side p {
                    max-width: 640px !important;
                }
            }
        </style>
    <?php endif; ?>

    <link href="<?php echo e(asset('front-assets/src/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front-assets/src/css/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front-assets/src/css/owl.theme.default.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front-assets/src/css/magnific-popup.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/custom_container.css')); ?>">
    <link type="script" href="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/main.css')); ?>?v=1.2.8">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/new-model.css')); ?>?v=0.0.2">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/hollowmetal.css')); ?>?v=1.1.3">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/new-header.css')); ?>?v=0.0.2">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/api-custom-css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front-assets/src/css/font-awesome.min.css')); ?>">

    <style type="text/css">
        .banner .banner-content {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
        }

        .banner .right-side h2 {
            font-size: 60px;
            line-height: 80px;
            font-weight: 800;
            color: #fff;
            text-align: center;
            margin-bottom: 55px;
        }

        .arrow {
            position: fixed;
            bottom: 10px;
            /* Adjust as needed */
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            z-index: 30;
            transition: opacity 0.3s;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-9K0KQKFBV7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9K0KQKFBV7');
    </script>
    <?php if(
        !Request::is('locations/georgetown-garage-doors') &&
            !Request::is('locations/dover-garage-doors') &&
            !Request::is('locations/salisbury-garage-doors') &&
            !Request::is('locations/newport-garage-doors')): ?>
        <!-- new schema add-->
        <script type='application/ld+json'> 
            {
            "@context": "http://www.schema.org",
            "@type": "Organization",
            "name": "Time Master, Inc.",
            "url": "https://clarkandsonsdoors.com/",
            "logo": "https://clarkandsonsdoors.com/uploads/67aee3b5e1450.png",
            "image": "https://clarkandsonsdoors.com/uploads/675aa559e445f.webp",
            "description": "Clark & Sons, Inc. is Delaware’s oldest private, family-owned garage door company. With over 60 years of experience, we specialize in selling and servicing industry-leading residential and commercial garage door products.",
            "pricerange": "$$$",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "314 E Ayre Street",
            "addressLocality": "Newport",
            "addressRegion": "DE",
            "postalCode": "19804",
            "addressCountry": "United States",
            "telephone": "+1 (302) 998-7552",
            "email": "sales@clarkandsonsdoors.com",
            "sameAs": [
            "https://www.facebook.com/Clarkandsonsdoors",
            "https://x.com/clarkandsonsinc",
            "https://www.pinterest.com/clarkandsonsdoors/",
            "https://www.linkedin.com/company/clark-and-sons/",
            "https://www.instagram.com/clarkandsonsgaragedoors/",
            "https://www.youtube.com/@clarkandsons",
            "https://clarkandsons.weebly.com/",
            "https://clarkandsons.tumblr.com/",
            "https://clarkandsons.mystrikingly.com/",
            "https://www.reddit.com/user/clarkandsonsdoors/",
            "https://flipboard.com/@ClarkandSonsInc?from=share&utm_source=flipboard&utm_medium=curator_share",
            "https://padlet.com/clarkandsons",
            "https://www.slideshare.net/clarkandsonsnewport",
            "https://www.4shared.com/u/5kbrN36I/clarkandsonsnewport.html",
            "https://imageshack.com/user/clarkandsons",
            "https://www.deviantart.com/clarkandsons",
            "https://imgur.com/user/clarkandsons",
            "https://500px.com/p/clarkandsons",
            "https://www.dailymotion.com/clarkandsons",
            "https://rumble.com/user/clarkandsonsdoors"
            ] 
            },
            "geo": {
            "@type": "GeoCoordinates",
            "latitude": "39.7130812",
            "longitude": "-75.6041173"
            },
            "hasMap": "https://www.google.com/maps?cid=8195650903324477361",
            "openingHours": "Mo, Tu, We, Th, Fr 07:30-16:30"
            }
        </script>

        <!--Review snippet -->

        <script type='application/ld+json'>
        {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "Time Master, Inc. ",
        "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "94",
        "reviewCount": "94"
        }
        }
        </script>
    <?php endif; ?>

    
    <?php if(Request::is('locations/newport-garage-doors')): ?>
        <!-- new schema -->
        <script type='application/ld+json'> 
        {
        "@context": "http://www.schema.org",
        "@type": "HomeAndConstructionBusiness",
        "name": "Time Master, Inc.",
        "url": "https://clarkandsonsdoors.com/locations/newport-garage-doors/",
        "logo": "https://clarkandsonsdoors.com/uploads/67ebedfdcb37d.webp",
        "image": "https://clarkandsonsdoors.com/uploads/675aa559e445f.webp",
        "description": "Clark & Sons, Inc. is Newport’s oldest private, family-owned garage door company. With over 60 years of experience, we specialize in selling and servicing industry-leading residential and commercial garage door products.",
        "pricerange": "$$$",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "314 E Ayre Street",
        "addressLocality": "Newport",
        "addressRegion": "DE",
        "postalCode": "19804",
        "addressCountry": "United States",
        "telephone": "+1 (302) 998-7552",
        "email": "sales@clarkandsonsdoors.com",
        "sameAs": [
        "https://www.facebook.com/Clarkandsonsdoors",
        "https://x.com/clarkandsonsinc",
        "https://www.pinterest.com/clarkandsonsdoors/",
        "https://www.linkedin.com/company/clark-and-sons/",
        "https://www.instagram.com/clarkandsonsgaragedoors/",
        "https://www.youtube.com/@clarkandsons",
        "https://clarkandsons.weebly.com/",
        "https://clarkandsons.tumblr.com/",
        "https://clarkandsons.mystrikingly.com/",
        "https://www.reddit.com/user/clarkandsonsdoors/",
        "https://flipboard.com/@ClarkandSonsInc?from=share&utm_source=flipboard&utm_medium=curator_share",
        "https://padlet.com/clarkandsons",
        "https://www.slideshare.net/clarkandsonsnewport",
        "https://www.4shared.com/u/5kbrN36I/clarkandsonsnewport.html",
        "https://imageshack.com/user/clarkandsons",
        "https://www.deviantart.com/clarkandsons",
        "https://imgur.com/user/clarkandsons",
        "https://500px.com/p/clarkandsons",
        "https://www.dailymotion.com/clarkandsons",
        "https://rumble.com/user/clarkandsonsdoors"
        ] 
        },
        "geo": {
        "@type": "GeoCoordinates",
        "latitude": "39.7130812",
        "longitude": "-75.6041173"
        },
        "hasMap": "https://www.google.com/maps?cid=8195650903324477361",
        "openingHours": "Mo, Tu, We, Th, Fr 07:30-16:30"
        }
        </script>

        <!--Review snippet -->
        <script type='application/ld+json'>
        {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "Time Master, Inc. ",
        "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "94",
        "reviewCount": "94"
        }
        }
</script>
    <?php endif; ?>

    
    <?php if(Request::is('locations/dover-garage-doors')): ?>
        <!-- new schema -->
        <!-- new schema -->
        <script type='application/ld+json'> 
    {
    "@context": "http://www.schema.org",
    "@type": "HomeAndConstructionBusiness",
    "name": "Time Master, Inc.",
    "url": "https://clarkandsonsdoors.com/locations/dover-garage-doors/",
    "logo": "https://clarkandsonsdoors.com/uploads/67ebedfdcb37d.webp",
    "image": "https://clarkandsonsdoors.com/uploads/675aa559e445f.webp",
    "description": "Clark & Sons, Inc. is Dover’s oldest private, family-owned garage door company. With over 60 years of experience, we specialize in selling and servicing industry-leading residential and commercial garage door products.",
    "pricerange": "$$$",
    "address": {
    "@type": "PostalAddress",
    "streetAddress": "1058 S. Little Creek Road",
    "addressLocality": "Dover",
    "addressRegion": "DE",
    "postalCode": "19901",
    "addressCountry": "United States",
    "telephone": "+1 (302) 734-4211",
    "email": "sales@clarkandsonsdoors.com",
    "sameAs": [
    "https://www.facebook.com/Clarkandsonsdoors",
    "https://x.com/clarkandsonsinc",
    "https://www.pinterest.com/clarkandsonsdoors/",
    "https://www.linkedin.com/company/clark-and-sons/",
    "https://www.instagram.com/clarkandsonsgaragedoors/",
    "https://www.youtube.com/@clarkandsons",
    "https://clarkandsons.blogspot.com/",
    "https://clarkandsons.weebly.com/",
    "https://clarkandsons.tumblr.com/",
    "https://clarkandsons.mystrikingly.com/",
    "https://www.reddit.com/user/clarkandsonsdoors/",
    "https://flipboard.com/@ClarkandSonsInc?from=share&utm_source=flipboard&utm_medium=curator_share",
    "https://padlet.com/clarkandsons",
    "https://www.slideshare.net/clarkandsonsnewport",
    "https://www.4shared.com/u/5kbrN36I/clarkandsonsnewport.html",
    "https://imageshack.com/user/clarkandsons",
    "https://www.deviantart.com/clarkandsons",
    "https://imgur.com/user/clarkandsons",
    "https://500px.com/p/clarkandsons",
    "https://www.dailymotion.com/clarkandsons",
    "https://rumble.com/user/clarkandsonsdoors"
    ] 
    },
    "geo": {
    "@type": "GeoCoordinates",
    "latitude": "39.1568413",
    "longitude": "-75.4984088"
    },
    "hasMap": "https://www.google.com/maps?cid=8693348765776153128",
    "openingHours": "Mo, Tu, We, Th, Fr 07:30-16:30"
    }
    </script>
        <!--Review snippet -->
        <script type='application/ld+json'>
{
"@context": "https://schema.org",
"@type": "Product",
"name": "Time Master, Inc. ",
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "4.8",
"ratingCount": "94",
"reviewCount": "94"
}
}
</script>
    <?php endif; ?>

    
    <?php if(Request::is('locations/georgetown-garage-doors')): ?>
        <script type='application/ld+json'> 
        {
        "@context": "http://www.schema.org",
        "@type": "HomeAndConstructionBusiness",
        "name": "Time Master, Inc.",
        "url": "https://clarkandsonsdoors.com/locations/georgetown-garage-doors/",
        "logo": "https://clarkandsonsdoors.com/uploads/67ebedfdcb37d.webp",
        "image": "https://clarkandsonsdoors.com/uploads/garage-door-installation-georgetown.webp",
        "description": "Clark & Sons, Inc. is Georgetown’s oldest private, family-owned garage door company. With over 60 years of experience, we specialize in selling and servicing industry-leading residential and commercial garage door products.",
        "pricerange": "$$$",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "500 W. Market Street",
        "addressLocality": "Georgetown",
        "addressRegion": "DE",
        "postalCode": "19947",
        "addressCountry": "United States",
        "telephone": "+1 (302) 856-3372",
        "email": "sales@clarkandsonsdoors.com",
        "sameAs": [
        "https://www.facebook.com/Clarkandsonsdoors",
        "https://x.com/clarkandsonsinc",
        "https://www.pinterest.com/clarkandsonsdoors/",
        "https://www.linkedin.com/company/clark-and-sons/",
        "https://www.instagram.com/clarkandsonsgaragedoors/",
        "https://www.youtube.com/@clarkandsons",
        "https://clarkandsons.weebly.com/",
        "https://clarkandsons.tumblr.com/",
        "https://clarkandsons.mystrikingly.com/",
        "https://www.reddit.com/user/clarkandsonsdoors/",
        "https://flipboard.com/@ClarkandSonsInc?from=share&utm_source=flipboard&utm_medium=curator_share",
        "https://padlet.com/clarkandsons",
        "https://www.slideshare.net/clarkandsonsnewport",
        "https://www.4shared.com/u/5kbrN36I/clarkandsonsnewport.html",
        "https://imageshack.com/user/clarkandsons",
        "https://www.deviantart.com/clarkandsons",
        "https://imgur.com/user/clarkandsons",
        "https://500px.com/p/clarkandsons",
        "https://www.dailymotion.com/clarkandsons",
        "https://rumble.com/user/clarkandsonsdoors",
        "https://maps.apple/p/oS~dLdmaw-fSFR",
        "https://www.bbb.org/us/de/georgetown/profile/garage-doors/clark-sons-inc-0251-1471001/addressId/7364",
        "https://www.mapquest.com/us/delaware/clark-and-sons-2438996",
        "https://www.manta.com/c/mmgpntz/clark-sons-inc",
        "https://www.yelp.com/biz/clark-and-sons-georgetown",
        "https://www.yellowpages.com/georgetown-de/mip/clark-and-sons-16089349",
        "https://www.storeboard.com/clarkandsonsinc1",
        "https://www.brownbook.net/business/50972373/clark-and-sons-inc",
        "https://local.us-info.com/USDE100030276-3028563372/clark_sons-georgetown.html",
        "https://www.cybo.com/US-img/clark-and-sons-inc_33#f0564ed86158594abcc0c8ce4eb172b0",
        "https://www.hotfrog.com/company/1098865095483392/clark-and-sons-inc/georgetown/doors",
        "https://ezlocal.com/de/georgetown/garage-door-supplier/092942602",
        "https://local-listings.data-axle.com/places/HZS5JW2R",
        "https://us.enrollbusiness.com/BusinessProfile/4835059/Clark-and-Sons-Georgetown-DE-19947",
        "https://www.neustarlocaleze.biz/directory/us/de/georgetown/clark-sons-inc/43055717/",
        "https://citysquares.com/b/clark-and-sons-inc-26334245",
        "https://www.acompio.us/Clark-Sons-21057865.html",
        "https://localstack.com/biz/clark-and-sons-georgetown-de/716504",
        "https://local.us-info.com/USDE100030276-3028563372/clark_sons-georgetown.html",
        "https://verview.com/biz/10065435-clark-and-sons-inc-georgetown-delaware",
        "https://ezlocal.com/de/georgetown/garage-door-supplier/092942602",
        "https://www.showmelocal.com/profile.aspx?bid=9973333",
        "https://www.cybo.com/US-img/clark-and-sons-inc_33/",
        "https://www.a-zbusinessfinder.com/business-directory/Clark-and-Sons-Inc-Georgetown-Delaware-USA/34314221/",
        "http://www.askmap.net/location/7483100/usa/clark-and-sons-inc.",
        "https://www.chamberofcommerce.com/business-directory/delaware/georgetown/garage-door-supplier/2001507726-clark-sons-inc"
        ] 
        },
        "geo": {
        "@type": "GeoCoordinates",
        "latitude": "38.684519",
        "longitude": "-75.3929289"
        },
        "hasMap": "https://www.google.com/maps?cid=5172322489357789584",
        "openingHours": "Mo, Tu, We, Th, Fr 07:30-16:30"
        }
        </script>
        
        <script type='application/ld+json'>
        {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "Time Master, Inc. ",
        "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "ratingCount": "94",
        "reviewCount": "94"
        }
        }
        </script>
    <?php endif; ?>

    
    <?php if(Request::is('locations/salisbury-garage-doors')): ?>
        
        <script type='application/ld+json'> 
            {
            "@context": "http://www.schema.org",
            "@type": "HomeAndConstructionBusiness",
            "name": "Time Master, Inc.",
            "url": "https://clarkandsonsdoors.com/locations/salisbury-garage-doors/",
            "logo": "https://clarkandsonsdoors.com/uploads/67ebedfdcb37d.webp",
            "image": "https://clarkandsonsdoors.com/uploads/garage-door-installation-salisbury.webp",
            "description": "Clark & Sons, Inc. is Salisbury’s oldest private, family-owned garage door company. With over 60 years of experience, we specialize in selling and servicing industry-leading residential and commercial garage door products.",
            "pricerange": "$$$",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "1819 Northwood Drive",
            "addressLocality": "Salisbury",
            "addressRegion": "MD",
            "postalCode": "21801",
            "addressCountry": "United States",
            "telephone": "+1 (410) 749-7436",
            "email": "sales@clarkandsonsdoors.com",
            "sameAs": [
            "https://www.facebook.com/Clarkandsonsdoors",
            "https://x.com/clarkandsonsinc",
            "https://www.pinterest.com/clarkandsonsdoors/",
            "https://www.linkedin.com/company/clark-and-sons/",
            "https://www.instagram.com/clarkandsonsgaragedoors/",
            "https://www.youtube.com/@clarkandsons",
            "https://clarkandsons.weebly.com/",
            "https://clarkandsons.tumblr.com/",
            "https://clarkandsons.mystrikingly.com/",
            "https://www.reddit.com/user/clarkandsonsdoors/",
            "https://flipboard.com/@ClarkandSonsInc?from=share&utm_source=flipboard&utm_medium=curator_share",
            "https://padlet.com/clarkandsons",
            "https://www.slideshare.net/clarkandsonsnewport",
            "https://www.4shared.com/u/5kbrN36I/clarkandsonsnewport.html",
            "https://imageshack.com/user/clarkandsons",
            "https://www.deviantart.com/clarkandsons",
            "https://imgur.com/user/clarkandsons",
            "https://500px.com/p/clarkandsons",
            "https://www.dailymotion.com/clarkandsons",
            "https://rumble.com/user/clarkandsonsdoors",
            "https://www.yellowpages.com/salisbury-md/mip/clark-sons-inc-456159980",
            "https://www.superpages.com/salisbury-md/bpp/clark-sons-inc-456159980",
            "https://www.mapquest.com/us/maryland/clark-sons-inc-2725499",
            "https://nextdoor.com/pages/clark-sons-salisbury-md/",
            "https://network.procore.com/p/clark-and-sons-inc-salisbury",
            "https://www.mapquest.com/us/maryland/clark-sons-inc-2725499",
            "https://local.us-info.com/USMD100059969-4107497436/clark_sons-salisbury.html",
            "https://localstack.com/biz/clark-and-sons-salisbury-md/1519683",
            "https://www.manta.com/c/mm223j1/clark-sons-inc",
            "https://start.cortera.com/company/research/k3o4pyj5l/clark--sons-inc/",
            "https://www.brownbook.net/business/51989834/clark-sons-inc",
            "https://www.chamberofcommerce.com/business-directory/maryland/salisbury/garage-door-supplier/2004574318-clark-sons-inc",
            "https://local-listings.data-axle.com/places/WI7EBRCI",
            "https://www.cybo.com/US-biz/clark-sons-inc_1o",
            "https://local-listings.data-axle.com/places/WI7EBRCI",
            "https://verview.com/biz/10065437-clark-and-sons-inc-salisbury-maryland",
            "https://ezlocal.com/md/salisbury/doors-retail/096727536",
            "https://www.storeboard.com/clarkandsonsinc5",
            "https://us.enrollbusiness.com/BusinessProfile/7311488/Clark-and-Sons-Inc-Salisbury-MD-21801/",
            "https://www.hotfrog.com/company/98f96f371a415af47c410e19709849b3/clark-and-sons-inc/salisbury/manufacturing",
            "https://www.callupcontact.com/b/businessprofile/Clark_and_Sons_Inc/9714651",
            "https://www.a-zbusinessfinder.com/business-directory/Clark-and-Sons-Inc-Salisbury-Maryland-USA/34314238/",
            "https://www.find-us-here.com/businesses/Clark-and-Sons-Inc-Salisbury-Maryland-USA/34314238/",
            "http://www.askmap.net/location/7483206/usa/clark-and-sons-inc.",
            "https://www.acompio.us/Clark+and+Sons%2C+Inc.-47486193.html",
            "https://www.neustarlocaleze.biz/directory/us/md/salisbury/clark-sons-inc/50360739/",
            "https://www.bbb.org/us/md/salisbury/profile/garage-doors/clark-sons-inc-0251-1471001/addressId/7365",
            "https://www.merchantcircle.com/clark-sons-salisbury-md",
            "https://www.freelistingusa.com/listings/clark-and-sons-inc-1"
            ] 
            },
            "geo": {
            "@type": "GeoCoordinates",
            "latitude": "38.3886285",
            "longitude": "-75.5844727"
            },
            "hasMap": "https://www.google.com/maps?cid=619540656691602355",
            "openingHours": "Mo, Tu, We, Th, Fr 07:30-16:30"
            }
            </script>
        
        <script type='application/ld+json'>
            {
            "@context": "https://schema.org",
            "@type": "Product",
            "name": "Time Master, Inc. ",
            "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.8",
            "ratingCount": "94",
            "reviewCount": "94"
            }
            }
            </script>
    <?php endif; ?>




    <!-- <script defer>
        var _mtm = window._mtm = window._mtm || [];
        _mtm.push({
            'mtm.startTime': (new Date().getTime()),
            'event': 'mtm.Start'
        });
        (function() {
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.async = true;
            g.src = 'https://cdn.matomo.cloud/logikdigital.matomo.cloud/container_zzCv7Dxd.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script> -->
    <!-- End Matomo Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJGMK73T" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php echo $__env->make('frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('front-assets/src/js/vendor/jquery.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/vendor/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/jquery.mask.js')); ?>"></script>
    <script src="<?php echo e(asset('front-assets/src/js/script.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
   

    <script>
        let parentFormId;


        // Passive event listeners
        jQuery.event.special.touchstart = {
            setup: function(_, ns, handle) {
                this.addEventListener("touchstart", handle, {
                    passive: !ns.includes("noPreventDefault")
                });
            }
        };
        jQuery.event.special.touchmove = {
            setup: function(_, ns, handle) {
                this.addEventListener("touchmove", handle, {
                    passive: !ns.includes("noPreventDefault")
                });
            }
        };
        jQuery.event.special.wheel = {
            setup: function(_, ns, handle) {
                this.addEventListener("wheel", handle, {
                    passive: true
                });
            }
        };
        jQuery.event.special.mousewheel = {
            setup: function(_, ns, handle) {
                this.addEventListener("mousewheel", handle, {
                    passive: true
                });
            }
        };


        $(window).on('beforeunload', function() {
            // Remove active class from the section on the first page
            $('.header-menu-mobile').removeClass('show');
        });
        if (window.location.href === window.location.origin) {
            // Set initial state to hidden for the mobile menu and submenus
            $('.header-menu-mobile').removeClass('show'); // Close the mobile menu
            $('.header-menu-mobile .dropdown-menu').removeClass('active active-sub'); // Close all submenus
        }


        // Handle page unload events to remove the class before leaving
        $(window).on('pagehide', function() {
            // Remove the 'show' class and close any open submenus when navigating away
            $('.header-menu-mobile').removeClass('show');
            $('.header-menu-mobile .dropdown-menu').removeClass('active active-sub');
        });
        // Reset mobile menu and submenus to closed state when the page reloads
        $(window).on('load', function() {
            $('.header-menu-mobile').removeClass('show'); // Ensures menu is closed after page reload
            $('.header-menu-mobile .dropdown-menu').removeClass(
                'active active-sub'); // Ensures all submenus are closed
        });

        //Does not use passive listeners to improve scrolling performance
        document.addEventListener('DOMContentLoaded', function() {
            var owlElements = document.querySelectorAll('.carousel');
            owlElements.forEach(function(owl) {
                owl.addEventListener('touchstart', function() {}, {
                    passive: true
                });
                owl.addEventListener('wheel', function() {}, {
                    passive: true
                });
            });
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     var quoteSection = document.querySelector('.get-free-quote-sec');
        //     var observer = new IntersectionObserver(function(entries, observer) {
        //         entries.forEach(function(entry) {
        //             if (entry.isIntersecting) {
        //                 quoteSection.style.backgroundImage = "url('front-assets/src/images/get-a-free-quote-bg-image.webp')";
        //                 observer.unobserve(entry.target);
        //             }
        //         });
        //     }, {
        //         rootMargin: '100px'
        //     });
        //     observer.observe(quoteSection);
        // });

        // function preventBack() {
        //     $('.header-menu-mobile').removeClass('show');
        // }

        // setTimeout("preventBack()", 0); 
        // window.onunload=function(){null};

        // setTimeout("preventBack()", 0);
        //window.onunload=function(){null};
        //window.pagehide=function(){null};
        // window.addEventListener('unload', function () {
        // Add any cleanup logic here if needed
        // });


        $(document).ready(function() {
            // if(window.innerWidth >= 767) {
            //     setTimeout(function () {
            //         $("body").css("visibility", "visible");
            //     }, 50);
            // } else {
            //     $("body").css("visibility", "visible");
            // }


            $('input[name="phone"]').mask('(000) 000-0000');

        });

        // $(window).on('load', function () {

        //     setTimeout(function () {
        //         reCaptchaOnFocus2();
        //     }, 3000);

        // });

        // function reCaptchaOnFocus2() {
        //     var head = document.getElementsByTagName('head')[0]
        //     var script = document.createElement('script')
        //     script.type = 'text/javascript';
        //     script.src = 'https://www.google.com/recaptcha/api.js'
        //     head.appendChild(script);
        // };

        $(window).on('load', function() {
            setTimeout(function() {
                loadReCaptcha();
                loadMatomo();
            }, 6000);
        });

        function loadReCaptcha() {
            if (!window.recaptchaLoaded) { // Prevent multiple loads
                var head = document.getElementsByTagName('head')[0];
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://www.google.com/recaptcha/api.js';
                script.async = true; // Load asynchronously
                script.defer = true;
                head.appendChild(script);
                window.recaptchaLoaded = true; // Set flag to avoid reloading
            }
        }

        // Matomo Tag Manager
        function loadMatomo() {
            if (!window.matomoLoaded) {
                var matomoScript = document.createElement("script");
                matomoScript.src = "https://cdn.matomo.cloud/logikdigital.matomo.cloud/container_zzCv7Dxd.js";
                matomoScript.async = true;
                document.head.appendChild(matomoScript);
                window.matomoLoaded = true;
            }
        }

        $('.submit_form').on('click', function(e) {
            e.preventDefault();
            parentFormId = $(this).closest('form').attr('id');
            if (parentFormId) {
                $(`#${parentFormId}`).parsley().validate();
            }
            grecaptcha.execute();
        });

        function onSubmit(token) {
            if ($(`#${parentFormId}`).parsley().isValid()) {
                if (parentFormId == "ContactFormMobile") {
                    $("#mobileRecaptchaToken").val(token);
                }
                if (parentFormId == "ContactFormModel") {
                    $("#modelRecaptchaToken").val(token);
                }
                document.getElementById(parentFormId).submit();
                parentFormId = '';
            }
        }

         $(document).ready(function() {

            $('#getafreequote').on('hidden.bs.modal', function() {
                // Reset form fields
                $('#ContactFormModel')[0].reset();
                $('#ContactFormMobile')[0].reset();

                // Reset parsley validation
                $('#ContactFormModel').parsley().reset();
                $('#ContactFormMobile').parsley().reset();
            });

        });

        $(document).ready(function() {
            var bottom = 0;
            var timer;
            var timeout = 2000; // Set inactivity period to 3 seconds (3000 milliseconds)

            function resetTimer() {
                clearTimeout(timer);

                if (bottom === 0) { // Only show the arrow if not at the bottom
                    $(".arrow").css('opacity', '0');
                    timer = setTimeout(onInactivity, timeout);
                } else {
                    $(".arrow").css('opacity', '0'); // Ensure the arrow is hidden at the bottom
                }
            }

            function onInactivity() {
                if (bottom === 0) {
                    $(".arrow").css('opacity', '1');
                }
            }

            $(document).on('mousemove keydown click scroll', function() {
                resetTimer();
            });

            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    bottom = 1; // User is at the bottom
                    $(".arrow").css('opacity', '0'); // Hide the arrow when at the bottom
                } else {
                    bottom = 0; // User is not at the bottom
                }
                resetTimer();
            });

            // Initial check
            resetTimer();
        });
    </script>
    <?php if(request()->segment(2) !== 'openers'): ?>
        <div class="img-popup1">
            <span class="close-btn">&times;</span>
            <a href="#" target="_blank">
                <img src="" alt="Popup Image">
            </a>
        </div>
        <script>
            $(document).ready(function() {

                var imgPopup = $('.img-popup1');
                var popupImage = $('.img-popup1 img');
                var popupLink = $('.img-popup1 a');
                var closeBtn = $('.img-popup1 .close-btn');

                $('#tab0 img, #tab1 img, #tabcl0 img, #tabcl1 img').on('click', function() {
                    var img_src = $(this).attr('src');
                    popupImage.attr('src', img_src);
                    popupLink.attr('href', img_src);
                    imgPopup.addClass('opened');
                });

                imgPopup.on('click', function() {
                    imgPopup.removeClass('opened');
                    popupImage.attr('src', '');
                    popupLink.attr('href', '#');
                });

                popupImage.on('click', function(e) {
                    e.stopPropagation();
                });

                closeBtn.on('click', function() {
                    imgPopup.removeClass('opened');
                    popupImage.attr('src', '');
                    popupLink.attr('href', '#');
                });
            });

       
        </script>
    <?php endif; ?>
<!-- 
<script>
$(document).ready(function(){
  $(".timeline-carousel").owlCarousel({
    items: 1,
    loop: false,
    margin: 15,
    nav: true,
    dots: true,
    navText: ["‹","›"],
    responsive:{
      768:{
        items: 2
      },
      1024:{
        items: 3
      }
    }
  });
});
</script> -->






</body>

</html>
<?php /**PATH C:\xampp\htdocs\admin-laravel\resources\views/frontend/layouts/index.blade.php ENDPATH**/ ?>