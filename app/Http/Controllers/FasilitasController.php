<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\FasilitasSekolah;

class FasilitasController extends Controller
{
    public function fasilitas()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $fasilitases = FasilitasSekolah::select([
                        'fasilitas_sekolahs.foto',
                        'fasilitas_sekolahs.nama_fasilitas',
                    ])
                    ->orderBy('id','desc')
                    ->paginate(8);
        
        return view('fasilitas.fasilitas',[
            'profil' => $profils,
            'fasilitas' => $fasilitases
        ]);
    }

    public function detailfasilitas($nama_fasilitas)
    {
        $profil = Profil::select(['profils.foto'])->first();
        $detail = FasilitasSekolah::where('nama_fasilitas',$nama_fasilitas)->first();
        $fasilitases = FasilitasSekolah::where('nama_fasilitas','!=',$nama_fasilitas)->inRandomOrder()->take(4)->get();

        return view('fasilitas.detail', compact('profil','detail'), ['fasilitas' => $fasilitases]);
    }
}
