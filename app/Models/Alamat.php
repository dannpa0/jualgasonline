<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{

    protected $table = 'alamat';

    use HasFactory;
    
    protected $fillable = [
        'id',
        'kecamatan',
        'kelurahan',
        'kota',
        'rt',
        'rw',
        'alamat_lengkap'
    ];

}
