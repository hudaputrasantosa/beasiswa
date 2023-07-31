<?php

use App\Http\Controllers\BeasiswaController;
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
// Author : Huda Putra Santosa
// NIM : 20104087
// Edited : 27 Juli 2023 11.00 WIB


// routing untuk menampilakn sebuah halaman awal atau pilihan beasiswa dengan memanggil fungsi index
Route::get('/', [BeasiswaController::class, 'index'])->name('pilihBeasiswa');
// routing untuk menampilakn sebuah halaman form daftar dengan memanggil fungsi daftar_beasiswa
Route::get('/daftar-beasiswa', [BeasiswaController::class, 'daftar_beasiswa'])->name('daftarBeasiswa');

Route::post('/search-data', [BeasiswaController::class, 'search_data'])->name('searchData');
// routing untuk melakukan operasi untuk menyimpan sebuah data ke database dengan memanggil fungsi store_beasiswa
Route::post('/proses-beasiswa', [BeasiswaController::class, 'store_beasiswa'])->name('prosesBeasiswa');
// routing untuk menampilakn sebuah halaman hasil daftar dengan memanggil fungsi hasil_beasiswa
Route::get('/hasil-beasiswa', [BeasiswaController::class, 'hasil_beasiswa'])->name('hasilBeasiswa');
