@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Ekstrakurikuler</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ekstrakurikuler.index') }}">Data Ekstrakurikuler</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Ekstrakurikuler</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  @include ('includes.flash')
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('ekstrakurikuler.store') }}" enctype="multipart/form-data">
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
                        <label for="nama">Nama Ekstrakurikuler</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama ekstrakurikuler" value="{{ old('nama') }}" required>
                        @error('nama')
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
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" placeholder="kategori" value="{{ old('kategori') }}">
                        @error('kategori')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="jadwal_pertemuan">Jadwal Pertemuan</label>
                        <input type="text" id="jadwal_pertemuan" name="jadwal_pertemuan" class="form-control" placeholder="Setiap hari kamis, 08.00-10.00 WIB" value="{{ old('jadwal_pertemuan') }}">
                        @error('jadwal_pertemuan')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>               
                    <div class="form-group">
                        <label for="koordinator_kegiatan">Koordinator Kegiatan</label>
                        <input type="text" id="koordinator_kegiatan" name="koordinator_kegiatan" class="form-control" placeholder="koordinator kegiatan" value="{{ old('koordinator_kegiatan') }}">
                        @error('koordinator_kegiatan')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>               
                    <div class="form-group">
                        <label for="koordinator_kegiatan">Lokasi Kegiatan</label>
                        <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" class="form-control" placeholder="lokasi kegiatan" value="{{ old('lokasi_kegiatan') }}">
                        @error('lokasi_kegiatan')
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