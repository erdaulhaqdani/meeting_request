<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div class="user-profile text-center mt-3">
            <div class="mt-3">
                <?php //get Nama Level
                switch (session()->get('idLevel')) {
                    case "1":
                        $level = 'Admin Landing Page';
                        break;
                    case "2":
                        $level = 'Admin JKasi';
                        break;
                    case "3":
                        $level = 'Kepala Kantor';
                        break;
                    case "4":
                        $level = 'Petugas KI';
                        break;
                    case "5":
                        $level = 'Customer';
                        break;
                    case "6":
                        $level = 'Supervisor';
                        break;
                    case "7":
                        $level = 'Petugas Loket';
                        break;
                } ?>
                <h4 class="font-size-16 mb-1"><?= session()->get('Nama') ?></h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-16 text-success"></i><?= " " . $level ?></span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="/dashboard_admin_landing" class=" waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Kelola Informasi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Landing_page/form">Tambah Informasi</a></li>
                        <li><a href="/Landing_page">Daftar Informasi</a></li>
                        <li><a href="/Landing_page/permohonanInfo/<?= session('idPetugas'); ?>">Permohonan Informasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-calendar-day"></i>
                        <span>Kelola Agenda</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Landing_page/form_agenda">Tambah Agenda</a></li>
                        <li><a href="/Landing_page/daftar_agenda">Daftar Agenda</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-nurse"></i>
                        <span>Kelola Petugas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Landing_page/form_petugas">Tambah Petugas</a></li>
                        <li><a href="/Landing_page/daftar_petugas">Daftar Petugas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-tie"></i>
                        <span>Kelola Pegawai</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/KelolaPegawai/form_pegawai">Tambah Pegawai</a></li>
                        <li><a href="/KelolaPegawai/daftar_pegawai">Daftar Pegawai</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/daftar_customer" class=" waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Daftar Customer</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->