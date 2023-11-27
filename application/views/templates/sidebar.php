        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2D2C73;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="far fa-list-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">eKuesioner<br><sup>SPADA UPI</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/profile'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kuesioner
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/draft_kuesioner') ?>">
                    <i class="fas fa-envelope-open"></i>
                    <span>Draft Kuesioner</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/hasil_kuesioner') ?>">
                    <i class="fas fa-poll"></i>
                    <span>Hasil Kuesioner</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->