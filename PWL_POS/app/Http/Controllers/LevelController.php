<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;
use App\Models\LevelModel;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    //public function index() {
        //Langkah 5
        //DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        //return 'Insert data baru berhasil';

        //Langkah 6
        //$row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        //Langkah 7
        //$row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        //return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        //Langkah 8
        //$data = DB::select('select * from m_level');
        //return view('level', ['data' => $data]);
    //}

    public function index(LevelDataTable $dataTable) {
        return $dataTable->render('level.index');
    }

    public function create() {
        return view('level.create');
    }

    public function store(Request $request) {
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);
        return redirect('/level');
    }

    public function edit($id)
    {
         $level = LevelModel::findOrFail($id);
         return view('level.edit', compact('level'));
    }
 
    public function update(Request $request, $id) {
         $request->validate([
             'level_kode' => 'required|string|max:50',
             'level_nama' => 'required|string|max:100',
         ]);
 
         $level = LevelModel::findOrFail($id);
         $level->update([
             'level_kode' => $request->level_kode,
             'level_nama' => $request->level_nama,
         ]);
 
         return redirect('/level')->with('success', 'Level berhasil diperbarui!');
    }

    public function destroy($id) {
    $level = levelModel::findOrFail($id);
    $level->delete();

    return redirect('/level')->with('success', 'Barang berhasil dihapus!');
}
}