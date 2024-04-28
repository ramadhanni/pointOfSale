<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLayanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_produk',
        'id_pembelian',
    ];

    // Relasi dengan tabel Users
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    // Relasi dengan tabel Layanan
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }

    // public function items()
    // {
    //     return $this->hasMany(Item::class);
    // }
}
