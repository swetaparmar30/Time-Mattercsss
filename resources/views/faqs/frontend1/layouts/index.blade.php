<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(Request::is('/'))
        <title>@yield('title', 'Time Master Garage Doors')</title>
    @else
        <title>@yield('title', 'Time Master Garage Doors') - Time Master Garage Doors</title>
    @endif

    <meta name="description" content="@yield('description', ' ')"/>

    <?php
    $setting = App\Models\Setting::first();
    ?>
    @if(isset($setting->site_favicon) && $setting->site_favicon != "" && $setting->site_favicon != null)
        @php
            $favicon_name = App\Models\MediaImage::where('id' ,$setting->site_favicon)->first();
            if(isset($favicon_name) && $favicon_name != null)
            {
                $h_path = asset('uploads/' . $favicon_name->name);
            }else{
                $h_path = asset('front-assets/images/welcome-logo.png');
            }
        @endphp
        <link rel="icon" type="image/x-icon" href="{{$h_path}}">
    @else
        <link rel="icon" type="image/x-icon" href="{{$h_path}}">
    @endif
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="{{url()->current()}}"/>
    <!-- <link rel="preload" as="image" href="https://www.sandkdoor.com/uploads/66f28c8f9f2d7.webp" fetchpriority="high"/> -->
    <link rel="preload" as="image" href="https://sandkdoor.com/uploads/66f28c8f9f2d7.webp" imagesizes="(max-width: 575px) 575px, (max-width: 991px) 991px" fetchpriority="high" type="image/webp">
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/bootstrap.min.css') }}"/>
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/owl.carousel.min.css') }}"/>
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/owl.theme.default.min.css') }}"/>
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/magnific-popup.css') }}"/>
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/custom_container.css') }}"/>
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/main.css') }}"/>
    <!--<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />-->
    <link rel="preload" as="style" href="{{ asset('front-assets/src/css/font-awesome.min.css') }}">

    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/vendor/jquery.min.js')}}"/>

    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/vendor/bootstrap.bundle.min.js')}}"/>
    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/vendor/owl.carousel.min.js')}}"/>
    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/vendor/jquery.magnific-popup.min.js')}}"/>
    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/parsley.min.js')}}"/>
    <!--<link rel="preload" as="script" href="{{ asset('front-assets/src/js/jquery.inputmask.bundle.min.js')}}" />-->
    <!--<link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" />-->
    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/jquery.mask.js') }}"/>
    <link rel="preload" as="script" href="{{ asset('front-assets/src/js/script.js')}}"/>

    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner-image.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner1500.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner1300.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner1100.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner1100.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner992.webp')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('uploads/66829a6696be7.svg')}}" fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/mobile-open-bar.webp')}}" fetchpriority="high"/>
    
    <!--<link rel="preload" as="image" href="{{ asset('front-assets/src/images/banner786.webp')}}" fetchpriority="high"/>-->
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/desktop-form-bg.webp')}}"
          fetchpriority="high"/>
    <link rel="preload" as="image" href="{{ asset('front-assets/src/images/header-call-icon.webp')}}"
          fetchpriority="high"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
          rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" fetchpriority="high">
    <style>
        body {
            margin: 0;
            padding: 0;
            text-decoration: none;
            color: inherit;
            font-family: "Mulish", sans-serif;
            font-size: 18px;
        }

        .banner img, .banner .desk-banner-left-side {
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
        .year-of-excilence .left-side img{object-fit: cover;}

        @media (min-width: 576px) and (max-width: 667.98px) {
            .contact-page-banner-section .contact-info-section.mobile-contact-info-section{padding: 0 12px 0 55px!important;}
            .contact-page-banner-section .contact-info-section.mobile-contact-info-section .hours-section{padding-left: 0;margin-top: 30px;}
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

        }

        @media (min-width: 200px) and (max-width: 576px) {
            .banner .left-side h1 br{display: none;}
            .banner .left-side {
                position: absolute !important;
                top: 0;
                background: none !important;
            }

            .banner img {
                height: 415px !important;
            }

            .banner .left-side h1 {
                max-width: 310px;
            }

            .banner .left-side p {
                max-width: 400px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .banner .left-side h1 {
                max-width: 425px!important;
            }
        }

        /* @media (min-width: 1200px) and (max-width: 1500px) {
            .contact-page-banner-section .contact-info-section .hours-section {
                width: 50%!important;
            }
        } */
    </style>

    <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" media="print" onload="this.onload=null;this.removeAttribute('media');" fetchpriority="high">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap">
    </noscript>-->
    <link href="{{ asset('front-assets/src/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/src/css/owl.carousel.min.css') }}" rel="stylesheet" defer>
    <link href="{{ asset('front-assets/src/css/owl.theme.default.min.css') }}" rel="stylesheet" defer>
    <link href="{{ asset('front-assets/src/css/magnific-popup.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front-assets/src/css/custom_container.css') }}" defer>
    <link type="script" href="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js">
    <link rel="stylesheet" href="{{ asset('front-assets/src/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/src/css/font-awesome.min.css') }}" defer>

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
            bottom: 10px; /* Adjust as needed */
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            z-index: 30;
            transition: opacity 0.3s;
        }

        body {
            font-family: "Mulish", sans-serif;
        }
    </style>

    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-PXXEZLL9QF"></script>-->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-PXXEZLL9QF');
    </script>
</head>
<body style="visibility: hidden;">
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')

<script src="{{ asset('front-assets/src/js/vendor/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script src="{{ asset('front-assets/src/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('front-assets/src/js/vendor/owl.carousel.min.js')}}"></script>
<script src="{{ asset('front-assets/src/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('front-assets/src/js/parsley.min.js')}}" defer></script>
<!--<script type="module" src="{{ asset('front-assets/src/js/jquery.inputmask.bundle.min.js')}}"></script>-->
<!--<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>-->
<script src="{{ asset('front-assets/src/js/jquery.mask.js') }}" defer></script>
<script src="{{ asset('front-assets/src/js/script.js')}}"></script>

@yield('script')

<script>

    window.addEventListener('DOMContentLoaded', (event) => {
        let isGtagLoaded = false;

        function loadGtag() {
            if (!isGtagLoaded) {
                isGtagLoaded = true;
                var script = document.createElement('script');
                script.src = 'https://www.googletagmanager.com/gtag/js?id=G-PXXEZLL9QF';
                document.head.appendChild(script);
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());
                gtag('config', 'G-PXXEZLL9QF');
            }
        }

        window.addEventListener('scroll click', loadGtag, {once: true});
        // window.addEventListener('click', loadGtag, {once: true});
    });


    // Passive event listeners
    jQuery.event.special.touchstart = {
        setup: function (_, ns, handle) {
            this.addEventListener("touchstart", handle, {passive: !ns.includes("noPreventDefault")});
        }
    };
    jQuery.event.special.touchmove = {
        setup: function (_, ns, handle) {
            this.addEventListener("touchmove", handle, {passive: !ns.includes("noPreventDefault")});
        }
    };

    function preventBack() {
        $('.header-menu-mobile').removeClass('show');
    }

    // setTimeout("preventBack()", 0);
    //window.onunload=function(){null};
    //window.pagehide=function(){null};
    // window.addEventListener('unload', function () {
        // Add any cleanup logic here if needed
    // });


    $(document).ready(function () {
        if(window.innerWidth >= 767) {
            setTimeout(function () {
                $("body").css("visibility", "visible");
            }, 100);
        } else {
            $("body").css("visibility", "visible");
        }
        

        $('input[name="phone"]').mask('(000) 000-0000');

        $('#submit_form').on('click', function (e) {
            e.preventDefault();
            $('#contactForm').parsley().validate();
            grecaptcha.execute();
        });

        function onSubmit(token) {

            if ($('#contactForm').parsley().isValid()) {
                document.getElementById("contactForm").submit();
            }
        }
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
        }, 3000);
    });
    function loadReCaptcha() {
        if (!window.recaptchaLoaded) {  // Prevent multiple loads
            var head = document.getElementsByTagName('head')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://www.google.com/recaptcha/api.js';
            script.async = true;  // Load asynchronously
            head.appendChild(script);
            window.recaptchaLoaded = true;  // Set flag to avoid reloading
        }
    }


    $(document).ready(function () {
        var bottom = 0;
        var timer;
        var timeout = 2000; // Set inactivity period to 3 seconds (3000 milliseconds)

        function resetTimer() {
            clearTimeout(timer);

            if (bottom === 0) {  // Only show the arrow if not at the bottom
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

        $(document).on('mousemove keydown click scroll', function () {
            resetTimer();
        });

        $(window).scroll(function () {
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
</body>
</html>








