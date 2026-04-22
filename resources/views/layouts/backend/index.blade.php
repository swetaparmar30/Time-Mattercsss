<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="TimeMatters Inc.">
    <meta name="author" content="TimeMatters Inc.">
    <meta name="keyword" content="TimeMatters Inc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keyword" content="TimeMatters Inc.">
    <title>TimeMatters Inc.</title>
    @php
        $setting = App\Models\Setting::first();
        if (isset($setting)) {
            $img = App\Models\MediaImage::select('name')->where('id', $setting->site_favicon)->first();
        }
    @endphp
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    @if (isset($img->name) && $img->name != '')
        <link rel="icon" type="image/x-icon" href="{{ asset('uploads/' . $img->name) }}">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    {{-- <link href="{{ asset('css/examples.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- <link href="{{ asset('css/jquery.toastr.min.css') }}" type="text/css" rel="stylesheet"> -->


    <link href="{{ asset('vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    {{-- <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/chart-morris/css/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/rich-text-editor.css')}}" id="main-style-link">


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link href="{{ asset('css/summernote.css') }}" rel="stylesheet"> -->

    <script type="text/javascript">
        var admin_url = "{{ url('/') }}/admin/";
    </script>

    <script>
        var BASE_URL = '{{ url('/') }}';
    </script>
    <style>
        .parsley-errors-list {
            color: red;
            list-style-type: none;
            padding: 10px 0 0 !important;
        }

        .add-article .card-block label.hm-choose-img-title {
            color: #31974d;
        }
    </style>
    @yield('custom_css')
</head>

<body>
    @include('layouts.backend.sidebar')

    {{-- <div class="wrapper d-flex flex-column min-vh-100 bg-light"> --}}


    @include('layouts.backend.navbar')
    <div class="pcoded-main-container">
        @yield('main_content')

        @include('layouts.backend.mediamodal')
        <div>

            @include('layouts.backend.footer')


            {{-- </div> --}}
            <!-- CoreUI and necessary plugins-->

            <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

            {{-- <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --> --}}
            {{-- <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script> --}}


            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script> -->
            <script src="{{ asset('js/sweetalert/sweetalert2.all.min.js') }}"></script>
            <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
            <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
            <!-- Plugins and scripts required by this view-->
            <script src="{{ asset('vendors/chart.js/js/chart.min.js') }}"></script>
            <script src="{{ asset('vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
            <script src="{{ asset('vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
            <script src="{{ asset('js/main.js') }}"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <!-- <script src="{{ asset('js/toastr/toastr.min.js') }}"></script> -->
            <script src="{{ asset('js/inputmask/inputmask.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
            {{-- <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script> --}}
            <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
                integrity="sha512-cJMgI2OtiquRH4L9u+WQW+mz828vmdp9ljOcm/vKTQ7+ydQUktrPVewlykMgozPP+NUBbHdeifE6iJ6UVjNw5Q=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
            <script src="{{ asset('assets/dropzone/dropzone.js') }}"></script>
            <!-- <script src="{{ asset('assets/inputMask/bootstrap_input_mask.min.js') }}"></script> -->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>


            <script src="{{ asset('assets/js/plugins/rich-text-editor.js')}}"></script>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
            <!-- <script src="{{ asset('js/summernote.js') }}"></script> -->
            <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            {{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}



            <script src="https://use.fontawesome.com/7ad89d9866.js"></script>

            {{-- charts --}}


            <script>
                $(document).ready(function() {
                    toastr.options.timeOut = 10000;
                    @if (Session::has('error'))
                        toastr.error('{{ Session::get('error') }}');
                    @elseif (Session::has('success'))
                        toastr.success('{{ Session::get('success') }}');
                    @endif
                });
            </script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script>
                window.assetPath = "{{ asset('assets/images/user/img-demo_1041.jpg') }}";
            </script>
            <script>
                $(document).ready(function() {
                    // Apply input masking to the phone input field
                    $('.imput-mask').inputmask('999-999-9999');
                    $('.input-money').maskMoney();
                    $('.input-money-price').inputmask("currency", {
                        prefix: '$ ',
                        alias: 'numeric',
                        rightAlign: false,
                        autoUnmask: true
                    });

                    var media_start = 0;
                    var loading = false;
                    var scroll_param = 650;

                    if ($(window).width() >= 1200) {
                        scroll_param = 450;
                    }

                    function loadImages(start) {
                        loading = true;
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('media.filter') }}',
                            data: {
                                start: start,
                            },
                            success: function(response) {
                                var $mediaContainer = $('.media_images_class');
                                if (response.status === 'success' && response.count > 0) {
                                    $mediaContainer.append(response.html);
                                    loading = false;
                                    $mediaContainer.scrollTop($mediaContainer[0].scrollHeight);
                                } else {
                                    loading = false;
                                    $mediaContainer.append('<p>No Image Found!</p>');
                                }
                                if (response.count < 27) {
                                    $('.media_load_more').hide();
                                }
                            },
                            error: function(error) {
                                toastr.error('Error uploading images');
                                loading = false;
                            }
                        });
                    }
                    $(document).on("click", ".media_load_more", function() {
                        media_start += 27;
                        loadImages(media_start);
                    })
                    loadImages(media_start);

                    // $(document).on("click", ".nav-profile-tab", function() {
                    //     alert('click');
                    //     var start = 0;
                    //     loadImages(start);
                    // });
                    const previewTemplate_old = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`;

                    myDropzone = new Dropzone(".all_img_dropzone", {
                        url: '{{ route('media.upload') }}',
                        previewTemplate: previewTemplate_old,
                        parallelUploads: 1,
                        maxFilesize: 5,
                        dictDefaultMessage: '<p>Click Or Drop Files Here To Upload</p><i class="fa fa-upload" aria-hidden="true"></i>',
                        init: function() {
                            this.on("queuecomplete", function() {
                                var formData = new FormData();
                                formData.append('_token', $('input[name="_token"]').val());
                                for (var i = 0; i < this.files.length; i++) {
                                    formData.append('file[]', this.files[i]);
                                }
                                $.ajax({
                                    method: 'POST',
                                    url: '{{ route('media.upload') }}',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            toastr.success('Images uploaded successfully');
                                            $(".nav-profile-tab").trigger("click");
                                            var start = 0;
                                            $('.media_images_class').html('');
                                            loadImages(start);
                                            myDropzone.removeAllFiles(true);
                                        } else {
                                            toastr.error('Error uploading images');
                                        }
                                    },
                                    error: function(error) {
                                        toastr.error('Error uploading images');
                                    }
                                });
                            });
                        }
                    });

                });
                $(document).ready(function() {
                    // Apply input masking to the phone input field
                    $('.select2').select2({
                        placeholder: "Select Category"
                    });
                    $('#artical_tags').select2({
                        placeholder: "Select Tag"
                    });
                });
            </script>

            <script>
                $(document).on("click", ".choose_file", function() {
                    var val = $(this).data('val');
                    var data_id = $(this).attr('data-id');
                    if (val == 'faviconimg' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'story_img' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'system_img' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if ((val == 'system_img1' || val == 'system_img2' || val == 'system_img3' || val == 'system_img4') &&
                        val != 'undefined') {
                        $('#type_id').val(val);
                    }

                    if ((val == 'why_choose_img1' || val == 'why_choose_img2' || val == 'why_choose_img3' || val ==
                            'why_choose_img4' || val == 'why_choose_img5' || val == 'why_choose_img6') &&
                        val != 'undefined') {
                        $('#type_id').val(val);
                    }

                    if (val == 'video_img' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'sectionimg' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'mainsecimg' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'footer_profile_avtar' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    // if(val == 'profile_avtar' && val != 'undefined')
                    // {
                    //     $('#type_id').val(val);
                    // }
                    if (val == 'banner_profile_avtar' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'banner_image' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val == 'role_img' && val != 'undefined') {
                        $('#type_id').val(val);
                    }
                    if (val != 'undefined' && data_id != 'undefined') {
                        $('#type_id').val(val);
                        $('#data_id').val(data_id);
                    }
                    if (val != 'undefined' && data_id != 'undefined') {
                        $('#type_id').val(val);
                        $('#data_id').val(data_id);
                    }
                    $('#choose_file_modal').modal('show');
                });
            </script>
            <script></script>
            <script></script>
            <script>
                $(document).on("click", ".media_imges_parent", function() {
                    if ($(this).hasClass('selected')) {
                        $(this).removeClass('selected');
                        $('.get_img_id').hide();
                    } else {
                        $(".media_imges_parent.selected").removeClass('selected');
                        $(this).toggleClass('selected');
                        $('.get_img_id').show();
                    }

                });
                $(document).on("click", ".get_img_id", function() {
                    // var token = $('meta[name="csrf-token"]').attr('content');
                    var img_id = $(".media_imges_parent.selected").data('id');
                    var type_id = $("#type_id").val();
                    var data_id = $("#data_id").val();

                    var favicon = false;
                    var sec_img = false;
                    var main_sec = false;
                    var story_img = false;
                    var system_img = false;
                    var video_img = false;
                    var mv_icon_1 = false;
                    var mv_icon_2 = false;
                    var mv_icon_3 = false;
                    var mv_icon_4 = false;
                    var mv_icon_5 = false;
                    var mv_icon_6 = false;
                    var bannerimage = false;
                    var abt_mb_bannerimage = false;
                      var quote_img = false;
                    var section1_image = false;
                    var section2_image = false;
                    var section3_image = false;
                    var section4_image = false;
                    var section5_image = false;

                    var section6_image1 = false;
                    var section6_image2 = false;
                    var section7_image = false;


                    var sec2_image_1 = false;
                    var sec2_image_2 = false;
                    var sec2_image_3 = false;
                    var sec2_image_4 = false;


                    var sec3_image_1 = false;
                    var sec3_image_2 = false;
                    var sec3_image_3 = false;
                    var sec3_image_4 = false;

                    var hollowmetal_bannerimage = false;
                    var hm_d_section2_image = false;
                    var hm_d_section3_image = false;
                    var hm_d_section4_image = false;
                    var hm_d_section5_image = false;
                    var hm_d_section6_image = false;
                    var hm_d_section6_image2 = false;
                    var hm_d_section7_image = false;

                    if (type_id == 'faviconimg' && type_id != 'undefined' && type_id != '') {
                        var favicon = true;
                    }
                    if (type_id == 'story_img' && type_id != 'undefined' && type_id != '') {
                        var story_img = true;
                    }
                    if (type_id == 'system_img' && type_id != 'undefined' && type_id != '') {
                        var system_img = true;
                    }
                    if (type_id == 'system_img1' && type_id != 'undefined' && type_id != '') {
                        var system_img1 = true;
                    }
                    if (type_id == 'system_img2' && type_id != 'undefined' && type_id != '') {
                        var system_img2 = true;
                    }
                    if (type_id == 'system_img3' && type_id != 'undefined' && type_id != '') {
                        var system_img3 = true;
                    }
                    if (type_id == 'system_img4' && type_id != 'undefined' && type_id != '') {
                        var system_img4 = true;
                    }

                    if (type_id == 'why_choose_img1' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img1 = true;
                    }
                    if (type_id == 'why_choose_img2' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img2 = true;
                    }
                    if (type_id == 'why_choose_img3' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img3 = true;
                    }
                    if (type_id == 'why_choose_img4' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img4 = true;
                    }
                    if (type_id == 'why_choose_img5' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img5 = true;
                    }
                    if (type_id == 'why_choose_img6' && type_id != 'undefined' && type_id != '') {
                        var why_choose_img6 = true;
                    }
                    if (type_id == 'faq_img' && type_id != 'undefined' && type_id != '') {
                        var faq_img = true;
                    }
                      if (type_id == 'quote_img' && type_id != 'undefined' && type_id != '') {
                        var quote_img = true;
                    }
                    if (type_id == 'mobile_banner_img' && type_id != 'undefined' && type_id != '') {
                        var mobile_banner_img = true;
                    }
                    if (type_id == 'mv_icon_1' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_1 = true;
                    }
                    if (type_id == 'mv_icon_2' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_2 = true;
                    }
                    if (type_id == 'mv_icon_3' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_3 = true;
                    }
                    if (type_id == 'mv_icon_4' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_4 = true;
                    }
                    if (type_id == 'mv_icon_5' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_5 = true;
                    }
                    if (type_id == 'mv_icon_6' && type_id != 'undefined' && type_id != '') {
                        var mv_icon_6 = true;
                    }

                    if (type_id == 'sec2_image_1' && type_id != 'undefined' && type_id != '') {
                        var sec2_image_1 = true;
                    }
                    if (type_id == 'sec2_image_2' && type_id != 'undefined' && type_id != '') {
                        var sec2_image_2 = true;
                    }
                    if (type_id == 'sec2_image_3' && type_id != 'undefined' && type_id != '') {
                        var sec2_image_3 = true;
                    }
                    if (type_id == 'sec2_image_4' && type_id != 'undefined' && type_id != '') {
                        var sec2_image_4 = true;
                    }

                    if (type_id == 'bannerimage' && type_id != 'undefined' && type_id != '') {
                        var bannerimage = true;
                    }
                    if (type_id == 'banner_image' && type_id != 'undefined' && type_id != '') {
                        var banner_image_flag = true;
                    }
                    if (type_id == 'abt_mb_bannerimage' && type_id != 'undefined' && type_id != '') {
                        var abt_mb_bannerimage = true;
                    }
                    if (type_id == 'section1_image' && type_id != 'undefined' && type_id != '') {
                        var section1_image = true;
                    }
                    if (type_id == 'section2_image' && type_id != 'undefined' && type_id != '') {
                        var section2_image = true;
                    }

                    if (type_id == 'section3_image' && type_id != 'undefined' && type_id != '') {
                        var section3_image = true;
                    }
                    if (type_id == 'section4_image' && type_id != 'undefined' && type_id != '') {
                        var section4_image = true;
                    }
                    if (type_id == 'section5_image' && type_id != 'undefined' && type_id != '') {
                        var section5_image = true;
                    }
                    if (type_id == 'section6_image1' && type_id != 'undefined' && type_id != '') {
                        var section6_image1 = true;
                    }
                    if (type_id == 'section6_image2' && type_id != 'undefined' && type_id != '') {
                        var section6_image2 = true;
                    }
                    if (type_id == 'section7_image' && type_id != 'undefined' && type_id != '') {
                        var section7_image = true;
                    }
                    if (type_id == 'sec3_image_1' && type_id != 'undefined' && type_id != '') {
                        var sec3_image_1 = true;
                    }
                    if (type_id == 'sec3_image_2' && type_id != 'undefined' && type_id != '') {
                        var sec3_image_2 = true;
                    }
                    if (type_id == 'sec3_image_3' && type_id != 'undefined' && type_id != '') {
                        var sec3_image_3 = true;
                    }
                    if (type_id == 'sec3_image_4' && type_id != 'undefined' && type_id != '') {
                        var sec3_image_4 = true;


                    }



                     if (type_id == 'hollowmetal_bannerimage' && type_id != 'undefined' && type_id != '') {
                        var hollowmetal_bannerimage = true;
                    }
                      if (type_id == 'hm_d_section2_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section2_image = true;
                    }if (type_id == 'hm_d_section3_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section3_image = true;
                    }if (type_id == 'hm_d_section4_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section4_image = true;
                    }if (type_id == 'hm_d_section5_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section5_image = true;
                    }if (type_id == 'hm_d_section6_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section6_image = true;
                    }if (type_id == 'hm_d_section6_image2' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section6_image2 = true;
                    }if (type_id == 'hm_d_section7_image' && type_id != 'undefined' && type_id != '') {
                        var hm_d_section7_image = true;
                    }
                    if (type_id == 'video_img' && type_id != 'undefined' && type_id != '') {
                        var video_img = true;
                    }
                    if (type_id == 'sectionimg' && type_id != 'undefined' && type_id != '') {
                        var sec_img = true;
                    }
                    if (type_id == 'mainsecimg' && type_id != 'undefined' && type_id != '') {
                        var main_sec = true;
                    }
                    var role_img = false;
                    if (type_id == 'role_img' && type_id != 'undefined' && type_id != '') {
                        var role_img = true;
                    }
                    if (type_id == 'footer_profile_avtar' && type_id != 'undefined' && type_id != '') {
                        var footer_sec = true;
                    }
                    if (type_id == 'banner_profile_avtar' && type_id != 'undefined' && type_id != '') {
                        var banner_sec = true;
                    }
                    if (type_id == 'profile_avtar_story' && type_id != 'undefined' && type_id != '') {
                        var area_sec = true;
                    }
                    // 
                    
                    if (type_id.startsWith('service_img_')) {
                        var service_sec = true;
                    }
                    $.ajax({
                        method: 'POST',
                        url: '{{ route('media.getimg.byid') }}',
                        data: {
                            // _token: token,
                            img_id: img_id
                        },
                        datatype: 'json',
                        success: function(response) {
                            var details = response.details;
                            var imageUrl = "{{ asset('uploads') }}/" + details.name;
                            var type_id = $("#type_id").val();
                            var data_id = $("#data_id").val();

                            if (favicon) {
                                $('#favicon_id').val(details.id);
                                $('#favicon_avtar').attr('src', imageUrl);
                                $('#remove_favi_image').css('display', 'block');
                            } else if (sec_img) {
                                $('#sec_img_id').val(details.id);
                                $('#sec_img_avtar').attr('src', imageUrl);
                                $('#remove_sec_image').css('display', 'block');
                            } else if (main_sec) {
                                $('#main_sec_img').val(details.id);
                                $('#sec_avtar').attr('src', imageUrl);
                                $('#remove_main_sec_image').css('display', 'block');
                            } else if (role_img) {
                                $('#role_img').val(details.id);
                                $('#role_image_avtar').attr('src', imageUrl);
                                $('#role_image_remove_image').css('display', 'block');
                            } else if (footer_sec) {
                                $('#footer_img_id').val(details.id);
                                $('#footer_profile_avtar').attr('src', imageUrl);
                                $('#footer_remove_image').css('display', 'block');
                            } else if (story_img || area_sec) {
                                $('input#story_img_id').val(details.id);
                                $('#profile_avtar_story').attr('src', imageUrl);
                                $('#story_remove_image').css('display', 'block');
                                $('a#story_img_id').css('display', 'block');
                            } else if (faq_img) {
                                $('#faq_img').val(details.id);
                                $('#faq_avtar').attr('src', imageUrl);
                                $('#faq_remove_image').css('display', 'block');
                            }else if (quote_img) {
                                $('#quote_img').val(details.id);
                                $('#quote_avtar').attr('src', imageUrl);
                                $('#quote_remove_image').css('display', 'block');
                            } 
                            
                            else if (mobile_banner_img) {
                                $('#mobile_banner_img').val(details.id);
                                $('#mobile_banner_avtar').attr('src', imageUrl);
                                $('#mobile_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_1) {
                                $('#mv_icon_1').val(details.id);
                                $('#mvicon1_banner_avtar').attr('src', imageUrl);
                                $('#mvicon1_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_2) {
                                $('#mv_icon_2').val(details.id);
                                $('#mvicon2_banner_avtar').attr('src', imageUrl);
                                $('#mvicon2_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_3) {
                                $('#mv_icon_3').val(details.id);
                                $('#mvicon3_banner_avtar').attr('src', imageUrl);
                                $('#mvicon3_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_4) {
                                $('#mv_icon_4').val(details.id);
                                $('#mvicon4_banner_avtar').attr('src', imageUrl);
                                $('#mvicon4_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_5) {
                                $('#mv_icon_5').val(details.id);
                                $('#mvicon5_banner_avtar').attr('src', imageUrl);
                                $('#mvicon5_banner_remove_image').css('display', 'block');
                            } else if (mv_icon_6) {
                                $('#mv_icon_6').val(details.id);
                                $('#mvicon6_banner_avtar').attr('src', imageUrl);
                                $('#mvicon6_banner_remove_image').css('display', 'block');
                            } else if (sec2_image_1) {
                                $('#sec2_image_1').val(details.id);
                                $('#sec2img1_banner_avtar').attr('src', imageUrl);
                                $('#sec2img1_banner_remove_image').css('display', 'block');
                            } else if (sec2_image_2) {
                                $('#sec2_image_2').val(details.id);
                                $('#sec2img2_banner_avtar').attr('src', imageUrl);
                                $('#sec2img2_banner_remove_image').css('display', 'block');
                            } else if (sec2_image_3) {
                                $('#sec2_image_3').val(details.id);
                                $('#sec2img3_banner_avtar').attr('src', imageUrl);
                                $('#sec2img3_banner_remove_image').css('display', 'block');
                            } else if (sec2_image_4) {
                                $('#sec2_image_4').val(details.id);
                                $('#sec2img4_banner_avtar').attr('src', imageUrl);
                                $('#sec2img4_banner_remove_image').css('display', 'block');
                            } else if (system_img) {
                                $('#system_img_id').val(details.id);
                                $('#system_avtar').attr('src', imageUrl);
                                $('#remove_system_image').css('display', 'block');
                            } else if (system_img1) {
                                $('#system_img_id1').val(details.id);
                                $('#system_avtar1').attr('src', imageUrl);
                                $('#remove_system_image1').css('display', 'block');
                            } else if (system_img2) {
                                $('#system_img_id2').val(details.id);
                                $('#system_avtar2').attr('src', imageUrl);
                                $('#remove_system_image2').css('display', 'block');
                            } else if (system_img3) {
                                $('#system_img_id3').val(details.id);
                                $('#system_avtar3').attr('src', imageUrl);
                                $('#remove_system_image3').css('display', 'block');
                            } else if (system_img4) {
                                $('#system_img_id4').val(details.id);
                                $('#system_avtar4').attr('src', imageUrl);
                                $('#remove_system_image4').css('display', 'block');


                            } else if (sec3_image_1) {
                                $('#sec3_image_1').val(details.id);
                                $('#sec3img1_banner_avtar').attr('src', imageUrl);
                                $('#sec3img1_banner_remove_image').css('display', 'block');
                            } else if (sec3_image_2) {
                                $('#sec3_image_2').val(details.id);
                                $('#sec3img2_banner_avtar').attr('src', imageUrl);
                                $('#sec3img2_banner_remove_image').css('display', 'block');
                            } else if (sec3_image_3) {
                                $('#sec3_image_3').val(details.id);
                                $('#sec3img3_banner_avtar').attr('src', imageUrl);
                                $('#sec3img3_banner_remove_image').css('display', 'block');
                            } else if (sec3_image_4) {
                                $('#sec3_image_4').val(details.id);
                                $('#sec3img4_banner_avtar').attr('src', imageUrl);
                                $('#sec3img4_banner_remove_image').css('display', 'block');
                            } else if (why_choose_img1) {
                                $('#why_choose_img_id1').val(details.id);
                                $('#why_choose_avtar1').attr('src', imageUrl);
                                $('#remove_why_choose_image1').css('display', 'block');
                            } else if (why_choose_img2) {
                                $('#why_choose_img_id2').val(details.id);
                                $('#why_choose_avtar2').attr('src', imageUrl);
                                $('#remove_why_choose_image2').css('display', 'block');
                            } else if (why_choose_img3) {
                                $('#why_choose_img_id3').val(details.id);
                                $('#why_choose_avtar3').attr('src', imageUrl);
                                $('#remove_why_choose_image3').css('display', 'block');
                            } else if (why_choose_img4) {
                                $('#why_choose_img_id4').val(details.id);
                                $('#why_choose_avtar4').attr('src', imageUrl);
                                $('#remove_why_choose_image4').css('display', 'block');


                            } 
                            
                            
                             else if (hollowmetal_bannerimage) {
                                $('#hollowmetal_bannerimage').val(details.id);
                                $('#hollowmetal_bannerimage_avtar').attr('src', imageUrl);
                                $('#hollowmetal_bannerimage_remove_image').css('display', 'block');
                            }
                             else if (hm_d_section2_image) {
                                $('#hm_d_section2_image').val(details.id);
                                $('#hm_d_section2_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section2_image_remove_image').css('display', 'block');
                            }else if (hm_d_section3_image) {
                                $('#hm_d_section3_image').val(details.id);
                                $('#hm_d_section3_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section3_image_remove_image').css('display', 'block');
                            }else if (hm_d_section4_image) {
                                $('#hm_d_section4_image').val(details.id);
                                $('#hm_d_section4_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section4_image_remove_image').css('display', 'block');
                            }else if (hm_d_section5_image) {
                                $('#hm_d_section5_image').val(details.id);
                                $('#hm_d_section5_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section5_image_remove_image').css('display', 'block');
                            }else if (hm_d_section6_image) {
                                $('#hm_d_section6_image').val(details.id);
                                $('#hm_d_section6_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section6_image_remove_image').css('display', 'block');
                            }else if (hm_d_section6_image2) {
                                $('#hm_d_section6_image2').val(details.id);
                                $('#hm_d_section6_image2_avtar').attr('src', imageUrl);
                                $('#hm_d_section6_image2_remove_image').css('display', 'block');
                            }else if (hm_d_section7_image) {
                                $('#hm_d_section7_image').val(details.id);
                                $('#hm_d_section7_image_avtar').attr('src', imageUrl);
                                $('#hm_d_section7_image_remove_image').css('display', 'block');
                            }else if (why_choose_img5) {
                                $('#why_choose_img_id5').val(details.id);
                                $('#why_choose_avtar5').attr('src', imageUrl);
                                $('#remove_why_choose_image5').css('display', 'block');
                            } else if (why_choose_img6) {
                                $('#why_choose_img_id6').val(details.id);
                                $('#why_choose_avtar6').attr('src', imageUrl);
                                $('#remove_why_choose_image6').css('display', 'block');
                            } else if (bannerimage) {
                                $('#bannerimage').val(details.id);
                                $('#bannerimage_avtar').attr('src', imageUrl);
                                $('#bannerimage_remove_image').css('display', 'block');
                            } else if (banner_image_flag) {
                                $('#banner_image_id').val(details.id);
                                $('#banner_image_avtar').attr('src', imageUrl);
                                $('#remove_banner_image').css('display', 'block');
                            }
                            
                             else if (abt_mb_bannerimage) {
                                $('#abt_mb_bannerimage').val(details.id);
                                $('#abt_mb_profile_avtar').attr('src', imageUrl);
                                $('#abt_mb_remove_image').css('display', 'block');
                            }else if (section1_image) {
                                $('#section1_image').val(details.id);
                                $('#section1_image_avtar').attr('src', imageUrl);
                                $('#section1_image_remove_image').css('display', 'block');
                            }else if (section2_image) {
                                $('#section2_image').val(details.id);
                                $('#section2_image_avtar').attr('src', imageUrl);
                                $('#section2_image_remove_image').css('display', 'block');

                            } else if (section3_image) {
                                $('#section3_image').val(details.id);
                                $('#section3_image_avtar').attr('src', imageUrl);
                                $('#section3_image_remove_image').css('display', 'block');
                            } else if (section4_image) {
                                $('#section4_image').val(details.id);
                                $('#section4_image_avtar').attr('src', imageUrl);
                                $('#section4_image_remove_image').css('display', 'block');
                            } else if (section5_image) {
                                $('#section5_image').val(details.id);
                                $('#section5_image_avtar').attr('src', imageUrl);
                                $('#section5_image_remove_image').css('display', 'block');
                            } else if (section6_image1) {
                                $('#section6_image1').val(details.id);
                                $('#section6_image1_avtar').attr('src', imageUrl);
                                $('#section6_image1_remove_image').css('display', 'block');
                            } else if (section6_image2) {
                                $('#section6_image2').val(details.id);
                                $('#section6_image2_avtar').attr('src', imageUrl);
                                $('#section6_image2_remove_image').css('display', 'block');
                            } else if (section7_image) {
                                $('#section7_image').val(details.id);
                                $('#section7_image_avtar').attr('src', imageUrl);
                                $('#section7_image_remove_image').css('display', 'block');
                            } 
                            
                            
                            
                            else if (video_img) {
                                $('#video_img_id').val(details.id);
                                $('#profile_avtar_video').attr('src', imageUrl);
                                $('#video_remove_image').css('display', 'block');
                            } else if (banner_sec) {
                                $('#banner_img_id').val(details.id);
                                $('#banner_profile_avtar').attr('src', imageUrl);
                                $('#banner_remove_image').css('display', 'block');
                            } 
                            // else if (service_sec) {
                            //     let suffix = type_id.replace('service_img_1', '');
                            //     $('#service_img_1' + suffix).val(details.id);
                            //     $('#service_preview_1' + suffix).attr('src', imageUrl);
                            //     $('#service_remove_image_1' + suffix).css('display', 'block');


                            else if (service_sec) {
                                let suffix = type_id.replace('service_img_', '');
                                console.log(suffix);
                                $('#service_img_' + suffix).val(details.id);
                                $('#service_preview_' + suffix).attr('src', imageUrl);
                                $('#service_remove_image_' + suffix).css('display', 'block');
                            } else if (data_id != 'undefined' && type_id != 'undefined' && data_id != "") {
                                $('#' + type_id + '_img_id_' + data_id).val(details.id);
                                $('#' + type_id + '_profile_avtar_' + data_id).attr('src', imageUrl);
                                $('#' + type_id + '_remove_image_' + data_id).css('display', 'block');
                            } else {
                                $('#profile_avtar').attr('src', imageUrl);
                                $('#img_id').val(details.id);
                                $('#remove_image').css('display', 'block');
                            }
                            $('#choose_file_modal').modal('hide');

                        },
                        error: function(error) {
                            toastr.error('Error Fetching images');
                        }
                    });
                });

                $(document).on("click", ".remove_image_media", function() {

                    var type_id = $(this).data('val');
                    var data_id = $(this).attr('data-id');
                    $('#' + type_id + '_img_id_' + data_id).val(null);
                    $('#' + type_id + '_profile_avtar_' + data_id).attr('src', window.assetPath);
                    $('#' + type_id + '_remove_image_' + data_id).css('display', 'none');
                    $('#' + type_id + '_profile_avtar_' + data_id).css('opacity', '1.0');
                })
            </script>
            <script src="{{ asset('js/parsley/parsley.min.js') }}"></script>
            <script src="{{ asset('js/passwordcdn/cdnjs.cloudflare.com_ajax_libs_zxcvbn_4.4.2_zxcvbn.js') }}"></script>
            <script src="{{ asset('assets/plugins/chart-morris/js/raphael.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/chart-morris/js/morris.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/jquery-ui/js/jquery-ui.js') }}"></script>
            {{-- <script src="{{ asset('assets/js/pages/chart-morris-custom.js') }}"></script> --}}


            @yield('script')
</body>

</html>
