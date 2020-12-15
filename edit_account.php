<?php 
$page_title = "Edit profile";
include ('includes/account_security_head.php');
?>

<div class="row">
	<div class="col-lg-12 row bg-light p-2 border border-info rounded">
		<div class="col-lg-4">
			<img id="a_img" class="border border-dark rounded" width="100%" src="images/<?php echo($acc['Icon']) ?>" alt="">

			<div class="custom-file mt-3">
				<input type="file" class="custom-file-input" name="avatar" id="avatar" aria-describedby="inputGroupFileAddon01">
	      		<label id="upload-img" class="custom-file-label" for="avatar">Choose file</label>
			</div>
		</div>
		
		<form class="col-lg-8" action="" method="POST" accept-charset="utf-8">
			<i class="fas fa-user"></i> <b class="text-dark"><?php echo $acc["Username"]; ?> | <font class="text-info"><?php echo $acc["Name"]; ?></font></b><br>
			<hr>
			<div class="form-group">
				<label for="fname">First name <font class="text-danger">*</font></label>
				<input class="form-control" type="text" name="fname" id="fname" pattern="[a-zA-Z aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+" value="<?php echo($acc['FirstName']) ?>" required>
			</div>
			<div class="form-group">
				<label for="lname">Last name <font class="text-danger">*</font></label>
				<input class="form-control" type="text" name="lname" id="lname" pattern="[a-zA-Z aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+" value="<?php echo($acc['LastName']) ?>" required>
			</div>
			<div class="form-group">
				<label for="fname">Email <font class="text-danger">*</font></label>
				<input class="form-control" type="email" name="mail" id="mail" value="<?php echo($acc['Email']) ?>" required>
			</div>
			<div class="form-group">
				<label for="fname">Bio</label>
				<textarea placeholder="Add bio..." class="form-control" type="textarea" name="bio" id="bio"><?php echo($acc['Bio']) ?></textarea>
			</div>
			<div class="form-group">
				<label for="fname">Location</label>
				<input placeholder="Add location..." class="form-control" type="text" name="location" id="location" value="<?php echo($acc['Location']) ?>" required>
			</div>
			<div class="form-group">
				<label for="fname">Company</label>
				<input placeholder="Add company..." class="form-control" type="text" name="company" id="company" value="<?php echo($acc['Company']) ?>" required>
			</div>
			<div class="form-group text-right">
				<input class="btn btn-info" type="submit" name="submit" id="submit" value="Save">
			</div>
		</form>
	</div>
</div>
<?php
include ('includes/account_security_foot.php');
?>

<script>
	$(document).on('change', '#avatar', function(){
		var property = document.getElementById("avatar").files[0];
		var image_name = property.name;
		var img_extension = image_name.split('.').pop().toLowerCase();

		$("#upload-img").html(image_name);
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
				beforeSend:function(){
					$('#avatar').attr("value", image_name);
				},
				success:function(data){
					$('#a_img').attr("src", "images/" + data);
					location.reload(true);
				}
			})
		}
	});

	$('#submit').click(function(e){
    		var valid = this.form.checkValidity();
    		if (valid) {
	   			var fname 	= $('#fname').val();
	   			var lname 	= $('#lname').val();
	   			var mail 	= $('#mail').val();
	   			var bio 	= $('#bio').val();
	   			var location= $('#location').val();
	   			var company = $('#company').val();
    			e.preventDefault();

    			$.ajax({
    				type: 'POST',
    				url: 'validates/validate_edit.php',
    				data: {fname: fname, lname: lname, mail: mail, bio: bio, location: location, company, company},
    				dataType: "json",
    				success: function(data){
			    		Swal.fire({
			    			'icon': data.valid?'success':'error',
			    			'title': data.valid?'Success!':'Error!',
			    			'text': data.mes
			    		})
			    		.then(function(){
			    			if(data.valid)
			    				window.location.href = 'my_account.php';
			    		})
    				},
    				error: function(data){
    					Swal.fire({
			    			'title': 'Critical Error!',
			    			'text': data.mes,
			    			'type': 'error'
			    		})
    				}
    			});
    		}
    	});
</script>