<div class="accordion-body">

    <!-- Section Title -->
    <div class="row">
        <div class="col-12">
            <label>Section Title</label>
            <input type="text" name="value_section_title"
                value="<?php echo e($value_highlights->section_title ?? ''); ?>"
                placeholder="Enter Title">
        </div>

        <div class="col-12 mt-2">
            <label>Section Description</label>
            <textarea name="value_section_description"
                class="form-control rich-text-editor"
                style="height:150px;"
                placeholder="Enter Description"><?php echo e($value_highlights->section_description ?? ''); ?></textarea>
        </div>
    </div>

    <hr>

    <?php
        $items = $value_highlights->items ?? [];
    ?>

    <!-- If Data Exists -->
    <?php if(!empty($items)): ?>

        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row value-append-sec" data-index="<?php echo e($key + 1); ?>" style="margin-bottom:30px;">

            <div class="col-xxl-6 label-sec">

                <div class="row form-sec">
                    <div class="col-12 label-sec">
                        <label>Highlight Title</label>
                    </div>
                    <div class="col-12">
                        <input type="text"
                            name="value_title[]"
                            value="<?php echo e($item->title ?? ''); ?>"
                            placeholder="Enter Title">
                    </div>
                </div>

                <div class="row form-sec">
                    <div class="col-12 label-sec">
                        <label>Highlight Content</label>
                    </div>
                    <div class="col-12">
                        <textarea name="value_content[]"
                            class="form-control"
                            style="height:150px;"
                            placeholder="Enter Content"><?php echo e($item->content ?? ''); ?></textarea>
                    </div>
                </div>

            </div>

            <!-- Remove Button (only for >1) -->
            <?php if($key > 0): ?>
            <div class="mx-1 d-md-flex justify-content-md-end">
                <button type="button"
                    class="btn btn-danger remove-value-btn mt-2"
                    data-index="<?php echo e($key + 1); ?>">
                    Remove
                </button>
            </div>
            <?php endif; ?>

        </div>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>

        <!-- Default Empty Row -->
        <div class="row value-append-sec" data-index="1" style="margin-bottom:30px;">

            <div class="col-xxl-6 label-sec">

                <div class="row form-sec">
                    <div class="col-12 label-sec">
                        <label>Highlight Title</label>
                    </div>
                    <div class="col-12">
                        <input type="text" name="value_title[]" placeholder="Enter Title">
                    </div>
                </div>

                <div class="row form-sec">
                    <div class="col-12 label-sec">
                        <label>Highlight Content</label>
                    </div>
                    <div class="col-12">
                        <textarea name="value_content[]" class="form-control"
                            style="height:150px;"
                            placeholder="Enter Content"></textarea>
                    </div>
                </div>

            </div>

        </div>

    <?php endif; ?>

    <br>

    <!-- Add Button -->
    <div class="d-md-flex justify-content-md-end">
        <button type="button" id="add_value_btn" class="btn btn-primary mt-3">
            Add Highlight
        </button>
    </div>

</div><?php /**PATH C:\wamp64\www\Time\9-april\resources\views/settings/value-highlights-sec.blade.php ENDPATH**/ ?>