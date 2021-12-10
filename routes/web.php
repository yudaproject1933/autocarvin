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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    //landing
    
});
