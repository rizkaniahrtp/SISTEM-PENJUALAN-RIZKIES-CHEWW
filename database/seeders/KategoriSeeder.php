<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori'=> 'cookies',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_kategori'=> 'donat',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'nama_kategori'=> 'minuman',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
            [
                'nama_kategori'=> 'croissant',
                'created_at'=> now(),
                'updated_at'=> now()
            ],
        ];

        Kategori::insert($kategori);
    }
}
