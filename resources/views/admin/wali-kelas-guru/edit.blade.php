@extends('layouts.admin')

@section('title', 'Edit Wali Kelas')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Wali Kelas</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('wali-kelas.index') }}">Data Wali Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Wali Kelas</li>
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
      <form method="POST" action="{{ route('wali-kelas.update', $waliKelas->id) }}">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputJK">Nama Guru</label>
                        <select class="form-control" name="guru_id" id="guru_id" required>
                          <option value="">--- Nama Guru ---</option>
                            @foreach ($guru as $key => $gurus)
                                <option value="{{ $gurus->id }}" @if ($gurus->id == $waliKelas->guru_id)
                                    selected=""
                                @endif>{{ $gurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Wali Kelas</label>
                        <select class="form-control" name="kelas_id" id="kelas_id" required>
                          <option value="">--- Wali Kelas ---</option>
                            @foreach ($kelas as $key => $kelases)
                                <option value="{{ $kelases->id }}" @if ($kelases->id == $waliKelas->kelas_id)
                                   selected="" 
                                @endif>{{ $kelases->nama_kelas }}</option>
                            @endforeach
                        </select>
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
