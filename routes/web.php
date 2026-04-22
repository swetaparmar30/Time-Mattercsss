<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Backend\PayrollController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\InquiryFormController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\ProductsServicesController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\WidgetController;
use App\Http\Controllers\Backend\MarriedController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\GarageserviceController;
use App\Http\Controllers\Backend\GarageDoorController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\ClientLogoController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\SidebarController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\LoadingDockdoorController;
use App\Http\Controllers\Backend\HollowMetalDoorsController;
use App\Http\Controllers\Backend\ServiceAreaController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\Backend\SitemapController;
use App\Http\Controllers\Frontend\Auth\RegisterController as FrontendRegisterController;
use App\Http\Controllers\Frontend\Auth\LoginController as FrontendLoginController;
use App\Http\Controllers\Backend\RoleCategoryController;



/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider and all of them will

| be assigned to the "web" middleware group. Make something great!

|

*/
Route::get('/clear-route-cache', function () {
    \Artisan::call('route:clear');
    return 'Route cache cleared!';
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('track.visitors');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about.us');
// Route::get('/service', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/member-access', [App\Http\Controllers\HomeController::class, 'memberAccess'])->name('memberaccess');
Route::get('/resources', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us-store', [InquiryFormController::class, 'getInTouchStore'])->name('get-in-touch.store');

// Route::get('/vendor-management-solution', [App\Http\Controllers\HomeController::class, 'vendorManagement'])->name('vendor.management');
Route::get('/service/{slug}', [App\Http\Controllers\HomeController::class, 'serviceDetail'])
    ->name('service.detail');



Route::get('/sitemap', [App\Http\Controllers\HomeController::class, 'sitemap'])->name('front.sitemap');
Route::get('/sitemap_n', [App\Http\Controllers\HomeController::class, 'sitemap_n']);
Route::get('/sitemap.xml', [App\Http\Controllers\HomeController::class, 'sitemap_xml'])->name('front.xml');
Route::get('/post-sitemap.xml', [App\Http\Controllers\HomeController::class, 'post_sitemap_xml'])->name('postfront.xml');
Route::get('/page-sitemap.xml', [App\Http\Controllers\HomeController::class, 'page_sitemap_xml'])->name('pagefront.xml');
// Backend Routes


// Authentication Routes
Route::get('/register', [FrontendRegisterController::class, 'index'])->name('frontend.register');
Route::post('/user-register', [FrontendRegisterController::class, 'store'])->name('frontend.register.store');

// Login Routes
Route::get('/login', [FrontendLoginController::class, 'index'])->name('frontend.login');
Route::post('/login', [FrontendLoginController::class,  'login'])->name('frontend.login.store')->middleware('authorize.frontend.login');
Route::post('/logout', [FrontendLoginController::class,  'logout'])->name('frontend.logout')->middleware('auth');



// ====================== PROTECTED DASHBOARD ROUTES ======================
Route::middleware('auth')->group(function () {

    // Independent Contractor Dashboard
    Route::get('/independent-contractor/dashboard', function () {
    return view('frontend.independent-contractor.dashboard');
    })->name('frontend.independent-contractor.dashboard')
      ->middleware('role:Independent Contractor');   // Only allow this role

    // Temporary Employee Dashboard
    Route::get('/temporary-employee/dashboard', function () {
        return view('frontend.temporary-employee.dashboard');
    })->name('frontend.temporary-employee.dashboard')
      ->middleware('role:Temporary Employee');      // Only allow this role
    // Vendor Dashboard
    Route::get('/vendor/dashboard', function () {
        return view('frontend.vendor.dashboard');
    })->name('frontend.vendor.dashboard')
      ->middleware('role:Vendor');                  // Only allow this role

      
    // Smart Default Dashboard (Auto Redirect based on role)
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->role === 'Independent Contractor') {
            return redirect()->route('frontend.independent-contractor.dashboard');
        } elseif ($user->role === 'Temporary Employee') {
            return redirect()->route('frontend.temporary-employee.dashboard');
        }
        elseif ($user->role === 'Vendor') {
            return redirect()->route('frontend.vendor.dashboard');
        }

        // Fallback if role doesn't match
        return redirect()->route('dashboard')->with('error', 'Access denied.');
    })->name('dashboard');

});


