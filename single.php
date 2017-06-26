<?php 
	if(empty($_GET['idg']) && empty($_GET['idc'])){
		header("Location: /index.php");
	}



	session_start();
	require_once("php/connect.php");
	if(!empty($_GET['idg'])){
		$idg = $_GET['idg'];
	}else {
		header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . '/index.php');
	}

	// FIRST STEP OF VERIFICATION IN THIS PAGE
	if($con){
		$sql = "SELECT * FROM `categories` WHERE `categories`.`id_group` = $idg";
		$category_query = $con->query($sql);
		$num_row_cat = mysqli_num_rows($category_query);
	}else {
		print "connection denied.";die;
	}


	// if exist anything in table categories with id group needed then show the following form
	if($num_row_cat > 0){
		$right = "";
		$left = "";

		while ($ct_res = $category_query->fetch_object()) {

			// if you is autorized can see btn del
			if(!empty($_SESSION['auth'])){
				$del_cat = '<a class="btn black" href="php/del_cat.php?idg='  . $idg . '&idc=' . $ct_res->id . '">DEL CAT</a>';
			}else {
				$del_cat = "";
			}

			if ($ct_res->location == "left") {
				$left .= '
						<div class="col-md-12 animate-box">
							' . $del_cat . '
							<a href="single.php?idg=' . $idg . '&idc=' . $ct_res->id . '" class="portfolio-grid">
								<img src="'. $ct_res->bg . '" class="img-responsive" >
								<div class="desc">
									<h3>' . $ct_res->title .'</h3>
									<span>' . $ct_res->subtitle .'</span>
								</div>
							</a>
						</div>
					';

			}elseif($ct_res->location == "right"){
				$right .= '
						<div class="col-md-12 animate-box">
							' . $del_cat . '
							<a href="single.php?idg=' . $idg . '&idc=' . $ct_res->id . '" class="portfolio-grid">
								<img src="'. $ct_res->bg . '" class="img-responsive" >
								<div class="desc">
									<h3>' . $ct_res->title .'</h3>
									<span>' . $ct_res->subtitle .'</span>
								</div>
							</a>
						</div>
				';
			}
		}/*end while*/

		// finish result for first step verification
		$content = '
			<div id="fh5co-portfolio">
				<div class="row nopadding">
					<div class="col-md-6 padding-right">
						<div class="row">
							' . $left . '
						</div><!-- END p-r row -->
					</div><!-- END padding-right -->

					<div class="col-md-6 padding-left">
						<div class="row">
							' . $right . '
						</div><!-- END p-l row -->
					</div><!-- END padding-left -->

				</div><!-- END main-portfolio row -->
			</div><!-- END portfolio -->';

	} /*END FIRST STEP OF VERIFICATION*/

	else {/*SECOND STEP OF VERIFICATION*/

		// get all data except img. for image we need use another request to db, request from table image there we get all image that have id post
		$sql = "SELECT `post`.* FROM `post` WHERE `post`.`id_gr` = $idg ORDER BY id DESC LIMIT 1";
		$gr_post = $con->query($sql);
		$nr_gr_post = mysqli_num_rows($gr_post);


		if ($nr_gr_post < 1) {
			header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST']);die;
		}

		if ($nr_gr_post < 2) {
			$gp = $gr_post->fetch_object();

			// functionals for images
			$sql_image = "SELECT `images`.* FROM `images` WHERE `images`.`id_post` = $gp->id";
			$query_images = $con->query($sql_image);
			$images = "";
			while ($row_img = $query_images->fetch_object()) {

				// if you is autorized can see btn del img 
				// . '&idc=' . $idc .'&idg=' . $idg . '">DEL</a>'
				if(!empty($_SESSION['auth'])){
					$del_img = '<a class="btn black" href="php/del_image.php?idi=' . $row_img->id . '&idg=' . $idg . '">DEL IMG</a>';
				}else {
					$del_img = "";
				}

				$images .= '
						<div class="image-item  animate-box">
							' . $del_img  . '
							<img src="' . $row_img->bg. '" class="img-responsive" >
						</div>';
			}
			// END functionals for images

			// if you is autorized can see btn del
			if(!empty($_SESSION['auth'])){
				$del_post = '<a class="btn black" href="php/del_post.php?idp=' . $gp->id . '">DEL POST</a>';
			}else {
				$del_post = "";
			}

			// finish result for second step verification
			$content = '
					<div id="fh5co-intro">
						<div class="row animate-box">
							<div class="col-md-8 col-md-offset-2 col-md-pull-2">
								' . $del_post . '
								<h2>' . $gp->title . '</h2>
							</div>
						</div>
					</div>
					<div id="fh5co-portfolio">
						<div class="row">

							<div class="col-md-4 col-md-push-8 sticky-parent">
								<div class="detail" id="sticky_item">
									<div class="animate-box">
										<h2>' . $gp->desc_title . '</h2>
										<span>Architectural Design</span>
										<p>' . $gp->description . '</p>
									</div>
								</div>
							</div>

							<div class="col-md-7 col-md-pull-4 image-content">
							' . $images . '
							</div>
							
						</div>
					</div>

			'; /*end $content*/
		}
	}/*END SECOND STEP OF VERIFICATION*/

	// THIRD STEP OF VERIFICATION
	// if in href exist id of categori then send request to table post and get all data which have id categories and rewriting variable $content in the following form
	if(!empty($_GET['idc'])){
		$idc = $_GET['idc'];
		$sql_cat_pos = "SELECT `post`.* FROM `post` WHERE `post`.`id_cat` = $idc ORDER BY id DESC LIMIT 1";
		$query_cat_pos = $con->query($sql_cat_pos);
		$nr_cat_pos = mysqli_num_rows($query_cat_pos);

		if ($nr_cat_pos < 1) {
			print'Data for this category is not was added';die;
		}


		$cp = $query_cat_pos->fetch_object();
		// functionals for images
		$sql_cat_pos_image = "SELECT `images`.* FROM `images` WHERE `images`.`id_post` = $cp->id";
		$query_cat_pos_images = $con->query($sql_cat_pos_image);
		$nr_cat_pos_images = mysqli_num_rows($query_cat_pos_images);
		$cat_pos_images = '';

		if ($nr_cat_pos_images > 0) {
			while ($row_img = $query_cat_pos_images->fetch_object()) {
				// if you is autorized can see btn del img 
				if(!empty($_SESSION['auth'])){
					$del_img = '<a class="btn black" href="php/del_image.php?idi=' . $row_img->id . '&idc=' . $idc .'&idg=' . $idg . '">DEL IMG</a>';
				}else {
					$del_img = "";
				}
				$cat_pos_images .= '
						<div class="image-item  animate-box">
							' . $del_img . '
							<img src="' . $row_img->bg. '" class="img-responsive" >
						</div>';
			}
		}
		// END functionals for images

		// if you is autorized can see btn del
		if(!empty($_SESSION['auth'])){
			$del_post = '<a class="btn black" href="php/del_post.php?idp=' . $cp->id . '">DEL POST</a>';
		}else {
			$del_post = "";
		}
		// finish result for second step verification
		$content = '
				<div id="fh5co-intro">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 col-md-pull-2">
							' . $del_post . '
							<h2>' . $cp->title . '</h2>
						</div>
					</div>
				</div>
				<div id="fh5co-portfolio">
					<div class="row" style="min-height: 450px;">
						<div class="col-md-4 col-md-push-8 sticky-parent">
							<div class="detail" id="sticky_item">
								<div class="animate-box">
									<h2>' . $cp->desc_title . '</h2>
									<p>' . $cp->description . '</p>
								</div>
							</div>
						</div>

						<div class="col-md-7 col-md-pull-4 image-content">
						' . $cat_pos_images . '
						</div>
						
					</div>
				</div>

		'; /*end $content*/
	}


			// print "<pre>";
			// print_r($cp);
			// print "</pre>";

	// END THIRD STEP OF VERIFICATION

	// nav / auth logic
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
					<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
						<div id="fh5co-logo"><a href="index.php"><img src="images/logo.png"></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Portfolio</a></li>
<!-- 							<li class="has-dropdown"><a href="#">Dropdown</a>
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

	<!-- field there show result in dependence of step -->
	<div class="container">
		<?php print empty($content) ? "" : $content; ?>
	</div><!-- END container-wrap -->
	<!--END  field there show result in dependence of step -->

	<!-- footer -->
	<?php require_once("components/footer.php"); ?>
	<!-- END footer -->

	<!-- libs -->
	<?php include("components/libs.php"); ?>
	<!-- END libs -->

	</body>
</html>

