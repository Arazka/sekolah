@extends('layouts.admin')

@section('title', 'Data Account')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Akun</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      @can('admin')
      <a class="btn btn-primary" href="{{ route('account.create') }}">Tambah Akun</a>
      @endcan
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th>Username</th>
                <th>Role</th>
                <th width=200>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $user)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->type }}</td>
                <td>
                  <div class="d-flex text-center justify-content-center gap-1">
                    <a href="{{ route('account.edit', $user->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"></i></a>
                    <form id="delete-user-{{$user->id}}" action="{{ route('account.delete',$user->id) }}" method="POST">
                      @csrf @method('DELETE')
                      @if ($user->type == 'user')
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i>
                      </button>
                      @endif
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-cenet">
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