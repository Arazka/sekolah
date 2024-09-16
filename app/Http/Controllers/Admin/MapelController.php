<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Requests\MapelRequest;
use Illuminate\Support\Facades\Gate;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = Mapel::orderBy('id', 'DESC')->paginate(5);

        return view('admin.mapel.index', ['data' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.mapel.create');
        }

        return redirect()->route('mapel.index')->with('danger','Anda tidak punya akses untuk menambah mapel!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapelRequest $request)
    {
        try{
            $mapel = new Mapel();
            $mapel->kode_mapel = $request->kode_mapel;
            $mapel->nama_mapel = $request->nama_mapel;

            $mapel->save();
            return redirect()->route('mapel.index')->with('success','Data mapel berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('mapel.create')->with('danger','Data mapel gagal ditambahkan: '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mapel = Mapel::find($id);

        if(!$mapel) {
            return redirect()->route('mapel.index')->with('danger', 'Data mapel tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.mapel.edit', compact('mapel'));
        }

        return redirect()->route('mapel.index')->with('danger','Anda tidak punya akses untuk edit mapel!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapelRequest $request, $id)
    {
        $mapel = Mapel::find($id);

        try{
            $mapel->kode_mapel = $request->kode_mapel;
            $mapel->nama_mapel = $request->nama_mapel;

            $mapel->save();
            return redirect()->route('mapel.index')->with('success','Data mapel berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('mapel.edit', $id)->with('danger','Data mapel gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);

        if(!$mapel) {
            return redirect()->route('mapel.index')->with('danger','Data mapel tidak ditemukan!');
        }
        
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success','Data mapel berhasil dihapus!');
    }
}
