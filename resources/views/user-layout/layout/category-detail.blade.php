@extends('user-layout.layout.app')
@section('main_content')
@php
  use App\Models\RoleCategory;
@endphp

    <section>
      <div class="onboarding-header">
        <span class="onboarding-back-arrow" aria-hidden="true"></span>
        <h1>{{ $category->title }}</h1>
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
          <p style="padding: 20px; text-align: center; color: #999;">No files available for this category.</p>
        @endif
      </div>
    </section>
@endsection
