<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = Profil::all();

        return view('admin.profil.index', ['data' => $profil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.profil.create');
        }

        return redirect()->route('profil.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfilRequest $request)
    {
        try{
            $profil = new Profil();
            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('profil');
                $profil->foto =$fotoPath;
            }
            $profil->sejarah = $request->sejarah;
            $profil->misi = $request->misi;
            $profil->visi = $request->visi;

            $profil->save();
            return redirect()->route('profil.index')->with('success','Data profil berhasil ditambahkan!');
            
        }catch(\Exception $e){
            return redirect()->route('profil.create')->with('danger','Data profil gagal ditambahkan: '. $e->getMessage());
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
        $profil = Profil::find($id);

        if(!$profil){
            return redirect()->route('profil.index')->with('danger', 'Data profil tidak ditemukan');
        }
        
        if(Gate::allows('admin')){
            return view('admin.profil.edit', compact('profil'));
        }
        
        return redirect()->route('profil.index')->with('danger', 'Anda tidak punya akses untuk edit data!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfilRequest $request, $id)
    {
        $profil = Profil::find($id);

        try{
            if($request->hasFile('foto')){
                if($profil->foto != null){
                    Storage::delete($profil->foto);
                }
                $fotoPath = $request->file('foto')->store('profil');
                $profil->foto =$fotoPath;
            }
            $profil->sejarah = $request->sejarah;
            $profil->misi = $request->misi;
            $profil->visi = $request->visi;

            $profil->save();
            return redirect()->route('profil.index')->with('success','Data profil berhasil diedit!');
            
        }catch(\Exception $e){
            return redirect()->route('profil.edit',$id)->with('danger','Data profil gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
