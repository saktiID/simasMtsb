<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home'); ?>">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li>
                <span class="mx-3"></span>
            </li>


            <!-- menu admin staff -->
            <?php if ($user['role_id'] == 1 || $user['role_id'] == 2) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bukukerja'); ?>">
                        <i class="mdi mdi-book-multiple menu-icon"></i>
                        <span class="menu-title">Buku Kerja</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('jurnal'); ?>">
                        <i class="mdi mdi-timetable menu-icon"></i>
                        <span class="menu-title">Jurnal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('jadwal_saya'); ?>">
                        <i class="mdi mdi-av-timer menu-icon"></i>
                        <span class="menu-title">Jadwal Saya</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Penilaian Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-bulletin-board menu-icon"></i>
                        <span class="menu-title">ECI Siswa</span>
                    </a>
                </li>
                <?php if ($user['is_admineci'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-chart-histogram menu-icon"></i>
                            <span class="menu-title">Nilai ECI</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <span class="mx-3"></span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-clipboard-account menu-icon"></i>
                        <span class="menu-title">Data Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dataguru'); ?>">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Data Guru</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('cekbuku'); ?>">
                        <i class="mdi mdi-checkbox-multiple-marked menu-icon"></i>
                        <span class="menu-title">Cek Buku Kerja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('mapel'); ?>">
                        <i class="mdi mdi-book-open menu-icon"></i>
                        <span class="menu-title">Mata Pelajaran</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('set_jadwal'); ?>">
                        <i class="mdi mdi-calendar-multiple menu-icon"></i>
                        <span class="menu-title">Jadwal Guru</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('buku_induk_siswa'); ?>">
                        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                        <span class="menu-title">Buku Induk Siswa</span>
                    </a>
                </li>
            <?php endif; ?>
            <!-- end menu admin staff -->


            <!-- menu user -->
            <?php if ($user['role_id'] == 3) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('bukukerja'); ?>">
                        <i class="mdi mdi-book-multiple menu-icon"></i>
                        <span class="menu-title">Buku Kerja</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('jadwal_saya'); ?>">
                        <i class="mdi mdi-av-timer menu-icon"></i>
                        <span class="menu-title">Jadwal Saya</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-timetable menu-icon"></i>
                        <span class="menu-title">Jurnal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">Penilaian Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <span class="menu-title">ECI Siswa</span>
                    </a>
                </li>
                <?php if ($user['is_admineci'] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-chart-histogram menu-icon"></i>
                            <span class="menu-title">Nilai ECI</span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <!-- end menu user -->


            <li>
                <span class="mx-3"></span>
            </li>

            <li class="nav-item">
                <span class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </span>
            </li>

        </ul>
    </nav>
    <!-- partial -->

    <!-- main-panel -->
    <div class="main-panel">