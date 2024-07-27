<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown active">
        <a href="/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">EKSTRAKULIKULER</li>
    @if (auth()->user()->level == 'admin')
        <li class="dropdown ">
            <a href="/eskul/kategori" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-clipboard-list"></i>
                </div>
                <span>Daftar Eskul</span>
            </a>
        </li>
    @endif
    @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kepala_sekolah')
        <li class="dropdown ">
            <a href="/pembina" class="nav-link text-left"><i style="font-size:18px; padding:4px;"
                    class="fas fa-user-friends"></i><span>Pembina</span></a>
        </li>
    @endif
    <li class="dropdown ">
        <a href="/eskul/pendaftar" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-users"></i> </div>
            <span>Pendaftar</span>
        </a>
    </li>
    <li class="dropdown ">
        <a href="/eskul/lomba" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-play"></i> </div>
            <span>Lomba</span>
        </a>
    </li>
    <li class="dropdown ">
        <a href="/eskul/jadwal" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-calendar-check"></i> </div>
            <span>Jadwal</span>
        </a>
    </li>
    <li class="dropdown ">
        <a href="/eskul/gallery" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-images"></i>
            </div>
            <span>Gallery</span>
        </a>
    </li>
    <li class="menu-header">PRESENSI</li>
    @if (auth()->user()->level == 'admin' || auth()->user()->level == 'pembina')
        <li class="dropdown ">
            <a href="/presensi" class="nav-link text-left">
                <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-calendar-check"></i>
                </div>
                <span>Presensi</span>
            </a>
        </li>
    @endif
    <li class="dropdown ">
        <a href="/presensi/laporan" class="nav-link text-left">
            <div class="icon-class"> <i style="font-size:18px; padding:4px;" class="fas fa-calendar-check"></i>
            </div>
            <span>Report Presensi</span>
        </a>
    </li>

    <li class="menu-header">PENGATURAN</li>
    @if (auth()->user()->level == 'admin')
        <li class="dropdown ">
            <a href="/pengguna" class="nav-link text-left"><i style="font-size:18px; padding:4px;"
                    class="fas fa-users"></i><span>Pengguna</span></a>
        </li>
    @endif
    <li class="dropdown ">
        <a href="/profil" class="nav-link text-left">
            <i style="font-size:18px; padding:4px;" class="far
                    fa-user"></i><span>Profil</span></a>
    </li>
    <li class="dropdown ">
        <a href="/logout" class="nav-link text-left">
            <i class="fas fa-sign-out-alt" style="font-size:18px; padding:4px;"></i>
            <span>Logout</span></a>
    </li>

</ul>
