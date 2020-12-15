<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $page_title; ?></title>	
	<!-- <link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" /> -->
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <script src="includes/bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="includes/fontawesome/css/all.min.css">
    <script src="includes/fontawesome/js/all.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/sweetalert2.css">
    <script src="includes/bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php 
		require ('includes/validate_user.php'); 
	?>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top" style="background-color: #7952b3;">
	  	<a class="navbar-brand" href="index.php">PHP</a>

	  	<div class="navbar-collapse">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.php">Home Page</a></li>
				<?php if($_SESSION['account'][3] == 1) 
				echo '<li class="nav-item"><a class="nav-link" href="view_users.php">View Users</a></li>'
				?>
				<li class="nav-item"><a class="nav-link" href="projects.php">Projects</a></li>
				<li class="nav-item"><a class="nav-link" href="about.php">Infos</a></li>
				<?php if($_SESSION['account'][3] == 1) 
				echo '<li class="nav-item"><a class="nav-link" href="send_mail.php">Email</a></li>'
				?>
			</ul>
	  	</div>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropleft">
		      	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					 <img width="30" height="30" src="images/<?php echo($_SESSION["account"][2]) ?>" alt="">
		      	</a>
		      	<div class="dropdown-menu">
		      		<div class="dropdown-header">
		      			Signed in as
		      		</div>
		      		<div class="dropdown-item">
		      			<b><?php echo $_SESSION["account"][1] ?></b>
		      		</div>
		      		<div class="dropdown-divider"></div>
		        	<a class="dropdown-item" href="my_account.php">Your profile</a>
		        	<a class="dropdown-item" href="edit_account.php?active=1">Settings</a>
		      		<div class="dropdown-divider"></div>
		        	<a class="dropdown-item" href="logout.php">Logout</a>
		      	</div>
		    </li>
			<li class="nav-item">
				<b class="nav-link disabled"><?php echo $_SESSION["account"][0] ?></b>
			</li>
		</ul>
	</nav>
