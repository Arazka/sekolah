<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';
    protected $fillable = [
    'foto','nbm','nama','tempat_lahir','tgl_lahir','gender','phone_number',
    'email','alamat','pendidikan'
    ];

    public function jabatanGuru()
    {
        return $this->hasMany(JabatanGuru::class, 'guru_id');
    }

    public function WaliKelasGuru()
    {
        return $this->hasMany(WaliKelasGuru::class, 'kelas_id');
    }

    public function mapelGuru()
    {
        return $this->hasMany(MapelGuru::class, 'mapel_id');
    }
}
