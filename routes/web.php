<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//Route::get('/api/login', function () {
//    return view('admin/login');
//});
//Route::get('/admin/{any}', function () {
//    return view('admin/index');
//})->where('any', '.*');

Route::get('/', function () {
    return view('layouts/app');
});

//Route::get('/admin-x', function () {
//    return view('layouts/admin');
//});
Route::get('/admin/index', function () {
    return view('admin/user/index');
});

Route::get('/login', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [LoginController::class, 'index'])->name('login');

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Route
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post("add-new", [UserController::class, 'addNew'])->name('user.addNew');
    });
});
