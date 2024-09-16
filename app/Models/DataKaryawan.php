<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    use HasFactory;

    protected $table = 'data_karyawans';
    protected $fillable = [
    'foto','nbm','nama','tempat_lahir','tgl_lahir','gender','phone_number',
    'email','alamat','pendidikan'
    ];

    public function karyawanDetail()
    {
        return $this->hasMany(KaryawanDetail::class,'data_karyawan_id');
    }
}
