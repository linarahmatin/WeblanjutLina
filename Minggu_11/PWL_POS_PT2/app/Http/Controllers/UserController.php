<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\LevelModel;
use App\Models\UserModel as ModelsUserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    //
    // public function index()
    // {
        //----------------------------JS 3 ------------------------------
        //     $data = [
        //         'username' => 'customer-1',
        //         'nama' => 'Pelanggan',
        //         'Password' => Hash::make('12345'),
        //         'level_id' => 4
        //     ];
        //    UserModel::insert($data);// tambahkan ke tabel m_user

        //     //mencoba akses model UserModel
        //     $users = UserModel::all(); // ambil semua data dari tabel m_user
        //     return view('user', ['data' => $users]);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user

        // //coba akses model UserModel
        // $users = UserModel::all(); //ambil semua data dari tabel m_user
        // return view('user', ['data' => $users]);

        //----------------------------JS 4 ------------------------------
        //Praktikum 1 - $fillable
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        //$user = UserModel::find(1);
        // return view('user', ['data' => $user]);

        //$user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        //$user = UserModel::firstWhere('level_id', 1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        // $user = UserModel::findOr(20, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        //PRAKTIKUM 2.2
        //$user = UserModel::findOrFail(1);
        // return view('user', ['data' => $user]);

        //$user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view('user', ['data' => $user]);

        //PRAKTIKUM 2.3
        // $user = UserModel::where('level_id', 2)->count();
        // //dd($user);
        // return view('user', ['data' => $user]);

        

        //praktikum 2.4 retreiving or creating models
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager'
                
        //     ]
        // );

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager dua dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager'
                
        //     ]
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager tiga tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager tiga tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user->save();

        //return view('user', ['data' => $user]);

        
