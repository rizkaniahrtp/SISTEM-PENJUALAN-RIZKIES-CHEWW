<?php

namespace Database\Seeders;

use App\Models\promosi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromosiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promosi = [
        [
            'kode_promo' => 'AWALTAHUN26',
            'nama_promosi'=> 'Diskon Awal Tahun',
            'diskon'=> '2000',
            'min_belanja'=> '25000',
            'tanggal_mulai' => '2026-01-01',
            'tanggal_selesai' => '2026-01-15',
            'status'=> 'aktif',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'kode_promo' => 'MERDEKA17',
            'nama_promo'=> 'Diskon Kemerdekaan',
            'diskon'=> '7000',
            'min_belanja'=> '71000',
            'tanggal_mulai' => '2026-08-15',
            'tanggal_selesai' => '2026-08-19',
            'status'=> 'Nonaktif',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'kode_promo'=> 'NATAL25',
            'nama_promo'=> 'Diskon Hari Natal',
            'diskon'=> '3000',
            'min_belanja'=> '30000',
            'tanggal_mulai' => '2025-12-24',
            'tanggal_selesai' => '2025-12-27',
            'status'=> 'Aktif',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'kode_promo'=> 'LEBARAN26',
            'nama_promo'=> 'Diskon Hari Raya',
            'diskon'=> '5000',
            'min_belanja'=> '50000',
            'tanggal_mulai' => '2025-03-25',
            'tanggal_selesai' => '2025-03-30',
            'status'=> 'Nonaktif',
            'created_at' => now(),
            'updated_at' => now()
        ],
        
    ];    
    
    Promosi::insert($promosi);
    }
}
