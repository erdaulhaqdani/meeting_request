<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="text-center mt-3">
                    <h5><?= session()->get('Nama') ?></h5>
                    <h5><?= session()->get('idLevel') ?></h5>
                </li>
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
                        <i class="fas fa-file-alt "></i>
                        <span>Meeting Request</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/Meeting_request/form">Buat Meeting Request</a></li>
                        <li><a href="/Meeting_request">Daftar Meeting Request</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->