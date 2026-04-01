<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Umkm;

class Produk extends Model
{
    public function umkm() {
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
