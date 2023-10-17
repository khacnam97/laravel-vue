<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
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
//
//Route::get('/post', function () {
//    return view('layouts/app');
//});

//Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
//    Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
//});


Route::get('/post/{any}', function () {
    return view('layouts/app');
})->where('any', '.*');

Route::get('/admin', function () {
    return view('admin/login');
});
Route::get('/admin/{any}', function () {
    return view('admin/index');
})->where('any', '.*');

Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/', function () {
    return view('layouts/app');
});
