<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Requests\PrestasiRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = Prestasi::orderBy('id','desc')->paginate(3);

        return view('admin.prestasi.index', ['data' => $prestasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.prestasi.create');
        }

        return redirect()->route('prestasi.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestasiRequest $request)
    {
        try{
            $prestasi = new Prestasi();
            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('prestasi');
                $prestasi->foto = $fotoPath;
            }
            $prestasi->nama = $request->nama;
            $prestasi->deskripsi = $request->deskripsi;
            $ttl = explode('/', $request->tanggal);
            $prestasi->nama_penerima = $request->nama_penerima;
            $prestasi->kategori = $request->kategori;
            $prestasi->level_pencapaian = $request->level_pencapaian;

            if(count($ttl) == 3){
                $tgl = $ttl[2].'-'.$ttl[1].'-'.$ttl[0];
                $prestasi->tanggal = $tgl;
            } else {
                return redirect()->route('prestasi.index')->with('danger','Format tanggal tidak sesuai!');
            }

            $prestasi->save();
            return redirect()->route('prestasi.index')->with('success','Data prestasi berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('prestasi.create')->with('danger','Data prestasi gagal ditambahkan: '. $e->getMessage());
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
        $prestasi = Prestasi::find($id);

        if(!$prestasi) {
            return redirect()->route('prestasi.index')->with('danger','Data prestasi tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.prestasi.edit', compact('prestasi'));
        }

        return redirect()->route('prestasi.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrestasiRequest $request, $id)
    {
        $prestasi = Prestasi::find($id);

        try{
            if($request->hasFile('foto')){
                if($prestasi->foto != null){
                    Storage::delete($prestasi->foto);
                }

                $fotoPath = $request->file('foto')->store('prestasi');
                $prestasi->foto = $fotoPath;
            }
            $prestasi->nama = $request->nama;
            $prestasi->deskripsi = $request->deskripsi;
            $ttl = explode('/', $request->tanggal);
            $prestasi->nama_penerima = $request->nama_penerima;
            $prestasi->kategori = $request->kategori;
            $prestasi->level_pencapaian = $request->level_pencapaian;

            if(count($ttl) == 3){
                $tgl = $ttl[2].'-'.$ttl[1].'-'.$ttl[0];
                $prestasi->tanggal = $tgl;
            } else {
                return redirect()->route('prestasi.index')->with('danger','Format tanggal tidak sesuai!');
            }

            $prestasi->save();
            return redirect()->route('prestasi.index')->with('success','Data prestasi berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('prestasi.edit', $id)->with('danger','Data prestasi gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);

        if($prestasi->foto != null){
            Storage::delete($prestasi->foto);
        }

        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success','Data prestasi berhasil dihapus!');
    }
}
