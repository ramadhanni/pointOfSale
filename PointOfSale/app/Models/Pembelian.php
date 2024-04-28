<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = ['product_id', 'quantity', 'jumlah', 'produk_ids'];

    public function product()
    {
        return $this->belongsTo(Produk::class, 'product_id');
    }
}
