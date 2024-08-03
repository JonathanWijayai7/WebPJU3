<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('image/lg_dishub.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIPELAJU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/'.auth()->user()->ftprofil)}}" class="img-circle elevation-2" alt="User Image" width="20px" height="20px">
        </div>
        <div class="info">
      <a href="{{route('dashboard')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Admin
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="/" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Lihat Website
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('dtpegawai')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Kelola Data Pegawai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('surattugas')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Kelola Penjadwalan Tugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pengaduan')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Kelola Data Pengaduan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('perbaikans')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Kelola Laporan Perbaikan
              </p>
            </a>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Stok Material
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('material')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Stok Material</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('logmaterials')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Permohonan Penggunaan Material</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if(auth()->user()->level=="tatausaha")
            <a href="{{route ('otorisasi')}}" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Autorisasi
              </p>
            </a>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Pengaturan Tambahan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('posisi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Posisi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('validasi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Status Validasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('penanganan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Status Penanganan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('skala')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Skala Pengaduan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kecamatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kelurahan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelurahan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>