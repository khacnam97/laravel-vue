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

Route::get('/login', function () {
    return view('admin/login');
});
//Route::get('/admin/{any}', function () {
//    return view('admin/index');
//})->where('any', '.*');

Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/admin-x', function () {
    return view('layouts/admin');
});
Route::get('/admin/{any}', function () {
    return view('admin/user/index');
})->where('any', '.*');
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
//    Route::get('/', 'AdminController@index')->name('admin.index')->middleware('admin');
    Route::get('/admin/{any}', function () {
        return view('admin/user/index');
    })->where('any', '.*');
    Route::group(['prefix'=>'user','namespace'=>'user'],function(){
    });

});

Route::get('/', function () {
    return view('layouts/app');
});
