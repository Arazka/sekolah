<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasSekolah extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_sekolahs';
    protected $fillable = [
        'foto', 'nama_fasilitas', 'deskripsi', 'jenis_fasilitas', 
        'kondisi_fasilitas', 'lokasi'
    ];
}
