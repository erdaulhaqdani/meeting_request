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
                <h4 class="font-size-16 mb-1"><?= session()->get('Username') ?></h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-16 text-success"></i><?= " " . $level ?></span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="/dashboard_cust" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file-alt "></i>
                        <span>Pengaduan Online</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Pengaduan_online/form">Pengajuan Pengaduan Online</a></li>
                        <li><a href="/Pengaduan_online">Daftar Pengaduan Online</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Janji Temu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Meeting_request/form">Buat Janji Temu</a></li>
                        <li><a href="/Meeting_request">Daftar Janji Temu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->