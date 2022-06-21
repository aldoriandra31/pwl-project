<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/dist/img/logo/logosekolah.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Sekolah Tatib</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ auth()->user()->gravatar() }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (auth()->user()->user_role->role->name == 'admin')
          <li class="nav-item">
            <a href="{{ route('admin.home') }}"
              class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-gauge"></i>
              <p>
                Dashborad
              </p>
            </a>
          </li>
          {{-- management user --}}
          <li class="nav-item">
            <a href=""
              class="nav-link {{ request()->routeIs('guru.*') || request()->routeIs('siswa.*') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-user-check"></i>
              <p>
                Management User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('guru.index') }}" class="nav-link">
                  <i class="fa-solid fa-user-group nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('siswa.index') }}" class="nav-link">
                  <i class="fa-solid fa-users nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- management kelas --}}
          {{-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa-solid fa-school-flag"></i>
              <p>
                Menagement Kelas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('guru.index') }}" class="nav-link">
                  <i class="fa-solid fa-user-group nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('siswa.index') }}" class="nav-link">
                  <i class="fa-solid fa-users nav-icon"></i>
                  <p>Wali Kelas</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- management kasus --}}
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('kasus.*') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-ribbon"></i>
              <p>
                Management kasus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('kasus.index') }}" class="nav-link">
                  <i class=" nav-icon fa-solid fa-handcuffs"></i>
                  <p>kasus</p>
                </a>
              </li>
            </ul>
          </li>
        @elseif (auth()->user()->user_role->role->name == 'guru')
          <li class="nav-item">
            <a href="{{ route('guru.home') }}" class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-gauge"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('siswa.home') }}" class="nav-link {{ request()->routeIs('siswa.home') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-gauge"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('siswa.pelanggaran') }}"
              class="nav-link {{ request()->routeIs('siswa.pelanggaran') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-person-circle-xmark"></i>
              <p>
                Pelanggaran
              </p>
            </a>
          </li>
        @endif
        @if (auth()->user()->user_role->role->name == 'admin' || auth()->user()->user_role->role->name == 'guru')
          <li class="nav-item">
            <a href="{{ route('pelanggaran.index') }}"
              class="nav-link {{ request()->routeIs('pelanggaran.*') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-person-circle-xmark"></i>
              <p>
                Pelanggaran
              </p>
            </a>
          </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
