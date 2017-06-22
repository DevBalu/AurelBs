<?php 
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	if (!empty($_GET['idi'])) {
		require_once("connect.php");
		$idi = $_GET['idi'];
		$sql = "DELETE FROM `images` WHERE `images`.`id` = $idi";
		$con->query($sql);

		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}
 ?>