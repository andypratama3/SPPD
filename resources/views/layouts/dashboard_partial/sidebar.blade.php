<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('dashboard.pimpinan.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.pimpinan.index') }}">
                <i class="ti ti-user menu-icon"></i>
                <span class="menu-title">Pimpinan</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('dashboard.pegawai.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.pegawai.index') }}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Pegawai</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="ti-palette menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li> --}}
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
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/themify.html">
                <i class="ti-star menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register
                            2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html">
                            Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="ti-write menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
