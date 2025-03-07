<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        // jobsheet4 praktikum 1
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        // $data = [
        //     'nama' => 'pelanggan pertama',
        //         // 'username' => 'customer-1',
        //         // 'nama' => 'Pelanggan',
        //         // 'password' => Hash::make('12345'), // Perbaikan: tambahkan spasi setelah Hash::
        //         // 'level_id' => 5
        //     ];

        //     UserModel::where('username', 'customer-1')->update($data);
    
        //     // UserModel::insert($data); // tambahkan data ke tabel m_user
    


        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);

        // praktikum 2.4
        // $user = UserModel :: firstOrNew (
        //     [
        //         'username' => 'managerr33' ,
        //         'nama' => 'manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();

        // // $jumlahPengguna = UserModel::count();

        // // return view('user', ['jumlahPengguna' => $jumlahPengguna]);
        // return view('user', [ 'data' => $user]);
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);
        
        $user->username = 'manager12';
        
        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true
        
        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false
        
        // $user->save();
        
        // $user->isDirty(); // false
        // $user->isClean(); // true
        
    //     dd($user->isDirty());
    $user->save();

    $user->wasChanged();
    $user->wasChanged('username');
    $user->wasChanged(['username', 'level_id']);
    $user->wasChanged('nama');
    dd($user->wasChanged(['nama', 'username']));

    }
}