@extends('layouts.admin')

@section('title', 'Edit Jabatan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Jabatan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Data Jabatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Jabatan</li>
      </ol>
    </nav>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('jabatan.update', $jabatan->id) }}">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Jabatan</label>
                        <input type="text" class="form-control" name="kode_jabatan" id="kode_jabatan" placeholder="kode jabatan" value="{{ old('kode_jabatan', $jabatan->kode_jabatan) }}" required>
                        @error('kode_jabatan')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="nama jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>
                        @error('nama_jabatan')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>     
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
      </form>
    </div>
  </div>
</div>

@endsection
