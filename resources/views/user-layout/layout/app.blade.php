@php
  use App\Models\RoleCategory;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporary Employee Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Raleway:wght@600&display=swap"
      rel="stylesheet"
    >
    {{-- <link rel="stylesheet" href="src/css/admin.css"> --}}
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/admin.css') }}?v=0..1">
    {{-- <link rel="stylesheet" href="src/css/dashboard.css"> --}}
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/dashboard.css') }}?v=0..1">
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/onboarding.css') }}?v=0..1">
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
      <script src="{{ asset('front-assets/src/userlogin/js/layout-includes.js') }}"></script>
    </body>
</html>