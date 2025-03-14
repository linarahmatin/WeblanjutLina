<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
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
    public function create()
{
    return view('kategori.create');
}

    public function store(Request $request)
{
    KategoriModel::create([
        'kategori_kode' => $request->kodeKategori,
        'kategori_nama' => $request->namaKategori,
    ]);

    return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10',
            'kategori_nama' => 'required|string|max:100',
        ]);

        $kategori = KategoriModel::findOrFail($id);
        $kategori->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori');
    }
}


