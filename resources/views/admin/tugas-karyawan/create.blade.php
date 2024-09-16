@extends('layouts.admin')

@section('title', 'Tambah Tugas Karyawan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Tugas Karyawan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tugas-karyawan.index') }}">Data Tugas Karyawan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Tugas Karyawan</li>
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
      <form method="POST" action="{{ route('tugas-karyawan.store') }}">
        @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Tugas</label>
                        <input type="text" class="form-control" name="kode_tugas" id="kode_tugas" placeholder="kode tugas" value="{{ old('kode_tugas') }}" required>
                        @error('kode_tugas')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Tugas</label>
                        <input type="text" class="form-control" name="nama_tugas" id="nama_tugas" placeholder="nama tugas" value="{{ old('nama_tugas') }}" required>
                        @error('nama_tugas')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>     
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
      </form>
    </div>
  </div>
</div>

@endsection
