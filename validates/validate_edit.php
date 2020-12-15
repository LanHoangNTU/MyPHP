<?php 
	if (isset($_POST)) {
		session_start();
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['mail'];
		$bio = $_POST['bio'];
		$location = $_POST['location'];
		$company = $_POST['company'];

		$conn= mysqli_connect('localhost', 'root', '', 'my_web');
		mysqli_set_charset($conn,  'UTF8');
		$sql = 
			"UPDATE account
			SET FirstName = '$fname', LastName = '$lname', Email = '$email', Bio = '$bio', Location = '$location', Company = '$company'
			WHERE Username = '".$_SESSION["account"][0]."'";
		if(!mysqli_query($conn, $sql)){
			$data['mes'] = "Failed to edit profile!";
			$data['valid'] = false;
			echo json_encode($data);
		}
		else{
			$data['mes'] = "New profile saved!";
			$data['valid'] = true;
			echo json_encode($data);
		}
	}
?>