<?php 
	define('MB', 1048576);

	if($_FILES["avatar"]["name"] != ''){
		session_start();
		$test = explode(".", $_FILES["avatar"]["name"]);
		$extension = array_pop($test);
		$name = implode(".", $test)."_".$_SESSION["account"][0].".".$extension;
		$size = $_FILES["avatar"]["size"];

		if($_FILES["avatar"]["size"] <= 5*MB){
			$location = "../images/".$name;
			move_uploaded_file($_FILES["avatar"]["tmp_name"], $location);

			$conn= mysqli_connect('localhost', 'root', '', 'my_web');
			mysqli_set_charset($conn,  'UTF8');
			$sql="UPDATE account SET Icon = '$name' WHERE Username = '".$_SESSION["account"][0]."'";
			$result = mysqli_query($conn, $sql);
			$_SESSION["account"][2] = $name;
			mysqli_close($conn);
			$data["valid"] = true;
		}
		else
			$data["valid"] = false;
		
		$data["name"] = $name;
		echo json_encode($data);
	}
 ?>