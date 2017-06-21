<?php 
	session_start();

	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	require_once("../php/connect.php");

	// get all groups & categories existent
	$options_groups = "";
	$options_categories = "";
	if (!empty($con)) {
		$sql_gr = "SELECT `groups`.* FROM `groups` ";
		$sql_cat = "SELECT `categories`.* FROM `categories`";

		$query_gr = $con->query($sql_gr);
		$query_cat = $con->query($sql_cat);

		while($row = $query_gr->fetch_object()){
			$options_groups .= '<option value="' . $row->id . '">' . $row->title . '</option>';
		}
		while($row = $query_cat->fetch_object()){
			$options_categories .= '<option value="' . $row->id . '">' . $row->title . '</option>';
		}

		$gr = '
			<div class="col-md-12 col-sm-12">
				<h4>Select which group this post will belong to</h4>
				<div class="form-group">
					<select name="groups" class="form-control">
						' . $options_groups . '
					</select>
				</div>
			</div>
		';
		$cat = '
			<div class="col-md-12 col-sm-12">
				<h4>Select which category this post will belong to</h4>
				<div class="form-group">
					<select name="categories" class="form-control">
						' . $options_categories . '
					</select>
				</div>
			</div>';
		$desc = '
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<textarea name="post_desc" class="form-control" id="" cols="30" rows="15" placeholder="Description"></textarea>
				</div>
			</div>
		';
	}

	// Depending on the choice will be showing form of filling
	if (isset($_GET['gr'])) {
		$form = '
			<form action="../php/add_group.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<h2 class="text-center">ADD GROUP</h2>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Title" name="title">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subtitle" name="subtitle">
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<select name="location" class="form-control">
								<option value="left">left</option>
								<option value="right">right</option>
							</select>
						</div>
					</div>

					<div class="col-md-2 col-md-offset-10 col-sm-12 btn-right">
						<div class="form-group">
							<input type="submit" value="ADD" class="btn btn-primary btn-modify" style="width: 100%;">
						</div>
					</div>
				</div>
			</form>
		';

	}elseif (isset($_GET['cat'])) {
		$form = '
			<form action="../php/add_cat.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<h2 class="text-center">ADD CATEGORY</h2>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Title" name="title">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subtitle" name="subtitle">
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
						</div>
					</div>

					' . $gr . '

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<select name="location" class="form-control">
								<option value="left">left</option>
								<option value="right">right</option>
							</select>
						</div>
					</div>

					<div class="col-md-2 col-md-offset-10 col-sm-12 btn-right">
						<div class="form-group">
							<input type="submit" value="ADD" class="btn btn-primary btn-modify" style="width: 100%;">
						</div>
					</div>
				</div>
			</form>
		';

	}elseif (isset($_GET['pt'])) {




		$form = '
			<form action="../php/add_cat.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<h2 class="text-center">ADD POST</h2>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Title" name="title">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subtitle" name="subtitle">
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
						</div>
					</div>

					' . $gr . '
					'. $cat . '

					' . $desc . '

					<div class="col-md-2 col-md-offset-10 col-sm-12 btn-right">
						<div class="form-group">
							<input type="submit" value="ADD" class="btn btn-primary btn-modify" style="width: 100%;">
						</div>
					</div>
				</div>
			</form>
		';
	}

// print "<pre>";
// print_r($row);
// print "</pre>";

	// nav/ auth
	if(!empty($_SESSION['auth'])){
		$log = '
			<li><a href="../php/logout.php">Logout</a></li>';
	}else {
		$log = '
			<li><a href="log.php">Login</a></li>
		';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">

		<!-- Animate.css -->
		<link rel="stylesheet" href="../css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="../css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="../css/bootstrap.css">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="../css/flexslider.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="../css/style.css">

		<!-- Modernizr JS -->
		<script src="../js/modernizr-2.6.2.min.js"></script>

	</head>

	<body>
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="top-menu">
					<div class="row">
						<div class="col-sm-7 text-right menu-1">
							<ul>
								<li class="active"><a href="../index.php">Home</a></li>
								<?php print $log; ?>
							</ul>
						</div>
					</div><!-- END row -->
				</div><!-- END top-menu -->
			</div><!-- END container -->
		</nav>

		<div class="fh5co-loader"></div>

		<!-- -->

		<br>
		<br>
		<!-- nav panel -->
		<div class="container-fluid" style="border-bottom: 1px solid #ccc;">
			<div class="row">

				<div class="col-md-1 col-sm-12">
					<div class="form-group">
						<a href="panel.php?gr=1" class="btn btn-primary btn-modify" style="width:100%;">GROUP</a>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<a href="panel.php?cat=1" class="btn btn-primary btn-modify"  style="width:100%; padding: 10px 0;">CATEGORY</a>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<a href="panel.php?pt=1" class="btn btn-primary btn-modify"  style="width:100%;">POST</a>
					</div>
				</div>

			</div>
		</div>
		<!-- END nav panel -->

		<!-- add form -->
		<br>
		<div class="container" style="padding: 0;">
			<div class="col-md-8 col-md-offset-2 col-sm-12 animate-box">
				<div class="form-wrap">
					<?php print $form; ?>
				</div>
			</div>
		</div>
		<!-- END add form -->


		<!-- footer -->
		<?php require_once("../components/footer.php"); ?>
		<!-- END footer -->

		<!-- libs -->
		<!-- jQuery -->
		<script src="../js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="../js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="../js/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="../js/jquery.flexslider-min.js"></script>
		<!-- Sticky Kit -->
		<script src="../js/sticky-kit.min.js"></script>
		<!-- Main -->
		<script src="../js/main.js"></script>
		<!-- END libs -->

	</body>
</html>

