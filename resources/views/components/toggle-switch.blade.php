@php
    $id ??= $name;
    $name ??= $id;
    $value = old($name, $value ?? true);
    $class ??= '';
    $label ??= '';
    $error = $errors->has($name);
    $message = $errors->first($name);
    $errorClass = $error ? 'is-invalid' : '';
@endphp
@push('component-style')
    <style>
        label[for="{{ $id }}"] {
            user-select: none;
        }

        .switch input[type="checkbox"].form-check-sm+.cr:after {
            height: 15px;
            width: 15px;
        }

        .switch input[type="checkbox"].form-check-sm+.cr:after {
            top: 2px;
            left: 4px;
        }

        .switch input[type="checkbox"].form-check-sm+.cr,
        .switch input[type="checkbox"].form-check-sm+.cr:before {
            height: 20px;
            width: 30px;
            background-color: #cbcbcb;
        }

        .switch input[type="checkbox"].form-check-sm:checked+.cr:after {
            left: 13px;
        }
    </style>
@endpush
<div class="form-group  {{$noPadding ? 'mb-0' : "p-t-15"}} {{ $error ? 'was-validated' : '' }}">
    <div class="switch d-inline m-r-10">
        <input type="checkbox" class="switcher-input {{ $class }} {{ $errorClass }}" id="{{ $id }}" name="{{ $name }}"
            {{ $value ? 'checked' : '' }}>
        <label for="{{ $id }}" class="cr"></label>
    </div>
    <label for="{{ $id }}">{!! $label !!}</label>
    @if (! empty($instruction))
        <br><small class="text-muted">{{ $instruction }}</small>
    @endif
    @if ($error)
        <br><span class="text-danger">{{ $message }}</span>
    @endif
</div>
