<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authFilter' => \App\Filters\AuthFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'authFilter' => ['except' => ['/', '/AuthCust/*', '/AuthPetugas/*', 'frontend/*', '/register_cust', '/register_petugas', '/pages/*', '/login_cust', '/login_cust/*', '/reset_pw/*']],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'authFilter' => ['except' => ['/Meeting_request', '/Meeting_request/*', '/Pengaduan_online', '/Pengaduan_online/*', '/admin', '/admin/*', '/petugasMR', '/petugasMR/*', '/Landing_page', '/Landing_page/*', '/dashboard_cust', '/KelolaPegawai/*', '/dashboard_admin_landing', '/dashboard_admin_landing/*', '/dashboard_petugas', '/dashboard_petugas/*', '/daftar_customer', '/detail_customer/*',]],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        // 'authFilter' => ['before' => ['/backend/*']],
    ];
}
