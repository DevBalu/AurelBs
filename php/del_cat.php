<?php
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	require_once("connect.php");

	if (!empty($_GET['idc']) && !empty($_GET['idg'])) {
		$idc = $_GET['idc'];
		$idg = $_GET['idg'];

		$sql = "DELETE FROM `categories` WHERE `categories`.`id` = $idc";
		$con->query($sql);
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/single.php?idg=' . $idg);
	}
 ?>