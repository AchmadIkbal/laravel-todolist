<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestMiddlware;
use App\Http\Middleware\OnlyMemberMiddleware;
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

Route::get('/', [HomeController::class, 'home']);
Route::view('/template', 'template');

Route::controller(UserController::class)->group(function (){
    Route::get('/login','login')->middleware([OnlyGuestMiddlware::class]);
    Route::post('/login','doLogin')->middleware([OnlyGuestMiddlware::class]);
    Route::post('/logout', [UserController::class, 'doLogout'])->middleware(OnlyMemberMiddleware::class);
});
