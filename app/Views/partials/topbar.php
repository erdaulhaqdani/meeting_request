<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo_kemenkeu.png" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo-kpknl.png" alt="logo-dark" width="100" height="40">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/images/logo_kemenkeu.png" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/images/logo-kpknl.png" alt="logo-light" width="100" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line">
                        <span id="notifDot"></span>
                    </i>
                </button>

                <!-- Notificaction button -->
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifikasi </h6>
                            </div>
                            <!-- <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div> -->
                        </div>
                    </div>

                    <!-- notification list -->
                    <div data-simplebar style="max-height: 400px;">
                        <div id="notifItem"></div>
                    </div>
                    <!-- end of notification list -->

                    <!-- <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="/assets/images/users/user.png" alt="Header Avatar">
                    <?php if (session('NIP') == TRUE) : ?>
                        <span class="d-none d-xl-inline-block ms-1"><?= session()->get('Nama') ?></span>
                    <?php else : ?>
                        <span class="d-none d-xl-inline-block ms-1"><?= session()->get('Username') ?></span>
                    <?php endif ?>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <?php if (session('NIP') == TRUE) : ?>
                        <a class="dropdown-item" href="/admin/profile"><i class="ri-user-line align-middle me-1"></i> Profil</a>
                    <?php else : ?>
                        <a class="dropdown-item" href="/Pengaduan_online/profile"><i class="ri-user-line align-middle me-1"></i> Profil</a>
                    <?php endif ?>
                    <a class="dropdown-item text-danger" href="/logout_cust"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>