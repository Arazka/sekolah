<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikulers';
    protected $fillable = [
        'foto', 'nama', 'deskripsi', 'kategori', 'jadwal_pertemuan', 'koordinator_kegiatan', 'lokasi_kegiatan'
    ];
}
