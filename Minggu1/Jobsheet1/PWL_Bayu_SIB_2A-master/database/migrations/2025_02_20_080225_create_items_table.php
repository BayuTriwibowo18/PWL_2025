<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // fungsi(up), digunakan untuk  mendefinisikan operasi yang akan dilakukan migratian saat dijalan
    {
        Schema::create('items', function (Blueprint $table) { // Schema::create('items', ...): digunakan membuat tabel baru, function (Blueprint $table): Fungsi anonim yang menerima parameter $table untuk mendefinisikan struktur tabel menggunakan kelas Blueprint.
            $table->id(); // menambahkan kolod (id) sebagai primary key pada tabel
            $table->string('name');// menambahkan kolom name dengan tipe data string 
            $table->text('description');//  Menambahkan kolom description dengan tipe data teks 
            $table->timestamps();//menambahkan 2 kolom bawaan dari laravel yaitu, created_at: Berisi waktu saat record dibuat. updated_at: Berisi waktu saat record diperbarui.
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
