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
					<h1>Registrasi APT Bersama</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Beranda</button></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto position-relative">
						<h4 class="mb-3">Registrasi</h4>

						<?php
						if (session()->get('pesan')) :
						?>
							<div class="alert alert-danger" role="alert">
								<?= session()->get('pesan'); ?>
							</div>
						<?php
						endif;
						?>

						<form class="input_style_1" method="post" action="/AuthCust/register_petugas" id="regis_cust">

							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="number" name="nip" id="nip" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="email">Email Kemenkeu </label>
								<input type="email" name="email" id="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" required>
							</div>
							<!-- <div class="form-group">
								<label for="password2">Konfirmasi Password</label>
								<input type="password" name="password2" id="password2" class="form-control">
							</div> -->
							<div id="pass-info" class="clearfix"></div>

							<button type=" submit" class="btn_1 full-width" id="submit">Daftar</button>
						</form>
						<p class="text-center mt-3 mb-0">Sudah punya akun? <a href="/login_cust">Login</a></p>
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
<script src="/login_regis/js/common_scripts.js" type="text/javascript"></script>
<script src="/login_regis/js/common_func.js" type="text/javascript"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="/login_regis/js/jquery.validate.js" type="text/javascript"></script>
<script src="/login_regis/js/register_cust.js" type="text/javascript"></script>
<script src="/login_regis/js/pw_strenght.js" type="text/javascript"></script>


<script>
	$('#regis_cust').validate();
</script>

<?= $this->endSection(); ?>