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
    return  redirect('/admin');
});

Route::post('/user/save/response', [\App\Http\Controllers\UserController::class, 'saveResponse']);

Route::get('/auth/verify', [\App\Http\Controllers\UserPageController::class, 'verifyLink']);


Route::get('/admin/login', [\App\Http\Controllers\AdminPageController::class, 'adminLogin']);
Route::post('/admin/backend/auth/login', [\App\Http\Controllers\AuthController::class, 'adminDoLogin']);

Route::group(['middleware' => 'admin-middleware'], function() {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminPageController::class, 'dashboard']);
        Route::get('/response', [\App\Http\Controllers\AdminPageController::class, 'response']);

        Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'adminDoLogout']);
        Route::prefix('/backend')->group(function () {
            Route::post('/sendInvitation', [\App\Http\Controllers\AdminController::class, 'sendInvitation']);


        });

    });
});

