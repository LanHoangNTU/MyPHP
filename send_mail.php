<?php 
	$page_title = "All users";
	include("includes/header.php");
?>
<script>
	$(document).ready(function(){
		$('#spin').hide();
		$("#send").click(function(){
			if($("#mail-to").val() != ''){
				var to = $("#mail-to").val();
				var subject = $("#mail-subject").val();
				var message = $("#mail-content").val();

				$('#spin').show();
				$('#send').attr("disabled", true);

				$.ajax({
					type: 'POST',
	   				url: 'validates/validate_send_mail.php',
	   				data: {to: to, subject: subject, message: message},
	   				success: function(data){
	   					Swal.fire({
	   						'icon': data?"success":"error",
	   						'title': data?"Success!":"Failed!",
	   						'text': data?"Mail sent!":"Failed to send mail!"
	   					})
	   				},
	   				error: function(xhr, status, error){
				        var errorMessage = xhr.status + ': ' + xhr.statusText;
				        alert('Error - ' + errorMessage);
				        console.log(errorMessage);
				    },
				    complete: function(){
				    	$('#spin').hide();
						$('#send').attr("disabled", false);
				    }
				});
			}
		});
	});
</script>
<div class="row my-4">
	<div class="row col-lg-6 col-md-12 mx-auto bg-light border border-info rounded p-3">
		<div class="text-center mx-auto mb-2"><h4>Send Mail</h4></div>

		<div class="form-group col-12">
			<label for="mail-from">From:</label>
			<input id="mail-from" class="form-control" type="text" value="lanhoangphp@gmail.com" disabled readonly>
		</div>

		<div class="form-group col-lg-6 col-md-12">
			<label for="mail-to">To:</label>
			<input id="mail-to" class="form-control" type="email">
		</div>

		<div class="form-group col-lg-6 col-md-12">
			<label for="mail-subject">Subject:</label>
			<input id="mail-subject" class="form-control" type="text">
		</div>

		<div class="form-group col-12">
			<label for="mail-content">Contents:</label>
			<textarea id="mail-content" class="form-control"></textarea>
		</div>

		<div class="col-12 text-right">
			<button class="btn btn-primary" id="send">Send <i id="spin" class="fa fa-spinner fa-spin" style="display: none;"></i> </button>
		</div>
	</div>
</div>

<?php 
	include("includes/footer.html"); 
?>