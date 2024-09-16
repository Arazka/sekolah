@extends('layouts.admin')

@section('title', 'Data Karyawan')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
        @can('admin')
        <a class="btn btn-primary" href="{{ route('data-karyawan.create') }}">Tambah Data Karyawan</a> 
        @endcan
      {{-- <a class="btn btn-warning" href="{{ route('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=150>Foto</th>
                <th>Nama Karyawan</th>
                <th>NBM</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                @can('admin')
                <th width=120>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $dataKaryawan)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $dataKaryawan->foto) }}" alt="" style="width: 5rem"></td>
                <td>{{ $dataKaryawan->nama }}</td>
                <td>{{ $dataKaryawan->nbm }}</td>
                <td>{{ $dataKaryawan->tempat_lahir }}</td>
                <td>{{ date('d/m/Y', strtotime($dataKaryawan->tgl_lahir)) }}</td>
                <td>{{ $dataKaryawan->gender }}</td>
                @can('admin')
                <td class="gap-2 text-center">
                  <form id="delete-dataKaryawan-{{$dataKaryawan->id}}" action="{{ route('data-karyawan.delete',$dataKaryawan->id) }}" method="POST">
                  @csrf @method('DELETE')
                  <a href="{{ route('data-karyawan.edit',$dataKaryawan->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
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