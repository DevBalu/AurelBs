<?php 
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	if (!empty($_GET['ids'])) {
		require_once("connect.php");
		$ids = $_GET['ids'];
		$sql = "DELETE FROM `slider` WHERE `slider`.`id` = $ids";
		$con->query($sql);

		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}
 ?>