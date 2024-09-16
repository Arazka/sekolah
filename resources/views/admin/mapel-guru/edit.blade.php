@extends('layouts.admin')

@section('title', 'Edit Guru Mapel')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Guru Mapel</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mapel-guru.index') }}">Data Guru Mapel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Guru Mapel</li>
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
      <form method="POST" action="{{ route('mapel-guru.update', $mapelGuru->id) }}">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputJK">Nama Guru</label>
                        <select class="form-control" name="guru_id" id="guru_id" required>
                          <option value="">--- Nama Guru ---</option>
                            @foreach ($guru as $key => $gurus)
                                <option value="{{ $gurus->id }}" @if ($gurus->id == $mapelGuru->guru_id)
                                    selected=""
                                @endif>{{ $gurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="mapel_id" required>
                          <option value="">--- Mata Pelajaran ---</option>
                            @foreach ($mapel as $key => $mapels)
                                <option value="{{ $mapels->id }}" @if ($mapels->id == $mapelGuru->mapel_id)
                                   selected="" 
                                @endif>{{ $mapels->nama_mapel }}</option>
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
