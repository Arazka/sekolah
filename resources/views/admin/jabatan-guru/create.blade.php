@extends('layouts.admin')

@section('title', 'Tambah Jabatan Guru')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Jabatan Guru</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jabatan-guru.index') }}">Data Jabatan Guru</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Jabatan Guru</li>
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
      <form method="POST" action="{{ route('jabatan-guru.store') }}">
        @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputJK">Nama Guru</label>
                        <select class="form-control" name="guru_id" id="guru_id" required>
                          <option value="">--- Nama Guru ---</option>
                            @foreach ($guru as $key => $gurus)
                                <option value="{{ $gurus->id }}">{{ $gurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Nama Jabatan</label>
                        <select class="form-control" name="jabatan_id" id="jabatan_id" required>
                          <option value="">--- Nama Jabatan ---</option>
                            @foreach ($jabatan as $key => $jabatans)
                                <option value="{{ $jabatans->id }}">{{ $jabatans->nama_jabatan }}</option>
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
