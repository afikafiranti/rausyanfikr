<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('landingpage.home');
});



Route::get('/admin', [BukuController::class, 'index'])->name('admin.index'); // Menampilkan halaman admin
Route::post('/admin/store', [BukuController::class, 'store'])->name('admin.store'); // Menyimpan buku baru
Route::put('/admin/update/{buku}', [BukuController::class, 'update'])->name('admin.update'); // Memperbarui buku
Route::delete('/admin/destroy/{buku}', [BukuController::class, 'destroy'])->name('admin.destroy'); // Menghapus buku

Route::get('/admin/{id}/edit', [BukuController::class, 'edit'])->name('admin.edit');