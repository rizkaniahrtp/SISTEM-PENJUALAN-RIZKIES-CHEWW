<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'promosis';

    protected $fillable = [
        'kode_promo',
        'nama_promosi',
        'diskon',
        'min_belanja',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
