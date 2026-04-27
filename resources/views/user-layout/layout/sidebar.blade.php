@php
  use App\Models\RoleCategory;
  $userRole = auth()->user()->role;
  $currentRoute = request()->route()->getName();
  $currentId = request()->route('id');
@endphp

@if($currentRoute === 'frontend.profile')
  <!-- Simplified Sidebar for Profile Page -->
  <aside class="portal-sidebar" style="background: white; border-right: 1px solid #e2e8f0; display: flex; flex-direction: column; justify-content: space-between;">
    <nav class="portal-nav" aria-label="Primary navigation" style="padding: 20px 15px;">
      <a href="{{ route('frontend.profile') }}" 
         class="active">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Profile
      </a>
    </nav>
    
    <nav class="portal-nav portal-logout" aria-label="Account navigation" style="padding: 20px 15px; border-top: 1px solid #f1f5f9;">
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
         style="display: flex; align-items: center; gap: 12px; padding: 12px 15px; border-radius: 10px; text-decoration: none; font-weight: 600; color: #64748b; transition: all 0.3s;">
        <img src="{{ asset('front-assets/src/userlogin/dashbord/Logout-black-icon.png') }}" alt="" style="width: 20px;">
        Logout
      </a>
    </nav>
  </aside>
@else
  <!-- Original Sidebar for Dashboard and other pages -->
  @php
    $roleCategories = RoleCategory::where('name', $userRole)
                                   ->where('status', 1)
                                   ->get();
  @endphp
<aside class="portal-sidebar">
  <nav class="portal-nav" aria-label="Primary navigation">
    @php
      $currentRoute = request()->route()->getName();
      $currentId = request()->route('id');
    @endphp
    <a href="{{ route('frontend.independent-contractor.dashboard') }}" data-nav="" 
    class="{{ $currentRoute === 'frontend.independent-contractor.dashboard' ? 'active' : '' }}">
        <img src="{{ asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png') }}" alt="">Dashboard
    </a>
    @if($roleCategories->count() > 0)
      @foreach($roleCategories as $category)
        <a href="{{ route('category.show', $category->id) }}" data-nav="{{ strtolower(str_replace(' ', '-', $category->title)) }}" 
           class="{{ ($currentRoute === 'category.show' && $currentId == $category->id) ? 'active' : '' }}">
          @if(isset($category->image) && $category->image != '')
            <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}">
          @else
            <img src="{{ asset('front-assets/src/userlogin/dashbord/default-category.png') }}" alt="{{ $category->title }}">
          @endif
          
          @if(isset($category->title) && $category->title != '')
            {{ $category->title }}
          @endif
        </a>
      @endforeach
    @endif
  </nav>
  <nav class="portal-nav portal-logout" aria-label="Account navigation">
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <img src="{{ asset('front-assets/src/userlogin/dashbord/Logout-black-icon.png') }}" alt="">Logout
    </a>
     <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
      @csrf
     </form>
  </nav>
</aside>
@endif

<!-- Shared Logout Form -->
<form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
  @csrf
</form>
