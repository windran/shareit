<?php

use Config\BscTokenConfig;

$tokenConfig = new BscTokenConfig();
?>
<!DOCTYPE html>
<html lang="en-us" class="js">

<head>
	<meta charset="utf-8">
	<meta name="author" content="SHAREit">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">

	<!-- Fav Icon  -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('') ?>/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('') ?>/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('') ?>/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('') ?>/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('') ?>/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('') ?>/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('') ?>/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('') ?>/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('') ?>/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('') ?>/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('') ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('') ?>/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('') ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url('') ?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= base_url('') ?>/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Site Title  -->
	<title>SHAREit - Community Driven Project</title>

	<!-- Bundle and Base CSS -->
	<link rel="stylesheet" href="<?= base_url('') ?>/assets/css/vendor.bundle.css?ver=1930">
	<link rel="stylesheet" href="<?= base_url('') ?>/assets/css/style-shareit.css?ver=1930" id="changeTheme">

</head>

<body class="nk-body body-wider bg-theme mode-onepage">

	<div class="nk-wrap ov-h">
		<div class="container">
			<main class="nk-pages nk-pages-centered tc-light px-0 text-center">
				<header class="pt-5">
					<a href="<?= route_to('homepage') ?>" class="d-inline-block logo-lg"><img class="error-logo" src="images/icons/shareit.png" srcset="images/icons/shareit.png 2x" alt="logo" /></a>
				</header>
				<div class="my-auto py-5">
					<div class="row justify-content-center">
						<div class="col-xl-6 col-md-7 col-sm-9">
							<div class="position-relative">
								<h2 class="title-xxl-grad title-ele-head">500</h2>
								<h5 class="pb-2">Sorry, unexpected error!</h5>
								<p class="">
									We are working on fixing the problem. Be back soon
								</p>
								<a href="<?= route_to('homepage') ?>" class="btn btn-primary btn-md btn-round">Back to home</a>
							</div>
						</div>
					</div>
				</div>
				<footer class="pb-5 tc-light">
					<ul class="social mb-3">
						<li>
							<a target="_blank" href="<?= $tokenConfig->twitter ?>"><em class="social-icon fab fa-twitter"></em></a>
						</li>
						<li>
							<a target="_blank" href="<?= $tokenConfig->telegram ?>"><em class="social-icon fab fa-telegram"></em></a>
						</li>
					</ul>
					<p class="copyright-text copyright-text-s3">
						Copyright © 2021. SHAREIT
					</p>
				</footer>
			</main>
		</div>
		<div class="nk-ovm shape-i ov-h"></div>
	</div>
	<div class="preloader"><span class="spinner spinner-round"></span></div>

	<!-- JavaScript -->
	<script src="assets/js/jquery.bundle.js?ver=1930"></script>
	<script src="assets/js/scripts.js?ver=1930"></script>
</body>

</html