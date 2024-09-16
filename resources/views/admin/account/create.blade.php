@extends('layouts.admin')

@section('title', 'Tambah Account')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data akun</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('account.index') }}">Data Akun</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Akun</li>
      </ol>
    </nav>
  </div>

  {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
  <!-- DataTales Example -->
  {{-- @include ('includes.flash') --}}
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('account.store') }}">
        @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Type User</label>
                        <select name="type" id="type" class="form-control" required>
                           <option value="">--Pilih Role--</option>
                           <option value="admin">Admin</option>
                           <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ old('username') }}" required>
                        @error('username')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" id="password" placeholder="password" required>
                        @error('password')
                        <span class="text-danger fs-6">
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

@endsection
