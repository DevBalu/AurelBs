<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		require_once("connect.php");
		$username = $_POST['username'];
		$password = $_POST['password'];


		if ($con) {
			$userreq = mysqli_query($con, "SELECT * FROM `viorel`") ;
			$response = $userreq->fetch_assoc();
		}

		if($response['username'] ==  $username && $response['password'] == $password){
			session_start();
			$_SESSION['auth'] = true;
			header('Location: /AurelBs/index.php');
		}else{
			header('Location: /AurelBs/log.php');
		}
	}else{
		header('Location: /AurelBs/log.php');
	}
 ?>