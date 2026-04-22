<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MeetingMail;
use App\Models\Setting;
use App\Models\HomePageSetting;
use App\Models\ServiceAreas;
use App\Models\LocationPageSetting;
use App\Models\ProductService;
use App\Models\Testimonial;
use App\Models\TimeService;
use App\Models\Slider;
use App\Models\Married;
use App\Models\Article;
use App\Models\GalleryCategory;
use App\Models\SidebarWidget;
use App\Models\GarageDoor;
use App\Models\Garageservice;
use App\Models\CommentSetting;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use App\Models\Page;
use App\Models\Faq;
use App\Models\CollectionsImage;
use App\Models\Collection;
use App\Models\ClientLogo;
use App\Models\Apisetting;

use App\Models\Location;
use App\Models\ProjectGallery;
use App\Models\Loadingdockdoor;
use App\Models\Hollowmetaldoors;
use App\Models\Sitemap;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Tags\Url;
use App\Models\About;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meta_title = "Home - TimeMatters Inc.";
        $meta_description = "Time Matters inc. is a unique consultant offering independent and impartial strategies to support your human capital investment.";
        $meta_keywords = "";

        $home = HomePageSetting::first();
        $system_setting = json_decode($home->system_setting_sec);
        $value_highlight = json_decode($home->value_highlight_sec);
        $why_choose = json_decode($home->why_choose_sec);
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        $form = json_decode($home->form_sec);
        return view('frontend.home', compact('home', 'testimonial', 'testimonials', 'system_setting', 'value_highlight', 'why_choose', 'form', 'meta_title', 'meta_description', 'meta_keywords'));
    }
    public function about()
    {

        $meta_title = "About Us - TimeMatters Inc.";
        $meta_description = "Time Matters inc. is a unique consultant offering independent and impartial strategies to support your human capital investment.";
        $meta_keywords = "";

        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        $system_setting = json_decode($home->system_setting_sec);
        $value_highlight = json_decode($home->value_highlight_sec);
        $why_choose = json_decode($home->why_choose_sec);
        $form = json_decode($home->form_sec);
        $about = About::first();
        $mission_values = json_decode($about->mission_values);
        return view('frontend.about', compact('home', 'testimonial', 'testimonials', 'form', 'system_setting', 'value_highlight', 'why_choose', 'about', 'mission_values', 'meta_title', 'meta_description', 'meta_keywords'));

    }
    public function service()
    {
        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        return view('frontend.service', compact('home', 'testimonial', 'testimonials'));

    }
    public function memberAccess()
    {
        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        return view('frontend.memberAccess', compact('home', 'testimonial', 'testimonials'));

    }
    public function resources()
    {
        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        return view('frontend.resources', compact('home', 'testimonial', 'testimonials'));

    }

    public function contact()
    {
        $meta_title = "Contact Us - TimeMatters Inc.";
        $meta_description = "Time Matters inc. is a unique consultant offering independent and impartial strategies to support your human capital investment.";
        $meta_keywords = "";

        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
        $setting = Setting::first();
        $why_choose = json_decode($home->why_choose_sec);
        $form = json_decode($home->form_sec);
        return view('frontend.contact', compact('home', 'testimonial', 'testimonials', 'setting', 'why_choose', 'form', 'meta_title', 'meta_description', 'meta_keywords'));

    }

    // public function vendorManagement(){
    //     $home = HomePageSetting::first();
    //     $testimonial = json_decode($home->testimonial);
    //     $testimonials = Testimonial::where('is_featured', 1)->take(20)->inRandomOrder()->get();
    //     return view('frontend.service.vendor-management-solutions',compact('home','testimonial','testimonials'));

    // }

    public function serviceDetail($slug)
    {
        $service = TimeService::where('slug', $slug)->where('publish_status', 'Published')->where('status', 1)->firstOrFail();

        $home = HomePageSetting::first();
        $testimonial = json_decode($home->testimonial);
        $testimonials = Testimonial::where('is_featured', 1)->inRandomOrder()->take(20)->get();
        $why_choose = json_decode($home->why_choose_sec);
        $form = json_decode($home->form_sec);
        return view('frontend.service.vendor-management-solutions', compact('service', 'home', 'testimonial', 'testimonials', 'why_choose', 'form'));
    }

    public function post_sitemap_xml()
    {
        $stposts_o = Sitemap::where('type', 'posts')->where('post_include_sitemap', 1)->first();
        if (!$stposts_o) {
            return redirect()->route('home');
        }

        $pages = Page::where('publish_status', '=', 'Published')->get();

        //$posts = Article::where('status', 1)->latest()->get();

        if ($stposts_o) {
            // $stposts = Sitemap::where('type', 'posts')->where('post_include_h_sitemap', 1)->pluck('select_posts')->toArray();
            $stposts = $stposts_o->select_posts;
            $exselectposts = json_decode($stposts, true) ?: [];
            $posts = Article::where('status', 1)->latest()->get();
        } else {
            $posts = collect();
        }

        return response()->view('frontend.sitemap_xml_post', compact('exselectposts', 'pages', 'posts'))->header('Content-Type', 'application/xml');
    }

    public function sitemap()
    {
        $stposts = Sitemap::where('type', 'htmlsitemaps')->where('html_sitemap', 1)->first();
        if (!$stposts) {
            return redirect()->route('home');
        }

        $exselectpages = [];
        $rexselectpages = [];
        $cexselectpages = [];

        $meta_title = "";
        $meta_description = "";

        $stpage_o = Sitemap::where('type', 'pages')->where('p_include_sitemap', 1)->first();
        if ($stpage_o) {
            // $stposts = Sitemap::where('type', 'posts')->where('post_include_h_sitemap', 1)->pluck('select_posts')->toArray();
            $stpages = $stpage_o->select_page;
            $exselectpages = json_decode($stpages, true) ?: [];

            $rstpages = $stpage_o->r_select_page;
            $rexselectpages = json_decode($rstpages, true) ?: [];

            $cstpages = $stpage_o->c_select_page;
            $cexselectpages = json_decode($cstpages, true) ?: [];


            $meta_title = $stpage_o->meta_title ?? '';
            $meta_keyword = $stpage_o->meta_keyword ?? '';
            $meta_description = $stpage_o->meta_description ?? '';

            $pages = Page::where('publish_status', '=', 'Published')->get();
            $locations = LocationPageSetting::where('status', 1)->where('type', 'location')->get();
            $serviceAreas = LocationPageSetting::where('status', 1)->where('type', 'service-area')->orderBy('slug', 'asc')->get();
            $serviceRepair = LocationPageSetting::where('status', 1)->where('type', 'servicerepair')->orderBy('slug', 'asc')->get();
        } else {
            $pages = collect();
            $locations = collect();
            $serviceAreas = collect();
            $serviceRepair = collect();

        }


        $stposts_o = Sitemap::where('type', 'posts')->where('post_include_h_sitemap', 1)->first();
        if ($stposts_o) {
            // $stposts = Sitemap::where('type', 'posts')->where('post_include_h_sitemap', 1)->pluck('select_posts')->toArray();
            $stposts = $stposts_o->select_posts;
            $exselectposts = json_decode($stposts, true) ?: [];
            $posts = Article::where('status', 1)->latest()->get();
        } else {
            $posts = collect();
        }

        $timeservices = TimeService::where('status', 1)->orderBy('slug', 'asc')->get();

        return response()->view('frontend.sitemap', compact('timeservices','cexselectpages', 'rexselectpages', 'exselectpages', 'exselectposts', 'pages', 'posts', 'meta_title', 'meta_description', 'locations', 'serviceAreas', 'serviceRepair'));
    }


    public function page_sitemap_xml()
    {
        $exselectpages = [];
        $rexselectpages = [];
        $cexselectpages = [];

        $stpage_o = Sitemap::where('type', 'pages')->where('p_include_sitemap', 1)->first();
        if ($stpage_o) {
            // $stposts = Sitemap::where('type', 'posts')->where('post_include_h_sitemap', 1)->pluck('select_posts')->toArray();
            $stpages = $stpage_o->select_page;
            $exselectpages = json_decode($stpages, true) ?: [];
            $pages = Page::where('publish_status', '=', 'Published')->get();
            $locations = LocationPageSetting::where('status', 1)->where('type', 'location')->get();

            $rstpages = $stpage_o->r_select_page;
            $rexselectpages = json_decode($rstpages, true) ?: [];

            $cstpages = $stpage_o->c_select_page;
            $cexselectpages = json_decode($cstpages, true) ?: [];

            $serviceAreas = LocationPageSetting::where('status', 1)->where('type', 'service-area')->orderBy('slug', 'asc')->get();
            $serviceRepair = LocationPageSetting::where('status', 1)->where('type', 'servicerepair')->orderBy('slug', 'asc')->get();
        } else {
            return redirect()->route('home');
        }

        $pages = Page::where('publish_status', '=', 'Published')->get();

        $posts = Article::where('status', 1)->latest()->get();
        $locations = LocationPageSetting::where('status', 1)->where('type', 'location')->get();
        $serviceAreas = LocationPageSetting::where('status', 1)->where('type', 'service-area')->orderBy('slug', 'asc')->get();
        $timeservices = TimeService::where('status', 1)->orderBy('slug', 'asc')->get();

        return response()->view('frontend.sitemap_xml_page', compact('timeservices','serviceRepair', 'rexselectpages', 'cexselectpages', 'exselectpages', 'pages', 'posts', 'locations', 'serviceAreas'))->header('Content-Type', 'application/xml');
    }
       public function sitemap_xml()
    {

        $pages = Page::where('publish_status', '=', 'Published')->get();

        $posts = Article::where('status', 1)->latest()->get();
       

        return response()->view('frontend.sitemap_xml', compact('pages', 'posts'))->header('Content-Type', 'application/xml');
    }
    
    public function storeUser(Request $request){
        dd('sdfciuhbsdcf');
    }
}
