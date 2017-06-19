<?php 
	session_start();
	if(!empty($_SESSION['auth'])){
		header("Location: /AurelBs/index.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>AurelBs</title>

	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<link rel="stylesheet" href="css/log.css">

</head>
<body>
	<div id="btn"><a href="index.php">GO HOME</a></div>

	<div class="container">
		<div class="row">
			<div class="login col l5 offset-l3 s12">
				<div class=""><a href="e-learing"></a></div>
				<h2 class="login-header">Log in</h2>

				<form class="login-container" method="post" action="php/log_func.php">
					<p><input type="text" placeholder="Username" name="username"></p>
					<p><input type="password" placeholder="Password" name="password"></p>
					<p><input type="submit" value="Sign in"></p>
				</form>
			</div>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>


</body>
</html>