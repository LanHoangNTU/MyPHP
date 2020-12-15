<?php 
	define('MB', 1048576);

	if($_FILES["avatar"]["name"] != ''){
		session_start();
		$name = $_FILES["avatar"]["name"];
		$size = $_FILES["avatar"]["size"];

		if($_FILES["avatar"]["size"] <= 5*MB){
			$location = "../images/tmp/".$name;
			move_uploaded_file($_FILES["avatar"]["tmp_name"], $location);
		}
		
		$data = $name;
		echo $data;
	}
 ?>