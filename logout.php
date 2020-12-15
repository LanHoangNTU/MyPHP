<?php 
	session_start();
	if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true){
		$_SESSION['isLogin'] = false;
		session_destroy();
		$_SESSION = array();
	}

	header("Location: login.php");
 ?>