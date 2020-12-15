<?php 
	session_start();
	$to = $_POST["to"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];
	$message = wordwrap($message,70);

	$headers = "From: lanhoangphp@gmail.com\r\n";

	if(mail($to, $subject, $message, $headers)){
		$data = true;
	}
	else{
		$data = false;
	}
	echo $data;
 ?>