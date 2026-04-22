@extends('layouts.backend.index')
<style>
@if(auth()->user()->role == 'dealer')
#delete_img{
    display:none !important;
}
#image_detail, .modal-backdrop{
    display:none !important;
}
@endif
@if(auth()->user()->role == 'marketing')
#delete_img{
    display:none !important;
}
@endif
</style>
@section('main_content')
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- [ breadcrumb ] start -->
           
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Media</h5>
                                </div>
                                <div class="">
                                    <nav>
                                        <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-uploads" type="button" role="tab"
                                                aria-controls="nav-home" aria-selected="true">Upload
                                                Files</button>
                                            <button class="nav-link active nav-profile-tab" id="nav-profile-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-media" type="button"
                                                role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Media Library</button>
                                        </div>
                                    </nav>

                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <div class="tab-pane fade" id="nav-uploads" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <form id="image-upload-form" action="{{ route('media.upload') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="dropzone needsclick form-control dropzone_style all_img_dropzone"
                                                    id="dropzone_demo" name="dropzone_demo">

                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade active show" id="nav-media" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <div class="media_images_class">
                                               
                                            </div>
                                            <div class="text-end mt-4">
                                                <button class="btn btn-primary media_load_more" type="button"style="">Load More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
    @include('media.modal')
@endsection
@section('script')
    {{-- <script>
        const previewTemplate = `<div class="dz-preview dz-file-preview">
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

        myDropzone = new Dropzone("#dropzone_demo", {
            url: '{{ route('media.upload') }}',
            previewTemplate: previewTemplate,
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
                                $("#nav-profile-tab").trigger("click");
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
    </script> --}}
    <script>
        // $(document).on("click", "#nav-profile-tab", function() {
        //     $.ajax({
        //         method: 'GET',
        //         url: '{{ route('media.all.upload') }}',
        //         processData: false,
        //         contentType: false,
        //         success: function(response) {
        //             console.log(response);
        //             $('#nav-media').html('');
        //             $('#nav-media').html(response);
        //         },
        //         error: function(error) {
        //             toastr.error('Error Fetching images');
        //         }
        //     });
        // });
    </script>
    <script>
        $(document).on("click", ".media_images", function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).data('id');
       
            $.ajax({
                method: 'POST',
                url: '{{ route('media.get.detail') }}',
                data: {
                    _token: token,
                    id: id
                },
                datatype: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var details = response.details;
                        console.log(details);
                        /* var imageUrl = "{{ asset('uploads') }}/" + details.name; */
                        var imageFile = details.image_name ? details.image_name + "." + details.extention : details.name;
                        var imageUrl = "{{ asset('uploads') }}/" + imageFile;
                        $('#detail_image').attr('src', imageUrl);
                        $('#download_img').attr('href', imageUrl)
                        $('#image_id').val(details.id);
                        $('#alt_text').val(details.alt_text);
                        $('#image_name').val(details.image_name);
                        $('#title').val(details.title);
                        $('#caption').val(details.caption);
                        $('#description').val(details.description);
                        $('#file_url').text(imageUrl);
                        $('#file_name').text(details.name);
                        $('#uploaded_by').text(details.creator.name);
                        $('#created_at').text(details.created_at);
                        $('#updated_at').text(details.updated_at);
                        //$('#image_detail').modal('show');
                    } else {
                        toastr.error('Error uploading images');
                    }
                },
                error: function(error) {
                    toastr.error('Error uploading images');
                }
            });
            $('#image_detail').modal('show');
        });
    </script>
    <script>
        $(document).on("click", "#save_img_details", function() {
            var formData = $('#image_data').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('media.store.detail') }}',
                data: formData,
                success: function(response) {
                    $('#image_detail').modal('hide');
                    $("#nav-profile-tab").trigger("click");
                    toastr.success('Image details Updated Successfully');
                },
                error: function(xhr) {
                    toastr.error('Image Not Found');
                }
            });
        });
    </script>
    <script>
        $(document).on("click", "#delete_img", function() {
            var id = $('#image_id').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('media.delete') }}',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#image_detail').modal('hide');
                    $("#nav-profile-tab").trigger("click");
                    toastr.error('Image Deleted Successfully');
                },
                error: function(xhr) {
                    toastr.error('Image Not Found');
                }
            });
        });
    </script>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Image URL Copied Successfully');
        }
    </script>
@endsection
