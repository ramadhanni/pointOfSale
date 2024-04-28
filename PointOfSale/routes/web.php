<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/coba', function () {
    return view('test');
});
Route::get('/coba', [ProdukController::class, 'index'])->name('test');


// Route::resource('test', ProdukController::class);
Route::post('/test', [ProdukController::class, 'store'])->name('test.store');

// Route::get('/dashboard/gallery', [galeriController::class, 'index'])->name('test');
// Route::get('/gal/coba', [galeriController::class, 'coba'])->name('gal.coba');
// Route::get('/galeri/{kategori}', [galeriController::class, 'showByCategory'])->name('galeri.showByCategory');
// Route::post('/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
// Route::delete('/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::post('/simpan-pesanan', [PembelianController::class, 'simpanPesanan'])->name('simpan-pesanan');
Route::post('/simpan-bill', [PembelianController::class, 'simpanPembelian'])->name('simpan-bill');
