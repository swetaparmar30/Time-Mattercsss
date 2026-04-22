<?php $__env->startSection('title'); ?> Inquirys <?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<style type="text/css">
    .email-column {
    white-space: normal !important;  /* Allow text to wrap */
    word-wrap: break-word;           /* Ensure long words break */
    word-break: break-all;           /* Break long text at arbitrary points if needed */
}
</style>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <div class="main-body">
            <div class="page-wrapper">
               <div class="row ">
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card Recent-Users mb-4">
                        <div class="card-header">
                           <h5>Get In Touch</h5>
                           <?php if(auth()->user()->role !== 'dealer'): ?>
                           <a href="javascript:;" id="download_inquiry" style="cursor: pointer;" class="add-article-btn">Export</a>
                           <?php endif; ?>
                        </div>
                        <div class="card-body">
                           <div class="example">
                              <div class="card-block px-0 py-3">
                                 <form id="search_payment" data-parsley-validate>
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 filter-sec">
                                       <div class="row input_group">
                                          <div class="col-xxl-8 col-xl-9 col-lg-8 col-md-8 col-sm-8 col-xs-4">
                                             <label>Date <span class="info_label" data-bs-toggle="tooltip" data-bs-placement="right" title="Please select Date Range" ></span></label>
                                             <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                   <input type="text" name="from_date" class="form-control me-2" placeholder="From Date" id="from_date" data-parsley-required-message="Select From Date" data-parsley-errors-container="#error_message2" >
                                                   <span id="error_message2"></span>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                   <input type="text" name="to_date" placeholder="To Date" class="form-control" id="to_date"  data-parsley-required-message="Select To Date" data-parsley-errors-container="#error_message3">
                                                   <span id="error_message3"></span>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                   <button type="button" id="search_button" class="btn btn-lg btn-primary">Search</button>
                                                   <button type="button" id="clear_button" class="btn btn-lg btn-danger">Clear</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                                 <div class="table-responsive" role="tabpanel" id="">
                                    <table class="table table-hover" id="myTable" style="width:100%">
                                       <thead>
                                          <tr class="unread">
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
                                             <th scope="col">Phone</th>
                                             <th scope="col">Zipcode</th>
                                             <th scope="col">Email</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Message</th>
                                             <?php if(auth()->user()->role !== 'dealer'): ?>
                                             <th scope="col">Action</th>
                                             <?php endif; ?>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/excelexportjs.js')); ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
   $(document).ready(function() {
   
      $("#from_date").datepicker({
        dateFormat: "dd-M-yy",
        autoclose: true,
        todayHighlight: true,
        onSelect: function(selectedDate) {
            var startDate = $(this).datepicker('getDate');
            $("#to_date").datepicker("option", "minDate", startDate);
        }
    });
   
    $("#to_date").datepicker({
        dateFormat: "dd-M-yy",
        autoclose: true,
        todayHighlight: true
    });
   
   
    var token = $("meta[name='csrf-token']").attr("content");
    function loadDataTable(from_date = '', to_date = '') {
   
    var columns = [
        { data: 'ser_id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'phone', name: 'phone' },
        { data: 'zipcode', name: 'zipcode' },
        { data: 'email', name: 'email', className: 'email-column' },
        { data: 'created_at', name: 'created_at' },
        { data: 'message', name: 'message' }
    ];

    <?php if(auth()->user()->role !== 'dealer'): ?>
        columns.push({ data: 'action', name: 'Action' });
    <?php endif; ?>


    $('#myTable').DataTable({
        language: {
            search: "",
            "searchPlaceholder": "Search",
            "processing": '<i class="fa fa-spinner fa-spin" style="font-size:24px;color:rgb(75, 183, 245);"></i>',
            paginate: {
                next: '&gt;',
                previous: '&lt;'
            }
        },
        processing: true,
        serverSide: true,
        autoWidth: false,
        destroy: true,
        columnDefs: [
            { 
                targets: [0], 
                orderable: false,
            },
            { width: '1%', targets: 0 },
            { width: '10%', targets: 1 },
            { width: '10%', targets: 2 },
            { width: '8%', targets: 3 },
            { width: '15%', targets: 4 },
            { width: '8%', targets: 5 },
            { width: '25%', targets: 6 },
            <?php if(auth()->user()->role !== 'dealer'): ?>
                { width: '5%', targets: 7 }, 
            <?php endif; ?>
        ],
        ajax: {
            url: admin_url + "list-inquiry",
            type: 'POST',
            data: function(d) {
                d._token = token;
                if (from_date && to_date) {
                    d.from_date = from_date;
                    d.to_date = to_date;
                }
            }
        },
        columns: columns
    });
}
    loadDataTable();
   
    $('#search_button').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
   
        $('input[name="ex_form_date"]').val(from_date);
        $('input[name="ex_to_date"]').val(to_date);
   
        $('#myTable').DataTable().destroy();
        loadDataTable(from_date, to_date);
    });
   
    $('#clear_button').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('input[name="ex_form_date"]').val('');
        $('input[name="ex_to_date"]').val('');
   
        $('#myTable').DataTable().destroy();
        loadDataTable();
    });
   
   
    //Export Data
   
    $(document).on('click','#download_inquiry', function(e){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
            $.ajax({
                    type: "POST",
                    url: '<?php echo e(route("inquiry.export")); ?>',
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        from_date:from_date,
                        to_date:to_date,
                    },
                    success: function(response) {
                        const data = JSON.parse(response);
                        if(data != 'blank'){
                        $("#dvjson").excelexportjs({
                          containerid: "dvjson", 
                          datatype: 'json',
                          worksheetName:'Get In Touch Data',
                          dataset: data, 
                          columns: getColumns(data)     
                        });
                    }else {
                      toastr.error('No data available');
                    }
   
                   }
               });
            });
   
   
        //Delete Inquiry
   
        $(document).on('click', '.product_delete', function(e) {
           e.preventDefault();
           var deleteUrl = $(this).data('href');
           Swal.fire({
               title: 'Are you sure?',
               text: 'You are about to delete the record!',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Yes, delete it!',
               cancelButtonText: 'Cancel'
           }).then((result) => {
               if (result.isConfirmed) {
                   window.location.href = deleteUrl;
               }
           });
       });
   })
</script>
<script></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/inquiry/contact.blade.php ENDPATH**/ ?>