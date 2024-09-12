<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown active">
        <a href="/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    @if (auth()->user()->level == 'admin')
        <li class="menu-header">EKSTRAKULIKULER</li>



        <li class="dropdown ">
            <a href="/kelas" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-building"></i> </div>
                <span>Kelas</span>
            </a>
        </li>
        <li class="dropdown ">
            <a href="/mata-pelajaran" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-book-open"></i> </div>
                <span>Mata Pelajaran</span>
            </a>
        </li>
        <li class="dropdown ">
            <a href="/siswa" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-users"></i> </div>
                <span>Siswa</span>
            </a>
        </li>

        <li class="dropdown ">
            <a href="/guru" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-users"></i> </div>
                <span>Guru</span>
            </a>
        </li>
    @endif

    <li class="menu-header">PRESENSI</li>
    <li class="dropdown ">
        <a href="/presensi" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-calendar-check"></i>
            </div>
            <span>Presensi</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown">
            <i style="font-size:18px; padding:4px;" class="fas fa-calendar-check"></i>Laporan</a>
        <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="/presensi-laporan">Report Presensi</a></li>
            <li><a class="nav-link" href="/presensi-laporan-bulanan">Report Bulanan</a></li>
        </ul>
    </li>

    <li class="menu-header">PENGATURAN</li>
    @if (auth()->user()->level == 'admin')
        <li class="dropdown ">
            <a href="/pengguna" class="nav-link text-left"><i style="font-size:18px; padding:4px;"
                    class="fas fa-users"></i><span>Pengguna</span></a>
        </li>
        <li class="dropdown ">
            <a href="/profil" class="nav-link text-left"><i style="font-size:18px; padding:4px;"
                    class="fa fa-user"></i><span>Profil</span></a>
        </li>
    @endif
    <li class="dropdown ">
        <a href="/logout" class="nav-link text-left">
            <i class="fas fa-sign-out-alt" style="font-size:18px; padding:4px;"></i>
            <span>Logout</span></a>
    </li>

</ul>
