<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LandingPageController;

// Route::get('/', function () {
//     return view('landingpage.home');
// });



Route::get('/', [LandingPageController::class, 'index'])->name('index'); // Menampilkan halaman landing page
Route::get('/admin', [KatalogController::class, 'index'])->name('admin.index'); // Menampilkan halaman admin
///========Katalog
Route::post('/admin/store', [KatalogController::class, 'store'])->name('admin.store'); // Menyimpan buku baru
Route::put('/admin/update/{buku}', [KatalogController::class, 'update'])->name('admin.update'); // Memperbarui buku
Route::delete('/admin/destroy/{buku}', [KatalogController::class, 'destroy'])->name('admin.destroy'); // Menghapus buku
Route::get('/admin/{id}/edit', [KatalogController::class, 'edit'])->name('admin.edit');
//=========kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index'); // Menampilkan daftar kontak
Route::get('/kontak/create', [KontakController::class, 'create'])->name('kontak.create'); // Menampilkan form tambah kontak
Route::post('/kontak/store', [KontakController::class, 'store'])->name('kontak.store'); // Menyimpan data kontak baru
Route::get('/kontak/{kontak}/edit', [KontakController::class, 'edit'])->name('kontak.edit'); // Menampilkan form edit kontak
Route::put('/kontak/{kontak}', [KontakController::class, 'update'])->name('kontak.update'); // Mengupdate data kontak
