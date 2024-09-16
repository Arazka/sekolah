<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KaryawanDetail;
use Illuminate\Http\Request;
use App\Http\Requests\KaryawanDetailRequest;
use App\Models\DataKaryawan;
use App\Models\TugasKaryawan;
use Illuminate\Support\Facades\Gate;

class KaryawanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawandetail = KaryawanDetail::join('data_karyawans','data_karyawans.id','=','karyawan_details.data_karyawan_id')
                                        ->join('tugas_karyawans','tugas_karyawans.id','=','karyawan_details.tugas_karyawan_id')
                                        ->select([
                                            'karyawan_details.id',
                                            'data_karyawans.nama',
                                            'tugas_karyawans.nama_tugas'
                                        ])
                                        ->orderBy('karyawan_details.id','desc')
                                        ->paginate(5);

        return view('admin.karyawan-detail.index', ['data' => $karyawandetail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = DataKaryawan::all();
        $tugas = TugasKaryawan::all();

        if(Gate::allows('admin')){
            return view('admin.karyawan-detail.create', compact('karyawan','tugas'));
        }

        return redirect()->route('karyawan-detail.index')->with('danger','Anda tidak punya akses untuk menambah karyawan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanDetailRequest $request)
    {
        try{
            $karyawandetail = new KaryawanDetail();
            $karyawandetail->data_karyawan_id = $request->data_karyawan_id;
            $karyawandetail->tugas_karyawan_id = $request->tugas_karyawan_id;

            $karyawandetail->save();
            return redirect()->route('karyawan-detail.index')->with('success','Data detail karyawan berhasil ditambahkan!');
            
        } catch(\Exception $e) {
            return redirect()->route('karyawan-detail.create')->with('danger','Data detail karyawan gagal ditambahkan: '. $e->getMessage());
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
        $karyawandetail = KaryawanDetail::find($id);
        $karyawan = DataKaryawan::all();
        $tugas = TugasKaryawan::all();

        if(!$karyawandetail){
            return redirect()->route('karyawan-detail.index')->with('danger','Data detail karyawan tidak ditemukan!');
        }

        if(Gate::allows('admin')){
            return view('admin.karyawan-detail.edit', compact('karyawandetail','karyawan','tugas'));
        }

        return redirect()->route('karyawan-detail.index')->with('danger','Anda tidak punya akses untuk edit karyawan!');
        
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanDetailRequest $request, $id)
    {
        $karyawandetail = KaryawanDetail::find($id);
        
        try{
            $karyawandetail->data_karyawan_id = $request->data_karyawan_id;
            $karyawandetail->tugas_karyawan_id = $request->tugas_karyawan_id;

            $karyawandetail->save();
            return redirect()->route('karyawan-detail.index')->with('success','Data detail karyawan berhasil diedit!');

        } catch(\Exception $e) {
            return redirect()->route('karyawan-detail.edit',$id)->with('danger','Data detail karyawan gagal diedti: '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawandetail = KaryawanDetail::find($id);

        if(!$karyawandetail){
            return redirect()->route('karyawan-detail.index')->with('danger','Data detail karyawan tidak ditemukan!');
        }
        
        $karyawandetail->delete();
        return redirect()->route('karyawan-detail.index')->with('success','Data detail karyawan berhasil dihapus!');
    }
}
