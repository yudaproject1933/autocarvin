<?php

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

Route::get('/', function () {
    return view('landing.dashboard.index');
});

Route::resource('/dashboard', 'App\Http\Controllers\Landing\DashboardController');

Route::resource('/checkout', 'App\Http\Controllers\Landing\CheckoutController');
Route::get('/check', 'App\Http\Controllers\Landing\CheckoutController@check');

Route::post('/contact-us', 'App\Http\Controllers\Landing\DashboardController@contactUs');

Route::get('/read_report/{id}/{vin}', 'App\Http\Controllers\Landing\DashboardController@read_report');

Route::get('/refund-info', 'App\Http\Controllers\Admin\ReportController@refund_info');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    //dashboard
    Route::post('/upload_report', 'App\Http\Controllers\Admin\TransactionController@upload_report');
    Route::post('/generate_report', 'App\Http\Controllers\Admin\TransactionController@generate_report');
    Route::get('/sendEmail/{id}', 'App\Http\Controllers\Admin\TransactionController@sendEmail');

    //transaction
    Route::resource('/transaction', 'App\Http\Controllers\Admin\TransactionController');
    Route::get('/export_excel', 'App\Http\Controllers\Admin\TransactionController@export_excel');

    Route::resource('/report', 'App\Http\Controllers\Admin\ReportController');
    Route::get('/list-refund', 'App\Http\Controllers\Admin\ReportController@list_refund');

    Route::resource('/user', 'App\Http\Controllers\Admin\UserController');
});
