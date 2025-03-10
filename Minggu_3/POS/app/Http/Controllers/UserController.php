<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'pelanggan pertama',
                // 'username' => 'customer-1',
                // 'nama' => 'Pelanggan',
                // 'password' => Hash::make('12345'), // Perbaikan: tambahkan spasi setelah Hash::
                // 'level_id' => 5
            ];

            UserModel::where('username', 'customer-1')->update($data);
    
            // UserModel::insert($data); // tambahkan data ke tabel m_user
    


        $user = UserModel::all();
        return view('user', [ 'data' => $user]);
    }
}