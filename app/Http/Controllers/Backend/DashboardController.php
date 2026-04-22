<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\ProjectGallery;
use App\Models\Page;
use App\Models\Visitor;
use App\Models\Testimonial;
use App\Models\ProductService;
use App\Models\GetInTouch;
use App\Models\Collection;
use Illuminate\Support\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $post = Article::get()->count();
        $cat = Category::get()->count();
        $page = Page::get()->count();
        $product = ProductService::get()->count();
        $collection = Collection::where('deleted_at', null)->get()->count();
        $gallery = ProjectGallery::where('deleted_at', null)->get()->count();
        $inquiry = GetInTouch::where('deleted_at', null)->get()->count();
        $recent_post = Article::where('status', '1')->latest()->take(5)->get();
        $testi = Testimonial::where('is_featured', '1')->latest()->take(5)->get();
        return view('dashboard.dashboard', compact('post','cat','page','product','recent_post','testi','collection','inquiry', 'gallery'));
    }
    public function get_chart(Request $request)
    {
        $endDate = Carbon::now();
        $labels = [];
        $visitorData = [];

        if(isset($request->type) && $request->type == 'monthly')
        {
            $startDate = $endDate->copy()->subMonths(11);

            for ($date = $startDate; $date->lte($endDate); $date->addMonth()) {
                $labels[] = $date->format('M Y'); 
            }
            foreach ($labels as $formattedMonth) {
                $carbonDate = Carbon::createFromFormat('M Y', $formattedMonth);
                $visitors = Visitor::whereYear('created_at', $carbonDate->year)
                    ->whereMonth('created_at', $carbonDate->month)
                    ->get()->count();
                $visitorData[] = $visitors;
            }
        }
        if(isset($request->type) && $request->type == 'daily')
        {
            $startDate = $endDate->copy()->subDays(29);

            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                $formattedDates[] = $date->format('d M Y'); 
            }
            foreach ($formattedDates as $formattedDate) {
                $carbonDate = Carbon::createFromFormat('d M Y', $formattedDate);
                $visitors = Visitor::whereDate('created_at', $carbonDate->toDateString())->get()->count();
                $visitorData[] = $visitors;
            }
            $labels = array_map(function ($date) {
                return Carbon::createFromFormat('d M Y', $date)->format('d M');
            }, $formattedDates);

        }
        return response()->json(['labels' => $labels, 'data' => $visitorData]);
    }
}
