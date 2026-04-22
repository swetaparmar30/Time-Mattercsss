@extends('layouts.backend.index')

@section('main_content')

    <div class="pcoded-wrapper">

        <div class="pcoded-content">

            <div class="pcoded-inner-content">

                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->

                <div class="main-body">

                    <div class="type-wrapper">

                        <!-- [ Main Content ] start -->

                       <form action="{{ route('locationdata.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" id="faq_id" name="faq_id"

                                value=" {{ isset($location->id) ? $location->id : '' }} ">

                            <div class="row">

                                <div

                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 cpl-sm-12 col-xs-12 add-article form-main-sec ">

                                    <div class="card Recent-Users">

                                      

                                            <h5>Add New Location</h5>

                                        

                                        <div class="card-block px-0 py-3">

                                            <div class="row form-sec">

                                                <div class="row form-sec">

                                                    <div

                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">

                                                        <input type="hidden" name="article_id"

                                                            value="{{ isset($location->id) ? $location->id : '' }}">

                                                        <label for="">Location Name <span

                                                                style="color: red;margin: 0;">*</span></label>

                                                    </div>

                                                    <div

                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                                        <input type="text" name="location" id="location"

                                                            placeholder="Name" required

                                                            data-parsley-required-message="Please Enter Title"

                                                            value="{{ isset($location->location) ? $location->location : '' }}">

                                                        <span id="error_name" style="color:red;display:none;">This Title is

                                                            Already

                                                            Taken</span>

                                                    </div>

                                                </div>

                                                <div class="row form-sec">

                                                    <div

                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">

                                                        <label for="">Slug <span

                                                                style="color: red;margin: 0;">*</span></label>

                                                    </div>

                                                    <div

                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                                        <input type="text" name="slug" id="slug"

                                                            placeholder="Slug" required

                                                            data-parsley-required-message="Please Enter Slug"

                                                            value="{{ isset($location->slug) ? $location->slug : '' }}">

                                                    </div>

                                                </div>







                                                <div class="row form-sec">

                                                    <div

                                                        class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">

                                                        <label for="">page/Type <span

                                                                style="color: red;margin: 0;">*</span></label>

                                                    </div>

                                                    <div

                                                        class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">

                                                        <select class="form-control" id="type" name="type" required>

                                                            <option value="location"

                                                                {{ isset($location->type) && $location->type == 'location' ? 'selected' : '' }}>

                                                                Location</option>

                                                            <option value="service-area"

                                                                {{ isset($location->type) && $location->type == 'service-area' ? 'selected' : '' }}>

                                                                Service Area</option>

                                                             <option value="servicerepair"

                                                                {{ isset($location->type) && $location->type == 'servicerepair' ? 'selected' : '' }}>

                                                                Service Repair</option>

                                                           {{-- <option value="commercial"

                                                                {{ isset($location->type) && $location->type == 'commercial' ? 'selected' : '' }}>

                                                                Commercial</option>

                                                            <option value="residential"

                                                                {{ isset($location->type) && $location->type == 'residential' ? 'selected' : '' }}>

                                                                Residential</option>

                                                            <option value="carriage-style-garage"

                                                                {{ isset($location->type) && $location->type == 'carriage-style-garage' ? 'selected' : '' }}>

                                                                Carriage Style Garage

                                                            </option>

                                                            <option value="common"

                                                                {{ isset($location->type) && $location->type == 'common' ? 'selected' : '' }}>

                                                                Common</option> --}}

                                                            

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="mb-3 text-end">

                                                    <button type="submit" id="submit_form"

                                                        class="btn btn-lg btn-primary">Save</button>

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

        $(document).ready(function() {



            $('form').parsley({

                excluded: 'input[type=hidden]:not(.visible)'

            });

            $('#submit_form').on('click', function(e) {





                $('#img_id').addClass('visible');

                $('#banner_img_id').addClass('visible');





                // Validate the form

                if (!$('form').parsley().validate()) {

                    e.preventDefault();

                }

                // Hide the hidden input again

                $('#img_id').removeClass('visible');

                $('#banner_img_id').removeClass('visible');





            });

        });

    </script>



    <script>

        $(document).on('change', '#location', function () {



    const $nameInput = $('#location');

    const $slugInput = $('#slug');

    const token = $("meta[name='csrf-token']").attr("content");

    const val = $(this).val();



    $.ajax({

        url: "{{ route('check_location_slug') }}",

        method: "POST",

        data: {

            _token: token,

            name: val

        },

        success: function (response) {



            if (response.status == 1) {

                $('#error_name').show();

                $slugInput.val('');

            } else {

                $('#error_name').hide();



                const tempElement = $('<div>').html(val);

                const textContent = tempElement.text();

                const slugValue = textContent

                    .trim()

                    .replace(/\s+/g, '-')

                    .toLowerCase();



                $slugInput.val(slugValue);

            }

        },

        error: function () {

            toastr.error('Something went wrong!');

        }

    });

});



    </script>

@endsection

