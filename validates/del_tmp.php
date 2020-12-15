<?php 
	$filename = $_POST['file'];
	
	echo unlink("../images/tmp/".$filename)	;
 ?>