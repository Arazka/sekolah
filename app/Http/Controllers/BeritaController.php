<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function berita()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $beritas = Berita::join('users','users.id','=','beritas.user_id')
                         ->select([
                            'users.username',
                            'beritas.foto',
                            'beritas.judul_berita',
                            'beritas.deskripsi',
                            'beritas.tanggal_publikasi',
                            'beritas.status'
                         ])
                         ->where('beritas.status','publish')
                         ->latest('beritas.id')
                         ->paginate(4);
        
        return view('berita.berita',[
            'profil' => $profils,
            'beritas' => $beritas
        ]);
    }

    public function detailberita($judul_berita)
    {
        $berita = Berita::join('users','users.id','=','beritas.user_id')
                         ->select([
                            'users.username',
                            'beritas.foto',
                            'beritas.judul_berita',
                            'beritas.deskripsi',
                            'beritas.tanggal_publikasi',
                            'beritas.status'
                         ])
                         ->where('judul_berita',$judul_berita)
                         ->first();
        $beritaterkini = Berita::orderBy('id','desc')->take(4)->get();
        $profil = Profil::select(['profils.foto'])->first();
        
        return view('berita.detail', compact('berita','profil'), ['terkini' => $beritaterkini]);
    }
}
