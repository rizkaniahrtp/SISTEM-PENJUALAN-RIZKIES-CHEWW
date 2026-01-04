<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $guarded = [];
    protected $casts = [
        'subtotal' => 'decimal:2',
        'potongan_harga' => 'decimal:2',
        'total_harga' => 'decimal:2',
    ];

    public function promosi(){
        return $this->belongsTo(Promosi::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }


}
