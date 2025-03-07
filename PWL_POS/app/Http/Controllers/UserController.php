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
    


        $user = UserModel::findOr(20, ['username', 'nama'], function () {
            abort(404);
        });
        return view('user', [ 'data' => $user]);
    }
}