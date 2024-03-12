<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nim', 'kelas', 'jamMasuk', 'jamKeluar', 'monitor', 'keyboard', 'mouse', 'jaringan', 'keterangan', 'alat'
    ];
}