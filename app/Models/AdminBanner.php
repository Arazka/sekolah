<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBanner extends Model
{
    use HasFactory;

    protected $table = 'admin_banners';
    protected $fillable = [
        'foto', 'judul_banner'
    ];
}
