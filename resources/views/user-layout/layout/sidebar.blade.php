@php
  use App\Models\RoleCategory;
  $userRole = auth()->user()->role;
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
          <img src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}">
          {{ $category->title }}
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
