<?php

use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataKaryawanController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\FasilitasSekolahController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\JabatanGuruController;
use App\Http\Controllers\Admin\KaryawanDetailController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\MapelGuruController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\TugasKaryawanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WaliKelasGuruController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\BeritaController as beritaTerbaru;
use App\Http\Controllers\FasilitasController as fasilitasSekolah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/sejarah-visi-dan-misi', [ProfilSekolahController::class, 'sejarah'])->name('sejarah');
Route::get('/kepala-sekolah-dan-staff', [ProfilSekolahController::class, 'staff'])->name('staff');
Route::get('/guru-wali-kelas', [ProfilSekolahController::class, 'walikelas'])->name('walikelas');
Route::get('/guru-mata-pelajaran', [ProfilSekolahController::class, 'mapel'])->name('mapel');
Route::get('/karyawan', [ProfilSekolahController::class, 'karyawan'])->name('karyawan');
Route::get('/ekstrakurikuler', [AkademikController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{nama}', [AkademikController::class, 'detailekstra'])->name('detailekstra');
Route::get('/prestasi', [AkademikController::class, 'prestasi'])->name('prestasi');
Route::get('/prestasi/{nama}', [AkademikController::class, 'detailprestasi'])->name('detailprestasi');
Route::get('/berita', [beritaTerbaru::class, 'berita'])->name('berita');
Route::get('/berita/{judul_berita}', [beritaTerbaru::class, 'detailberita'])->name('detailberita');
Route::get('/fasilitas', [fasilitasSekolah::class, 'fasilitas'])->name('fasilitas');
Route::get('/fasilitas/{nama_fasilitas}', [fasilitasSekolah::class, 'detailfasilitas'])->name('detailfasilitas');

// Route::get('/prestasi/detail-prestasi', function () {return view('akademik.prestasi.detail');});
// Route::get('/kepala-sekolah-dan-staff', function () {return view('profil-sekolah.staff');});

Route::get('/admin/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'login']);

Route::middleware(['auth' => 'check'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/404', function () {return view('admin.404');});
    
    Route::name('account.')->group(function () {
        Route::get('/admin/account', [UserController::class, 'index'])->name('index');
        Route::get('/admin/account/create', [UserController::class, 'create'])->name('create');
        Route::post('/admin/account/create', [UserController::class, 'store'])->name('store');
        Route::get('/admin/account/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/admin/account/{id}/edit', [UserController::class, 'update'])->name('update');
        Route::delete('/admin/account/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::name('banner.')->group(function () {
        Route::get('/admin/banner', [AdminBannerController::class, 'index'])->name('index');
        Route::get('/admin/banner/create', [AdminBannerController::class, 'create'])->name('create');
        Route::post('/admin/banner/create', [AdminBannerController::class, 'store'])->name('store');
        Route::get('/admin/banner/{id}/edit', [AdminBannerController::class, 'edit'])->name('edit');
        Route::patch('/admin/banner/{id}/edit', [AdminBannerController::class, 'update'])->name('update');
        Route::delete('/admin/banner/{id}', [AdminBannerController::class, 'destroy'])->name('delete');
    });
    
    Route::name('profil.')->group(function () {
        Route::get('/admin/profil', [ProfilController::class, 'index'])->name('index');
        Route::get('/admin/profil/create', [ProfilController::class, 'create'])->name('create');
        Route::post('/admin/profil/create', [ProfilController::class, 'store'])->name('store');
        Route::get('/admin/profil/{id}/edit', [ProfilController::class, 'edit'])->name('edit');
        Route::patch('/admin/profil/{id}/edit', [ProfilController::class, 'update'])->name('update');
        Route::delete('/admin/profil/{id}', [ProfilController::class, 'destroy'])->name('delete');
    });

    Route::name('berita.')->group(function () {
        Route::get('/admin/berita', [BeritaController::class, 'index'])->name('index');
        Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/admin/berita/create', [BeritaController::class, 'store'])->name('store');
        Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::patch('/admin/berita/{id}/edit', [BeritaController::class, 'update'])->name('update');
        Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('delete');
    });

    Route::name('guru.')->group(function () {
        Route::get('/admin/guru', [GuruController::class, 'index'])->name('index');
        Route::get('/admin/guru/create', [GuruController::class, 'create'])->name('create');
        Route::post('/admin/guru/create', [GuruController::class, 'store'])->name('store');
        Route::get('/admin/guru/{id}/edit', [GuruController::class, 'edit'])->name('edit');
        Route::patch('/admin/guru/{id}/edit', [GuruController::class, 'update'])->name('update');
        Route::delete('/admin/guru/{id}', [GuruController::class, 'destroy'])->name('delete');
    });

    Route::name('kelas.')->group(function () {
        Route::get('/admin/kelas', [KelasController::class, 'index'])->name('index');
        Route::get('/admin/kelas/create', [KelasController::class, 'create'])->name('create');
        Route::post('/admin/kelas/create', [KelasController::class, 'store'])->name('store');
        Route::get('/admin/kelas/{id}/edit', [KelasController::class, 'edit'])->name('edit');
        Route::patch('/admin/kelas/{id}/edit', [KelasController::class, 'update'])->name('update');
        Route::delete('/admin/kelas/{id}', [KelasController::class, 'destroy'])->name('delete');
    });

    Route::name('mapel.')->group(function () {
        Route::get('/admin/mapel', [MapelController::class, 'index'])->name('index');
        Route::get('/admin/mapel/create', [MapelController::class, 'create'])->name('create');
        Route::post('/admin/mapel/create', [MapelController::class, 'store'])->name('store');
        Route::get('/admin/mapel/{id}/edit', [MapelController::class, 'edit'])->name('edit');
        Route::patch('/admin/mapel/{id}/edit', [MapelController::class, 'update'])->name('update');
        Route::delete('/admin/mapel/{id}', [MapelController::class, 'destroy'])->name('delete');
    });

    Route::name('jabatan.')->group(function () {
        Route::get('/admin/jabatan', [JabatanController::class, 'index'])->name('index');
        Route::get('/admin/jabatan/create', [JabatanController::class, 'create'])->name('create');
        Route::post('/admin/jabatan/create', [JabatanController::class, 'store'])->name('store');
        Route::get('/admin/jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('edit');
        Route::patch('/admin/jabatan/{id}/edit', [JabatanController::class, 'update'])->name('update');
        Route::delete('/admin/jabatan/{id}', [JabatanController::class, 'destroy'])->name('delete');
    });

    Route::name('jabatan-guru.')->group(function () {
        Route::get('/admin/jabatan-guru', [JabatanGuruController::class, 'index'])->name('index');
        Route::get('/admin/jabatan-guru/create', [JabatanGuruController::class, 'create'])->name('create');
        Route::post('/admin/jabatan-guru/create', [JabatanGuruController::class, 'store'])->name('store');
        Route::get('/admin/jabatan-guru/{id}/edit', [JabatanGuruController::class, 'edit'])->name('edit');
        Route::patch('/admin/jabatan-guru/{id}/edit', [JabatanGuruController::class, 'update'])->name('update');
        Route::delete('/admin/jabatan-guru/{id}', [JabatanGuruController::class, 'destroy'])->name('delete');
    });

    Route::name('wali-kelas.')->group(function () {
        Route::get('/admin/wali-kelas', [WaliKelasGuruController::class, 'index'])->name('index');
        Route::get('/admin/wali-kelas/create', [WaliKelasGuruController::class, 'create'])->name('create');
        Route::post('/admin/wali-kelas/create', [WaliKelasGuruController::class, 'store'])->name('store');
        Route::get('/admin/wali-kelas/{id}/edit', [WaliKelasGuruController::class, 'edit'])->name('edit');
        Route::patch('/admin/wali-kelas/{id}/edit', [WaliKelasGuruController::class, 'update'])->name('update');
        Route::delete('/admin/wali-kelas/{id}', [WaliKelasGuruController::class, 'destroy'])->name('delete');
    });

    Route::name('mapel-guru.')->group(function () {
        Route::get('/admin/mapel-guru', [MapelGuruController::class, 'index'])->name('index');
        Route::get('/admin/mapel-guru/create', [MapelGuruController::class, 'create'])->name('create');
        Route::post('/admin/mapel-guru/create', [MapelGuruController::class, 'store'])->name('store');
        Route::get('/admin/mapel-guru/{id}/edit', [MapelGuruController::class, 'edit'])->name('edit');
        Route::patch('/admin/mapel-guru/{id}/edit', [MapelGuruController::class, 'update'])->name('update');
        Route::delete('/admin/mapel-guru/{id}', [MapelGuruController::class, 'destroy'])->name('delete');
    });

    Route::name('data-karyawan.')->group(function () {
        Route::get('/admin/data-karyawan', [DataKaryawanController::class, 'index'])->name('index');
        Route::get('/admin/data-karyawan/create', [DataKaryawanController::class, 'create'])->name('create');
        Route::post('/admin/data-karyawan/create', [DataKaryawanController::class, 'store'])->name('store');
        Route::get('/admin/data-karyawan/{id}/edit', [DataKaryawanController::class, 'edit'])->name('edit');
        Route::patch('/admin/data-karyawan/{id}/edit', [DataKaryawanController::class, 'update'])->name('update');
        Route::delete('/admin/data-karyawan/{id}', [DataKaryawanController::class, 'destroy'])->name('delete');
    });

    Route::name('tugas-karyawan.')->group(function () {
        Route::get('/admin/tugas-karyawan', [TugasKaryawanController::class, 'index'])->name('index');
        Route::get('/admin/tugas-karyawan/create', [TugasKaryawanController::class, 'create'])->name('create');
        Route::post('/admin/tugas-karyawan/create', [TugasKaryawanController::class, 'store'])->name('store');
        Route::get('/admin/tugas-karyawan/{id}/edit', [TugasKaryawanController::class, 'edit'])->name('edit');
        Route::patch('/admin/tugas-karyawan/{id}/edit', [TugasKaryawanController::class, 'update'])->name('update');
        Route::delete('/admin/tugas-karyawan/{id}', [TugasKaryawanController::class, 'destroy'])->name('delete');
    });

    Route::name('karyawan-detail.')->group(function () {
        Route::get('/admin/karyawan-detail', [KaryawanDetailController::class, 'index'])->name('index');
        Route::get('/admin/karyawan-detail/create', [KaryawanDetailController::class, 'create'])->name('create');
        Route::post('/admin/karyawan-detail/create', [KaryawanDetailController::class, 'store'])->name('store');
        Route::get('/admin/karyawan-detail/{id}/edit', [KaryawanDetailController::class, 'edit'])->name('edit');
        Route::patch('/admin/karyawan-detail/{id}/edit', [KaryawanDetailController::class, 'update'])->name('update');
        Route::delete('/admin/karyawan-detail/{id}', [KaryawanDetailController::class, 'destroy'])->name('delete');
    });

    Route::name('ekstrakurikuler.')->group(function () {
        Route::get('/admin/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('index');
        Route::get('/admin/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('create');
        Route::post('/admin/ekstrakurikuler/create', [EkstrakurikulerController::class, 'store'])->name('store');
        Route::get('/admin/ekstrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('edit');
        Route::patch('/admin/ekstrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'update'])->name('update');
        Route::delete('/admin/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('delete');
    });

    Route::name('prestasi.')->group(function () {
        Route::get('/admin/prestasi', [PrestasiController::class, 'index'])->name('index');
        Route::get('/admin/prestasi/create', [PrestasiController::class, 'create'])->name('create');
        Route::post('/admin/prestasi/create', [PrestasiController::class, 'store'])->name('store');
        Route::get('/admin/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('edit');
        Route::patch('/admin/prestasi/{id}/edit', [PrestasiController::class, 'update'])->name('update');
        Route::delete('/admin/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('delete');
    });

    Route::name('fasilitas.')->group(function () {
        Route::get('/admin/fasilitas', [FasilitasSekolahController::class, 'index'])->name('index');
        Route::get('/admin/fasilitas/create', [FasilitasSekolahController::class, 'create'])->name('create');
        Route::post('/admin/fasilitas/create', [FasilitasSekolahController::class, 'store'])->name('store');
        Route::get('/admin/fasilitas/{id}/edit', [FasilitasSekolahController::class, 'edit'])->name('edit');
        Route::patch('/admin/fasilitas/{id}/edit', [FasilitasSekolahController::class, 'update'])->name('update');
        Route::delete('/admin/fasilitas/{id}', [FasilitasSekolahController::class, 'destroy'])->name('delete');
    });
});
