<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitemap;
use Spatie\Sitemap\Sitemap as SpatieSitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;
use App\Models\Page;
use ReflectionClass;
use App\Models\Apiproductdata;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Apicategorydata;
use App\Models\Apisubcategorydata;


class SitemapController extends Controller
{
    // public function index()
    // {
    //     // 1️⃣ Pages Sitemap
    //     $pagesSitemap = SpatieSitemap::create();
    //     $pagesSitemapUrls = []; // plain array for Blade

    //     $staticRoutes = [
    //         'home',
    //         'about.us',
    //         'contact',
    //         'privacypolicy',
    //         'serviceAndRepair',
    //         'serviceareas',
    //     ];

    //     foreach ($staticRoutes as $routeName) {
    //         if (Route::has($routeName)) {
    //             $url = route($routeName) . '/';
    //             $pagesSitemap->add(Url::create($url));
    //             $pagesSitemapUrls[] = $url;
    //         }
    //     }

    //     $excludedSlugs = [
    //         'sitemap',
    //         'newport-garage-doors',
    //         'dover-garage-doors',
    //         'georgetown-garage-doors',
    //         'salisbury-garage-doors'
    //     ];

    //     $pages = Page::where('publish_status', 'Published')->get();

    //     foreach ($pages as $page) {
    //         if (!in_array($page->slug, $excludedSlugs)) {
    //             $url = route('frontend.page.index', $page->slug) . '/';
    //             $pagesSitemap->add(Url::create($url));
    //             $pagesSitemapUrls[] = $url;
    //         }
    //     }

    //     // Get all routes
    //     $routes = Route::getRoutes();

    //     foreach ($routes as $route) {

    //         $routeName = $route->getName();

    //         // Include only garage door pages
    //         if ($routeName && str_contains($routeName, '.garagedoor')) {

    //             $url = route($routeName) . '/';

    //             $pagesSitemap->add(Url::create($url));
    //             $pagesSitemapUrls[] = $url;
    //         }
    //     }

    //     // 2️⃣ Blog Sitemap (example)
    //     // $blogPosts = Article::where('status', 1)->get();
    //     // $blogSitemapUrls = [];

    //     // foreach ($blogPosts as $post) {
    //     //     $url = url('blog/' . $post->slug);
    //     //     $blogSitemapUrls[] = $url;
    //     // }

    //     $blogPosts = Article::where('status', 1)->get();
    //     $blogSitemapUrls = [];

    //     foreach ($blogPosts as $post) {
    //         $blogSitemapUrls[] = [
    //             'title' => $post->title,  // real title from DB
    //             'url'   => url('blog/' . $post->slug),
 

    public function index()
{
    // 1️⃣ Pages Sitemap - Manual collection (no Spatie)
    $pagesSitemapUrls = []; // plain array for Blade

    $staticRoutes = [
        'home',
        'about.us',
        'contact',
        'privacypolicy',
        'serviceAndRepair',
        'serviceareas',
    ];

    foreach ($staticRoutes as $routeName) {
        if (Route::has($routeName)) {
            $url = route($routeName) . '/';
            $pagesSitemapUrls[] = $url;
        }
    }

    $excludedSlugs = [
        'sitemap',
        'newport-garage-doors',
        'dover-garage-doors',
        'georgetown-garage-doors',
        'salisbury-garage-doors'
    ];

    $pages = Page::where('publish_status', 'Published')->get();

    foreach ($pages as $page) {
        if (!in_array($page->slug, $excludedSlugs)) {
            $url = route('frontend.page.index', $page->slug) . '/';
            $pagesSitemapUrls[] = $url;
        }
    }

    // Get all routes - Include only garage door pages
    $routes = Route::getRoutes();

    foreach ($routes as $route) {
        $routeName = $route->getName();

        if ($routeName && str_contains($routeName, '.garagedoor')) {
            $url = route($routeName) . '/';
            $pagesSitemapUrls[] = $url;
        }
    }

    // 2️⃣ Blog Sitemap
    $blogPosts = Article::where('status', 1)->get();
    $blogSitemapUrls = [];

    foreach ($blogPosts as $post) {
        $blogSitemapUrls[] = [
            'title' => $post->title,
            'url'   => url('blog/' . $post->slug),
        ];
    }

    // Other data for Blade (unchanged)
    $listsitemaps = Sitemap::all() ?? collect();
    $sitemappages = Page::where('publish_status', 'Published')->get() ?? collect();
    $sitemapTags   = Article::where('status', 1)->get() ?? collect();

    // ✅ Return all arrays to Blade (same as before)
    return view('sitemap-setting.index', [
        'pagesSitemap' => $pagesSitemapUrls,   // now plain array of URLs
        'blogSitemap'  => $blogSitemapUrls,
        
        'listsitemaps' => $listsitemaps,
        'sitemappages' => $sitemappages,
        'sitemapTags'  => $sitemapTags
    ]);
}   

