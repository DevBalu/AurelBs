<?php 
	session_start();
	if(empty($_SESSION['auth'])){
		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/index.php');
	}

	require_once("connect.php");

	if($con){
		// -------------------ADD DATA IN TABLE POST--------------------------
		if(!empty($_POST['title']) && !empty($_POST['post_desc']) && !empty($_FILES['fileToUpload'])){

			if (empty($_POST['groups']) && empty($_POST['categories'])) {
				header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/adm/panel.php');
			}

			// title
			$title = $_POST['title'];

			// subtitle
			if (!empty($_POST['subtitle'])) {
				$subtitle = $_POST['subtitle'];
			}else {
				$subtitle = "";
			}

			// id group
			$id_group = $_POST['groups'];

			// id category
			$id_category = $_POST['categories'];

			// location
			$description = $_POST['post_desc'];

			// query
			$sql = "INSERT INTO `post` (`id`, `id_gr`, `id_cat`, `title`, `desc_title`, `description`) VALUES (NULL, '$id_group', '$id_category', '$title', '$subtitle', '$description');";
			$con->query($sql);

			//-------------------/*END ADD DATA IN TABLE POST*/--------------------------

			//-------------------/*ADD DATA IN TABLE IMAGES*/--------------------------
			// get from db last added post 
			$sql_p = "SELECT * FROM `post` ORDER BY id DESC LIMIT 1";
			$query_p = $con->query($sql_p);
			$num_rows = mysqli_num_rows($query_p);

			if ($num_rows == 1) {
				$query_p = $query_p->fetch_object();
				$id_gr = $query_p->id_gr;
				$id_cat = $query_p->id_cat;
				$id_post = $query_p->id;

				// ---logic with multiple upload image
				$img = $_FILES["fileToUpload"];
				foreach ($img["tmp_name"] as $key => $tmp_name) {

					// file name
					$image_name = "../post_images/" . $img["name"][$key];
					$file_size = $img["size"][$key];

					//if file exist in post_images
					if (file_exists($image_name)) {
						// remove file from folder in order to dublicate
						unlink($image_name);
					}

					// // if not empty name of file, move file select to directori suitable
					if(!empty($image_name)){
						move_uploaded_file($tmp_name, $image_name);
						$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/post_images/' . $img["name"][$key];

					}else{
						$image_url = "";
					}
					// ---logic with multiple upload image

					$sql_img = "INSERT INTO `images` (`id`, `id_post`, `bg`) VALUES (NULL, '$id_post', '$image_url')";
					$con->query($sql_img);

				}/*END logic with multiple upload image*/

			}/*END ADD DATA IN TABLE IMAGES*/

		}/*END verif if not empty important fields*/

		header("Location:" . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/AurelBs/single.php?idg=' . $id_gr . '&idc=' . $id_cat);
	}/*END of verification if not empty connection*/

 ?>