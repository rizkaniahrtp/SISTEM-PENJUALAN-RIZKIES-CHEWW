<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Supplier;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = [
        'kategori_id',
        'supplier_id',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'foto_produk',
        'status',
    ];

    protected static function booted()
    {
        static::saving(function ($produk) {
            if ($produk->stok <= 0) {
                $produk->status = 'kosong';
            } 
            else {
                $produk->status = 'tersedia';
            }
        });
    }


    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id');
    }

    public function promosi()
    {
        return $this->belongsToMany(Promosi::class, 'promo_produk', 'produk_id', 'promo_id');
    }

    public function testimoni(){
        return $this->hasMany(testimoni::class);
    }
}
