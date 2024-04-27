<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sickness.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Data Penyakit</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Data Gejala</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.indication.index') }}">Gejala</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.certainty.index') }}">Nilai CF</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.education.index') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Edukasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.riwayat.index') }}">
                <i class="icon-contract menu-icon"></i>
                <span class="menu-title">Riwayat Diagnosa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data Pengguna</span>
            </a>
        </li>
    </ul>

</nav>
