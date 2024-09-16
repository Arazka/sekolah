@extends('layouts.admin')

@section('title', 'Tambah Data Profil')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Profil</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profil.index') }}"> Data Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Profil</li>
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
      <form method="POST" action="{{ route('profil.store') }}" enctype="multipart/form-data">
        @csrf
                <div class="card-body">
                  <div class="mb-3">
                    <label for="foto" class="form-label">Upload foto</label>
                    <img class="img-preview img-fluid col-sm-3 mb-3">
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                    @error('foto')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sejarah</label>
                    <input id="sejarah" type="hidden" name="sejarah" value="{{ old('sejarah') }}">
                    <trix-editor input="sejarah"></trix-editor>
                    @error('sejarah')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Misi</label>
                      <input id="misi" type="hidden" name="misi" value="{{ old('misi') }}">
                      <trix-editor input="misi"></trix-editor>
                      @error('misi')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Visi</label>
                      <input id="visi" type="hidden" name="visi" value="{{ old('visi') }}">
                      <trix-editor input="visi"></trix-editor>
                      @error('visi')
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