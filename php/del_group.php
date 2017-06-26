<?php
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location: /index.php");
	}

	require_once("connect.php");
	if (!empty($_GET['idg'])) {
		$idg = $_GET['idg'];
		$sql = "DELETE FROM `groups` WHERE `groups`.`id` = $idg";
		$sql_ct = "DELETE FROM `categories`  WHERE `categories` .`id_group` = $idg";
		$sql_pt = "DELETE FROM `post` WHERE `post` .`id_gr` = $idg";
		$con->query($sql);
		header("Location: /index.php");
	}
 ?>
