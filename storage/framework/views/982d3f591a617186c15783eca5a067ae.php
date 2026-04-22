<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'data' => [],
    'columns' => [],
    'tableId' => 'datatable',
    'searchable' => true,
    'sortable' => true,
    'perPageOptions' => [5, 10, 15, 20, 25],
    'defaultPerPage' => 10,
    'actions' => [],
    'emptyMessage' => 'No data found',
    'emptyIcon' => 'ph ph-database',
    'emptyAction' => null,
    'pagination' => null,
    'responsive' => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'data' => [],
    'columns' => [],
    'tableId' => 'datatable',
    'searchable' => true,
    'sortable' => true,
    'perPageOptions' => [5, 10, 15, 20, 25],
    'defaultPerPage' => 10,
    'actions' => [],
    'emptyMessage' => 'No data found',
    'emptyIcon' => 'ph ph-database',
    'emptyAction' => null,
    'pagination' => null,
    'responsive' => true,
]); ?>
<?php foreach (array_filter(([
    'data' => [],
    'columns' => [],
    'tableId' => 'datatable',
    'searchable' => true,
    'sortable' => true,
    'perPageOptions' => [5, 10, 15, 20, 25],
    'defaultPerPage' => 10,
    'actions' => [],
    'emptyMessage' => 'No data found',
    'emptyIcon' => 'ph ph-database',
    'emptyAction' => null,
    'pagination' => null,
    'responsive' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    // Helper function to generate CSRF token and method spoofing
    if (!function_exists('generateFormFields')) {
        function generateFormFields($method = 'POST')
        {
            $csrf = csrf_token();
            $methodField =
                $method !== 'POST' ? '<input type="hidden" name="_method" value="' . strtoupper($method) . '">' : '';
            return '<input type="hidden" name="_token" value="' . $csrf . '">' . $methodField;
        }
    }
?>

<?php
    $hasActions = !empty($actions);
    $hasData = !empty($data) && count($data) > 0;
?>

<div class="table-responsive">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        <?php if($searchable || !empty($perPageOptions)): ?>
            <div class="datatable-top">
                <?php if(!empty($perPageOptions)): ?>
                    <div class="datatable-dropdown">
                        <label>
                            <select class="datatable-selector" name="per-page">
                                <?php $__currentLoopData = $perPageOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($option); ?>" <?php if($option == $defaultPerPage): echo 'selected'; endif; ?>>
                                        <?php echo e($option); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select> entries per page
                        </label>
                    </div>
                <?php endif; ?>

                <?php if($searchable): ?>
                    <div class="datatable-search">
                        <input class="datatable-input" placeholder="Search..." type="search" name="search"
                            title="Search within table" aria-controls="<?php echo e($tableId); ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="datatable-container">
            <table class="table table-hover datatable-table <?php echo e($responsive ? 'table-responsive' : ''); ?>"
                id="<?php echo e($tableId); ?>">
                <thead>
                    <tr>
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th data-sortable="<?php echo e($sortable && ($column['sortable'] ?? false) ? 'true' : 'false'); ?>"
                                data-sort-key="<?php echo e($column['key'] ?? ''); ?>"
                                style="width: <?php echo e($column['width'] ?? 'auto'); ?>;">
                                <?php if($sortable && ($column['sortable'] ?? false)): ?>
                                    <button type="button" class="datatable-sorter"><?php echo e($column['title'] ?? $column['key']); ?></button>
                                <?php else: ?>
                                    <span><?php echo e($column['title'] ?? $column['key']); ?></span>
                                <?php endif; ?>
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($hasActions): ?>
                            <th data-sortable="false" style="width: auto;">
                                <button>ACTIONS</button>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($hasData): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-index="<?php echo e($index); ?>">
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <?php if(isset($column['render'])): ?>
                                            <?php echo $column['render']($row, $index); ?>

                                        <?php elseif(isset($column['key'])): ?>
                                            <?php
                                                $value = data_get($row, $column['key']);
                                            ?>

                                            <?php if(isset($column['type'])): ?>
                                                <?php switch($column['type']):
                                                    case ('image'): ?>
                                                        <?php if($value): ?>
                                                            <img src="<?php echo e($value); ?>"
                                                                alt="<?php echo e($column['alt'] ?? 'Image'); ?>"
                                                                class="img-radius wid-40">
                                                        <?php else: ?>
                                                            <div class="avatar wid-40 bg-light">
                                                                <i class="ph ph-user"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php break; ?>

                                                    <?php case ('avatar'): ?>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <?php if($value): ?>
                                                                    <img src="<?php echo e($value); ?>" alt="user image"
                                                                        class="img-radius wid-40">
                                                                <?php else: ?>
                                                                    <div class="avatar wid-40 bg-light">
                                                                        <i class="ph ph-user"></i>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="mb-0">
                                                                    <?php echo e(data_get($row, $column['nameKey'] ?? 'name')); ?></h6>
                                                            </div>
                                                        </div>
                                                    <?php break; ?>

                                                    <?php case ('badge'): ?>
                                                        <?php
                                                            $badgeClass = $column['badgeClass'] ?? 'badge-dark';
                                                            $badgeText = $value;

                                                            if (isset($column['badgeMap'])) {
                                                                $badgeText = $column['badgeMap'][$value] ?? $value;
                                                            }
                                                        ?>
                                                        <span class="badge <?php echo e($badgeClass); ?>"><?php echo e($badgeText); ?></span>
                                                    <?php break; ?>

                                                    <?php case ('status'): ?>
                                                        <?php
                                                            $statusClass = $value ? 'text-success' : 'text-secondary';
                                                            $statusText = $value ? 'Active' : 'Inactive';
                                                            $statusIcon = $value
                                                                ? 'ti ti-circle-filled'
                                                                : 'ti ti-circle-filled';
                                                        ?>
                                                        <span class="<?php echo e($statusClass); ?>">
                                                            <i class="<?php echo e($statusIcon); ?> align-baseline f-10 m-r-10"></i>
                                                            <?php echo e($statusText); ?>

                                                        </span>
                                                    <?php break; ?>

                                                    <?php case ('date'): ?>
                                                        <?php
                                                            $dateFormat = $column['format'] ?? 'M d, Y';
                                                            $timeFormat = $column['timeFormat'] ?? null;
                                                        ?>
                                                        <?php echo e($value ? \Carbon\Carbon::parse($value)->format($dateFormat) : ''); ?>

                                                        <?php if($timeFormat): ?>
                                                            <span class="text-muted text-sm d-block">
                                                                <?php echo e($value ? \Carbon\Carbon::parse($value)->format($timeFormat) : ''); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    <?php break; ?>

                                                    <?php case ('currency'): ?>
                                                        <?php
                                                            $currency = $column['currency'] ?? '$';
                                                            $decimals = $column['decimals'] ?? 2;
                                                        ?>
                                                        <?php echo e($currency); ?><?php echo e(number_format($value, $decimals)); ?>

                                                    <?php break; ?>

                                                    <?php default: ?>
                                                        <?php echo e($value); ?>

                                                <?php endswitch; ?>
                                            <?php else: ?>
                                                <?php echo e($value); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($hasActions): ?>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($action['type'] === 'view'): ?>
                                                    <a href="<?php echo e($action['url']($row)); ?>"
                                                        class="avatar avatar-xs mx-1 btn-link-secondary"
                                                        title="<?php echo e($action['title'] ?? 'View'); ?>">
                                                        <i class="ti ti-eye f-20"></i>
                                                    </a>
                                                <?php elseif($action['type'] === 'edit'): ?>
                                                    <a href="<?php echo e($action['url']($row)); ?>"
                                                        class="avatar avatar-xs mx-1 btn-link-secondary"
                                                        title="<?php echo e($action['title'] ?? 'Edit'); ?>">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                <?php elseif($action['type'] === 'delete'): ?>
                                                    <form action="<?php echo e($action['url']($row)); ?>" method="POST"
                                                        style="display: inline-block;"
                                                        id="deleteForm<?php echo e(data_get($row, 'id', $index)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                    </form>
                                                    <button type="button"
                                                        class="avatar avatar-xs mx-1 btn btn-link-secondary delete-btn"
                                                        data-form-id="deleteForm<?php echo e(data_get($row, 'id', $index)); ?>"
                                                        data-confirm-message="<?php echo e($action['confirmMessage'] ?? 'Are you sure?'); ?>"
                                                        title="<?php echo e($action['title'] ?? 'Delete'); ?>">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </button>
                                                <?php elseif($action['type'] === 'custom'): ?>
                                                    <?php echo $action['render']($row, $index); ?>

                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?php echo e(count($columns) + ($hasActions ? 1 : 0)); ?>" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="<?php echo e($emptyIcon); ?>"
                                        style="font-size: 48px; color: #ccc; margin-bottom: 1rem;"></i>
                                    <h5 class="text-muted mb-2"><?php echo e($emptyMessage); ?></h5>
                                    <?php if($emptyAction): ?>
                                        <a href="<?php echo e($emptyAction['url']); ?>" class="btn btn-primary">
                                            <?php if(isset($emptyAction['icon'])): ?>
                                                <i class="<?php echo e($emptyAction['icon']); ?>"></i>
                                            <?php endif; ?>
                                            <?php echo e($emptyAction['text']); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($pagination && method_exists($pagination, 'links')): ?>
            <div class="d-flex justify-content-end gap-3 mt-3">
                <?php echo e($pagination->links('vendor.pagination.bootstrap-5')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<?php if($hasData): ?>
    <?php $__env->startPush('script'); ?>
        <script type="module">
            import {
                DataTable
            } from '<?php echo e(asset('assets/js/plugins/module.js')); ?>';
            window.dt = new DataTable('#<?php echo e($tableId); ?>');
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tableId = '<?php echo e($tableId); ?>',
                    tableElem = document.getElementById(tableId),
                    wrapper = tableElem.closest('.datatable-wrapper'),
                    searchInput = wrapper ? wrapper.querySelector('.datatable-input') : null,
                    perPageSelect = wrapper ? wrapper.querySelector('.datatable-selector') : null,
                    sortButtons = document.querySelectorAll(`#${tableId} .datatable-sorter`);

                // Maintain current sort state in JavaScript variables
                let currentSortBy = new URLSearchParams(window.location.search).get('sort_by') || null,
                    currentSortDirection = new URLSearchParams(window.location.search).get('sort_direction') || null;


                // Search functionality
                if (searchInput) {
                    // Debounce function
                    function debounce(func, wait) {
                        let timeout;
                        return function(...args) {
                            clearTimeout(timeout);
                            timeout = setTimeout(() => func.apply(this, args), wait);
                        };
                    }

                    // Ajax search update (no page reload)
                    const ajaxSearch = debounce(function() {
                        const searchValue = this.value;
                        const url = new URL(window.location);

                        if (searchValue) {
                            url.searchParams.set('search', searchValue);
                        } else {
                            url.searchParams.delete('search');
                        }

                        // Reset to first page when searching
                        url.searchParams.delete('page');

                        // AJAX request
                        fetch(url.toString(), {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.text();
                            })
                            .then(html => {
                                // Find the datatable-container in the returned HTML
                                const parser = new DOMParser(),
                                    doc = parser.parseFromString(html, "text/html"),
                                    newTable = doc.querySelector(`#${tableId}`).closest(
                                        '.datatable-container'),
                                    currentTable = document.querySelector(`#${tableId}`).closest(
                                        '.datatable-container');

                                if (newTable && currentTable) {
                                    currentTable.innerHTML = newTable.innerHTML;
                                }
                                // Optionally, update pagination below the table if present
                                const newPagination = doc.querySelector('.d-flex.justify-content-center.mt-3');
                                const currentPagination = tableElem.closest('.datatable-wrapper').querySelector('.pagination-wrapper');
                                if (newPagination && currentPagination) {
                                    currentPagination.innerHTML = newPagination.innerHTML;
                                }
                            })
                            .catch(error => {
                                console.error('Ajax search failed:', error);
                            });
                    }, 300); // You can adjust the debounce delay as desired

                    searchInput.addEventListener('input', ajaxSearch);

                    // Set current search value
                    const urlParams = new URLSearchParams(window.location.search);
                    const currentSearch = urlParams.get('search');
                    if (currentSearch) {
                        searchInput.value = currentSearch;
                    }
                }

                // Per page functionality
                // "Per Page" functionality using AJAX (and updates the table in-place)
                if (perPageSelect) {
                    perPageSelect.addEventListener('change', function() {
                        const url = new URL(window.location);
                        url.searchParams.set('per_page', this.value);
                        url.searchParams.delete('page'); // Reset to first page

                        // AJAX request for per_page change
                        fetch(url.toString(), {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.text();
                            })
                            .then(html => {
                                // Find the datatable-container in the returned HTML
                                const parser = new DOMParser();
                                const doc = parser.parseFromString(html, "text/html");
                                const newTable = doc.querySelector(`#${tableId}`).closest(
                                    '.datatable-container');
                                const currentTable = document.querySelector(`#${tableId}`).closest(
                                    '.datatable-container');
                                if (newTable && currentTable) {
                                    currentTable.innerHTML = newTable.innerHTML;
                                }
                                // Optionally update pagination if present
                                const newPagination = doc.querySelector(
                                    '.d-flex.justify-content-center.mt-3');
                                const currentPagination = document.querySelector(
                                    '.d-flex.justify-content-center.mt-3');
                                if (newPagination && currentPagination) {
                                    currentPagination.innerHTML = newPagination.innerHTML;
                                }
                            })
                            .catch(error => {
                                console.error('Ajax perPage failed:', error);
                            });
                    });

                    // Set the current per page value from the URL, if present
                    const urlParams = new URLSearchParams(window.location.search);
                    const currentPerPage = urlParams.get('per_page');
                    if (currentPerPage) {
                        perPageSelect.value = currentPerPage;
                    }
                }

                // Sorting functionality (AJAX-based) - Using event delegation
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.datatable-sorter')) {
                        e.preventDefault();
                        const button = e.target.closest('.datatable-sorter');
                        const column = button.closest('th');
                        const sortKey = column.getAttribute('data-sort-key');

                        if (!sortKey) return; // Skip if no sort key

                        const url = new URL(window.location);

                        // Determine new sort direction (cycle: no sort → asc → desc → no sort)
                        let newDirection = 'asc';
                        let shouldRemoveSort = false;
                        if (!currentSortBy) {
                            // No current direction (null/undefined) - start with asc
                            newDirection = 'asc';
                        }
                        if (currentSortBy === sortKey) {
                            // Same column clicked - cycle through states
                            if (currentSortDirection === 'asc') {
                                newDirection = 'desc';
                            } else if (currentSortDirection === 'desc') {
                                // Remove sorting entirely (reset to default)
                                shouldRemoveSort = true;
                            }
                        } else {
                            // Different column clicked, start with asc
                            newDirection = 'asc';
                        }

                        if (shouldRemoveSort) {
                            url.searchParams.delete('sort_by');
                            url.searchParams.delete('sort_direction');
                        } else {
                            url.searchParams.set('sort_by', sortKey);
                            url.searchParams.set('sort_direction', newDirection);
                        }
                        url.searchParams.delete('page'); // Reset to first page

                        // AJAX request for sorting
                        fetch(url.toString(), {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => {
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.text();
                            })
                            .then(html => {
                                // Find the datatable-container in the returned HTML
                                const parser = new DOMParser(),
                                    doc = parser.parseFromString(html, "text/html"),
                                    newTable = doc.querySelector(`#${tableId}`).closest(
                                        '.datatable-container'),
                                    currentTable = document.querySelector(`#${tableId}`).closest(
                                        '.datatable-container');
                                if (newTable && currentTable) {
                                    currentTable.innerHTML = newTable.innerHTML;
                                }
                                // Optionally update pagination if present
                                const newPagination = doc.querySelector(
                                    '.d-flex.justify-content-center.mt-3');
                                const currentPagination = document.querySelector(
                                    '.d-flex.justify-content-center.mt-3');
                                if (newPagination && currentPagination) {
                                    currentPagination.innerHTML = newPagination.innerHTML;
                                }

                                // Update JavaScript sort state variables
                                if (shouldRemoveSort) {
                                    currentSortBy = null;
                                    currentSortDirection = null;
                                } else {
                                    currentSortBy = sortKey;
                                    currentSortDirection = newDirection;
                                }

                                // Update sort indicators after content replacement
                                updateSortIndicators();
                            })
                            .catch(error => {
                                console.error('Ajax sort failed:', error);
                            });
                    }
                });

                // Function to update sort indicators
                function updateSortIndicators() {
                    // Get all sort buttons from the current DOM
                    const currentSortButtons = document.querySelectorAll(`#${tableId} .datatable-sorter`);

                    // Reset all buttons and remove CSS classes first
                    currentSortButtons.forEach(button => {
                        button.innerHTML = button.textContent.replace(/[↑↓]/g, '').trim();
                        const column = button.closest('th');
                        column.classList.remove('datatable-ascending', 'datatable-descending');
                    });

                    // Add indicator and CSS class to currently sorted column
                    if (currentSortBy && currentSortDirection) {
                        currentSortButtons.forEach(button => {
                            const column = button.closest('th');
                            const sortKey = column.getAttribute('data-sort-key');
                            if (sortKey === currentSortBy) {
                                const icon = currentSortDirection === 'asc' ? '↑' : '↓';
                                button.innerHTML = button.textContent.trim() + ' ' + icon;

                                // Add CSS class for styling
                                if (currentSortDirection === 'asc') {
                                    column.classList.add('datatable-ascending');
                                } else if (currentSortDirection === 'desc') {
                                    column.classList.add('datatable-descending');
                                }
                            }
                        });
                    }
                }

                // Initial sort indicators
                updateSortIndicators();

                // SweetAlert2 delete confirmation - Using event delegation
                document.addEventListener('click', function(e) {
                    if (e.target.closest('.delete-btn')) {
                        e.preventDefault();
                        const button = e.target.closest('.delete-btn'),
                            formId = button.getAttribute('data-form-id'),
                            confirmMessage = button.getAttribute('data-confirm-message') || 'Are you sure?',
                            form = document.getElementById(formId);

                        if (!form) return;

                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: 'btn btn-success',
                                cancelButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });

                        swalWithBootstrapButtons
                            .fire({
                                title: 'Are you sure?',
                                text: confirmMessage,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'No, cancel!',
                                reverseButtons: true
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    swalWithBootstrapButtons.fire('Cancelled', 'Your data is safe :)',
                                        'error');
                                }
                            });
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/customer/www/nateb61.sg-host.com/public_html/resources/views/components/datatable.blade.php ENDPATH**/ ?>