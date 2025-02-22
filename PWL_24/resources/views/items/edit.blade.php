<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title> <!-- //Menetapkan judul halaman -->
</head>
<body>
    <h1>Edit Item</h1> //Menampilkan heading utama
    <form action="{{ route('items.update', $item) }}" method="POST">  <!-- //Form untuk mengedit item yang sudah ada -->
        @csrf <!-- //Token CSRF untuk mencegah serangan CSRF -->
        @method('PUT') <!-- //Menggunakan metode HTTP PUT untuk memperbarui data di database -->
        
        <!-- //Label dan input untuk nama item -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required> <!-- //Input field untuk nama item, diisi dengan data lama  -->
        <br>

        <!-- //Label dan textarea untuk deskripsi item  -->
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea> <!-- //Textarea untuk deskripsi, diisi dengan data lama -->
        <br>

        <!-- //Tombol untuk mengirim data perubahan -->
        <button type="submit">Update Item</button>
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> <!-- //Link untuk kembali ke daftar item -->
</body>
</html>