@extends('layouts.backend.index')
@section('main_content')
<style>
.rating {
  border: none;
  float: left;
  display: flex;
  flex-direction: row-reverse;
}

.rating > label {
 color: #90A0A3;
  float: right;
}

.rating > label:before {
  margin: 5px;
  font-size: 2em;
  font-family: FontAwesome;
  content: "\f005";
  display: inline-block;
}

.rating > input {
  display: none;
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #F79426;
}

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label {
  color: #FECE31;
}
</style>
 <div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->

            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    @if (isset($testi) && $testi != '')
                            <form action="{{ route('testimonials.update', ['id' => $testi->id]) }}" method="POST"
                                data-parsley-validate="" enctype="multipart/form-data">
                            @else
                                <form action="{{ route('testimonials.store') }}" method="POST" data-parsley-validate=""
                                    enctype="multipart/form-data">
                        @endif
                        @csrf
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">
                            <div class="card Recent-Users">
                                @if (isset($testi) && $testi != '')
                                <h5>Edit Testimonial</h5>
                                @else
                                <h5>Add Testimonial</h5>
                                @endif
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <input type="hidden" name="article_id"
                                                    value="{{ isset($testi->id) ? $testi->id : '' }}">
                                                <label for="">Name <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="testi_name" id="testi_name" placeholder="Name" required
                                                data-parsley-required-message="Please Enter Name" value="{{ isset($testi->name) ? $testi->name : '' }}">
                                                <span id="error_name" style="color:red;display:none;">This Title is
                                                    Already
                                                    Taken</span>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Slug <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="testi_Slug" id="testi_Slug" placeholder="Slug" required
                                                data-parsley-required-message="Please Enter Slug" value="{{ isset($testi->slug) ? $testi->slug : '' }}">
                                            </div>
                                        </div>

                                         <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Sub Content </label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                 <input type="text" name="sub_content" id="" class=""  value="{{ isset($testi->sub_content) ? $testi->sub_content : '' }}" placeholder="Sub Content">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">E-mail</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="testi_email" id="" value="{{ isset($testi->email) ? $testi->email : '' }}" placeholder="E-Mail">
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Phone</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <input type="text" name="testi_phone" id="" class="imput-mask" placeholder="Phone"  value="{{ isset($testi->phone) ? $testi->phone : '' }}" placeholder="Phone">
                                            </div>
                                        </div>

                                          <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Rating <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                              
                                               <div class="rating">
                                                  <input type="radio" id="star5" name="rating" value="5" {{isset($testi->rating) && $testi->rating == 5 ? 'checked' : '' }}/>
                                                  <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                  <input type="radio" id="star4" name="rating" value="4" {{ isset($testi->rating) && $testi->rating == 4 ? 'checked' : '' }}/>
                                                  <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                  <input type="radio" id="star3" name="rating" value="3" {{ isset($testi->rating) && $testi->rating == 3 ? 'checked' : '' }}/>
                                                  <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                  <input type="radio" id="star2" name="rating" value="2" {{ isset($testi->rating) && $testi->rating == 2 ? 'checked' : '' }}/>
                                                  <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                  <input type="radio" id="star1" name="rating" value="1" {{ isset($testi->rating) && $testi->rating == 1 ? 'checked' : '' }}/>
                                                  <label class="star" for="star1" title="Bad" aria-hidden="true"></label>


                                                </div>
                                                      
                                            </div>
                                        </div>

                                          <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Review</label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" id="review1" name="review" {{ isset($testi->review) && $testi->review == 1 ? 'checked' : '' }}>
                                                <label style="color: #888 !important; cursor: pointer;" class="custom-control-label" for="review1">Review from google</label>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-sec">
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                <label for="">Content <span style="color: red;margin: 0;">*</span></label>
                                            </div>
                                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                
                                                <textarea class="form-control rich-text-editor" id="code_preview0" name="testi_content" style="height: 300px;" data-parsley-required="true" data-parsley-required-message="Please enter Content" data-parsley-errors-container="#content_required">{{ isset($testi->content) ? $testi->content : '' }}</textarea>
                                                <span id="content_required"></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 cpl-sm-12 col-xs-12 add-article form-main-sec right-sec">
                            <div class="card Recent-Users next-box" style="margin-top: 0 !important;">
                                <h5>Testimonial Image</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <div class="upload-img-sec text-center">
                                                    <input type="hidden" name="testi_image" id="img_id" value="{{ isset($testi->img) ? $testi->img : '' }}">
                                                    @if(isset($testi->img) && $testi->img != '' && $testi->img != null)
                                                    @php
                                                        $img = App\Models\MediaImage::select('name')->where('id', $testi->img)->first();
                                                    @endphp
                                                    <div class="image_preview_div">
                                                    <img src="{{ asset('uploads/'.$img->name) }}" alt="" id="profile_avtar" class="profile-img" id="profile_avtar"> 
                                                    <a id="remove_image"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    @else
                                                    <div class="image_preview_div">
                                                    <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="profile_avtar" class="profile-img"> 
                                                    <a id="remove_image" style="display: none;"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                    @endif
                                                    
                                                    <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title">Choose image</label>
                                                </div>
                                            </div>
                                            
                                        </div>

                                </div>
                            </div>

                           

                            <div class="card Recent-Users next-box">
                                <h5>Testimonial Status</h5>
                                <div class="card-block px-0 py-3">
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <span style="margin-right: 50px;">Enable/Disable</span>
                                                <input type="checkbox" data-toggle="toggle" checked  name="is_featured" @if(isset($testi->is_featured) && $testi->is_featured == '1') checked @endif>
                                            </div>
                                        </div>
                                        <div class="row form-sec">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        
                        </div>
                        <!--[ Recent Users ] end-->

                    </div>
                </form>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- <script>
    $(document).ready(function() {
     $('#code_preview0').summernote({height: 300});
     });
</script> -->
    <script>
        const assetPath = "{{ asset('assets/images/user/img-demo_1041.jpg') }}";
        
        $('#remove_image').click(function(event) {
            event.stopPropagation(); 
            $('#img_id').val(null);

            $('#profile_avtar').attr('src', assetPath);
            $('#remove_image').css('display', 'none');
            $('#profile_avtar').css('opacity', '1.0');
        });
    </script>
    <script>
        $(document).on('change', '#testi_name', function(e) {
            const $nameInput = $("#testi_name");
            const $slugInput = $("#testi_Slug");
            var token = $("meta[name='csrf-token']").attr("content");
            var val = $(this).val();
            $.ajax({
                url: "{{ route('testimonials.check_testimonial_slug') }}",
                method: "POST",
                data: {
                    _token: token,
                    name: val
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#error_name').show();
                    } else {
                        $('#error_name').hide();
                        const nameValue = $nameInput.val();
                        const slugValue = nameValue.replace(/\s+/g, "-").toLowerCase();
                        $slugInput.val(slugValue);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Something Went Wrong!');
                }
            });
        });
    </script>
@endsection
