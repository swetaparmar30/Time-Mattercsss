@extends('frontend.layouts.index')
@if(isset($article->title) && $article->title != '')
@section('title') {{$article->title}} @endsection
@endif
@if(isset($article->meta_keyword) && $article->meta_keyword != '')
@section('meta-keywords') {{$article->meta_keyword}} @endsection
@endif
@if(isset($article->meta_description) && $article->meta_description != '')
@section('meta-description') {{$article->meta_description}} @endsection
@endif
@if(isset($article->page_index) && $article->page_index != '' && $article->page_index == 'on')
@section('robots') index @endsection
@else
@section('robots') noindex @endsection
@endif
@if(isset($article->canonical_url) && $article->canonical_url != '' && $article->canonical_url != null)
@section('canonical') {{$article->canonical_url}} @endsection
@endif
@section('content')

<section class="single-blog-page-banner sandk-common sandk-common-padding blog-page">
    <div class="container-md">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            </div>
        </div>
    </div>
</section>

<section class="blog-content-sec single-blog-content sandk-common sandk-common-padding">
    <div class="container-md single-blog-container">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 single-blog-box-sec-col left-side">
                <div class="single-blog-box-sec">
                    @if(isset($article->image) && $article->image != null)
                        @php
                        $img = App\Models\MediaImage::select('name')->where('id', $article->image)->first();
                        @endphp
                        <img src="{{ asset('uploads/'.$img->name) }}" class="img-fluid" alt="{{$article->title}}" decoding="async" fetchpriority="high">
                    @else
                        <img src="{{ asset('assets/src/images/blog-01.webp') }}" class="img-fluid" alt="{{$article->title}}" decoding="async" fetchpriority="high">
                    @endif

                    <h4>{{$article->title}}</h4>

                    {!! html_entity_decode($article->content) !!}
                
                    @if($article->tag_id)
                    <div class="tags_data">
                        <span>{!! $article->tags_data($article->tag_id) !!}</span>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 single-right-sec-col right-side">
                @php
                    $p_count = 10;
                    $posts = App\Models\Article::where('status', 1)->take($p_count)->latest()->get();
                @endphp  
                
                @if($posts->count() > 0)
                    <div class="new-inner-featured-articles-sec">
                        <h3>Recent Articles</h3>
                        @foreach($posts as $val) 
                          
                            @php
                                if(isset($val->published_at)){
                                    $time = strtotime($val->published_at);
                                    $newformat = date('F j\, Y',$time);
                                }else{
                                    $time = strtotime($val->created_at);
                                    $newformat = date('F j\, Y',$time);
                                }
                            @endphp

                            <h4><a href="">{{$val->title}}</a></h4>
                            <h5>{{$newformat}}</h5>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection
@section('script')
<script>
    
</script>
@endsection