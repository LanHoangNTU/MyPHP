<?php 
	$page_title = "All users";
	include("includes/header.php");
	$conn= mysqli_connect('localhost', 'root', '', 'my_web');
	mysqli_set_charset($conn,  'UTF8');
	$sql_page = "SELECT COUNT(*) FROM account";

	if (isset($_GET['pageno'])) {
	    $pageno = $_GET['pageno'];
	} else {
	    $pageno = 1;
	}

	if(isset($_GET['search']))
		$username = $_GET['search'];
	else
		$username = "";

	$no_of_records_per_page = 10;
	$offset = ($pageno-1) * $no_of_records_per_page; 
	$total_rows = mysqli_fetch_array(mysqli_query($conn, $sql_page))[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	$sql="SELECT * FROM account WHERE Username like '%$username%' LIMIT $offset, $no_of_records_per_page";
	$users = mysqli_query($conn, $sql);
?>
<style>
	.del:hover{
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(".del").click(function(){
			var username = $(this).attr("id");
			console.log(username);
			Swal.fire({
				title: 'Are you sure want to remove?',
      			text: 'User "' + username + '" will be deleted forever.',
      			icon: 'warning',
      			showCancelButton: true,
      			confirmButtonText: 'Yes, delete \'em!',
      			cancelButtonText: 'No, keep \'em'
			}).then((result) => {
				if(result.value){
					$.ajax({
						type: 'POST',
		   				url: 'validates/validate_delete_user.php',
		   				data: {username: username},
		   				success: function(data){
		   					Swal.fire({
		   						'icon': data?"success":"error",
		   						'title': data?"Success!":"Failed!",
		   						'text': data?"User has been deleted!":"Cannot delete user!"
		   					}).then(() => {
		   						location.reload(); 
		   					})
		   				},
		   				error: function(xhr, status, error){
					        var errorMessage = xhr.status + ': ' + xhr.statusText;
					        alert('Error - ' + errorMessage);
					        console.log(errorMessage);
					    }
					});
				}
			})
		});
	});
</script>

<form action="" method="GET">
	<div class="container my-5">
		<div class="row">
			<div class="input-group mb-3 col-sm-12 col-md-7 col-lg-6">
				<input class="form-control" type="text" name="search" placeholder="Enter username..." value="<?php echo($username) ?>">
				<div class="input-group-append">
					<button class="btn btn-outline-dark" type="submit"> <i class="fas fa-search"></i> </button>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<table class="w-100 table table-bordered col-12">
					<thead class="thead-light text-center">
						<tr>
							<th>Username</th>
							<th>First name</th>
							<th>Last name</th>
							<th class="d-none d-lg-table-cell">Bio</th>
							<th class="d-none d-lg-table-cell">Location</th>
							<th class="d-none d-lg-table-cell">Company</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while($user = mysqli_fetch_array($users)){
							$str = "<tr>";
							$str .= "<td>".$user["Username"]."</td>";
							$str .= "<td>".$user["FirstName"]."</td>";
							$str .= "<td>".$user["LastName"]."</td>";
							$str .= "<td class='d-none d-lg-table-cell'>".(strlen($user["Bio"])>50?substr($user["Bio"], 0, 49):$user["Bio"])."</td>";
							$str .= "<td class='d-none d-lg-table-cell'>".$user["Location"]."</td>";
							$str .= "<td class='d-none d-lg-table-cell'>".$user["Company"]."</td>";
							$str .= "<td class='text-center'>";
							$str .= "<a href='view_user.php?uname=".$user['Username']."'><img width='32' height='32' src='images/icons/view_details.png'></a>&nbsp;";
							if($user["Role"] != 1)
								$str .= "<img class='del' id='".$user['Username']."' width='32' height='32' src='images/icons/delete.png'>";
							$str .= "</td>";
							$str .= "</tr>";

							echo $str;
						}
					 ?>
					 <tr>
					 	<th colspan="7" class="text-center">
							<?php echo ($pageno!=1?"<a href='?pageno=1'>First</a>":"First") ?>
							<?php echo ($pageno<=1?"Prev":"<a href='?pageno=".($pageno - 1)."'>Prev</a>");?>
							<?php 
								for ($i=1; $i <= $total_pages; $i++) { 
									echo ($pageno==$i?"$i":"<a href='?pageno=".$i."'>$i</a>");
								}
							 ?>
							<?php echo ($pageno>=$total_pages?"Prev":"<a href='?pageno=".($pageno + 1)."'>Next</a>");?>
							<?php echo ($pageno<$total_pages?"<a href='?pageno=$total_pages'>Last</a>":"Last") ?>
					 	</th>
					 </tr>
					 </tbody>
				</table>
			</div>
		</div>
	</div>
</form>

<?php 
	mysqli_close($conn);
	include("includes/footer.html"); 
?>