<?php 
	if (isset($_POST)) {
		define('MB', 1048576);
		$uname = $_POST['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['mail'];
		$pass = sha1($_POST['pwd']);

		$conn= mysqli_connect('localhost', 'root', '', 'my_web');
		mysqli_set_charset($conn,  'UTF8');
		if(!isset($_FILES['avatar']['name'])){
			$sql = 
				"INSERT INTO account (Username, FirstName, LastName, Email, Pwd, Role)
				VALUES ('$uname', '$fname', '$lname', '$email', '$pass', 3)";

			if(!mysqli_query($conn, $sql)){
				$data['mes'] = "Username or Email already existed!";
				$data['valid'] = false;
				echo json_encode($data);
			}
			else{
				$data['mes'] = "Account created!";
				$data['valid'] = true;
				echo json_encode($data);
			}
		}
		else{
			$test = explode(".", $_FILES['avatar']["name"]);
			$extension = array_pop($test);
			$name = implode(".", $test)."_".$uname.".".$extension;
			$size = $_FILES['avatar']["size"];

			$sql = 
				"INSERT INTO account (Username, FirstName, LastName, Email, Pwd, Role, Icon)
				VALUES ('$uname', '$fname', '$lname', '$email', '$pass', 3, '$name')";

			if($size <= 5*MB){
				if(!mysqli_query($conn, $sql)){
					$data['mes'] = "Username or Email already existed!";
					$data['valid'] = false;
					echo json_encode($data);
				}
				else{
					$location = "../images/".$name;
					move_uploaded_file($_FILES["avatar"]["tmp_name"], $location);
					$data['mes'] = "Account created!";
					$data['valid'] = true;
					echo json_encode($data);
				}
			}
			else{
				$data['mes'] = "Profile picture must be smaller than 5MB!";
				$data['valid'] = false;
				echo json_encode($data);
			}
		}
	}
?>