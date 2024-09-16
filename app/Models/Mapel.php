<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';
    protected $fillable = [
        'kode_mapel', 'nama_mapel'
    ];

    public function mapelGuru()
    {
        return $this->hasMany(MapelGuru::class, 'mapel_id');
    }
}
