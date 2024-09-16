<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $fillable = [
        'user_id', 'foto', 'judul_berita', 'deskripsi', 'tanggal_publiskasi', 'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
