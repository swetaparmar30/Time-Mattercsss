<div class="accordion-body">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
            <div class="row form-sec">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Main Title</label>
                    <input type="text" name="why_choose_title" id="why_choose_title" placeholder="Title"
                        data-parsley-required-message="Please Enter Title"
                        value="{{ isset($why_choose->why_choose_title) ? $why_choose->why_choose_title : '' }}">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Sub Title</label>
                    <input type="text" name="why_choose_sub_title" id="why_choose_sub_title" placeholder="Title"
                        data-parsley-required-message="Please Enter Title"
                        value="{{ isset($why_choose->why_choose_sub_title) ? $why_choose->why_choose_sub_title : '' }}">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
                    <label for="">Section image</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="why_choose_img1" id="why_choose_img_id1"
                            value="{{ isset($why_choose->why_choose_img1) ? $why_choose->why_choose_img1 : '' }}">
                        @if (isset($why_choose->why_choose_img1) && $why_choose->why_choose_img1 != '' && $why_choose->why_choose_img1 != null)
                            @php
                                $img = App\Models\MediaImage::select('name')
                                    ->where('id', $why_choose->why_choose_img1)
                                    ->first();
                            @endphp
                            <div class="image_preview_div">
                                <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar1"
                                    class="profile-img">
                                <a id="remove_why_choose_image1"> <i class="fa fa-times" aria-hidden="true"></i></a>
                            </div>
                        @else
                            <div class="image_preview_div">
                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                    id="why_choose_avtar1" class="profile-img">
                                <a id="remove_why_choose_image1" style="display: none;"> <i class="fa fa-times"
                                        aria-hidden="true"></i></a>
                            </div>
                        @endif
                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                            data-val="why_choose_img1">Choose image</label>
                        @if (isset($why_choose->why_choose_img1) && $why_choose->why_choose_img1 != '' && $why_choose->why_choose_img1 != null)
                        @else
                            <span id="img_alert1" class="parsley-required"
                                style="font-weight: 500 !important;color: red !important;"></span>
                        @endif
                    </div>
                </div>
            </div>
        </div><br><hr>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 1</label>
                            <input type="text" name="why_choose_title1" id="why_choose_title1" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title1) ? $why_choose->why_choose_title1 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 1</label>
                            <textarea class="form-control" id="why_choose_description1" name="why_choose_description1"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description1) ? $why_choose->why_choose_description1 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 1</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img1" id="why_choose_img_id1"
                                    value="{{ isset($why_choose->why_choose_img1) ? $why_choose->why_choose_img1 : '' }}">
                                @if (isset($why_choose->why_choose_img1) && $why_choose->why_choose_img1 != '' && $why_choose->why_choose_img1 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img1)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar1"
                                            class="profile-img">
                                        <a id="remove_why_choose_image1"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar1" class="profile-img">
                                        <a id="remove_why_choose_image1" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img1">Choose image</label>
                                @if (isset($why_choose->why_choose_img1) && $why_choose->why_choose_img1 != '' && $why_choose->why_choose_img1 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div><hr>
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 2</label>
                            <input type="text" name="why_choose_title2" id="why_choose_title2" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title2) ? $why_choose->why_choose_title2 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 2</label>
                            <textarea class="form-control" id="why_choose_description2" name="why_choose_description2"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description2) ? $why_choose->why_choose_description2 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 2</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img2" id="why_choose_img_id2"
                                    value="{{ isset($why_choose->why_choose_img2) ? $why_choose->why_choose_img2 : '' }}">
                                @if (isset($why_choose->why_choose_img2) && $why_choose->why_choose_img2 != '' && $why_choose->why_choose_img2 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img2)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar2"
                                            class="profile-img">
                                        <a id="remove_why_choose_image2"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar2" class="profile-img">
                                        <a id="remove_why_choose_image2" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img2">Choose image</label>
                                @if (isset($why_choose->why_choose_img2) && $why_choose->why_choose_img2 != '' && $why_choose->why_choose_img2 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div><hr>
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 3</label>
                            <input type="text" name="why_choose_title3" id="why_choose_title3" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title3) ? $why_choose->why_choose_title3 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 3</label>
                            <textarea class="form-control" id="why_choose_description3" name="why_choose_description3"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description3) ? $why_choose->why_choose_description3 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 3</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img3" id="why_choose_img_id3"
                                    value="{{ isset($why_choose->why_choose_img3) ? $why_choose->why_choose_img3 : '' }}">
                                @if (isset($why_choose->why_choose_img3) && $why_choose->why_choose_img3 != '' && $why_choose->why_choose_img3 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img3)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar3"
                                            class="profile-img">
                                        <a id="remove_why_choose_image3"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar3" class="profile-img">
                                        <a id="remove_why_choose_image3" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img3">Choose
                                    image</label>
                                @if (isset($why_choose->why_choose_img3) && $why_choose->why_choose_img3 != '' && $why_choose->why_choose_img3 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 4</label>
                            <input type="text" name="why_choose_title4" id="why_choose_title4" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title4) ? $why_choose->why_choose_title4 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 4</label>
                            <textarea class="form-control" id="why_choose_description4" name="why_choose_description4"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description4) ? $why_choose->why_choose_description4 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 4</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img4" id="why_choose_img_id4"
                                    value="{{ isset($why_choose->why_choose_img4) ? $why_choose->why_choose_img4 : '' }}">
                                @if (isset($why_choose->why_choose_img4) && $why_choose->why_choose_img4 != '' && $why_choose->why_choose_img4 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img4)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar4"
                                            class="profile-img">
                                        <a id="remove_why_choose_image4"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar4" class="profile-img">
                                        <a id="remove_why_choose_image4" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img4">Choose
                                    image</label>
                                @if (isset($why_choose->why_choose_img4) && $why_choose->why_choose_img4 != '' && $why_choose->why_choose_img4 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div><hr>
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 5</label>
                            <input type="text" name="why_choose_title5" id="why_choose_title5" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title5) ? $why_choose->why_choose_title5 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 5</label>
                            <textarea class="form-control" id="why_choose_description5" name="why_choose_description5"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description5) ? $why_choose->why_choose_description5 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 5</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img5" id="why_choose_img_id5"
                                    value="{{ isset($why_choose->why_choose_img5) ? $why_choose->why_choose_img5 : '' }}">
                                @if (isset($why_choose->why_choose_img5) && $why_choose->why_choose_img5 != '' && $why_choose->why_choose_img5 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img5)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar5"
                                            class="profile-img">
                                        <a id="remove_why_choose_image5"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar5" class="profile-img">
                                        <a id="remove_why_choose_image5" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img5">Choose
                                    image</label>
                                @if (isset($why_choose->why_choose_img5) && $why_choose->why_choose_img5 != '' && $why_choose->why_choose_img5 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div><hr>
                    <div class="row form-sec">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Title 6</label>
                            <input type="text" name="why_choose_title6" id="why_choose_title6" placeholder="Title"
                                data-parsley-required-message="Please Enter Title"
                                value="{{ isset($why_choose->why_choose_title6) ? $why_choose->why_choose_title6 : '' }}">
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                            <label for="">Description 6</label>
                            <textarea class="form-control" id="why_choose_description6" name="why_choose_description6"
                                style="height: 120px;" data-parsley-errors-container="#content_required"
                                data-parsley-required-message="Please Enter Description">{{ isset($why_choose->why_choose_description6) ? $why_choose->why_choose_description6 : '' }}</textarea>
                        </div>
                        <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label for="">Icon 6</label>
                            <div class="upload-img-sec">
                                <input type="hidden" name="why_choose_img6" id="why_choose_img_id6"
                                    value="{{ isset($why_choose->why_choose_img6) ? $why_choose->why_choose_img6 : '' }}">
                                @if (isset($why_choose->why_choose_img6) && $why_choose->why_choose_img6 != '' && $why_choose->why_choose_img6 != null)
                                    @php
                                        $img = App\Models\MediaImage::select('name')
                                            ->where('id', $why_choose->why_choose_img6)
                                            ->first();
                                    @endphp
                                    <div class="image_preview_div">
                                        <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="why_choose_avtar6"
                                            class="profile-img">
                                        <a id="remove_why_choose_image6"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                @else
                                    <div class="image_preview_div">
                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt=""
                                            id="why_choose_avtar6" class="profile-img">
                                        <a id="remove_why_choose_image6" style="display: none;"> <i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                @endif
                                <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title"
                                    data-val="why_choose_img6">Choose
                                    image</label>
                                @if (isset($why_choose->why_choose_img6) && $why_choose->why_choose_img6 != '' && $why_choose->why_choose_img6 != null)
                                @else
                                    <span id="img_alert1" class="parsley-required"
                                        style="font-weight: 500 !important;color: red !important;"></span>
                                @endif
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
