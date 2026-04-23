@extends('user-layout.layout.app')

@section('main_content')
<section class="search-results-section">
    <div class="search-header">
        <h1 class="content-title">Search Results for "{{ $query }}"</h1>
        <p class="content-subtitle">Found {{ $categories->count() + $files->count() }} matches</p>
    </div>

    @if($categories->count() > 0)
        <div class="results-group">
            <h2 style="margin-bottom: 20px; font-size: 1.5rem; color: #333;">Categories</h2>
            <div class="dashboard-cards" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                @foreach($categories as $category)
                <article class="dashboard-card">
                    <div class="card-icon-box">
                        @if($category->image)
                            <img class="top-icon" src="{{ asset('uploads/' . $category->image) }}" alt="{{ $category->title }}">
                        @else
                            <img class="top-icon" src="{{ asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png') }}" alt="{{ $category->title }}">
                        @endif
                    </div>
                    <h3>{{ $category->title }}</h3>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($category->description), 100) !!}</p>
                    <a class="view-more-link cmn-btn light-wht-btn" href="{{ route('category.show', $category->id) }}">
                        <span class="view-more-badge">View Details</span>
                        <span class="btn-circle">
                            <img src="{{ asset('front-assets/src/userlogin/dashbord/common-btn-white-arrow.webp') }}" alt="" aria-hidden="true">
                        </span>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    @endif

    @if($files->count() > 0)
        <div class="results-group" style="margin-top: 40px;">
            <h2 style="margin-bottom: 20px; font-size: 1.5rem; color: #333;">Files & Resources</h2>
            <div class="files-list" style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden;">
                @foreach($files as $file)
                <div class="file-item" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border-bottom: 1px solid #eee;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <img src="{{ asset('front-assets/src/userlogin/dashbord/Dashboard-black-icon.png') }}" alt="File" style="width: 24px; opacity: 0.5;">
                        <div>
                            <strong style="display: block; color: #333;">{{ $file->name }}</strong>
                            <small style="color: #666;">Resource</small>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('central.file.preview', $file->id) }}" target="_blank" class="cmn-btn" style="padding: 5px 15px; font-size: 12px; background: #eee; color: #333; text-decoration: none; border-radius: 4px;">Preview</a>
                        <a href="{{ route('file.download', $file->id) }}" class="cmn-btn" style="padding: 5px 15px; font-size: 12px; background: #000; color: #fff; text-decoration: none; border-radius: 4px;">Download</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($categories->count() == 0 && $files->count() == 0)
        <div class="no-results" style="text-align: center; padding: 80px 20px;">
            <h3 style="color: #666;">No matches found for your search.</h3>
            <p style="color: #999;">Try different keywords or browse categories.</p>
            <a href="{{ route('dashboard') }}" class="cmn-btn" style="display: inline-block; margin-top: 20px; background: #000; color: #fff; padding: 10px 25px; border-radius: 6px; text-decoration: none;">Back to Dashboard</a>
        </div>
    @endif
</section>

<style>
    .search-results-section {
        padding: 40px 20px;
    }
    .search-header {
        margin-bottom: 40px;
    }
    .file-item:last-child {
        border-bottom: none;
    }
    .cmn-btn {
        transition: opacity 0.3s;
    }
    .cmn-btn:hover {
        opacity: 0.8;
    }
    .dashboard-card p {
        color: #666;
        line-height: 1.5;
        margin-bottom: 20px;
    }
</style>
@endsection
