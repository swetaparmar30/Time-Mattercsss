<header class="portal-header">
  @php
    use App\Models\RoleCategory;
    $userRole = auth()->user()->role;
    
    
  @endphp
  <div class="portal-header-inner">
    <div class="portal-header-left">
      <div class="portal-logo-wrap">
        <img src="{{ asset('front-assets/src/userlogin/images/Time-matters-header-logo.webp') }}" alt="TimeMatters logo">
      </div>
      <span class="portal-header-divider" aria-hidden="true"></span>
      <span class="portal-title"> {{ ucwords(str_replace('-', ' ', $userRole)) }}</span>
    </div>

    <div class="portal-header-right">
      <label class="portal-search" aria-label="Search portal">
        <img src="{{ asset('front-assets/src/userlogin/dashbord/search-icon.svg') }}" alt="">
        <input type="search" placeholder="Search">
      </label>
      <div class="portal-user">
        <img class="avatar" src="{{ asset('front-assets/src/userlogin/dashbord/default-user.png') }}    " alt="User avatar">
        <div class="portal-user-info">
          <strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</strong>
          {{-- <span>Admin</span> --}}
        </div>
        <button class="portal-user-toggle" id="profileMenuToggle" type="button" aria-label="Open profile menu" aria-expanded="false" aria-controls="profilePopup">
          <span aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="profile-popup-overlay" id="profilePopup" hidden>
  <div class="profile-popup-card" role="dialog" aria-modal="true" aria-labelledby="profilePopupTitle">
    <button class="profile-popup-close" id="profilePopupClose" type="button" aria-label="Close profile menu">&times;</button>
    <p class="profile-popup-role" id="profilePopupTitle">{{ ucwords(str_replace('-', ' ', $userRole)) }}</p>
    <img class="profile-popup-avatar" src="{{ asset('front-assets/src/userlogin/dashbord/default-user.png') }}" alt="User avatar">
    <p class="profile-popup-greeting" id="profilePopupGreeting">Hi, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
    <div class="profile-popup-actions">
      {{-- <a href="#" class="profile-popup-action">Manage profile</a> --}}
      <a href="#" class="profile-popup-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
      <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    {{-- <div class="profile-popup-links">
      <a href="#">Support</a>
      <span>&bull;</span>
      <a href="#">Terms of Service</a>
    </div> --}}
  </div>
</div>
