<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = 
        [
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'PT Jaya Abadi', 'supplier_telp' => '025-444-4321', 'supplier_alamat' => 'Jl. Dinoyo No. 12, Mojokerto'],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'CV Topcell', 'supplier_telp' => '039-454-7896', 'supplier_alamat' => 'Jl. Tembelang No. 04, Jombang'],
           
        ];

        DB::table('m_supplier')->insert($suppliers);
    }
}
