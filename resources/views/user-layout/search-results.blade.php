@extends('user-layout.layout.app')

@section('main_content')
<section class="search-results-section">
    <div class="search-header">
        <h1 class="content-title">Search Results for "{{ $query }}"</h1>
        <p class="content-subtitle">Found {{ $files->count() }} matches</p>
    </div>

   <div class="doc-panel">
        @if($files && $files->count() > 0)
          @foreach($files as $file)
            <article class="doc-row">
              <p>{{ $file->name }}</p>
              <div class="doc-actions">
                <a class="preview" href="{{ route('central.file.preview', $file->id) }}" target="_blank" aria-label="Preview {{ $file->name }}">
                  <img src="{{ asset('front-assets/src/userlogin/images/preview-icon.png') }}"></a>
                {{-- <a class="download" href="{{ asset('uploads/' . $file->file_path) }}" download aria-label="Download {{ $file->name }}">
                  <img src="{{ asset('front-assets/src/userlogin/images/download-icon.png') }}"></a> --}}

                <a class="download" href="{{ route('file.download', $file->id) }}">
                  <img src="{{ asset('front-assets/src/userlogin/images/download-icon.png') }}">
                </a>
              </div>
            </article>
          @endforeach
        @else
          <!-- <p style="padding: 20px; text-align: center; color: #999;">No files available for this category.</p> -->
        @endif
      </div>
    @if($files->count() == 0)
        <div class="no-results">
            <h3>No matches found for "{{ $query }}"</h3>
            <p>Try checking your spelling or using more general keywords.</p>
            <!-- <a href="{{ route('dashboard') }}" class="btn-download" style="display: inline-block;">Back to Dashboard</a> -->
        </div>
    @endif
</section>
@endsection
