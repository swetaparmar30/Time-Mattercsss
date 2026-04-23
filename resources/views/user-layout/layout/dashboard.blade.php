@extends('user-layout.layout.app')
@section('main_content')
@php
  use App\Models\RoleCategory;
@endphp
    <section>
        @php
            $userRole = auth()->user()->role;
            $roleCategories = RoleCategory::where('name', $userRole)
                                            ->where('status', 1)
                                            ->get();
            $titles = $roleCategories->pluck('title')->map(function ($item) {
                    return strtolower($item);
                })->toArray();

            $last = array_pop($titles); // last item
        @endphp
        <h1 class="content-title">Welcome Back, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
        {{-- <p class="content-subtitle">Access onboarding, policies, and resources</p> --}}
        <p class="content-subtitle">Access {{ implode(', ', $titles) }}
            @if($last)
                {{ count($titles) ? ' and ' : '' }}{{ $last }}
            @endif
        </p>

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
                    <img class="top-icon" src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}" >
                @else
                    <img class="top-icon" src="/src/images/dashbord-images/{{ strtolower(str_replace(' ', '-', $category->title)) }}-black-icon.png" alt="{{ $category->title }}">
                @endif
                </div>
                <h3>{{ $category->title }}</h3>
                <p>{!! $category->description !!}</p>
                <a class="view-more-link cmn-btn light-wht-btn" 
                    href="{{ route('category.show', $category->id) }}">
                    {{-- {{ $category->button_text ?? 'View More' }}  --}}
                    <span class="view-more-badge">View More</span>
                    <span class="btn-circle">
                        {{-- <img src="/src/images/common-btn-white-arrow.webp" alt="" aria-hidden="true"> --}}
                        <img src="{{ asset('front-assets/src/userlogin/dashbord/common-btn-white-arrow.webp') }}" alt="" aria-hidden="true">
                    </span>
                    {{-- <img src="/src/images/dashbord-images/view-more-arrow.svg" alt=""> --}}
                </a>
            </article>
            @endforeach
        @else
            {{-- <article class="dashboard-card">
                <div class="card-icon-box">
                    <img class="top-icon" src="/src/images/dashbord-images/Onboarding-black-icon.png" alt="">
                </div>
                <h3>Onboarding</h3>
                <p>Welcome memo, banking forms, Beeline &amp; Bullhorn setup instructions.</p>
                <a href="onboarding.html" class="view-more-link cmn-btn light-wht-btn">
                    <span class="view-more-badge">View More</span>
                    <span class="btn-circle">
                    <img src="/src/images/common-btn-white-arrow.webp" alt="" aria-hidden="true">
                    </span>
                </a>
            </article>
            <article class="dashboard-card">
                <div class="card-icon-box">
                    <img class="top-icon" src="/src/images/dashbord-images/Forms%20%26%20Resources-black-icon.png" alt="">
                </div>
                <h3>Forms &amp; Resources</h3>
                <p>Pay schedule, expense form, invoice template, and I1M contacts.</p>
                <a href="#" class="view-more-link cmn-btn light-wht-btn">
                    <span class="view-more-badge">View More</span>
                    <span class="btn-circle">
                    <img src="/src/images/common-btn-white-arrow.webp" alt="" aria-hidden="true">
                    </span>
                </a>
            </article>
            <article class="dashboard-card">
                <div class="card-icon-box">
                    <img class="top-icon" src="/src/images/dashbord-images/Policies-black-icon.png" alt="">
                </div>
                <h3>Policies</h3>
                <p>Pay schedule, expense form, invoice template, and I1M contacts.</p>
                <a href="#" class="view-more-link cmn-btn light-wht-btn">
                    <span class="view-more-badge">View More</span>
                    <span class="btn-circle">
                    <img src="/src/images/common-btn-white-arrow.webp" alt="" aria-hidden="true">
                    </span>
                </a>
            </article> --}}
        @endif
        </div>
    </section>
@endsection