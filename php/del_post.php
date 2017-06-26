<?php
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location: /index.php");
	}

	require_once("connect.php");

	if (!empty($_GET['idp'])) {
		$idp = $_GET['idp'];
		$sql_post = "DELETE FROM `post` WHERE `post`.`id` = $idp";
		$sql_img = "DELETE FROM `images` WHERE `images`.`id_post` = $idp";

		$con->query($sql_post);
		$con->query($sql_img);

		header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . '/index.php');
		// header("Location: /index.php");
	}
 ?>
