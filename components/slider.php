<?php 
	if($con){
		$sql = "SELECT * FROM `slider`";
		$query_slider = $con->query($sql);
		$slides = "";
		while ($row_slide = $query_slider->fetch_object()) {
			// print "<pre>";
			// print_r($row_slide);
			// print "</pre>";

			if(!empty($_SESSION['auth'])){
				$del_slide = '<a  class="btn right" href="../php/del_slide.php?ids=' . $row_slide->id . '">DEL</a>';
			}else {
				$del_slide = "";
			}
			$slides .= '
				<li style="background-image: url(' . $row_slide->img . ')">
					<div class="overlay">' . $del_slide . '</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-xs-8 col-md-offset-1 slider-text">
								<div class="slider-text-inner">
									<h1>' . $row_slide->description . '</h1>
								</div>
							</div>
						</div>
					</div>
				</li>
			';
		}
	}
 ?>
<div class="flexslider">
	<ul class="slides">
		<?php print empty($slides) ? "" : $slides; ?>
	</ul>
</div>