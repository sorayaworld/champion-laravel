<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Umkm extends Model
{

    public function produk() {
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
