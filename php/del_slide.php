<?php 
	if (!empty($_GET['ids'])) {
		$ids = $_GET['ids'];
		$sql = "DELETE FROM `slider` WHERE `slider`.`id` = $ids";
		$con->query($sql);
	}
 ?>