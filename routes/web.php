<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminStokController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminTransaksiDetailController;

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

Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest');



Route::prefix('/admin/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegsiter']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::resource('/user', AdminUserController::class);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::prefix('/laporan')->middleware(['auth', 'can:manager'])->group(function () {
        Route::get('/transaksi', [AdminLaporanController::class, 'transaksi']);
        Route::get('/transaksi/cetak', [AdminLaporanController::class, 'transaksiCetak']);

        Route::get('/produk', [AdminLaporanController::class, 'produk']);
        Route::get('/produk/cetak', [AdminLaporanController::class, 'produkCetak']);



        Route::get('/stok', [AdminLaporanController::class, 'stok']);
        Route::get('/stok/cetak', [AdminLaporanController::class, 'stokCetak']);
    });

    Route::prefix('/transaksi')->middleware(['auth', 'can:kasir'])->group(function () {
        Route::get('/detail/delete', [AdminTransaksiDetailController::class, 'delete']);
        Route::post('/detail/add', [AdminTransaksiDetailController::class, 'add']);
        Route::get('/detail/change-status', [AdminTransaksiDetailController::class, 'changeStatus']);

        Route::get('/make-transaction', [AdminTransaksiController::class, 'makeTransaction']);
        Route::get('/delete/{id}', [AdminTransaksiController::class, 'destroy']);
        Route::get('/cari-produk', [AdminTransaksiController::class, 'cariProduk']);
    });
    Route::resource('/transaksi', AdminTransaksiController::class);

    Route::resource('/stok', AdminStokController::class);

    Route::get('/produk/delete/{id}', [AdminProdukController::class, 'destroy']);
    Route::resource('/produk', AdminProdukController::class);


    Route::get('/kategori/delete/{id}', [AdminKategoriController::class, 'destroy']);
    Route::resource('/kategori', AdminKategoriController::class);
});

Route::get('check-unique-code', [ProductController::class], 'checkUniqueCode')->name('product.checkUniqueCode');

Route::prefix('/home')->group(function () {
    // Route::resource('/mitra', HomeMitraController::class);;
    // Route::resource('/layanan', HomeLayananController::class);;
});

Route::get('dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug']);
