<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\AdminBanner;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = AdminBanner::orderBy('id','asc')->paginate(3);

        return view('admin.banner.index', ['data' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.banner.create');
        }

        return redirect()->route('banner.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        try{
            $banner = new AdminBanner();
            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('banner');
                $banner->foto = $fotoPath;
            }
            $banner->judul_banner = $request->judul_banner;

            $banner->save();
            return redirect()->route('banner.index')->with('success','Banner berhasil ditambahkan!');
            
        }catch(\Exception $e){
            return redirect()->route('banner.create')->with('danger','Banner gagal ditambahkan: '. $e->getMessage());
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
        $banner = AdminBanner::find($id);

        if(!$banner){
            return redirect()->route('banner.index')->with('danger','Banner tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.banner.edit', compact('banner'));
        }

        return redirect()->route('banner.index')->with('danger','Anda tidak punya akses!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, $id)
    {
        $banner = AdminBanner::find($id);

        try{
            if($request->hasFile('foto')){
                if($banner->foto != null){
                    Storage::delete($banner->foto);
                }
                $fotoPath = $request->file('foto')->store('banner');
                $banner->foto = $fotoPath;
            }
            $banner->judul_banner = $request->judul_banner;

            $banner->save();
            return redirect()->route('banner.index')->with('success','Banner berhasil diedit!');
            
        }catch(\Exception $e){
            return redirect()->route('banner.edit',$id)->with('danger','Banner gagal diedit: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = AdminBanner::find($id);

        if($banner->foto != null){
            Storage::delete($banner->foto);
        }

        $banner->delete();
        return redirect()->route('banner.index')->with('success','Banner berhasil dihapus!');
    }
}
