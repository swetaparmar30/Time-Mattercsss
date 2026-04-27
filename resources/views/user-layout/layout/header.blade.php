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
      <span class="portal-title"> {{ ucwords(str_replace('-', ' ', $userRole)) }} Portal</span>
    </div>

    <div class="portal-header-right">
      <form action="{{ route('frontend.search') }}" method="GET" class="portal-search-form">
        <label class="portal-search" aria-label="Search portal">
          <img src="{{ asset('front-assets/src/userlogin/dashbord/search-icon.svg') }}" class="search-icon" alt="">
          <input type="search" name="query" id="globalSearchInput" placeholder="Search" value="{{ request('query') }}" autocomplete="off">
          <button type="button" id="clearSearch" class="clear-search" aria-label="Clear search" {{ request('query') ? '' : 'style=display:none' }}>&times;</button>
          <div class="quick-search-results" id="quickSearchResults" hidden></div>
        </label>
      </form>
      <div class="portal-user">
        @if(auth()->user()->image)
          <img class="avatar" src="{{ asset('uploads/profile/' . auth()->user()->image) }}" alt="User avatar" style="object-fit: cover;">
        @else
          <img class="avatar" src="{{ asset('front-assets/src/userlogin/dashbord/default-user.png') }}" alt="User avatar">
        @endif
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
    <button class="profile-popup-close" id="profilePopupClose" type="button" aria-label="Close profile menu">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </button>
    
    <div class="profile-popup-header">
      <div class="profile-popup-avatar-wrapper">
        @if(auth()->user()->image)
          <img class="profile-popup-avatar" src="{{ asset('uploads/profile/' . auth()->user()->image) }}" alt="User avatar">
        @else
          <img class="profile-popup-avatar" src="{{ asset('front-assets/src/userlogin/dashbord/default-user.png') }}" alt="User avatar">
        @endif
      </div>
      <div class="profile-popup-user-details">
        <h2 class="profile-popup-name" id="profilePopupTitle"><b>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</b></h2>
        <div class="profile-popup-stats">
          <span class="profile-stat user-role">{{ ucwords(str_replace('-', ' ', auth()->user()->role)) }}</span>
        </div>
      </div>
    </div>

    <hr class="profile-popup-divider">
    <div class="profile-popup-menu">
      <a href="{{ route('frontend.profile') }}" class="profile-menu-item">Profile Settings</a>
      <a href="#" class="profile-menu-item logout-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
      <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
</div>
