<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
//    Route::resource('companies', 'CompaniesController', ['except' => ['create', 'edit']]);
//});

Route::post('/post/create', [PostController::class ,'store']);
Route::get('/post/edit/{id}', [PostController::class ,'edit']);
Route::post('/post/update/{id}', [PostController::class , 'update']);
Route::delete('/post/delete/{id}', [PostController::class,'delete']);
Route::get('/posts', [PostController::class, 'index']);

Route::namespace('Api')->group(function (){
    Route::resource('course', 'CourseController')->except(['create', 'edit']);
});

Route::post('login', [AuthController::class, 'login'])->name('login');
