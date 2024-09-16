@extends('layouts.admin')

@section('title', 'Tambah Fasilitas')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Fasilitas</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('fasilitas.index') }}">Data Fasilitas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Fasilitas</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  @include ('includes.flash')
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('fasilitas.store') }}" enctype="multipart/form-data">
        @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img class="img-preview img-fluid col-sm-3 mb-3">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()" required>
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas" placeholder="nama fasilitas" value="{{ old('nama_fasilitas') }}" required>
                        @error('nama_fasilitas')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}" required>
                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="jenis_fasilitas">Jenis Fasilitas</label>
                        <input type="text" id="jenis_fasilitas" name="jenis_fasilitas" class="form-control" placeholder="jenis fasilitas" value="{{ old('jenis_fasilitas') }}">
                        @error('jenis_fasilitas')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="kondisi_fasilitas">Kondisi Fasilitas</label>
                        <input type="text" id="kondisi_fasilitas" name="kondisi_fasilitas" class="form-control" placeholder="kondisi fasilitas" value="{{ old('kondisi_fasilitas') }}">
                        @error('kondisi_fasilitas')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>               
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="koordinator kegiatan" value="{{ old('lokasi') }}">
                        @error('lokasi')
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

<script>
function previewImage() {
    const image = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection