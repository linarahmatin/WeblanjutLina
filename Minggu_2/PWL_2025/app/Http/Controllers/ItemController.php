<?php

namespace App\Http\Controllers; // Menentukan namespace dari controller

use App\Models\Item; // Mengimpor model Item untuk digunakan dalam controller
use Illuminate\Http\Request;// Mengimpor Request untuk menangani input dari pengguna

// Mendeklarasikan kelas ItemController yang merupakan turunan dari Controller
class ItemController extends Controller
{
    public function index()  // Method untuk menampilkan semua item
    {
        $items = Item::all(); // Mengambil semua data dari tabel 'items'
        return view('items.index', compact('items')); // Mengirim data ke view 'items.index'
    }

    public function create() // Method untuk menampilkan form tambah item
    {
        return view('items.create'); // Mengembalikan tampilan form pembuatan item

    }

    public function store(Request $request) // Method untuk menyimpan data item baru ke database
    {
        $request->validate([ // Validasi input, memastikan 'name' dan 'description' wajib diisi
            'name' => 'required',
            'description' => 'required',
        ]);
         
        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
         Item::create($request->only(['name', 'description'])); // Menyimpan item baru ke database dengan hanya atribut yang diizinkan
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // Redirect ke halaman index dengan pesan sukses
    }

    public function show(Item $item) // Method untuk menampilkan detail item berdasarkan ID
    {
        return view('items.show', compact('item')); // Menampilkan halaman detail item
    
    }

    public function edit(Item $item)  // Method untuk menampilkan form edit item berdasarkan ID
    {
        return view('items.edit', compact('item')); // Mengembalikan tampilan form edit item
    }

    public function update(Request $request, Item $item) // Method untuk mengupdate data item di database
    {
        $request->validate([  // Validasi input, memastikan 'name' dan 'description' wajib diisi
            'name' => 'required',
            'description' => 'required',
        ]);
         
        //$item->update($request->all());
        //return redirect()->route('items.index');
        // Hanya masukkan atribut yang diizinkan
         $item->update($request->only(['name', 'description'])); // Memperbarui item dengan hanya atribut yang diizinkan
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Redirect ke halaman index dengan pesan sukses
    }

    public function destroy(Item $item) // Method untuk menghapus item dari database
    {
        
       // return redirect()->route('items.index');
       $item->delete();  // Menghapus item dari database
       return redirect()->route('items.index')->with('success', 'Item deleted successfully.');  // Redirect ke halaman index dengan pesan sukses
    }
}