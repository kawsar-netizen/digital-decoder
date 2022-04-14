<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//===================  Frontend Part for Digital Decoder Ltd.    =========================

// Route::get('/', function () {
//     return view('front.index');
// });
// Route::get('/',[FrontController::class,'admin_dashboard']);

//Home Pages Route Here...........

Route::get('/', [FrontController::class, 'index'])->name('user.dashboard');

Route::get('/read-more/{slug}', [FrontController::class, 'showRead'])->name('read.more');

//About Pages Route Here...........

// Route::get('about', 'FrontController@about')->name('about');

Route::get('front/abouts', [FrontController::class, 'about'])->name('abouts');

Route::get('services', 'FrontController@service')->name('service');
Route::get('testimonials', 'FrontController@testimonial')->name('testimonial');
Route::get('portfolio', 'FrontController@portfolio')->name('portfolio');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::get('blog', 'FrontController@blog')->name('blog');
// Route::get('about', 'FrontController@about')->name('about');


//===================  Backend Part for Digital Decoder Ltd.    =========================

Route::get('/admin', function () {
    return view('auth.login');
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');

    //Slider Route Here.....

    Route::get('home-slider', [SliderController::class, 'index'])->name('home.slider');

    Route::get('add-slider', [SliderController::class, 'create'])->name('add.slider');

    Route::post('store-slider', [SliderController::class, 'store'])->name('slider.store');

    Route::get('view-slider/{id}', [SliderController::class, 'view'])->name('slider.edit');

    Route::get('edit-slider/{id}', [SliderController::class, 'edit'])->name('slider.edit');

    Route::put('update-slider/{id}', [SliderController::class, 'update'])->name('slider.updated');

    Route::get('destory-slider/{id}', [SliderController::class, 'destory'])->name('slider.destory');

    //Quote Route Here......

    Route::resource('quote', 'Admin\QuoteController');

    //Service Route Here......

    Route::resource('service', 'Admin\ServiceController');

    //Servicefeature Route Here......

    Route::resource('servicefeature', 'Admin\ServicefeatureController');

    //OurClient Route Here......

    Route::resource('ourclient', 'Admin\OurclientController');

    //About Route Here.....

    Route::resource('about', 'Admin\AboutController');

    //AboutFeature Route Here.....

    Route::resource('aboutfeature', 'Admin\AboutfeatureController');

    //Testimonial Route Here......

    Route::resource('testimonial', 'Admin\TestimonialController');

    //Company Information Route Here......

    Route::resource('companyInfo','Admin\CompanyinfoController');

    //Client Information Route Here....

    Route::resource('clientInfo','Admin\ContactContorller');

    //Portfolio  Route Here....

    Route::resource('company_portfolio','Admin\PortfolioController');


});
