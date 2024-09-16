<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';
    protected $fillable = [
        'kode_jabatan', 'nama_jabatan'
    ];

    public function jabatanGuru()
    {
        return $this->hasMany(JabatanGuru::class, 'jabatan_id');
    }
}
