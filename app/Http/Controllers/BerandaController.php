<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminBanner;
use App\Models\Profil;
use App\Models\Prestasi;
use App\Models\Berita;
use App\Models\FasilitasSekolah;

class BerandaController extends Controller
{
    public function index()
    {
        $banners = AdminBanner::all();
        $profils = Profil::select(['profils.foto','profils.sejarah'])->get();
        $prestasis = Prestasi::select([
                                'prestasis.foto',
                                'prestasis.nama',
                                'prestasis.deskripsi'
                                ])
                                ->orderBy('id', 'desc')
                                ->take(3)
                                ->get();
        $beritas = Berita::join('users','users.id','=','beritas.user_id')
                           ->select([
                            'users.username',
                            'beritas.id',
                            'beritas.foto',
                            'beritas.judul_berita',
                            'beritas.deskripsi',
                            'beritas.tanggal_publikasi',
                            'beritas.status'
                           ])
                           ->orderby('beritas.id','desc')
                           ->take(4)
                           ->get();
        $fasilitases = FasilitasSekolah::select(['fasilitas_sekolahs.foto','fasilitas_sekolahs.nama_fasilitas'])->take(4)->get();

        return view('welcome', [
            'banner' => $banners,
            'profil' => $profils,
            'prestasi' => $prestasis,
            'berita' => $beritas,
            'fasilitas' => $fasilitases,
        ]);
    }
}
