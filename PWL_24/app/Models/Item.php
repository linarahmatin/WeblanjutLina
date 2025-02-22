<?php

namespace App\Models; // // Menentukan namespace untuk model ini agar sesuai dengan struktur Laravel

use Illuminate\Database\Eloquent\Factories\HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan factory
use Illuminate\Database\Eloquent\Model; // Menggunakan class Model sebagai dasar dari model ini

class Item extends Model // Mendefinisikan kelas Item yang merupakan turunan dari Model Laravel
{
    use HasFactory; // Menggunakan trait HasFactory untuk memungkinkan pembuatan data dummy menggunakan factory

    protected $fillable = [ // Menentukan atribut yang boleh diisi secara massal (mass assignment)
        'name', // Nama item
        'description', // Deskripsi item
    ];
}