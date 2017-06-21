<?php 
	session_start();
	require_once("php/connect.php");

	if (!empty($con)) {
		$sql = "SELECT * FROM groups";
		$group_query = $con->query($sql);

		$right = "";
		$left = "";
		while ($gr_res = $group_query->fetch_object()) {

			// if you is autorized can see btn del
			if(!empty($_SESSION['auth'])){
				$del_group = '<a class="btn black" href="php/del_group.php?idg=' . $gr_res->id . '">DEL</a>';
			}else {
				$del_group = "";
			}

			if ($gr_res->location == "left") {
				$left .= '
						<div class="col-md-12 animate-box">
							' . $del_group . '
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
							' . $del_group . '
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
			<li><a href="adm/panel.php?pt=1">Admin</a></li>
			<li><a href="php/logout.php">Logout</a></li>';
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
	<?php require_once("components/bignav.php"); ?>

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

