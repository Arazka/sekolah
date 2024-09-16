<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::orderBy('id', 'DESC')->paginate(5);

        return view('admin.guru.index', ['data' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.guru.create');
        }

        return redirect()->route('guru.index')->with('danger','Anda tidak punya akses untuk menambah guru!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruRequest $request)
    {
        try{
            $guru = new Guru();
            $guru->nbm = $request->nbm;
            $guru->nama = $request->nama;
            $guru->tempat_lahir = $request->tempat_lahir;
            $ttl = explode('/', $request->tgl_lahir);
            $guru->gender = $request->gender;
            $guru->phone_number = $request->phone_number;
            $guru->email = $request->email;
            $guru->alamat = $request->alamat;
            $guru->pendidikan = $request->pendidikan;

            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('guru');
                $guru->foto = $fotoPath;
            }


            if (count($ttl) == 3) {
                $tanggalLahir = $ttl[2] . '-' . $ttl[1] . '-' . $ttl[0];
                $guru->tgl_lahir = $tanggalLahir;
            } else {
                return redirect()->route('guru.create')->with('danger', 'Format tanggal lahir tidak valid!');
            }

            $guru->save();
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
            
        } catch(\Exception $e){
            return redirect()->route('guru.create')->with('danger', 'Data guru gagal ditambahkan: '. $e->getMessage());
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
        $guru = Guru::find($id);

        if(!$guru){
            return redirect()->route('guru.index')->with('danger', 'Data guru tidak ditemukan');
        }

        if(Gate::allows('admin')){
            return view('admin.guru.edit', compact('guru'));
        }

        return redirect()->route('guru.index')->with('danger','Anda tidak punya akses untuk edit guru!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuruRequest $request, $id)
    {
        $guru = Guru::find($id);

        try{
            $guru->nbm = $request->nbm;
            $guru->nama = $request->nama;
            $guru->tempat_lahir = $request->tempat_lahir;
            $ttl = explode('/',$request->tgl_lahir);
            $guru->gender = $request->gender;
            $guru->phone_number = $request->phone_number;
            $guru->email = $request->email;
            $guru->alamat = $request->alamat;
            $guru->pendidikan = $request->pendidikan;

            if($request->hasFile('foto')){
                if($guru->foto != null){
                    Storage::delete($guru->foto);
                }

                $guru->foto = $request->file('foto')->store('guru');
            }

            if (count($ttl) == 3) {
                $tanggalLahir = $ttl[2] . '-' . $ttl[1] . '-' . $ttl[0];
                $guru->tgl_lahir = $tanggalLahir;
            } else {
                return redirect()->route('guru.edit', $id)->with('danger', 'Format tanggal lahir tidak valid!');
            }

            $guru->save();
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diedit!');
            
        } catch(\Exception $e){
            return redirect()->route('guru.edit',$id)->with('danger', 'Data guru gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return redirect()->route('guru.index')->with('danger', 'Guru tidak ditemukan!');
        }

        if ($guru->foto !== null) {
            Storage::delete($guru->foto);
        }

        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus!');
    }
}
