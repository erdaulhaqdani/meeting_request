<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#061948">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#061948">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
	<title><?= $title; ?></title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon-32x32.png'); ?>" sizes="32x32" />
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="/css/responsive.css">
	<!-- Menyisipkan library Google Maps -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>


	<script>
		// fungsi initialize untuk mempersiapkan peta
		function initialize() {
			var propertiPeta = {
				center: new google.maps.LatLng(-6.921834688616565, 107.61098839668868),
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

			// membuat Marker
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(-6.921834688616565, 107.61098839668868),
				map: peta
			});
		}

		// event jendela di-load  
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
</head>

<body>
	<div class="main-page-wrapper">

		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="loader-wrapper">
			<div data-loader="circle-side"></div>
		</div><!-- /Preload -->

		<!-- 
			=============================================
				Theme Header Two
			============================================== 
			-->
		<header class="header-two">
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-8 col-12">
							<ul class="left-widget">
								<li>DIREKTORAT JENDERAL KEKAYAAN NEGARA</li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-4 col-12">
							<ul class="social-icon">
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.top-header -->

			<div class="theme-menu-wrapper">
				<div class="container">
					<div class="bg-wrapper clearfix">
						<div class="logo float-left"><a href="/"><img src="/images/logo-kpknl.png" alt="" height="56" width="150px"></a></div>
						<div class="right-widget float-right ">
							<ul>
								<li class="search-option">
									<div class="dropdown">
										<button type="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></button>
										<form action="#" class="dropdown-menu">
											<input type="text" Placeholder="Cari...">
											<button><i class="fa fa-search"></i></button>
										</form>
									</div>
								</li>
							</ul>
						</div> <!-- /.right-widget -->
						<!-- ============== Menu Warpper ================ -->
						<div class="menu-wrapper float-right">
							<nav id="mega-menu-holder" class="clearfix ">
								<ul class="clearfix">
									<li class="active"><a href="/">Beranda</a></li>
									<li><a href="#">Halaman</a>
										<ul class="dropdown">
											<li><a href="/pages/profil">Profil KPKNL Bandung</a></li>
											<li><a href="/pages/faq">FAQ</a></li>
											<li><a href="/pages/permohonan_info">Permohonan Informasi</a></li>
										</ul>
									</li>
									<!-- <li><a href="#">Layanan</a>
										<ul class="dropdown">
											<li><a href="#">Barang Milik Negara</a></li>
											<li><a href="#">Lelang</a></li>
											<li><a href="#">Piutang Negara</a></li>
											<li><a href="#">Penilaian</a></li>
											<li><a href="#">Kesekretariatan</a></li>
											<li><a href="#">Kekayaan Negara</a>
												<ul>
													<li><a href="#">Dipisahkan</a></li>
													<li><a href="#">Lain-lain</a></li>
												</ul>
											</li>
										</ul>
									</li> -->
									<li><a href="#">Blog</a>
										<ul class="dropdown">
											<li><a href="/pages/berita_grid">Berita</a></li>
											<li><a href="/pages/pengumuman_grid">Pengumuman</a></li>
											<li><a href="/pages/artikel_grid">Artikel</a></li>
											<li><a href="/pages/peristiwa_grid">Kilas Peristiwa</a></li>
											<li><a href="/pages/agenda_grid">Agenda</a></li>
										</ul>
									</li>
									<li>
									<li><a href="/login_cust">APT Bersama</a></li>
									</li>

								</ul>
							</nav> <!-- /#mega-menu-holder -->
						</div> <!-- /.menu-wrapper -->
					</div> <!-- /.bg-wrapper -->
				</div> <!-- /.container -->
			</div> <!-- /.theme-menu-wrapper -->
		</header> <!-- /.header-two -->

		<?= $this->renderSection('content') ?>

		<!--
			=====================================================
				Footer
			=====================================================
			-->
		<footer class="theme-footer-two">
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg col-sm-6 col-12 logo-widget">
							<div class="logo"><a href="/"><img src="/images/logo-kpknl.png" alt="" height="60" width="165px"></a></div>
							<p>KPKNL Bandung merupakan unit vertikal Direktorat Jenderal Kekayaan Negara (DJKN) <br> di bawah Kanwil DJKN Jawa Barat.
							</p>
							<ul class="social-icon">
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div> <!-- /.logo-widget -->
						<div class="col-lg col-sm-6 col-12 footer-list">
							<h6 class="title">JELAJAHI</h6>
							<div class="row">
								<div class="col">
									<ul>
										<li><a href="/pages/peristiwa_grid">Kilas Peristiwa</a></li>
										<li><a href="/pages/pengumuman_grid">Pengumuman</a></li>
										<li><a href="/pages/berita_grid">Berita</a></li>
										<li><a href="/pages/artikel_grid">Artikel</a></li>
									</ul>
								</div>
								<div class="col">
									<ul>
										<li><a href="/pages/profil">Profil</a></li>
										<li><a href="/pages/agenda_grid">Agenda</a></li>
										<li><a href="/pages/faq">FAQ</a></li>
									</ul>
								</div>
							</div>


						</div> <!-- /.footer-list -->

						<div class="col-lg col-sm-6 col-12 contact-widget">
							<h6 class="title">Kontak Kami</h6>
							<ul>
								<li>
									<i class="flaticon-direction-signs"></i>
									Gedung N, Komplek Gedung Keuangan Negara, Jl. Asia Afrika No. 114, Bandung
								</li>
								<li>
									<i class="flaticon-multimedia-1"></i>
									<a href="#">kpknlbandung@kemenkeu.go.id</a>
								</li>
								<li>
									<i class="fa fa-phone" aria-hidden="true"></i>
									<a href="#">(022)4216161</a>
								</li>
								<li>
									<i class="fa fa-fax" aria-hidden="true"></i>
									<a href="#">(022) 4263131</a>
								</li>
							</ul>
						</div> <!-- /.contact-widget -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.top-footer -->
			<div class="bottom-footer">
				<div class="container">
					<p>&copy; Hak Cipta Direktorat Jenderal Kekayaan Negara 2022</p>
				</div>
			</div> <!-- /.bottom-footer -->
		</footer> <!-- /.theme-footer-two -->

		<!-- Scroll Top Button -->
		<button class="scroll-top tran3s">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</button>

		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- jQuery -->
		<script src="/vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="/vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src="/vendor/Camera-master/scripts/jquery.mobile.customized.min.js"></script>
		<script src="/vendor/Camera-master/scripts/jquery.easing.1.3.js"></script>
		<script src="/vendor/Camera-master/scripts/camera.min.js "></script>
		<!-- menu  -->
		<script src="/vendor/menu/src/js/jquery.slimmenu.js"></script>
		<!-- WOW js -->
		<script src="/vendor/WOW-master/dist/wow.min.js "></script>
		<!-- owl.carousel -->
		<script src="/vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="/vendor/jquery.appear.js"></script>
		<script src="/vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

		<!-- Theme js -->
		<script src="/js/theme.js"></script>
	</div>
	<!-- /.main-page-wrapper -->
</body>

</html>