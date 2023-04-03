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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('masyarakat/login', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@showLoginForm')->name('masyarakat.login');
Route::post('masyarakat/login', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@redirectTo')->name('masyarakat.login.post');
Route::post('masyarakat/logout', 'App\Http\Controllers\Masyarakat\MasyarakatLoginController@logout')->name('masyarakat.logout');

Route::get('masyarakat/create', [App\Http\Controllers\Masyarakat\MasyarakatRegisterController::class, 'create'])->name('masyarakat.create');
Route::post('masyarakat/store', [App\Http\Controllers\Masyarakat\MasyarakatRegisterController::class, 'store'])->name('masyarakat.store');

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('pengaduan', [App\Http\Controllers\PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\PengaduanController::class, 'edit'])->name('pengaduan.edit');
Route::post('pengaduan/update/{id}', [App\Http\Controllers\PengaduanController::class, 'update'])->name('pengaduan.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\PengaduanController::class, 'show'])->name('pengaduan.show');
Route::get('pengaduan/delete/{id}', [App\Http\Controllers\PengaduanController::class, 'delete'])->name('pengaduan.delete');

Route::get('tanggapan', [App\Http\Controllers\TanggapanController::class, 'index'])->name('tanggapan.index');
Route::get('tanggapan/create', [App\Http\Controllers\TanggapanController::class, 'create'])->name('tanggapan.create');
Route::post('tanggapan/store', [App\Http\Controllers\TanggapanController::class, 'store'])->name('tanggapan.store');
Route::get('tanggapan/edit/{id}', [App\Http\Controllers\TanggapanController::class, 'edit'])->name('tanggapan.edit');
Route::post('tanggapan/update/{id}', [App\Http\Controllers\TanggapanController::class, 'update'])->name('tanggapan.update');
Route::get('tanggapan/show/{id}', [App\Http\Controllers\TanggapanController::class, 'show'])->name('tanggapan.show');
Route::get('tanggapan/delete/{id}', [App\Http\Controllers\TanggapanController::class, 'delete'])->name('tanggapan.delete');

Route::get('masyarakat', [App\Http\Controllers\MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::get('masyarakat/create', [App\Http\Controllers\MasyarakatController::class, 'create'])->name('masyarakat.create');
Route::post('masyarakat/store', [App\Http\Controllers\MasyarakatController::class, 'store'])->name('masyarakat.store');
Route::get('masyarakat/edit/{id}', [App\Http\Controllers\MasyarakatController::class, 'edit'])->name('masyarakat.edit');
Route::post('masyarakat/update/{id}', [App\Http\Controllers\MasyarakatController::class, 'update'])->name('masyarakat.update');
Route::get('masyarakat/show/{id}', [App\Http\Controllers\MasyarakatController::class, 'show'])->name('masyarakat.show');
Route::get('masyarakat/delete/{id}', [App\Http\Controllers\MasyarakatController::class, 'delete'])->name('masyarakat.delete');