<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="text-center mt-3">
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
                    <h5><?= session()->get('Username') ?></h5>
                    <h5><?= $level ?></h5>
                </li>
                <li>
                    <a href="/" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/admin" class=" waves-effect">
                        <i class="fas fa-file-alt "></i>
                        <span>Pengaduan Online</span>
                    </a>
                </li>
                <li>
                    <a href="/petugasMR" class=" waves-effect">
                        <i class="fas fa-file-alt "></i>
                        <span>Meeting Request</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file-alt "></i>
                        <span>Tanda Terima</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/petugasMR/form_tandaTerima">Tambah Tanda Terima</a></li>
                        <li><a href="/petugasMR/daftar_tandaTerima">Daftar Tanda Terima</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->