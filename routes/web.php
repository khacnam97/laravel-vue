<?php

use App\Http\Controllers\CategoriesController;
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
        Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

        Route::get('/admin/post', [PostController::class, 'adminIndex'])->name('post.index');
        Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
        Route::post("post-add-new", [PostController::class, 'addNew'])->name('post.addNew');
        Route::get('/admin/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');

        Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('category-add-new', [CategoriesController::class, 'addNew'])->name('categories.addNew');
        Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::post('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
        Route::get('/admin/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
    });
});
