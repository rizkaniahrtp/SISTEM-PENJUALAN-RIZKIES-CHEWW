<?php

namespace Database\Seeders;

use App\Models\supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier =  [
            [
                'nama_supplier' => 'Toko Sumber Pangan Nusantara',
                'no_hp' => '0215550101',
                'alamat' => 'Jakarta Pusat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Tepung Sejahtera Abadi',
                'no_hp' => '0247601122',
                'alamat' => 'Semarang, Jawa Tengah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Cokelat Manis Lestari',
                'no_hp' => '0228603344',
                'alamat' => 'Bandung, Jawa Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Dairy Prima Indonesia',
                'no_hp' => '0218899776',
                'alamat' => 'Jakarta Timur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Minuman Rasa Nusantara',
                'no_hp' => '0267812345',
                'alamat' => 'Karawang, Jawa Barat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Toko Teh Matcha Nusantara',
                'no_hp' => '0217654321',
                'alamat' => 'Jakarta Selatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        supplier::insert($supplier);
    }
}
