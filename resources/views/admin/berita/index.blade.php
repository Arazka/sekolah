@extends('layouts.admin')

@section('title', 'Data Berita')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
        <a class="btn btn-primary" href="{{ route('berita.create') }}">Tambah Berita</a> 
      {{-- <a class="btn btn-warning" href="{{ route('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=155>Foto</th>
                <th>Judul</th>
                <th width=450>Deskripsi</th>
                <th width=200>Keterangan</th>
                <th width=120>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $berita)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $berita->foto) }}" alt="" style="width: 8rem"></td>
                <td>{{ $berita->judul_berita }}</td>
                <td>{!! Str::limit($berita->deskripsi, 170) !!}</td>
                <td>
                  <div><small>- Tanggal: </small> {{ date('d/m/Y', strtotime($berita->tanggal_publikasi)) }}</div>
                  <div>
                    <small>- Penulis: </small> 
                    <span class="badge rounded-pill bg-primary text-capitalize">
                      {{ $berita->username }}
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </div>
                  <div>
                    <small>- Status: </small>
                    @if ($berita->status == 'draft')
                    <span class="badge rounded-pill bg-danger text-capitalize">
                      {{ $berita->status }}
                      <span class="visually-hidden">unread messages</span>
                    </span>
                    @else
                    <span class="badge rounded-pill bg-success text-capitalize">
                      {{ $berita->status }}
                      <span class="visually-hidden">unread messages</span>
                    </span>
                    @endif
                  </div>
                </td>
                @if (Auth::user()->username === $berita->username || Auth::user()->type === 'admin')
                <td class="gap-2 text-center">
                  <form id="delete-berita-{{$berita->id}}" action="{{ route('berita.delete',$berita->id) }}" method="POST">
                  @csrf @method('DELETE')
                  <a href="{{ route('berita.edit',$berita->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i>
                      </button>
                  </form>
                </td>
                @else
                <td class="gap-2 text-center">
                      <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Hapus" disabled>
                        <i class="bi bi-pencil-fill" title="Edit"></i>
                      </button>
                      <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                  </form>
                </td>
                @endif
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