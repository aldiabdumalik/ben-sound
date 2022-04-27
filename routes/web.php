<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TrackingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebAboutController;
use App\Http\Controllers\Admin\WebBannerController;
use App\Http\Controllers\Admin\WebClientController;
use App\Http\Controllers\Admin\WebContactController;
use App\Http\Controllers\Admin\WebReviewController;
use App\Http\Controllers\WebsiteController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'website_config'], function (){
    Route::controller(WebsiteController::class)->group(function (){
        Route::get('/', 'index')->name('web');
        Route::get('/index.html', 'index')->name('web.index');
        Route::get('/tracking.html', 'indexTracking')->name('web.tracking');
        Route::get('/review.html', 'indexReview')->name('web.review');
        Route::get('/action/{bln}/schedule.json', 'ajaxSchedule')->name('web.schedule');
        Route::get('/action/{schedule_id}/track.json', 'ajaxTracking')->name('web.track.action');
        Route::post('/action/send-message', 'sendMessage')->name('web.send_message');
        Route::post('/action/send-riview', 'sendRiview')->name('web.send_riview');
    });
    Auth::routes();
    Route::group(['middleware' => ['role:admin|driver']], function () {
        Route::controller(DashboardController::class)->group(function (){
            Route::get('/dashboard', 'index')->name('admin.dashboard');
        });
    
        Route::controller(ScheduleController::class)->group(function (){
            Route::get('/schedule', 'index')->name('admin.schedule');
            Route::get('/schedule/{id}/detail', 'detail')->name('admin.schedule.detail');
            Route::post('/schedule/dt', 'dt')->name('admin.schedule.dt');
            Route::post('/schedule/save', 'store')->name('admin.schedule.store');
            Route::put('/schedule/{id}/update', 'update')->name('admin.schedule.update');
            Route::delete('/schedule/{id}/delete', 'destroy')->name('admin.schedule.destroy');
        });
    
        Route::controller(TrackingController::class)->group(function (){
            Route::get('/track', 'index')->name('admin.track');
            Route::get('/track/schedule', 'getSchedule')->name('admin.track.schedule');
            Route::get('/track/{schedule_id}/tracking', 'tracking')->name('admin.track.tracking');
            Route::post('/track/save', 'store')->name('admin.track.store');
        });
    
        Route::controller(CompanyController::class)->group(function (){
            Route::get('/company', 'index')->name('admin.company');
            Route::get('/company/detail', 'detail')->name('admin.company.detail');
            Route::post('/company/update', 'update')->name('admin.company.update');
    
            Route::get('/company/contact', 'indexContact')->name('admin.company.contact');
            Route::get('/company/contact/{id}/detail', 'detailContact')->name('admin.company.contact.detail');
            Route::post('/company/contact/dt', 'dt')->name('admin.company.contact.dt');
            Route::post('/company/contact/save', 'store')->name('admin.company.contact.store');
            Route::put('/company/contact/{id}/update', 'updateContact')->name('admin.company.contact.updateContact');
            Route::delete('/company/contact/{id}/delete', 'destroy')->name('admin.company.contact.destroy');
        });
    
        Route::controller(WebBannerController::class)->group(function (){
            Route::get('/company/banner', 'index')->name('admin.company.banner');
            Route::post('/company/banner/dt', 'dt')->name('admin.company.banner.dt');
            Route::get('/company/banner/detail', 'detail')->name('admin.company.banner.detail');
            Route::post('/company/banner/update', 'update')->name('admin.company.banner.update');
            Route::get('/company/banner/{id}/detailimage', 'detailimage')->name('admin.company.banner.detailimage');
            Route::post('/company/banner/save', 'store')->name('admin.company.banner.store');
            Route::post('/company/banner/updateimage', 'updateimage')->name('admin.company.banner.updateimage');
            Route::delete('/company/banner/{id}/delete', 'destroy')->name('admin.company.banner.destroy');
        });
        Route::controller(WebAboutController::class)->group(function (){
            Route::get('/company/about', 'index')->name('admin.company.about');
            Route::get('/company/about/detail', 'detail')->name('admin.company.about.detail');
            Route::post('/company/about/update', 'update')->name('admin.company.about.update');
        });
        Route::controller(WebClientController::class)->group(function (){
            Route::get('/company/client', 'index')->name('admin.company.client');
            Route::post('/company/client/dt', 'dt')->name('admin.company.client.dt');
            Route::get('/company/client/{id}/detail', 'detail')->name('admin.company.client.detail');
            Route::post('/company/client/save', 'store')->name('admin.company.client.store');
            Route::post('/company/client/update', 'update')->name('admin.company.client.update');
            Route::delete('/company/client/{id}/delete', 'destroy')->name('admin.company.client.destroy');
        });
        Route::controller(WebContactController::class)->group(function (){
            Route::get('/company/message', 'index')->name('admin.company.message');
            Route::post('/company/message/dt', 'dt')->name('admin.company.message.dt');
        });
        Route::controller(WebReviewController::class)->group(function (){
            Route::get('/company/riview', 'index')->name('admin.company.review');
            Route::post('/company/riview/dt', 'dt')->name('admin.company.review.dt');
            Route::put('/company/riview/update/{id}', 'update')->name('admin.company.review.update');
        });

        Route::controller(UserController::class)->group(function (){
            Route::get('/user', 'index')->name('admin.user');
            Route::get('/user/{id}/detail', 'detail')->name('admin.user.detail');
            Route::post('/user/dt', 'dt')->name('admin.user.dt');
            Route::post('/user/save', 'store')->name('admin.user.store');
            Route::put('/user/{id}/update', 'update')->name('admin.user.update');
            Route::delete('/user/{id}/delete', 'destroy')->name('admin.user.destroy');
        });
    });
});
