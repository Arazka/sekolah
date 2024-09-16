@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Data Berita</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Berita</li>
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
      <form method="POST" action="{{ route('berita.update',$berita->id) }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$berita->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" class="form-control" name="judul_berita" id="judul_berita" placeholder="judul berita" value="{{ old('judul_berita', $berita->judul_berita) }}" required>
                        @error('judul_berita')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $berita->deskripsi) }}" required>
                      <trix-editor input="deskripsi"></trix-editor>
                      <p id="deskripsiValidationMessage" class="text-danger"></p>
                      @error('deskripsi')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                      <input type="text" id="datepick" name="tanggal_publikasi" class="form-control" placeholder="2001-01-01" value="{{ old('tanggal_publikasi', date('d/m/Y', strtotime($berita->tanggal_publikasi))) }}">
                      @error('tanggal_publikasi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                      <select name="status" id="status" class="form-control" required>
                         <option value="draft" @if ($berita->status == 'draft')
                           selected=""
                         @endif>Draft</option>
                         <option value="publish" @if ($berita->status == 'publish')
                           selected=""
                         @endif>Publish</option>
                         {{-- <option value="publish">Publish</option> --}}
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