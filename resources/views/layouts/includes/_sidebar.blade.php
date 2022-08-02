    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-text mx-3">RQSM </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        @if (auth()->user()->role->name =="Admin")
        <!-- Nav Item - Profile -->
        <li class="nav-item">
            <a class="nav-link" href="/datasantri/create">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Registrasi Santri') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/datasantri">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelola Santri') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datapengajar">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelola Guru') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datauser">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Data User') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datacourse">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Data Program') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/dataprogram">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Detail Program') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datakepengurusan">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kepengurusan') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datakelas">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelas') }}</span>
            </a>
        </li>
        @endif
        <!-- Nav Item - About -->
        @if (auth()->user()->role->name =="Teacher")
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datakelas">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Daftar Kelas') }}</span>
            </a>
        </li>
        @endif
        <!-- Nav Item - About -->
        @if (auth()->user()->role->name =="Student")
        <li class="nav-item ">
            <a class="nav-link" href="/datakelas">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelas') }}</span>
            </a>
        </li>
        @endif
        @if (auth()->user()->role->name =="Head")
        <li class="nav-item ">
            <a class="nav-link" href="/datasantri">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Data Santri') }}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/datapengajar">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Data Guru') }}</span>
            </a>
        </li><li class="nav-item ">
            <a class="nav-link" href="/datakelas">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Data Kelas') }}</span>
            </a>
        </li>
        @endif
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->