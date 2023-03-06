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
    return view('welcome');
});

Auth::routes();
Route::get('/user/login', [App\Http\Controllers\Auth\UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [App\Http\Controllers\Auth\UserLoginController::class, 'login'])->name('user.login.post');
// Route::get('/user/login', [App\Http\Controllers\Auth\UserLoginController::class, 'logout'])->name('user.logout');
// Route::post('/user/login', 'Auth\UserLoginController@login')->name('user.login.post');
// Route::post('/user/logout', 'Auth\UserLoginController@logout')->name('user.logout');
//Admin Home page after login
Route::group(['middleware'=>'user'], function() {
    Route::get('/user/home', 'User\HomeController@index');
});

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::delete('masyarakat/delete/{id}', [App\Http\Controllers\MasyarakatController::class, 'destroy'])->name('masyarakat.delete');

Route::get('pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\PengaduanController::class, 'edit'])->name('pengaduan.edit');
Route::put('pengaduan/update/{id}', [App\Http\Controllers\PengaduanController::class, 'update'])->name('pengaduan.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\PengaduanController::class, 'show'])->name('pengaduan.show');
Route::delete('pengaduan/delete/{id}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('pengaduan.delete');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
