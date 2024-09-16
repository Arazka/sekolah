<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\JabatanGuru;
use App\Models\KaryawanDetail;
use App\Models\WaliKelasGuru;
use App\Models\MapelGuru;

class ProfilSekolahController extends Controller
{
    public function sejarah()
    {
        $profils = Profil::all();

        return view('profil-sekolah.sejarah', ['profil' => $profils]);
    }

    public function staff()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $kepsek = JabatanGuru::join('gurus','gurus.id','=','jabatan_gurus.guru_id')
                             ->join('jabatans','jabatans.id','=','jabatan_gurus.jabatan_id')
                             ->where('jabatans.nama_jabatan','=','Kepala Sekolah')
                             ->select([
                               'gurus.foto',
                               'gurus.nama',
                               'jabatans.nama_jabatan'
                             ])
                             ->first();
        $wakil = JabatanGuru::join('gurus','gurus.id','=','jabatan_gurus.guru_id')
                             ->join('jabatans','jabatans.id','=','jabatan_gurus.jabatan_id')
                             ->where('jabatans.nama_jabatan','=','wakil kepala sekolah')
                             ->select([
                               'gurus.foto',
                               'gurus.nama',
                               'jabatans.nama_jabatan'
                             ])
                             ->first();
        $staffs = JabatanGuru::join('gurus','gurus.id','=','jabatan_gurus.guru_id')
                             ->join('jabatans','jabatans.id','=','jabatan_gurus.jabatan_id')
                             ->whereNotIn('jabatans.nama_jabatan', ['Kepala Sekolah', 'Wakil Kepala Sekolah'])
                             ->select([
                               'gurus.foto',
                               'gurus.nama',
                               'jabatans.nama_jabatan'
                             ])
                             ->get();
        
        return view('profil-sekolah.staff',[
            'profil' => $profils,
            'staff' => $staffs
        ],
        compact('kepsek','wakil'));
    }

    public function walikelas()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $kelasData = [];

        for ($i = 1; $i <= 6; $i++) {
            $kelas = WaliKelasGuru::join('gurus', 'gurus.id', '=', 'wali_kelas_gurus.guru_id')
                ->join('kelas', 'kelas.id', '=', 'wali_kelas_gurus.kelas_id')
                ->select([
                    'gurus.foto',
                    'gurus.nama',
                    'kelas.nama_kelas',
                ])
                ->where('kelas.nama_kelas', 'like', "%kelas $i%")
                ->orderBy('kelas.nama_kelas', 'asc')
                ->get();

            $kelasData["kelas $i"] = $kelas;
        }

        return view('profil-sekolah.walikelas', [
            'profil' => $profils,
            'kelasData' => $kelasData,
        ]);
    }


    public function mapel()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $mapels = MapelGuru::join('gurus','gurus.id','=','mapel_gurus.guru_id')
                          ->join('mapels','mapels.id','=','mapel_gurus.mapel_id')
                          ->select([
                            'gurus.foto',
                            'gurus.nama',
                            'mapels.nama_mapel'
                          ])
                          ->latest('mapel_gurus.id')
                          ->paginate(6);
        
        return view('profil-sekolah.mapel',[
            'profil' => $profils,
            'mapels' => $mapels
        ]);
    }

    public function karyawan()
    {
        $profils = Profil::select(['profils.foto'])->get();
        $karyawandetails = KaryawanDetail::join('data_karyawans','data_karyawans.id','=','karyawan_details.data_karyawan_id')
                                         ->join('tugas_karyawans','tugas_karyawans.id','=','karyawan_details.tugas_karyawan_id')
                                         ->select([
                                            'data_karyawans.foto',
                                            'data_karyawans.nama',
                                            'tugas_karyawans.nama_tugas'
                                         ])
                                         ->latest('karyawan_details.id')
                                         ->paginate(6);
        
        return view('profil-sekolah.karyawan',[
            'profil' => $profils,
            'karyawandetail' => $karyawandetails
        ]);
    }
}
