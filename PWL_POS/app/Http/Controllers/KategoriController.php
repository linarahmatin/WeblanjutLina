<?php

namespace App\Http\Controllers;
use App\DataTables\KategoriDataTable;

// use Illuminate\support\facades\DB;

class KategoriController extends Controller
{
//     public function index()
// {
    // $data = [
    //     'kategori_kode' => 'SNK',
    //     'kategori_nama' => 'Snack/Makanan Ringan',
    //     'created_at' => now()
    // ];

    // DB::table('m_kategori')->insert($data);
    // return 'Insert data baru berhasil';

    // langkah 5
    // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
    // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

    // langkah 7
    // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
    // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

    // Langkah 8
    // $data = DB::select('select * from m_level');
    //     return view('level', ['data' => $data]);

    // no 10 js 5
    public function index(KategoriDataTable $dataTable)
{
    return $dataTable->render('kategori.index');
    }
}

