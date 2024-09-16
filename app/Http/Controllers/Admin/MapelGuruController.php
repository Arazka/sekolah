<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MapelGuru;
use Illuminate\Http\Request;
use App\Http\Requests\MapelGuruRequest;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\Gate;

class MapelGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapelGuru = MapelGuru::join('gurus','gurus.id','=','mapel_gurus.guru_id')
                              ->join('mapels','mapels.id','=','mapel_gurus.mapel_id')
                              ->select([
                                'mapel_gurus.id',
                                'gurus.nama',
                                'mapels.nama_mapel'
                              ])
                              ->orderBy('mapel_gurus.id','desc')
                              ->paginate(5);

        return view('admin.mapel-guru.index', ['data' => $mapelGuru]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();

        if(Gate::allows('admin')){
            return view('admin.mapel-guru.create', compact('guru','mapel'));
        }

        return redirect()->route('mapel-guru.index')->with('danger','Anda tidak punya akses untuk menambah data guru mapel!');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapelGuruRequest $request)
    {
        try{
            $mapelGuru = new MapelGuru();
            $mapelGuru->guru_id = $request->guru_id;
            $mapelGuru->mapel_id = $request->mapel_id;

            $mapelGuru->save();
            return redirect()->route('mapel-guru.index')->with('success','Data guru mapel berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('mapel-guru.create')->with('danger','Data guru mapel gagal ditambahkan: '. $e->getMessage());
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
        $mapelGuru = MapelGuru::find($id);
        $guru = Guru::all();
        $mapel = Mapel::all();

        if(!$mapelGuru) {
            return redirect()->route('mapel-guru.index')->with('danger','Data guru mapel tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.mapel-guru.edit', compact('mapelGuru','guru','mapel'));
        }

        return redirect()->route('mapel-guru.index')->with('danger','Anda tidak punya akses untuk edit data guru mapel!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapelGuruRequest $request, $id)
    {
        $mapelGuru = MapelGuru::find($id);
        
        try{
            $mapelGuru->guru_id = $request->guru_id;
            $mapelGuru->mapel_id = $request->mapel_id;

            $mapelGuru->save();
            return redirect()->route('mapel-guru.index')->with('success','Data guru mapel berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('mapel-guru.edit', $id)->with('danger','Data guru mapel gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mapelGuru = MapelGuru::find($id);

        if(!$mapelGuru) {
            return redirect()->route('mapel-guru.index')->with('danger','Data guru mapel tidak ditemukan!');
        }

        $mapelGuru->delete();
        return redirect()->route('mapel-guru.index')->with('success','Data guru mapel berhasil dihapus!');
    }
}
