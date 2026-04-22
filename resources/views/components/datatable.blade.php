@props([
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
])

@php
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
@endphp

@php
    $hasActions = !empty($actions);
    $hasData = !empty($data) && count($data) > 0;
@endphp

<div class="table-responsive">
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
        @if ($searchable || !empty($perPageOptions))
            <div class="datatable-top">
                @if (!empty($perPageOptions))
                    <div class="datatable-dropdown">
                        <label>
                            <select class="datatable-selector" name="per-page">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" @selected($option == $defaultPerPage)>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select> entries per page
                        </label>
                    </div>
                @endif

                @if ($searchable)
                    <div class="datatable-search">
                        <input class="datatable-input" placeholder="Search..." type="search" name="search"
                            title="Search within table" aria-controls="{{ $tableId }}">
                    </div>
                @endif
            </div>
        @endif

        <div class="datatable-container">
            <table class="table table-hover datatable-table {{ $responsive ? 'table-responsive' : '' }}"
                id="{{ $tableId }}">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th data-sortable="{{ $sortable && ($column['sortable'] ?? false) ? 'true' : 'false' }}"
                                data-sort-key="{{ $column['key'] ?? '' }}"
                                style="width: {{ $column['width'] ?? 'auto' }};">
                                @if ($sortable && ($column['sortable'] ?? false))
                                    <button type="button" class="datatable-sorter">{{ $column['title'] ?? $column['key'] }}</button>
                                @else
                                    <span>{{ $column['title'] ?? $column['key'] }}</span>
                                @endif
                            </th>
                        @endforeach

                        @if ($hasActions)
                            <th data-sortable="false" style="width: auto;">
                                <button>ACTIONS</button>
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($hasData)
                        @foreach ($data as $index => $row)
                            <tr data-index="{{ $index }}">
                                @foreach ($columns as $column)
                                    <td>
                                        @if (isset($column['render']))
                                            {!! $column['render']($row, $index) !!}
                                        @elseif(isset($column['key']))
                                            @php
                                                $value = data_get($row, $column['key']);
                                            @endphp

                                            @if (isset($column['type']))
                                                @switch($column['type'])
                                                    @case('image')
                                                        @if ($value)
                                                            <img src="{{ $value }}"
                                                                alt="{{ $column['alt'] ?? 'Image' }}"
                                                                class="img-radius wid-40">
                                                        @else
                                                            <div class="avatar wid-40 bg-light">
                                                                <i class="ph ph-user"></i>
                                                            </div>
                                                        @endif
                                                    @break

                                                    @case('avatar')
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                @if ($value)
                                                                    <img src="{{ $value }}" alt="user image"
                                                                        class="img-radius wid-40">
                                                                @else
                                                                    <div class="avatar wid-40 bg-light">
                                                                        <i class="ph ph-user"></i>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="mb-0">
                                                                    {{ data_get($row, $column['nameKey'] ?? 'name') }}</h6>
                                                            </div>
                                                        </div>
                                                    @break

                                                    @case('badge')
                                                        @php
                                                            $badgeClass = $column['badgeClass'] ?? 'badge-dark';
                                                            $badgeText = $value;

                                                            if (isset($column['badgeMap'])) {
                                                                $badgeText = $column['badgeMap'][$value] ?? $value;
                                                            }
                                                        @endphp
                                                        <span class="badge {{ $badgeClass }}">{{ $badgeText }}</span>
                                                    @break

                                                    @case('status')
                                                        @php
                                                            $statusClass = $value ? 'text-success' : 'text-secondary';
                                                            $statusText = $value ? 'Active' : 'Inactive';
                                                            $statusIcon = $value
                                                                ? 'ti ti-circle-filled'
                                                                : 'ti ti-circle-filled';
                                                        @endphp
                                                        <span class="{{ $statusClass }}">
                                                            <i class="{{ $statusIcon }} align-baseline f-10 m-r-10"></i>
                                                            {{ $statusText }}
                                                        </span>
                                                    @break

                                                    @case('date')
                                                        @php
                                                            $dateFormat = $column['format'] ?? 'M d, Y';
                                                            $timeFormat = $column['timeFormat'] ?? null;
                                                        @endphp
                                                        {{ $value ? \Carbon\Carbon::parse($value)->format($dateFormat) : '' }}
                                                        @if ($timeFormat)
                                                            <span class="text-muted text-sm d-block">
                                                                {{ $value ? \Carbon\Carbon::parse($value)->format($timeFormat) : '' }}
                                                            </span>
                                                        @endif
                                                    @break

                                                    @case('currency')
                                                        @php
                                                            $currency = $column['currency'] ?? '$';
                                                            $decimals = $column['decimals'] ?? 2;
                                                        @endphp
                                                        {{ $currency }}{{ number_format($value, $decimals) }}
                                                    @break

                                                    @default
                                                        {{ $value }}
                                                @endswitch
                                            @else
                                                {{ $value }}
                                            @endif
                                        @endif
                                    </td>
                                @endforeach

                                @if ($hasActions)
                                    <td>
                                        <div class="btn-group" role="group">
                                            @foreach ($actions as $action)
                                                @if ($action['type'] === 'view')
                                                    <a href="{{ $action['url']($row) }}"
                                                        class="avatar avatar-xs mx-1 btn-link-secondary"
                                                        title="{{ $action['title'] ?? 'View' }}">
                                                        <i class="ti ti-eye f-20"></i>
                                                    </a>
                                                @elseif($action['type'] === 'edit')
                                                    <a href="{{ $action['url']($row) }}"
                                                        class="avatar avatar-xs mx-1 btn-link-secondary"
                                                        title="{{ $action['title'] ?? 'Edit' }}">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                @elseif($action['type'] === 'delete')
                                                    <form action="{{ $action['url']($row) }}" method="POST"
                                                        style="display: inline-block;"
                                                        id="deleteForm{{ data_get($row, 'id', $index) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button"
                                                        class="avatar avatar-xs mx-1 btn btn-link-secondary delete-btn"
                                                        data-form-id="deleteForm{{ data_get($row, 'id', $index) }}"
                                                        data-confirm-message="{{ $action['confirmMessage'] ?? 'Are you sure?' }}"
                                                        title="{{ $action['title'] ?? 'Delete' }}">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </button>
                                                @elseif($action['type'] === 'custom')
                                                    {!! $action['render']($row, $index) !!}
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="{{ count($columns) + ($hasActions ? 1 : 0) }}" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="{{ $emptyIcon }}"
                                        style="font-size: 48px; color: #ccc; margin-bottom: 1rem;"></i>
                                    <h5 class="text-muted mb-2">{{ $emptyMessage }}</h5>
                                    @if ($emptyAction)
                                        <a href="{{ $emptyAction['url'] }}" class="btn btn-primary">
                                            @if (isset($emptyAction['icon']))
                                                <i class="{{ $emptyAction['icon'] }}"></i>
                                            @endif
                                            {{ $emptyAction['text'] }}
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if ($pagination && method_exists($pagination, 'links'))
            <div class="d-flex justify-content-end gap-3 mt-3">
                {{ $pagination->links('vendor.pagination.bootstrap-5') }}
            </div>
        @endif
    </div>
</div>

@if ($hasData)
    @push('script')
        <script type="module">
            import {
                DataTable
            } from '{{ asset('assets/js/plugins/module.js') }}';
            window.dt = new DataTable('#{{ $tableId }}');
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tableId = '{{ $tableId }}',
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
    @endpush
@endif
