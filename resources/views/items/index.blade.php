<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>  <!-- //Menetapkan judul halaman -->
</head>
<body>
    <h1>Items</h1> <!-- //Menampilkan heading utama -->
    @if(session('success')) <!-- //Menampilkan pesan sukses jika ada dalam session -->
        <p>{{ session('success') }}</p> <!-- //Menampilkan pesan sukses -->
        @endif
        <a href="{{ route('items.create') }}">Add Item</a> <!-- //Link untuk menambahkan item baru, mengarah ke halaman form tambah item -->
    <ul>
        @foreach ($items as $item) <!-- //Melakukan perulangan untuk menampilkan semua item dalam daftar -->
            <li>
                {{ $item->name }} - <!-- //Menampilkan nama item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!-- //Link untuk mengedit item, mengarah ke halaman edit -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;"> <!-- //Form untuk menghapus item -->
                    @csrf <!-- //Token CSRF untuk keamanan -->
                    @method('DELETE') <!-- //Metode HTTP DELETE untuk menghapus data -->
                    <button type="submit">Delete</button> <!-- //Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>