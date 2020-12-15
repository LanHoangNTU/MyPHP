<?php 
	include('includes/header.php');
	$conn= mysqli_connect('localhost', 'root', '', 'my_web');
	$sql = 
		"SELECT ac.Username, ac.Email, ac.FirstName, ac.LastName, ro.Name, ac.Icon, ac.Bio, ac.Location, ac.Company
		FROM account ac, role ro
		WHERE ac.Role = ro.RoleID AND ac.Username = '".$_SESSION["account"][0]."'";
	$result = mysqli_query($conn, $sql);
	$acc = mysqli_fetch_array($result);
	$_SESSION["account"][2] = $acc["Icon"];
	mysqli_close($conn);

	function active($item_no){
		if(!isset($_GET['active']))
			header("Location: index.php");
		else{
			if($item_no == $_GET['active'])
				return 'active';
			else
				return '';
		}
	}
?>
<div class="row mt-5 mb-5">
	<div class="col-lg-2"></div>
	<div class="list-group col-lg-2 mx-1">
		<div class="list-group-item disabled">
			<div class="row">
				<div class="col-lg-3 align-self-center">
					<img src="images/<?php echo $_SESSION['account'][2] ?>" width='50' class='rounded'/>
				</div>
				<div class="col-lg-9 align-self-center">
					<h5 class="py-0 my-0 text-dark"><b><?php echo $_SESSION['account'][0]; ?></b></h5>
					<small><b>Personal settings</b></small>
				</div>
			</div>
		</div>
		<a href="edit_account.php?active=1" class="list-group-item list-group-item-action <?php echo active(1)?>">Profile</a>
		<a href="my_password.php?active=2" class="list-group-item list-group-item-action <?php echo active(2)?>">Account security</a>
	</div>

	<div class="col-lg-6 mx-1">