@extends('layouts.backend.index')
@section('main_content')
   <div class="pcoded-wrapper">
      <div class="pcoded-content">
         <div class="pcoded-inner-content">
            <div class="main-body">
               <div class="page-wrapper">
                  <form action="{{ route('timeservice.store') }}" method="POST" data-parsley-validate=""
                     enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" id="id" name="id" value="{{ isset($timeservice->id) ? $timeservice->id : '' }}">
                     <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 add-article form-main-sec">
                           <div class="card Recent-Users">
                              <h5>{{ isset($timeservice) ? 'Edit Time Service' : 'Add Time Service' }}</h5>
                              <div class="card-block px-0 py-3">
                                 <!-- Main Info -->
                                 <div class="row form-sec">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="name">Name <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                       <input type="text" class="form-control" id="name" name="name" required
                                          placeholder="Service Name" value="{{ $timeservice->name ?? '' }}">
                                    </div>
                                 </div>

                                 <div class="row form-sec">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="title">Page Title <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                       <input type="text" class="form-control" id="title" name="title" required
                                          placeholder="Page Title" value="{{ $timeservice->title ?? '' }}">
                                       <span id="error_name" style="color:red;display:none;">This Title is Already
                                          Taken</span>
                                    </div>
                                 </div>

                                 <div class="row form-sec">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="slug">Slug <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                       <input type="text" class="form-control" id="slug" name="slug" required
                                          placeholder="Slug" value="{{ $timeservice->slug ?? '' }}">
                                    </div>
                                 </div>


                                 <div class="row form-sec">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 label-sec">
                                       <label for="description">Description</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                       <textarea name="description" class="form-control rich-text-editor"
                                          id="description">{{ $timeservice->description ?? '' }}</textarea>
                                    </div>
                                 </div>

                                 <hr>

                              </div>
                           </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 right-sec">
                           <div class="card Recent-Users mb-4 p-2">
                              <h5>Settings</h5>
                              <div class="card-block px-0 py-3">
                                 <div class="row form-sec">
                                    <div class="col-md-12 mb-3">
                                       <label>Publish Status</label>
                                       <select name="publish_status" class="form-control">
                                          <option value="Published" {{ (isset($timeservice) && $timeservice->publish_status == 'Published') ? 'selected' : '' }}>Published
                                          </option>
                                          <option value="Draft" {{ (isset($timeservice) && ($timeservice->publish_status == 'Draft' || !$timeservice->publish_status)) ? 'selected' : '' }}>Draft</option>
                                       </select>
                                    </div>
                                    <div class="col-md-12">
                                       <label>Enable/Disable (Visible on Frontend)</label>
                                       <select name="status" class="form-control">
                                          <option value="1" {{ (isset($timeservice) && $timeservice->status == 1) ? 'selected' : '' }}>Enable</option>
                                          <option value="0" {{ (isset($timeservice) && $timeservice->status == 0) ? 'selected' : '' }}>Disable</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <div class="card Recent-Users p-2">
                              <h5>SEO Meta Info</h5>
                              <div class="card-block px-0 py-3">
                                 <div class="row form-sec">
                                    <div class="col-md-12 mb-3">
                                       <label>Meta Title</label>
                                       <input type="text" class="form-control" name="meta_title"
                                          value="{{ $timeservice->meta_title ?? '' }}" placeholder="Meta Title">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                       <label>Meta Keywords</label>
                                       <textarea name="meta_keyword" class="form-control" rows="3"
                                          placeholder="Keywords separated by comma">{{ $timeservice->meta_keyword ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                       <label>Meta Description</label>
                                       <textarea name="meta_description" class="form-control" rows="4"
                                          placeholder="Meta Description">{{ $timeservice->meta_description ?? '' }}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="card mt-4">
                              <div class="card-block text-center">
                                 <p class="text-muted">Fill all mandatory fields (*) and save to update the service module.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div
                           class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 add-article form-main-sec">
                           <div class="card Recent-Users">
                              <h5>{{ isset($timeservice) ? 'Edit Time Service' : 'Add Time Service' }}</h5>
                              <div class="card-block px-0 py-3">
                                 <!-- sections -->
                                 <!-- Section 1: Banner Section -->
                                 <div class="section-block mb-4 p-3 border rounded bg-light shadow-sm">
                                    <h5 class="text-primary border-bottom pb-2 mb-3"><i class="fa fa-image"></i> Section 1:
                                       Banner Section</h5>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Banner Name</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section1_name"
                                             value="{{ $timeservice->section1_name ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Banner Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section1_title"
                                             value="{{ $timeservice->section1_title ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Banner Subtitle</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section1_subtitle"
                                             value="{{ $timeservice->section1_subtitle ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Banner Description</label></div>
                                       <div class="col-md-10">
                                          <textarea name="section1_description"
                                             class="form-control rich-text-editor">{{ $timeservice->section1_description ?? '' }}</textarea>
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Button Text</label></div>
                                       <div class="col-md-6">
                                          <input type="text" class="form-control" name="section1_button"
                                             value="{{ $timeservice->section1_button ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Button URL</label></div>
                                       <div class="col-md-6">
                                          <input type="text" class="form-control" name="section1_url"
                                             value="{{ $timeservice->section1_url ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Banner Image</label></div>
                                       <div class="col-md-3">
                                          <div class="upload-img-sec text-center">
                                             <input type="hidden" name="section1_image" id="section1_image"
                                                value="{{ $timeservice->section1_image ?? '' }}">
                                             <div class="image_preview_div">
                                                <img
                                                   src="{{ (isset($section1_image) && optional($section1_image)->name) ? asset('uploads/' . $section1_image->name) : asset('assets/images/user/img-demo_1041.jpg') }}"
                                                   id="section1_image_avtar" class="profile-img shadow-sm mb-2"
                                                   style="width:250px; height:120px; object-fit: cover;">
                                                <a id="section1_image_remove_image"
                                                   style="{{ (isset($section1_image) && optional($section1_image)->name) ? '' : 'display: none;' }}">
                                                   <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                <br>
                                                <label style="cursor: pointer;"
                                                   class="form-label upload_image choose_file hm-choose-img-title"
                                                   data-val="section1_image" data-id="0">Choose Banner Image</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Section 2: Two Titles & Two Descriptions -->
                                 <div class="section-block mb-4 p-3 border rounded shadow-sm">
                                    <h5 class="text-info border-bottom pb-2 mb-3"><i class="fa fa-th-list"></i> Section 2:
                                       Dual Content</h5>
                                    <div class="row form-sec d-none">
                                       <div class="col-md-2 label-sec"><label>Section Name</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section2_name"
                                             value="{{ $timeservice->section2_name ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6 border-right">
                                          <div class="p-2 bg-light mb-2 font-weight-bold">Content Block A</div>
                                          <div class="form-sec">
                                             <label>Title 1</label>
                                             <input type="text" class="form-control" name="section2_title"
                                                value="{{ $timeservice->section2_title ?? '' }}">
                                          </div>
                                          <div class="form-sec">
                                             <label>Description 1</label>
                                             <textarea name="section2_description"
                                                class="form-control rich-text-editor">{{ $timeservice->section2_description ?? '' }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="p-2 bg-light mb-2 font-weight-bold">Content Block B</div>
                                          <div class="form-sec">
                                             <label>Title 2</label>
                                             <input type="text" class="form-control" name="section2_title2"
                                                value="{{ $timeservice->section2_title2 ?? '' }}">
                                          </div>
                                          <div class="form-sec">
                                             <label>Description 2</label>
                                             <textarea name="section2_description2"
                                                class="form-control rich-text-editor">{{ $timeservice->section2_description2 ?? '' }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row form-sec mt-3">
                                       <div class="col-md-2 label-sec"><label>Section Image</label></div>
                                       <div class="col-md-10 text-center">
                                          <input type="hidden" name="section2_image" id="section2_image"
                                             value="{{ $timeservice->section2_image ?? '' }}">
                                          <img
                                             src="{{ (isset($section2_image) && optional($section2_image)->name) ? asset('uploads/' . $section2_image->name) : asset('assets/images/user/img-demo_1041.jpg') }}"
                                             id="section2_image_avtar" class="profile-img shadow-sm mb-2"
                                             style="width:150px; height:100px; object-fit: cover;">
                                          <a id="section2_image_remove_image"
                                             style="{{ (isset($section2_image) && optional($section2_image)->name) ? '' : 'display: none;' }}">
                                             <i class="fa fa-times" aria-hidden="true"></i>
                                          </a>
                                          <br>
                                          <label style="cursor: pointer;"
                                             class="form-label upload_image choose_file hm-choose-img-title"
                                             data-val="section2_image" data-id="0">Choose Section 2 Image</label>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Section 3: As Is -->
                                 <div class="section-block mb-4 p-3 border rounded">
                                    <h6>Section 3 (Standard)</h6>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section3_title"
                                             value="{{ $timeservice->section3_title ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Description</label></div>
                                       <div class="col-md-10">
                                          <textarea name="section3_description"
                                             class="form-control rich-text-editor">{{ $timeservice->section3_description ?? '' }}</textarea>
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Section Image</label></div>
                                       <div class="col-md-10 text-center">
                                          <input type="hidden" name="section3_image" id="section3_image"
                                             value="{{ $timeservice->section3_image ?? '' }}">
                                          <img
                                             src="{{ (isset($section3_image) && optional($section3_image)->name) ? asset('uploads/' . $section3_image->name) : asset('assets/images/user/img-demo_1041.jpg') }}"
                                             id="section3_image_avtar" class="profile-img shadow-sm mb-2"
                                             style="width:150px; height:100px; object-fit: cover;">
                                          <a id="section3_image_remove_image"
                                             style="{{ (isset($section3_image) && optional($section3_image)->name) ? '' : 'display: none;' }}">
                                             <i class="fa fa-times" aria-hidden="true"></i>
                                          </a>
                                          <br>
                                          <label style="cursor: pointer;"
                                             class="form-label upload_image choose_file hm-choose-img-title"
                                             data-val="section3_image" data-id="0">Choose Section 3 Image</label>
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Section 4: Title + 6 Subtitles + 6 Notes -->
                                 <div class="section-block mb-4 p-3 border rounded shadow-sm">
                                    <h5 class="text-success border-bottom pb-2 mb-3"><i class="fa fa-list-ol"></i> Section
                                       4: Subtitles & Notes</h5>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Main Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section4_title"
                                             value="{{ $timeservice->section4_title ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row mt-3">
                                       @for ($k = 1; $k <= 6; $k++)
                                          <div class="col-md-4 mb-3 ">
                                             <div class="box-item border p-2 rounded bg-light">
                                                <strong>Item {{ $k }}</strong>
                                                <div class="form-group mt-2">
                                                   <label>Subtitle {{ $k }}</label>
                                                   <input type="text" class="form-control form-control-sm"
                                                      name="section4_subtitle{{ $k }}"
                                                      value="{{ $timeservice->{"section4_subtitle{$k}"} ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                   <label>Note {{ $k }}</label>
                                                   <textarea class="form-control form-control-sm" name="section4_note{{ $k }}"
                                                      rows="2">{{ $timeservice->{"section4_note{$k}"} ?? '' }}</textarea>
                                                </div>
                                             </div>
                                          </div>
                                       @endfor
                                    </div>
                                 </div>

                                 <!-- Culture & Values -->
                                 <div class="section-block mb-4 p-3 border rounded shadow-sm">
                                    <h5 class="text-warning border-bottom pb-2 mb-3"><i class="fa fa-users"></i> Vendor
                                       Management Model Works</h5>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="historysubtitle"
                                             value="{{ $timeservice->historysubtitle ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Description</label></div>
                                       <div class="col-md-10">
                                          <textarea name="historydescription"
                                             class="form-control rich-text-editor">{{ $timeservice->historydescription ?? '' }}</textarea>
                                       </div>
                                    </div>
                                    <div class="row mt-3">
                                       @for ($k = 1; $k <= 5; $k++)
                                          <div class="col-md-4 mb-3">
                                             <div class="box-item border p-2 rounded bg-light">
                                                <strong>Value {{ $k }}</strong>
                                                <div class="form-group mt-2">
                                                   <label>Sub Title {{ $k }}</label>
                                                   <input type="text" class="form-control form-control-sm"
                                                      name="cv_subtitle_{{ $k }}"
                                                      value="{{ $timeservice->{"cv_subtitle_{$k}"} ?? '' }}">
                                                </div>
                                                <div class="form-group">
                                                   <label>Note {{ $k }}</label>
                                                   <textarea class="form-control form-control-sm" name="cv_note_{{ $k }}"
                                                      rows="2">{{ $timeservice->{"cv_note_{$k}"} ?? '' }}</textarea>
                                                </div>
                                             </div>
                                          </div>
                                       @endfor

                                    </div>
                                    <div class="row form-sec mt-3">
                                       <div class="col-md-2 label-sec"><label>Section Image</label></div>
                                       <div class="col-md-10 text-center">
                                          <input type="hidden" name="historyimage" id="historyimage_img_id_1"
                                             value="{{ $timeservice->historyimage ?? '' }}">
                                          <img
                                             src="{{ (isset($historyimage) && optional($historyimage)->name) ? asset('uploads/' . $historyimage->name) : asset('assets/images/user/img-demo_1041.jpg') }}"
                                             id="historyimage_profile_avtar_1" class="profile-img shadow-sm mb-2"
                                             style="width:150px; height:100px; object-fit: cover;">
                                          <a id="historyimage_remove_image_1" class="remove_image_media" data-val="historyimage" data-id="1" style="{{ (isset($historyimage) && optional($historyimage)->name) ? 'cursor: pointer;' : 'display: none;' }}">
                                             <i class="fa fa-times" aria-hidden="true"></i>
                                          </a>
                                          <br>
                                          <label style="cursor: pointer;" class="form-label upload_image choose_file hm-choose-img-title" data-val="historyimage" data-id="1">Choose Image</label>
                                       </div>
                                    </div>

                                 </div>

                                 <!-- Section 5: Title, Description + Button Name & URL -->
                                 <div class="section-block mb-4 p-3 border rounded">
                                    <h6>Section 5 (With Action Button)</h6>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="section5_title"
                                             value="{{ $timeservice->section5_title ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Description</label></div>
                                       <div class="col-md-10">
                                          <textarea name="section5_description"
                                             class="form-control rich-text-editor">{{ $timeservice->section5_description ?? '' }}</textarea>
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Button Name</label></div>
                                       <div class="col-md-4">
                                          <input type="text" class="form-control" name="section5_button"
                                             value="{{ $timeservice->section5_button ?? '' }}">
                                       </div>
                                       <div class="col-md-2 label-sec"><label>Button URL</label></div>
                                       <div class="col-md-4">
                                          <input type="text" class="form-control" name="section5_url"
                                             value="{{ $timeservice->section5_url ?? '' }}">
                                       </div>
                                    </div>
                                 </div>

                                 <!-- Talk to an Expert -->
                                 <div class="section-block mb-4 p-3 border rounded shadow-sm">
                                    <h5 class="text-info border-bottom pb-2 mb-3"><i class="fa fa-comments"></i> Talk to an Expert</h5>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Title</label></div>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="expert_title" value="{{ $timeservice->expert_title ?? '' }}">
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Description</label></div>
                                       <div class="col-md-10">
                                          <textarea name="expert_description" class="form-control rich-text-editor">{{ $timeservice->expert_description ?? '' }}</textarea>
                                       </div>
                                    </div>
                                    <div class="row form-sec">
                                       <div class="col-md-2 label-sec"><label>Button Name</label></div>
                                       <div class="col-md-4">
                                          <input type="text" class="form-control" name="expert_button_name" value="{{ $timeservice->expert_button_name ?? '' }}">
                                       </div>
                                       <div class="col-md-2 label-sec"><label>Button URL</label></div>
                                       <div class="col-md-4">
                                          <input type="text" class="form-control" name="expert_url" value="{{ $timeservice->expert_url ?? '' }}">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="mb-3 text-end">
                                    <button type="submit" id="submit_form" class="btn btn-lg btn-primary btn-block">Save
                                       Time Service Module</button>
                                 </div>
                                 <!-- end sections -->
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
      $(document).ready(function () {
         $('form').parsley();

         // Remove Image Handlers
         $('#section1_image_remove_image').click(function () {
            $('#section1_image').val('');
            $('#section1_image_avtar').attr('src', window.assetPath);
            $(this).hide();
         });

         $('#section2_image_remove_image').click(function () {
            $('#section2_image').val('');
            $('#section2_image_avtar').attr('src', window.assetPath);
            $(this).hide();
         });

         $('#section3_image_remove_image').click(function () {
            $('#section3_image').val('');
            $('#section3_image_avtar').attr('src', window.assetPath);
            $(this).hide();
         });

         // Slug generation and Check
         $(document).on('change', '#title', function (e) {
            const $titleInput = $("#title");
            const $slugInput = $("#slug");
            const id = $('#id').val();
            var token = $("meta[name='csrf-token']").attr("content");
            var val = $(this).val();

            $.ajax({
               url: "{{ route('timeservice.check_slug') }}",
               method: "POST",
               data: {
                  _token: token,
                  name: val,
                  id: id
               },
               success: function (response) {
                  if (response.status == 1) {
                     $('#error_name').show();
                  } else {
                     $('#error_name').hide();
                     const titleValue = $titleInput.val();
                     const tempElement = $('<div>').html(titleValue);
                     const textContent = tempElement.text();
                     const slugValue = textContent.replace(/\s+/g, '-').toLowerCase();
                     $slugInput.val(slugValue);
                  }
               },
               error: function (xhr, status, error) {
                  toastr.error('Something Went Wrong!');
               }
            });
         });

      });
   </script>
@endsection