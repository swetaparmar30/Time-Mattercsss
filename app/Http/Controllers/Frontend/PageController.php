<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SectionsLayout;
use App\Models\PageSection;
use App\Models\Widget;
use App\Models\Faq;
use App\Models\ClientLogo;
use App\Models\SectionWidget;
use App\Models\ProjectGallery;
use App\Models\GalleryCategory;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\HomePageSetting;
use App\Models\SidebarWidget;


class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('publish_status','=','Published')->where('slug', $slug)->first();
        if ($slug == 'adminer') {
            return redirect('/adminer');
            
        }else if(!$page || $page == null || $page == '')
        {
            // return view('errors.404');
        }        
        if(isset($page->make_with_builder) && $page->make_with_builder != '' && $page->make_with_builder == '0' && $page->make_with_builder != '1')
        {
            if(isset($page->page_template) && $page->page_template != null && $page->page_template == '1')
            {
                $categories = Category::select('*')->where('type','Gallery')->where('status','1')->whereHas('projectGalleries')->get();
                $photos = ProjectGallery::where('is_publish',1)->where('is_featured',0)->orWhereNull('is_featured')->get(); 
                $photosWithoutCategory = ProjectGallery::where('is_publish', 1)->where('is_featured',0)->orWhereNull('is_featured')
                ->where(function ($query) {
                    $query->whereNull('category_id')->orWhere('category_id', 0);
                })->latest()->get();
                return view('frontend.new_project_gallery',compact('photos','categories','page','photosWithoutCategory'));
            }else if(isset($page->page_template) && $page->page_template != null && $page->page_template == '2')
            {
                $testi_list = Testimonial::select('testimonials.*')->where('is_featured',1)->paginate(10);
                return view('frontend.testimonial', compact('testi_list','page'));
            }else if(isset($page->page_template) && $page->page_template != null && $page->page_template == '3'){
                $blog_widgets = SidebarWidget::where('sidebar_id',2)->orderby('sequence')->get();
                $blogs = Article::where('status',1)->latest()->paginate(10);
                return view('frontend.blogs',compact('blogs','blog_widgets','page'));
            }else if(isset($page->page_template) && $page->page_template != null && $page->page_template == '4')
            {
                $home = HomePageSetting::first();
                $faq = json_decode($home->faq_sec);
                $faqs = Faq::select('*')->get();
                $client_logo = ClientLogo::select('*')->where('status','1')->where('deleted_at', null)->latest()->get();
                return view('frontend.faqs', compact('faqs','page', 'client_logo','faq'));
            }
            else{
                return view('frontend.custom_page',compact('page'));
            }
            
        }else{
            if($page){
                $sections = PageSection::where('page_id',$page->id)->orderby('sequence')->get();
                return view('frontend.custom_page_builder',compact('page','sections'));
            }else{
                return view('errors.404');
            }   
                
        }
    }
}
