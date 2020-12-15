<?php 
$page_title = "Profile";
include ('includes/header.php');
$conn= mysqli_connect('localhost', 'root', '', 'my_web');
$sql = 
	"SELECT ac.Username, ac.Email, ac.FirstName, ac.LastName, ro.Name, ac.Icon, ac.Bio, ac.Location, ac.Company
	FROM account ac, role ro
	WHERE ac.Role = ro.RoleID AND ac.Username = '".$_SESSION["account"][0]."'";
$result = mysqli_query($conn, $sql);
$acc = mysqli_fetch_array($result);
mysqli_close($conn);
?>

<div class="row my-5">
	<div class="col-lg-3"></div>
	<div class="col-lg-6 row bg-light p-2 border border-info rounded">
		<div class="col-lg-5">
			<img id="a_img" class="border border-dark rounded" width="100%" src="images/<?php echo($acc['Icon']) ?>" alt="">
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="avatar" id="avatar" aria-describedby="inputGroupFileAddon01">
	      		<label id="upload-img" class="custom-file-label" for="avatar">Choose file</label>
			</div>
		</div>
		<div class="col-lg-7">
			<h3><?php echo $acc["FirstName"]." ".$acc["LastName"]; ?></h3>
			<hr>
			<i class="fas fa-user"></i> <b class="text-dark"><?php echo $acc["Username"]; ?> | <font class="text-info"><?php echo $acc["Name"]; ?></font></b><br>
			<i class="fas fa-envelope"></i> <b class="text-dark"><?php echo $acc["Email"]; ?></b><br>
			<i class="fas fa-map-marker-alt"></i> <b class="text-dark"><?php echo $acc["Location"]; ?></b><br>
			<i class="fas fa-building"></i> <b class="text-dark"><?php echo $acc["Company"]; ?></b><br>
		</div>
		
		<div class="col-lg-12"><hr></div>
		<div class="col-lg-12">
			<h5><i class="fas fa-book"></i> - <b>BIO</b></h5>
			<p><?php echo $acc['Bio']; ?></p>
		</div>
		<div class="col-lg-12"><hr></div>
		<div class="col-lg-4"></div>
		<div class="col-lg-6 mt-3 text-right">
			<a class="btn btn-primary" href="edit_account.php?active=1"><i class="far fa-edit"></i> Edit profile</a>
		</div>
	</div>
	<div class="col-lg-3"></div>
</div>

<?php
include ('includes/footer.html');
?>

<script>
	$(document).on('change', '#avatar', function(){
		var property = document.getElementById("avatar").files[0];
		var image_name = property.name;
		var img_extension = image_name.split('.').pop().toLowerCase();

		if(jQuery.inArray(img_extension, ['jpg', 'png', 'jpeg', 'gif']) != -1){
			var form_data = new FormData();
			form_data.append("avatar", property);

			$.ajax({
				url: 'validates/avatar.php',
				method: 'POST',
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				beforeSend:function(){
					$('#upload-img').html(image_name);
				},
				success:function(data){
					if(!data.valid){
						Swal.fire({
							'icon': 'error',
							'title': 'Large image!',
							'text': 'Image must be smaller than 5 Megabytes!'
						})
					}
					else{
						Swal.fire({
							'icon': 'success',
							'title': 'Profile picture changed!'
						})
						.then(function(){
							$('#a_img').attr("src", "images/" + data.name);
							location.reload(true);
						})
					}
				}
			});
		}
		else{
			Swal.fire({
				'icon': 'error',
				'title': 'Not an image!',
				'text': 'Must be in JPG, JPEG, GIF or PNG format!'
			})
		}
	});
</script>