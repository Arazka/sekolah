<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasis';
    protected $fillable = [
        'foto', 'nama', 'deskripsi', 'tanggal', 'nama_penerima', 'kategori', 'level_pencapaian'
    ];
}
