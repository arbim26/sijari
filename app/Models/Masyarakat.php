<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = "masyarakat"; 

    protected $fillable = [
        'no_kk',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jalan/desa',
        'rt',
        'rw',
        'keerangan',
    ];
}
