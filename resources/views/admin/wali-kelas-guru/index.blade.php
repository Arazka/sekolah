@extends('layouts.admin')

@section('title', 'Data Wali Kelas')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Wali Kelas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Wali Kelas</li>
            </ol>
        </nav>
    </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       @can('admin')
        <a class="btn btn-primary" href="{{ route('wali-kelas.create') }}">Tambah Wali Kelas</a>
       @endcan 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=300>Nama Guru</th>
                <th>Wali Kelas</th>
                @can('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $waliKelas)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                {{-- <td><img src="{{ asset('storage/' . $waliKelas->foto) }}" alt="" style="width: 5rem"></td> --}}
                <td>{{ $waliKelas->nama }}</td>
                <td>{{ $waliKelas->nama_kelas }}</td>
                @can('admin')
                <td class="gap-2 text-center">
                  <form id="delete-waliKelas-{{$waliKelas->id}}" action="{{ route('wali-kelas.delete',$waliKelas->id) }}" method="POST">
                    <a href="{{ route('wali-kelas.edit', $waliKelas->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                </td>
                @endcan
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <div class="showing">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
          </div>
          <div class="paginate">
            {{ $data->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection