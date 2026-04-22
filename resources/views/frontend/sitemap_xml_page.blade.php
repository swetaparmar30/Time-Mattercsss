<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    
    @if(!in_array(route('home').'/', $exselectpages))
    <url>
        <loc>{{route('home')}}/</loc>
        <lastmod>2024-02-24T09:52:56+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    @endif
    @if(!in_array(route('about.us').'/', $exselectpages))
    <url>
        <loc>{{route('about.us')}}/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @endif
    @if(!in_array(route('contact').'/', $exselectpages))
    <url>
        <loc>{{route('contact')}}/</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @endif
    @php
        $excludedSlugs = ['sitemap'];
    @endphp

    @foreach($pages as $page)
        @if(!in_array($page->slug, $excludedSlugs) && !in_array(route('frontend.page.index',['slug' => $page->slug]).'/', $exselectpages))
            <url>
                <loc>{{ route('frontend.page.index', ['slug' => $page->slug]) }}/</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>
        @endif
    @endforeach


    @foreach ($locations as $loc)
        @if (!empty($loc->slug))
            @if(!in_array(url('locations/' . $loc->slug).'/', $exselectpages))
            <url>
                <loc>{{ url('locations/' . $loc->slug) }}/</loc>
                <lastmod>{{ $loc->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                <priority>0.80</priority>
            </url>
            @endif
        @endif
    @endforeach
    

    {{-- Time Services --}}
    @foreach($timeservices ?? [] as $service)
        @if(!empty($service->slug))
            <url>
                <loc>{{ url('time-services/' . $service->slug) }}</loc>
                <lastmod>{{ now()->format('Y-m-d') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>
        @endif
    @endforeach
  
   
</urlset>
               