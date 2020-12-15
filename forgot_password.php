<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Forgot password</title>
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <script src="includes/bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/sweetalert2.css">
    <script src="includes/bootstrap/js/sweetalert2.all.js" type="text/javascript"></script>
    <link rel="stylesheet" href="includes/fontawesome/css/all.min.css">
</head>
<body>
	<div class="container-fluid px-5 row justify-content-center">
		<div class="" style="width: 400px;">
			<div style="width: 100%; margin: 50px 0px 10px 0px;" class="text-center">
				<img class="border border-dark" width="50" width="50" src="images/logo.png" alt="">
			</div>
			<div class="text-center"><h4>Reset your password</h4></div>
			<div class="mx-5 px-3 py-3 border rounded">
			   	<div class="form-group">
			   		<small for="username" class="mr-md-2"><b>Enter your account's username and we will send you a new password using your account's email.</b></small>
			       	<input class="form-control mt-2" type="text" id="username" name="username" placeholder="Enter your Username..">
			   	</div>
			    <button class="btn btn-success w-100" id="send">Send password reset email <i id="spin" class="fa fa-spinner fa-spin" hidden></i></button>
			</div>
		</div>
	</div>

	<script>
		$("#send").click(function(){
			if($("#username").val() != ''){
				var username = $("#username").val();
				var b = document.getElementById('spin');
				var btn = document.getElementById('send');

				b.hidden = false;
				btn.disabled = true;

				$.ajax({
					type: 'POST',
    				url: 'validates/validate_f_pass.php',
    				data: {username: username},
    				dataType: "json",
    				success: function(data){
    					Swal.fire({
    						'icon': data.valid?"success":"error",
    						'title': data.valid?"Success!":"Failed...",
    						'text': data.mes
    					})
    					.then(function(){
    						if(data.valid)
    							window.location.href = "login.php";
    					})
    				},
    				error: function(xhr, status, error){
				        var errorMessage = xhr.status + ': ' + xhr.statusText;
				        alert('Error - ' + errorMessage);
				        console.log(errorMessage);
				    },
				    complete: function(){
				    	b.hidden = true;
						btn.disabled = false;
				    }
				});
			}
		});
	</script>
</body>
</html>