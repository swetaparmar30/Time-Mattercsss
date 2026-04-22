<div class="accordion-body">
    <div class="row"> 
     <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="row form-sec">
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                 <label for="">Title</label>
             </div>
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <input type="text" name="resi_title" id="resi_title" placeholder="Title"  value="<?php echo e(isset($residential->resi_title) ? $residential->resi_title : ''); ?>" data-parsley-required-message="Please Enter Title">
             </div>
         </div>
         <div class="row form-sec">
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                 <label for="">Sub Title </label>
             </div>
             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <input type="text" name="resi_sub_title" id="resi_sub_title" placeholder="Sub Title"  value="<?php echo e(isset($residential->resi_sub_title) ? $residential->resi_sub_title : ''); ?>" data-parsley-required-message="Please Enter Sub Title">
             </div>
         </div>
       
 
 </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row form-sec">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 label-sec">
                <label for="">Description</label>
            </div>
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <textarea class="form-control" id="resi_description" name="resi_description" style="height: 300px;" data-parsley-errors-container="#content_required1" data-parsley-required-message="Please Enter Content"><?php echo e(isset($residential->resi_description) ? $residential->resi_description : ''); ?></textarea>
                <span id="content1_required" class="parsley-required" style="font-weight: 500 !important;"></span>
        </div>
    </div>
 
 </div>
 </div>
 </div><?php /**PATH /home/customer/www/hamzahk13.sg-host.com/public_html/resources/views/settings/residential_sec.blade.php ENDPATH**/ ?>