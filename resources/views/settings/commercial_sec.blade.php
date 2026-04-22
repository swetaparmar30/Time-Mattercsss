<div class="accordion-body">
    <div class="row"> 
     <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="row form-sec">
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                 <label for="">Title</label>
             </div>
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <input type="text" name="comm_title" id="comm_title" placeholder="Title"  value="{{ isset($commercial->comm_title) ? $commercial->comm_title : '' }}" data-parsley-required-message="Please Enter Title">
             </div>
         </div>
         <div class="row form-sec">
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                 <label for="">Sub Title </label>
             </div>
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <input type="text" name="comm_sub_title" id="comm_sub_title" placeholder="Sub Title"  value="{{ isset($commercial->comm_sub_title) ? $commercial->comm_sub_title : '' }}" data-parsley-required-message="Please Enter Sub Title">
             </div>
         </div>
         <div class="row form-sec">
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                 <label for="">Button Name</label>
             </div>
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="comm_button_name" id="comm_button_name" placeholder="Button Name"  value="{{ isset($commercial->comm_button_name) ? $commercial->comm_button_name : '' }}" data-parsley-required-message="Please Enter Button Name">
                <span id="content_required"></span>
            </div>
        </div>
        <div class="row form-sec">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
             <label for="">Button Url</label>
         </div>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="text" name="comm_button_url" id="comm_button_url" placeholder="Button Url"  value="{{ isset($commercial->comm_button_url) ? $commercial->comm_button_url : '' }}" data-parsley-required-message="Please Enter Button Url">
            
        </div>
    </div>
 
 </div>
 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
     <div class="row form-sec">
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
             <label for="">Description</label>
         </div>
         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <textarea class="form-control" id="comm_description" name="comm_description" style="height: 300px;" data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Content">{{ isset($commercial->comm_description) ? $commercial->comm_description : '' }}</textarea>
            <span id="content1_required" class="parsley-required" style="font-weight: 500 !important;"></span>
        </div>
    </div>
    
    
 
 </div>
 </div>
 </div>