<?php

namespace Database\Seeders;

use App\Models\bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahan = [
            [
                'supplier_id' => 1,
                'nama_bahan' => 'Gula Pasir',
                'stok' => 25,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 1,
                'nama_bahan' => 'Telur Ayam',
                'stok' => 30,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 1,
                'nama_bahan' => 'Mentega',
                'stok' => 10,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 2,
                'nama_bahan' => 'Tepung Terigu Protein Tinggi',
                'stok' => 16,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 2,
                'nama_bahan' => 'Tepung Terigu Protein Sedang',
                'stok' => 20,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 2,
                'nama_bahan' => 'Tepung Terigu Protein Rendah',
                'stok' => 10,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 3,
                'nama_bahan' => 'Cokelat Bubuk',
                'stok' => 8.50,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 3,
                'nama_bahan' => 'Dark Chocolate Compound',
                'stok' => 12,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 3,
                'nama_bahan' => 'Choco Chips',
                'stok' => 5,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 4,
                'nama_bahan' => 'Susu Cair',
                'stok' => 40,
                'satuan' => 'liter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 4,
                'nama_bahan' => 'Susu Bubuk',
                'stok' => 18,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 4,
                'nama_bahan' => 'Keju Parut',
                'stok' => 8,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 5,
                'nama_bahan' => 'Kopi Bubuk',
                'stok' => 10,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 5,
                'nama_bahan' => 'Teh Celup',
                'stok' => 130,
                'satuan' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 5,
                'nama_bahan' => 'Sirup Vanilla',
                'stok' => 8,
                'satuan' => 'liter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 6,
                'nama_bahan' => 'Matcha Powder',
                'stok' => 4,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 6,
                'nama_bahan' => 'Green Tea Powder',
                'stok' => 4,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_id' => 6,
                'nama_bahan' => 'Bubuk Taro',
                'stok' => 3,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        bahan::insert($bahan);
    }
}
