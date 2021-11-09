    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
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
            <a class="nav-link" href="/datasantri">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelola Santri') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datapengajar">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelola Pengajar') }}</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/datauser">Data User</a>
                        <a class="collapse-item" href="/dataprogram">Data Program</a>
                        <a class="collapse-item" href="/datacourse">Data Course</a>
                        <a class="collapse-item" href="/datakepengurusan">Kepengurusan</a>
                    </div>
                </div>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/datakelas">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Kelas') }}</span>
            </a>
        </li>
        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cetak</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/cetak_hafalan">Batas Hafalan</a>
                        <a class="collapse-item" href="/cetak_pdf">Rapor Semester</a>
                    </div>
                </div>
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
        <li class="nav-item ">
            <a class="nav-link" href="/batashafalan/show">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Batas Hafalan') }}</span>
            </a>
        </li>
        <!-- Nav Item - About -->
        <li class="nav-item ">
            <a class="nav-link" href="/detaillaporan">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Rapor Semester') }}</span>
            </a>
        </li>
        @endif
        <!-- Nav Item - About -->
        @if (auth()->user()->role->name =="Student")
        <li class="nav-item ">
            <a class="nav-link" href="/datasantri/{student_id}">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Profil') }}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#">
                <!-- <i class="fas fa-fw fa-user"></i> -->
                <span>{{ __('Batas Hafalan') }}</span>
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