// Route::get('/independent-contractor/dashboard', function () {
//     return view('frontend.independent-contractor.dashboard');
// })->name('frontend.independent-contractor.dashboard');


// Route::get('/temporary-employee/dashboard', function () {
//     return view('frontend.temporary-employee.dashboard');
// })->name('frontend.temporary-employee.dashboard');


Route::prefix('admin')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('custom-login', [LoginController::class, 'customLogin'])->name('custom.login')->middleware('authorize.login');
    Route::get('reset-password-link', [LoginController::class, 'send_link_reset_view'])->name('reset.pass.link.view');
    Route::post('reset-password-link-send', [LoginController::class, 'send_link_reset'])->name('reset.pass.link');
    Route::get('reset-password-store-view/{token}', [LoginController::class, 'reset_pass_store_view'])->name('reset.pass.store.view');
    Route::post('update-password', [LoginController::class, 'update_password'])->name('update.password');
    // Route::post('logout', [LoginController::class, 'userLogout'])->name('logout')->middleware('auth');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

    //dashboard

    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::post('/get-chart-data', [App\Http\Controllers\Backend\DashboardController::class, 'get_chart'])->name('get_chart_data')->middleware('auth');

    //categories

    Route::get('/categories', [App\Http\Controllers\Backend\CategoriesController::class, 'index'])->name('categories')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('category/save', [App\Http\Controllers\Backend\CategoriesController::class, 'save'])->name('categories.save')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('category/delete/{id}', [App\Http\Controllers\Backend\CategoriesController::class, 'delete'])->name('category.delete')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('category/edit', [App\Http\Controllers\Backend\CategoriesController::class, 'edit'])->name('category.edit')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('category/list', [App\Http\Controllers\Backend\CategoriesController::class, 'list'])->name('category.list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/featured-category', [App\Http\Controllers\Backend\CategoriesController::class, 'check_featured'])->name('category.check_featured')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/slug', [App\Http\Controllers\Backend\CategoriesController::class, 'check_slug'])->name('category.check_slug')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/categories-test', [App\Http\Controllers\Backend\CategoriesController::class, 'test_index'])->name('categories_test')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('category/list-test', [App\Http\Controllers\Backend\CategoriesController::class, 'test_list'])->name('category_test.list')->middleware(['auth', 'role:administrator,marketing,dealer']);

    //user

    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware(['auth', 'role:administrator']);
    Route::post('users/add', [UserController::class, 'save'])->name('users.add')->middleware(['auth', 'role:administrator']);
    Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware(['auth', 'role:administrator']);
    Route::post('users/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/password_generate', [UserController::class, 'generate'])->name('password_generate')->middleware(['auth', 'role:administrator']);
    Route::post('user/list', [UserController::class, 'list'])->name('user.list')->middleware(['auth', 'role:administrator']);

    //sections

    Route::get('/sections', [App\Http\Controllers\Backend\SectionsController::class, 'index'])->name('sections')->middleware(['auth', 'role:administrator']);
    Route::post('sections/save', [App\Http\Controllers\Backend\SectionsController::class, 'save'])->name('sections.save')->middleware(['auth', 'role:administrator']);
    Route::get('sections/delete/{id}', [App\Http\Controllers\Backend\SectionsController::class, 'delete'])->name('sections.delete')->middleware(['auth', 'role:administrator']);
    Route::post('sections/edit', [App\Http\Controllers\Backend\SectionsController::class, 'edit'])->name('sections.edit')->middleware(['auth', 'role:administrator']);
    Route::post('sections/list', [App\Http\Controllers\Backend\SectionsController::class, 'list'])->name('sections.list')->middleware(['auth', 'role:administrator']);

    // Articles

    Route::get('/posts', [ArticleController::class, 'index'])->name('articles.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/add-post', [ArticleController::class, 'add'])->name('articles.add')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/list-article', [ArticleController::class, 'list'])->name('articles.list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/store-article', [ArticleController::class, 'store'])->name('articles.store')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/get-categories', [ArticleController::class, 'get_categories'])->name('articles.get-categories')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/edit-post/{id}', [ArticleController::class, 'edit'])->name('articles.edit')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/update-article/{id}', [ArticleController::class, 'update'])->name('articles.update')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('articles/delete/{id}', [ArticleController::class, 'delete'])->name('articles.delete')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('articles/view/{id}', [ArticleController::class, 'view'])->name('articles.view')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/featured', [ArticleController::class, 'check_featured'])->name('articles.check_featured')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/article-slug', [ArticleController::class, 'check_slug'])->name('articles.check_article_slug')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/create-category', [ArticleController::class, 'create_category'])->name('articles.create-category')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/create-tag', [ArticleController::class, 'create_tag'])->name('articles.create-tag')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/status', [ArticleController::class, 'check_status'])->name('articles.check_status')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/comments', [ArticleController::class, 'comments_index'])->name('articles.comments_index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/comments-list', [ArticleController::class, 'comments_list'])->name('articles.comments_list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/comments-status-change', [ArticleController::class, 'comments_status_change'])->name('articles.comments_status_change')->middleware(['auth', 'role:administrator,marketing,dealer']);

    // Settings 

    Route::get('/general-setting', [SettingController::class, 'index'])->name('setting.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('setting/update', [SettingController::class, 'save'])->name('setting.add')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/email-setting', [SettingController::class, 'email_setting'])->name('setting.email.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('email-setting/update', [SettingController::class, 'email_setting_save'])->name('email.setting.add')->middleware(['auth', 'role:administrator,marketing,dealer']);

    // About

    Route::get('/about-setting', [AboutController::class, 'index'])->name('about.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('about/update', [AboutController::class, 'save'])->name('about.add')->middleware(['auth', 'role:administrator,marketing,dealer']);

    //tags

    Route::get('/tags', [App\Http\Controllers\Backend\TagsController::class, 'index'])->name('tags')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('tags/save', [App\Http\Controllers\Backend\TagsController::class, 'save'])->name('tags.save')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('tags/delete/{id}', [App\Http\Controllers\Backend\TagsController::class, 'delete'])->name('tags.delete')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('tags/edit', [App\Http\Controllers\Backend\TagsController::class, 'edit'])->name('tags.edit')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('tags/list', [App\Http\Controllers\Backend\TagsController::class, 'list'])->name('tags.list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/featured-tags', [App\Http\Controllers\Backend\TagsController::class, 'check_featured'])->name('tags.check_featured')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('check/tag-slug', [App\Http\Controllers\Backend\TagsController::class, 'check_slug'])->name('tag.check_slug')->middleware(['auth', 'role:administrator,marketing,dealer']);

    // Sitemaps Setting page

    Route::get('/sitemap-setting',[SitemapController::class,'index'])->name('sitemapsetting.index')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/sitemap-setting-page',[SitemapController::class,'sitemapsave'])->name('sitemapsetting.sitemapsave')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/sitemap-setting-update',[SitemapController::class,'storeupdate'])->name('sitemapsetting.storeupdate')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('sitemap-setting-edit', [SitemapController::class, 'edit'])->name('sitemap-setting.edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/sitemap-setting-reset', [SitemapController::class, 'reset'])->name('sitemapsetting.reset')->middleware(['auth', 'role:administrator,marketing']);

    
    //video 

    Route::get('video-list', [VideoController::class, 'getVideoUploadForm'])->name('get.video.upload')->middleware(['auth', 'role:administrator']);
    Route::post('video-upload', [VideoController::class, 'uploadVideo'])->name('store.video')->middleware(['auth', 'role:administrator']);
    Route::post('videos/list', [VideoController::class, 'list'])->name('videos.list')->middleware(['auth', 'role:administrator']);
    Route::get('/videos/{id}', [VideoController::class, 'deleteVideo'])->name('videos.delete')->middleware(['auth', 'role:administrator']);
    Route::get('videos/edit/{id}', [VideoController::class, 'edit'])->name('videos.edit')->middleware(['auth', 'role:administrator']);
    Route::get('/add-video', [VideoController::class, 'add'])->name('videos.add')->middleware(['auth', 'role:administrator']);
    Route::post('/update-video/{id}', [VideoController::class, 'uploadVideo'])->name('videos.update')->middleware(['auth', 'role:administrator']);
    Route::post('/delete-video', [VideoController::class, 'delete'])->name('deleteVideo')->middleware(['auth', 'role:administrator']);

    //Collection

    Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index')->middleware(['auth', 'role:administrator']);
    Route::get('/add-collection', [CollectionController::class, 'add'])->name('collection.add')->middleware(['auth', 'role:administrator']);
    Route::post('/list-collection', [CollectionController::class, 'list'])->name('collection.list')->middleware(['auth', 'role:administrator']);
    Route::post('/store-collection', [CollectionController::class, 'store'])->name('collection.store')->middleware(['auth', 'role:administrator']);
    Route::get('/edit-collection/{id}', [CollectionController::class, 'edit'])->name('collection.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/update-collection/{id}', [CollectionController::class, 'update'])->name('collection.update')->middleware(['auth', 'role:administrator']);
    Route::get('collection/delete/{id}', [CollectionController::class, 'delete'])->name('collection.delete')->middleware(['auth', 'role:administrator']);
    Route::post('collection/image_remove', [CollectionController::class, 'image_remove'])->name('collection.image_remove')->middleware(['auth', 'role:administrator']);
    Route::post('collection/check-slug', [CollectionController::class, 'check_slug'])->name('collection.check_slug')->middleware(['auth', 'role:administrator']);

    // Garage Doors

    Route::get('/garage-doors', [GarageDoorController::class, 'index'])->name('garage-doors.index')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/add-garage-doors', [GarageDoorController::class, 'add'])->name('garage-doors.add')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/list-garage-doors', [GarageDoorController::class, 'list'])->name('garage-doors.list')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/store-garage-doors', [GarageDoorController::class, 'store'])->name('garage-doors.store')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/edit-garage-doors/{id}', [GarageDoorController::class, 'edit'])->name('garage-doors.edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/update-garage-doors/{id}', [GarageDoorController::class, 'update'])->name('garage-doors.update')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('garage-doors/delete/{id}', [GarageDoorController::class, 'delete'])->name('garage-doors.delete')->middleware(['auth', 'role:administrator,marketing']);

    // Garage Services

    Route::get('/garage-services', [GarageserviceController::class, 'index'])->name('garage-services.index')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/add-garage-services', [GarageserviceController::class, 'add'])->name('garage-services.add')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/list-garage-services', [GarageserviceController::class, 'list'])->name('garage-services.list')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/store-garage-services', [GarageserviceController::class, 'store'])->name('garage-services.store')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/edit-garage-services/{id}', [GarageserviceController::class, 'edit'])->name('garage-services.edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/update-garage-services/{id}', [GarageserviceController::class, 'update'])->name('garage-services.update')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('garage-services/delete/{id}', [GarageserviceController::class, 'delete'])->name('garage-services.delete')->middleware(['auth', 'role:administrator,marketing']);

    // Time Services
    Route::group(['prefix' => 'timeservice', 'middleware' => ['auth', 'role:administrator,marketing']], function () {
        Route::get('/', [App\Http\Controllers\Backend\TimeServiceController::class, 'index'])->name('timeservice.index');
        Route::get('/add', [App\Http\Controllers\Backend\TimeServiceController::class, 'add'])->name('timeservice.add');
        Route::post('/store', [App\Http\Controllers\Backend\TimeServiceController::class, 'store'])->name('timeservice.store');
        Route::post('/list', [App\Http\Controllers\Backend\TimeServiceController::class, 'list'])->name('timeservice.list');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\TimeServiceController::class, 'edit'])->name('timeservice.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Backend\TimeServiceController::class, 'delete'])->name('timeservice.delete');
        Route::post('/check_slug', [App\Http\Controllers\Backend\TimeServiceController::class, 'check_slug'])->name('timeservice.check_slug');
        Route::post('/change_status', [App\Http\Controllers\Backend\TimeServiceController::class, 'change_status'])->name('timeservice.change_status');
    });


      Route::group(['prefix' => 'role-category', 'middleware' => ['auth', 'role:administrator,marketing']], function () {
        Route::get('/', [RoleCategoryController::class, 'index'])->name('role-category.index');
        Route::get('/add', [RoleCategoryController::class, 'add'])->name('role-category.add');
        Route::post('/store', [RoleCategoryController::class, 'store'])->name('role-category.store');
        Route::post('/list', [RoleCategoryController::class, 'list'])->name('role-category.list');
        Route::get('/edit/{id}', [RoleCategoryController::class, 'edit'])->name('role-category.edit');
        Route::get('/delete/{id}', [RoleCategoryController::class, 'delete'])->name('role-category.delete');
        Route::post('/change_status', [RoleCategoryController::class, 'change_status'])->name('role-category.change_status');
    });

    Route::group(['prefix' => 'central-files', 'middleware' => ['auth', 'role:administrator,marketing']], function () {
        Route::get('/', [App\Http\Controllers\Backend\CentralFileController::class, 'index'])->name('centralfile.index');
        Route::get('/add', [App\Http\Controllers\Backend\CentralFileController::class, 'add'])->name('centralfile.add');
        Route::post('/store', [App\Http\Controllers\Backend\CentralFileController::class, 'store'])->name('centralfile.store');
        Route::post('/list', [App\Http\Controllers\Backend\CentralFileController::class, 'list'])->name('centralfile.list');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\CentralFileController::class, 'edit'])->name('centralfile.edit');
        Route::get('/delete/{id}', [App\Http\Controllers\Backend\CentralFileController::class, 'delete'])->name('centralfile.delete');
    });
    // Location

    Route::get('/location', [LocationController::class, 'index'])->name('location.index')->middleware(['auth', 'role:administrator']);
    Route::get('/add-location', [LocationController::class, 'add'])->name('location.add')->middleware(['auth', 'role:administrator']);
    Route::post('/list-location', [LocationController::class, 'list'])->name('location.list')->middleware(['auth', 'role:administrator']);
    Route::post('/store-location', [LocationController::class, 'store'])->name('location.store')->middleware(['auth', 'role:administrator']);
    Route::get('/edit-location/{id}', [LocationController::class, 'edit'])->name('location.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/update-location/{id}', [LocationController::class, 'update'])->name('location.update')->middleware(['auth', 'role:administrator']);
    Route::get('location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete')->middleware(['auth', 'role:administrator']);

    // FAQ

    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/add-faq', [FaqController::class, 'add'])->name('faqs.add')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/list-faqs', [FaqController::class, 'list'])->name('faqs.list')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/store-faqs', [FaqController::class, 'store'])->name('faqs.store')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/edit-faqs/{id}', [FaqController::class, 'edit'])->name('faqs.edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/update-faqs/{id}', [FaqController::class, 'update'])->name('faqs.update')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('faqs/delete/{id}', [FaqController::class, 'delete'])->name('faqs.delete')->middleware(['auth', 'role:administrator,marketing']);

    // Client Logo

    Route::get('/client-logo', [ClientLogoController::class, 'index'])->name('client-logo.index')->middleware(['auth', 'role:administrator']);
    Route::get('/add-client-logo', [ClientLogoController::class, 'add'])->name('client-logo.add')->middleware(['auth', 'role:administrator']);
    Route::post('/list-client-logo', [ClientLogoController::class, 'list'])->name('client-logo.list')->middleware(['auth', 'role:administrator']);
    Route::post('/store-client-logo', [ClientLogoController::class, 'store'])->name('client-logo.store')->middleware(['auth', 'role:administrator']);
    Route::get('/edit-client-logo/{id}', [ClientLogoController::class, 'edit'])->name('client-logo.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/update-client-logo/{id}', [ClientLogoController::class, 'update'])->name('client-logo.update')->middleware(['auth', 'role:administrator']);
    Route::get('client-logo/delete/{id}', [ClientLogoController::class, 'delete'])->name('client-logo.delete')->middleware(['auth', 'role:administrator']);
    Route::post('client-logo/status', [ClientLogoController::class, 'status'])->name('client_logo.status')->middleware(['auth', 'role:administrator']);

    //Inquiry

    Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/list-inquiry', [InquiryController::class, 'list'])->name('contact.list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('inquiry/delete/{id}', [InquiryController::class, 'delete'])->name('inquiry.delete')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('inquiry/export', [InquiryController::class, 'export_excel'])->name('inquiry.export')->middleware(['auth', 'role:administrator,marketing,dealer']);

    //Testimonials

    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index')->middleware(['auth', 'role:administrator']);
    Route::get('/add-testimonials', [TestimonialController::class, 'add'])->name('testimonials.add')->middleware(['auth', 'role:administrator']);
    Route::post('/list-testimonials', [TestimonialController::class, 'list'])->name('testimonials.list')->middleware(['auth', 'role:administrator']);
    Route::post('/store-testimonials', [TestimonialController::class, 'store'])->name('testimonials.store')->middleware(['auth', 'role:administrator']);
    Route::get('/edit-testimonials/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/update-testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update')->middleware(['auth', 'role:administrator']);
    Route::get('testimonials/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonials.delete')->middleware(['auth', 'role:administrator']);
    Route::post('check/featured-testimonials', [TestimonialController::class, 'check_featured'])->name('testimonials.check_featured')->middleware(['auth', 'role:administrator']);
    Route::post('check/testimonials-slug', [TestimonialController::class, 'check_slug'])->name('testimonials.check_testimonial_slug')->middleware(['auth', 'role:administrator']);

    // Team

    Route::get('/all-members', [TeamController::class, 'index'])->name('team.index')->middleware(['auth', 'role:administrator']);
    Route::get('/add-member', [TeamController::class, 'add'])->name('team.add')->middleware(['auth', 'role:administrator']);

    // Gallery

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/gallery-add', [GalleryController::class, 'add'])->name('gallery.add')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/gallery-store', [GalleryController::class, 'store'])->name('gallery.store')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/list-gallery', [GalleryController::class, 'list'])->name('gallery.list')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('/edit-gallery/{id}', [GalleryController::class, 'edit'])->name('gallery.edit')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('gallery/check-slug', [GalleryController::class, 'check_slug'])->name('gallery.check_slug')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('gallery/image_remove', [GalleryController::class, 'image_remove'])->name('gallery.image_remove')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('gallery/publish_status', [GalleryController::class, 'publish_status'])->name('gallery.publish_status')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('gallery/featured_status', [GalleryController::class, 'featured_status'])->name('gallery.featured_status')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::get('gallery/delete/{id}', [GalleryController::class, 'delete'])->name('gallery.delete')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('gallery_category/check-slug', [GalleryController::class, 'gallery_category_slug'])->name('gallery_category.check_slug')->middleware(['auth', 'role:administrator,marketing,dealer']);
    Route::post('/gallery-create-category', [GalleryController::class, 'gallery_create_category'])->name('gallery-category.create-category')->middleware(['auth', 'role:administrator,marketing,dealer']);

    //Media

    Route::get('/media', [MediaController::class, 'index'])->name('media.index')->middleware('auth');
    Route::post('/media-upload', [MediaController::class, 'upload'])->name('media.upload')->middleware('auth');
    Route::post('/media-filter', [MediaController::class, 'filter'])->name('media.filter')->middleware('auth');

    //Products/Services

    Route::get('/products-services', [ProductsServicesController::class, 'index'])->name('products-services')->middleware('auth');
    Route::get('/products-services-add', [ProductsServicesController::class, 'add'])->name('products-services.add')->middleware('auth');
    Route::post('/products-services-store', [ProductsServicesController::class, 'store'])->name('products-services.store')->middleware('auth');
    Route::post('/list-products-services', [ProductsServicesController::class, 'list'])->name('products-services.list')->middleware('auth');
    Route::get('/products-services/{id}', [ProductsServicesController::class, 'edit'])->name('products_services.edit')->middleware('auth');
    Route::get('products-services/delete/{id}', [ProductsServicesController::class, 'delete'])->name('products_services.delete')->middleware('auth');
    Route::post('products-services/check-slug', [ProductsServicesController::class, 'check_slug'])->name('products_services.check_slug')->middleware('auth');
    Route::post('/media-detail', [MediaController::class, 'get_image_detail'])->name('media.get.detail')->middleware('auth');
    Route::get('/media-all-upload', [MediaController::class, 'get_all_images'])->name('media.all.upload')->middleware('auth');
    Route::get('/media-all-upload-index', [MediaController::class, 'get_all_images_index'])->name('media.all.upload.index')->middleware('auth');
    Route::post('/media-store-img-details', [MediaController::class, 'store_image_detail'])->name('media.store.detail')->middleware('auth');
    Route::post('/media-delete-img', [MediaController::class, 'delete_image'])->name('media.delete')->middleware('auth');
    Route::get('/media-index', [MediaController::class, 'show_all'])->name('media.showall')->middleware('auth');
    Route::post('/media-image-byid', [MediaController::class, 'get_img_byid'])->name('media.getimg.byid')->middleware('auth');

    // Pages 

    Route::get('/pages', [PageController::class, 'index'])->name('pages.index')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/page-list', [PageController::class, 'list'])->name('page.list')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/add-page', [PageController::class, 'add'])->name('pages.add')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/edit-page/{id}', [PageController::class, 'edit'])->name('pages.edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('/page-save', [PageController::class, 'save'])->name('page.save')->middleware(['auth', 'role:administrator,marketing']);
    Route::get('/page-delete/{id}', [PageController::class, 'delete'])->name('page.delete')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('check/page-slug', [PageController::class, 'check_slug'])->name('page.check_slug')->middleware(['auth', 'role:administrator,marketing']);

    // Page Section Builder

    Route::get('/page-builder-sections/{id}', [PageController::class, 'page_buider'])->name('pages.builder')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('page-builder-sections-store', [PageController::class, 'page_sec_store'])->name('pages.page_sec_store')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('page-builder-sections-edit', [PageController::class, 'page_sec_edit'])->name('pages.page_sec_edit')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('page-builder-sections-delete', [PageController::class, 'page_sec_delete'])->name('pages.page_sec_delete')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('page-builder-sections-prop-store', [PageController::class, 'page_sec_prop_store'])->name('pages.page_sec_prop_store')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('page-builder-sections-change-order', [PageController::class, 'page_sec_change_order'])->name('pages.page_sec_change_order')->middleware(['auth', 'role:administrator,marketing']);

    // Section Widgets

    Route::post('section-widget-store', [WidgetController::class, 'sec_widget_store'])->name('pages.sec_widget_store')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('section-widget-delete', [WidgetController::class, 'sec_widget_delete'])->name('pages.sec_widget_delete')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('section-widget-prop-store', [WidgetController::class, 'sec_widget_prop_store'])->name('pages.sec_widget_prop_store')->middleware(['auth', 'role:administrator,marketing']);
    Route::post('section-widget-prop-get', [WidgetController::class, 'sec_widget_prop_get'])->name('pages.sec_widget_prop_get')->middleware(['auth', 'role:administrator,marketing']);
    // Route::post('section-widget-change-order', [PageController::class, 'sec_widget_update_order'])->name('pages.sec_widget_update_order')->middleware('auth');

    // Home page setting 

    Route::get('/home-page-setting', [SettingController::class, 'homepage_setting_view'])->name('setting.homepage.index')->middleware('auth');
    Route::get('/location-page-setting', [SettingController::class, 'locationpage_setting_view'])->name('setting.locationpage.index')->middleware('auth');
    Route::post('/fetch/location/page-settings', [SettingController::class, 'fetchLocationSetting'])->name('fetch.location.page-setting')->middleware('auth');
    Route::post('/home-page-setting-store', [SettingController::class, 'homepage_setting_store'])->name('homepage_setting.store')->middleware('auth');


    Route::get('/location-data-add', [SettingController::class, 'locationdata_add'])->name('locationdata_add')->middleware('auth');
    Route::post('/location-data-store', [SettingController::class, 'locationdata_store'])->name('locationdata.store')->middleware('auth');
    Route::post('check/location-slug', [SettingController::class, 'check_location_slug'])->name('check_location_slug')->middleware('auth');
    Route::post('/location-page-setting-store', [SettingController::class, 'locationpage_setting_store'])->name('locationpage_setting.store')->middleware('auth');

    // sliders

    Route::get('/sliders', [SlidersController::class, 'index'])->name('sliders.index')->middleware(['auth', 'role:administrator']);
    Route::get('/sliders-add', [SlidersController::class, 'add'])->name('sliders.add')->middleware(['auth', 'role:administrator']);
    Route::post('/sliders-store', [SlidersController::class, 'store'])->name('sliders.store')->middleware(['auth', 'role:administrator']);
    Route::post('/list-sliders', [SlidersController::class, 'list'])->name('list-sliders')->middleware(['auth', 'role:administrator']);
    Route::get('/sliders-delete/{id}', [SlidersController::class, 'delete'])->name('sliders.delete')->middleware(['auth', 'role:administrator']);
    Route::get('/sliders-edit/{id}', [SlidersController::class, 'edit'])->name('sliders.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/sliders-status', [SlidersController::class, 'check_status'])->name('sliders.status')->middleware(['auth', 'role:administrator']);

    // menu

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index')->middleware(['auth', 'role:administrator']);
    Route::post('/menu-add', [MenuController::class, 'add'])->name('menu.add')->middleware(['auth', 'role:administrator']);
    Route::post('/list-menu', [MenuController::class, 'store'])->name('list-menu')->middleware(['auth', 'role:administrator']);
    Route::get('/menu-delete/{id}', [MenuController::class, 'delete'])->name('menu.delete')->middleware(['auth', 'role:administrator']);
    Route::post('/display-location', [MenuController::class, 'display_location'])->name('menu.display_location')->middleware(['auth', 'role:administrator']);
    Route::get('/menu-edit/{id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware(['auth', 'role:administrator']);
    Route::post('/edit-menu', [MenuController::class, 'edit_menu'])->name('menu.edit_menu')->middleware(['auth', 'role:administrator']);

    // Sidebar settings

    Route::get('/sidebar-setting', [SidebarController::class, 'index'])->name('sidebar.index')->middleware(['auth', 'role:administrator']);
    Route::post('/sidebar-setting-save', [SidebarController::class, 'save'])->name('sidebar.save')->middleware(['auth', 'role:administrator']);
    Route::post('/sidebar-sequence-change', [SidebarController::class, 'sequence_change'])->name('sidebar.sequence')->middleware(['auth', 'role:administrator']);
    Route::post('/sidebar-setting-delete', [SidebarController::class, 'delete'])->name('sidebar.delete')->middleware(['auth', 'role:administrator']);
    Route::post('/sidebar-get-html', [SidebarController::class, 'get_html'])->name('sidebar.get.html')->middleware(['auth', 'role:administrator']);
    Route::post('/sidebar-prop-save', [SidebarController::class, 'prop_save'])->name('sidebar.prop.save')->middleware(['auth', 'role:administrator']);

    // Comment settings 

    Route::get('/comment-setting', [SettingController::class, 'comment_index'])->name('comment.index')->middleware(['auth', 'role:administrator']);
    Route::post('/comment-setting-save', [SettingController::class, 'comment_save'])->name('comment.save')->middleware(['auth', 'role:administrator']);

    // Loading Dock door
    Route::prefix('loadingdock-door')->controller(LoadingDockdoorController::class)->name('loadingdock.')->middleware(['auth', 'role:administrator,marketing'])->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('update', 'save')->name('add');
    });

    // Hollow Metal door
    Route::prefix('hollowmetal-door')->controller(HollowMetalDoorsController::class)->name('hollowmetal.')->middleware(['auth', 'role:administrator,marketing'])->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('update', 'save')->name('add');
    });


    Route::prefix('Service-area')->controller(ServiceAreaController::class)->name('servicearea.')->middleware(['auth', 'role:administrator,marketing'])->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('update', 'save')->name('add');
    });


});



// frontend routes
Route::get('/adminer', function () {
    return redirect('/adminer');
});
Route::get('/{slug}', [FrontendPageController::class, 'index'])->name('frontend.page.index');

Route::get('/clear-cache', function () {
    // Clear config, route, and view cache
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "All caches cleared!";
});
