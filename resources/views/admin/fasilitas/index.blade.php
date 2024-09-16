@extends('layouts.admin')

@section('title', 'Data Fasilitas')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Fasilitas</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Fasilitas</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
        @can('admin')
        <a class="btn btn-primary" href="{{ route('fasilitas.create') }}">Tambah Fasilitas</a> 
        @endcan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=150>Foto</th>
                <th>Nama Fasilitas</th>
                <th>Jenis Fasilitas</th>
                <th>Kondisi Fasilitas</th>
                <th>Lokasi</th>
                @can('admin')
                <th width=120>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $fasilitas)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $fasilitas->foto) }}" alt="" style="width: 5rem"></td>
                <td>{{ $fasilitas->nama_fasilitas }}</td>
                <td>{{ $fasilitas->jenis_fasilitas }}</td>
                <td>{{ $fasilitas->kondisi_fasilitas }}</td>
                <td>{{ $fasilitas->lokasi }}</td>
                @can('admin')
                <td class="gap-2 text-center">
                  <form id="delete-fasilitas-{{$fasilitas->id}}" action="{{ route('fasilitas.delete',$fasilitas->id) }}" method="POST">
                  @csrf @method('DELETE')
                  <a href="{{ route('fasilitas.edit',$fasilitas->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i>
                      </button>
                  </form>
                </td>
                @endcan
              </tr>
              @endforeach
              @endif
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