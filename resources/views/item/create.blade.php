<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title> //Menetapkan judul halaman 
</head>
<body>
    <h1>Add Item</h1> // Menampilkan heading utama
    <form action="{{ route('items.store') }}" method="POST"> //Form untuk menambahkan item baru
        @csrf //Token CSRF untuk keamanan agar request hanya bisa dikirim dari aplikasi ini
        // Label dan input untuk nama item
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        //Label dan textarea untuk deskripsi item
        <label for="description">Description:</label>
        <textarea name="description" required></textarea> //Textarea untuk deskripsi
        <br>
        <button type="submit">Add Item</button> //Tombol untuk mengirim data ke server
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> // Link untuk kembali ke daftar Item 
</body>
</html>