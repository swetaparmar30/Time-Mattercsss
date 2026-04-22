{{-- 
    REUSABLE DATATABLE COMPONENT DOCUMENTATION
    
    This component provides a flexible and reusable datatable for any type of data.
    
    USAGE:
    <x-datatable :data="$yourData" :columns="$columns" :actions="$actions" />
    
    PARAMETERS:
    - data: Array or Collection of data to display
    - columns: Array defining column structure
    - actions: Array defining action buttons
    - tableId: Unique ID for the table (default: 'datatable')
    - searchable: Enable/disable search (default: true)
    - sortable: Enable/disable sorting (default: true)
    - perPageOptions: Array of items per page options (default: [5,10,15,20,25])
    - defaultPerPage: Default items per page (default: 10)
    - emptyMessage: Message when no data (default: 'No data found')
    - emptyIcon: Icon when no data (default: 'ph ph-database')
    - pagination: Pagination object (optional)
    - responsive: Enable responsive table (default: true)
    
    COLUMN TYPES:
    - text: Plain text (default)
    - image: Display image
    - avatar: Display avatar with name
    - badge: Display badge with custom styling
    - status: Display status with icon
    - date: Format date with optional time
    - currency: Format currency values
    - custom: Use custom render function
    
    ACTION TYPES:
    - view: View action button
    - edit: Edit action button  
    - delete: Delete action button with confirmation
    - custom: Custom action with render function
    
    EXAMPLES:
--}}

{{-- Basic Usage --}}
<x-datatable 
    :data="$users"
    :columns="[
    ['key' => 'name', 'title' => 'NAME'],
    ['key' => 'email', 'title' => 'EMAIL'],
    ['key' => 'created_at', 'title' => 'JOINED', 'type' => 'date']
]"
    :actions="[
    ['type' => 'edit', 'url' => fn ($row) => route('users.edit', $row)],
    ['type' => 'delete', 'url' => fn ($row) => route('users.destroy', $row)]
]"
/>

{{-- Advanced Usage with Custom Rendering --}}
<x-datatable 
    :data="$products"
    :columns="[
    [
        'key' => 'name',
        'title' => 'PRODUCT',
        'render' => function ($row) {
            return '<div class="d-flex align-items-center">
                    <img src="'.$row->image.'" class="img-radius wid-40 me-3">
                    <div>
                        <h6 class="mb-0">'.$row->name.'</h6>
                        <small class="text-muted">'.$row->sku.'</small>
                    </div>
                </div>';
        }
    ],
    [
        'key' => 'price',
        'title' => 'PRICE',
        'type' => 'currency',
        'currency' => '$'
    ],
    [
        'key' => 'status',
        'title' => 'STATUS',
        'type' => 'status'
    ]
]"
    :actions="[
    ['type' => 'view', 'url' => fn ($row) => route('products.show', $row)],
    ['type' => 'edit', 'url' => fn ($row) => route('products.edit', $row)],
    [
        'type' => 'custom',
        'render' => function ($row) {
            return '<button class="btn btn-sm btn-outline-dark" onclick="quickEdit('.$row->id.')">
                    Quick Edit
                </button>';
        }
    ]
]"
    table-id="productsTable"
    :pagination="$products"
    empty-message="No products available"
    empty-icon="ph ph-package"
/>

{{-- Column Type Examples --}}
@php
    $columnExamples = [
        // Text column
        ['key' => 'name', 'title' => 'Name'],

        // Image column
        ['key' => 'avatar', 'title' => 'Avatar', 'type' => 'image'],

        // Avatar with name
        ['key' => 'user', 'title' => 'User', 'type' => 'avatar', 'nameKey' => 'name'],

        // Badge column
        ['key' => 'role', 'title' => 'Role', 'type' => 'badge', 'badgeClass' => 'text-bg-dark'],

        // Status column
        ['key' => 'active', 'title' => 'Status', 'type' => 'status'],

        // Date column
        ['key' => 'created_at', 'title' => 'Created', 'type' => 'date', 'format' => 'M d, Y'],

        // Date with time
        ['key' => 'updated_at', 'title' => 'Updated', 'type' => 'date', 'format' => 'M d, Y', 'timeFormat' => 'h:i A'],

        // Currency column
        ['key' => 'price', 'title' => 'Price', 'type' => 'currency', 'currency' => '$', 'decimals' => 2],

        // Custom render
        [
            'key' => 'actions',
            'title' => 'Actions',
            'render' => function ($row) {
                return '<div class="btn-group">
                                    <button class="btn btn-sm btn-dark">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </div>';
            }
        ]
    ];
@endphp

{{-- Action Type Examples --}}
@php
    $actionExamples = [
        // View action
        ['type' => 'view', 'url' => fn ($row) => route('items.show', $row), 'title' => 'View Details'],

        // Edit action
        ['type' => 'edit', 'url' => fn ($row) => route('items.edit', $row), 'title' => 'Edit Item'],

        // Delete action
        [
            'type' => 'delete',
            'url' => fn ($row) => route('items.destroy', $row),
            'title' => 'Delete Item',
            'confirmMessage' => 'Are you sure you want to delete this item?'
        ],

        // Custom action
        [
            'type' => 'custom',
            'title' => 'Custom Action',
            'render' => function ($row) {
                return '<button class="btn btn-sm btn-outline-secondary" onclick="customAction('.$row->id.')">
                                    <i class="ti ti-settings"></i>
                                </button>';
            }
        ]
    ];
@endphp
