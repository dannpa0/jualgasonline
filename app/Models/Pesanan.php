<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Pelanggan;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    
    use HasFactory;

    protected $fillable = [
        'id_pelanggan', 
        'id_produk',
        'jumlah_produk',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'id_produk');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id', 'id_pelanggan');
    }
}
