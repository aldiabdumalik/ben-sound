<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TrackingController;
use App\Http\Controllers\WebsiteController;
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

Route::controller(WebsiteController::class)->group(function (){
    Route::get('/', 'index')->name('web');
    Route::get('/index.html', 'index')->name('web.index');
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
        Route::get('/company/{id}/detail', 'detail')->name('admin.company.detail');
        Route::post('/company/dt', 'dt')->name('admin.company.dt');
        Route::put('/company/{id}/update', 'update')->name('admin.company.update');
    });
});