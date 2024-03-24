<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'nama',
        // tambahkan kolom lain yang sesuai dengan kebutuhan aplikasi Anda
    ];

    // Jika Anda memiliki relasi dengan model Buku, Anda bisa definisikan relasinya di sini
    // public function bukus()
    // {
    //     return $this->hasMany(Buku::class);
    // }

    // Method ini digunakan untuk mendapatkan daftar kategori dalam bentuk array key-value
    public static function getOptions()
    {
        return static::pluck('nama', 'id')->toArray();
    }
}
