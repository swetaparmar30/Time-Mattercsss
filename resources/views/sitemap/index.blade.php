@extends('layouts.backend.index')

@push('styles')
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
</style>
@endpush
     
@section('main_content')     



@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('.sitemap-edit').first().trigger('click');
    
    $('.select2').select2({ placeholder: "Select pages", allowClear: true });
    $('.residential').select2({ placeholder: "Select pages", allowClear: true });
});

$(document).on('click', '.sitemap-edit', function () {
    $('.sitemap-edit').removeClass('active');
    $(this).addClass('active');

    var type = $(this).data('type');
    $('#sitemapType').val(type);
    $('#sitemapType1').val(type);

    $.ajax({
        url: "{{ route('sitemap-setting.edit') }}",
        method: "POST",
        data: { _token: '{{ csrf_token() }}', type: type },
        success: function (response) {
            let titleMap = { 'htmlsitemaps':'HTML Sitemap', 'posts':'Posts Sitemap', 'pages':'Pages Sitemap' };
            $('#header_title').text(titleMap[response.type.toLowerCase()] || response.type);
            $('.d_title').html(response.type === 'htmlsitemaps' ? 'This tab contains settings related to the HTML sitemap.' : (response.type === 'posts' ? 'Change Sitemap Posts Settings Of Single Post.' : 'Change Sitemap Page Settings Of Single Pages.'));
            
            // Update toggles
            $('#sitemapHtmlSwitch').prop('checked', response.html_sitemap == 1);
            $('#showDateSwitch').prop('checked', response.html_show_date == 1);
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
            $('#html-sitemap-section, #page-sitemap-section, #post-sitemap-section, #category-sitemap-section').hide();
            if(response.type === 'htmlsitemaps') $('#html-sitemap-section').show();
            else if(response.type === 'pages') $('#page-sitemap-section').show();
            else if(response.type === 'posts') $('#post-sitemap-section').show();
            else if(response.type === 'categories') $('#category-sitemap-section').show();
        }
    });
});

$(document).on('click', '.reset-btn', function(e) {
    e.preventDefault();
    let type = $(this).data('type');
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are resetting the sitemap settings!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, reset it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            $('#sitemapType1').val(type);
            $('#resetForm').submit();
        }
    });
});
</script>
@endpush
