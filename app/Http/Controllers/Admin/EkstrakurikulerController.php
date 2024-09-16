<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use App\Http\Requests\EkstrakurikulerRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstra = Ekstrakurikuler::orderBy('id','desc')->paginate(3);

        return view('admin.ekstrakurikuler.index', ['data' => $ekstra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.ekstrakurikuler.create');
        }

        return redirect()->route('ekstrakurikuler.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EkstrakurikulerRequest $request)
    {
        try{
            $ekstra = new Ekstrakurikuler();
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto')->store('ekstrakurikuler');
                $ekstra->foto = $fileFoto;
            }
            $ekstra->nama = $request->nama;
            $ekstra->deskripsi = $request->deskripsi;
            $ekstra->kategori = $request->kategori;
            $ekstra->jadwal_pertemuan = $request->jadwal_pertemuan;
            $ekstra->koordinator_kegiatan = $request->koordinator_kegiatan;
            $ekstra->lokasi_kegiatan = $request->lokasi_kegiatan;

            $ekstra->save();
            return redirect()->route('ekstrakurikuler.index')->with('success','Data ekstrakurikuler berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('ekstrakurikuler.create')->with('danger','Data ekstrakurikuler gagal ditambahkan: '. $e->getMessage());
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
        $ekstra = Ekstrakurikuler::find($id);
        
        if(!$ekstra){
            return redirect()->route('ekstrakurikuler.index')->with('danger','Data ekstrakurikuler tidak ditemukan!');
        }
        
        if(Gate::allows('admin')){
            return view('admin.ekstrakurikuler.edit', compact('ekstra'));
        }

        return redirect()->route('ekstrakurikuler.index')->with('danger','Anda tidak punya akses!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EkstrakurikulerRequest $request, $id)
    {
        $ekstra = Ekstrakurikuler::find($id);

        try{
            if($request->hasFile('foto')){
                if($ekstra->foto != null){
                    Storage::delete($ekstra->foto);
                }

                $fotoPath = $request->file('foto')->store('ekstrakurikuler');
                $ekstra->foto = $fotoPath;
            }
            $ekstra->nama = $request->nama;
            $ekstra->deskripsi = $request->deskripsi;
            $ekstra->kategori = $request->kategori;
            $ekstra->jadwal_pertemuan = $request->jadwal_pertemuan;
            $ekstra->koordinator_kegiatan = $request->koordinator_kegiatan;
            $ekstra->lokasi_kegiatan = $request->lokasi_kegiatan;

            $ekstra->save();
            return redirect()->route('ekstrakurikuler.index')->with('success','Data ekstrakurikuler berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('ekstrakurikuler.edit', $id)->with('danger','Data ekstrakurikuler gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ekstra = Ekstrakurikuler::find($id);

        if($ekstra->foto != null){
            Storage::delete($ekstra->foto);
        }

        $ekstra->delete();
        return redirect()->route('ekstrakurikuler.index')->with('success','Data ekstrakurikuler berhasil dihapus');

    } 
}
