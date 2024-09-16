@extends('layouts.admin')

@section('title', 'Data Profil')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Profil</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Profil</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      {{-- <a class="btn btn-primary" href="{{ route('profil.create') }}">Tambah Data Profil</a>  --}}
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=155>Foto</th>
                <th width=500>Sejarah</th>
                <th width=500>Misi</th>
                <th width=500>Visi</th>
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $profil)
              @can('admin')
              <a href="{{ route('profil.edit',$profil->id) }}" class="btn btn-success mb-3"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
              @endcan
              <tr>
                <td>{{ $key + 1 }}</td>
                <td><img src="{{ asset('storage/' . $profil->foto) }}" alt="" style="width: 8rem"></td>
                <td>{!! Str::limit($profil->sejarah, 170) !!}</td>
                <td>{!! Str::limit($profil->misi, 170) !!}</td>
                <td>{!! Str::limit($profil->visi, 170) !!}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
    </div>
    </div>
</div>
@endsection
