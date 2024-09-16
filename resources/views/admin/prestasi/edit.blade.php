@extends('layouts.admin')

@section('title', 'Edit Prestasi')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Prestasi</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('prestasi.index') }}">Data Prestasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Prestasi</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  @include ('includes.flash')
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('prestasi.update', $prestasi->id) }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$prestasi->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="nama">Nama Prestasi</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="{{ old('nama', $prestasi->nama) }}" required>
                        @error('nama')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $prestasi->deskripsi) }}" required>
                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" id="datepick" name="tanggal" class="form-control" placeholder="01/01/2001" value="{{ old('tanggal', date('d/m/Y', strtotime($prestasi->tanggal))) }}">
                        @error('tanggal')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" id="nama_penerima" name="nama_penerima" class="form-control" placeholder="nama_penerima" value="{{ old('nama_penerima', $prestasi->nama_penerima) }}">
                        @error('nama_penerima')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>               
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" placeholder="kategori" value="{{ old('kategori', $prestasi->kategori) }}">
                        @error('kategori')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>               
                    <div class="form-group">
                        <label for="level_pencapaian">Tingkat</label>
                        <input type="text" id="level_pencapaian" name="level_pencapaian" class="form-control" placeholder="level_pencapaian" value="{{ old('level_pencapaian', $prestasi->level_pencapaian) }}">
                        @error('level_pencapaian')
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

@include('includes.scripts')
<script>
  $(function() {
    $.datepicker.setDefaults($.datepicker.regional['id']);
    $("#datepick").datepicker();
  });
</script> 
@endsection