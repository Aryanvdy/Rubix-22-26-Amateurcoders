<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel = "icon" href = "img/FindCare-Logo.png" 
        type = "image/x-icon">
	<title>FindCare | Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body class="my-login-page">
	<?php
	
	include 'config.php';
	$_SESSION['login'] = "false";
	if(isset($_POST['psubmit'])){
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$s =" select * from patients where email = '$email' && password = '$password'";
		$d =" select * from doctors where email = '$email' && password = '$password'";

		$result_p=mysqli_query($conn,$s);
		$result_d=mysqli_query($conn,$d);

		$num_p = mysqli_num_rows($result_p);
		$num_d = mysqli_num_rows($result_d);


		if($num_p == 1){
			$_SESSION['login'] = "true";
			$user_name = mysqli_fetch_array($result_p);
			$_SESSION['email']  = $email;
			$_SESSION['user'] = "patient";
			$log = $_SESSION['login'];
			echo "<script>
			window.location='index.php';
			alert('$log logged in as $email ');
			console.log('heyy')
			console.log(document.getElementById('login').innerText);

			// Welcome(num);
			</script>";
		}
		else if($num_d ==1){
			$_SESSION['login'] = "true";
			$user_name = mysqli_fetch_array($result_d);
			$_SESSION['email']  = $email;
			$_SESSION['user'] = "doctor";
			echo "<script>
			alert('Doctor logged in as $email ');
			window.location='index.php';
			console.log('heyy')
			console.log(document.getElementById('login').innerText);

			// Welcome(num);
			</script>";
		}
		else{
			
			echo "<script> alert('Try again!');
			</script>";
		}
	}
	?>

	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="index.php">
						<img src="img/FindCare-Logo.png" alt="">
						</a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form action="login.php" method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">Email Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="pass" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>


								<div class="form-group m-0">
									<button type="submit" name="psubmit" class="btn btn-prime btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="signup.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script> 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>