<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PegawaiController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\PeminjamanController;


Route::get('/login', [LoginController::class, 'index'])->middleware('ceklogin');
Route::post('/login', [LoginController::class, 'check'])->middleware('ceklogin');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('ceklogin');
Route::get('/', [DashboardController::class, 'index'])->middleware('ceklogin');
Route::get('/pegawai', [PegawaiController::class, 'index'])->middleware(['ceklogin', 'cekmasuk'])->name('pegawai.pegawai');
Route::get('/departemen', [DepartemenController::class, 'index'])->middleware(['ceklogin', 'cekmasuk'])->name('departemen.departemen');
Route::get('/kategori', [KategoriController::class, 'index'])->middleware(['ceklogin', 'cekmasuk'])->name('kategori.kategori');
Route::get('/aset', [AsetController::class, 'index'])->middleware(['ceklogin', 'cekmasuk'])->name('aset.aset');
Route::get('/lokasi', [LokasiController::class, 'index'])->middleware(['ceklogin', 'cekmasuk'])->name('lokasi.lokasi');
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware(['ceklogin'])->name('peminjaman/index');

Route::get('/pegawai/tambah', [PegawaiController::class, 'tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/pegawai/tambah', [PegawaiController::class, 'post_tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/departemen/tambah', [DepartemenController::class, 'tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/departemen/tambah', [DepartemenController::class, 'post_tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/kategori/tambah', [KategoriController::class, 'tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/kategori/tambah', [KategoriController::class, 'post_tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/lokasi/tambah', [LokasiController::class, 'tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/lokasi/tambah', [LokasiController::class, 'post_tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/aset/tambah', [AsetController::class, 'tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/aset/tambah', [AsetController::class, 'post_tambah'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/peminjaman/tambah', [PeminjamanController::class, 'post_tambah'])->middleware(['ceklogin']);

Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->middleware('ceklogin');
Route::post('/pegawai/edit/{id}', [PegawaiController::class, 'post_edit'])->middleware(['ceklogin']);
Route::get('/departemen/edit/{id}', [DepartemenController::class, 'edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/departemen/edit/{id}', [DepartemenController::class, 'post_edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/kategori/edit/{id}', [KategoriController::class, 'post_edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/lokasi/edit/{id}', [LokasiController::class, 'post_edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/aset/edit/{id}', [AsetController::class, 'edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::post('/aset/edit/{id}', [AsetController::class, 'post_edit'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->middleware(['ceklogin', 'cekmasuk'])->name('peminjaman.edit');
Route::post('/peminjaman/edit/{id}', [PeminjamanController::class, 'post_edit'])->middleware(['ceklogin', 'cekmasuk']);


Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'delete'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/departemen/delete/{id}', [DepartemenController::class, 'delete'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/lokasi/delete/{id}', [LokasiController::class, 'delete'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/aset/delete/{id}', [AsetController::class, 'delete'])->middleware(['ceklogin', 'cekmasuk']);

Route::get('/peminjaman/update', [PeminjamanController::class, 'update'])->middleware(['ceklogin', 'cekmasuk']);
Route::get('/peminjaman/data', [PeminjamanController::class, 'data'])->middleware(['ceklogin', 'cekmasuk'])->name('data-peminjaman');
Route::get('/peminjaman/data/cetak', [PeminjamanController::class, 'cetak'])->middleware(['ceklogin', 'cekmasuk']);

