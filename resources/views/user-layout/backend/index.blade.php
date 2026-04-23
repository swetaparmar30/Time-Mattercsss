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
      rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/admin.css') }}?v=0..1">
    {{-- <link rel="stylesheet" href="src/css/admin.css"> --}}
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/dashboard.css') }}?v=0..1">
    {{-- <link rel="stylesheet" href="src/css/dashboard.css"> --}}
  </head>
  <body>
    <div class="portal-app">
      <header class="portal-header">
        <div class="portal-header-inner">
          <div class="portal-header-left">
            <div class="portal-logo-wrap">
              <img src="{{ asset('front-assets/src/userlogin/images/Time-matters-header-logo.webp') }}" alt="TimeMatters logo">
            </div>
            <span class="portal-header-divider" aria-hidden="true"></span>
            <span class="portal-title">Temporary Employee Portal</span>
          </div>

          <div class="portal-header-right">
            <label class="portal-search" aria-label="Search portal">
              <img src="/src/images/dashbord-images/search-icon.svg" alt="">
              <input type="search" placeholder="Search">
            </label>
            <div class="portal-user">
              <img class="avatar" src="{{ asset('front-assets/src/userlogin/dashbord/default-user.png') }}" alt="User avatar">
              <div class="portal-user-info">
                <strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</strong>
                {{-- <span>Admin</span> --}}
              </div>
            </div>
          </div>
        </div>
      </header>

      <main class="portal-main">
        <aside class="portal-sidebar">
          <nav class="portal-nav" aria-label="Primary navigation">
            <a class="active" href="dashboard.html"><img src="{{ asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png') }}" alt="">Dashboard</a>
            {{-- <a href="onboarding.html"><img src="/src/images/dashbord-images/Onboarding-black-icon.png" alt="">Onboarding</a>
            <a href="#"><img src="/src/images/dashbord-images/Forms%20%26%20Resources-black-icon.png" alt="">Forms &amp; Resources</a>
            <a href="#"><img src="/src/images/dashbord-images/Policies-black-icon.png" alt="">Policies</a> --}}
            @php
              $userRole = auth()->user()->role;
              $roleCategories = RoleCategory::where('name', $userRole)
                                             ->where('status', 1)
                                             ->get();
            @endphp
            @if($roleCategories->count() > 0)
                @foreach($roleCategories as $category)
                  <a href="{{ route('category.show', $category->id) }}"><img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}" style="object-fit: cover; width: 20px; height: 20px;">{{ $category->title }}</a>
                @endforeach
            @endif
          </nav>
          <nav class="portal-nav portal-logout" aria-label="Account navigation">
            <a href="#"><img src="/src/images/dashbord-images/Logout-black-icon.png" alt="">Logout</a>
          </nav>
        </aside>

        <section>
          <h1 class="content-title">Welcome Back, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
          <p class="content-subtitle">Access onboarding, policies, and resources</p>

          <div class="dashboard-cards">
            @php
              $userRole = auth()->user()->role;
              $roleCategories = RoleCategory::where('name', $userRole)
                                             ->where('status', 1)
                                             ->get();
            @endphp

            @if($roleCategories->count() > 0)
              @foreach($roleCategories as $category)
                <article class="dashboard-card">
                  <div class="card-icon-box">
                    @if($category->image)
                      <img class="top-icon" src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}" style="object-fit: cover; width: 100%; height: 100%;">
                    @else
                      <img class="top-icon" src="/src/images/dashbord-images/{{ strtolower(str_replace(' ', '-', $category->title)) }}-black-icon.png" alt="{{ $category->title }}">
                    @endif
                  </div>
                  <h3>{{ $category->title }}</h3>
                  <p>{!! $category->description !!}</p>
                  <a class="view-more-link" href="{{ route('category.show', $category->id) }}">{{ $category->button_text ?? 'View More' }} <img src="/src/images/dashbord-images/view-more-arrow.svg" alt=""></a>
                </article>
              @endforeach
            @else
              <article class="dashboard-card">
                <div class="card-icon-box">
                  <img class="top-icon" src="/src/images/dashbord-images/Onboarding-black-icon.png" alt="">
                </div>
                <h3>Onboarding</h3>
                <p>Welcome memo, banking forms, Beeline &amp; Bullhorn setup instructions.</p>
                <a class="view-more-link" href="onboarding.html">View More <img src="/src/images/dashbord-images/view-more-arrow.svg" alt=""></a>
              </article>
              <article class="dashboard-card">
                <div class="card-icon-box">
                  <img class="top-icon" src="/src/images/dashbord-images/Forms%20%26%20Resources-black-icon.png" alt="">
                </div>
                <h3>Forms &amp; Resources</h3>
                <p>Pay schedule, expense form, invoice template, and I1M contacts.</p>
                <a class="view-more-link" href="#">View More <img src="/src/images/dashbord-images/view-more-arrow.svg" alt=""></a>
              </article>
              <article class="dashboard-card">
                <div class="card-icon-box">
                  <img class="top-icon" src="/src/images/dashbord-images/Policies-black-icon.png" alt="">
                </div>
                <h3>Policies</h3>
                <p>Pay schedule, expense form, invoice template, and I1M contacts.</p>
                <a class="view-more-link" href="#">View More <img src="/src/images/dashbord-images/view-more-arrow.svg" alt=""></a>
              </article>
            @endif
          </div>
        </section>
      </main>

      <footer class="portal-footer"><div class="portal-footer-inner">&copy; 2026 TimeMatters Inc.</div></footer>
    </div>
  </body>
</html>
