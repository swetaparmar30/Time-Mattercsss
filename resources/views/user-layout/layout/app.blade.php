@php
  use App\Models\RoleCategory;
  $userRole = auth()->user()->role;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucwords(str_replace('-', ' ', $userRole)) }} Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Raleway:wght@600&display=swap" rel="stylesheet">
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

    {{-- <link rel="stylesheet" href="src/css/admin.css"> --}}
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/admin.css') }}?v=0..1">
    {{-- <link rel="stylesheet" href="src/css/dashboard.css"> --}}
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/dashboard.css') }}?v=0..1">
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/onboarding.css') }}?v=0..1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  </head>
  <body data-page="dashboard">
    <div class="portal-app">
{{-- header --}}
    @include('user-layout/layout/header')
    <main class="portal-main">
        @include('user-layout/layout/sidebar')
        @yield('main_content')
        
      </main>

      {{-- footer --}}
      @include('user-layout/layout/footer')

      </div>
      <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{ asset('front-assets/src/userlogin/js/layout-includes.js') }}"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif

            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
            @endif

            @if(Session::has('warning'))
                toastr.warning("{{ Session::get('warning') }}");
            @endif
        });
      </script>
    </body>
</html>