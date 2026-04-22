<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc>{{route('home')}}</loc>
        <lastmod>2024-02-24T09:52:56+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('about.us')}}</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{route('contact')}}</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @foreach($pages as $page)
        @if($page->slug != 'sitemap')
            <url>
                <loc>{{route('frontend.page.index',['slug' => $page->slug])}}</loc>
                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                <priority>0.80</priority>
            </url>

        @endif
    @endforeach
    <url>
        <loc>{{route('get.residential.products')}}</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

    @if(count($residential_menus) > 0)
        @foreach($residential_menus as $reskey => $resmenu)
            
            @if(count($resmenu) > 0)
                @foreach($resmenu as $fkey=>$fval)
                    <url>
                        <loc>{{route('residential.products', [$fval['slug']])}}</loc>
                        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                        <priority>0.80</priority>
                    </url>
                    @php
                    $dataproduct = App\Models\Apiproductdata::select('product_json')->where('menutype','residential')->where('category',$fval['slug'])->get()->toArray();
             
                    @endphp   
                    @foreach($dataproduct as $dkey=>$vls)
                        @php
                            $arp = json_decode($vls['product_json'],true);
                        @endphp

                        @if($arp)
                            @if(isset($arp['product_slug']))
                            <url>
                                <loc>{{route('residential.product_detail', [$fval['slug'],$arp['product_slug']])}}</loc>
                                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                                <priority>0.80</priority>
                            </url>
                            @endif
                        @endif
                        
                    @endforeach
                @endforeach
            @endif
            
        @endforeach
    @endif

    <url>
        <loc>{{route('get.commercial.products')}}</loc>
        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
        <priority>0.80</priority>
    </url>

    @if(count($commercial_menus) > 0)
        @foreach($commercial_menus as $reskey => $resmenu)
            
            @if(count($resmenu) > 0)
                @foreach($resmenu as $fkey=>$fval)
                    @php
                        $subcat = $fval['subcategories'];
                        $prdctcat = $fval['products'];
                    @endphp
                    
                    <url>
                        <loc>{{route('commercial.products', [$fval['slug']])}}</loc>
                        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                        <priority>0.80</priority>
                    </url>
                    @if(count($prdctcat) > 0)
                        @foreach($prdctcat as $ss=>$vls)
                            <url>
                                <loc>{{route('commercial.products', [$vls['product_slug']])}}</loc>
                                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                                <priority>0.80</priority>
                            </url>
                        @endforeach
                    @endif
                    @if(count($subcat) > 0)
                        @foreach($subcat as $s=>$vl)
                            <url>
                                <loc>{{route('commercial.products', [$vl['slug']])}}</loc>
                                <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                                <priority>0.80</priority>
                            </url>

                            @php
                            $dataproduct = App\Models\Apiproductdata::select('product_json')->where('menutype','commercial')->where('subcategory',$fval['slug'])->get()->toArray();
                     
                            @endphp   
                            @foreach($dataproduct as $dkey=>$vls)
                                @php
                                    $arp = json_decode($vls['product_json'],true);
                                @endphp

                                @if($arp)
                                    @if(isset($arp['product_slug']))
                                    <url>
                                        <loc>{{route('commercial.products', [$arp['product_slug']])}}</loc>
                                        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                                        <priority>0.80</priority>
                                    </url>
                                    @endif
                                @endif
                                
                            @endforeach

                        @endforeach
                    @endif
                @endforeach
            @endif
            
        @endforeach
    @endif

    <!-- @if(isset($openers['main']))
        @if(count($openers['main']) > 0)
        
            @foreach($openers['main'] as $reskey => $resmenu)
                
                    @php
                        $urls = strtolower($resmenu['parent']).'.products';
                    @endphp
                    
                    <url>
                        <loc>{{route($urls, [$resmenu['slug']])}}</loc>
                        <lastmod>2024-07-30T09:52:56+00:00</lastmod>
                        <priority>0.80</priority>
                    </url>

                    
            @endforeach
        
        @endif
    @endif -->
</urlset>
               