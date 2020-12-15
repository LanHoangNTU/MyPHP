<?php 
$page_title = "Change password";
include ('includes/account_security_head.php');
?>

<div class="row rounded border border-info bg-light py-2">
	<div class="col-lg-12">
		<h4>Change password</h4>
		<hr class="w-100">
	</div>
	<form class="col-lg-8" action="" method="POST" accept-charset="utf-8">
		<div class="form-group">
			<label for="opwd">Old pasword</label>
			<input class="form-control" type="password" name="opwd" id="opwd" required>
		</div>
		<div class="form-group">
			<label for="npwd">New pasword</label>
			<input class="form-control" type="password" name="npwd" id="npwd" required>
		</div>
		<div class="form-group">
			<label for="cpwd">Confirm pasword</label>
			<input class="form-control" type="password" name="cpwd" id="cpwd" required>
		</div>
		<div class="form-group">
			<input class="btn btn-outline-dark" id="submit" type="submit" name="submit" value="Update password">
			&nbsp;&nbsp;
			<a href="forgot_password.php" title="">I forgot my password</a>
		</div>
	</form>
	<div class="col-lg-4"></div>
</div>
<?php 
include ('includes/account_security_foot.php');
?>
<script>
	$('#submit').click(function(e){
    		var valid = this.form.checkValidity();
    		if (valid) {
	   			var opwd = $('#opwd').val();
	   			var npwd = $('#npwd').val();
	   			var cpwd = $('#cpwd').val();
    			e.preventDefault();

    			$.ajax({
    				type: 'POST',
    				url: 'validates/validate_password.php',
    				data: {opwd: opwd, npwd: npwd, cpwd: cpwd},
    				dataType: "json",
    				success: function(data){
			    		Swal.fire({
			    			'icon': data.valid?'success':'error',
			    			'title': data.valid?'Success!':'Error!',
			    			'text': data.mes
			    		})
			    		.then(function(){
			    			if(data.valid)
			    				window.location.href = 'index.php';
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