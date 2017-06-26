<?php
	// $con = new mysqli("localhost", "root", "", "topaza");
	$con = new mysqli("213.171.200.94", "viorel", "5Hp242424", "topaza");

	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit;
	}
?>