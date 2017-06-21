<?php
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	require_once("connect.php");
	if (!empty($_GET['idg'])) {
		$idg = $_GET['idg'];
		$sql = "DELETE FROM `groups` WHERE `groups`.`id` = $idg";
		$con->query($sql);
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}
 ?>
