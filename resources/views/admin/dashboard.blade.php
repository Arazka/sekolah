@extends('layouts.admin')

@section('title', 'Dashboard')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Akun</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                <i class="bi bi-person-fill fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Banner</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $banner }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-flag-fill fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Berita</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-newspaper fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Fasilitas</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $fasilitas }}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-building fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Profil Sekolah</h6>
          </div>
          <div class="row card-body">
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data guru</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guru }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Kelas</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Mapel</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mapel }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Jabatan</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jabatan }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Karyawan</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $karyawan }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Tugas Karyawan</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tgskaryawan }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header bg-warning py-3">
            <h6 class="m-0 font-weight-bold text-white">Akademik</h6>
          </div>
          <div class="row card-body">
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Ekstrakurikuler</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ekstra }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Prestasi</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $prestasi }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection