<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
   
    @foreach($pages as $page)
        @if($page->slug != 'sitemap')
            @if(isset($page->id) && $page->id == 1)

                @if(isset($posts) && count($posts) > 0)
                    @foreach($posts as $post)
                        @php
                            $purl = route('front.single_blog_detail',['slug' => $post->slug]);
                        @endphp
                        @if(!in_array($purl, $exselectposts))
                        <url>
                            <loc>{{ $purl }}/</loc>
                            <lastmod>{{ date('c', strtotime($post->updated_at)) }}</lastmod>
                            <priority>0.80</priority>
                        </url>
                        @endif
                    @endforeach
                @endif
                
            @endif

        @endif
    @endforeach
   
</urlset>
               