<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahans';
    protected $fillable = [
        'supplier_id',
        'nama_bahan',
        'stok',
        'satuan',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
