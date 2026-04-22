<?php $__env->startSection('main_content'); ?>
<div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <div class="main-body">
            <div class="page-wrapper">
               <div class="row ">
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card Recent-Users mb-4">
                        <div class="card-header">
                           <h5>Client Logo</h5>
                           <a href="<?php echo e(route('client-logo.add')); ?>" class="add-article-btn">Add Client Logo</a>
                        </div>
                        <div class="card-body">
                           <div class="example">
                              <div class="card-block px-0 py-3">
                                 <div class="table-responsive" role="tabpanel" id="">
                                    <table class="table table-hover" id="myTable" style="width:100%">
                                       <thead>
                                          <tr class="unread">
                                             <th scope="col">#</th>
                                             <th scope="col">Image</th>
                                             <th scope="col">Status</th>
                                             <th scope="col">Action</th>
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
<script>
   $(document).ready(function() {
       var token = $("meta[name='csrf-token']").attr("content");
       var table = $('#myTable').DataTable({
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
           autoWidth: false,
           columnDefs: [
               { 
                   targets: [0, 3],
                    orderable: false,
               },
               {
                   width: '1%', targets: 0 
               },
               {
                   width: '10%', targets: 1 
               },
               {
                   width: '19%', targets: 2 
               },
               {
                   width: '10%', targets: 3 
               }
            
              
           ],
           ajax: {
               url: admin_url + "list-client-logo",
               type: 'post',
               data: {
                   _token: token,
               },
           },
   
           columns: [{
                   data: 'ser_id',
                   name: 'id'
               },
               {
                   data: 'image',
                   name: 'image'
               },
               {
                   data: 'status',
                   name: 'status'
               },
                
               {
                   data: 'action',
                   name: 'Action'
               }
               
           ]
       });
   })
</script>
<script>
   $(document).on('click', '.product_delete', function(e) {
       e.preventDefault();
       var deleteUrl = $(this).data('href');
       Swal.fire({
           title: 'Are you sure?',
           text: 'You are about to delete the Garage Door!',
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
$(document).on('click', '#is_featured', function() {
    var token = $("meta[name='csrf-token']").attr("content");
    var id = $(this).attr("data-id");
    var isChecked = $(this).is(':checked');
    $.ajax({
        url: '<?php echo e(route('client_logo.status')); ?>',
        type: "post",
        data: {
            _token: token,
            isChecked: isChecked,
            id: id,
        },
        success: function(data) {
            if (data.status == 2) {
                toastr.success(data.message);
            } else if (data.status == 1) {
                toastr.success(data.message);
            }

        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/client-logo/index.blade.php ENDPATH**/ ?>