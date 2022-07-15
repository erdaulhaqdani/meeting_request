<!-- Bootstrap Css -->
<link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?= base_url('assets/css/icons.min.css'); ?> " rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?= base_url('assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />

<!-- App favicon -->
<link rel="icon" type="image/png" href="<?= base_url('/assets/images/favicon-32x32.png'); ?>" sizes="32x32" />
<!-- Lightbox css -->
<link href="<?= base_url('/assets/libs/magnific-popup/magnific-popup.css'); ?>" rel=" stylesheet" type="text/css" />

<?php
function formatTanggal($date)
{
    // ubah string menjadi format tanggal
    return date('d F Y', strtotime($date));
}

function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function tanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[0] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[2];
}
?>