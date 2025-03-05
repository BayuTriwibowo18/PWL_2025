<!DOCTYPE html>{{--Deklarasi dokumen HTML5.--}}
<html>// {{--Elemen root untuk halaman HTML.--}}
<head>// {{--Bagian untuk metadata dokumen.--}}
    <title>Add Item</title>{{--Menentukan judul halaman yang akan ditampilkan di tab browser--}}
</head>
<body>{{--Bagian utama halaman HTML yang berisi konten--}}
    <h1>Add Item</h1>{{--Heading utama untuk halaman dengan teks "Add Item". --}}
    <form action="{{ route('items.store') }}" method="POST">{{--<form>: Elemen untuk membuat formulir HTML.ction="{{ route('items.store') }}": URL tujuan di mana data formulir akan dikirim. --}}
        @csrf{{--Blade directive dari Laravel untuk menyisipkan token CSRF (Cross-Site Request Forgery). --}}
        <label for="name">Name:</label>{{--Label untuk input dengan atribut name="name".--}}
        <input type="text" name="name" required>{{--Elemen input tipe teks untuk memasukkan nama item.--}}
        <br>
        <label for="description">Description:</label>{{--Label untuk elemen textarea dengan atribut name="description".--}}
        <textarea name="description" required></textarea>{{--Area teks untuk memasukkan deskripsi item. --}}
        <br>
        <button type="submit">Add Item</button>{{--Elemen untuk membuat tombol.--}}
    </form>
    <a href="{{ route('items.index') }}">Back to List</a>{{--URL tujuan untuk kembali ke daftar item. Dalam Laravel, route('items.index') akan menghasilkan URL untuk rute items.index.--}}
</body>
</html>