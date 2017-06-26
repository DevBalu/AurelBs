<?php 
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . '/index.php');
	}

	if (!empty($_GET['idi']) && !empty($_GET['idg'])) {
		require_once("connect.php");
		$idi = $_GET['idi'];
		$idg = $_GET['idg'];
		$sql = "DELETE FROM `images` WHERE `images`.`id` = $idi";
		$con->query($sql);

		if (!empty($_GET['idc'])) {
			$idc = $_GET['idc'];
			header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . '/single.php?idg=' . $idg . '&idc=' . $idc);
		}else {
			$idc = "";
		}

		header("Location:" . $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . '/single.php?idg=' . $idg . '&idc=' . $idc);
	}
 ?>