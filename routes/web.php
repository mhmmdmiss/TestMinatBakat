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

Route::get('/home', function () {
    return view('beranda');
});

//Login
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function() {
    \Auth::logout();
    return redirect ('/');
});

Route::get('/admin/profile','AdminController@admin_profile');



Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','AdminController@admin');
    Route::post('/admin/tambah_data','AdminController@tambah_data_admin');
    Route::get('/admin/edit/{id}','AdminController@edit_admin');
    Route::post('/admin/edit_data','AdminController@edit_data_admin');
    Route::get('/admin/delete/{id}','AdminController@delete_admin');
    
    Route::get('/siswa','SiswaController@siswa');
    Route::post('/siswa/tambah_data','SiswaController@tambah_data_siswa');
    Route::get('/siswa/edit/{id}','SiswaController@edit_siswa');
    Route::post('/siswa/edit_data','SiswaController@edit_data_siswa');
    Route::get('/siswa/delete/{id}','SiswaController@delete_siswa');
});

Route::group(['middleware' => 'user'], function () {
    Route::get('/ujian','SiswaController@ujian');
    Route::get('/hasil_ujian','SiswaController@hasil_ujian');
});