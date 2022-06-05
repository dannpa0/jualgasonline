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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('')

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin-lte', function() {
    return view('admin-lte');
});

// Route untuk pengguna
Route::get('/manajemen/pengguna', [App\Http\Controllers\PenggunaController::class, 'index']);
Route::get('/manajemen/pengguna/{id}', [App\Http\Controllers\PenggunaController::class, 'show']);
Route::post('/manajemen/pengguna/{id}', [App\Http\Controllers\PenggunaController::class, 'saveById']);

// Route untuk pelanggan
Route::get('/manajemen/pelanggan', [App\Http\Controllers\PelangganController::class, 'index']);
Route::get('/manajemen/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'show']);
Route::post('/manajemen/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'saveById']);


// Route untuk produk
Route::get('/manajemen/produk', [App\Http\Controllers\ProdukController::class, 'index']);
Route::get('/manajemen/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'show']);
Route::post('/manajemen/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'storeEdit']);
Route::get('/manajemen/produk/baru', [App\Http\Controllers\ProdukController::class, 'create']);
Route::post('/manajemen/produk/baru', [App\Http\Controllers\ProdukController::class, 'store']);


// Route untuk pesanan
Route::get('/manajemen/pesanan', [App\Http\Controllers\PesananController::class, 'index']);
Route::get('/manajemen/pesanan/{id}', [App\Http\Controllers\PesananController::class, 'show']);
// Route::get('/manajemen/detail-pesanan', [App\Http\Controllers\DetailPesananController::class, 'index']);
// Route::get('/manajemen/detail-pelanggan', [App\Http\Controllers\DetailPelangganController::class, 'index']);


// Route untuk order pemesanan
Route::get('/pemesanan', [App\Http\Controllers\PesananController::class, 'orderPage']);
Route::post('/pemesanan', [App\Http\Controllers\PesananController::class, 'storeOrder']);


// Route untuk storefront
Route::get('/', [App\Http\Controllers\StorefrontController::class, 'index']);

// Route untuk checkout
Route::get('/form-pesanan/{produkId}',  [App\Http\Controllers\CheckoutController::class, 'formPesanan']);
Route::post('/form-pesanan/{produkId}',  [App\Http\Controllers\CheckoutController::class, 'submitPesanan']);