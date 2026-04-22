<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Timemattersinc">
    <meta name="author" content="Timemattersinc">
    <meta name="keyword" content="Timemattersinc">
    <meta name="robots" content="noindex,nofollow">
    <title>Timemattersinc</title>
  
    @php
        $setting = App\Models\Setting::first();
        if(isset($setting)){
            $img = App\Models\MediaImage::select('name')->where('id', $setting->site_favicon)->first();
        }
    @endphp
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">
    @if(isset($img->name) && $img->name != '')
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/'.$img->name) }}">
    @endif
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Main styles for this application-->
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{ asset('css/examples.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .parsley-errors-list {
            color: red; 
            list-style-type: none;
            padding: 10px 0 0 !important;
        }
    </style>
</head>

<body>
    
            @yield('content')
           
    <!-- CoreUI and necessary plugins-->
    {{-- <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('error'))
            toastr.error('{{ Session::get("error") }}');
            @elseif(Session::has('success'))
            toastr.success('{{ Session::get("success") }}');
            @endif
        });
        </script>
<script src="{{ asset('js/parsley/parsley.min.js')}}"></script>
@yield('script')
</body>

</html>