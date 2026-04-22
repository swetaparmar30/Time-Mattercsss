<div class="accordion-body">
    <div class="row"> 
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" name="system_setting_title" id="setting_title" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->system_setting_title) ? $system_setting->system_setting_title : '' }}">
                </div>
            </div>
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Sub Title</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" name="system_sub_title" id="system_sub_title" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->system_sub_title) ? $system_setting->system_sub_title : '' }}">
                </div>
            </div>
            <div class="row form-sec">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <label for="">Description</label>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control rich-text-editor" id="system_setting_description" name="system_setting_description" style="height: 300px;"  data-parsley-errors-container="#content_required" data-parsley-required-message="Please Enter Description">{{ isset($system_setting->system_setting_description) ? $system_setting->system_setting_description : '' }}</textarea>
                    <span id="content_required" class="parsley-required" style="font-weight: 500 !important;"></span>
                </div>
            </div>
            <div class="row form-sec">
                <label for="">Image </label>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img" id="system_img_id" value="{{ isset($system_setting->system_img) ? $system_setting->system_img : '' }}">
                        @if(isset($system_setting->system_img) && $system_setting->system_img != '' && $system_setting->system_img != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img)->first();
                        @endphp
                        <div class="image_preview_div">
                            <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="system_avtar" class="profile-img" > 
                            <a id="remove_system_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @else
                        <div class="image_preview_div">
                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="system_avtar" class="profile-img"> 
                            <a id="remove_system_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @endif

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img">Choose image</label>
                        @if(isset($system_setting->system_img) && $system_setting->system_img != '' && $system_setting->system_img != null)
                        @else
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;">Please Add Image </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row form-sec">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 1</label>
                    <input type="text" name="title1" id="title1" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->title1) ? $system_setting->title1 : '' }}">
                    <div class="label-sec">
                        <label for="">Notes 1</label>
                        <textarea class="notes" type="text" name="note1" id="note1" placeholder="Title" data-parsley-required-message="Please Enter Notes" value="{{ isset($system_setting->note1) ? $system_setting->note1 : '' }}" style="height: 100px;">{{ isset($system_setting->note1) ? $system_setting->note1 : '' }}</textarea>
                    </div>
                    <div class="label-sec">
                         <label for="">Button Name</label>
                         <input type="text" name="btn_name1" id="btn_name1" placeholder="Button Name" value="{{ isset($system_setting->btn_name1) ? $system_setting->btn_name1 : '' }}">
                    </div>
                    <div class="label-sec">
                         <label for="">Button Url</label>
                         <input type="text" name="btn_url1" id="btn_url1" placeholder="Button Url"  value="{{ isset($system_setting->btn_url1) ? $system_setting->btn_url1 : '' }}">
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="">Icon 1</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img1" id="system_img_id1" value="{{ isset($system_setting->system_img1) ? $system_setting->system_img1 : '' }}">
                        @if(isset($system_setting->system_img1) && $system_setting->system_img1 != '' && $system_setting->system_img1 != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img1)->first();
                        @endphp
                        <div class="image_preview_div">
                            <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="system_avtar1" class="profile-img" > 
                            <a id="remove_system_image1"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @else
                        <div class="image_preview_div">
                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="system_avtar1" class="profile-img"> 
                            <a id="remove_system_image1" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @endif

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img1">Choose image</label>
                        @if(isset($system_setting->system_img1) && $system_setting->system_img1 != '' && $system_setting->system_img1 != null)
                        @else
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        @endif
                    </div>
                </div>
            </div><hr><br>

            <div class="row form-sec">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 2</label>
                    <input type="text" name="title2" id="title2" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->title2) ? $system_setting->title2 : '' }}">
                    <div class="label-sec">
                        <label for="">Notes 2</label>
                        <textarea class="notes" type="text" name="note2" id="note2" placeholder="Title" data-parsley-required-message="Please Enter Notes" value="{{ isset($system_setting->note2) ? $system_setting->note2 : '' }}" style="height: 100px;">{{ isset($system_setting->note2) ? $system_setting->note2 : '' }}</textarea>
                    </div>
                    <div class="label-sec">
                         <label for="">Button Name</label>
                         <input type="text" name="btn_name2" id="btn_name2" placeholder="Button Name" value="{{ isset($system_setting->btn_name2) ? $system_setting->btn_name2 : '' }}">
                    </div>
                    <div class="label-sec">
                         <label for="">Button Url</label>
                         <input type="text" name="btn_url2" id="btn_url2" placeholder="Button Url" value="{{ isset($system_setting->btn_url2) ? $system_setting->btn_url2 : '' }}">
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="">Icon 2</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img2" id="system_img_id2" value="{{ isset($system_setting->system_img2) ? $system_setting->system_img2 : '' }}">
                        @if(isset($system_setting->system_img2) && $system_setting->system_img2 != '' && $system_setting->system_img2 != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img2)->first();
                        @endphp
                        <div class="image_preview_div">
                            <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="system_avtar2" class="profile-img" > 
                            <a id="remove_system_image2"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @else
                        <div class="image_preview_div">
                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="system_avtar2" class="profile-img"> 
                            <a id="remove_system_image2" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @endif

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img2">Choose image</label>
                        @if(isset($system_setting->system_img2) && $system_setting->system_img2 != '' && $system_setting->system_img2 != null)
                        @else
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        @endif
                    </div>
                </div>
            </div><hr><br>

            <div class="row form-sec">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 3</label>
                    <input type="text" name="title3" id="title3" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->title3) ? $system_setting->title3 : '' }}">
                    <div class="label-sec">
                        <label for="">Notes 3</label>
                        <textarea class="notes" type="text" name="note3" id="note3" placeholder="Notes" value="{{ isset($system_setting->note3) ? $system_setting->note3 : '' }}" style="height: 100px;">{{ isset($system_setting->note3) ? $system_setting->note3 : '' }}</textarea>
                    </div>
                    <div class="label-sec">
                         <label for="">Button Name</label>
                         <input type="text" name="btn_name3" id="btn_name3" placeholder="Button Name" value="{{ isset($system_setting->btn_name3) ? $system_setting->btn_name3 : '' }}">
                    </div>
                    <div class="label-sec">
                         <label for="">Button Url</label>
                         <input type="text" name="btn_url3" id="btn_url3" placeholder="Button Url" value="{{ isset($system_setting->btn_url3) ? $system_setting->btn_url3 : '' }}">
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="">Icon 3</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img3" id="system_img_id3" value="{{ isset($system_setting->system_img3) ? $system_setting->system_img3 : '' }}">
                        @if(isset($system_setting->system_img3) && $system_setting->system_img3 != '' && $system_setting->system_img3 != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img3)->first();
                        @endphp
                        <div class="image_preview_div">
                            <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="system_avtar3" class="profile-img" > 
                            <a id="remove_system_image3"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @else
                        <div class="image_preview_div">
                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="system_avtar3" class="profile-img"> 
                            <a id="remove_system_image3" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @endif

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img3">Choose image</label>
                        @if(isset($system_setting->system_img3) && $system_setting->system_img3 != '' && $system_setting->system_img3 != null)
                        @else
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        @endif
                    </div>
                </div>
            </div><hr><br>

            <div class="row form-sec">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 label-sec">
                    <label for="">Title 4</label>
                    <input type="text" name="title4" id="title4" placeholder="Title" data-parsley-required-message="Please Enter Title" value="{{ isset($system_setting->title4) ? $system_setting->title4 : '' }}">
                    <div class="label-sec">
                        <label for="">Notes 4</label>
                        <textarea class="notes" type="text" name="note4" id="note4" placeholder="Title" data-parsley-required-message="Please Enter Notes" value="{{ isset($system_setting->note4) ? $system_setting->note4 : '' }}" style="height: 100px;">{{ isset($system_setting->note4) ? $system_setting->note4 : '' }}</textarea>
                    </div>
                    <div class="label-sec">
                         <label for="">Button Name</label>
                         <input type="text" name="btn_name4" id="btn_name4" placeholder="Title" data-parsley-required-message="Please Enter Button Name" value="{{ isset($system_setting->btn_name4) ? $system_setting->btn_name4 : '' }}">
                    </div>
                    <div class="label-sec">
                         <label for="">Button Url</label>
                         <input type="text" name="btn_url4" id="btn_url4" placeholder="Title" data-parsley-required-message="Please Enter Button Url" value="{{ isset($system_setting->btn_url4) ? $system_setting->btn_url4 : '' }}">
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <label for="">Icon 4</label>
                    <div class="upload-img-sec">
                        <input type="hidden" name="system_img4" id="system_img_id4" value="{{ isset($system_setting->system_img4) ? $system_setting->system_img4 : '' }}">
                        @if(isset($system_setting->system_img4) && $system_setting->system_img4 != '' && $system_setting->system_img4 != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $system_setting->system_img4)->first();
                        @endphp
                        <div class="image_preview_div">
                            <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="system_avtar4" class="profile-img" > 
                            <a id="remove_system_image4"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @else
                        <div class="image_preview_div">
                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="system_avtar4" class="profile-img"> 
                            <a id="remove_system_image4" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        @endif

                        <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title" data-val="system_img4">Choose image</label>
                        @if(isset($system_setting->system_img4) && $system_setting->system_img4 != '' && $system_setting->system_img4 != null)
                        @else
                        <span id="img_alert1" class="parsley-required" style="font-weight: 500 !important;color: red !important;"></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
