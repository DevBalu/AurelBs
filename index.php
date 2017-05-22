<?php 
	// include connect with db fail 
	// require_once("php/connect.php");

	// if (!empty($con)) {
		// get log & pass from href
		// $get_un = !empty($_GET["u"]);
		// $get_pas = !empty($_GET["p"]);

		// real log&pass
		// $adm_res = $con->query("SELECT * FROM admin");
		// $res = $adm_res->fetch_assoc();

		// $_SESSION["username"] = $res['username'];
		// $password = $res['password'];
	// }
	// $con->close();



	// print "<pre>";
	// print_r($row);
	// print "</pre>";
 ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="top-menu">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div id="fh5co-logo"><a href="index.php"><img src="images/logo.png"></a></div>
					</div><!-- END logo -->


					<div id="fh6co-intro">
						<div class="animate-box">
							<h1><!-- <span>&amp;</span> Go to your dreams --></h1>
						</div>
					</div><!-- END fh6co-intro -->
					<div class="col-sm-6 col-sm-offset-1 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Portfolio</a></li>
							<li><a href="about.php">About</a></li>
							<li class="has-dropdown"><a href="single.php">Dropdown</a>
								<ul class="dropdown">
									<li><a href="#">Infrastructure</a></li>
									<li><a href="#">Residential</a></li>
									<li><a href="#">Environmental</a></li>
									<li><a href="#">Megabuilders</a></li>
								</ul>
							</li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div><!-- END row -->
			</div><!-- END top-menu -->
		</div><!-- END container -->
	</nav>
	<div class="container">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/img_bg_1.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_2.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_3.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_4.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_6.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_7.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
									<div class="slider-text-inner">
										<h1><a href="#">Best showcase for architecture</a></h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		<div id="fh5co-portfolio">
			<div class="row nopadding">
				<div class="col-md-6 padding-right">
					<div class="row">
						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-1.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>
						<div class="col-md-12 animate-box">
							<a href="single." class="portfolio-grid">
								<img src="images/portfolio-4.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>
						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-5.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>
						
					</div>
				</div>

				<div class="col-md-6 padding-left">
					<div class="row">
						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-2.png" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>
						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-3.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>
						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-6.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>

						<div class="col-md-12 animate-box">
							<a href="single.php" class="portfolio-grid">
								<img src="images/portfolio-7.jpg" class="img-responsive" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
								<div class="desc">
									<h3>Dublin Arena Architect Project</h3>
									<span>Building, Arena</span>
								</div>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div><!-- END container -->

	<div class="container">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<div class="col-md-3 fh5co-widget">
					<h4>About Carbon</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Latest Projects</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">JBC Stadium</a></li>
						<li><a href="#">T-Mobile Arena</a></li>
						<li><a href="#">Target Field</a></li>
						<li><a href="#">London Stadium</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Links</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Work</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">About us</a></li>
					</ul>
				</div>

				<div class="col-md-3">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="http://gettemplates.co">gettemplates.co</a></li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; Powered by <a href="http://devbalu.com/">"DevBalu"</a> 2017</small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://github.com/DevBalu"><i class="icon-git"></i></a></li>
							<li><a href="https://www.linkedin.com/in/%D0%B0%D0%BD%D0%B4%D1%80%D0%B5%D0%B9-%D0%B3%D0%B5%D0%BD%D0%BE%D0%B2-61a003b3/"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</footer>
	</div><!-- END container -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="js/sticky-kit.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

