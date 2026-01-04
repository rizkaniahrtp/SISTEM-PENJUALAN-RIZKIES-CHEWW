<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonis';
    protected $fillable = [
        'user_id',
        'produk_id',
        'pesan',
        'gambar',
        'rating',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
