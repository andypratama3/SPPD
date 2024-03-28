<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">Data Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse  {{ Request::routeIs('dashboard.datamaster.*') ? 'show' : '' }} " id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Request::routeIs('dashboard.datamaster.nomor_surat.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.datamaster.nomor_surat.index') }}">
                            <i class="fas fa-envelope menu-icon"></i>
                            <span class="menu-title">Nomor Surat</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('dashboard.datamaster.pimpinan.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.datamaster.pimpinan.index') }}">
                            <i class="ti ti-user menu-icon"></i>
                            <span class="menu-title">Pimpinan</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('dashboard.datamaster.pegawai.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.datamaster.pegawai.index') }}">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-title">Pegawai</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('dashboard.datamaster.user.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.datamaster.user.index') }}">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-title">User</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::routeIs('dashboard.surat.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.surat.index') }}">
                <i class="fa-solid fa-envelope-open-text menu-icon"></i>
                <span class="menu-title">Surat Perjalanan</span>
            </a>
        </li>
        <li class="nav-item {{ Request::routeIs('dashboard.rincian.biaya.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.rincian.biaya.index') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Rincian Biaya</span>
            </a>
        </li>
    </ul>
</nav>
