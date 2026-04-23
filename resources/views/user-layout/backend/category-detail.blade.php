<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->title }} - TimeMatters</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Raleway:wght@600&display=swap"
      rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/admin.css') }}?v=0..1">
    <link rel="stylesheet" href="{{ asset('front-assets/src/userlogin/css/dashboard.css') }}?v=0..1">
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
              </div>
            </div>
          </div>
        </div>
      </header>

      <main class="portal-main">
        <aside class="portal-sidebar">
          <nav class="portal-nav" aria-label="Primary navigation">
            <a href="{{ route('frontend.independent-contractor.dashboard') }}"><img src="{{ asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png') }}" alt="">Dashboard</a>
            @php
              $userRole = auth()->user()->role;
              $roleCategories = \App\Models\RoleCategory::where('name', $userRole)
                                                 ->where('status', 1)
                                                 ->get();
            @endphp
            @if($roleCategories->count() > 0)
                @foreach($roleCategories as $cat)
                  <a href="{{ route('category.show', $cat->id) }}" class="{{ $cat->id == $category->id ? 'active' : '' }}">
                    <img src="{{ asset('uploads/' . $cat->image) }}" alt="{{ $cat->title }}" style="object-fit: cover; width: 20px; height: 20px;">
                    {{ $cat->title }}
                  </a>
                @endforeach
            @endif
          </nav>
          <nav class="portal-nav portal-logout" aria-label="Account navigation">
            <a href="#"><img src="/src/images/dashbord-images/Logout-black-icon.png" alt="">Logout</a>
          </nav>
        </aside>

        <section>
          <div class="onboarding-header">
            <a href="{{ route('frontend.independent-contractor.dashboard') }}" style="display: inline-block;">
              <img src="/src/images/dashbord-images/back-icon.svg" alt="Back">
            </a>
            <h1>{{ $category->title }}</h1>
          </div>

          <div class="doc-panel">
            @if($files && $files->count() > 0)
              @foreach($files as $file)
                <article class="doc-row">
                  <p>{{ $file->name }}</p>
                  <div class="doc-actions">
                    <a class="preview" href="{{ asset('uploads/' . $file->file_path) }}" target="_blank" aria-label="Preview {{ $file->name }}"><img src="/src/images/dashbord-images/preview-icon.png" alt="Preview"></a>
                    <a class="download" href="{{ asset('uploads/' . $file->file_path) }}" download aria-label="Download {{ $file->name }}"><img src="/src/images/dashbord-images/download-icon.png" alt="Download"></a>
                  </div>
                </article>
              @endforeach
            @else
              <p style="padding: 20px; text-align: center; color: #999;">No files available for this category.</p>
            @endif
          </div>
        </section>
      </main>

      <footer class="portal-footer"><div class="portal-footer-inner">&copy; {{ date('Y') }} TimeMatters Inc.</div></footer>
    </div>
  </body>
</html>
