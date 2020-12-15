<?php 
	$u = $_POST["username"];

	$conn= mysqli_connect('localhost', 'root', '', 'my_web');
	mysqli_set_charset($conn, 'UTF8');

	$sql="SELECT Email FROM account WHERE Username = '$u'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		$pwd = rand(100000, 999999);
		$encrypted = sha1($pwd);
		$sql="UPDATE account SET Pwd = '$encrypted' WHERE Username = '$u'";
		if(!mysqli_query($conn, $sql)){
			$data = array("mes" => "There was an error in the system...".mysqli_error($conn), "valid" => false);
			echo json_encode($data);
		}
		else{
			$offset=7*60*60; //converting 7 hours to seconds.

			$acc = mysqli_fetch_array($result);
			$to = $acc["Email"];

			$subject = "MyPHP: Your new password";

			$message = 
			"<h5 style='color: gray;'>MyPHP account</h5>
			<h2>Your account's password has been changed</h2>
			<p>The password for your account '".$u."' was changed on <b>".date("d/m/Y")."</b> at <b>".gmdate("H:i", time() + $offset)."</b> GMT+7</p>
			<br>
			<p>Your new password is <b>$pwd</b></p>
			<br>
			<p>If this was not your doing, please change your password because your account might have been violated
			<br>
			Thanh you,
			Nguyen Dinh Hoang Lan
			<p/>";
			$message = wordwrap($message,70);

			$headers = "From: lanhoangphp@gmail.com\r\n";
			$headers .= "Content-type: text/html\r\n";

			if(mail($to, $subject, $message, $headers)){
				$data = array("mes" => "Reset password mail sent! Please check your inbox.", "valid" => true);
				echo json_encode($data);
			}
			else{
				$data = array("mes" => "Failed to send mail..", "valid" => false);
				echo json_encode($data);
			}
		}
	}
	else{
		$data = array("mes" => "User ".$u." does not exist!", "valid" => false);
		echo json_encode($data);
	}
 ?>