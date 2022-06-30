<?= $this->extend('frontend/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid p-0">
	<div class="row no-gutters row-height">
		<div class="col-lg-6 background-image" data-background="url(/images/banner_login.jpg)">
			<div class="content-left-wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<a href="/" id="logo"><img src="/images/logo-kpknl.png" alt="" width="100" height="40"></a>
				<div id="social">
					<ul>
						<li><a href="#0"><i class="social_facebook"></i></a></li>
						<li><a href="#0"><i class="social_twitter"></i></a></li>
						<li><a href="#0"><i class="social_instagram"></i></a></li>
					</ul>
				</div>
				<!-- /social -->
				<div>
					<h1>Login APT Bersama</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Beranda</button></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto">
						<h4 class="mb-3">Login</h4>
						<?php
						if (session()->get('pesan')) {
						?>
							<div class="alert alert-danger" role="alert">
								<?= session()->get('pesan'); ?>
							</div>
						<?php
						} elseif (session()->get('pesan_regis')) {
						?>
							<div class="alert alert-success" role="alert">
								<?= session()->get('pesan_regis'); ?>
							</div>
						<?php
						} elseif (session()->get('regis_gagal')) {
						?>
							<div class="alert alert-danger" role="alert">
								<?= session()->get('regis_gagal'); ?>
							</div>
						<?php
						} elseif (session()->get('pesan_reset')) {
						?>
							<div class="alert alert-danger" role="alert">
								<?= session()->get('pesan_reset'); ?>
							</div>
						<?php
						} elseif (session()->get('pesan_reset2')) {
						?>
							<div class="alert alert-success" role="alert">
								<?= session()->get('pesan_reset2'); ?>
							</div>
						<?php
						}
						?>

						<form class="input_style_1" method="post" action="AuthCust/login" id="login_cust">
							<div id="login_customer">
								<div class="form-group">
									<label for="email_address">Email</label>
									<input type="email" name="email" id="email_address" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
								<div class="clearfix mb-3">
									<!-- <div class="float-left">
										<label class="container_check">Remember Me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div> -->
									<div class="float-right">
										<a id="forgot" href="javascript:void(0);">Lupa Password?</a>
									</div>
								</div>
								<button type="submit" class="btn_1 full-width">Login</button>
							</div>
						</form>
						<p class="text-center mt-3 mb-0">Belum punya akun? <a href="/register_cust">Registrasi</a></p>
						<p class="text-center mt-3 mb-0">Registrasi Petugas APT? <a href="/register_petugas" target="_blank">Registrasi</a></p>
						<p class="text-center mt-3 mb-0">Login DAMS Pegawai? <a href="/" target="_blank">Login</a></p>

						<form class="input_style_1" method="post" action="AuthCust/resetPassword">
							<div id="forgot_pw">
								<h4 class="mb-3">Reset Password</h4>
								<div class="form-group">
									<label for="email_forgot">Login email</label>
									<input type="email" class="form-control" name="email_forgot" id="email_forgot">
								</div>
								<p>Anda akan menerima email yang berisi tautan untuk mengatur ulang password Anda ke password yang baru.</p>
								<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
								<p class="text-center mt-3 mb-0">Kembali ke <a id="login" href="/login_cust">Login</a> </p>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="container pb-3 copy">&copy; Hak Cipta Direktorat Jenderal Kekayaan Negara 2022</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- COMMON SCRIPTS -->
<script src="<?= base_url('/login_regis/js/common_scripts.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/login_regis/js/common_func.js'); ?>" type="text/javascript"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="<?= base_url('/login_regis/js/jquery.validate.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('/login_regis/js/login_cust.js'); ?>" type="text/javascript"></script>

<script>
	$('#login_cust').validate();
</script>

<?= $this->endSection(); ?>