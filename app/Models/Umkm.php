<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{

    public function Produk() {
        return $this->hasMany(Produk::class);
    }

    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'alamat',
        'telepon',
        'status',
    ];
}
