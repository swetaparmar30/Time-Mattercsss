 <div class="accordion-body">
     <div class="row">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <label for="">Title</label>
         </div>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <input type="text" name="service_head_title" id="service_head_title" placeholder="Enter Title"
                 data-parsley-required-message="Please Enter Title">
         </div>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <label for="">Description</label>
         </div>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <textarea class="form-control rich-text-editor" id="service_head_description" name="service_head_description" style="height: 150px;"
                 data-parsley-errors-container="#service_head_content_required" placeholder="Enter Description" data-parsley-required-message="Please Enter Description"></textarea>
             <span id="service_head_content_required" class="parsley-required" style="font-weight: 500 !important;"></span>
         </div>
     </div>
     <hr>
     <div class="row services-append-sec" data-index="1">
         <label for="" id="service_number_1" style="display:none;">Service&nbsp;1</label>
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
             <div class="row form-sec">
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <label for="">Service&nbsp;Title
                     </label>
                 </div>
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <input type="text" name="service_title[]" id="service_title" placeholder="Enter Service Title"
                         data-parsley-required-message="Please Enter Title">
                 </div>
             </div>
             <div class="row form-sec">
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <label for="">Service&nbsp;Content</label>
                 </div>
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <textarea class="form-control rich-text-editor" id="service_description" name="service_description[]" style="height: 150px;"
                         data-parsley-errors-container="#service_content_required" placeholder="Enter Service Description"
                         data-parsley-required-message="Please Enter Service Description"></textarea>
                     <span id="service_content_required" class="parsley-required" style="font-weight: 500 !important;"></span>
                 </div>
             </div>
         </div>
         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 label-sec">
             <div class="row form-sec">
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <label for="">URL&nbsp;Title</label>
                 </div>
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <input type="text" name="url_title[]" id="url_title" placeholder="Enter URL Title"
                         data-parsley-required-message="Please Enter URL title">
                 </div>
             </div>
             <div class="row form-sec">
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <label for="">Service&nbsp;URL</label>
                 </div>
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <input type="text" name="service_url[]" id="service_url" placeholder="Enter Service url" data-parsley-required-message="Please Enter URL">
                 </div>
             </div>
             <div class="row form-sec">
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <label for="">Service&nbsp;Image</label>
                 </div>
                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                     <div class="upload-img-sec">
                         <input type="hidden" name="service_img[]" id="service_img_1">
                         <div class="image_preview_div">
                             <img src="{{ asset('assets/images/user/img-demo_1041.jpg') }}" alt="" id="service_preview_1" class="profile-img">
                             <a id="service_remove_image_1" style="display: none;">
                                 <i class="fa fa-times" aria-hidden="true"></i></a>
                         </div>
                         <label for="" style="cursor: pointer;" class="choose_file hm-choose-img-title service-image-input" data-val="service_img_1">Choose image</label>
                         <span id="img_alert1" class="parsley-required"
                             style="font-weight: 500 !important;color: red !important;"></span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="d-md-flex justify-content-md-end">
         <button type="button" id="add_service_btn" class="btn btn-primary mt-3">Add Service</button>
     </div>
 </div>
