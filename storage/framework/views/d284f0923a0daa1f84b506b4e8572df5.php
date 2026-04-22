<div class="modal" tabindex="-1" id="add_menu_modal">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">Add Menu</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body py-3">

          <div class="py-3">

            <div class="row px-3">
              <form id="" action="<?php echo e(route('menu.add')); ?>" method="POST" data-parsley-validate="" novalidate="">
                <?php echo csrf_field(); ?>
                    <!-- <input type="hidden" name="_token" value="" autocomplete="off"> -->
                      <div class="mb-3">
                          <label class="form-label" for="exampleFormControlInput1">Menu Name</label>
                          <input class="form-control" id="menu_name" name="menu_name" type="text" placeholder="Menu Name" required="" data-parsley-required-message="Please Enter Menu Name">
                      </div>
                      <div class="mb-3 custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="header" id="header">
                          <label class="custom-control-label" for="header">Header Menu</label>
                      </div>
                      <div class="mb-3 custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="quick_links" id="quick_links">
                          <label class="custom-control-label" for="quick_links">Footer Company</label>
                      </div>
                        <div class="mb-3 custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="residential" id="residentials">
                          <label class="custom-control-label" for="residentials">Footer Residential</label>
                      </div>
                        <div class="mb-3 custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="commercial" id="commercials">
                          <label class="custom-control-label" for="commercials">Footer Commercial</label>
                      </div> 
                      <div class="mb-3 custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" name="services" id="services">
                          <label class="custom-control-label" for="services">Footer Resource</label>
                      </div>
                                     
                      <div class="mb-3">
                          <button type="submit" class="btn btn-lg btn-primary">Save</button>
                      </div>
              </form>

            </div>

          </div>

        </div>

      </div>

    </div>

</div><?php /**PATH /home/customer/www/clarkandsonsdoors.com/public_html/resources/views/menu/modal.blade.php ENDPATH**/ ?>