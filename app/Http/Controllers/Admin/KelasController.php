<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\KelasRequest;
use Illuminate\Support\Facades\Gate;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('id', 'DESC')->paginate(5);

        return view('admin.kelas.index', ['data' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.kelas.create');
        }

        return redirect()->route('kelas.index')->with('danger','Anda tidak punya akses untuk menambah kelas!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelasRequest $request)
    {
        try{
            $kelas = new Kelas();
            $kelas->kode_kelas = $request->kode_kelas;
            $kelas->nama_kelas = $request->nama_kelas;

            $kelas->save();
            return redirect()->route('kelas.index')->with('success','Data kelas berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('kelas.create')->with('danger','Data kelas gagal ditambahkan: '. $e->getMessage());
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
        $kelas = Kelas::find($id);

        if(!$kelas) {
            return redirect()->route('kelas.index')->with('danger', 'Data kelas tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.kelas.edit', compact('kelas'));
        }

        return redirect()->route('kelas.index')->with('danger','Anda tidak punya akses untuk edit kelas!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelasRequest $request, $id)
    {
        $kelas = Kelas::find($id);

        try{
            $kelas->kode_kelas = $request->kode_kelas;
            $kelas->nama_kelas = $request->nama_kelas;

            $kelas->save();
            return redirect()->route('kelas.index')->with('success','Data kelas berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('kelas.edit', $id)->with('danger','Data kelas gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
        $kelas = Kelas::find($id);

        if(!$kelas) {
            return redirect()->route('kelas.index')->with('danger','Data Kelas tidak ditemukan!');
        }
        
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success','Data Kelas berhasil dihapus!');
    }
}
