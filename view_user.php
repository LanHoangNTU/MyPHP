<?php 
	$page_title = "All users";
	include("includes/header.php");
	$username = $_GET['uname'];
	$conn= mysqli_connect('localhost', 'root', '', 'my_web');
	mysqli_set_charset($conn,  'UTF8');

	$sql="SELECT ac.Username, ac.Email, ac.FirstName, ac.LastName, ro.Name, ac.Icon, ac.Bio, ac.Location, ac.Company
		FROM account ac, role ro 
		WHERE ac.Username = '$username' AND ac.Role = ro.RoleID";
	$user = mysqli_fetch_array(mysqli_query($conn, $sql));
?>

<div class="row my-5">
	<div class="col-lg-3"></div>
	<div class="col-lg-6 row bg-light p-2 border border-info rounded">
		<div class="col-lg-4">
			<img id="a_img" class="border border-dark rounded" width="100%" src="images/<?php echo($user['Icon']) ?>" alt="">
		</div>
		<div class="col-lg-6">
			<h3><?php echo $user["FirstName"]." ".$user["LastName"]; ?></h3>
			<hr>
			<i class="fas fa-user"></i> <b class="text-dark"><?php echo $user["Username"]; ?> | <font class="text-info"><?php echo $user["Name"]; ?></font></b><br>
			<i class="fas fa-envelope"></i> <b class="text-dark"><?php echo $user["Email"]; ?></b><br>
			<i class="fas fa-map-marker-alt"></i> <b class="text-dark"><?php echo $user["Location"]; ?></b><br>
			<i class="fas fa-building"></i> <b class="text-dark"><?php echo $user["Company"]; ?></b><br>
		</div>
		<div class="col-lg-12"><hr></div>
		<div class="col-lg-12">
			<h5><i class="fas fa-book"></i> - <b>BIO</b></h5>
			<p><?php echo $user['Bio']; ?></p>
		</div>
	</div>
	<div class="col-lg-3"></div>
</div>

<?php 
	mysqli_close($conn);
	include("includes/footer.html");
 ?>