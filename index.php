<?php 
	session_start();
	require_once("php/connect.php");

	if (!empty($con)) {
		$sql = "SELECT * FROM groups";
		$group_query = $con->query($sql);

		$right = "";
		$left = "";
		while ($gr_res = $group_query->fetch_object()) {
			if ($gr_res->location == "left") {
				$left .= '
						<div class="col-md-12 animate-box">
							<a href="single.php?idg=' . $gr_res->id . '" class="portfolio-grid">
								<img src="'. $gr_res->bg . '" class="img-responsive" >
								<div class="desc">
									<h3>' . $gr_res->title .'</h3>
									<span>' . $gr_res->subtitle .'</span>
								</div>
							</a>
						</div>
					';

			}elseif($gr_res->location == "right"){
				$right .= '
						<div class="col-md-12 animate-box">
							<a href="single.php?idg=' . $gr_res->id . '" class="portfolio-grid">
								<img src="'. $gr_res->bg . '" class="img-responsive" >
								<div class="desc">
									<h3>' . $gr_res->title .'</h3>
									<span>' . $gr_res->subtitle .'</span>
								</div>
							</a>
						</div>
				';
			}

			// print "<pre>";
			// print_r($gr_res);
			// print "</pre>";

		}
	}


	// navbar / auth logic 
	if(!empty($_SESSION['auth'])){
		$log = '
			<li><a href="php/logout.php">Logout</a></li>
			<li><a href="#">Admin</a></li>';
	}else {
		$log = '
			<li><a href="log.php">Login</a></li>
		';
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include("components/head.php"); ?>
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
					<div class="col-sm-7 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Portfolio</a></li>
							<li class="has-dropdown"><a href="single.php">Dropdown</a>
								<ul class="dropdown">
									<li><a href="#">Infrastructure</a></li>
									<li><a href="#">Residential</a></li>
									<li><a href="#">Environmental</a></li>
									<li><a href="#">Megabuilders</a></li>
								</ul>
							</li>
							<li><a href="contact.php">Contact</a></li>
							<?php print $log; ?>
						</ul>
					</div>
				</div><!-- END row -->
			</div><!-- END top-menu -->
		</div><!-- END container -->
	</nav>

	<div class="container">
		<aside id="fh5co-hero">
			<?php include("components/slider.php"); ?>
		</aside>

		<div id="fh5co-portfolio">
			<div class="row nopadding">
				<div class="col-md-6 padding-right">
					<div class="row">
						<?php print empty($left) ? "" : $left; ?>
					</div><!-- END p-r row -->
				</div><!-- END padding-right -->

				<div class="col-md-6 padding-left">
					<div class="row">
						<?php print empty($right) ? "" : $right; ?>


					</div><!-- END p-l row -->
				</div><!-- END padding-left -->

			</div><!-- END main-portfolio row -->
		</div><!-- END portfolio -->
	</div><!-- END container -->

	<!-- footer -->
	<?php require_once("components/footer.php"); ?>
	<!-- END footer -->

	<!-- libs -->
	<?php include("components/libs.php"); ?>
	<!-- END libs -->

	</body>
</html>

