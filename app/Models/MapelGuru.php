<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelGuru extends Model
{
    use HasFactory;

    protected $table = 'mapel_gurus';
    protected $fillable = [
        'guru_id', 'mapel_id'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class,'guru_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class,'mapel_id');
    }
}
