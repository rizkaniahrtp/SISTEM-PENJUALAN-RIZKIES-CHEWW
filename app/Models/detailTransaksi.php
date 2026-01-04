<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    protected $table = 'detail_transaksis';
    protected $guarded = [];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk() {
        return $this->belongsTo(Produk::class);
    }

}
