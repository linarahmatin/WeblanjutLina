<?php

use Illuminate\Support\Facades\Route; // Mengimpor facade Route untuk mendefinisikan rute dalam aplikasi Laravel
use App\Http\Controllers\ItemController; // Mengimpor ItemController untuk digunakan dalam pengaturan rute
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

Route::get('/', function () { // Rute untuk halaman utama ('/') yang menampilkan tampilan 'welcome'
    return view('welcome'); // Mengembalikan view 'welcome.blade.php'
});

Route::resource('items', ItemController::class); // Rute resource untuk 'items' yang secara otomatis mengatur rute CRUD 