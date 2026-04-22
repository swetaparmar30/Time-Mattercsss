@extends('layouts.backend.index')

@section('main_content')
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <!-- Catch Errors -->
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('centralfile.store') }}" method="POST" data-parsley-validate=""
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="central_file_id" value="{{ $central_file->id ?? '' }}">
                            <input type="hidden" name="old_file_path" value="{{ $central_file->file_path ?? '' }}">

                            <div class="row">

                                <!-- Left Form -->
                                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 add-article form-main-sec">
                                    <div class="card Recent-Users">
                                        <h5>{{ isset($central_file) ? 'Edit File' : 'Add File' }}</h5>

                                        <div class="card-block px-0 py-3">

                                            <div class="row form-sec">
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label for="">File Name <span style="color: red;margin: 0;">*</span></label>
                                                </div>
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name', $central_file->name ?? '') }}" required>
                                                </div>
                                            </div>

                                            <div class="row form-sec mt-3">
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label>Upload File @if(!isset($central_file))<span style="color:red">*</span>@endif</label>
                                                </div>
                                                <div class="col-xxl-10">
                                                    <input type="file" class="form-control" name="uploaded_file" accept=".pdf,.doc,.docx,.xls,.xlsx,.csv,image/*,.jpg,.jpeg,.png,.gif,.webp" @if(!isset($central_file)) required @endif>
                                                    <small class="text-muted">Allowed types: pdf, doc, docx, xls, xlsx, csv, images. Max 10MB.</small>
                                                    @if(isset($central_file) && $central_file->file_path)
                                                        <div class="mt-2">
                                                            <strong>Current File:</strong> <a href="{{ asset('uploads/' . $central_file->file_path) }}" target="_blank">View File</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row form-sec mt-3">
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                                    <label>Role Category <span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-xxl-10">
                                                    <select class="form-control js-example-basic-multiple" name="role_categories[]" multiple="multiple" style="width: 100%" required>
                                                        @foreach($role_categories as $role)
                                                            @php
                                                                $isSelected = isset($selected_roles) && in_array($role->id, $selected_roles) ? 'selected' : '';
                                                            @endphp
                                                            <option value="{{ $role->id }}" {{ $isSelected }}>{{ $role->name }} - {{ $role->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 text-end mt-4">
                                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
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
            $('.js-example-basic-multiple').select2({
                placeholder: "Select Role Categories",
                allowClear: true
            });
        });
    </script>
@endsection
