@extends('layouts.admin')

@section('title', 'Edit Tugas Karyawan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Tugas Karyawan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tugas-karyawan.index') }}">Data Tugas Karyawan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Tugas Karyawan</li>
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
      <form method="POST" action="{{ route('tugas-karyawan.update', $tugasKaryawan->id) }}">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Tugas</label>
                        <input type="text" class="form-control" name="kode_tugas" id="kode_tugas" placeholder="kode tugas" value="{{ old('kode_tugas', $tugasKaryawan->kode_tugas) }}" required>
                        @error('kode_tugas')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Tugas</label>
                        <input type="text" class="form-control" name="nama_tugas" id="nama_tugas" placeholder="nama tugas" value="{{ old('nama_tugas', $tugasKaryawan->nama_tugas) }}" required>
                        @error('nama_tugas')
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
