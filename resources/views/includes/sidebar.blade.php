<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-center bg-light">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('backend/') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3 text-dark">Manajemen Aset</div>
    </div>
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>

    @if (session('userdata')['status'] == 'ADMIN')
    <li class="nav-item {{ (request()->is('pegawai')) ? 'active' : '' }}">
        <a href="{{ url('/pegawai') }}" class="nav-link">
            <i class="fas fa-user"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item {{ (request()->is('departemen')) ? 'active' : '' }}">
        <a href="{{ url('/departemen') }}" class="nav-link">
            <i class="fa fa-building-o"></i>
            <span>Departemen</span>
        </a>
    </li>
    <li class="nav-item {{ (request()->is('kategori')) ? 'active' : '' }}">
        <a href="{{ url('/kategori') }}" class="nav-link">
            <i class="fa fa-list-alt"></i>
            <span>Kategori</span>
        </a>
    </li>
    <li class="nav-item {{ (request()->is('lokasi')) ? 'active' : '' }}">
        <a href="{{ url('/lokasi') }}" class="nav-link">
            <i class="fa fa-map-marker"></i>
            <span>Lokasi</span>
        </a>
    </li>
    <li class="nav-item {{ (request()->is('aset')) ? 'active' : '' }}">
        <a href="{{ url('/aset') }}" class="nav-link">
            <i class="fa fa-briefcase"></i>
            <span>Aset</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
            aria-expanded="true" aria-controls="collapseForm">
            <i class="fa fa-asl-interpreting"></i>
            <span>Pinjam</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pinjam</h6>
                <a class="collapse-item" href="{{ url('/peminjaman') }}">Peminjaman</a>
                <a class="collapse-item" href="{{ url('/peminjaman/data') }}">Data Peminjaman</a>
            </div>
        </div>
    </li>

    @else
    <li class="nav-item {{ (request()->is('peminjaman')) ? 'active' : '' }}">
        <a href="{{ url('/peminjaman') }}" class="nav-link">
            <i class="fa fa-asl-interpreting"></i>
            <span>Pinjam</span>
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
