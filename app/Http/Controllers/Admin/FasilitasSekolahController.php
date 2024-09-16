<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasSekolah;
use Illuminate\Http\Request;
use App\Http\Requests\FasilitasSekolahRequest;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class FasilitasSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = FasilitasSekolah::orderBy('id','desc')->paginate(3);

        return view('admin.fasilitas.index', ['data' => $fasilitas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.fasilitas.create');
        }

        return redirect()->route('fasilitas.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FasilitasSekolahRequest $request)
    {
        try{
            $fasilitas = new FasilitasSekolah();
            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('fasilitas');
                $fasilitas->foto = $fotoPath;
            };

            $fasilitas->nama_fasilitas = $request->nama_fasilitas;
            $fasilitas->deskripsi = $request->deskripsi;
            $fasilitas->jenis_fasilitas = $request->jenis_fasilitas;
            $fasilitas->kondisi_fasilitas = $request->kondisi_fasilitas;
            $fasilitas->lokasi = $request->lokasi;

            $fasilitas->save();
            return redirect()->route('fasilitas.index')->with('success','Data fasilitas berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('fasilitas.create')->with('danger','Data fasilitas gagal ditambahkan : '.$e->getMessage());
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
        $fasilitas = FasilitasSekolah::find($id);

        if(!$fasilitas){
            return redirect()->route('fasilitas.index')->with('danger','Data fasilitas tidak ditemukan!');
        }
        
        if(Gate::allows('admin')){
            return view('admin.fasilitas.edit', compact('fasilitas'));
        }

        return redirect()->route('fasilitas.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FasilitasSekolahRequest $request, $id)
    {
        $fasilitas = FasilitasSekolah::find($id);

        try{
            if($request->hasFile('foto')){
                if($fasilitas->foto != null){
                    Storage::delete($fasilitas->foto);
                }

                $fotoPath = $request->file('foto')->store('fasilitas');
                $fasilitas->foto = $fotoPath;
            };

            $fasilitas->nama_fasilitas = $request->nama_fasilitas;
            $fasilitas->deskripsi = $request->deskripsi;
            $fasilitas->jenis_fasilitas = $request->jenis_fasilitas;
            $fasilitas->kondisi_fasilitas = $request->kondisi_fasilitas;
            $fasilitas->lokasi = $request->lokasi;

            $fasilitas->save();
            return redirect()->route('fasilitas.index')->with('success','Data fasilitas berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('fasilitas.edit',$id)->with('danger','Data fasilitas gagal diedit : '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = FasilitasSekolah::find($id);

        if($fasilitas->foto != null){
            Storage::delete($fasilitas->foto);
        }

        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success','Data fasilitas berhasil dihapus!');
    }
}
