<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminBanner;
use App\Models\Berita;
use App\Models\DataKaryawan;
use App\Models\Ekstrakurikuler;
use App\Models\FasilitasSekolah;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Prestasi;
use App\Models\TugasKaryawan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $banner = AdminBanner::count();
        $berita = Berita::count();
        $fasilitas = FasilitasSekolah::count();
        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $jabatan = Jabatan::count();
        $karyawan = DataKaryawan::count();
        $tgskaryawan = TugasKaryawan::count();
        $ekstra = Ekstrakurikuler::count();
        $prestasi = Prestasi::count();

        return view('admin.dashboard', compact('user','banner','berita','fasilitas','guru','kelas','mapel','jabatan','karyawan','tgskaryawan','ekstra','prestasi'));
    }
}
