<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JabatanGuru;
use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\JabatanGuruRequest;
use Illuminate\Support\Facades\Gate;

class JabatanGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatanGuru = JabatanGuru::join('gurus','gurus.id','=','jabatan_gurus.guru_id')
                                  ->join('jabatans','jabatans.id','=','jabatan_gurus.jabatan_id')
                                  ->select([
                                    'jabatan_gurus.id',
                                    'gurus.nama',
                                    'jabatans.nama_jabatan'
                                  ])
                                  ->orderBy('jabatan_gurus.id','desc')
                                  ->paginate(5);
        
        return view('admin.jabatan-guru.index', ['data' => $jabatanGuru]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        $jabatan = Jabatan::all();

        if(Gate::allows('admin')){
            return view('admin.jabatan-guru.create', compact('guru', 'jabatan'));
        }

        // return view('admin.404');
        return redirect()->route('jabatan-guru.index')->with('danger', 'Anda tidak punya akses untuk tambah data!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanGuruRequest $request)
    {
        try{
            $jabatanGuru = new JabatanGuru();
            $jabatanGuru->guru_id = $request->guru_id;
            $jabatanGuru->jabatan_id = $request->jabatan_id;

            $jabatanGuru->save();
            return redirect()->route('jabatan-guru.index')->with('success', 'Data jabatan guru berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('jabatan-guru.create')->with('danger', 'Data jabatan guru gagal ditambahkan: '. $e->getMessage());
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
        $jabatanGuru = JabatanGuru::find($id);
        $guru = Guru::all();
        $jabatan = Jabatan::all();

        if(!$jabatanGuru){
            return redirect()->route('jabatan-guru.index')->with('danger', 'Data jabatan guru tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.jabatan-guru.edit', compact('jabatanGuru','guru','jabatan'));
        }

        // return view('admin.404');
        return redirect()->route('jabatan-guru.index')->with('danger', 'Anda tidak punya akses untuk edit data!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanGuruRequest $request, $id)
    {
        $jabatanGuru = JabatanGuru::find($id);

        try{
            $jabatanGuru->guru_id = $request->guru_id;
            $jabatanGuru->jabatan_id = $request->jabatan_id;

            $jabatanGuru->save();
            return redirect()->route('jabatan-guru.index')->with('success', 'Data jabatan guru berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('jabatan-guru.edit', $id)->with('danger', 'Data jabatan guru gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatanGuru = JabatanGuru::find($id);

        if(!$jabatanGuru){
            return redirect()->route('jabatan-guru.index')->with('danger', 'Data jabatan guru tidak ditemukan!');
        }
        
        if(Gate::allows('admin')){
            $jabatanGuru->delete();
            return redirect()->route('jabatan-guru.index')->with('success', 'Data jabatan guru berhasil dihapus!');
        }
        return redirect()->route('jabatan-guru.index')->with('danger', 'Anda tidak memiliki izin untuk menghapus data jabatan guru!');
    }
}
