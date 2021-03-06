<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Betler Multipurpose Forms HTML Template">
  <meta name="author" content="Ansonika">
  <title><?= $title; ?></title>

  <!-- Favicons-->
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon-32x32.png'); ?>" sizes="32x32" />
  <link rel="apple-touch-icon" type="image/x-icon" href="<?= base_url('img/apple-touch-icon-57x57-precomposed.png'); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= base_url('img/apple-touch-icon-72x72-precomposed.png'); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= base_url('img/apple-touch-icon-114x114-precomposed.png'); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= base_url('img/apple-touch-icon-144x144-precomposed.png'); ?>">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- BASE CSS -->
  <link href="<?= base_url('/login_regis/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/login_regis/css/vendors.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('/login_regis/css/style.css'); ?>" rel="stylesheet">

  <!-- YOUR CUSTOM CSS -->
  <link href="<?= base_url('/login_regis/css/custom.css'); ?>" rel="stylesheet">

</head>

<body>
  <div id="preloader">
    <div data-loader="circle-side"></div>
  </div><!-- /Preload -->

  <?= $this->renderSection('content') ?>

</body>

</html>