    public function edit(Request $request)
    {
     
        $sitemapupdate = Sitemap::where('type', $request->type)->first();
        return response()->json($sitemapupdate);
    }


  
    public function storeupdate(Request $request){
          
            // $type="Html Sitemap";
            $sitemapupdate=Sitemap::where('type',$request->type)->first();

            if($sitemapupdate->type=='htmlsitemaps'){
                $sitemapupdate->update([
                    'html_sitemap' => isset($request->sitemap_html) && $request->sitemap_html === 'on' ? 1 : null,
                    'html_short_by'=>isset($request->sort_by) ? $request->sort_by : null,
                    'html_show_date' => isset($request->show_date) && $request->show_date === 'on' ? 1 : null,

                ]);
            }elseif($sitemapupdate->type=='pages'){
                $sitemapupdate->update([
                    'p_include_sitemap' => isset($request->in_sitemap) && $request->in_sitemap === 'on' ? 1 : null,
                    'p_include_html_sitemap' => isset($request->in_html_sitemap) && $request->in_html_sitemap === 'on' ? 1 : null,
                    'select_page' => isset($request->pages) ? json_encode($request->pages) : null,
                    'r_select_page' => isset($request->residential) ? json_encode($request->residential) : null,
                    'c_select_page' => isset($request->commercials) ? json_encode($request->commercials) : null,
                 ]);


            }elseif($sitemapupdate->type=='posts'){
                $sitemapupdate->update([
                    'post_include_sitemap' => isset($request->post_include_sitemap) && $request->post_include_sitemap === 'on' ? 1 : null,
                    'post_include_h_sitemap' => isset($request->post_include_h_sitemap) && $request->post_include_h_sitemap === 'on' ? 1 : null,
                    'post_exclude'=>isset($request->post_exclude) ? $request->post_exclude : null,
                    'select_posts' => isset($request->post) ? json_encode($request->post) : null,


                 ]);
            }elseif($sitemapupdate->type=='categories'){
                $sitemapupdate->update([
                    'c_include_sitemap' => isset($request->c_include_sitemap) && $request->c_include_sitemap === 'on' ? 1 : null,
                    'c_include_html_sitemap' => isset($request->c_include_html_sitemap) && $request->c_include_html_sitemap === 'on' ? 1 : null,
                    'c_include_empty_terms'=>isset($request->c_include_empty_terms) && $request->c_include_empty_terms  === 'on' ? 1 : null,
                 ]);
            }


            return redirect()->back()->with('success','Update site html sucessfully');
    }


    public function reset(Request $request)
    {
        $sitemap = Sitemap::where('type', $request->type)->first();

        // dd($sitemap);
        if ($sitemap) {
            if ($request->type === 'htmlsitemaps') {
                $sitemap->update([
                    'html_sitemap' => null,
                    'html_short_by' => null,
                    'html_show_date' => null,
                ]);
            } elseif ($request->type === 'pages') {
                $sitemap->update([
                    'p_include_sitemap' => null,
                    'p_include_html_sitemap' => null,
                    'select_page'=>null,
                    'r_select_page'=>null,
                    'c_select_page'=>null,
                ]);
            }elseif ($request->type === 'posts') {
                $sitemap->update([
                    'post_include_sitemap' => null,
                    'post_include_h_sitemap' => null,
                    'post_exclude' => null,
                    'select_posts'=>null,
                ]);
            }elseif ($request->type === 'categories') {
                $sitemap->update([
                    'c_include_sitemap' => null,
                    'c_include_html_sitemap' => null,
                    'c_include_empty_terms' => null,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Options reset successfully.');
    }

}
