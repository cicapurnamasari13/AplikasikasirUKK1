<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegistarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registar web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('_template_back.layout');
});
//LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth',[LoginController::class,'auth'])->name('auth');
//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//registar
Route::get('/registar', [RegistarController::class, 'index'])->name('registar');
Route::post('/registar', [RegistarController::class, 'store'])->name('registar');
//PELANGGAN
Route::resource('pelanggan', PelangganController::class);
Route::get('export_pdf_pelanggan',[PelangganController::class, 'export_pdf'])->name('export_pdf_pelanggan');
//PRODUK
Route::resource('produk', ProdukController::class);
Route::get('export_pdf_produk',[ProdukController::class, 'export_pdf'])->name('export_pdf_produk');
//PENJUALAN
Route::resource('penjualan',PenjualanController::class);
Route::get('export_pdf_penjualan',[PenjualanController::class, 'export_pdf'])->name('export_pdf_penjualan');
//DETAIL PENJUALAN
Route::resource('detail_penjualan',DetailPenjualanController::class);



