<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasKaryawan extends Model
{
    use HasFactory;

    protected $table = 'tugas_karyawans';
    protected $fillable = [
        'kode_tugas', 'nama_tugas'
    ];

    public function karyawanDetail()
    {
        return $this->hasMany(KaryawanDetail::class,'tugas_karyawan_id');
    }
}
