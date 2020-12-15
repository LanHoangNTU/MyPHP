<?php # Script 3.4 - index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.php');
?>

<div style="background-image: url('images/home.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="view rgba-gradient">
	<div class="mask rgba-gradient align-items-center pt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 text-white text-justify text-center text-md-left mt-xl-5 mb-5">
					<h1 class="h1-responsive font-weight-bold mt-sm-5">Welcome to MyPHP!</h1>
					<hr style="border: 1px solid white;">
					<h6>My name is Nguyen Dinh Hoang Lan, this website was built by me as a side project for my asignment in an "Open Source Software Development" course at my University.</h6>
					<h6 class="mb-4">Please, feel free to explore my other PHP related projects.</h6>
					<button onclick="window.location.href='projects.php'" class="btn btn-light">My projects</button>
					<button onclick="window.open('https://github.com/lanhoangntu', '_blank')" class="btn btn-outline-light">My Github page</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include ('includes/footer.html');
?>