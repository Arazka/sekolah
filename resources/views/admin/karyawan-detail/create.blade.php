@extends('layouts.admin')

@section('title', 'Tambah Karyawan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Karyawan</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('karyawan-detail.index') }}">Data Karyawan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Karyawan</li>
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
      <form method="POST" action="{{ route('karyawan-detail.store') }}">
        @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputJK">Nama Karyawan</label>
                        <select class="form-control" name="data_karyawan_id" id="data_karyawan_id" required>
                          <option value="">--- Nama Karyawan ---</option>
                            @foreach ($karyawan as $key => $karyawans)
                                <option value="{{ $karyawans->id }}">{{ $karyawans->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Tugas</label>
                        <select class="form-control" name="tugas_karyawan_id" id="tugas_karyawan_id" required>
                          <option value="">--- Tugas ---</option>
                            @foreach ($tugas as $key => $tugases)
                                <option value="{{ $tugases->id }}">{{ $tugases->nama_tugas }}</option>
                            @endforeach
                        </select>
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
