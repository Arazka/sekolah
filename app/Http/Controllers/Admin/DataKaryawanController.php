<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use App\Http\Requests\DataKaryawanRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKaryawan = DataKaryawan::orderBy('id','desc')->paginate(3);

        return view('admin.data-karyawan.index', ['data' => $dataKaryawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.data-karyawan.create');
        }

        return redirect()->route('data-karyawan.index')->with('danger','Anda tidak punya akses untuk menambah data keryawan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataKaryawanRequest $request)
    {
        try{
            $dataKaryawan = new DataKaryawan();
            $dataKaryawan->nbm = $request->nbm;
            $dataKaryawan->nama = $request->nama;
            $dataKaryawan->tempat_lahir = $request->tempat_lahir;
            $ttl = explode('/', $request->tgl_lahir);
            $dataKaryawan->gender = $request->gender;
            $dataKaryawan->phone_number = $request->phone_number;
            $dataKaryawan->email = $request->email;
            $dataKaryawan->alamat = $request->alamat;
            $dataKaryawan->pendidikan = $request->pendidikan;

            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('data-karyawan');
                $dataKaryawan->foto = $fotoPath;
            }

            if(count($ttl) == 3){
                $tanggalLahir = $ttl[2].'-'.$ttl[1].'-'.$ttl[0];
                $dataKaryawan->tgl_lahir = $tanggalLahir;
            } else {
                return redirect()->route('data-karyawan.create')->with('danger', 'Format tanggal lahir tidak valid!');
            }
            
            $dataKaryawan->save();
            return redirect()->route('data-karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('data-karyawan.create')->with('success', 'Data karyawan gagal ditambahkan: '. $e->getMessage());
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
        $dataKaryawan = DataKaryawan::find($id);

        if(!$dataKaryawan){
            return redirect()->route('data-karyawan.index')->with('danger','Data karyawan tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.data-karyawan.edit', compact('dataKaryawan'));
        }

        return redirect()->route('data-karyawan.index')->with('danger','Anda tidak punya akses untuk edit data keryawan!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataKaryawanRequest $request, $id)
    {
        $dataKaryawan = DataKaryawan::find($id);

        try{
            $dataKaryawan->nbm = $request->nbm;
            $dataKaryawan->nama = $request->nama;
            $dataKaryawan->tempat_lahir = $request->tempat_lahir;
            $ttl = explode('/', $request->tgl_lahir);
            $dataKaryawan->gender = $request->gender;
            $dataKaryawan->phone_number = $request->phone_number;
            $dataKaryawan->email = $request->email;
            $dataKaryawan->alamat = $request->alamat;
            $dataKaryawan->pendidikan = $request->pendidikan;

            if($request->hasFile('foto')){
                if($dataKaryawan->foto != null){
                    Storage::delete($dataKaryawan->foto);
                }

                $fotoPath = $request->file('foto')->store('data-karyawan');
                $dataKaryawan->foto = $fotoPath;
            }

            if(count($ttl) == 3){
                $tanggalLahir = $ttl[2].'-'.$ttl[1].'-'.$ttl[0];
                $dataKaryawan->tgl_lahir = $tanggalLahir;
            } else {
                return redirect()->route('data-karyawan.edit', $id)->with('danger', 'Format tanggal lahir tidak valid!');
            }
            
            $dataKaryawan->save();
            return redirect()->route('data-karyawan.index')->with('success', 'Data karyawan berhasil diedit!');
            
        } catch(\Exception $e) {
            return redirect()->route('data-karyawan.edit', $id)->with('success', 'Data karyawan gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataKaryawan = DataKaryawan::find($id);

        if(!$dataKaryawan){
            return redirect()->route('data-karayawan.index')->with('danger','Data karyawan tidak ditemukan!');
        }
        
        if($dataKaryawan->foto != null){
            Storage::delete($dataKaryawan->foto);
        }
        
        $dataKaryawan->delete();
        return redirect()->route('data-karyawan.index')->with('success','Data karyawan berhasil dihapus!');
    }
}
