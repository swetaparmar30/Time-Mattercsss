@extends('layouts.backend.index')
@section('main_content')
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <form action="{{ route('about.add') }}" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            @csrf
                            @if (isset($about))
                                <input type="hidden" name="about_id" value="{{ isset($about->id) ? $about->id : '' }}">
                            @endif
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                                    <div class="card Recent-Users">
                                        <h5>About Page Settings</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="title"
                                                        value="{{ isset($about->title) ? $about->title : '' }}">
                                                    <label for="title">About Page Title <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="title" id="title"
                                                        placeholder="About Page Title" required
                                                        data-parsley-required-message="Please Enter Title"
                                                        value="{{ isset($about->title) ? $about->title : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="description">Description <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" id="description"
                                                        name="description" style="height: 150px;"
                                                        data-parsley-required="true"
                                                        data-parsley-required-message="Please enter Description"
                                                        data-parsley-errors-container="#description_required">{{ isset($about->description) ? $about->description : '' }}</textarea>
                                                    <span id="description_required"></span>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="missionbutton"
                                                        value="{{ isset($about->missionbutton) ? $about->missionbutton : '' }}">
                                                    <label for="missionbutton"> Button <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="missionbutton" id="missionbutton"
                                                        placeholder="Button Name"
                                                        data-parsley-required-message="Please Enter Button Title"
                                                        value="{{ isset($about->missionbutton) ? $about->missionbutton : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="missionbuttonurl"
                                                        value="{{ isset($about->missionbuttonurl) ? $about->missionbuttonurl : '' }}">
                                                    <label for="missionbuttonurl">Button Url<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="missionbuttonurl" id="missionbuttonurl"
                                                        placeholder="Button URL"
                                                        data-parsley-required-message="Please Enter Url"
                                                        value="{{ isset($about->missionbuttonurl) ? $about->missionbuttonurl : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="missiontitle"
                                                        value="{{ isset($about->missiontitle) ? $about->missiontitle : '' }}">
                                                    <label for="missiontitle">Who We Are Title <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="missiontitle" id="missiontitle"
                                                        placeholder="About Page Title" required
                                                        data-parsley-required-message="Please Enter Title"
                                                        value="{{ isset($about->missiontitle) ? $about->missiontitle : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="missiondescription">Who We Are Description <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" id="missiondescription"
                                                        name="missiondescription" style="height: 150px;"
                                                        data-parsley-required="true"
                                                        data-parsley-required-message="Please enter Description"
                                                        data-parsley-errors-container="#missiondescription_required">{{ isset($about->missiondescription) ? $about->missiondescription : '' }}</textarea>
                                                    <span id="missiondescription_required"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- how we deliver -->
                                    <div class="card Recent-Users next-box">
                                        <h5>How We Deliver</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Title</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="how_we_deliver_title" id=""
                                                        placeholder="Type here"
                                                        value="{{ isset($about->how_we_deliver_title) ? $about->how_we_deliver_title : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Description</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor"
                                                        name="how_we_deliver_desc" id="how_we_deliver_desc" rows="5"
                                                        cols="10">{{ isset($about->how_we_deliver_desc) ? $about->how_we_deliver_desc : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Image Notes</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="hwd_img_note" id="hwd_img_note"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->hwd_img_note) ? $about->hwd_img_note : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="hwd_subtitle_1" id="" placeholder="Type here"
                                                        value="{{ isset($about->hwd_subtitle_1) ? $about->hwd_subtitle_1 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="hwd_note_1" id="hwd_note_1"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->hwd_note_1) ? $about->hwd_note_1 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="hwd_subtitle_2" id="" placeholder="Type here"
                                                        value="{{ isset($about->hwd_subtitle_2) ? $about->hwd_subtitle_2 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="hwd_note_2" id="hwd_note_2"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->hwd_note_2) ? $about->hwd_note_2 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="hwd_subtitle_3" id="" placeholder="Type here"
                                                        value="{{ isset($about->hwd_subtitle_3) ? $about->hwd_subtitle_3 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="hwd_note_3" id="hwd_note_3"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->hwd_note_3) ? $about->hwd_note_3 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 4</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="hwd_subtitle_4" id="" placeholder="Type here"
                                                        value="{{ isset($about->hwd_subtitle_4) ? $about->hwd_subtitle_4 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 4</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="hwd_note_4" id="hwd_note_4"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->hwd_note_4) ? $about->hwd_note_4 : '' }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end how we deliver -->

                                    <!-- c & v -->
                                    <div class="card Recent-Users next-box">
                                        <h5>Culture & Values</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="historysubtitle"
                                                        value="{{ isset($about->historysubtitle) ? $about->historysubtitle : '' }}">
                                                    <label for="historysubtitle">Culture & Values Title <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="historysubtitle" id="historysubtitle"
                                                        placeholder="Culture & Values Title" required
                                                        data-parsley-required-message="Please Enter Title"
                                                        value="{{ isset($about->historysubtitle) ? $about->historysubtitle : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="historydescription">Culture & Values Description <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" id="historydescription"
                                                        name="historydescription" style="height: 150px;"
                                                        data-parsley-required="true"
                                                        data-parsley-required-message="Please enter Description"
                                                        data-parsley-errors-container="#historydescription_required">{{ isset($about->historydescription) ? $about->historydescription : '' }}</textarea>
                                                    <span id="historydescription_required"></span>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Image Notes</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_img_note" id="cv_img_note"
                                                        rows="2" style="height:80px"
                                                        cols="10">{{ isset($about->cv_img_note) ? $about->cv_img_note : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="cv_subtitle_1" id="" placeholder="Type here"
                                                        value="{{ isset($about->cv_subtitle_1) ? $about->cv_subtitle_1 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_note_1" id="cv_note_1" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->cv_note_1) ? $about->cv_note_1 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="cv_subtitle_2" id="" placeholder="Type here"
                                                        value="{{ isset($about->cv_subtitle_2) ? $about->cv_subtitle_2 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_note_2" id="cv_note_2" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->cv_note_2) ? $about->cv_note_2 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="cv_subtitle_3" id="" placeholder="Type here"
                                                        value="{{ isset($about->cv_subtitle_3) ? $about->cv_subtitle_3 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_note_3" id="cv_note_3" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->cv_note_3) ? $about->cv_note_3 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 4</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="cv_subtitle_4" id="" placeholder="Type here"
                                                        value="{{ isset($about->cv_subtitle_4) ? $about->cv_subtitle_4 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 4</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_note_4" id="cv_note_4" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->cv_note_4) ? $about->cv_note_4 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 5</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="cv_subtitle_5" id="" placeholder="Type here"
                                                        value="{{ isset($about->cv_subtitle_5) ? $about->cv_subtitle_5 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 5</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="cv_note_5" id="cv_note_5" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->cv_note_5) ? $about->cv_note_5 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="historybutton"
                                                        value="{{ isset($about->historybutton) ? $about->historybutton : '' }}">
                                                    <label for="historybutton">Section 4 Button <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="historybutton" id="historybutton"
                                                        placeholder="Button Name"
                                                        data-parsley-required-message="Please Enter Button Title"
                                                        value="{{ isset($about->historybutton) ? $about->historybutton : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <input type="hidden" name="historybuttonurl"
                                                        value="{{ isset($about->historybuttonurl) ? $about->historybuttonurl : '' }}">
                                                    <label for="historybuttonurl">Section 4 Button Url<span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="historybuttonurl" id="historybuttonurl"
                                                        placeholder="Button URL"
                                                        data-parsley-required-message="Please Enter Url"
                                                        value="{{ isset($about->historybuttonurl) ? $about->historybuttonurl : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end c & v -->

                                    <!-- Executive Leadership -->
                                    <div class="card Recent-Users next-box">
                                        <h5>Executive Leadership</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Section Title</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="el_title" id="" placeholder="Type here"
                                                        value="{{ isset($about->el_title) ? $about->el_title : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Name 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="mv_title_1" id="" placeholder="Type here"
                                                        value="{{ isset($mission_values->mv_title_1) ? $mission_values->mv_title_1 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Post</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="mv_post_1" id="" placeholder="Type here"
                                                        value="{{ isset($mission_values->mv_post_1) ? $mission_values->mv_post_1 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" name="mv_description_1"
                                                        id="mv_description_1" rows="5"
                                                        cols="10">{{ isset($mission_values->mv_description_1) ? $mission_values->mv_description_1 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Icon 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="mv_icon_1" id="mv_icon_1"
                                                            value="{{ isset($mission_values->mv_icon_1) ? $mission_values->mv_icon_1 : '' }}">
                                                        @if (isset($mission_values->mv_icon_1) && $mission_values->mv_icon_1 != '' && $mission_values->mv_icon_1 != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $mission_values->mv_icon_1)
                                                                    ->first();
                                                            @endphp
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                    id="mvicon1_banner_avtar" class="profile-img">
                                                                <a id="mvicon1_banner_remove_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        @else
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="mvicon1_banner_avtar" class="profile-img">
                                                                <a id="mvicon1_banner_remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="mv_icon_1">Choose image</label>
                                                        @if (isset($mission_values->mv_icon_1) && $mission_values->mv_icon_1 != '' && $mission_values->mv_icon_1 != null)
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
                                                    <label for="">Name 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="mv_title_2" id="" placeholder="Type here"
                                                        value="{{ isset($mission_values->mv_title_2) ? $mission_values->mv_title_2 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">post </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="mv_post_2" id="" placeholder="Type here"
                                                        value="{{ isset($mission_values->mv_post_2) ? $mission_values->mv_post_2 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Short Description 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" name="mv_description_2"
                                                        id="mv_description_2" rows="5"
                                                        cols="10">{{ isset($mission_values->mv_description_2) ? $mission_values->mv_description_2 : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Icon 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <div class="upload-img-sec">
                                                        <input type="hidden" name="mv_icon_2" id="mv_icon_2"
                                                            value="{{ isset($mission_values->mv_icon_2) ? $mission_values->mv_icon_2 : '' }}">
                                                        @if (isset($mission_values->mv_icon_2) && $mission_values->mv_icon_2 != '' && $mission_values->mv_icon_2 != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $mission_values->mv_icon_2)
                                                                    ->first();
                                                            @endphp
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                    id="mvicon2_banner_avtar" class="profile-img">
                                                                <a id="mvicon2_banner_remove_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        @else
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="mvicon2_banner_avtar" class="profile-img">
                                                                <a id="mvicon2_banner_remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="mv_icon_2">Choose image</label>
                                                        @if (isset($mission_values->mv_icon_2) && $mission_values->mv_icon_2 != '' && $mission_values->mv_icon_2 != null)
                                                        @else
                                                            <span id="img_alert1" class="parsley-required"
                                                                style="font-weight: 500 !important;color: red !important;"></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!--  -->
                                            <!-- <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Title 3</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <input type="text" name="mv_title_3" id="" placeholder="Type here"
                                                                                                                value="{{ isset($mission_values->mv_title_3) ? $mission_values->mv_title_3 : '' }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Short Description 3</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <textarea class="form-control rich-text-editor" name="mv_description_3"
                                                                                                                id="mv_description_3" rows="5"
                                                                                                                cols="10">{{ isset($mission_values->mv_description_3) ? $mission_values->mv_description_3 : '' }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Icon 3</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <div class="upload-img-sec">
                                                                                                                <input type="hidden" name="mv_icon_3" id="mv_icon_3"
                                                                                                                    value="{{ isset($mission_values->mv_icon_3) ? $mission_values->mv_icon_3 : '' }}">
                                                                                                                @if (isset($mission_values->mv_icon_3) && $mission_values->mv_icon_3 != '' && $mission_values->mv_icon_3 != null)
                                                                                                                    @php
                                                                                                                        $img = App\Models\MediaImage::select('name')
                                                                                                                            ->where('id', $mission_values->mv_icon_3)
                                                                                                                            ->first();
                                                                                                                    @endphp
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                                                                            id="mvicon3_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon3_banner_remove_image"> <i class="fa fa-times"
                                                                                                                                aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                                                                            alt="" id="mvicon3_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon3_banner_remove_image" style="display: none;"> <i
                                                                                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <label for="" style="cursor: pointer;"
                                                                                                                    class="choose_file hm-choose-img-title"
                                                                                                                    data-val="mv_icon_3">Choose image</label>
                                                                                                                @if (isset($mission_values->mv_icon_3) && $mission_values->mv_icon_3 != '' && $mission_values->mv_icon_3 != null)
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
                                                                                                            <label for="">Title 4</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <input type="text" name="mv_title_4" id="" placeholder="Type here"
                                                                                                                value="{{ isset($mission_values->mv_title_4) ? $mission_values->mv_title_4 : '' }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Short Description 4</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <textarea class="form-control rich-text-editor" name="mv_description_4"
                                                                                                                id="mv_description_4" rows="5"
                                                                                                                cols="10">{{ isset($mission_values->mv_description_4) ? $mission_values->mv_description_4 : '' }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Icon 4</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <div class="upload-img-sec">
                                                                                                                <input type="hidden" name="mv_icon_4" id="mv_icon_4"
                                                                                                                    value="{{ isset($mission_values->mv_icon_4) ? $mission_values->mv_icon_4 : '' }}">
                                                                                                                @if (isset($mission_values->mv_icon_4) && $mission_values->mv_icon_4 != '' && $mission_values->mv_icon_4 != null)
                                                                                                                    @php
                                                                                                                        $img = App\Models\MediaImage::select('name')
                                                                                                                            ->where('id', $mission_values->mv_icon_4)
                                                                                                                            ->first();
                                                                                                                    @endphp
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                                                                            id="mvicon4_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon4_banner_remove_image"> <i class="fa fa-times"
                                                                                                                                aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                                                                            alt="" id="mvicon4_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon4_banner_remove_image" style="display: none;"> <i
                                                                                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <label for="" style="cursor: pointer;"
                                                                                                                    class="choose_file hm-choose-img-title"
                                                                                                                    data-val="mv_icon_4">Choose image</label>
                                                                                                                @if (isset($mission_values->mv_icon_4) && $mission_values->mv_icon_4 != '' && $mission_values->mv_icon_4 != null)
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
                                                                                                            <label for="">Title 5</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <input type="text" name="mv_title_5" id="" placeholder="Type here"
                                                                                                                value="{{ isset($mission_values->mv_title_5) ? $mission_values->mv_title_5 : '' }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Short Description 5</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <textarea class="form-control rich-text-editor" name="mv_description_5"
                                                                                                                id="mv_description_5" rows="5"
                                                                                                                cols="10">{{ isset($mission_values->mv_description_5) ? $mission_values->mv_description_5 : '' }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Icon 5</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <div class="upload-img-sec">
                                                                                                                <input type="hidden" name="mv_icon_5" id="mv_icon_5"
                                                                                                                    value="{{ isset($mission_values->mv_icon_5) ? $mission_values->mv_icon_5 : '' }}">
                                                                                                                @if (isset($mission_values->mv_icon_5) && $mission_values->mv_icon_5 != '' && $mission_values->mv_icon_5 != null)
                                                                                                                    @php
                                                                                                                        $img = App\Models\MediaImage::select('name')
                                                                                                                            ->where('id', $mission_values->mv_icon_5)
                                                                                                                            ->first();
                                                                                                                    @endphp
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                                                                            id="mvicon5_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon5_banner_remove_image"> <i class="fa fa-times"
                                                                                                                                aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                                                                            alt="" id="mvicon5_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon5_banner_remove_image" style="display: none;"> <i
                                                                                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <label for="" style="cursor: pointer;"
                                                                                                                    class="choose_file hm-choose-img-title"
                                                                                                                    data-val="mv_icon_5">Choose image</label>
                                                                                                                @if (isset($mission_values->mv_icon_5) && $mission_values->mv_icon_5 != '' && $mission_values->mv_icon_5 != null)
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
                                                                                                            <label for="">Title 6</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <input type="text" name="mv_title_6" id="" placeholder="Type here"
                                                                                                                value="{{ isset($mission_values->mv_title_6) ? $mission_values->mv_title_6 : '' }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Short Description 6</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <textarea class="form-control rich-text-editor" name="mv_description_6"
                                                                                                                id="mv_description_6" rows="5"
                                                                                                                cols="10">{{ isset($mission_values->mv_description_6) ? $mission_values->mv_description_6 : '' }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row form-sec">
                                                                                                        <div
                                                                                                            class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                                                                            <label for="">Icon 6</label>
                                                                                                        </div>
                                                                                                        <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                                                            <div class="upload-img-sec">
                                                                                                                <input type="hidden" name="mv_icon_6" id="mv_icon_6"
                                                                                                                    value="{{ isset($mission_values->mv_icon_6) ? $mission_values->mv_icon_6 : '' }}">
                                                                                                                @if (isset($mission_values->mv_icon_6) && $mission_values->mv_icon_6 != '' && $mission_values->mv_icon_6 != null)
                                                                                                                    @php
                                                                                                                        $img = App\Models\MediaImage::select('name')
                                                                                                                            ->where('id', $mission_values->mv_icon_6)
                                                                                                                            ->first();
                                                                                                                    @endphp
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                                                                            id="mvicon6_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon6_banner_remove_image"> <i class="fa fa-times"
                                                                                                                                aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @else
                                                                                                                    <div class="image_preview_div">
                                                                                                                        <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                                                                            alt="" id="mvicon6_banner_avtar" class="profile-img">
                                                                                                                        <a id="mvicon6_banner_remove_image" style="display: none;"> <i
                                                                                                                                class="fa fa-times" aria-hidden="true"></i></a>
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <label for="" style="cursor: pointer;"
                                                                                                                    class="choose_file hm-choose-img-title"
                                                                                                                    data-val="mv_icon_6">Choose image</label>
                                                                                                                @if (isset($mission_values->mv_icon_6) && $mission_values->mv_icon_6 != '' && $mission_values->mv_icon_6 != null)
                                                                                                                @else
                                                                                                                    <span id="img_alert1" class="parsley-required"
                                                                                                                        style="font-weight: 500 !important;color: red !important;"></span>
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div> -->

                                        </div>
                                    </div>
                                    <!-- end Executive Leadership -->

                                    <!-- Our Specialists -->
                                    <div class="card Recent-Users next-box">
                                        <h5>Our Specialists</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Title </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="our_history_title" id=""
                                                        placeholder="Type here"
                                                        value="{{ isset($about->our_history_title) ? $about->our_history_title : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Description </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" name="our_history_desc"
                                                        id="our_history_desc" rows="5"
                                                        cols="10">{{ isset($about->our_history_desc) ? $about->our_history_desc : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="os_subtitle_1" id="" placeholder="Type here"
                                                        value="{{ isset($about->os_subtitle_1) ? $about->os_subtitle_1 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 1</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="os_note_1" id="os_note_1" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->os_note_1) ? $about->os_note_1 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="os_subtitle_2" id="" placeholder="Type here"
                                                        value="{{ isset($about->os_subtitle_2) ? $about->os_subtitle_2 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 2</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="os_note_2" id="os_note_2" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->os_note_2) ? $about->os_note_2 : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Sub Title 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="os_subtitle_3" id="" placeholder="Type here"
                                                        value="{{ isset($about->os_subtitle_3) ? $about->os_subtitle_3 : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Note 3</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" name="os_note_3" id="os_note_3" rows="2"
                                                        style="height:80px"
                                                        cols="10">{{ isset($about->os_note_3) ? $about->os_note_3 : '' }}</textarea>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <!-- end Our Specialists -->

                                    <!-- why Time Matters section -->
                                    <div class="card Recent-Users next-box">
                                        <h5>Why TimeMatters</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Title </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="why_title" id="" placeholder="Type here"
                                                        value="{{ isset($about->why_title) ? $about->why_title : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Description </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control rich-text-editor" name="why_desc"
                                                        id="why_desc" rows="5"
                                                        cols="10">{{ isset($about->why_desc) ? $about->why_desc : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Button Name </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="why_button_name" id="" placeholder="Type here"
                                                        value="{{ isset($about->why_button_name) ? $about->why_button_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Button Url </label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" name="why_button_url" id="" placeholder="Type here"
                                                        value="{{ isset($about->why_button_url) ? $about->why_button_url : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Why time matters -->


                                    <div class="card Recent-Users next-box" @if (in_array(auth()->user()->role, ['dealer']))
                                    style="display:none" @endif>
                                        <h5>Meta Tags</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Title </label>
                                                </div>
                                                <div
                                                    class=" col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12
                                                                                                                                                                col-xs-12">
                                                    <input type="text" name="meta_title" id="meta_title" placeholder="Title"
                                                        value="{{ isset($about->meta_title) ? $about->meta_title : '' }}"
                                                        data-parsley-required-message="Please Enter Title">
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Keyword</label>
                                                </div>
                                                <div
                                                    class=" col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12
                                                                                                                                                                col-xs-12">
                                                    <input type="text" name="meta_keyword" id="meta_keyword"
                                                        placeholder="Meta Keyword"
                                                        value="{{ isset($about->meta_keyword) ? $about->meta_keyword : '' }}"
                                                        data-parsley-required-message="Please Enter Sub Title">
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Meta Description</label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <textarea class="form-control" id="meta_description"
                                                        name="meta_description" style="height: 150px;"
                                                        data-parsley-errors-container="#content_required1"
                                                        data-parsley-required-message="Please Enter Description"
                                                        placeholder="Meta Description">{{ isset($about->meta_description) ? $about->meta_description : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-sec text-end">
                                            <div
                                                class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" id="submit_form" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                                    <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                        <h5>About Banner Background</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <div class="upload-img-sec text-center image_preview_div">
                                                        <input type="hidden" name="bannerimage" id="img_id"
                                                            value="{{ isset($about->bannerimage) ? $about->bannerimage : '' }}"
                                                            data-parsley-errors-container="#site_img_required"
                                                            data-parsley-trigger="change"
                                                            data-parsley-required-message="Please choose an image.">
                                                        @if (isset($about->bannerimage) && $about->bannerimage != '' && $about->bannerimage != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $about->bannerimage)
                                                                    ->first();
                                                            @endphp
                                                            @if (isset($img->name) && $img->name != '')
                                                                <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                    id="profile_avtar" class="profile-img">
                                                                <a id="remove_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            @else
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="profile_avtar" class="profile-img">
                                                                <a id="remove_image" style="display: none;"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                alt="" id="profile_avtar" class="profile-img">
                                                            <a id="remove_image" style="display: none;"> <i class="fa fa-times"
                                                                    aria-hidden="true"></i></a>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title">Choose image</label>
                                                    </div>
                                                    <span class="error_field" id="site_img_required"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                        <h5>About Mobile Banner Background</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <div class="upload-img-sec text-center image_preview_div">
                                                        <input type="hidden" name="abt_mb_bannerimage"
                                                            id="abt_mb_bannerimage"
                                                            value="{{ isset($about->abt_mb_bannerimage) ? $about->abt_mb_bannerimage : '' }}">
                                                        @if (isset($about->abt_mb_bannerimage) && $about->abt_mb_bannerimage != '' && $about->abt_mb_bannerimage != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $about->abt_mb_bannerimage)
                                                                    ->first();
                                                            @endphp
                                                            @if (isset($img->name) && $img->name != '')
                                                                <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                    id="abt_mb_profile_avtar" class="profile-img">
                                                                <a id="abt_mb_remove_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            @else
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="abt_mb_profile_avtar" class="profile-img">
                                                                <a id="abt_mb_remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                alt="" id="abt_mb_profile_avtar" class="profile-img">
                                                            <a id="abt_mb_remove_image" style="display: none;"> <i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="abt_mb_bannerimage">Choose image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                        <h5>Who We are Image</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <div class="upload-img-sec text-center">
                                                        <input type="hidden" name="teambackground" id="footer_img_id"
                                                            value="{{ isset($about->teambackground) ? $about->teambackground : '' }}"
                                                            data-parsley-errors-container="#teambackground_img_required"
                                                            data-parsley-trigger="change"
                                                            data-parsley-required-message="Please choose an image.">
                                                        @if (isset($about->teambackground) && $about->teambackground != '' && $about->teambackground != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $about->teambackground)
                                                                    ->first();
                                                            @endphp
                                                            @if (isset($img->name) && $img->name != '')
                                                                <div class="image_preview_div">
                                                                    <img src="{{ asset('uploads/' . $img->name) }}" alt=""
                                                                        id="footer_profile_avtar" class="profile-img">
                                                                    <a id="footer_remove_image"> <i class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            @else
                                                                <div class="image_preview_div">
                                                                    <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                        alt="" id="footer_profile_avtar" class="profile-img">
                                                                    <a id="footer_remove_image" style="display: none;"> <i
                                                                            class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="footer_profile_avtar" class="profile-img">
                                                                <a id="footer_remove_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            data-val="footer_profile_avtar"
                                                            class="choose_file hm-choose-img-title">Choose image</label>
                                                    </div>
                                                    <span class="error_field" id="teambackground_img_required"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                        <h5>Culture & Values Image</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                    <div class="upload-img-sec text-center">
                                                        <input type="hidden" name="historyimage" id="favicon_id"
                                                            value="{{ isset($about->historyimage) ? $about->historyimage : '' }}"
                                                            required
                                                            data-parsley-errors-container="#site_favicon_img_required"
                                                            data-parsley-trigger="change"
                                                            data-parsley-required-message="Please choose an image.">
                                                        @if (isset($about->historyimage) && $about->historyimage != '' && $about->historyimage != null)
                                                            @php
                                                                $img = App\Models\MediaImage::select('name')
                                                                    ->where('id', $about->historyimage)
                                                                    ->first();
                                                                if (isset($img) && $img != '' && $img != null) {
                                                                    $path = asset('uploads/' . $img->name);
                                                                } else {
                                                                    $path = asset(
                                                                        'assets/images/user/img-demo_1041.jpg',
                                                                    );
                                                                }
                                                            @endphp
                                                            <div class="image_preview_div">
                                                                <img src="{{ $path }}" alt="" id="favicon_avtar"
                                                                    class="profile-img">
                                                                <a id="remove_favi_image"> <i class="fa fa-times"
                                                                        aria-hidden="true"></i></a>
                                                            </div>
                                                        @else
                                                            <div class="image_preview_div">
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}"
                                                                    alt="" id="favicon_avtar" class="profile-img">
                                                                <a id="remove_favi_image" style="display: none;"> <i
                                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                        @endif
                                                        <label for="" style="cursor: pointer;"
                                                            class="choose_file hm-choose-img-title"
                                                            data-val="faviconimg">Choose image</label>
                                                    </div>
                                                    <span class="error_field" id="site_favicon_img_required"></span>
                                                </div>
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
    {{-- <script>
    $(document).ready(function () {
        $('#code_preview0').summernote({
            height: 300
        });
        $('#map').summernote({
            height: 200
        });
        $('#copyright').summernote({
            height: 200
        });
        $('#location').summernote({
            height: 200
        });
        $('#our_history_desc').summernote({
            height: 200
        });

         $('#description').summernote({ height: 300 });
         $('#missiondescription').summernote({ height: 300 });
         $('#historydescription').summernote({ height: 300 });
         $('#mv_description_1').summernote({ height: 300 });
         $('#mv_description_2').summernote({ height: 300 });
         $('#mv_description_3').summernote({ height: 300 });
         $('#mv_description_4').summernote({ height: 300 });
         $('#mv_description_5').summernote({ height: 300 });
         $('#mv_description_6').summernote({ height: 300 });

    });
</script> --}}
    <script>
        const assetPath = "{{ asset('assets/images/user/img-demo_1041.jpg') }}";
        $('#remove_image').click(function(event) {
            event.stopPropagation();
            $('#img_id').val(null);
            $('#profile_avtar').attr('src', assetPath);
            $('#remove_image').css('display', 'none');
            $('#profile_avtar').css('opacity', '1.0');
        });
        $('#remove_favi_image').click(function(event) {
            event.stopPropagation();
            $('#favicon_id').val(null);
            $('#favicon_avtar').attr('src', assetPath);
            $('#remove_favi_image').css('display', 'none');
            $('#favicon_avtar').css('opacity', '1.0');
        });
        $('#footer_remove_image').click(function(event) {
            event.stopPropagation();
            $('#footer_img_id').val(null);
            $('#footer_profile_avtar').attr('src', assetPath);
            $('#footer_remove_image').css('display', 'none');
            $('#footer_profile_avtar').css('opacity', '1.0');
        });
        $('#mvicon1_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_1').val(null);
            $('#mvicon1_banner_avtar').attr('src', assetPath);
            $('#mvicon1_banner_remove_image').css('display', 'none');
            $('#mvicon1_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon2_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_2').val(null);
            $('#mvicon2_banner_avtar').attr('src', assetPath);
            $('#mvicon2_banner_remove_image').css('display', 'none');
            $('#mvicon2_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_3').val(null);
            $('#mvicon3_banner_avtar').attr('src', assetPath);
            $('#mvicon3_banner_remove_image').css('display', 'none');
            $('#mvicon3_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon3_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_3').val(null);
            $('#mvicon4_banner_avtar').attr('src', assetPath);
            $('#mvicon4_banner_remove_image').css('display', 'none');
            $('#mvicon4_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon5_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_5').val(null);
            $('#mvicon5_banner_avtar').attr('src', assetPath);
            $('#mvicon5_banner_remove_image').css('display', 'none');
            $('#mvicon5_banner_avtar').css('opacity', '1.0');
        });
        $('#mvicon6_banner_remove_image').click(function(event) {
            event.stopPropagation();
            $('#mv_icon_6').val(null);
            $('#mvicon6_banner_avtar').attr('src', assetPath);
            $('#mvicon6_banner_remove_image').css('display', 'none');
            $('#mvicon6_banner_avtar').css('opacity', '1.0');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('form').parsley({
                excluded: 'input[type=hidden]:not(.visible)'
            });
            $('#submit_form').on('click', function(e) {

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
