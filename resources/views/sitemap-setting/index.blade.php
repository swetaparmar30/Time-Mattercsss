@extends('layouts.backend.index')

@push('styles')

@endpush

@section('main_content')
<style>
    /* Minor custom tweaks */
    .label-sec label {
        font-weight: 600;
        margin-bottom: 0;
    }
    .nav-sidebar a {
        display: block;
        padding: .5rem .75rem;
        color: #0d6efd;
        text-decoration: none;
        border-radius: 4px;
    }
    .nav-sidebar a:hover {
        background-color: #f1f5fa;
    }
    .card .card-inner {
        padding: 1rem;
    }
    .custom-select, .form-control {
        background: #f4f7fa;
        padding: 10px 20px;
        font-size: 14px;
    }
    .select-border-line {
            border: 1px solid #f2f2f2;
        }
</style>
<div class="pcoded-wrapper sitemap-page-class">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="row gy-3 first-box-row">
                        <div class="col-12 col-lg-10 first-box-col">
                            <div class="card mb-0 first-box">
                                <div class="card-body text-center">
                                    <h3 class="mt-5" id="header_title"></h3>
                                    <p class="d_title"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-10 m-0 second-box">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Sidebar nav -->
                                        <div class="col-12 col-md-3 second-box-left">
                                            <div class="card-body nav-sidebar">
                                                <div class="list-group">
                                                    @foreach($listsitemaps as $index => $list)
                                                    <div class="list-group-item list-group-item-action list-group-item-light sitemap-edit {{ $index === 0 ? 'active' : '' }}" data-id="{{$index}}" data-type="{{ $list->type }}">
                                                        @if($list->type == 'htmlsitemaps')
                                                            General Settings
                                                        @else
                                                            {{ ucwords($list->type) }}
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right section -->
                                        <div class="col-12 col-md-9 second-right p-0">
                                            <!-- HTML Sitemap -->
                                            <div id="html-sitemap-section" style="display: none;">
                                                <form id="myform" action="{{ route('sitemapsetting.storeupdate') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="type" id="sitemapType" value="htmlsitemaps">
                                                    <div class="card-body card-inner">
                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-4 label-sec">
                                                                <label for="sitemapHtmlSwitch" class="form-label">HTML Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="sitemapHtmlSwitch" name="sitemap_html">
                                                                    <label class="form-check-label" for="sitemapHtmlSwitch">Enable the HTML Sitemap</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-4 bottom-button-sec">
                                                        <button type="button" class="btn btn-secondary reset-btn" data-type="">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Pages Sitemap -->
                                            <div id="page-sitemap-section" style="display: none;">
                                                <form action="{{ route('sitemapsetting.storeupdate') }}" method="POST" id="myform1">
                                                    @csrf
                                                    <input type="hidden" name="type" id="sitemapType1" value="pages">
                                                    <div class="card-body card-inner">
                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-12">
                                                                <input class="form-control" type="text" value="Sitemap URL: {{ route('pagefront.xml') }}" disabled style="border-left: 5px solid #8b8b8b;">
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-4 label-sec">
                                                                <label for="p_include_sitemap" class="form-label">Include In XML Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="p_include_sitemap" name="in_sitemap">
                                                                    <label class="form-check-label" for="p_include_sitemap">Include this page in the XML sitemap</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-4 label-sec">
                                                                <label for="p_include_html_sitemap" class="form-label">Include in HTML Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="p_include_html_sitemap" name="in_html_sitemap">
                                                                    <label class="form-check-label" for="p_include_html_sitemap">Include this page in the HTML sitemap</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mt-5">
                                                            <div class="col-sm-5 label-sec">
                                                                <label class="form-label">Exclude in Main Pages</label>
                                                            </div>
                                                            <div class="col-sm-12 select-border-line">
                                                                <select class="form-select select2" name="pages[]" id="pagesSelect" multiple data-placeholder="Select Pages">
                                                                    @foreach($pagesSitemap as $pageUrl)
                                                                        @php
                                                                            $path = trim(parse_url($pageUrl, PHP_URL_PATH), '/');
                                                                            $displayName = $path === '' ? 'home' : str_replace('-', ' ', $path);
                                                                        @endphp
                                                                        <option value="{{ $pageUrl }}">{{ $displayName }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-between mt-5 bottom-button-sec">
                                                        <button type="button" class="btn btn-secondary reset-btn" data-type="">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Post Sitemap -->
                                            <div id="post-sitemap-section" style="display: none;">
                                                <form id="postform" action="{{ route('sitemapsetting.storeupdate') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="type" id="sitemapType2" value="posts">
                                                    <div class="card-body card-inner">
                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-12">
                                                                <input class="form-control" type="text" value="Sitemap URL: {{ route('postfront.xml') }}" disabled style="border-left: 5px solid #8b8b8b;">
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-4 label-sec">
                                                                <label for="post_include_sitemap" class="form-label">Include In XML Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="post_include_sitemap" name="post_include_sitemap">
                                                                    <label class="form-check-label" for="post_include_sitemap">Include this post type in XML Sitemap</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mb-5">
                                                            <div class="col-sm-4 label-sec">
                                                                <label for="post_include_h_sitemap" class="form-label">Include in HTML Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox" id="post_include_h_sitemap" name="post_include_h_sitemap">
                                                                    <label class="form-check-label" for="post_include_h_sitemap">Include this post type in the HTML sitemap</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center mt-5">
                                                            <div class="col-sm-5 label-sec">
                                                                <label class="form-label">Exclude Posts from Sitemap</label>
                                                            </div>
                                                            <div class="col-sm-12 select-border-line">
                                                                <select class="form-select select2" name="post[]" id="postsSelect" multiple data-placeholder="Select Posts">
                                                                   
                                                                    @foreach($blogSitemap as $blog)
                                                                        <option value="{{ $blog['url'] }}">{{ $blog['title'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-4 bottom-button-sec">
                                                        <button type="button" class="btn btn-secondary reset-btn" data-type="">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div> <!-- End Right -->
                                    </div> <!-- End Row -->
                                </div> <!-- End Card Body -->
                            </div> <!-- End Card -->
                        </div> <!-- End Second Box -->
                    </div> <!-- End Row -->
                </div>
            </div>
        </div>
    </div>
</div>

<form id="resetForm" method="POST" action="{{ route('sitemapsetting.reset') }}">
    @csrf
    <input type="hidden" name="type" id="sitemapTypeReset">
</form>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize Select2 for all selects
    $('#pagesSelect, #residentialid, #commercialsid, #postsSelect').select2({
        placeholder: "Select pages",
        allowClear: true
    });

    setTimeout(function() {
        $('.sitemap-edit').first().click();
    }, 1000); // small delay ensures everything is rendered
});


// Tab click
$(document).on('click', '.sitemap-edit', function () {
  
    $('.sitemap-edit').removeClass('active');
    $(this).addClass('active');

    let type = $(this).data('type').toLowerCase(); // force lowercase

    $('.sitemapType').val(type); // set all hidden inputs
    $('#sitemapType1').val(type); // reset form hidden input

    $.ajax({
        url: "{{ route('sitemap-setting.edit') }}",
        method: "POST",
        data: { _token: '{{ csrf_token() }}', type: type },
        success: function(response) {
            let type = response.type.toLowerCase(); // force lowercase from controller
            $('#header_title').text(
                type === 'htmlsitemaps' ? 'HTML Sitemap' :
                type === 'pages' ? 'Pages Sitemap' :
                type === 'posts' ? 'Posts Sitemap' : type
            );

            $('.d_title').text(
                type === 'htmlsitemaps' ? 'This tab contains settings related to the HTML sitemap.' :
                type === 'pages' ? 'Change Sitemap Page Settings Of Single Pages.' :
                type === 'posts' ? 'Change Sitemap Posts Settings Of Single Post.' : ''
            );

            // Set toggles
            $('#sitemapHtmlSwitch').prop('checked', response.html_sitemap == 1);
            $('#p_include_sitemap').prop('checked', response.p_include_sitemap == 1);
            $('#p_include_html_sitemap').prop('checked', response.p_include_html_sitemap == 1);
            $('#post_include_sitemap').prop('checked', response.post_include_sitemap == 1);
            $('#post_include_h_sitemap').prop('checked', response.post_include_h_sitemap == 1);

            // Set selects
            $('#pagesSelect').val(JSON.parse(response.select_page ?? '[]')).trigger('change');
            $('#postsSelect').val(JSON.parse(response.select_posts ?? '[]')).trigger('change');
            $('#residentialid').val(JSON.parse(response.r_select_page ?? '[]')).trigger('change');
            $('#commercialsid').val(JSON.parse(response.c_select_page ?? '[]')).trigger('change');

            // Show/hide sections
            $('#html-sitemap-section, #page-sitemap-section, #post-sitemap-section').hide();
            if(type === 'htmlsitemaps') $('#html-sitemap-section').show();
            else if(type === 'pages') $('#page-sitemap-section').show();
            else if(type === 'posts') $('#post-sitemap-section').show();
        },
        error: function() {
            console.error('Error fetching sitemap data');
        }
    });
});


// Reset button
$(document).on('click', '.reset-btn', function(e) {
    e.preventDefault();
    let type = $(this).data('type');
    Swal.fire({
        title:'Are you sure?',
        text:'You are resetting the sitemap settings!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'Yes, reset it!',
        cancelButtonText:'Cancel',
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33'
    }).then((result)=>{
        if(result.isConfirmed){
            $('#sitemapTypeReset').val(type);
            $('#resetForm').submit();
        }
    });
});
</script>

@endsection