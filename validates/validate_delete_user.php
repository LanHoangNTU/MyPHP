<?php 
	$username = $_POST['username'];
	$conn= mysqli_connect('localhost', 'root', '', 'my_web');
	mysqli_set_charset($conn,  'UTF8');

	$sql="DELETE FROM account WHERE Username = '$username'";

	$data = mysqli_query($conn, $sql);
	echo $data;
 ?>