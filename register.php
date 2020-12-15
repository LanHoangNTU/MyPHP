<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register</title>
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.css">
    <script src="includes/bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="includes/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>
	<div id="del_tmp" class="w-100" style="height: 10px;"></span>
	<div class=" justify-content-center py-5 row">
		<div></div>
		<div class="text-center mb-5 col-lg-12">
			<h6>Join MyPHP</h6>
			<h1><b>Create your account</b></h1>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-3 text-dark bg-light py-2 border border-info">
			<h5><b>Profile picture</b></h5>
			<hr>
			<img id="a_img" class="border border-dark rounded" width="100%" src="images/logo.png" alt="">

			<div class="custom-file mt-3">
				<input type="file" class="custom-file-input" name="avatar" id="avatar" aria-describedby="inputGroupFileAddon01">
	      		<label id="upload-img" class="custom-file-label" for="avatar">Choose file</label>
			</div>
		</div>
		<div class="col-lg-5 bg-light py-2 border border-info">
			<div class="pl-5">
				<h5><b>Account infos</b></h5>
				<hr>
			</div>	
			<div>
				<form id="register-form" class="px-5" action="" method="POST" accept-charset="utf-8">
					<div class="form-group">
						<label for="username">Username <font class="text-danger">*</font></label>
						<input class="form-control" type="text" name="username" id="username" pattern=".{6,}" required>
					</div>
					<div class="form-group">
						<label for="fname">First name <font class="text-danger">*</font></label>
						<input class="form-control" type="text" name="fname" id="fname" pattern="[a-zA-Z aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+" required>
					</div>
					<div class="form-group">
						<label for="lname">Last name <font class="text-danger">*</font></label>
						<input class="form-control" type="text" name="lname" id="lname" pattern="[a-zA-Z aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ]+" required>
					</div>
					<div class="form-group">
						<label for="mail">Email <font class="text-danger">*</font></label>
						<input class="form-control" type="email" name="mail" id="mail" required>
					</div>
					<div class="form-group">
						<label for="pwd">Password <font class="text-danger">*</font></label>
						<input class="form-control" type="password" name="pwd" id="pwd" pattern="[a-zA-Z0-9]+" required>
					</div>
					<div class="form-group">
						Already has an account? <a href="login.php">Login</a>.
					</div>
					<div class="form-group">
						<input class="btn btn-primary w-100" type="submit" name="submit" id="submit" value="Create account">
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-2"></div>
		
	</div>
    <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/sweetalert2.css">
    <script src="includes/bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="includes/bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>

    <script type="text/javascript">
    	var filename = '';
    	function delTemp(formdata){
    		$.ajax({
				url: 'validates/del_tmp.php',
				method: 'POST',
				data: formdata,
				dataType: "text",
				contentType: false,
				cache: false,
				processData: false,
				async: false,
				error:function(data){
					alert(data);
				}
			})
    	};

    		$(window).bind('beforeunload', function(){
    			let property = document.getElementById("avatar").files[0];
				let image_name = property.name;
				let formdata = new FormData();
				formdata.append("file", image_name);
	    		delTemp(formdata);
    		});

    		$(document).on('change', '#avatar', function(){
				let property = document.getElementById("avatar").files[0];
				let image_name = property.name;
				let img_extension = image_name.split('.').pop().toLowerCase();
				console.log(filename);
				if(jQuery.inArray(img_extension, ['jpg', 'png', 'jpeg', 'gif']) != -1){
					let form_data = new FormData();
					form_data.append("avatar", property);

					$("#upload-img").html(image_name);
					if(filename != ''){
						let formdata = new FormData();
						formdata.append("file", filename);
	    				delTemp(formdata);
	    			}

					$.ajax({
						url: 'validates/r_avatar.php',
						method: 'POST',
						data: form_data,
						contentType: false,
						cache: false,
						processData: false,
						dataType: "text",
						success:function(data){
							filename = image_name; 
							console.log(data);
							$('#a_img').attr("src", "images/tmp/" + data);
						},
						error:function(){
							alert("error");
						}
					})
				}
			});
    		$('#submit').on('click', function(e){
    			var valid = this.form.checkValidity();
    			if (valid) {
	    			let uname 	= $('#username').val();
	    			let fname 	= $('#fname').val();
	    			let lname 	= $('#lname').val();
	    			let mail 	= $('#mail').val();
	    			let pwd 	= $('#pwd').val();
	    			let avatar  = document.getElementById("avatar").files[0];
    				e.preventDefault();

    				let f_data = new FormData();
    				f_data.append("username", uname);
    				f_data.append("fname", fname);
    				f_data.append("lname", lname);
    				f_data.append("mail", mail);
    				f_data.append("pwd", pwd);
    				f_data.append("avatar", avatar);
    				$.ajax({
    					type: 'POST',
    					url: 'validates/validate_register.php',
    					data: f_data,
    					dataType: "json",
					    processData: false,
					    contentType: false,
    					success: function(data){
    						console.log(data);
				    		Swal.fire({
				    			'icon': data.valid?'success':'error',
				    			'title': data.valid?'Success!':'Error!',
				    			'text': data.mes
				    		})
				    		.then(function(){
				    			if(data.valid){
				    				let formdata = new FormData();
									formdata.append("file", filename);
				    				delTemp(formdata);
				    				window.location.href = 'login.php';
				    			}
				    			$("#register-form")[0].reset();
				    		})
    					},
    					error: function(xhr, status, error){
    						Swal.fire({
				    			'title': 'Error!',
				    			'text': error,
				    			'type': 'error'
				    		})
    					}
    				});
    			}
    		});
    </script>
</body>
</html>