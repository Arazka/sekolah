<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
      <div class="sidebar-brand-icon">
        {{-- <i class="fas fa-laugh-wink"></i> --}}
        <img src="{{ asset('admin/img/muhatama.png') }}" alt="" style="width: 3rem;">
      </div>
      <div class="sidebar-brand-text mx-3">muhatama</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/admin/dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    @can('admin')
    <li class="nav-item {{ (request()->routeIs('account.*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  route('account.index') }}">
        <i class="bi bi-person-fill"></i>
        <span>Account</span></a>
    </li>
    @endcan

    <li class="nav-item {{ (request()->routeIs('banner.*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('banner.index') }}">
        <i class="bi bi-flag-fill"></i>
        <span>Banner</span></a>
    </li>

    <li class="nav-item {{ (request()->routeIs('berita.*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('berita.index') }}">
        <i class="bi bi-newspaper"></i>
        <span>Berita Terbaru</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Profil Sekolah</div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item {{ (request()->routeIs('profil.*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  route('profil.index') }}">
        <i class="bi bi-clock-history"></i>
        <span>Sejarah Visi & Misi</span></a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#porfil-sekolah"
          aria-expanded="true" aria-controls="porfil-sekolah">
          <i class="bi bi-globe-asia-australia"></i>
          <span>Profil Sekolah</span>
      </a>
      <div id="porfil-sekolah" class="collapse {{ (request()->routeIs('profil.*')) ? 'show' : '' }} {{ (request()->routeIs('jabatan-guru.*')) ? 'show' : '' }} {{ (request()->routeIs('wali-kelas.*')) ? 'show' : '' }} {{ (request()->routeIs('mapel-guru.*')) ? 'show' : '' }} {{ (request()->routeIs('karyawan-detail.*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Profil Sekolah:</h6>
              <a class="collapse-item {{ (request()->routeIs('profil.*')) ? 'active' : '' }}" href="{{ route('profil.index') }}">Sejarah Visi & Misi</a>
              <a class="collapse-item {{ (request()->routeIs('jabatan-guru.*')) ? 'active' : '' }}" href="{{ route('jabatan-guru.index') }}">Kepala Sekolah & Staff</a>
              <a class="collapse-item {{ (request()->routeIs('wali-kelas.*')) ? 'active' : '' }}" href="{{ route('wali-kelas.index') }}">Guru Wali Kelas</a>
              <a class="collapse-item {{ (request()->routeIs('mapel-guru.*')) ? 'active' : '' }}" href="{{ route('mapel-guru.index') }}">Guru Mata Pelajaran</a>
              <a class="collapse-item {{ (request()->routeIs('karyawan-detail.*')) ? 'active' : '' }}" href="{{ route('karyawan-detail.index') }}">Karyawan</a>
          </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data-profil-sekolah"
          aria-expanded="true" aria-controls="data-profil-sekolah">
          <i class="bi bi-globe-asia-australia"></i>
          <span>Data Profil Sekolah</span>
      </a>
      <div id="data-profil-sekolah" class="collapse {{ (request()->routeIs('guru.*')) ? 'show' : '' }} {{ (request()->routeIs('kelas.*')) ? 'show' : '' }} {{ (request()->routeIs('mapel.*')) ? 'show' : '' }} {{ (request()->routeIs('jabatan.*')) ? 'show' : '' }} {{ (request()->routeIs('data-karyawan.*')) ? 'show' : '' }} {{ (request()->routeIs('tugas-karyawan.*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Data Profil Sekolah:</h6>
              <a class="collapse-item {{ (request()->routeIs('guru.*')) ? 'active' : '' }}" href="{{ route('guru.index') }}">Data Guru</a>
              <a class="collapse-item {{ (request()->routeIs('kelas.*')) ? 'active' : '' }}" href="{{ route('kelas.index') }}">Data Kelas</a>
              <a class="collapse-item {{ (request()->routeIs('mapel.*')) ? 'active' : '' }}" href="{{ route('mapel.index') }}">Data Mapel</a>
              <a class="collapse-item {{ (request()->routeIs('jabatan.*')) ? 'active' : '' }}" href="{{ route('jabatan.index') }}">Data Jabatan</a>
              <a class="collapse-item {{ (request()->routeIs('data-karyawan.*')) ? 'active' : '' }}" href="{{ route('data-karyawan.index') }}">Data Karyawan</a>
              <a class="collapse-item {{ (request()->routeIs('tugas-karyawan.*')) ? 'active' : '' }}" href="{{ route('tugas-karyawan.index') }}">Tugas Karyawan</a>
          </div>
      </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Akademik</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="bi bi-globe-asia-australia"></i>
          <span>Akademik</span>
      </a>
      <div id="collapseTwo" class="collapse {{ (request()->routeIs('ekstrakurikuler.*')) ? 'show' : '' }} {{ (request()->routeIs('prestasi.*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Akademik:</h6>
              <a class="collapse-item {{ (request()->routeIs('ekstrakurikuler.*')) ? 'active' : '' }}" href="{{ route('ekstrakurikuler.index') }}">Ekstrakulikuler</a>
              <a class="collapse-item {{ (request()->routeIs('prestasi.*')) ? 'active' : '' }}" href="{{ route('prestasi.index') }}">Prestasi</a>
          </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <div class="sidebar-heading">Fasilitas Sarana dan Prasarana</div>
    <li class="nav-item {{ (request()->routeIs('fasilitas.*')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('fasilitas.index') }}">
        <i class="bi bi-building"></i>
        <span>Fasilitas</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />

    {{-- <div class="sidebar-heading">BKAD</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bkad"
          aria-expanded="true" aria-controls="bkad">
          <i class="bi bi-bank"></i>
          <span>BKAD</span>
      </a>
      <div id="bkad" class="collapse {{ (request()->routeIs('profil-lembaga-bkad')) ? 'show' : '' }} {{ (request()->routeIs('struktur-organisasi-bkad')) ? 'show' : '' }} {{ (request()->routeIs('program-kerja-bkad')) ? 'show' : '' }} {{ (request()->routeIs('rpkp-bkad')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">BKAD:</h6>
              <a class="collapse-item {{ (request()->routeIs('profil-lembaga-bkad')) ? 'active' : '' }}" href="{{ url('admin/profil-lembaga-bkad') }}">Profil Lembaga</a>
              <a class="collapse-item {{ (request()->routeIs('struktur-organisasi-bkad')) ? 'active' : '' }}" href="{{ url('admin/struktur-organisasi-bkad') }}">Struktur Organisasi</a>
              <a class="collapse-item {{ (request()->routeIs('program-kerja-bkad')) ? 'active' : '' }}" href="{{ url('admin/program-kerja-bkad') }}">Program Kerja</a>
              <a class="collapse-item {{ (request()->routeIs('rpkp-bkad')) ? 'active' : '' }}" href="{{ url('admin/rpkp-bkad') }}">RPKP</a>
          </div>
      </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
    
    <div class="sidebar-heading">BUMDESMA</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bumdesma"
      aria-expanded="true" aria-controls="bumdesma">
      <i class="bi bi-bank2"></i>
      <span>BUMDESMA</span>
    </a>
    <div id="bumdesma" class="collapse {{ (request()->routeIs('profil-lembaga-bumdesma')) ? 'show' : '' }} {{ (request()->routeIs('struktur-organisasi-bumdesma')) ? 'show' : '' }} {{ (request()->routeIs('program-kerja-bumdesma')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">BUMDESMA:</h6>
              <a class="collapse-item {{ (request()->routeIs('profil-lembaga-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/profil-lembaga-bumdesma') }}">Profil Lembaga</a>
              <a class="collapse-item {{ (request()->routeIs('struktur-organisasi-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/struktur-organisasi-bumdesma') }}">Struktur Organisasi</a>
              <a class="collapse-item {{ (request()->routeIs('program-kerja-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/program-kerja-bumdesma') }}">Program Kerja</a>
          </div>
        </div>
      </li>
    
    <hr class="sidebar-divider d-none d-md-block" />
      
    <div class="sidebar-heading">Regulasi</div>

    <li class="nav-item {{ (request()->routeIs('regulasi')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  url('/admin/regulasi') }}">
        <i class="bi bi-file-earmark-text-fill"></i>
        <span>Regulasi</span></a>
    </li> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>