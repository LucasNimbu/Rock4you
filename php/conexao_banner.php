<div id="coin-slider">
	<?php
	include('conexao.php');
	$sql = "SELECT * FROM `banner`";
	$query = $mysqli->query($sql);
	while($result = mysqli_fetch_array($query)){
		echo'
		<a href="'.$result["link"].'" target="_blank">
		<img src="Upload/banner/'.$result["imgcaminho"].'">
		</a>
		';
	}
	?>
</div>
