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

Route::get('/admin-lte', function() {
    return view('admin-lte');
});

Route::get('/manajemen/pengguna', [App\Http\Controllers\PenggunaController::class, 'index']);
Route::get('/manajemen/pelanggan', [App\Http\Controllers\PelangganController::class, 'index']);
Route::get('/manajemen/produk', [App\Http\Controllers\ProdukController::class, 'index']);
Route::get('/manajemen/pesanan', [App\Http\Controllers\PesananController::class, 'index']);
Route::get('/manajemen/detail-pesanan', [App\Http\Controllers\DetailPesananController::class, 'index']);
Route::get('/manajemen/detail-pelanggan', [App\Http\Controllers\DetailPelangganController::class, 'index']);