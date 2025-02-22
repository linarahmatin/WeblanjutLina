<?php
// mengimpor class yang diperlukan untuk migration
use Illuminate\Database\Migrations\Migration;// Class dasar untuk membuat migration
use Illuminate\Database\Schema\Blueprint; // Class untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Facade untuk manipulasi schema database

// Mengembalikan instance dari class anonim yang mewarisi Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Method untuk menjalankan migration (membuat tabel)
    {
         // Membuat tabel 'items' dengan struktur yang didefinisikan dalam callback function
        Schema::create('items', function (Blueprint $table) {
            $table->id();// Membuat kolom 'id' sebagai primary key dengan tipe BIGINT (auto-increment)
            $table->string('name');// Membuat kolom 'name' dengan tipe VARCHAR (panjang default 255 karakter)
            $table->text('description'); // Membuat kolom 'description' dengan tipe TEXT
            $table->timestamps();// Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void  // Method untuk membatalkan migration (menghapus tabel)
    {
        Schema::dropIfExists('items');// Menghapus tabel 'items' jika tabel tersebut ada
    }
};
