<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BeritaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::join('users', 'users.id', '=', 'beritas.user_id')
                          ->select([
                            'users.username',
                            'beritas.id',
                            'beritas.foto',
                            'beritas.judul_berita',
                            'beritas.deskripsi',
                            'beritas.tanggal_publikasi',
                            'beritas.status'
                          ])
                          ->orderBy('beritas.id', 'DESC')
                          ->paginate(3);

        return view('admin.berita.index', ['data' => $berita]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();

        return view('admin.berita.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaRequest $request)
    {

        try {
            $berita = new Berita();
            $berita->user_id = Auth::user()->id;
            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $tanggalParts = explode('/', $request->tanggal_publikasi);
            
            if (count($tanggalParts) == 3) {
                $tanggalPublikasi = $tanggalParts[2] . '-' . $tanggalParts[1] . '-' . $tanggalParts[0];
                $berita->tanggal_publikasi = $tanggalPublikasi;
            } else {
                return redirect()->route('berita.create')->with('danger', 'Format tanggal publikasi tidak valid!');
            }

            $berita->status = $request->status;

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('berita');
                $berita->foto = $fotoPath;
            }

            $berita->save();
            return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
            
        } catch (\Exception $e) {
            return redirect()->route('berita.create')->with('danger', 'Berita gagal ditambahkan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::all();
        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->route('berita.index')->with('danger', 'Berita tidak ditemukan!');
        }

        if($berita->user_id == Auth::user()->id || Auth::user()->type == 'admin'){
            return view('admin.berita.edit', compact('user', 'berita'));
        }
        return view('admin.404');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaRequest $request, $id)
    {
        $berita = Berita::find($id);

        try {
            if($request->hasFile('foto')){
                if($berita->foto != null){
                    Storage::delete($berita->foto);
                }

                $berita->foto = $request->file('foto')->store('berita');

            }
            
            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $tanggalParts = explode('/', $request->tanggal_publikasi);

            if (count($tanggalParts) == 3) {
                $tanggalPublikasi = $tanggalParts[2] . '-' . $tanggalParts[1] . '-' . $tanggalParts[0];
                $berita->tanggal_publikasi = $tanggalPublikasi;
            } else {
                return redirect()->route('berita.edit',$id)->with('danger', 'Format tanggal publikasi tidak valid!');
            }

            $berita->status = $request->status;

            $berita->save();
            return redirect()->route('berita.index')->with('success', 'Berita berhasil diedit!');

        } catch(\Exception $e) {
            return redirect()->route('berita.edit',$id)->with('danger', 'Berita gagal diedit: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->route('berita.index')->with('danger', 'Berita tidak ditemukan!');
        }

        if ($berita->foto !== null) {
            Storage::delete($berita->foto);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
