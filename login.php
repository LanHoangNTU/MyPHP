<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/fontawesome/css/all.min.css">
</head>
<body>
	<?php 
	$error = false;
		ini_set('session.cache_limiter','public');
		session_cache_limiter(false);
		session_start();
		if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
			header("Location: index.php");
		}
		else if(isset($_POST['submit'])){
			$conn= mysqli_connect('localhost', 'root', '', 'my_web');
			mysqli_set_charset($conn,  'UTF8');
			$ac = $_POST['account'];
			$pw = sha1($_POST['password']);
			$sql="SELECT Username, Pwd, Role, FirstName, LastName, Icon FROM account WHERE Username = '$ac' AND Pwd = '$pw'";
			$result = mysqli_query($conn, $sql);
			mysqli_close($conn);

			$flag = false;
			if (mysqli_num_rows($result) <> 0) {
				$account = mysqli_fetch_row($result);
				$_SESSION['isLogin'] = true;
				$_SESSION["account"] = array($account[0], $account[3]." ".$account[4], $account[5], $account[2]);
				
				header("Location: index.php");
			}
			else{
				$error = true;
			}
		}
	 ?>

	<div class="container-fluid px-5 row justify-content-center">
		<div class="" style="width: 400px;">
			<div style="width: 100%; margin: 50px 0px 10px 0px;" class="text-center">
				<img class="border border-dark" width="50" width="50" src="images/logo.png" alt="">
			</div>
			<div class="text-center"><h4>Log in to MyPHP</h4></div>
			<form class="mx-5 px-3 py-3 border rounded" action="" method="POST">
				<?php 
					if($error)
						echo
						'<div class="bg-danger p-1 rounded text-white text-center">
							<i class="fas fa-exclamation-circle"></i> Wrong username or password
						</div>';
				 ?>
				
			   	<div class="form-group">
			   		<label for="account" class="mr-md-2">Username:</label>
			       	<input class="form-control" type="text" id="account" name="account">
			   	</div>
			   	<div class="form-group">
			   		<label for="password" class="mr-md-2">Password:</label>
			       	<input class="form-control" type="password" id="password" name="password">
			  	</div>
			  	<p><a href="forgot_password.php">Forgot your password?</a></p>
			    <input class="btn btn-success w-100" type="submit" value="Login" name="submit">
			</form>
			<div class="text-center mt-4">
				New to MyPHP? <a href="register.php">Create an account</a>.
			</div>
		</div>
	</div>
    
</body>
</html>