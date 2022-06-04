<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Alamat;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'nama',
        'no_hp',
        'user_id',
        'id_alamat'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'id', 'id_alamat');
    }
}
