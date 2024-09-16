@extends('layouts.admin')

@section('title', 'Data Tugas Karyawan')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Tugas Karyawan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tugas Karyawan</li>
            </ol>
        </nav>
    </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        @can('admin')
        <a class="btn btn-primary" href="{{ route('tugas-karyawan.create') }}">Tambah Tugas</a>
        @endcan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=300>Kode Tugas</th>
                <th>Nama Tugas</th>
                @can('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $tugasKaryawan)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $tugasKaryawan->kode_tugas }}</td>
                <td>{{ $tugasKaryawan->nama_tugas }}</td>
                @can('admin')
                <td class="gap-2 text-center">
                  <form id="delete-tugasKaryawan-{{$tugasKaryawan->id}}" action="{{ route('tugas-karyawan.delete',$tugasKaryawan->id) }}" method="POST">
                    <a href="{{ route('tugas-karyawan.edit', $tugasKaryawan->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
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