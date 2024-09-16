<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanRequest;
use Illuminate\Support\Facades\Gate;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::orderBy('id', 'DESC')->paginate(5);

        return view('admin.jabatan.index', ['data' => $jabatan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.jabatan.create');
        }

        return redirect()->route('jabatan.index')->with('danger','Anda tidak punya akses untuk menambah jabatan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanRequest $request)
    {
        try{
            $jabatan = new Jabatan();
            $jabatan->kode_jabatan = $request->kode_jabatan;
            $jabatan->nama_jabatan = $request->nama_jabatan;

            $jabatan->save();
            return redirect()->route('jabatan.index')->with('success','Data jabatan berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('jabatan.create')->with('danger','Data jabatan gagal ditambahkan: '. $e->getMessage());
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
        $jabatan = Jabatan::find($id);

        if(!$jabatan) {
            return redirect()->route('jabatan.index')->with('danger', 'Data jabatan tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.jabatan.edit', compact('jabatan'));
        }

        return redirect()->route('jabatan.index')->with('danger','Anda tidak punya akses untuk edit jabatan!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanRequest $request, $id)
    {
        $jabatan = Jabatan::find($id);

        try{
            $jabatan->kode_jabatan = $request->kode_jabatan;
            $jabatan->nama_jabatan = $request->nama_jabatan;

            $jabatan->save();
            return redirect()->route('jabatan.index')->with('success','Data jabatan berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('jabatan.edit', $id)->with('danger','Data jabatan gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);

        if(!$jabatan) {
            return redirect()->route('jabatan.index')->with('danger','Data jabatan tidak ditemukan!');
        }
        
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success','Data jabatan berhasil dihapus!');
    }
}
