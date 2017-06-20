<?php 
	session_start();

	if(empty($_SESSION['auth'])){
		// header("Location: /AurelBs/index.php");
	}

	require_once("../php/connect.php");

	if (isset($_GET['gr'])) {
		$href = "../php/add_group.php";
		$name = "group_name";
		$bg = "group_bg";
		$select_group = "group_select";
		$select_category = "";


	}


	if (!empty($con)) {

		$sql_group_option = "SELECT * FROM groups";
		$query_group = $con->query($sql_group_option);


			// print "<pre>";
			// print_r();
			// print "</pre>";

		// }
	}


	// navbar / auth logic 


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

					<form action="<?php print $href; ?>">
						<div class="row">
							<h2 class="text-center">ADD ANYTHING DATA</h2>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Title" name="<?php print $name;?>">
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<input type="file" class="form-control" placeholder="background" name="<?php print $bg; ?>">
								</div>
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<select name="<?php print $select_group; ?>" class="form-control">
										<option value="zina" disabled></option>
										<option value="vasea">woodwork</option>
										<option value="vasea">roof</option>
									</select>
								</div>
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<select name="<?php print $select_category; ?>" class="form-control">
										<option value="zina" disabled></option>
										<option value="vasea">woodwork</option>
										<option value="vasea">roof</option>
									</select>
								</div>
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group">
									<textarea name="" class="form-control" id="" cols="30" rows="15" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-2 col-md-offset-10 col-sm-12 btn-right">
								<div class="form-group">
									<input type="submit" value="ADD" class="btn btn-primary btn-modify" style="width: 100%;">
								</div>
							</div>
						</div>
					</form>

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

