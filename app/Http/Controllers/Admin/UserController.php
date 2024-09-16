<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->paginate(5);

        return view('admin.account.index', ['data' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('admin')){
            return view('admin.account.create');
        }

        return redirect()->route('account.index')->with('danger','Anda tidak memiliki akses untuk menambah data akun!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'type' => $request->type,
            'username' => $request->username,
            'password' => Hash::make($request['password'])
        ]);

        if($user){
            return redirect()->route('account.index')->with('success', 'Data akun berhasil ditambahkan!');
        } else {
            return redirect()->route('account.create')->with('danger', 'Data akun gagal ditambahkan!');
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
        $user = User::find($id);

        if(!$user){
            return redirect()->route('account.index')->with('danger', 'Data user tidak ditemukan');
        }

        if(Gate::allows('admin')){
            return view('admin.account.edit', compact('user'));
        }

        return redirect()->route('account.index')->with('danger','Anda tidak memiliki akses untuk edit data akun!');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'type' => $request->type,
            'username' => $request->username,
            'password' => Hash::make($request['password'])
        ]);

        if($user){
            return redirect()->route('account.index')->with('success', 'Data akun berhasil diedit!');
        } else {
            return redirect()->route('account.edit',$id)->with('danger', 'Data akun gagal diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        if($user){
            return redirect()->route('account.index')->with('success', 'Data akun berhasil dihapus!');
        } else {
            return redirect()->route('account.index')->with('danger', 'Data akun gagal dihapus!');
        }
    }
}
