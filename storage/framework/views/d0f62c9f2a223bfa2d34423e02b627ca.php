<div class="modal" id="image_detail">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Attachment Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 detail_image_class">
                        <div>
                        <img src="" id="detail_image">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 pop_up_left_sec">
                        <div class="pop_up_details">
                        <ul>
                            <li>File Name: <p id="file_name"></p>
                            </li>
                            <li class="file_url_class">File URL: <p id="file_url"></p>
                            </li>
                            <li>File Type: <p>Image</p>
                            </li>
                            <li>Uploaded By: <p id="uploaded_by"></p>
                            </li>
                            <li>Created At: <p id="created_at"></p>
                            </li>
                            <li>Updated At: <p id="updated_at"></p>
                            </li>
                            <div class="pop_up_detail_top_buttons">
                                <a href="" target="_blank" id="download_img"><button class="btn btn-primary" type="button" >Download</button></a>
                                <button class="btn btn-primary" type="button" id="copy_img_url" onclick="copyToClipboard('#file_url')">Copy URL To Clipboard</button>
                            </div>
                        </ul>
                        
                    </div>
                    <div class="pop_up_detail_form">
                        <form id="image_data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="image_id" id="image_id">
                             <span>
                                    <label class="form-label" for="exampleFormControlInput1">Image Name</label>
                                    <input type="text" class="form-control" name="image_name" id="image_name">
                                </span>
                            <span>
                                <label class="form-label" for="exampleFormControlInput1">Alt Text</label>
                                <input type ="text" class="form-control" name="alt_text" id="alt_text">
                            </span>
                            <span>
                                <label class="form-label" for="exampleFormControlInput1">Title</label>
                                <input type ="text" class="form-control" name="title" id="title">
                            </span>
                            <span>
                                <label class="form-label" for="exampleFormControlInput1">Caption</label>
                                <textarea class="form-control" name="caption" id="caption"></textarea>
                            </span>
                            <span>
                                <label class="form-label" for="exampleFormControlInput1">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </span>
                        </form>
                    </div>
                    <div class="pop_up_detail_buttons">
                        <button class="btn btn-primary" type="button" id="save_img_details">Save</button>
                       <button class="btn btn-danger" type="button" id="delete_img">Delete Permanently</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Clark_Dynamic_site_DEC\resources\views/media/modal.blade.php ENDPATH**/ ?>