//-----------praktikum 2.5 attribute changes
        // $user = UserModel::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager55',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user->username = 'manager56';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty('nama', 'username'); //true

        // $user->isClean(); //false
        // $user->isClean('username'); //false
        // $user->isClean('nama'); //true
        // $user->isClean('nama', 'username'); //false

        // $user->save();

        // $user->isDirty();//false
        // $user->isClean();//true
        // dd($user->isDirty());
        
        // $user = UserModel::create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user->username = 'manager12';
        // $user->save();

        // $user->wasChanged();//true
        // $user->wasChanged('username'); //false
        // $user->wasChanged('username', 'level_id'); //true
        // $user->wasChanged('nama'); //false
        // dd($user->wasChanged(['nama','username']));//true

        //praktikum 2.6
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        //praktikum 2.7
    //     $user = UserModel::with('level')->get();
    //     //dd($user);
    //     return view('user', ['data' => $user]);
    // }

    //praktikum 2.6
    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request){
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect('/user');
    }

    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }

    // jobsheet 5 pt 2

    //menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        $level = LevelModel::all(); // ambil data level untuk filter level

        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'level'      => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // // Ambil data user dalam bentuk JSON untuk DataTables
    // public function list(Request $request)
    // {
    //     $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
    //         ->with('level');

    //     // Filter data user berdasarkan level_id
    //     if ($request->level_id) {
    //         $users->where('level_id', $request->level_id);
    //     }

    //     return DataTables::of($users)
    //         ->addIndexColumn() // Menambahkan kolom index / nomor urut (default: DT_RowIndex)
    //         ->addColumn('aksi', function ($user) { // Menambahkan kolom aksi
    //             $btn  = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
    //             $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
    //             $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
    //                 . csrf_field() . method_field('DELETE') .
    //                 '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>
    //             </form>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi mengandung HTML
    //         ->make(true);
    // }

    // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list'  => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'level'      => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            // nama harus diisi, berupa string, dan maksimal 100 karakter
            'nama' => 'required|string|max:100', 
            // password harus diisi dan minimal 5 karakter
            'password' => 'required|min:5',
            // level_id harus diisi dan berupa angka
            'level_id' => 'required|integer'  
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list'  => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'user'       => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list'  => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter,
            // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5', // password bisa diisi (minimal 5 karakter) dan bisa tidak diisi
            'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    // Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        
        if (!$check) { // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id); // Hapus data user

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // jobsheet 6
    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('user.create_ajax')->with('level', $level);
    }

    public function store_ajax(Request $request)
    {
        // Cek apakah request berupa AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama' => 'required|string|max:100',
                'password' => 'required|min:6'
            ];

            // use Illuminate\Support\Facades\Validator
            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status'  => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // pesan error validasi
                ]);
            }

            UserModel::create($request->all());

            return response()->json([
                'status'  => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    // Ambil data user dalam bentuk JSON untuk DataTables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        // Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // Menambahkan kolom index / nomor urut
            ->addColumn('aksi', function ($user) {
                $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // Menandai bahwa kolom 'aksi' berisi HTML
            ->make(true);
    }

    public function edit_ajax(string $id) {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('user.edit_ajax', ['user' => $user,'level'=> $level]);
    }

    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request berasal dari AJAX atau menginginkan JSON response
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id'  => 'required|integer',
                'username'  => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama'      => 'required|max:100',
                'password'  => 'nullable|min:6|max:20'
            ];
    
            // Validasi input
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'status'   => false, // Respon JSON, true: berhasil, false: gagal
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors() // Menampilkan field yang error
                ]);
            }
    
            // Cek apakah user dengan ID yang diberikan ada dalam database
            $user = UserModel::find($id);
    
            if ($user) {
                // Jika password tidak diisi, hapus dari request agar tidak diupdate
                if (!$request->filled('password')) {
                    $request->request->remove('password');
                }
    
                // Update data user
                $user->update($request->all());
    
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diperbarui'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
    
        return redirect('/');
    }

    public function confirm_ajax(string $id){
        $user = UserModel::find($id);

        return view('user.confirm_ajax', ['user' =>$user]);
    }

    public function delete_ajax(Request $request, $id)
    {
        //cek apakah req dari ajax
        if($request->ajax() || $request->wantsJson()){
            $user = UserModel::find($id);
            if($user){
                $user->delete();
                return response()->json([
                    'status'=> true,
                    'message'=> 'Data berhasil dihapus'
                ]);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=> 'Data tidak ditemuka'
                ]);
            }
        } 
        return redirect('/');   
    }

    public function show_ajax(string $id)
    {
        $user = UserModel::find($id);
        return view('user.show_ajax', ['user' => $user]);
    }

    // tugas jobsheet 8
    public function import()
    {
        return view('user.import');
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_user' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_user'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if (count($data) > 1) { // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if ($baris > 1) { // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'level_id' => $value['A'],
                            'username' => $value['B'],
                            'nama' => $value['C'],
                            'password' =>  Hash::make($value['D']),
                            'created_at' => now(),
                        ];
                    }
                }
                if (count($insert) > 0) {
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    UserModel::insertOrIgnore($insert);
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }

    public function export_excel()
    {
        // ambil data user yang akan di export
        $user = UserModel::select('user_id', 'level_id', 'username', 'nama')
            ->orderBy('user_id')
            ->with('level')
            ->get();

        // load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Id Pengguna');
        $sheet->setCellValue('C1', 'Username');
        $sheet->setCellValue('D1', 'Nama');
        $sheet->setCellValue('E1', 'Level Pengguna');

        $sheet->getStyle('A1:E1')->getFont()->setBold(true); // bold header

        $no = 1; // nomor data dimulai dari 1
        $baris = 2; // baris data dimulai dari baris ke 2
        foreach ($user as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->user_id);
            $sheet->setCellValue('C' . $baris, $value->username);
            $sheet->setCellValue('D' . $baris, $value->nama);
            $sheet->setCellValue('E' . $baris, $value->level->level_nama); // ambil nama kategori
            $baris++;
            $no++;
        }

        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); // set auto size untuk kolom
        }

        $sheet->setTitle('Data User'); // set title sheet

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data User_' . date('Y-m-d H:i:s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf()
    {
        $user = UserModel::select('user_id', 'level_id', 'username', 'nama')
        ->orderBy('user_id')
        ->with('level')
        ->get();
        $pdf = Pdf::loadView('user.export_pdf', ['user' => $user]);
        $pdf->setPaper('a4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render(); // Render the PDF as HTML - uncomment if you want to see the HTML output

        return $pdf->stream('Data User' . date('Y-m-d H:i:s') . '.pdf');
    }
}