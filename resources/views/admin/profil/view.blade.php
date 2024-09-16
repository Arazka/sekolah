@extends('layouts.admin')

@section('title', 'Lihat Berita')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Lihat Data Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/berita') }}">Data Berita</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lihat Data Berita</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        @if ($data != null)
        @foreach ($data as $berita)
          <div class="card mb-3 p-3" style="max-width: 100%">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded-start" alt="..." style="border-radius: 0.4rem" />
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title fs-3"><strong>{{ $berita->judul }}</strong></h5>
                  <p class="card-text">
                    {!! $berita->deskripsi !!}
                  </p>
                  {{-- <p class="card-text"><small class="text-body-secondary">{{ $berita->created_at }}</small></p> --}}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
      </div>
    </div>
  </div>
@endsection