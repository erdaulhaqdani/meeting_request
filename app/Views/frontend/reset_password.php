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
					<h1>Reset Password <br> APT Bersama</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Home</button></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto">
						<h4 class="mb-3">Reset Password</h4>
						<?php
						if (session()->get('pesan')) {
						?>
							<div class="alert alert-danger" role="alert">
								<?= session()->get('pesan'); ?>
							</div>
						<?php
						}
						?>

						<form class="input_style_1" method="post" action="../AuthCust/updatePassword/<?= $email ?>" id="login_cust">
							<div id="reset_password">
								<div class="form-group">
									<label for="password">Password Baru</label>
									<input type="password" name="password" id="password" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="confirm_pw">Konfirmasi Password</label>
									<input type="password" name="confirm_pw" id="confirm_pw" class="form-control" required>
								</div>


								<button type="submit" class="btn_1 full-width">Simpan</button>
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
<script src="/login_regis/js/common_scripts.js" type="text/javascript"></script>
<script src="/login_regis/js/common_func.js" type="text/javascript"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="/login_regis/js/jquery.validate.js" type="text/javascript"></script>
<script src="/login_regis/js/login_cust.js" type="text/javascript"></script>

<script>
	$('#login_cust').validate();
</script>

<?= $this->endSection(); ?>