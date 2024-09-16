<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TugasKaryawan;
use Illuminate\Http\Request;
use App\Http\Requests\TugasKaryawanRequest;
use Illuminate\Support\Facades\Gate;

class TugasKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugasKaryawan = TugasKaryawan::orderBy('id', 'DESC')->paginate(5);

        return view('admin.tugas-karyawan.index', ['data' => $tugasKaryawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.tugas-karyawan.create');
        }

        return redirect()->route('tugas-karyawan.index')->with('danger','Anda tidak punya akses untuk menambahkan tugas karyawan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TugasKaryawanRequest $request)
    {
        try{
            $tugasKaryawan = new TugasKaryawan();
            $tugasKaryawan->kode_tugas = $request->kode_tugas;
            $tugasKaryawan->nama_tugas = $request->nama_tugas;

            $tugasKaryawan->save();
            return redirect()->route('tugas-karyawan.index')->with('success','Data tugas karyawan berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('tugas-karyawan.create')->with('danger','Data tugas karyawan gagal ditambahkan: '. $e->getMessage());
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
        $tugasKaryawan = TugasKaryawan::find($id);

        if(!$tugasKaryawan) {
            return redirect()->route('tugas-karyawan.index')->with('danger', 'Data tugas karyawan tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.tugas-karyawan.edit', compact('tugasKaryawan'));
        }

        return redirect()->route('tugas-karyawan.index')->with('danger','Anda tidak punya akses untuk edit tugas karyawan!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TugasKaryawanRequest $request, $id)
    {
        $tugasKaryawan = TugasKaryawan::find($id);

        try{
            $tugasKaryawan->kode_tugas = $request->kode_tugas;
            $tugasKaryawan->nama_tugas = $request->nama_tugas;

            $tugasKaryawan->save();
            return redirect()->route('tugas-karyawan.index')->with('success','Data tugas karyawan berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('tugas-karyawan.edit',$id)->with('danger','Data tugas karyawan gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tugasKaryawan = TugasKaryawan::find($id);

        if(!$tugasKaryawan){
            return redirect()->route('tugas-karyawan.index')->with('danger','Data tugas karyawan tidak ditemukan!');
        }

        $tugasKaryawan->delete();
        return redirect()->route('tugas-karyawan.index')->with('success','Data tugas karyawan berhasil dihapus!');
    }
}
