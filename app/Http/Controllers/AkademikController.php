<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;

class AkademikController extends Controller
{
    public function ekstrakurikuler()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $ekstras = Ekstrakurikuler::select([
                    'ekstrakurikulers.foto',
                    'ekstrakurikulers.nama',
                    'ekstrakurikulers.deskripsi',
                    ])
                    ->orderBy('id','desc')
                    ->paginate(6);
        
        return view('akademik.ekstrakurikuler.ekstrakurikuler',[
            'profil' => $profils,
            'ekstra' => $ekstras
        ]);
    }

    public function detailekstra($nama)
    {   
        $detail = Ekstrakurikuler::where('nama',$nama)->first();
        $profil = Profil::select(['profils.foto'])->first();
        $ekstra = Ekstrakurikuler::where('nama','!=',$nama)->inRandomOrder()->take(4)->get();

        return view('akademik.ekstrakurikuler.detail', compact('detail','ekstra','profil'));
    }

    public function prestasi()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $prestasis = Prestasi::select([
                    'prestasis.foto',
                    'prestasis.nama',
                    'prestasis.deskripsi',
                    ])
                    ->orderBy('id','desc')
                    ->paginate(6);
        
        return view('akademik.prestasi.prestasi',[
            'profil' => $profils,
            'prestasi' => $prestasis
        ]);
    }

    public function detailprestasi($nama)
    {
        $prestasi = Prestasi::where('nama',$nama)->first();
        $prestasiterkini = Prestasi::orderBy('id','desc')->take(4)->get();
        $profil = Profil::select(['profils.foto'])->first();

        return view('akademik.prestasi.detail', compact('prestasi','profil'), ['terkini' => $prestasiterkini]);
    }
}
