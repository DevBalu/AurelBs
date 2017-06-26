<?php 
	session_start();
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
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="top-menu">
				<div class="row">
					<div class="col-sm-2">
						<div id="fh5co-logo"><a href="index.php"><img src="images/logo.png"></a></div>
					</div>
					<div class="col-sm-10 text-right menu-1">
						<ul>
							<li ><a href="index.php">Portfolio</a></li>
<!-- 							<li class="has-dropdown"><a href="single.php">Dropdown</a>
								<ul class="dropdown">
									<li><a href="#">Infrastructure</a></li>
									<li><a href="#">Residential</a></li>
									<li><a href="#">Environmental</a></li>
									<li><a href="#">Megabuilders</a></li>
								</ul>
							</li> -->
							<li><a href="contact.php">Contact</a></li>
							<?php print $log; ?>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
	<div class="container">
		<div id="fh5co-intro">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 col-md-pull-2">
					<h2>Contact Us</h2>
				</div>
			</div>
		</div>
		<div id="fh5co-contact">
			<div class="row">
				<div class="col-md-4 animate-box">
					<h3>Contact Information</h3>
					<ul class="contact-info">
						<li><i class="icon-location4"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
						<li><i class="icon-phone3"></i>+ 1235 2355 98</li>
						<li><i class="icon-location3"></i><a href="#">info@yoursite.com</a></li>
						<li><i class="icon-globe2"></i><a href="#">www.yoursite.com</a></li>
					</ul>
				</div>
				<div class="col-md-8 animate-box">
					<div class="form-wrap">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Name">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" class="form-control" id="" cols="30" rows="15" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send Message" class="btn btn-primary btn-modify">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- END container -->

	<!-- footer -->
	<?php require_once("components/footer.php"); ?>
	<!-- END footer -->

<!-- 
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div> -->

	<!-- libs -->
	<?php include("components/libs.php"); ?>
	<!-- END libs -->

	</body>
</html>

