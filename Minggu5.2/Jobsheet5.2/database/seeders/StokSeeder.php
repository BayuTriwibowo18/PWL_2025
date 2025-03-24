<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           
                ['stok_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 30], // Laptop
                ['stok_id' => 2, 'barang_id' => 2, 'user_id' => 1, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 25], // Smartphone
                ['stok_id' => 3, 'barang_id' => 3, 'user_id' => 2, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 20], // Kaos
                ['stok_id' => 4, 'barang_id' => 4, 'user_id' => 2, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 15], // Jaket
                ['stok_id' => 5, 'barang_id' => 5, 'user_id' => 2, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 10], // Roti
                ['stok_id' => 6, 'barang_id' => 6, 'user_id' => 3, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 50], // Kue
                ['stok_id' => 7, 'barang_id' => 7, 'user_id' => 3, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 40], // Teh Botol
                ['stok_id' => 8, 'barang_id' => 8, 'user_id' => 3, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 35], // Kopi
                ['stok_id' => 9, 'barang_id' => 9, 'user_id' => 1, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 45], // Panci
                ['stok_id' => 10, 'barang_id' => 10, 'user_id' => 1, 'stok_tanggal' => date('Y-m-d H:i:s'), 'stok_jumlah' => 60], // Sapu
            ];
            

            
        //Menggunakan date('Y-m-d H:i:s') untuk mendapatkan timestamp tanpa library tambahan.

        DB::table('t_stok')->insert($data);
    }
}
