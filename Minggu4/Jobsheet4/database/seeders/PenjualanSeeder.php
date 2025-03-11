<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'penjualan_kode' => 'TRX001', 'user_id' => 1, 'pembeli' => 'Andi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 2, 'penjualan_kode' => 'TRX002', 'user_id' => 2, 'pembeli' => 'Budi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 3, 'penjualan_kode' => 'TRX003', 'user_id' => 3, 'pembeli' => 'Citra', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 4, 'penjualan_kode' => 'TRX004', 'user_id' => 1, 'pembeli' => 'Andi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 5, 'penjualan_kode' => 'TRX005', 'user_id' => 2, 'pembeli' => 'Budi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 6, 'penjualan_kode' => 'TRX006', 'user_id' => 3, 'pembeli' => 'Citra', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 7, 'penjualan_kode' => 'TRX007', 'user_id' => 1, 'pembeli' => 'Andi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 8, 'penjualan_kode' => 'TRX008', 'user_id' => 2, 'pembeli' => 'Budi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 9, 'penjualan_kode' => 'TRX009', 'user_id' => 3, 'pembeli' => 'Citra', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
            ['penjualan_id' => 10, 'penjualan_kode' => 'TRX010', 'user_id' => 1, 'pembeli' => 'Andi', 'penjualan_tanggal' => date('Y-m-d H:i:s')],
        ];
        
        DB::table('t_penjualan')->insert($data);
    }
}
