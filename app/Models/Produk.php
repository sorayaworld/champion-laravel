<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    public function Umkm() {
        return $this->BelongsTo(Umkm::class);
    }

    protected $fillable = [
        'umkm_id',
        'nama',
        'kategori',
        'harga',
        'stok',
        'status',
    ];
}
