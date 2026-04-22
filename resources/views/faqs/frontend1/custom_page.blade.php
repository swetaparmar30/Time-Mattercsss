@extends('frontend.layouts.index')
@if(isset($page->meta_title) && $page->meta_title != '')
    @section('title') {{$page->meta_title}} @endsection
@endif
@if(isset($page->meta_keyword) && $page->meta_keyword != '')
    @section('meta-keywords') {{$page->meta_keyword}} @endsection
@endif
@if(isset($page->meta_description) && $page->meta_description != '')
    @section('meta-description') {{$page->meta_description}} @endsection
@endif
@if(isset($page->page_index) && $page->page_index != '' && $page->page_index == 'on')
@section('robots') index @endsection
@else
@section('robots') noindex @endsection
@endif
@if(isset($page->canonical_url) && $page->canonical_url != '' && $page->canonical_url != null)
@section('canonical') {{$page->canonical_url}} @endsection
@endif
@section('content')
@if(isset($page->header_banner) && $page->header_banner != null &&  $page->header_banner != '' && $page->header_banner == '1')
@php
if(isset($page->header_banner_img) && $page->header_banner_img != '' && $page->header_banner_img != null)
{
	$banner_img = App\Models\MediaImage::select('name')->where('id', $page->header_banner_img)->first();
	if(isset($banner_img) && $banner_img != '' && $banner_img != null)
	{
			$banner_url = asset('uploads/'.$banner_img->name);
	}else{
			$banner_url = null;
	}
}else{
	$banner_url = null;
}
@endphp


<section class="how-to-get-married-banner-sec common-text common-padding" style="@if(isset($banner_url) && $banner_url != null)
        background-image: url('{{ $banner_url }}');
        @endif">
     <div class="container-md">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 how-to-get-married-content">
                    <h4 class="petit-text">{{ isset($page->header_banner_title) ? $page->header_banner_title : '' }}</h4>
                    <h1>{{ isset($page->header_banner_subtitle) ? $page->header_banner_subtitle : '' }}</h1>
                </div>
                </div>
            </div>
 </section>
@endif
<div class="container">
	<div class="common-padding">
@if(isset($page->page_slider) && $page->page_slider != null &&  $page->page_slider != '' && $page->page_slider == '1')

<div class="row">
<div class = "col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
@endif
	
	{!! html_entity_decode($page->content) !!}



@if(isset($page->page_slider) && $page->page_slider != null &&  $page->page_slider != '' && $page->page_slider == '1')
</div>
<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
	@php
	$sidebar = App\Models\SidebarWidget::where('sidebar_id',1)->orderby('sequence')->get();
	@endphp
	@if(isset($sidebar) && count($sidebar) > 0)
	@foreach($sidebar as $key => $s_widget)
	@if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Image')
	@php
	$s_image = json_decode($s_widget->properties);
	if(isset($s_image) && $s_image != '' && $s_image != null)
	{
		$image_bg_img = isset($s_image->img_id) ? $s_image->img_id : null;
		if(isset($image_bg_img) && $image_bg_img != '' && $image_bg_img != '')
		{
			$img = App\Models\MediaImage::select('name')->where('id', $image_bg_img)->first();
			if(isset($img) && $img != '' && $img != null)
			{
				$bg_url = asset('uploads/'.$img->name);
			}else{
				$bg_url = null;
			}
		}else{
				$bg_url = null;
			}
	}
	@endphp
	<div class="mt-3 dynamic_sidebar_pages" style="padding: 10px !important;">
	<img src="{{ $bg_url }}" class="img-fluid" alt="">
	</div>
	@endif
	@if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Text Editor')
	@php
	$s_editor = json_decode($s_widget->properties);
	@endphp
	@if(isset($s_editor->content) && $s_editor->content != '' && $s_editor->content != null)
	<div class="mt-3 dynamic_sidebar_pages">
	{!! html_entity_decode($s_editor->content) !!}
	</div>
	@endif
	@endif
	@if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Recent Posts')
	@php
	$s_post = json_decode($s_widget->properties);
	@endphp
	@if(isset($s_post) && $s_post != '' && $s_post != null)
	@php
	$p_count = ($s_post->count ?? 5);
	$posts = App\Models\Article::take($p_count)->latest()->get();
	@endphp
	<div class="mt-3 dynamic_sidebar_pages">
		<h3>{{ isset($s_post->title) ? $s_post->title : '' }}</h3>
	<ul>
		@foreach($posts as $val)
		<li><a> {{ isset($val->title) ? $val->title : ''}}</a>
		</li>
		@endforeach
	</ul>
	</div>
	@endif
	@endif
	@if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'Category List')
	@php
	$s_category = json_decode($s_widget->properties);
	@endphp
	@if(isset($s_category) && $s_category != '' && $s_category != null)
	@php
	$c_count = ($s_category->count ?? 5);
	$cats = App\Models\Category::take($c_count)->latest()->get();
	@endphp
	<div class="mt-3 dynamic_sidebar_pages">
		<h3>{{ isset($s_category->title) ? $s_category->title : ''}}</h3>
	<ul>
		@foreach($cats as $val)
		<li><a> {{ isset($val->category) ? $val->category : '' }}</a>
		</li>
		@endforeach
	</ul>
	</div>
	@endif
	@endif
	@if(isset($s_widget->widget_name) && $s_widget->widget_name != null && $s_widget->widget_name == 'How To Get Married List')
	@php
	$s_married = json_decode($s_widget->properties);
	@endphp
	@if(isset($s_married) && $s_married != '' && $s_married != null)
	@php
	$m_count = ($s_married->count ?? 5);
	$married = App\Models\Married::take($m_count)->latest()->get();
	@endphp
	<div class="mt-3 dynamic_sidebar_pages">
		<h3>{{ isset($s_married->title) ? $s_married->title : ''}}</h3>
	<ul>
		@foreach($married as $val)
		<li><a> {{ isset($val->title) ? $val->title : '' }}</a>
		</li>
		@endforeach
	</ul>
	</div>
	@endif
	@endif
	@endforeach
	@endif
</div>
</div>

@endif
</div>
</div>
@endsection
