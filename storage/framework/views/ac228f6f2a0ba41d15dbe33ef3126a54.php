<?php $__env->startSection('main_content'); ?>

<div class="row ">
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header"><strong id="modalCenterTitle">Add New Sections</strong></div>
            <div class="card-body">
                <div class="example">

                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                            <form id="addsections" action="<?php echo e(route('sections.save')); ?>" method="POST"
                                data-parsley-validate="">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" id="sections_id" name="sections_id">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Title</label>
                                    <input class="form-control" id="title" name="title" type="text" required
                                        data-parsley-required-message="Please Enter Title"
                                        placeholder="Please Enter Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Slug</label>
                                    <input class="form-control" id="slug" name="slug" type="text" placeholder="Slug"
                                        required data-parsley-required-message="Please Enter Slug">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                    <button type="button" id="sections_clear" name="clear"
                                        class="btn btn-lg btn-danger">Clear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header"><strong>Sections List</strong></div>
            <div class="card-body">
                <div class="example">

                    <div class="tab-content rounded-bottom">
                        <div class="tab-pane p-3 active preview table-responsive" role="tabpanel" id="">
                            <table class="table table-striped" id="sections_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- <?php $__currentLoopData = $sections_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="new_added"><?php echo e($index+1); ?></td>
                                        <?php if(isset($val->title)): ?><td class="new_added"><?php echo e($val->title); ?></td><?php else: ?><td
                                            class="new_added">-</td><?php endif; ?>
                                        <?php if(isset($val->slug)): ?><td class="new_added"><?php echo e($val->slug); ?></td><?php else: ?><td
                                            class="new_added">-</td><?php endif; ?>
                                        <?php if(isset($val->description)): ?><td class="new_added">
                                            <?php echo e($val->description); ?></td><?php else: ?><td class="new_added">-</td><?php endif; ?>
                                        <td>
                                            <a class="table-btn table-btn1 sections_edit" data-id="<?php echo e($val->id); ?>"><img
                                                    src="<?php echo e(asset('assets/img/edit_icon.svg')); ?>"
                                                    class="img-fluid white_logo" alt=""></a>
                                            <a data-href="<?php echo e(route('sections.delete',$val->id)); ?>" data-title="testrete"
                                                data-original-title="Delete Institute"
                                                class="table-btn table-btn1 sections_delete"><img
                                                    src="<?php echo e(asset('assets/img/delete_icon.svg')); ?>"
                                                    class="img-fluid white_logo" alt=""></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                                </tbody>
                            </table>
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
    var table = $('#sections_table').DataTable({
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
        bAutoWidth: false,
        aoColumns: [{
                sWidth: '1%'
            },
            {
                sWidth: '25%'
            },
            {
                sWidth: '25%'
            },
            {
                sWidth: '25%'
            },
            {
                sWidth: '24%'
            }
        ],
        ajax: {
            url: admin_url + "sections/list",
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
                data: 'title',
                name: 'Title'
            },
            {
                data: 'slug',
                name: 'Slug'
            },
            {
                data: 'description',
                name: 'Description'
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
$(document).on('click', '.sections_delete', function(e) {
    e.preventDefault();
    var deleteUrl = $(this).data('href');
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete the Sections!',
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

$(document).on("click", ".sections_edit", function() {
    var token = $("meta[name='csrf-token']").attr("content");
    var id = $(this).attr("data-id");
    $.ajax({
        url: admin_url + "sections/edit",
        type: "post",
        data: {
            _token: token,
            id: id,
        },
        success: function(data) {
            var data = JSON.parse(data);
            var category_list = data.categories;
            $("#sections_id").val(data.id);
            $("#title").val(data.title);
            $("#slug").val(data.slug);
            $("#description").val(data.description);

            $("#modalCenterTitle").html("Edit Sections");
            $("#slug").prop("readonly", true);

        },
    });
});
$(document).on("click", "#sections_clear", function() {
    $("#sections_id").val("");
    $("#title").val("");
    $("#slug").val("");
    $("#description").val("");
    $("#modalCenterTitle").html("Add New Sections");
    $("#slug").prop("readonly", false);


})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/sections/index.blade.php ENDPATH**/ ?>