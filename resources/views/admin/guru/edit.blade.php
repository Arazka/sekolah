@extends('layouts.admin')

@section('title', 'Edit Guru')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Edit Guru</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Data Guru</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Guru</li>
      </ol>
    </nav>
  </div>

  <!-- DataTales Example -->
  @include ('includes.flash')
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('guru.update', $guru->id) }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$guru->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nbm">NBM</label>
                        <input type="text" class="form-control" name="nbm" id="nbm" placeholder="nbm" value="{{ old('nbm', $guru->nbm) }}" required>
                        @error('nbm')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="{{ old('nama', $guru->nama) }}" required>
                        @error('nama')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="tempat lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}" required>
                        @error('tempat_lahir')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" id="datepick" name="tgl_lahir" class="form-control" placeholder="01/01/2001" value="{{ old('tgl_lahir', date('d/m/Y', strtotime($guru->tgl_lahir))) }}">
                        @error('tgl_lahir')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJK">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="laki-laki" @if ($guru->gender == 'laki-laki')
                                selected=""
                            @endif>Laki-Laki</option>
                            <option value="perempuan" @if ($guru->gender == 'perempuan')
                                selected=""
                            @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPendidikanTerakhir">Nomor Telphone</label>
                        <input id="phone_number" type="number" class="form-control form-control-user @error('phone_number') is-invalid @enderror" name="phone_number" id="phoneValidation" value="{{ old('phone_number', $guru->phone_number) }}" placeholder="Nomor Telphone" required autocomplete="nik" style="-webkit-appearance: none;margin: 0;">
                        @error('phone_number')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="datepick" name="email" class="form-control" placeholder="email" value="{{ old('email', $guru->email) }}">
                        @error('email')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" id="datepick" name="pendidikan" class="form-control" placeholder="pendidikan" value="{{ old('pendidikan', $guru->pendidikan) }}">
                        @error('pendidikan')
                          <span class="text-danger">
                            {{ $message }}
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="alamat" required>{{ old('alamat', $guru->alamat) }}</textarea>
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

document.addEventListener('trix-file-accept', function(e) {
  e.preventDefault();
})
</script>

@include('includes.scripts')
<script>
  $(function() {
    $.datepicker.setDefaults($.datepicker.regional['id']);
    $("#datepick").datepicker();
  });

  $('#phoneValidation').on('keyup', function () {
        this.value = this.value.replace(/[^0-9]/gi, '')
  });
</script> 
@endsection