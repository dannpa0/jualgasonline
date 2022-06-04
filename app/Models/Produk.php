<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    
    use HasFactory;

    protected $fillable = [
        'no_produk',
        'nama',
        'deskripsi',
        'jenis',
        'harga',
        'kuantitas',
        'created_at',
        'updated_at'
    ]; 
}
