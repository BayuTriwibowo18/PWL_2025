<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'ELK001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 5500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'ELK002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'PAK001', 'barang_nama' => 'Kaos', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'PAK002', 'barang_nama' => 'Jaket', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'MAK001', 'barang_nama' => 'Roti', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'MAK002', 'barang_nama' => 'Kue', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'MIN001', 'barang_nama' => 'Teh Botol', 'harga_beli' => 5000, 'harga_jual' => 7000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'MIN002', 'barang_nama' => 'Kopi', 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'PRR001', 'barang_nama' => 'Panci', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'PRR002', 'barang_nama' => 'Sapu', 'harga_beli' => 25000, 'harga_jual' => 30000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
