@extends('layouts.backend.index')

@section('main_content')
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <form action="{{ route('role-category.store') }}" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role_category_id" value="{{ $role_category->id ?? '' }}">

                            <div class="row">

                                <!-- Left Form -->
                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 add-article form-main-sec">
                                    <div class="card Recent-Users">
                                        <h5>{{ isset($role_category) ? 'Edit Role Category' : 'Add Role Category' }}</h5>

                                        <div class="card-block px-0 py-3">

                                            <div class="row form-sec">
                                                <div
                                                    class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">Name <span
                                                            style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    @php
                                                        $selectedName = old('name', $role_category->name ?? '');
                                                    @endphp

                                                    <select class="form-control" name="name">
                                                        <option value="independent-contractor"
                                                            {{ $selectedName == 'independent-contractor' ? 'selected' : '' }}> Independent Contractor </option>
                                                        <option value="temporary-employee"
                                                            {{ $selectedName == 'temporary-employee' ? 'selected' : '' }}> Temporary Employee </option>
                                                        <option value="vendor" {{ $selectedName == 'vendor' ? 'selected' : '' }}> Vendor </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div class="col-xxl-2 label-sec"><label>Title <span
                                                            style="color:red">*</span></label></div>
                                                <div class="col-xxl-10">
                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ old('title', $role_category->title ?? '') }}">
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div class="col-xxl-2 label-sec"><label>Description <span
                                                            style="color:red">*</span></label></div>
                                                <div class="col-xxl-10">
                                                    <textarea name="description" class="form-control rich-text-editor">
                                       {{ old('description', $role_category->description ?? '') }}
                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div class="col-xxl-2 label-sec"><label>Button Name <span
                                                            style="color:red">*</span></label></div>
                                                <div class="col-xxl-10">
                                                    <input type="text" class="form-control" name="button_text"
                                                        value="{{ old('button_text', $role_category->button_text ?? '') }}">
                                                </div>
                                            </div>

                                            <div class="row form-sec">
                                                <div class="col-xxl-2 label-sec"><label>Button Url</label></div>
                                                <div class="col-xxl-10">
                                                    <input type="url" class="form-control" name="button_url"
                                                        value="{{ old('button_url', $role_category->button_url ?? '') }}">
                                                </div>
                                            </div>

                                            <div class="mb-3 text-end">
                                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Image Section -->
                                  <div
                                    class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 add-article form-main-sec right-sec">
                                    <div class="card Recent-Users">
                                        <h5>Image</h5>
                                        <div class="card-block px-0 py-3">
                                            <div class="row form-sec">
                                                <div class="col-12">

                                                    <div class="upload-img-sec text-center">
                                                        <input type="hidden" name="role_img" id="role_img"
                                                            value="{{ isset($role_img) && $role_img && $role_img->id ? $role_img->id : '' }}">
                                                            
                                                        @if (isset($role_img) && $role_img && $role_img->name)
                                                            <div class="image_preview_div" style="position: relative; display: inline-block;">
                                                                <img id="role_image_avtar"
                                                                    src="{{ asset('uploads/' . $role_img->name) }}"
                                                                    style="object-fit: cover; max-width: 200px; max-height: 200px;"
                                                                    class="img-fluid profile-img">
                                                                <a id="role_image_remove_image" style="position: absolute; top: 0; right: 0;">
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="image_preview_div" style="position: relative; display: inline-block;">
                                                                <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" 
                                                                    id="role_image_avtar" class="img-fluid profile-img"
                                                                    style="object-fit: cover; max-width: 200px; max-height: 200px;">
                                                                <a id="role_image_remove_image" style="display: none; position: absolute; top: 0; right: 0;"> 
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        
                                                        <label for="" style="cursor: pointer; display: block; margin-top: 10px;"
                                                            class="choose_file hm-choose-img-title w-100"
                                                            data-val="role_img">Choose image</label>
                                                    </div>
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
    <script>
        $(document).ready(function() {
            $('form').parsley();

            $('#role_img').change(function(e) {
                if (e.target.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(ev) {
                        $('#role_image_avtar').attr('src', ev.target.result);
                    };
                    reader.readAsDataURL(e.target.files[0]);
                    $('#role_image_remove_image').show();
                }
            });

            $('#role_image_remove_image').click(function() {
                $('#role_image_avtar').attr('src', '{{ asset('assets/images/user/img-demo_1041.jpg') }}');
                $('#role_img').val('');
                $(this).hide();
            });
        });
    </script>
@endsection
