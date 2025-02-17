<!DOCTYPE html> // Menentukan dokumen sebagai HTML5
<html>
<head>
    <title>Item List</title> //Menetapkan judul halaman
</head>
<body>
    <h1>Items</h1> //Menampilkan judul halaman
    @if(session('success')) //Menampilkan pesan sukses jika ada
        <p>{{ session('success') }}</p> //enampilkan pesan sukses yang tersimpan dalam session 
    @endif
    <a href="{{ route('items.create') }}">Add Item</a> // Link untuk menambahkan item baru
    <ul> //Membuat daftar item dalam format unordered list
        @foreach ($items as $item) //Melakukan iterasi melalui daftar item
            <li>
                {{ $item->name }} - //Menampilkan nama item
                <a href="{{ route('items.edit', $item) }}">Edit</a> //Link untuk mengedit item 
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> //Formulir untuk menghapus item 
                    @csrf // Menambahkan token CSRF untuk keamanan
                    @method('DELETE') //Menggunakan metode HTTP DELETE untuk menghapus item
                    <button type="submit">Delete</button> //Tombol untuk menghapus item
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
