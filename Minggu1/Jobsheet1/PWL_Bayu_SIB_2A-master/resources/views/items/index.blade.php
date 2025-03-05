<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>{{-- Heading utama halaman dengan teks "Items". Ini menunjukkan bahwa halaman ini menampilkan daftar item.--}}
    @if(session('success')){{--Blade directive untuk memeriksa apakah ada pesan sukses dalam sesi.--}}
        <p>{{ session('success') }}</p>{{--Jika ada pesan sukses, maka akan ditampilkan dalam elemen paragraf <p>--}}
    @endif{{--Mengakhiri kondisi if.--}}
    <a href="{{ route('items.create') }}">Add Item</a>{{--URL tujuan untuk menambahkan item baru. Laravel akan menghasilkan URL untuk rute items.create.--}}
    <ul>{{-- Membuat daftar tidak berurutan (unordered list) untuk menampilkan item.--}}
        @foreach ($items as $item) {{--Blade directive untuk melakukan iterasi pada semua item dalam variabel $items, Variabel individu yang mewakili setiap item dalam iterasi.--}}
            <li>{{--Membuat elemen daftar untuk menampilkan setiap item.--}}
                {{ $item->name }} {{--Menampilkan nama item dari properti name pada objek $item.--}}
                <a href="{{ route('items.edit', $item) }}">Edit</a>{{--URL tujuan untuk mengedit item tertentu. Laravel akan menghasilkan URL untuk rute items.edit dengan parameter $item (misalnya /items/{id}/edit).
                Edit: Teks link untuk mengarahkan pengguna ke halaman edit.--}}
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">{{--Membuat formulir untuk menghapus item., URL tujuan untuk menghapus item tertentu. Laravel akan menghasilkan URL untuk rute items.destroy dengan parameter $item (misalnya /items/{id})., method="POST": Formulir secara default menggunakan metode POST, tetapi akan diubah menjadi DELETE menggunakan @method('DELETE'),tyle="display:inline;": Mengatur gaya agar formulir tetap berada di baris yang sama dengan elemen lain (seperti teks dan link edit)--}}
                    @csrf
                    @method('DELETE'){{--Blade directive untuk menentukan bahwa metode HTTP yang digunakan adalah DELETE,--}}
                    <button type="submit">Delete</button>{{--<button>: Membuat tombol untuk mengirim formulir.
                        type="submit": Menentukan bahwa tombol ini digunakan untuk mengirimkan data formulir ke server.
                        Delete: Teks tombol yang menunjukkan fungsinya untuk menghapus item.--}}
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>