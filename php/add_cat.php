<?php 
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	require_once("connect.php");

	if($con){
		if(!empty($_POST['title']) && !empty($_FILES['fileToUpload']) && !empty($_POST['location']) && !empty($_POST['groups'])){
			// title
			$title = $_POST['title'];

			// subtitle
			if (!empty($_POST['subtitle'])) {
				$subtitle = $_POST['subtitle'];
			}else {
				$subtitle = "";
			}

			$id_group = $_POST['groups'];

			// location
			$location = $_POST['location'];

			// image_url
				// file size
				$file_size = $_FILES["fileToUpload"]['size'];

				if ($file_size > 11097152){
					$message = 'File too large. File must be less than 2 megabytes.'; 
					echo '<script type="text/javascript">alert("'.$message.'");</script>';
				}else {
					// file name
					$image_name = '../post_images/' . $_FILES['fileToUpload']['name'];

					//if file exist in post_images
					if (file_exists($image_name)) {
						// remove file from folder in order to dublicate
						unlink($image_name);
					}

					// if not empty name of file, move file select to directori suitable
					if(!empty($_FILES['fileToUpload']['name'])){
						move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $image_name);
						$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/post_images/' . $_FILES['fileToUpload']['name'];
					}else{
						$image_url = "";
					}
					// in db saving href of image compilated
				}
			//END  image_url

			// query
			$sql = "INSERT INTO `categories` (`id`, `id_group`, `bg`, `title`, `subtitle`, `location`) VALUES (NULL, '$id_group', '$image_url', '$title', '$subtitle', '$location')";
			$con->query($sql);

			header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/adm/panel.php?cat=1');
		}
	}/*END of verification if not empty connection*/

 ?>