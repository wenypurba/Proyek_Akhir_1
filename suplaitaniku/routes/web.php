<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::post('search','App\Http\Controllers\BerandaController@Search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/show/{id}', [App\Http\Controllers\BerandaController::class, 'show'])->name('beranda.show');
Route::get('/detail/{id}', [App\Http\Controllers\BerandaController::class, 'detail'])->name('beranda.detail');
Route::get('/modal/{id}', [App\Http\Controllers\ProductController::class, 'modal'])->name('products.modal');
Route::group(['middleware' => ['auth']], function() {
    Route::get('logout',[UserController::class,'do_logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::post('search2','App\Http\Controllers\ProductController@Search');
    Route::get('searchLive', [ProductController::class, 'search'])->name('searchLive');
    Route::get('liveSearch', [UserController::class, 'search'])->name('searchLive');
});
