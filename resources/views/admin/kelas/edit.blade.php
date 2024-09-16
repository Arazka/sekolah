@extends('layouts.admin')

@section('title', 'Edit Kelas')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Kelas</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Data Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Kelas</li>
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
      <form method="POST" action="{{ route('kelas.update', $kelas->id) }}">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Kelas</label>
                        <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="kode kelas" value="{{ old('kode_kelas', $kelas->kode_kelas) }}" required>
                        @error('kode_kelas')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="nama kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                        @error('nama_kelas')
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
