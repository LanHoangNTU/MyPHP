<?php 
	if (isset($_POST)) {
		session_start();
		$opwd = sha1($_POST['opwd']);
		$npwd = sha1($_POST['npwd']);
		$cpwd = sha1($_POST['cpwd']);

		$conn= mysqli_connect('localhost', 'root', '', 'my_web');
		mysqli_set_charset($conn,  'UTF8');
		$sql_p = 
			"SELECT Pwd
			FROM account
			WHERE Username = '".$_SESSION["account"][0]."'";
		$oldpass = mysqli_fetch_array(mysqli_query($conn, $sql_p));
		if(strcmp($opwd, $oldpass["Pwd"]) == 0){
			if(strcmp($cpwd, $npwd) != 0){
				$data['mes'] = "Password confirmation doesn't match new password!";
				$data['valid'] = false;
				echo json_encode($data);
			}
			else{
				if(strcmp($opwd, $npwd) == 0){
					$data['mes'] = "Please enter a new password!";
					$data['valid'] = false;
					echo json_encode($data);
				}
				else{
					$sql = 
						"UPDATE account
						SET Pwd = '$npwd'
						WHERE Username = '".$_SESSION["account"][0]."'";
					if(!mysqli_query($conn, $sql)){
						$data['mes'] = "There's an error in the system!";
						$data['valid'] = false;
						echo json_encode($data);
					}
					else{
						$data['mes'] = "Password changed successfully!";
						$data['valid'] = true;
						echo json_encode($data);
					}
				}
			}
		}
		else{
			$data['mes'] = "Old password does not match!";
			$data['valid'] = false;
			echo json_encode($data);
		}
	}
 ?>