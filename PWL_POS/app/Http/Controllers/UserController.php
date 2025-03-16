<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    // public function index(){
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'manager 3',
        //     'password' => Hash::make('12345')
        // ];

        // UserModel::create($data);

        // $user = UserModel::find(1);

        // $user = UserModel::where('level_id', 1)->first();

        // $user = UserModel::firstwhere('level_id', 1);

        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //     abort(404);
        // });

        // $user = UserModel::findOrFail(1);

        // $user = UserModel::where('username', 'manager9')->firstOrFail();

        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
        // return view('user', ['data' => $user]);

        // $jumlahPengguna = UserModel::count();
        // return view('user', ['jumlahPengguna' => $jumlahPengguna]);

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user = UserModel::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager55',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]);

        //     $user->username = 'manager56';
            
        //     $user->isDirty();
        //     $user->isDirty('username');
        //     $user->isDirty('nama');
        //     $user->isDirty(['nama', 'username']);

        //     $user->isClean();
        //     $user->isClean('username');
        //     $user->isClean('nama');
        //     $user->isClean(['nama', 'username']);

        //     $user->save();

        //     $user->isDirty();
        //     $user->isClean();
        //     dd($user->isDirty());

        // $user = UserModel::create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]);

        //     $user->username = 'manager12';

        //     $user->save();
            
        //     $user->wasChanged();
        //     $user->wasChanged('username');
        //     $user->wasChanged(['username', 'level_id']);
        //     $user->wasChanged('nama');
        //     dd($user->wasChanged(['nama', 'username']));

        // $user = UserModel::all();

        // return view('user', ['data' => $user]);
    //     $user = UserModel::with('level')->get();
    //     return view('user', ['data' => $user]);

    // }

    // public function tambah() {
    //     return view('user_tambah');
    // }

    // public function tambah_simpan(Request $request) 
    // {
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make('$request->password'),
    //         'level_id' => $request->level_id,
    //     ]);
    //     return redirect('/user');
    // }

    // public function ubah($id) {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan($id, Request $request)
    // {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make('$request->password');
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }

    // public function hapus($id) {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

    public function index(UserDataTable $dataTable) 
    {
        return $dataTable->render('users.index');
    }

    public function create() 
    {
        return view('users.create');
    }

    public function store(Request $request) 
    {
        // Validasi input
        $request->validate([
            'level_id' => 'required|integer',
            'username' => 'required|string|max:50',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        // Simpan data user
        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data user berdasarkan ID
        $user = UserModel::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'level_id' => 'required|integer',
            'username' => 'required|string|max:50',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        // Ambil data user
        $user = UserModel::findOrFail($id);

        // Update data user
        $user->update([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User berhasil dihapus.');
    }
    
}