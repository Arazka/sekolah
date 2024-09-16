<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanDetail extends Model
{
    use HasFactory;

    protected $table = 'karyawan_details';
    protected $fillable = [
        'data_karyawan_id', 'tugas_karyawan_id'
    ];

    public function dataKaryawan()
    {
        return $this->belongsTo(DataKaryawan::class,'data_karyawan_id');
    }

    public function tugasKaryawan()
    {
        return $this->belongsTo(TugasKaryawan::class,'tugas_karyawan_id');
    }
}
