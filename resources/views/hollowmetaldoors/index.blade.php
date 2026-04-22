@extends('layouts.backend.index')
@section('title')
Exotic Garagr Door Page Settings
@endsection
@section('main_content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <form action="{{ route('hollowmetal.add') }}" method="POST" data-parsley-validate=""
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($hollowmetaldoors))
                        <input type="hidden" name="hollowmetaldoors_id"
                            value="{{ isset($hollowmetaldoors->id) ? $hollowmetaldoors->id : '' }}">
                        @endif
                        <div class="row">
                            <div
                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                <div class="card Recent-Users">
                                    <h5> Hollow Metal Door Page Settings</h5>
                                    <div class="card-block px-0 py-3">






                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="bannertitle"
                                                    value="{{ isset($hollowmetaldoors->bannertitle) ? $hollowmetaldoors->bannertitle : '' }}">
                                                <label for="bannertitle">Banner Title<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="bannertitle" id="bannertitle"
                                                    placeholder="About Page Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="{{ isset($hollowmetaldoors->bannertitle) ? $hollowmetaldoors->bannertitle : '' }}">
                                            </div>
                                        </div>




                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="bannersubtitle">Banner Subtitle<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor" id="bannersubtitle"
                                                    name="bannersubtitle">{{ isset($hollowmetaldoors->bannersubtitle) ? $hollowmetaldoors->bannersubtitle : '' }}</textarea>
                                                <span id="subtitle_required"></span>
                                            </div>

                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="hollowmetal_bannerimage"
                                                        id="hollowmetal_bannerimage"
                                                        value="{{ isset($hollowmetaldoors->hollowmetal_bannerimage) ? $hollowmetaldoors->hollowmetal_bannerimage : '' }}">
                                                    @if (isset($hollowmetaldoors->hollowmetal_bannerimage) &&
                                                    $hollowmetaldoors->hollowmetal_bannerimage != '' &&
                                                    $hollowmetaldoors->hollowmetal_bannerimage != null)
                                                    @php
                                                    $img = App\Models\MediaImage::select('name')
                                                    ->where(
                                                    'id',
                                                    $hollowmetaldoors->hollowmetal_bannerimage,
                                                    )
                                                    ->first();
                                                    @endphp
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                            id="hollowmetal_bannerimage_avtar" class="profile-img">
                                                        <a id="hollowmetal_bannerimage_remove_image"
                                                            class="remove_image_media"> <i class="fa fa-times"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                    @else
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                            alt="" id="hollowmetal_bannerimage_avtar"
                                                            class="profile-img">
                                                        <a id="hollowmetal_bannerimage_remove_image"
                                                            class="remove_image_media" style="display: none;"> <i
                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    @endif
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="hollowmetal_bannerimage">Choose image</label>
                                                    @if (isset($hollowmetaldoors->hollowmetal_bannerimage) &&
                                                    $hollowmetaldoors->hollowmetal_bannerimage != '' &&
                                                    $hollowmetaldoors->hollowmetal_bannerimage != null)
                                                    @else
                                                    <span id="img_alert1" class="parsley-required"
                                                        style="font-weight: 500 !important;color: red !important;"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="bannerdescription">Banner Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor" id="bannerdescription"
                                                    name="bannerdescription">{{ isset($hollowmetaldoors->bannerdescription) ? $hollowmetaldoors->bannerdescription : '' }}</textarea>
                                                <span id="description_required"></span>
                                            </div>



                                        </div>

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="hm_d_button_name">Button Name</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="hm_d_button_name" id="hm_d_button_name"
                                                    placeholder="Sub Title"
                                                    value="{{ isset($hollowmetaldoors->hm_d_button_name) ? $hollowmetaldoors->hm_d_button_name : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="hm_d_button_url">Button Url</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="hm_d_button_url" id="hm_d_button_url"
                                                    placeholder="Button Url"
                                                    value="{{ isset($hollowmetaldoors->hm_d_button_url) ? $hollowmetaldoors->hm_d_button_url : '' }}">
                                            </div>
                                        </div>





                                    </div>
                                </div>
                                <div class="card Recent-Users next-box">
                                    <h5>Section 2</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section2_title">Section 2 Title<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section2_title" id="section2_title"
                                                    placeholder="Section 2 Title" required
                                                    data-parsley-required-message="Please Enter Section 2 Title"
                                                    value="{{ isset($hm_d_section2->section2_title) ? $hm_d_section2->section2_title : '' }}">
                                            </div>
                                        </div>

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section2_description">Section 2 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    id="section2_description"
                                                    name="section2_description">{{ isset($hm_d_section2->section2_description) ? $hm_d_section2->section2_description : '' }}</textarea>
                                                <span id="description2_required"></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card Recent-Users next-box">
                                    <h5>Section 3</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="section3_title"
                                                    value="{{ isset($hm_d_section3->section3_title) ? $hm_d_section3->section3_title : '' }}">
                                                <label for="section3_title">Section 3 Title<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section3_title" id="title3"
                                                    placeholder="Section 3 Title" required
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="{{ isset($hm_d_section3->section3_title) ? $hm_d_section3->section3_title : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section3_description">Section 3 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    id="section3_description"
                                                    name="section3_description">{{ isset($hm_d_section3->section3_description) ? $hm_d_section3->section3_description : '' }}</textarea>
                                                <span id="section3_description_required"></span>
                                            </div>

                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="hm_d_section3_image"
                                                        id="hm_d_section3_image"
                                                        value="{{ isset($hm_d_section3->hm_d_section3_image) ? $hm_d_section3->hm_d_section3_image : '' }}">
                                                    @if (isset($hm_d_section3->hm_d_section3_image) &&
                                                    $hm_d_section3->hm_d_section3_image != '' &&
                                                    $hm_d_section3->hm_d_section3_image != null)
                                                    @php
                                                    $img = App\Models\MediaImage::select('name')
                                                    ->where('id', $hm_d_section3->hm_d_section3_image)
                                                    ->first();
                                                    @endphp
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                            id="hm_d_section3_image_avtar" class="profile-img">
                                                        <a id="hm_d_section3_image_remove_image"
                                                            class="remove_image_media"> <i class="fa fa-times"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                    @else
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                            alt="" id="hm_d_section3_image_avtar" class="profile-img">
                                                        <a id="hm_d_section3_image_remove_image"
                                                            class="remove_image_media" style="display: none;"> <i
                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    @endif
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="hm_d_section3_image">Choose image</label>
                                                    @if (isset($hm_d_section3->hm_d_section3_image) &&
                                                    $hm_d_section3->hm_d_section3_image != '' &&
                                                    $hm_d_section3->hm_d_section3_image != null)
                                                    @else
                                                    <span id="img_alert1" class="parsley-required"
                                                        style="font-weight: 500 !important;color: red !important;"></span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card Recent-Users next-box">
                                    <h5>Section 4</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="section4_title"
                                                    value="{{ isset($hm_d_section4->section4_title) ? $hm_d_section4->section4_title : '' }}">
                                                <label for="section4_title">Section 4 Title</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section4_title" id="title4"
                                                    placeholder="Section 4 Title"
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="{{ isset($hm_d_section4->section4_title) ? $hm_d_section4->section4_title : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section4_description">Section 4 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    id="section4_description"
                                                    name="section4_description">{{ isset($hm_d_section4->section4_description) ? $hm_d_section4->section4_description : '' }}</textarea>
                                                <span id="section4_description_required"></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card Recent-Users next-box">
                                    <h5>Section 5</h5>
                                    <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="section5_title"
                                                    value="{{ isset($hm_d_section5->section5_title) ? $hm_d_section5->section5_title : '' }}">
                                                <label for="section5_title">Section 5 Title</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section5_title" id="title5"
                                                    placeholder="Section 5 Title"
                                                    data-parsley-required-message="Please Enter Title"
                                                    value="{{ isset($hm_d_section5->section5_title) ? $hm_d_section5->section5_title : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="section5_description">Section 5 Description<span
                                                        style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    id="section5_description"
                                                    name="section5_description">{{ isset($hm_d_section5->section5_description) ? $hm_d_section5->section5_description : '' }}</textarea>
                                                <span id="section5_description_required"></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card Recent-Users next-box">
                                    <h5>Section 6</h5>
                                    <div class="card-block px-0 py-3">

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section6_title" id="section6_title"
                                                    placeholder="Type here"
                                                    value="{{ isset($hm_d_section6->section6_title) ? $hm_d_section6->section6_title : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    name="section6_description"
                                                    id="section6_description">{{ isset($hm_d_section6->section6_description) ? $hm_d_section6->section6_description : '' }}</textarea>
                                            </div>
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="upload-img-sec">
                                                    <input type="hidden" name="hm_d_section6_image"
                                                        id="hm_d_section6_image"
                                                        value="{{ isset($hm_d_section6->hm_d_section6_image) ? $hm_d_section6->hm_d_section6_image : '' }}">
                                                    @if (isset($hm_d_section6->hm_d_section6_image) &&
                                                    $hm_d_section6->hm_d_section6_image != '' &&
                                                    $hm_d_section6->hm_d_section6_image != null)
                                                    @php
                                                    $img = App\Models\MediaImage::select('name')
                                                    ->where('id', $hm_d_section6->hm_d_section6_image)
                                                    ->first();
                                                    @endphp
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                            id="hm_d_section6_image1_avtar" class="profile-img">
                                                        <a id="hm_d_section6_image1_remove_image"
                                                            class="remove_image_media"> <i class="fa fa-times"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                    @else
                                                    <div class="image_preview_div">
                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                            alt="" id="hm_d_section6_image1_avtar" class="profile-img">
                                                        <a id="hm_d_section6_image1_remove_image"
                                                            class="remove_image_media" style="display: none;"> <i
                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    @endif
                                                    <label for="" style="cursor: pointer;"
                                                        class="choose_file hm-choose-img-title"
                                                        data-val="hm_d_section6_image">Choose image</label>
                                                    @if (isset($hm_d_section6->hm_d_section6_image) &&
                                                    $hm_d_section6->hm_d_section6_image != '' &&
                                                    $hm_d_section6->hm_d_section6_image != null)
                                                    @else
                                                    <span id="img_alert1" class="parsley-required"
                                                        style="font-weight: 500 !important;color: red !important;"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>



                                <div class="card Recent-Users next-box">
                                    <h5>Section 7</h5>
                                    <div class="card-block px-0 py-3">


                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Section 7 Description*</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    name="section7_description"
                                                    id="section7_description">{{ isset($hm_d_section7->section7_description) ? $hm_d_section7->section7_description : '' }}</textarea>
                                            </div>

                                        </div>



                                    </div>
                                </div>


                                <div class="card Recent-Users next-box">
                                    <h5>Section 8</h5>
                                    <div class="card-block px-0 py-3">


                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Section 8 Description*</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    name="section8_description"
                                                    id="section8_description">{{ isset($hm_d_section8->section8_description) ? $hm_d_section8->section8_description : '' }}</textarea>
                                            </div>

                                        </div>



                                    </div>
                                </div>



                                <div class="card Recent-Users next-box">
                                    <h5>Section 9</h5>
                                    <div class="card-block px-0 py-3">

                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Title 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <input type="text" name="section9_title1" id="" placeholder="Type here"
                                                    value="{{ isset($hm_d_section9->section9_title1) ? $hm_d_section9->section9_title1 : '' }}">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Short Description 1</label>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <textarea class="form-control rich-text-editor"
                                                    name="section9_description"
                                                    id="section9_description">{{ isset($hm_d_section9->section9_description) ? $hm_d_section9->section9_description : '' }}</textarea>
                                            </div>

                                        </div>



                                    </div>
                                </div>


                                <div class="card Recent-Users">
                                    <h5> Meta Tags</h5>
                                    <div class="card-block px-0 py-3">


                                        <div class="row form-sec">
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Meta Title </label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" name="meta_title" id="meta_title"
                                                            placeholder="Title"
                                                            value="{{ isset($hollowmetaldoors->meta_title) ? $hollowmetaldoors->meta_title : '' }}"
                                                            data-parsley-required-message="Please Enter Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Meta Keyword</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" name="meta_keyword" id="meta_keyword"
                                                            placeholder="Sub Title"
                                                            value="{{ isset($hollowmetaldoors->meta_keyword) ? $hollowmetaldoors->meta_keyword : '' }}"
                                                            data-parsley-required-message="Please Enter Sub Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="row form-sec">
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                        <label for="">Meta Description</label>
                                                    </div>
                                                    <div
                                                        class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <textarea class="form-control"
                                                            id="meta_description" name="meta_description"
                                                            style="height: 150px;"
                                                            data-parsley-errors-container="#content_required1"
                                                            data-parsley-required-message="Please Enter Description">{{ isset($hollowmetaldoors->meta_description) ? $hollowmetaldoors->meta_description : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row form-sec text-end">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" id="submit_form"
                                                    class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- <script>
    $(document).ready(function () {

        $('#bannerdescription').summernote({
            height: 200
        });
        $('#section2_description').summernote({
            height: 200
        });
        $('#section3_description').summernote({
            height: 200
        });
        $('#section4_description').summernote({
            height: 200
        });
        $('#section5_description').summernote({
            height: 200
        });
        $('#section6_description').summernote({
            height: 200
        });

        $('#section7_description').summernote({
            height: 200
        });
        $('#section8_description').summernote({
            height: 200
        });
        $('#section9_description').summernote({
            height: 200
        });
    });
</script> -->
<script>
    const assetPath = "{{ asset('assets/images/user/img-demo_1041.jpg') }}";
    $('#remove_image').click(function (event) {
        event.stopPropagation();
        $('#img_id').val(null);
        $('#profile_avtar').attr('src', assetPath);
        $('#remove_image').css('display', 'none');
        $('#profile_avtar').css('opacity', '1.0');
    });
    $('#hollowmetal_bannerimage_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hollowmetal_bannerimage').val(null);
        $('#hollowmetal_bannerimage_avtar').attr('src', assetPath);
        $('#hollowmetal_bannerimage_remove_image').css('display', 'none');
        $('#hollowmetal_bannerimage_avtar').css('opacity', '1.0');
    });
    $('#section2_image_remove_image').click(function (event) {
        event.stopPropagation();
        $('#section2_image').val(null);
        $('#section2_image_avtar').attr('src', assetPath);
        $('#section2_image_remove_image').css('display', 'none');
        $('#section2_image_avtar').css('opacity', '1.0');
    });
    $('#hm_d_section3_image_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section3_image').val(null);
        $('#hm_d_section3_image_avtar').attr('src', assetPath);
        $('#hm_d_section3_image_remove_image').css('display', 'none');
        $('#hm_d_section3_image_avtar').css('opacity', '1.0');
    });

    $('#hm_d_section4_image_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section4_image').val(null);
        $('#hm_d_section4_image_avtar').attr('src', assetPath);
        $('#hm_d_section4_image_remove_image').css('display', 'none');
        $('#hm_d_section4_image_avtar').css('opacity', '1.0');
    });

    $('#hm_d_section5_image_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section5_image').val(null);
        $('#hm_d_section5_image_avtar').attr('src', assetPath);
        $('#hm_d_section5_image_remove_image').css('display', 'none');
        $('#hm_d_section5_image_avtar').css('opacity', '1.0');
    });

    $('#hm_d_section6_image1_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section6_image').val(null);
        $('#hm_d_section6_image1_avtar').attr('src', assetPath);
        $('#hm_d_section6_image1_remove_image').css('display', 'none');
        $('#hm_d_section6_image1_avtar').css('opacity', '1.0');
    });

    $('#hm_d_section6_image2_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section6_image2').val(null);
        $('#hm_d_section6_image2_avtar').attr('src', assetPath);
        $('#hm_d_section6_image2_remove_image').css('display', 'none');
        $('#hm_d_section6_image2_avtar').css('opacity', '1.0');
    });
    $('#hm_d_section7_image_remove_image').click(function (event) {
        event.stopPropagation();
        $('#hm_d_section7_image').val(null);
        $('#hm_d_section7_image_avtar').attr('src', assetPath);
        $('#hm_d_section7_image_remove_image').css('display', 'none');
        $('#hm_d_section7_image_avtar').css('opacity', '1.0');
    });
</script>
<script>
    $(document).ready(function () {
        $('form').parsley({
            excluded: 'input[type=hidden]:not(.visible)'
        });
        $('#submit_form').on('click', function (e) {

            $('#img_id').addClass('visible');
            $('#footer_img_id').addClass('visible');
            $('#site_favicon_img_required').addClass('visible');
            $('#bg_img_id_cta').addClass('visible');

            // Validate the form
            if (!$('form').parsley().validate()) {
                e.preventDefault();
            }
            // Hide the hidden input again
            $('#img_id').removeClass('visible');
            $('#footer_img_id').removeClass('visible');
            $('#site_favicon_img_required').removeClass('visible');
            $('#bg_img_id_cta').removeClass('visible');

        });
    })
</script>
@endsection