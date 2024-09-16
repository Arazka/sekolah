<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaliKelasGuru;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Requests\WaliKelasRequest;
use Illuminate\Support\Facades\Gate;

class WaliKelasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waliKelas = WaliKelasGuru::join('gurus','gurus.id','=','wali_kelas_gurus.guru_id')
                                  ->join('kelas','kelas.id','=','wali_kelas_gurus.kelas_id')
                                  ->select([
                                    'wali_kelas_gurus.id',
                                    'gurus.nama',
                                    'kelas.nama_kelas'
                                  ])
                                  ->orderBy('wali_kelas_gurus.id','desc')
                                  ->paginate(5);

        return view('admin.wali-kelas-guru.index', ['data' => $waliKelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $kelas = Kelas::all();

        if(Gate::allows('admin')){
            return view('admin.wali-kelas-guru.create', compact('guru', 'kelas'));
        }

        return redirect()->route('wali-kelas.index')->with('danger','Anda tidak punya akses untuk menambah data wali kelas!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaliKelasRequest $request)
    {
        try{
            $waliKelas = new WaliKelasGuru();
            $waliKelas->guru_id = $request->guru_id;
            $waliKelas->kelas_id = $request->kelas_id;

            $waliKelas->save();
            return redirect()->route('wali-kelas.index')->with('success','Data wali kelas berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('wali-kelas.create')->with('danger','Data wali kelas gagal ditambahkan: '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $waliKelas = WaliKelasGuru::find($id);
        $guru = Guru::all();
        $kelas = Kelas::all();

        if(!$waliKelas){
            return redirect()->route('wali-kelas.index')->with('danger','Data wali kelas tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.wali-kelas-guru.edit', compact('guru', 'kelas', 'waliKelas'));
        }

        return redirect()->route('wali-kelas.index')->with('danger','Anda tidak punya akses untuk edit data wali kelas!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaliKelasRequest $request, $id)
    {
        $waliKelas = WaliKelasGuru::find($id);

        try{
            $waliKelas->guru_id = $request->guru_id;
            $waliKelas->kelas_id = $request->kelas_id;

            $waliKelas->save();
            return redirect()->route('wali-kelas.index')->with('success','Data wali kelas berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('wali-kelas.edit',$id)->with('danger','Data wali kelas gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $waliKelas = WaliKelasGuru::find($id);

        if(!$waliKelas){
            return redirect()->route('wali-kelas.index')->with('danger','Data wali kelas tidak ditemukan!');
        }

        $waliKelas->delete();
        return redirect()->route('wali-kelas.index')->with('success','Data wali kelas berhasil dihapus!');
    }
}
